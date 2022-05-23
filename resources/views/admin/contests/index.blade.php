@extends('layouts.admin')
@section('content')
@section('css')
    <style>
        .dropdown-trigger{
            display: none !important;
        }
    </style>
@endsection
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
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2 >المسابقات</h2>
                    <br>
                    <a style="display: inline-block" class="btn btn-info" href="{{ route('contests.create') }}">اضف مسابقة  جديدة</a>
                    @if(Route::is('only-contests'))
                 <form  style="display: inline-block;direction: ltr;width: 80%;" action="{{ route('only-contests') }}" method="get" >
                    @elseif(Route::is('only-activites'))
                    <form  style="display: inline-block;direction: ltr;width: 80%;" action="{{ route('only-activites') }}" method="get" >
                        @endif
                <div class="row clearfix" @if(Route::is('contests.index')) style="display: none" @endif>
                <div class="row">
                    <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
                        <div class="form-group">
                            
                            <input type="submit" class="btn btn-info" value="فلتر">

                        </div>
                        
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                        <div class="form-group">
                            <div class="form-line">
                                <select name="status" class="form-control" id="" style="text-align: right">
                                    <option disabled selected value="">عرص حسب الحالة</option>

                                    <option value="1" @if(@$request->status == 1) selected @endif>فعالة</option>
                                    <option value="2"@if(@$request->status == 2) selected @endif>منتهية</option>
                                    <option value="3"@if(@$request->status == 3) selected @endif>فعالة لكن مكتمل العدد</option>
                                </select>

                            </div>

                        </div>
                        
                    </div>
                    
                </div>
                </div>
                </form>
                <div class="body">
                    <div class="table-responsive">
                        @include('admin.partials._success')
                        @include('admin.partials._error')
                        <table
                            class="table table-bordered table-striped table-hover js-basic-example dataTable">
                            <thead>
                                <tr>
                                    <th># </th>
                                    <th>اسم المسابقة  </th>
                                    <th>اسم صاحب المسابقة   </th>
                                    <th> نوع المسابقة    </th>
                                    <th>حالة المسابقة </th>


                                    <th>Action</th>
                                   
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($contests as $key=>$item)
                                    
                                <tr>
                                    <td>{{ $key+1 }}</td>

                                    <td>{{ $item->title_ar }}</td>   
                             
                                    <td>{{ $item->user->name }}</td>   
                                    <td>{{$item->is_activity ==1 ? 'فعالية' : 'مسابقة' }}</td>   
                                    <td>{!! get_status($item) !!}</td>   


                        
                                    <td>
                                        <a  href="{{ route('contests.show',$item->id) }}" class="btn bg-green btn-circle waves-effect waves-circle waves-float" >
                                            <i class="material-icons">remove_red_eye</i>
                                        </a>
                                        <a  href="{{ route('contests.edit',$item->id) }}" class="btn bg-blue btn-circle waves-effect waves-circle waves-float" >
                                            <i class="material-icons">edit</i>
                                        </a>
                                        <form style="display: inline" method="post" action="{{ route('contests.destroy',$item->id) }}">
                                            @method('delete') @csrf
    
                                            <button class=" btn bg-red btn-circle waves-effect waves-circle waves-float delete-confirm" type="submit" > <i class="material-icons">clear</i></button>
                                        </form>
                                 
                              
                                        
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th># </th>
                                    <th>اسم المسابقة  </th>
                                    <th>اسم صاحب المسابقة   </th>
                                    <th> نوع المسابقة    </th>
                                    <th>حالة المسابقة </th>


                                    <th>Action</th>
                                   
                                   
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- #END# Basic Table -->
    <!-- Striped Rows -->
  
@endsection

