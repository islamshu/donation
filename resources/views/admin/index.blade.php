@extends('layouts.admin')
@section('content')
<div class="container-fluid">
    <div class="block-header">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <ul class="breadcrumb breadcrumb-style ">
                   
                    
                    <i class="fas fa-home"></i> الرئيسية</a>
                </ul>
            </div>
        </div>
    </div>
    {{-- @if(auth()->user()->hasRole('اداري')) --}}
    {{-- <div class="row">
        <div class="col-lg-3 col-sm-6">
            <div class="support-box text-center l-bg-red">
           
                <div class="text m-t-10 m-b-10" style="font-size: 20px">عدد المنتجات</div>
                <h2 class="m-b-0">{{App\Product::count() }}
                </h2>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6">
            <div class="support-box text-center l-bg-cyan">
                <div class="text m-t-10 m-b-10" style="font-size: 20px">عدد المنتجات المطلوبة من المستخدمين</div>
                <h2 class="m-b-0">{{App\Product::where('user_id','!=',auth()->id())->count() }}
                </h2>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6">
            <div class="support-box text-center l-bg-orange">
                    <div class="text m-t-10 m-b-10" style="font-size: 20px">كمية المخزون</div>
                    <h2 class="m-b-0">{{App\Product::sum('stock') }}
                    </h2>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6">
            <div class="support-box text-center green">
                <div class="text m-t-10 m-b-10" style="font-size: 20px">عدد العناصر المنتهية</div>
                <h2 class="m-b-0">{{App\Product::where('stock','<=',0)->count() }}
                </h2>
            </div>
        </div>
    </div> --}}
    
</div>
{{-- <div class="container-fluid">
   
    <div class="row">
        <div class="col-lg-3 col-sm-6">
                <div class="support-box text-center green">
                    <div class="text m-t-10 m-b-10" style="font-size: 20px">عدد الطلبات  </div>
                    <h2 class="m-b-0">{{App\Order::count() }}
                    </h2>
                </div>
        </div>
        <div class="col-lg-3 col-sm-6">
            <div class="support-box text-center l-bg-orange">
                <div class="text m-t-10 m-b-10" style="font-size: 20px">عدد الطلبات قيد الانتظار</div>
                <h2 class="m-b-0">{{App\Order::where('status',0)->count() }}
                </h2>
        </div>
        </div>
        <div class="col-lg-3 col-sm-6">
            <div class="support-box text-center l-bg-cyan">
                <div class="text m-t-10 m-b-10" style="font-size: 20px">عدد الطلبات قيد التوصيل</div>
                <h2 class="m-b-0">{{App\Order::where('status',1)->count() }}
                </h2>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6">
            <div class="support-box text-center l-bg-red">
                <div class="text m-t-10 m-b-10" style="font-size: 20px">عدد العناصر المنتهية</div>
                <h2 class="m-b-0">{{App\Order::where('status',2)->count() }}
                </h2>
            </div>
        </div>
    </div>
    
</div> --}}
{{-- @else --}}
{{-- <div class="container-fluid">
   
    <div class="row">
        <div class="col-lg-3 col-sm-6">
                <div class="support-box text-center green">
                    <div class="text m-t-10 m-b-10" style="font-size: 20px">عدد الطلبات  </div>
                    <h2 class="m-b-0">{{App\Order::where('user_id',auth()->id())->count() }}
                    </h2>
                </div>
        </div>
        <div class="col-lg-3 col-sm-6">
            <div class="support-box text-center l-bg-orange">
                <div class="text m-t-10 m-b-10" style="font-size: 20px">عدد الطلبات قيد الانتظار</div>
                <h2 class="m-b-0">{{App\Order::where('status',0)->where('user_id',auth()->id())->count() }}
                </h2>
        </div>
        </div>
        <div class="col-lg-3 col-sm-6">
            <div class="support-box text-center l-bg-cyan">
                <div class="text m-t-10 m-b-10" style="font-size: 20px">عدد الطلبات قيد التوصيل</div>
                <h2 class="m-b-0">{{App\Order::where('status',1)->where('user_id',auth()->id())->count() }}
                </h2>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6">
            <div class="support-box text-center l-bg-red">
                <div class="text m-t-10 m-b-10" style="font-size: 20px">عدد العناصر المنتهية</div>
                <h2 class="m-b-0">{{App\Order::where('status',2)->where('user_id',auth()->id())->count()}}
                </h2>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6">
            <div class="support-box text-center green">
                <div class="text m-t-10 m-b-10" style="font-size: 20px">عدد المنتجات المنشأة من قبلك  </div>
                <h2 class="m-b-0">{{App\Product::where('user_id',auth()->id())->count() }}
                </h2>
            </div>
    </div>
    </div>
    
</div> --}}
{{-- @endif --}}
@endsection