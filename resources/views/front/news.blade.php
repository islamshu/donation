@extends('layouts.fronts')
@section('content')
<div class="blog">
    @foreach ($news as $item)
        
    <div class="items-row cols-1 row-0">
        <div class="item column-1">


            <h2>
               {{ $item->title }} </h2>





            <dl class="article-info">
                <dt class="article-info-term">Details</dt>
                <dd class="create">
                   {{ $item->created_at }}</dd>

            </dl>
            {!! Str::limit($item->body , 50, ' ...') !!}
            <p class="readmore">
				<a href="{{ route('single_new',$item->id) }}">
					{{ __('Read more') }}:  {{ $item->title }}  </a>
		</p>
         


            <div class="item-separator"></div>



        </div>
        <span class="row-separator"></span>
    </div>
    @endforeach






    <div class="cat-children">
        <h3>
            Subcategories</h3>

        <ul>
        </ul>
    </div>
    <div class="pagination">
    {{ $news->links() }}
    </div>

</div>
@endsection
