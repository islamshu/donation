@extends('layouts.admin')
@section('css')

@endsection
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
                    @if( !Route::is('user.paned'))

                    <li class="breadcrumb-item active">المستخدمين</li>
                    @else
                    <li class="breadcrumb-item active">المستخدمين المحظروين</li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
    <!-- Basic Table -->
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    @if( !Route::is('user.paned'))
                    <h2 style="display: inline">المستخدمين</h2>
                    <a class="btn btn-info" href="{{ route('users.create') }}">اضف مستخدم جديد</a>
                    @else
                    <h2 style="display: inline">المستخدمين المحظروين</h2>
                    @endif
                 
                <div class="body">
                    <div class="table-responsive">
                        @include('admin.partials._success')
                        @include('admin.partials._error')
                        <table id="table"
                            class="table table-bordered table-striped table-hover js-basic-example dataTable">
                            <thead>
                                <tr>
                                    <th># </th>
                                    <th>الصورة </th>
                                    <th>اسم المستخدم</th>
                                    <th>البريد الإلكتروني </th>
                                    <th>النوع</th>
                                   @if(Route::is('users.famous'))
                                    <th>اثبات الحساب</th>
                                    @endif
                                    {{-- <th>الدور</th> --}}
                                    <th>الإجرائات</th>
                                   
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $key=>$item)
                                    
                                <tr>
                                    <td>{{ $key+1 }}</td>

                                    <td style="text-align: center"><img src="{{ asset('uploads/'.$item->image) }}" width="60" height="60" alt="{{ $item->name }}"></td>
                                    <td>{{ $item->name }}</td>   
                                    <td>{{ $item->email }}</td>   
                                    <td>{{ $item->type }}</td> 
                                    @if(Route::is('users.famous'))
                                    @if($item->verify == 0)
                                    <th><input class="btn btn-success update_cart" true="0" type="button" naa="{{ $item->id }}" value="تفعيل"></th>
                                    @else
                                    <th><input class="btn btn-danger update_cart" true="1" type="button" naa="{{ $item->id }}" value="الفاء تفعيل"></th>
                                @endif
                                    @endif                                    <td>
                                        <a  href="{{ route('users.show',$item->id) }}" class="btn bg-green btn-circle waves-effect waves-circle waves-float" >
                                            <i class="material-icons">remove_red_eye</i>
                                        </a>
                                        <a  href="{{ route('users.edit',$item->id) }}" class="btn bg-blue btn-circle waves-effect waves-circle waves-float" >
                                            <i class="material-icons">edit</i>
                                        </a>

                                        @if(Route::is('user.paned'))
                                       
                                        <form style="display: inline" method="get" action="{{ route('user.unpan',$item->id) }}">
                                            
    
                                            <button class="btn bg-black unpen   btn-circle waves-effect waves-circle waves-float" type="submit" > <i class="material-icons">lock_open</i></button>
                                        </form>
                                        @else
                                        <form style="display: inline" method="get" action="{{ route('user.pan',$item->id) }}">
                                            
    
                                            <button class="btn bg-black pen   btn-circle waves-effect waves-circle waves-float" type="submit" > <i class="material-icons">lock</i></button>
                                        </form>     
                                        @endif

                                          
                                        <form style="display: inline" method="post" action="{{ route('users.destroy',$item->id) }}">
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
                                    <th>الصورة </th>
                                    <th>اسم المستخدم</th>
                                    <th>البريد الإلكتروني </th>
                                    <th>النوع</th>
                                    @if(Route::is('users.famous'))
                                    <th>اثبات الحساب</th>
                                    @endif
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

@section('script')
    <script>
         $( document ).ready(function() {
  

  $(".update_cart").click(function(){
        
        var id = $(this).attr('naa');
          var is_ture = $(this).attr('true');
    
        var thisContext = this;
        
            if(is_ture == 0){
                 $.ajax({
            type: "post",
            url: '{{ route('users.verfy_account') }}',
      data: { "_token": "{{csrf_token()}}",'id':id ,'status':1}, 
            success: function (data) {
                  //    AIZ.plugins.notify('success', 'متابعة');

                    $(thisContext).val("إلغاء التفعيل  ");  
                    $( thisContext ).removeClass( "btn-success" ).addClass( "btn-danger" );
                        $(thisContext).removeAttr("disabled"); 
                    $(thisContext).attr('true', 1);
                  $(thisContext).attr('disabled','disabled');
  setTimeout(function() {
      $('.update_cart').attr('disabled',false);
  },2000);
                            updateNavCart();

               
            }
        });
            }else if(is_ture == 1){
          
                swal({
title: "هل أنت متأكد من إلغاء تفعيل المشهور     ؟",
icon: "warning",
buttons: true,
dangerMode: true,
})
.then((willDelete) => {
if (willDelete) {
  
  var id = $(this).attr('naa');
          var is_ture = $(this).attr('true');
  
        var thisContext = this;

                 $.ajax({
            type: "post",
            url: '{{ route('users.verfy_account') }}',
            data: { "_token": "{{csrf_token()}}",'id':id ,'status':0}, 
            success: function (data) {
      
                        $(thisContext).val("تفعيل");  
                        $( thisContext ).removeClass( "btn-danger" ).addClass( "btn-success" );
                        $(thisContext).removeAttr("disabled");
                        $(thisContext).attr('true', 0);
                             $(thisContext).attr('disabled','disabled');
  setTimeout(function() {
      $('.update_cart').attr('disabled',false);
  },2000);
          updateNavCart();

            }
        });

}
});
                
                
                
        
            }
       
    
    });

      
});
    </script>
@endsection

