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
                            <i class="fas fa-home"></i> @lang('Home')</a>
                    </li>
                    <li class="breadcrumb-item active">اعدادات بوابة الرسائل </li>

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

    <div id="smtp">
        <div class="form-group row">
            <input type="hidden" name="types[]" value="PUSHER_APP_ID">
            <div class="col-md-3">
                <label class="col-from-label">{{('PUSHER APP ID')}}</label>
            </div>
            <div class="col-md-9">
                <input type="text" class="form-control" name="PUSHER_APP_ID" value="{{  env('PUSHER_APP_ID') }}" placeholder="{{ ('PUSHER APP ID') }}">
            </div>
        </div>
        <div class="form-group row">
            <input type="hidden" name="types[]" value="PUSHER_APP_KEY">
            <div class="col-md-3">
                <label class="col-from-label">{{('PUSHER APP KEY')}}</label>
            </div>
            <div class="col-md-9">
                <input type="text" class="form-control" name="PUSHER_APP_KEY" value="{{  env('PUSHER_APP_KEY') }}" placeholder="{{ ('PUSHER APP KEY') }}" >
            </div>
        </div>

        <div class="form-group row">
            <input type="hidden" name="types[]" value="PUSHER_APP_SECRET">
            <div class="col-md-3">
                <label class="col-from-label">{{('PUSHER APP SECRET')}}</label>
            </div>
            <div class="col-md-9">
                <input type="text" class="form-control" name="PUSHER_APP_SECRET" value="{{  env('PUSHER_APP_SECRET') }}" placeholder="{{ ('PUSHER APP SECRET') }}" >
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
    
@endsection

