@extends('frontend.layouts.app')

@section('main-content')
    <div class="col-md-9 mt25">
        <div class="row">
            @if (request('search'))
                <h3>Search For: {{ request('search') }}</h3>
            @endif
            @if ($posts->count() === 0)
                <h4>No posts found!</h4>
            @endif
            @foreach ($posts as $post)
                <div class="col-md-4 col-sm-6 col-xs-12 mb50">
                    <h4 class="blog-title"><a href="#">{{ Str::limit($post->title, 22) }}</a></h4>
                    <div class="blog-three-attrib">
                        <span class="icon-calendar"></span>{{ $post->published_at->diffForHumans() }}
                        <span class=" icon-pencil"></span><a href="#">{{ Str::limit($post->author->name, 12) }}</a>
                    </div>
                    <img src="{{asset($post->image_path)  }}" class="img-responsive" alt="image blog">
                    <p class="mt25">
                        {{ Str::limit($post->excerpt, 60) }}
                    </p>
                    <a href="#" class="button button-gray button-xs">Read More <i
                            class="fa fa-long-arrow-right"></i></a>

                </div>
            @endforeach
        </div>

        {{ $posts->appends(['search' => request('search')])->links('vendor.pagination.simple-default') }}

        <!-- Blog Paging
            ===================================== -->

    </div>
@endsection
