@extends('layouts.admin')
@section('content')
<div class="container-fluid">
    <div class="block-header">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <ul class="breadcrumb breadcrumb-style ">
                    <li class="breadcrumb-item">
                        <a href=""><h4 class="page-title">الرئيسية </h4></a>
                        
                    </li>
                   
                    <li class="breadcrumb-item active">جميع المنتجات</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="row clearfix">
        <!-- Line Chart -->
     
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="body">
                <div class="row">
                    @foreach ($products as $product)
                    <div class="col-md-3 col-sm-6">
                        <div class="product-grid">
                            <div class="product-image">
                                <a>
                                    @foreach (json_decode($product->image) as $item)

                            @if($loop->first)   
                                <img  class="pic-1" src="{{ asset('uploads/'.$item) }}" width="50" height="40" alt="">
                            @endif
                            @endforeach
                                </a>
                                <div class="container">
                                    {{-- {{  }} --}}
                                <div class="overlayy"><a style="color: white" href="{{ route('products.show',encrypt($product->id)) }}">
                                    {!! \Illuminate\Support\Str::limit($product->description, 70, $end='...') !!}</a></div>
                                </div>
                             
                            </div>
                         
                            <div class="product-content">
                                <h3 class="title"><a href="{{ route('products.show',encrypt($product->id)) }}">{{ $product->name }}</a></h3>
                               @if( getstatus( $product->id ) == 0 )
                                <input class="btn btn-warning addToCart"   type="button" product_id="{{ $product->id }}" value="اضف الى السلة" >
                                @else
                                <input class="btn btn-info addToCart" disabled  type="button" product_id="{{ $product->id }}" value="تمت الاضافة" >
                        @endif
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
          
  
        <!-- #END# Line Chart -->
    </div>
</div>
@endsection
@section('script')

<script>
    
        function updateNavCart(){
            $.post('{{ route('updateNavCart') }}', {"_token": "{{csrf_token()}}"}, function(data){
                $('#cart_items').html(data);
            });
        }
   
    $( document ).ready(function() {
        $(".addToCart").click(function(){
            var id = $(this).attr('product_id');
            var thisContext = this;

            $.ajax({
        type: "post",
        dataType: "json",
        url: '{{ route('add.to.cart') }}',
        data: { "_token": "{{csrf_token()}}",'product_id':id }, 
        success: function (data) {
                       $(thisContext).val("تمت الاضافة");  
                       $( thisContext ).removeClass( "btn-warning" ).addClass( "btn-info" );
                       $( thisContext ).attr('disabled', 'disabled');

                   

                 
                          
                        
            updateNavCart();
          }      
        
    });          
        });
       


        
});
</script>
@endsection