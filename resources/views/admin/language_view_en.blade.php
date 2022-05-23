@extends('layouts.admin')

@section('content')
<div class="
card card-docs mb-2">

    <div class="card-body fs-6 py-15 px-10 py-lg-15 px-lg-15 text-gray-700">
        <h2 class="mb-3"> @lang('Traslate')</h2>
        <form class="form-horizontal" action="{{ route('languages.key_value_store','en') }}" method="POST">
            @csrf
            <input type="hidden" name="id" value="{{ $language }}">
            <table class="table table-striped table-bordered zero-configuration" id="kt_datatable">

            <thead>
                <tr>
                    <th>#</th>
                    <th>{{__('Key')}}</th>
                    <th>{{__('Value')}}</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $i = 1;
                @endphp
                @foreach (openJSONFile('en') as $key => $value)
                    <tr>
                        <td>{{ $i }}</td>
                        <td class="key">{{ $key }}</td>
                        <td>
                            <input type="text" class="form-control value" style="width:100%" name="key[{{ $key }}]" @isset(openJSONFile($language)[$key])
                                value="{{ openJSONFile($language)[$key] }}"
                            @endisset>
                        </td>
                    </tr>
                    @php
                        $i++;
                    @endphp
                @endforeach
            </tbody>
 
        </table>
        <div class="panel-footer text-right">
            <button type="button" class="btn btn-warning" onclick="copyTranslation()">{{ __('Copy Translations') }}</button>
            <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
        </div>
    </form>

    </div>
</div>

@endsection

@section('css')

<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css" rel="stylesheet" type="text/css" />
<link href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />

@endsection

@section('script')
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    $('table').DataTable();
} );
    function copyTranslation() {
        $('#kt_datatable > tbody  > tr').each(function (index, tr) {
            $(tr).find('.value').val($(tr).find('.key').text());
        });
    }

</script>

@endsection