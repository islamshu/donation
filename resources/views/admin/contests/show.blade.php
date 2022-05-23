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
                    <li class="breadcrumb-item active">المسابقات</li>

                </ul>
            </div>
        </div>
    </div>
    <!-- Basic Table -->
    <div class="row clearfix">
        <div class="col-lg-10 col-md-12 col-sm-12 col-xs-8">
            <div class="card">
                <div class="header">
                    <h2 style="display: inline">مسابقة {{ @$con->title_ar }}</h2>
                    @if(@$con->is_activity == 0)
                    <div class="row">
                        <div class="col-lg-3 col-md-6">
                            <div class="card bg-green total-card">
                                <div class="card-block">
                                    <div class="text-center p-t-30 p-b-30  ">
                                        <h3>عدد الأكواد المتاحة</h3>
                                        <p class="m-0">{{ @$con->remain_codes }}</p>
                                    </div>
                                </div>
                                <div  class="card-height-80"></div>

                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="card bg-orange total-card">
                                <div class="card-block">
                                    <div class="text-center p-t-30 p-b-30  ">
                                        <h3>إجمالي مشاهدات المسابقة</h3>
                                        <p class="m-0">{{ @$con->count_visitor }}</p>
                                    </div>
                                </div>
                                <div  class="card-height-80"></div>

                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="card bg-cyan total-card">
                                <div class="card-block">
                                    <div class="text-center p-t-30 p-b-30  ">
                                        <h3>عدد المشتركين بالمسابقة</h3>
                                        <p class="m-0">{{ @$con->contentns->count() }}</p>
                                    </div>
                                </div>
                                <div  class="card-height-80"></div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="card bg-purple total-card">
                                <div class="card-block">
                                    <div class="text-center p-t-30 p-b-30  ">
                                        <h3>الفائز</h3>
                                        <p class="m-0">{{ @$con->winner->name == null ? trans('error.no winner'):$con->winner->name }}</p>
                                    </div>
                                </div>
                                <div class="card-height-80"></div>
                            </div>
                        </div>
                    </div>
                    @else
                    <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="card bg-cyan total-card">
                            <div class="card-block">
                                <div class="text-center p-t-30 p-b-30  ">
                                    <h3>عدد المشتركين بالفعالية</h3>
                                    <p class="m-0">{{ @$con->contentns->count() }}</p>
                                </div>
                            </div>
                            <div  class="card-height-80"></div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="card bg-purple total-card">
                            <div class="card-block">
                                <div class="text-center p-t-30 p-b-30  ">
                                    <h3>الفائز</h3>
                                    <p class="m-0">{{ @$con->winner->name == null ? trans('error.no winner'):$con->winner->name }}</p>
                                </div>
                            </div>
                            <div class="card-height-80"></div>
                        </div>
                    </div>
                </div>
                    @endif
                    <div class="row clearfix">
                        <div class="col-lg-12 col-md-8 col-sm-8 col-xs-12">
                            <div class="card">
                            
                                <div class="body">
                                   @include('admin.partials._error')
                              
                                        <div class="row clearfix">
                                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                <label for="title_ar"> اسم المسابقة باللغة العربية </label>
                                            </div>
                                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <input readonly required type="text" value="{{ @$con->title_ar}}" name="title_ar" id="title_ar" class="form-control"
                                                            placeholder="اسم المسابقة باللغة العربية">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row clearfix">
                                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                <label for="title_en"> اسم المسابقة باللغة الانجليزية </label>
                                            </div>
                                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <input readonly required type="text" value="{{ @$con->title_en }}" name="title_en" id="title_en" class="form-control"
                                                            placeholder="اسم المسابقة باللغة الانجليزية">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row clearfix">
                                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                <label for="email_address_2"> اسم صاحب المسابفة </label>
                                            </div>
                                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <input readonly required type="text" value="{{ @$con->user->name }}" name="title_en" id="title_en" class="form-control"
                                                            placeholder="اسم المسابقة باللغة الانجليزية">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                      
                                        <div class="row clearfix">
                                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                <label for="title_en">الجائزة</label>
                                            </div>
                                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <input readonly required type="text" value="{{  @$con->prize }}" name="prize" id="prize" class="form-control"
                                                            placeholder="الجائزة">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row clearfix">
                                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                <label for="date_to_show">  تاريخ عرض المسابقة  </label>
                                            </div>
                                           
                                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <input readonly required type="text" value="{{@$con->date_to_show}}" name="date_to_show" id="date_to_show" class="form-control"
                                                            placeholder="عدد المتسابقين">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row clearfix">
                                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                <label for="date_to_drow">  تاريخ السحب   </label>
                                            </div>
                                         
                                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <input readonly required type="text" value="{{ @$con->date_to_drow }}" name="date_to_drow" id="date_to_drow" class="form-control"
                                                            placeholder=" تاريخ عرض المسابقة">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                      @if(@$con->is_activity == 1)
                                      <div class="row clearfix" id="codecontest"  >
                                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                            <label for="phone">  qr code </label>
                                        </div>
                                        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                            <div class="form-group">
                                                <div class="form-line">
                                                  <img src="{{ asset('uploads/'.@$con->actitvity->qr_code) }}" alt="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                        <div class="row clearfix" id="is_actitivty" >
                                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                <label for="phone">  موقع الفعالية  </label>
                                            </div>
                                            <div class="col-lg-5 col-md-5 col-sm-4 col-xs-3">
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <input readonly  type="number" value="{{@$con->actitvity->lat }}" name="lat" id="lat" class="form-control"
                                                            placeholder="خط العرض">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-5 col-md-5 col-sm-4 col-xs-3">
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <input readonly  type="number" value="{{ @$con->actitvity->long}}" name="long" id="long" class="form-control"
                                                            placeholder="خط الطول">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @else
                                        <div class="row clearfix" id="codecontest"  >
                                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                <label for="phone">  الرمز  </label>
                                            </div>
                                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <input readonly  type="number" value="{{@$con->code}}" required name="code" id="code" class="form-control"
                                                            placeholder="عدد المتسابقين">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row clearfix" id="codecontest"  >
                                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                <label for="phone">  عدد الأكواد </label>
                                            </div>
                                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <input readonly  type="number" value="{{@$con->total_codes}}" required name="code" id="code" class="form-control"
                                                            placeholder="عدد المتسابقين">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row clearfix" id="codecontest"  >
                                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                <label for="phone">  عدد الأكواد المتبقية </label>
                                            </div>
                                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <input readonly  type="number" value="{{@$con->remain_codes}}" required name="code" id="code" class="form-control"
                                                            placeholder="عدد المتسابقين">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endif
                                        
                                       

                                       
                                     
                                        <div class="row clearfix">
                                    
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
    $('#check_active').change(function () {    
       let status = this.checked;
       if(status == true){
        $("#is_actitivty").css("display", "flex");
        $("#codecontest").css("display", "none");
        $('#testtt').val('');
        $('#testtt').val(1);
        $('#code').removeAttr('required');
        $('#lat').attr('required', 'required');
        $('#long').attr('required', 'required');

       }else{
        $("#is_actitivty").css("display", "none");
        $("#codecontest").css("display", "flex");
        $('#testtt').val('');
        $('#testtt').val(0);
        $('#code').attr('required', 'required');
        $('#lat').removeAttr('required');
        $('#long').removeAttr('required');

        
       }
       

});  
</script>
    
@endsection

