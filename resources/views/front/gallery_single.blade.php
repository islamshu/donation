@extends('layouts.fronts')
@section('content')
<div class="gallery">

    @foreach (json_decode($gal->images) as $item)
        
    
    <div class="jg_row sectiontableentry1" style="text-align: center">
        <div class="jg_element_cat">
            <div class="jg_imgalign_catimgs">
                <img src="{{ asset('uploads/'.$item) }}" class="jg_photo" width="200" height="100" alt="15.11.2013">
            </div>
          </div>
      
      <div class="jg_clearboth"></div>
    </div>
    @endforeach
  
   

    <div class="jg_back">
      <a href="/gallery">
        Back to Gallery Overview</a>
    </div>
  </div>
@endsection