@extends('layouts.blog')

@section('title')
    {{ $post->title }}
@endsection

@section('description')
    {{ $post->description }}
@endsection

@section('content')
    <h2 class="mt-4 mb-3">
        {{ $post->title }}
    </h2>
    {{ Breadcrumbs::render('blog_detail', $post->title) }}
    <div class="row">
        <div class="col-lg-8">
            @if (file_exists(public_path($post->thumbnail)))
                <img class="card-img-top" src="{{ asset($post->thumbnail) }}" alt="{{ $post->title }}">
            @else
                <img class="img-fluid rounded" src="http://placehold.it/750x300" alt="{{ $post->title }}">
            @endif
            <hr>
            <div>
                {!! $post->content !!}
            </div>
            <hr>
        </div>
        <div class="col-md-4">
            <div class="card mb-3">
                <h5 class="card-header">
                    Categories
                </h5>
                <div class="card-body">
                    @foreach ($post->categories as $category)
                        <a href="{{ route('blog.posts.category', ['slug' => $category->slug]) }}"
                            class="badge badge-primary py-2 px-4 my-1">
                            {{ $category->title }}
                        </a>
                    @endforeach
                </div>
            </div>
            <div class="card mb-3">
                <h5 class="card-header">
                    Tags
                </h5>
                <div class="card-body">
                    @foreach ($post->tags as $tag)
                        <a href="{{ route('blog.posts.tags', ['slug' => $tag->slug]) }}"
                            class="badge badge-info py-2 px-4 my-1">
                            {{ $tag->title }}
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
