@extends('layouts.fronts')
@section('content')
<h2>{{ $new->title }} </h2>

<div class="articleContent">
    {!! $new->body !!}
</div>


@endsection







   