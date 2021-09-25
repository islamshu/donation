<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>مدارس عبقري المهارات</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

	<style media="all">
        @page {
			margin: 0;
			padding:0;
		}
		body{
			font-size: 0.875rem;
            font-family:'XBRiyaz',sans-serif;
            font-weight: normal;
            direction: rtl;
            text-align: right;
			padding:0;
			margin:0; 
		}
		.gry-color *,
		.gry-color{
			color:#878f9c;
		}
		table{
			width: 100%;
		}
		table th{
			font-weight: normal;
		}
		table.padding th{
			padding: .25rem .7rem;
		}
		table.padding td{
			padding: .25rem .7rem;
		}
		table.sm-padding td{
			padding: .1rem .7rem;
		}
		.border-bottom td,
		.border-bottom th{
			border-bottom:1px solid #eceff4;
		}
		.text-left{
			text-align:right
		}
		.text-right{
			text-align:right
		}
		     @page {
                header: page-header;
                footer: page-footer;
            }
	</style>
</head>
<body>
	<div>

		@php
			$order = App\Order::find($id);
		@endphp

		
<div style="background: #eceff4;padding: 1rem;">
    <table>
        <tr>
            {{-- <td style="font-size: 1.5rem;" class="text-right strong">فاتورة </td> --}}

            <td style="text-align: center">
                    <img src="https://madares-abqary.com/uploads/site_logo/7KlIYLEG6UbFTU8N08bl2UR0uwhliCilmAbT9IB9.png" height="70" style="display:inline-block;">
              
            </td>
        </tr>
    </table>
    <table>
        <tr>
            <td style="font-size: 1rem;" class="strong">مخازن مدرسة عبقري المهارات</td>
            <td class="text-right"> رقم الطلبية :{{ $order->code }}</td>
        </tr>
      
        <tr>
            <td class="text-right small"><span class="gry-color small">تاريخ الطلب:</span> <span class=" strong">{{  Carbon\Carbon::parse($order->updated_at)->format('Y-m-d') }}</span></td>
        </tr>
    </table>

</div>

		<div style="padding: 1rem;padding-bottom: 0">
            <table>
				
                {{-- <tr><td class="strong small gry-color"> رقم الطلبية  : {{ $order->code }}</td></tr> --}}
				<tr><td class=" gry-color small">طلبية ل : {{ $order->user->name }}</td></tr>
				<tr><td class="gry-color small"> الفرع : {{ $order->user->branch->title }}</td></tr>
				<tr><td class="gry-color small">البريد الإلكتروني: {{ $order->user->email }}</td></tr>
			
			</table>
		</div>

	    <div style="padding: 1rem;">
			<table class="padding text-left small border-bottom">
				<thead>
	                <tr class="gry-color" style="background: #eceff4;">
                        <th width="35%" class="text-left"> اسم المنتج </th>
                        <th width="15%" class="text-left"> الكمية </th>
                        <th width="10%" class="text-left"> حالة التوفير </th>
                        <th width="15%" class="text-left">الملاحظات </th>
	                
	                </tr>
				</thead>
				<tbody class="strong">
	                @foreach ($order->orderDetails as $key => $orderDetail)
		                @if ($orderDetail->product_id != null)
                        @php
                            $product = App\Product::find($orderDetail->product_id);
                        @endphp
							<tr class="">
								<td>{{ $product->name }} </td>
								
								<td class=""> {{ $orderDetail->qty }}</td>
								<td class="currency">@if($orderDetail->status == 0)غير متوفرة @else متوفرة  @endif</td>
								<td class="currency">@if($orderDetail->note  == null) _ @else $value->note  @endif</td>
							</tr>
		                @endif
					@endforeach
	            </tbody>
			</table>
		</div>

	
	</div>
</body>
</html>
