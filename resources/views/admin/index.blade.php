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
    <div class="row">
        <div class="col-lg-3 col-sm-6">
            <div class="support-box text-center l-bg-red">
           
                <div class="text m-t-10 m-b-10" style="font-size: 20px">عدد المسابقات</div>
                <h2 class="m-b-0">{{App\Contest::where('is_activity',0)->count() }}
                </h2>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6">
            <div class="support-box text-center l-bg-cyan">
                <div class="text m-t-10 m-b-10" style="font-size: 20px">عدد الفعاليات   </div>
                <h2 class="m-b-0">{{App\Contest::where('is_activity',1)->count() }}
                </h2>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6">
            <div class="support-box text-center l-bg-orange">
                    <div class="text m-t-10 m-b-10" style="font-size: 20px">إجمالي مستخدمي النظام </div>
                    <h2 class="m-b-0">{{App\User::count() }}
                    </h2>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6">
            <div class="support-box text-center green">
                <div class="text m-t-10 m-b-10" style="font-size: 20px">إجمالي المشاهير </div>
                <h2 class="m-b-0">{{App\User::where('type','famous')->count() }}
                </h2>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6">
            <div class="support-box text-center l-bg-cyan">
                <div class="text m-t-10 m-b-10" style="font-size: 20px">إجمالي المتسابقين    </div>
                <h2 class="m-b-0">{{App\User::where('type','user')->count()  }}
                </h2>
            </div>
        </div>
    </div>
    
</div>

@endsection