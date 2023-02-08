@extends('layouts.blog')

@section('title')
@endsection

@section('content')
    <h2 class="mt-4 mb-3">
        Berdasarkan Tag
    </h2>
    {{ Breadcrumbs::render('tag_category') }}
    <div class="row">
        <div class="col">
            @forelse ($tags as $tag)
                <a
                    href="{{ route('blog.posts.tags', ['slug' => $tag->slug]) }}"class="badge badge-info py-3 px-5">{{ $tag->title }}</a>
            @empty
                <h3 class="text-center">
                    No data
                </h3>
            @endforelse
        </div>
    </div>
    @if ($tags->hasPages())
        <div class="row">
            <div class="col">
                {{ $tags->links('vendor.pagination.bootstrap-4') }}
            </div>
        </div>
    @endif
@endsection
