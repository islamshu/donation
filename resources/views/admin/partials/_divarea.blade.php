{{-- {{ dd(getstatus( $product->id ) ) }} --}}
@if( getstatus( $product->id ) == 0 )
                                            
             <input class="btn btn-warning addToCart"   type="button" product_id="{{ $product->id }}" value="اضف الى السلة" >
              @else
            <input class="btn btn-danger removeCart"  type="button" product_id="{{ $product->id }}" value="حذف من السلة " >
 @endif