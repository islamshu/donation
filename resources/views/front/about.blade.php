@extends('layouts.fronts')
@section('content')
<h2>{{ __('About us') }} </h2>

<div class="articleContent">
    {!! $about->body !!}
</div>


@endsection







   