<?php

namespace App\Http\Controllers;

use App\Models\User;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SSOController extends Controller
{
    protected $client = null;

    function __construct()
    {
        $this->client = new Client();
    }


    function ConnectAPI($URL, $Action = 'get', $PostData = null, $LoginToken = null)
    {
        /*
        $LoginToken = $this->GetToken();
        if ($LoginToken == '') {
            $result = (object) [
                'sts' => 0,
                'msg' => 'Please Login',
            ];
        }
        */  

        try {
            if ($PostData != null) {
                $client = $this->client->$Action($URL, [
                    'headers' => [
                        'Accept' => 'application/json',
                        'Content-Type' => 'application/json; charset=utf-8',
                        'Authorization' => 'Bearer ' . $LoginToken,
                        'X-APP-ID' => config('sso.app_id'),
                    ],
                    'verify' => false,
                    'body' => $PostData
                ]);
            } else {
                $client = $this->client->$Action($URL, [
                    'headers' => [
                        'Accept' => 'application/json',
                        'Content-Type' => 'application/json; charset=utf-8',
                        'Authorization' => 'Bearer ' . $LoginToken,
                        'X-APP-ID' => config('sso.app_id'),
                    ],
                    'verify' => false
                ]);
            }
            $result = json_decode($client->getBody());
        } catch (\GuzzleHttp\Exception\BadResponseException $ex) {
            $result = (object) [
                'sts' => 0,
                'msg' => $ex->getMessage(),
            ];
        }

        return $result;
    }


    function login() {
        if (auth()->id) {
            return redirect()->to('/');
        }
        $UrlServer = config('sso.server_addr');
        return redirect()->to($UrlServer . '?' . http_build_query([
            'redirectUrl' => route('sso_callback'),
        ]));
    }

    function callback_sso(Request $request) {
        if (!$request->filled('Token')) {
            abort(400, 'Request Error');
        }
        $Token = $request->Token;
        $CheckDetail = $this->sso_get_login_detail($Token);
        
        if(!empty($CheckDetail->Sts) && $CheckDetail->Sts == 1) {
            $CheckDetail = $CheckDetail->ArrDataLogin;
            $user = User::where('username', $CheckDetail->Username)->first();
            if (!$user) {
                $user = new User();
                $user->email = $CheckDetail->Email;
                $user->username = $CheckDetail->Username;
                $user->first_name = $CheckDetail->LoginName;
                $user->password = bcrypt('123456');

                $user->save();

            }
            Auth::loginUsingId($user->id);
            return redirect()->to('/');
        }
        else {
            return redirect('/')->with('error', (optional($CheckDetail)->Msg ?? optional($CheckDetail)->msg) ?? 'Error tidak diketahui');
        }
    }

    function sso_get_login_detail($Token)
    {
        $URL = config('sso.server_api') . 'sso_get_login_detail';
        $DataSend = (object) [
            'Token' => $Token,
        ];
        $Data = json_encode($DataSend);
        $result = $this->ConnectAPI($URL, 'post', $Data, $Token);
        if ($result == null) {
            $result = (object) [
                'sts' => 0,
                'msg' => 'Please Login'
            ];
        }
        return $result;
    }

    function sso_get_login_list() {
        $URL = config('sso.server_api') . 'sso_get_login_list';
        $result = $this->ConnectAPI($URL, 'get', null, config('sso.server_token'));
        return $result;
    }
}
