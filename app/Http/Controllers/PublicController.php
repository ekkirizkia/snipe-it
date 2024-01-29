<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function getAssetFromPublic($asset_tag)
    {
        $asset = Asset::withTrashed()->firstWhere('asset_tag', $asset_tag);

        return view('hardware/view_for_public')->with('asset', $asset);
    }
}
