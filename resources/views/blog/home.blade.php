@extends('layouts.blog')

@section('title')
    Home
@endsection

@section('content')
    <h2 class="mt-4 mb-3">
        Home
    </h2>
    {{ Breadcrumbs::render('blog_home') }}
    <div class="row">
        <div class="col">
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
    </div>
    @if ($posts->hasPages())
        <div class="row">
            <div class="col">
                {{ $posts->links('vendor.pagination.bootstrap-4') }}
            </div>
        </div>
    @endif
@endsection
