@extends('layouts.admin')
@section('content')
<div class="container-fluid">
    <div class="block-header">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <ul class="breadcrumb breadcrumb-style ">
                    <li class="breadcrumb-item">
                        <h4 class="page-title">السلة</h4>
                    </li>
                   
                   
                </ul>
            </div>
        </div>
    </div>
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="card-body ">
                    <div class="wrapper wrapper-content animated fadeInRight">
                        <div class="row">
                            @include('admin.partials._success')
                            <div class="col-md-12">
                                <div class="ibox">
                                    <div class="ibox-title">
                                        <span class="pull-right">(<strong>{{  count((array) session('cart')) }}</strong>) المنتجات</span>
                                        <h5>المنتجات داخل السلة</h5>
                                    </div>
                                    @forelse((array) session('cart') as $id => $details)
                                    
                                  
                                    <div class="ibox-content">
                                        <div class="table-responsive">
                                            <table class="table shoping-cart-table">
                                                <tbody>
                                                    <tr data-id="{{ $id }}">
                                                        <td>
                                                            <div class="cart-product-imitation">
                                                                @foreach (json_decode($details['image']) as $item)

                                                        @if($loop->first)   
                                                            <img src="{{ asset('uploads/'.$item) }}" width="80" height="60" >
                                                        @endif
                                                        @endforeach
                                                            </div>
                                                        </td>
                                                        <td class="desc">
                                                            <h3>
                                                                <a href="#" class="text-navy">
                                                                    {{  $details['name'] }}
                                                                </a>
                                                            </h3>
                                                           
                                                           
                                                            <div class="m-t-sm">
                                                               
                                                                <a href="#" class="text-muted" onclick="reomverfromcart({{ $id }})"><i
                                                                        class="fa fa-trash remove-from-cart" ></i>
                                                                        
                                                                     حذف من السلة</a>
                                                            </div>
                                                        </td>
                                                      
                                                        <td style="text-align: left"> 
                                                            <input type="number" class="update-cart quantity" name="qty" value="{{ $details['quantity'] }}" style="width: 150px;">
                                                        </td><br>
                                                        <td>
                                                            <textarea style="width: 500px" class="form-control update-note note" class="form-control" id="" cols="30" placeholder="اضف ملاحظتك" rows="10">{{ $details['note'] }}</textarea>
                                                        </td>
                                                      
                                                       
                                                        
                                                    </tr>

                                                   
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                  
                                   
                                    @empty

                                    <h2 style="text-align:center">سلة الشراء فارغة</h2>
                                    <div class="ibox-content">
                                       <a href="{{ route('all_item') }}"  class="btn btn-danger btn-border-radius waves-effect"><i
                                        class="fa fa-arrow-left"></i>  اذهب لاختيار المنتجات</a>
                               
                                    </div>
                                    @else
                                    <div class="ibox-content">
                                        <a href="{{ route('all_item') }}"  class="btn btn-danger btn-border-radius waves-effect"><i
                                            class="fa fa-arrow-left"></i>  اذهب لاختيار المنتجات</a>
                                        <button type="button"
                                        class="btn btn-info btn-border-radius waves-effect pull-right make_order"><i
                                            class="fa fa fa-shopping-cart"></i> اطلب الأن</button>
                                
                                     </div>
                                    @endforelse
                                </div>
                            </div>

                            <button style="display: none" type="button" class="btn btn-primary" data-bs-toggle="modal" id="clickedbutton"
                            data-bs-target="#exampleModalCenter">Vertically
                            Centered</button>
                        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                
                                    <div class="modal-body" style="text-align: center" >
                                        <i style="color: green;" class="fa fa-check-circle fa-4x"></i>
                                         <br>
                                        <span style="font-size: 22px"> تهانينا</span> <br>

                                       <span style="font-size: 22px">  لقد تم إرسال الطلبية بنجاح</span>
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
</div>
    
@endsection
@section('script')
<script>

function reomverfromcart(id){
    $.ajax({
            url: '{{ route('remove.from.cart') }}',
            method: "DELETE",
            data: {
                _token: '{{ csrf_token() }}', 
                'id':id 
            },
            success: function (response) {
                window.location.reload();
            }
        });
}
$(".update-cart").change(function (e) {
        e.preventDefault();
  
        var ele = $(this);
  
        $.ajax({
            url: '{{ route('update.cart') }}',
            method: "patch",
            data: {
                _token: '{{ csrf_token() }}', 
                id: ele.parents("tr").attr("data-id"), 
                quantity: ele.parents("tr").find(".quantity").val()
            },
          
        });
    });
    $(".update-note").change(function (e) {
        e.preventDefault();
  
        var ele = $(this);
  
        $.ajax({
            url: '{{ route('update_note') }}',
            method: "patch",
            data: {
                _token: '{{ csrf_token() }}', 
                id: ele.parents("tr").attr("data-id"), 
                note: ele.parents("tr").find(".note").val()
            },
          
        });
    });
    $(".make_order").click(function (e) {
        e.preventDefault();
  
        $.ajax({
            url: '{{ route('makeOrder') }}',
            method: "post",
            data: {
                _token: '{{ csrf_token() }}', 
               
            },
            success: function (response) {
                $( "#clickedbutton" ).click();
                var delay = 3000; 
                setTimeout(function(){  window.location.reload(); }, delay);


            }
          
        });
    });

    
</script>
@endsection