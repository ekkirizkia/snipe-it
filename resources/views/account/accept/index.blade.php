@extends('layouts/default')

{{-- Page title --}}
@section('title')
{{ trans('general.accept_assets', array('name' => empty($user) ? '' : $user->present()->full_name)) }}
@parent
@stop

{{-- Account page content --}}
@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="box box-default">
      <div class="box-header with-border">
        <h2 class="box-title">Assets</h2>
      </div>
      <div class="box-body">
        <!-- checked out Accessories table -->

        <div class="table-responsive">
          <table
                  data-cookie-id-table="pendingAcceptances"
                  data-id-table="pendingAcceptances"
                  data-side-pagination="client"
                  data-show-refresh="false"
                  data-sort-order="asc"
                  id="pendingAcceptances"
                  class="table table-striped snipe-table"
                  data-export-options='{
                  "fileName": "my-pending-acceptances-{{ date('Y-m-d') }}",
                  "ignoreColumn": ["actions","image","change","checkbox","checkincheckout","icon"]
                  }'>
            <thead>
              <tr>
                <th>{{ trans('general.name')}}</th>
                  <th>{{ trans('general.type')}}</th>
                  <th>{{ trans('general.qty') }}</th>
                <th>{{ trans('general.serial_number')}}</th>
                <th>{{ trans('table.actions')}}</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($acceptances as $acceptance)
              <tr>
                @if ($acceptance->checkoutable)
                <td>{{ ($acceptance->checkoutable) ? $acceptance->checkoutable->present()->name : '' }}</td>
                <td>{{ $acceptance->checkoutable_item_type }}</td>
                <td>{{ $acceptance->qty ?? '1' }}</td>
                <td>{{ ($acceptance->checkoutable) ? $acceptance->checkoutable->serial : '' }}</td>
                <td><a href="{{ route('account.accept.item', $acceptance) }}" class="btn btn-default btn-sm">{{ trans('general.accept_decline') }}</a></td>
                @else
                <td> ----- </td>
                <td> {{ trans('general.error_user_company_accept_view') }} </td>
                @endif
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>

       </div> <!-- .box-body-->
    </div><!--.box.box-default-->
  </div> <!-- .col-md-12-->
  <div class="col-md-12">
    <div class="box box-default">
      <div class="box-header">
        <div class="box-title with-border">
          <h2 class="box-title">Bulk Asset</h2>
        </div>
      </div>
      <div class="box-body">
        <!-- checked out Accessories table -->

        <div class="table-responsive">
          <table
                  data-cookie-id-table="pendingAcceptancesBulk"
                  data-id-table="pendingAcceptancesBulk"
                  data-side-pagination="client"
                  data-show-refresh="false"
                  data-sort-order="asc"
                  id="pendingAcceptancesBulk"
                  class="table table-striped snipe-table"
                  data-export-options='{
                  "fileName": "my-pending-acceptances-bulk-{{ date('Y-m-d') }}",
                  "ignoreColumn": ["actions","image","change","checkbox","checkincheckout","icon"]
                  }'>
            <thead>
              <tr>
                <th>{{ trans('general.name')}}</th>
                  <th>{{ trans('general.type')}}</th>
                  <th>{{ trans('general.qty') }}</th>
                <th>{{ trans('general.serial_number')}}</th>
                <th>{{ trans('table.actions')}}</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($bulkAcceptances as $key => $acceptances)
              <tr style="background-color: #307095; color: aliceblue;font-size: 1.5rem">
                <td colspan="5">
                  <div class="d-flex justify-content-between">
                    <div>Penyerahan Bulk Id: {{ $key }}</div>
                    <div>
                      <td><a href="{{ route('account.accept.item_bulk', $key) }}" class="btn btn-default btn-sm">{{ trans('general.accept_decline') }}</a></td>
                    </div>
                  </div>
                </td>
              </tr>
              @foreach ($acceptances as $acceptance)
                  <tr>
                    @if ($acceptance->checkoutable)
                    <td>{{ ($acceptance->checkoutable) ? $acceptance->checkoutable->present()->name : '' }}</td>
                    <td>{{ $acceptance->checkoutable_item_type }}</td>
                    <td>{{ $acceptance->qty ?? '1' }}</td>
                    <td>{{ ($acceptance->checkoutable) ? $acceptance->checkoutable->serial : '' }}</td>
                    {{-- <td><a href="{{ route('account.accept.item', $acceptance) }}" class="btn btn-default btn-sm">{{ trans('general.accept_decline') }}</a></td> --}}
                    @else
                    <td> ----- </td>
                    <td> {{ trans('general.error_user_company_accept_view') }} </td>
                    @endif
                  </tr>
                @endforeach
              @endforeach
            </tbody>
          </table>
        </div>

       </div> <!-- .box-body-->
    </div><!--.box.box-default-->
  </div> <!-- .col-md-12-->
</div> <!-- .row-->

@stop

@section('moar_scripts')
  @include ('partials.bootstrap-table')
@stop
