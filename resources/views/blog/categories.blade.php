@extends('layouts.blog')

@section('title')
    Berdasarkan Kategori
@endsection

@section('content')
    <h2 class="mt-4 mb-3">
        Berdasarkan Kategori
    </h2>
    {{ Breadcrumbs::render('blog_category') }}
    <div class="row">
        @forelse ($categories as $category)
            <div class="col-lg-4 col-sm-6 portfolio-item">
                <div class="card h-100">
                    @if (file_exists(public_path($category->thumbnail)))
                        <img class="card-img-top" src="{{ asset($category->thumbnail) }}" alt="{{ $category->title }}">
                    @else
                        <img class="img-fluid rounded" src="http://placehold.it/750x300" alt="{{ $category->title }}">
                    @endif
                    <div class="card-body">
                        <h4 class="card-title">
                            <a href="{{ route('blog.posts.category', ['slug' => $category->slug]) }}">
                                {{ $category->title }}
                            </a>
                        </h4>
                        <p class="card-text">
                            {{ $category->description }}
                        </p>
                    </div>
                </div>
            </div>
        @empty
            <h3 class="text-center">
                No data
            </h3>
        @endforelse
    </div>
    @if ($categories->hasPages())
        <div class="row">
            <div class="col">
                {{ $categories->links('vendor.pagination.bootstrap-4') }}
            </div>
        </div>
    @endif
@endsection
