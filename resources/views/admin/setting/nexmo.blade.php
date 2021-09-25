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
            <input type="hidden" name="types[]" value="NEXMO_KEY">
            <div class="col-md-3">
                <label class="col-from-label">{{('NEXMO KEY')}}</label>
            </div>
            <div class="col-md-9">
                <input type="text" class="form-control" name="NEXMO_KEY" value="{{  env('NEXMO_KEY') }}" placeholder="{{ ('NEXMO KEY') }}">
            </div>
        </div>
        <div class="form-group row">
            <input type="hidden" name="types[]" value="NEXMO_SECRET">
            <div class="col-md-3">
                <label class="col-from-label">{{('NEXMO SECRET')}}</label>
            </div>
            <div class="col-md-9">
                <input type="text" class="form-control" name="NEXMO_SECRET" value="{{  env('NEXMO_SECRET') }}" placeholder="{{ ('NEXMO SECRET') }}" >
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

