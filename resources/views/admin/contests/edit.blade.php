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
        <div class="col-lg-8 col-md-12 col-sm-12 col-xs-8">
            <div class="card">
                <div class="header">
                    <h2 style="display: inline">أضافة مسابقة</h2>
                 
                    <div class="row clearfix">
                        <div class="col-lg-12 col-md-8 col-sm-8 col-xs-12">
                            <div class="card">
                            
                                <div class="body">
                                   @include('admin.partials._error')
                                    <form class="form-horizontal" method="post" action="{{ route('contests.update',@$con->id) }}">
                                        @csrf @method('put')
                                        <div class="row clearfix">
                                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                <label for="title_ar"> اسم المسابقة باللغة العربية </label>
                                            </div>
                                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <input required type="text" value="{{@$con->title_ar }}" name="title_ar" id="title_ar" class="form-control"
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
                                                        <input required type="text" value="{{@$con->title_en  }}" name="title_en" id="title_en" class="form-control"
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
                                                        <select name="user_id" class="form-control" >
                                                            @foreach ($users as $item)
                                                                
                                                            
                                                            <option value="{{ $item->id }}" @if(@$con->user_id  == $item->id) selected @endif>{{ $item->name }}</option>
                                                            @endforeach
                                                        </select>
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
                                                        <input required type="text" value="{{ @$con->prize }}" name="prize" id="prize" class="form-control"
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

                                                        <input required type="datetime" value="{{ $con->date_to_show}}" name="date_to_show" id="date_to_show" class="form-control"
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
                                                        <input required type="datetime" value="{{ $con->date_to_drow }}" name="date_to_drow" id="date_to_drow" class="form-control"
                                                            placeholder=" تاريخ عرض المسابقة">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row clearfix">
                                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                <label for="type">  هل هي فاعلية</label>
                                            </div>
                                            
                                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <div class="demo-switch">
                                                            <div class="switch">
                                                                <label>
                                                                    <input type="checkbox"  @if(@$con->is_activity ==1 ) checked @endif name="test"
                                                                    id="check_active" >
                                                                    <span class="lever"></span></label>
                                                            </div>
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row clearfix" id="is_actitivty" @if(@$con->is_activity != 1 )  style="display: none" @endif>
                                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                <label for="phone">  موقع الفعالية  </label>
                                            </div>
                                            <div class="col-lg-5 col-md-5 col-sm-4 col-xs-3">
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <input  type="number" value="{{ @$con->actitvity->lat }}" name="lat" id="lat" class="form-control"
                                                            placeholder="خط العرض">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-5 col-md-5 col-sm-4 col-xs-3">
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <input  type="number" value="{{@$con->actitvity->long }}" name="long" id="long" class="form-control"
                                                            placeholder="خط الطول">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row clearfix" id="codecontest"  @if(@$con->is_activity == 1 )  style="display: none" @endif  >
                                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                <label for="phone">  عدد المتسابقين </label>
                                            </div>
                                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <input  type="number" value="{{ @$con->total_codes }}" required name="code" id="code" class="form-control"
                                                            placeholder="عدد المتسابقين">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <input type="text" style="display: none"  name="is_activity" id="testtt">
                                        
                                        
                                       

                                       
                                     
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

@section('script')
<script>
    $('#check_active').change(function () {    
       let status = this.checked;
       if(status == true){
        $("#is_actitivty").css("display", "flex");
        $("#codecontest").css("display", "none");
        $('#testtt').attr('value',1)

        $('#code').removeAttr('required');
        $('#lat').attr('required', 'required');
        $('#long').attr('required', 'required');

       }else{
        $("#is_actitivty").css("display", "none");
        $("#codecontest").css("display", "flex");
        $('#testtt').attr('value',0)
        // $('#testtt').val(0);

        $('#code').attr('required', 'required');
        $('#lat').removeAttr('required');
        $('#long').removeAttr('required');

        
       }
       

});  
</script>
    
@endsection

