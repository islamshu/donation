@extends('layouts.fronts')
@section('content')
<h2>
    @lang('Contact us') </h2>







<div class="articleContent">

    <p>&nbsp;</p>
    <p><strong>@lang('Adress')</strong> :<strong>{{ App\General::first()->Address }}&nbsp;</strong></p>
    <p><strong>@lang('Phones')</strong></p>
    <p>{{ App\General::first()->phone }}</p>
    <p><strong>@lang('E-mail')</strong></p>
    <p>{{ App\General::first()->email }}</p>


</div>



@endsection