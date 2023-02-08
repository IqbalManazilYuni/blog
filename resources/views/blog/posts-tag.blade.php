@extends('layouts.blog')

@section('title')
    Berdasarkan Tag,{{ $tag->title }}
@endsection

@section('content')
    <h2 class="mt-4 mb-3">
        Postingan Berdasarkan Tag {{ $tag->title }}
    </h2>
    {{ Breadcrumbs::render('blog_posts_tag', $tag->title) }}
    <div class="row">
        <div class="col-lg-8">
            @forelse ($posts as $post)
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6">
                                @if (file_exists(public_path($post->thumbnail)))
                                    <img class="card-img-top" src="{{ asset($post->thumbnail) }}" alt="{{ $post->title }}">
                                @else
                                    <img class="img-fluid rounded" src="http://placehold.it/750x300"
                                        alt="{{ $post->title }}">
                                @endif
                            </div>
                            <div class="col-lg-6">
                                <h2 class="card-title">{{ $post->title }}</h2>
                                <p class="card-text">{{ $post->description }}</p>
                                <a href="{{ route('blog.post.detail', ['slug' => $post->slug]) }}" class="btn btn-primary">
                                    Baca Selengkapnya
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <h3 class="text-center">
                    No data
                </h3>
            @endforelse
        </div>
        <div class="col-md-4">
            <div class="card mb-1">
                <h5 class="card-header">
                    Tags
                </h5>
                <div class="card-body">
                    @foreach ($tags as $tag)
                        <a
                            href="{{ route('blog.posts.tags', ['slug' => $tag->slug]) }}"class="badge badge-info py-3 px-5 my-1">{{ $tag->title }}</a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    @if ($posts->hasPages())
        <div class="row">
            <div class="col">
                {{ $posts->links('vendor.pagination.bootstrap-4') }}
            </div>
        </div>
    @endif
@endsection
