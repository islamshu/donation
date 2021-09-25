<div class="row clearfix">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="card">
            <div class="body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="white-box">
                            
                            <h3>
                                <b>الطلبية</b> 
                                <a href="{{ route('generate_pdf',encrypt($order->id)) }}" class="btn-hover btn-border-radius color-1"><i class="fas fa-print"></i></a>

                             
                                <span class="pull-right" id="inptu_code" theId="{{ $order->id }}">{{ $order->code }}</span>
                              
                            </h3>
                            <hr>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="pull-left">
                                        <address>
                                            <p class="font-bold">بيانات مقدم الطلبية :</p>
                                            <p class="text-muted">
                                                {{ $order->user->name }}
                                                <br>  {{ $order->user->branch->title }}
                                               
                                            </p>
                                         
                                        </address>
                                    </div>
                                    <div class="pull-right">
                                        <address>
                                           
                                            <p class="m-t-30">
                                                <b>تاريخ الطلب  :</b>
                                                <i class="fa fa-calendar"></i> {{ $order->created_at }}
                                            </p>
                                            <p>

    <b>حالة الطلب :</b>
    @if($order->status == 0)
    <span class="label label-warning">قيد الانتظار</span>
    @elseif($order->status ==1)
    <span class="label label-info">جاري التوصيل   </span>
    @else
    <span class="label label-success"> تم التوصيل   </span>
    @endif
    <br>
    <br>
    @if($order->user_id == auth()->id() && $order->status == 1)
    <button type="button" id="change_to_delevrry" class="btn btn-info btn-border-radius waves-effect">هل تم وصول الطلبية ؟</button>
    @endif

</p>
</address>
</div>

</div>
<div class="col-md-12">
<div class="table-responsive m-t-40">
<table class="table table-hover">
    <thead>
        
            
       
        <tr>
          @if(auth()->user()->hasRole('اداري'))  
          @if($order->orderDetails->where('status',0)->count() > 0)

          <th><input type="checkbox" id="check_all"></th>
          @endif
 @endif

            <th class="text-center">#</th>
            <th class="text-center">صورة المنتج</th>
            <th class="text-center"> اسم المنتج</th>
            <th class="text-center">الكمية</th>
            <th class="text-center">تم توفيرها</th>
            <th class="text-center"> الملاحظات</th>
           
        </tr>
    </thead>
    <tbody>
    @foreach($order->orderDetails as $key => $value)
        @php
            $product = App\Product::find($value->product_id);
        @endphp
    <tr>
        @if(auth()->user()->hasRole('اداري')) 
        @if($order->orderDetails->where('status',0)->count() > 0)

        <td>@if($value->status == 0)<input type="checkbox" class="checkbox" data-id="{{$value->id}}">@else - @endif</td>
       @endif
        @endif
        <td class="text-center">{{ $key + 1}}</td>
        <td class="table-img text-center">
            @foreach (json_decode($product->image) as $item)
            @if($loop->first)
            <img src="{{ asset('uploads/'.$item) }}" alt="" width="50" height="50">
            @endif
            @endforeach
        </td>
        <td class="text-center"> {{ $product->name }}</td>
        <td class="text-center"> {{ $value->qty }}</td>
        <td class="text-center"> @if($value->status == 0)<span class="label l-bg-orange shadow-style">غير متوفرة </span> @else <span class="label l-bg-cyan shadow-style"> متوفرة </span> @endif</td>
        <td class="text-center">@if($value->note  == null) _ @else $value->note  @endif </td>
 
    </tr>
    @endforeach
    <tr>
        @if(auth()->user()->hasRole('اداري'))  
        @if($order->orderDetails->where('status',0)->count() > 0)

        <td colspan="3"><button class="btn btn-danger change-all">تأكيد الكل</button> </td>
        @endif

        @endif
    </tr>
</div>
</tbody>
    </table>
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