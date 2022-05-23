@extends('layouts.admin')
@section('content')
<div class="container-fluid">
    <div class="block-header">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <ul class="breadcrumb breadcrumb-style ">
               
                    <li class="breadcrumb-item bcrumb-1">
                        <a href="{{ route('admin.dashboard') }}">
                            <i class="fas fa-home"></i> @lang('Home')</a>
                    </li>
                    <li class="breadcrumb-item active">طلب بولصية شحن</li>

                </ul>
            </div>
        </div>
    </div>
    <!-- Basic Table -->
    <div class="row clearfix">
        <div class="col-lg-8 col-md-12 col-sm-12 col-xs-8">
            <div class="card">
                <div class="header">
                    <h2 style="display: inline">طلب بولصية شحن</h2>
                 
                    <div class="row clearfix">
                        <div class="col-lg-12 col-md-10 col-sm-8 col-xs-12">
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
                                    <form class="form-horizontal" >
                                        <div class="row clearfix">
                                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                <label for="email_address_2">  بيانات الفائز </label>
                                            </div>
                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        {{-- <input required value="{{ @$prize->user->name }}" readonly name="name" id="name" class="form-control"
                                                            > --}}
                                                  <a class="form-control" target="_blank" href="{{ route('users.show', @$prize->user->id) }}">{{ @$prize->user->name }}</a>
                                                        </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-3 col-xs-3">
                                                <div class="form-group">
                                                    <div class="form-line">
                                                       
                                                            <a class="form-control" target="_blank" href="mailto:{{ @$prize->user->email }}">{{ @$prize->user->email }}</a>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <a class="form-control" target="_blank" href="tel::{{ @$prize->user->phone }}">{{ @$prize->user->phone }}</a>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row clearfix">
                                            <div class="col-lg-2 col-md-1 col-sm-4 col-xs-5 form-control-label">
                                                <label for="email_address_2"> عنوان المسابقة </label>
                                            </div>
                                            <div class="col-lg-5 col-md-5 col-sm-5 col-xs-3">
                                                <div class="form-group">
                                                    <div class="form-line">
                                                      
                                                            <a class="form-control" target="_blank" href="{{ route('contests.show',  @$prize->contest->id) }}">{{  @$prize->contest->title_ar }}</a>

                                                    </div>
                                                </div>
                                            </div>
                                           
                                        </div>
                                        
                                        <div class="row clearfix">
                                            <div class="col-lg-2 col-md-1 col-sm-4 col-xs-5 form-control-label">
                                                <label for="email_address_2"> اسم صاحب المسابقة </label>
                                            </div>
                                            <div class="col-lg-5 col-md-5 col-sm-5 col-xs-3">
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <a class="form-control" target="_blank" href="{{ route('users.show', @$prize->contest->user->id) }}">{{ @$prize->contest->user->name }}</a>

                                                    </div>
                                                </div>
                                            </div>
                                           
                                        </div>
                                        <div class="row clearfix">
                                            <div class="col-lg-2 col-md-1 col-sm-4 col-xs-5 form-control-label">
                                                <label for="email_address_2"> جائزة المسابقة</label>
                                            </div>
                                            <div class="col-lg-5 col-md-5 col-sm-5 col-xs-3">
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <input required value="{{ @$prize->contest->prize }}" readonly name="name" id="name" class="form-control"
                                                            >
                                                    </div>
                                                </div>
                                            </div>
                                           
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

