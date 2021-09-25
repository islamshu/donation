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
                    <li class="breadcrumb-item active">الفروع</li>

                </ul>
            </div>
        </div>
    </div>
    <!-- Basic Table -->
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2 style="display: inline">الفروع</h2>
                    <button style="display: inline" type="button" class="btn btn-info" data-bs-toggle="modal"
                    data-bs-target="#exampleModalBranches">اضافة فرع</button>
                    <div class="modal fade" id="exampleModalBranches" tabindex="-1" role="dialog"
                                        aria-labelledby="formModal" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="formModal">اضافة فرع</h5>                                                 
                                                </div>
                                                <div class="modal-body">
                                                    <form method="post" action="{{ route('brancehs.store') }}">
                                                        @csrf
                                                        <label for="title">اسم الفرع</label>
                                                        <div class="form-group">
                                                            <div class="form-line">
                                                                <input required type="text" id="title"
                                                                    class="form-control"
                                                                    name="title"
                                                                    placeholder="ادخل اسم الفرع">
                                                            </div>
                                                        </div>
                                                        
                                                      
                                                        <br>
                                                        <input class="btn btn-primary m-t-15 waves-effect" type="submit" value="حفظ">
                                                        
                                                    </form>
                                                </div>
                                               
                                            </div>
                                        </div>
                                    </div>
                </div>
                <div class="body">
                    <div class="table-responsive">
                        @include('admin.partials._success')
        @include('admin.partials._error')
                        <table
                            class="table table-bordered table-striped table-hover js-basic-example dataTable">
                            <thead>
                                <tr>
                                    <th>اسم الفرع</th>
                                    <th>الإحراءات</th>

                                   
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($branches as $item)
                                    
                                <tr>
                                    <td>{{ $item->title }}</td>
                                    <td>
                                        <a  href="{{ route('brancehs.edit',$item->id) }}" class="btn bg-blue btn-circle waves-effect waves-circle waves-float" >
                                            <i class="material-icons">edit</i>
                                        </a>
                                        <form style="display: inline" method="post" action="{{ route('brancehs.destroy',$item->id) }}">
                                            @method('delete') @csrf
    
                                            <button class=" btn bg-red btn-circle waves-effect waves-circle waves-float delete-confirm" type="submit" > <i class="material-icons">clear</i></button>
                                        </form>
                                        
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Name</th>
                                   
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

