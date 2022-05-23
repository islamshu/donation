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
                    <li class="breadcrumb-item active">الصفحات</li>

                </ul>
            </div>
        </div>
    </div>
    <!-- Basic Table -->
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2 style="display: inline">الصفحات</h2>
                 
                <div class="body">
                    <div class="table-responsive">
                        @include('admin.partials._success')
                        @include('admin.partials._error')
                        <table
                            class="table table-bordered table-striped table-hover js-basic-example dataTable">
                            <thead>
                                <tr>
                                    <th># </th>
                                    <th>اسم الصفحة  </th>

                                    <th>Action</th>
                                   
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pages as $key=>$item)
                                    
                                <tr>
                                    <td>{{ $key+1 }}</td>

                                    <td>{{ $item->title }}</td>   
                             
                                      

                        
                                    <td>
                                      
                                        <a  href="{{ route('pages.edit',$item->id) }}" class="btn bg-blue btn-circle waves-effect waves-circle waves-float" >
                                            <i class="material-icons">edit</i>
                                        </a>
                                       
                                 
                              
                                        
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th># </th>
                                    <th>اسم الصفحة  </th>

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

