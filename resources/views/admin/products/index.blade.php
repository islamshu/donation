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
                    <li class="breadcrumb-item active">المنتجات</li>

                </ul>
            </div>
        </div>
    </div>
    <!-- Basic Table -->
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2 style="display: inline">المنتجات</h2>
                    <a class="btn btn-info" href="{{ route('products.create') }}">اضافة منتج جديد</a>
                 
                <div class="body">
                    <div class="table-responsive">
                        @include('admin.partials._success')
                        @include('admin.partials._error')
                        <table
                            class="table table-bordered table-striped table-hover js-basic-example dataTable">
                            <thead>
                                <tr>
                                    <th># </th>
                                    <th>اسم المنتج </th>
                                    <th>الكمية</th>
                                    <th>السعر</th>

                                    <th>الإجرائات</th>
                                   
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $key=>$item)
                                    
                                <tr>
                                    <td>{{ $key+1 }}</td>

                                    <td>{{ $item->name }}</td>   
                                    <td>{{ $item->stock }}</td>   
                                    <td>{{ $item->price }}</td>   

                        
                                    <td>
                                        <a  href="{{ route('products.show',encrypt($item->id)) }}" class="btn bg-lime btn-circle waves-effect waves-circle waves-float" >
                                            <i class="material-icons">remove_red_eye</i>
                                        </a>
                                        <a  href="{{ route('products.edit',encrypt($item->id)) }}" class="btn bg-blue btn-circle waves-effect waves-circle waves-float" >
                                            <i class="material-icons">edit</i>
                                        </a>
                                        <form style="display: inline" method="post" action="{{ route('products.destroy',$item->id) }}">
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
                                    <th>اسم المنتج </th>
                                    <th>الكمية</th>
                                    <th>السعر</th>

                                    <th>الإجرائات</th>
                                   
                                   
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

