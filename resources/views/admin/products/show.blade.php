@extends('layouts.admin')
@section('content')
<div class="container-fluid">
    
    <div class="block-header">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <ul class="breadcrumb breadcrumb-style ">
                    <li class="breadcrumb-item">
                        <h4 class="page-title">معلومات المنتج</h4>
                    </li>
                    <li class="breadcrumb-item bcrumb-1">
                        <a href="{{ route('admin.dashboard') }}">
                            <i class="fas fa-home"></i> الرئيسية</a>
                    </li>
                    <li class="breadcrumb-item bcrumb-2">
                        <a href="{{ route('all_item') }}" >المنتجات</a>
                    </li>
                    <li class="breadcrumb-item active">معلومات المنتج</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="body">
                    
                    <div class="card-body ">
                        <div class="product-store">
                            <div class="row">
                                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                                    <div class="product-gallery">
                                        <div class="product-gallery-thumbnails">
                                            <ol class="thumbnails-list list-unstyled">
                                             
                                                
                                                @foreach (json_decode($product->image) as $item)
                                                   
                                               
                                                <li><img src="{{ asset('uploads/'.$item) }}" alt=""></li>
                                                @endforeach
                                                
                                            </ol>
                                        </div>
                                        <div class="product-gallery-featured">
                                            @foreach (json_decode($product->image) as $item)
                                                   
                                            @if($loop->first)   
                                           
                                                <img src="{{ asset('uploads/'.$item) }}" alt="">
                                            
                                            @endif
                                            @endforeach                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                                    <div class="product-payment-details">
                                        <h4 class="product-title mb-2">{{ $product->name }} </h4>
                                        @if(auth()->user()->hasRole('اداري'))
                                        <h2 class="product-price display-4">OM {{ $product->price }}</h2>
                                  
                                    
                                        <p><i class="fas fa-cart-plus"></i> الكمية المتوفرة : <strong>{{ $product->stock }}</strong> </p>
                                        @endif
                                    
                                        
                                        {{-- <a href="{{ route('add.to.cart', $product->id) }}" class="btn btn-warning btn-block text-center" role="button">Add to cart</a> --}}
                                        @if( getstatus( $product->id ) == 0 )
                                <input class="btn btn-info update_cart" true="{{ getstatus( $product->id ) }}"  type="button" naa="{{ $product->id }}" value="اضف الى السلة" >
                                @else
                                <input class="btn btn-danger update_cart" true="{{ getstatus( $product->id ) }}"  type="button" naa="{{ $product->id }}" value=" الاضافة" >
                        @endif
                                    
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
 
</div>
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="body">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs tab-nav-right" role="tablist">
                   
                    <li role="presentation">
                        <a href="#profile" data-bs-toggle="tab">وصف العنصر</a>
                    </li>
                   
                </ul>
                <!-- Tab panes -->
                <div class="tab-content">
                
                    <div role="tabpanel" class="tab-pane fade active show" id="profile">
                        <div class="product-description">
                         @if($product->description != null)
                            {!! $product->description !!}
                            @else
                            لا يوجد وصف لهذا العنصر
                            @endif
                        </div>
                    </div>
                  
                </div>
            </div>
        </div>
    </div>
</div>
    
@endsection
@section('script')
<script src="{{ asset('assets/js/pages/ecommerce/product-detail.js') }}"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

@section('script')

<script>
    
        function updateNavCart(){
            $.post('{{ route('updateNavCart') }}', {"_token": "{{csrf_token()}}"}, function(data){
                $('#cart_items').html(data);
            });
        }
   
    $( document ).ready(function() {
    //     $(".addToCart").click(function(){
    //         var id = $(this).attr('product_id');
    //         var thisContext = this;

    //         $.ajax({
    //     type: "post",
    //     dataType: "json",
    //     url: '{{ route('add.to.cart') }}',
    //     data: { "_token": "{{csrf_token()}}",'product_id':id }, 
    //     success: function (data) {
    //                    $(thisContext).val("حذف من السلة");  
    //                    $( thisContext ).removeClass( "btn-warning" ).addClass( "btn-danger" );
    //                    $( thisContext ).removeClass( "addToCart" ).addClass( "removeFromCart" );
              
    //         updateNavCart();
    //       }      
        
    // });          
    //     });
    //     $(".removeFromCart").click(function(){
    //         var id = $(this).attr('product_id');
    //         var thisContext = this;

    //                    $(thisContext).val("اضف الى السلة");  
    //                    $( thisContext ).removeClass( "btn-danger" ).addClass( "btn-warning" );
    //                    $( thisContext ).removeClass( "removeFromCart" ).addClass( "addToCart" );          
    //     });

    $(".update_cart").click(function(){
          
          var product_id = $(this).attr('naa');
            var is_ture = $(this).attr('true');
      
          var thisContext = this;
          
              if(is_ture == 0){
                   $.ajax({
              type: "post",
            url: '{{ route('add.to.cart') }}',
        data: { "_token": "{{csrf_token()}}",'product_id':product_id }, 
              success: function (data) {
                    //    AIZ.plugins.notify('success', 'متابعة');

                      $(thisContext).val("حذف من السلة");  
                       $( thisContext ).removeClass( "btn-info" ).addClass( "btn-danger" );
                          $(thisContext).removeAttr("disabled"); 
                      $(thisContext).attr('true', 1)
                  
                              updateNavCart();

                 
              }
          });
              }else if(is_ture == 1){
            
                  swal({
title: "هل أنت متأكد من حذف العنصر من  السلة ؟",
icon: "warning",
buttons: true,
dangerMode: true,
})
.then((willDelete) => {
if (willDelete) {
    
    var product_id = $(this).attr('naa');
            var is_ture = $(this).attr('true');
    
          var thisContext = this;

                   $.ajax({
              type: "delete",
              url: "{{ route('remove.from.cart') }}", // need to create this route
              data: { "_token": "{{csrf_token()}}",'id':product_id },
              success: function (data) {
        
                          $(thisContext).val("اضف الى السلة");  
                          $( thisContext ).removeClass( "btn-danger" ).addClass( "btn-info" );
                          $(thisContext).removeAttr("disabled");
                          $(thisContext).attr('true', 0)
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
@endsection
