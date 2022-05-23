@extends('layouts.fronts')
@section('content')
    <div class="gallery">

        @foreach ($gals as $key => $item)
            <div class="jg_row sectiontableentry2"  style="text-align: center">
                <div class="jg_element_gal">
                    <div class="jg_imgalign_gal">
                        <div class="jg_photo_container">
                            <a href="{{ route('gallery_single',$item->id) }}">
                                <img src="{{ asset('uploads/'.json_decode($item->images)[0] )}}"
                                    class="jg_photo" alt="{{ $item->title }} " >
                                  </a>
                                </div>
                              </div>
                              <div class="   jg_element_txt">
                                <ul>
                                    <li>
                                        <a
                                            href="{{ route('gallery_single',$item->id) }}">
                                            <b>{{ $item->title }} </b>
                                        </a>
                                    </li>
                                </ul>
                        </div>
                    </div>
                </div>
        @endforeach
        <div class="pagination">
            {{ $gals->links() }}
        </div>
    </div>
@endsection
