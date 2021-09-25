@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="block-header">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <ul class="breadcrumb breadcrumb-style ">
               
                    <li class="breadcrumb-item bcrumb-1">
                        <a href="{{ route('admin.dashboard') }}">
                            <i class="fas fa-home"></i> الرئيسية</a>
                    </li>
                    <li class="breadcrumb-item active">تعديل صفحة  </li>


                </ul>
            </div>
        </div>
    </div>
    <!-- Basic Table -->
    <div class="row clearfix">
        <div class="col-lg-8 col-md-12 col-sm-12 col-xs-8">
            <div class="card">
                <div class="header">
                    <h2 style="display: inline">تعديل صفحة  </h2>
                 
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
                                    <form class="form-horizontal" method="post" action="{{ route('pages.update',$page->id) }}" enctype="multipart/form-data">
                                        @csrf @method('put')
                                        <div class="row clearfix">
                                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                <label for="title"> عنوان الصفحة    </label>
                                            </div>
                                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <input required type="text" value="{{$page->title }}" name="title" id="title" class="form-control"
                                                            placeholder="ادخل عنوان الصفحة  ">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row clearfix">
                                          <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                              <label for="name_en"> الموضوع باللغة العربية    </label>
                                          </div>
                                          <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                              <div class="form-group">
                                                  <div class="form-line">
                                                      <textarea name="dec_ar" placeholder="الموضوع باللغة العربية" class="form-control ckeditor" id="ckeditor"  cols="30" rows="10">{{$page->dec_ar}}</textarea>
                                                  
                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                                      <div class="row clearfix">
                                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                            <label for="name_en"> الموضوع باللغة الانجليزية    </label>
                                        </div>
                                        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <textarea name="dec_en"  placeholder="الموضوع باللغة الانجليزية" class="form-control ckeditor" id="ckeditor"cols="30" rows="10">{{$page->dec_en}}</textarea>
                                                
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                      
                                       
                                        <div class="row clearfix">
                                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5">
                                            </div>
                                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                                <input  type="submit"  value="حفظ" class="filled-in btn btn-info">
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

