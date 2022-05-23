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
                    <li class="breadcrumb-item active">طلبات الجوائز</li>

                </ul>
            </div>
        </div>
    </div>
    <!-- Basic Table -->
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2 style="display: inline">طلبات الجوائز</h2>
                 
                <div class="body">
                    <div class="table-responsive">
                        @include('admin.partials._success')
                        @include('admin.partials._error')
                        <table
                            class="table table-bordered table-striped table-hover js-basic-example dataTable">
                            <thead>
                                <tr>
                                    <th># </th>
                                    <th>اسم الفائز </th>
                                    <th>اسم المسابقة </th>
                                    <th>Action</th>
                                   
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($prizes as $key=>$item)
                                    
                                <tr>
                                    <td>{{ $key+1 }}</td>

                                    <td><a href="{{ route('users.show',@$item->user->id ) }}">{{ @$item->user->name }}</a></td>   
                                    <td><a href="{{ route('contests.show', @$item->contest->id) }}">{{ @$item->contest->title_ar }}</a> </td>   

                                    <td>
                                        <a  href="{{ route('prize_reauests.show',$item->id) }}" class="btn bg-blue btn-circle waves-effect waves-circle waves-float" >
                                            <i class="material-icons">remove_red_eye</i>
                                        </a>
                                       
                                 
                              
                                        
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th># </th>
                                    <th>اسم الفائز </th>
                                    <th>اسم المسابقة </th>
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

