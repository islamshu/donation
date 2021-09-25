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
                    <li class="breadcrumb-item active">المستخدمين</li>

                </ul>
            </div>
        </div>
    </div>
    <!-- Basic Table -->
    <div class="row clearfix">
        <div class="col-lg-8 col-md-12 col-sm-12 col-xs-8">
            <div class="card">
                <div class="header">
                    <h2 style="display: inline">إضافة مستخدم</h2>
                 
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
                                    <form class="form-horizontal" method="post" action="{{ route('users.update',$user->id) }}">
                                        @csrf @method('put')
                                        <div class="row clearfix">
                                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                <label for="email_address_2"> اسم المستخدم </label>
                                            </div>
                                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <input required type="text" value="{{ $user->name }}" name="name" id="name" class="form-control"
                                                            placeholder="ادخل اسم المستخدم">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row clearfix">
                                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                <label for="email_address_2"> البريد الإلكتروني</label>
                                            </div>
                                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <input required type="email" value="{{$user->email }}" name="email" id="email_address_2" class="form-control"
                                                            placeholder="ادخل البريد الالكتروني">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row clearfix">
                                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                <label for="phone"> رقم الهاتف </label>
                                            </div>
                                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <input required type="number" value="{{ $user->phone }}" name="phone" id="phone" class="form-control"
                                                            placeholder="الهاتف">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row clearfix">
                                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                <label for="type"> نوع المستخدم</label>
                                            </div>
                                            
                                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <select required  value="{{ $user->type }}" class="form-control"  name="type" id="user_type">
                                                            <option value=""  disabled>نوع المستخدم</option>
                                                            <option value="user" @if($user->type == 'user'  ) selected  @endif  >مستخدم </option>
                                                            <option value="famous" @if($user->type == 'famous'  )  selected @endif   >مشهور</option>

                                                            
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row clearfix">
                                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                <label for="branches"> الجنس</label>
                                            </div>
                                            
                                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <select required  value="{{ $user->gender }}" class="form-control"  name="gender" id="gender">
                                                            <option value="" selected disabled>الجنس</option>
                                                            <option value="1" @if($user->gender == 1   )selected @endif >ذكر</option>
                                                            <option value="2" @if($user->gender == 2 )selected  @endif  >انثى</option>

                                                            
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                       

                                        <div class="row clearfix">
                                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                <label for="branches"> المدينة</label>
                                            </div>
                                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <select required  value="{{$user->address_id }}" class="form-control"  name="address_id" id="address_id">
                                                            <option value=""  disabled>المدينة</option>
                                                            @foreach ($citys as $item)
                                                                
                                                          
                                                            <option value="{{ $item->id }}" @if($user->address_id == $item->id) selected @endif>{{ $item->name_ar }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div @if($user->type == 'famous') style="display: none" @endif class="row clearfix"    id="dateOf">
                                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                <label for="date">تاريخ الميلاد</label>
                                            </div>
                                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                                <div class="form-group">
                                                    <div  class="form-line">
                                                        <input required name="DOB" value="{{ $user->DOB }}"   type="date" id="DOB" class="form-control"
                                                            placeholder="تاريخ الميلاد  ">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                   
                                        <div class="row clearfix">
                                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                <label for="password_2">كلمة المرور</label>
                                            </div>
                                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                                <div class="form-group">
                                                    <div  class="form-line">
                                                        <input  name="password"  type="password" id="password_2" class="form-control"
                                                            placeholder="ادخل كلمة المرور">
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

