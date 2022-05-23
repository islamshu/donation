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
                    <li class="breadcrumb-item active">تعديل {{ $city->name_ar }} </li>


                </ul>
            </div>
        </div>
    </div>
    <!-- Basic Table -->
    <div class="row clearfix">
        <div class="col-lg-8 col-md-12 col-sm-12 col-xs-8">
            <div class="card">
                <div class="header">
                    <h2 style="display: inline">تعديل {{ $city->name_ar }}  </h2>
                 
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
                                    <form class="form-horizontal" method="post" action="{{ route('city.update',$city->id) }}" enctype="multipart/form-data">
                                        @csrf @method('put')
                                        <div class="row clearfix">
                                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                <label for="email_address_2"> اسم المدينة بالعربية  <span style="color: red;font-size: 18px"> * </span></label>
                                            </div>
                                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <input required type="text" value="{{ $city->name_ar }}" name="name_ar" id="name_ar" class="form-control"
                                                            placeholder="ادخل اسم المدينة بالعربية">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row clearfix">
                                          <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                              <label for="name_en"> اسم المدينة بالانجليزية  <span style="color: red;font-size: 18px"> * </span></label>
                                          </div>
                                          <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                              <div class="form-group">
                                                  <div class="form-line">
                                                      <input required type="text" value="{{ $city->name_en }}" name="name_en" id="name_en" class="form-control"
                                                          placeholder="ادخل اسم المدينة بالانجليزية">
                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                                      
                                       
                                        <div class="row clearfix">
                                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5">
                                            </div>
                                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                                <input  type="submit" value="{{ __('save') }}"  class="filled-in btn btn-info">
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

