@extends('layouts.admin')
@section('content')
<div class="container-fluid">
    <div class="block-header">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <ul class="breadcrumb breadcrumb-style ">
                    <li class="breadcrumb-item">
                        <h4 class="page-title">Contact List</h4>
                    </li>
                    <li class="breadcrumb-item bcrumb-1">
                        <a href="../../index.html">
                            <i class="fas fa-home"></i> Home</a>
                    </li>
                    <li class="breadcrumb-item bcrumb-2">
                        <a href="#" onClick="return false;">Apps</a>
                    </li>
                    <li class="breadcrumb-item active">Contact List</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="body">
                    <div class="table-responsive">
                        <table class="table table-hover js-basic-example ">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>رقم الطلب</th>
                                    <th>حالة الطلب</th>

                                    <th>مشاهدة</th>
                                    <th>الاجراءات</th>
                                </tr>
                            </thead>
                                <tbody>
                                    @foreach ($orders as $key=> $order)
                                        
                                    <tr>
                                        
                                        <td>{{ $key +1 }}</td>
                                        <td>{{ $order->code }}</td>
                                        <td>
                                           {!! getStatusForOrder($order) !!}
                                        </td>
                                            <td>@if($order->view  == 1)
                                                <div class="badge col-green">تمت المشاهدة</div>
                                            </td>@else
                                            <div class="badge col-red">غير مشاهد </div>
                                            @endif

                                        <td>
                                          
                                            <a   class="btn tblActnBtn" href="{{ route('orders.show',encrypt($order->id)) }}">  
                                                <i class="material-icons">remove_red_eye</i> 
                                            </a>
                                            
                                            
                                        </td>
                                    </tr>
                                    @endforeach
                                  
                                  
                                </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    
@endsection