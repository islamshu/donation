@extends('layouts.admin')
@section('content')
<div class="container-fluid">
    
    <div class="block-header">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <ul class="breadcrumb breadcrumb-style ">
                   
                    
                    <i class="fas fa-home"></i> @lang('Home')</a>
                </ul>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-3 col-sm-6">
            <div class="support-box text-center l-bg-red">
           
                <div class="text m-t-10 m-b-10" style="font-size: 20px">{{ __('Donation amount') }}</div>
                <h2 class="m-b-0">{{App\Donation::sum('donation') }}
                </h2>
            </div>
        </div>
      
    </div>
    
</div>

@endsection