@extends('layouts.admin')
@section('content')
@section('css')
    <style>
        .dropdown-trigger{
            display: none !important;
        }
    </style>
@endsection
{{-- {{  dd(auth()->user()->getAllPermissions()) }} --}}
<div class="container-fluid">
    <div class="block-header">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <ul class="breadcrumb breadcrumb-style ">
               
                    <li class="breadcrumb-item bcrumb-1">
                        <a href="{{ route('admin.dashboard') }}">
                            <i class="fas fa-home"></i> الرئيسية</a>
                    </li>
                    <li class="breadcrumb-item active">اعدادات البريد الإلكتروني</li>

                </ul>
            </div>
        </div>
    </div>
    <!-- Basic Table -->
    <div class="row clearfix">
        <div class="col-lg-8 col-md-12 col-sm-12 col-xs-8">
            <div class="card">
                <div class="header">
                 
                    <div class="row clearfix">
                        <div class="col-lg-12 col-md-8 col-sm-8 col-xs-12">
                            <div class="card">
                            
                                <div class="body">
                                    @if (count($errors) > 0)
<div class="alert alert-danger">
 <ul style="text-align: center">
  @foreach ($errors->all() as $error)
   <li>{{ $error }}</li>
  @endforeach
 </ul>
</div>
@endif
<form class="form-horizontal" action="{{ route('env_key_update.update') }}" method="POST">
    @csrf
    <div class="form-group row">
        <input type="hidden" name="types[]" value="MAIL_DRIVER">
        <label class="col-md-3 col-form-label">{{('Type')}}</label>
        <div class="col-md-9">
            <select class="form-control aiz-selectpicker mb-2 mb-md-0" name="MAIL_DRIVER" onchange="checkMailDriver()">
                <option value="smtp" @if (env('MAIL_DRIVER') == "smtp") selected @endif>{{ ('SMTP') }}</option>

            </select>
        </div>
    </div>
    <div id="smtp">
        <div class="form-group row">
            <input type="hidden" name="types[]" value="MAIL_HOST">
            <div class="col-md-3">
                <label class="col-from-label">{{('MAIL HOST')}}</label>
            </div>
            <div class="col-md-9">
                <input type="text" class="form-control" name="MAIL_HOST" value="{{  env('MAIL_HOST') }}" placeholder="{{ ('MAIL HOST') }}">
            </div>
        </div>
        <div class="form-group row">
            <input type="hidden" name="types[]" value="MAIL_PORT">
            <div class="col-md-3">
                <label class="col-from-label">{{('MAIL PORT')}}</label>
            </div>
            <div class="col-md-9">
                <input type="text" class="form-control" name="MAIL_PORT" value="{{  env('MAIL_PORT') }}" placeholder="{{ ('MAIL PORT') }}" >
            </div>
        </div>
        <div class="form-group row">
            <input type="hidden" name="types[]" value="MAIL_USERNAME">
            <div class="col-md-3">
                <label class="col-from-label">{{('MAIL USERNAME')}}</label>
            </div>
            <div class="col-md-9">
                <input type="text" class="form-control" name="MAIL_USERNAME" value="{{  env('MAIL_USERNAME') }}" placeholder="{{ ('MAIL USERNAME') }}" >
            </div>
        </div>
        <div class="form-group row">
            <input type="hidden" name="types[]" value="MAIL_PASSWORD">
            <div class="col-md-3">
                <label class="col-from-label">{{('MAIL PASSWORD')}}</label>
            </div>
            <div class="col-md-9">
                <input type="text" class="form-control" name="MAIL_PASSWORD" value="{{  env('MAIL_PASSWORD') }}" placeholder="{{ ('MAIL PASSWORD') }}" >
            </div>
        </div>
        <div class="form-group row">
            <input type="hidden" name="types[]" value="MAIL_ENCRYPTION">
            <div class="col-md-3">
                <label class="col-from-label">{{('MAIL ENCRYPTION')}}</label>
            </div>
            <div class="col-md-9">
                <input type="text" class="form-control" name="MAIL_ENCRYPTION" value="{{  env('MAIL_ENCRYPTION') }}" placeholder="{{ ('MAIL ENCRYPTION') }}" >
            </div>
        </div>
        <div class="form-group row">
            <input type="hidden" name="types[]" value="MAIL_FROM_ADDRESS">
            <div class="col-md-3">
                <label class="col-from-label">{{('MAIL FROM ADDRESS')}}</label>
            </div>
            <div class="col-md-9">
                <input type="text" class="form-control" name="MAIL_FROM_ADDRESS" value="{{  env('MAIL_FROM_ADDRESS') }}" placeholder="{{ ('MAIL FROM ADDRESS') }}" >
            </div>
        </div>
        <div class="form-group row">
            <input type="hidden" name="types[]" value="MAIL_FROM_NAME">
            <div class="col-md-3">
                <label class="col-from-label">{{('MAIL FROM NAME')}}</label>
            </div>
            <div class="col-md-9">
                <input type="text" class="form-control" name="MAIL_FROM_NAME" value="{{  env('MAIL_FROM_NAME') }}" placeholder="{{ ('MAIL FROM NAME') }}" >
            </div>
        </div>
    </div>
    <div id="mailgun">
        <div class="form-group row">
            <input type="hidden" name="types[]" value="MAILGUN_DOMAIN">
            <div class="col-md-3">
                <label class="col-from-label">{{('MAILGUN DOMAIN')}}</label>
            </div>
            <div class="col-md-9">
                <input type="text" class="form-control" name="MAILGUN_DOMAIN" value="{{  env('MAILGUN_DOMAIN') }}" placeholder="{{ ('MAILGUN DOMAIN') }}" >
            </div>
        </div>
        <div class="form-group row">
            <input type="hidden" name="types[]" value="MAILGUN_SECRET">
            <div class="col-md-3">
                <label class="col-from-label">{{('MAILGUN SECRET')}}</label>
            </div>
            <div class="col-md-9">
                <input type="text" class="form-control" name="MAILGUN_SECRET" value="{{  env('MAILGUN_SECRET') }}" placeholder="{{ ('MAILGUN SECRET') }}" >
            </div>
        </div>
    </div>
    <div class="form-group mb-0 text-right">
        <button type="submit" class="btn btn-primary">حفظ الإعدادات</button>
    </div>
</form>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
    <!-- #END# Basic Table -->
    <!-- Striped Rows -->
  
@endsection

@section('script')
<script>
    $('#user_type').change(function () {    
        var value = $('#user_type :selected').val();
        if(value == 'famous'){
            $("#dateOf").css("display", "none");
        }else{
            $("#dateOf").css("display", "flex");

        }

});  
</script>
    
@endsection

