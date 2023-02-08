@extends('layouts.dashboard')

@section('title')
    Daftar User
@endsection

@section('breadcrumbs')
{{ Breadcrumbs::render('user') }}
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <form action="{{ route('user.index') }}" method="GET">
                            <div class="input-group">
                                <input name="keyword" value="{{ request()->get('keyword') }}"type="search"
                                    class="form-control" placeholder="Search for User">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="submit">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <ul class="list-group list-group-flush">
                    @if (count($users))
                        @foreach ($users as $user)
                            <li
                                class="list-group-item list-group-item-action d-flex justify-content-between align-items-center pr-0">
                                <label class="mt-auto mb-auto">
                                    {{ $user->name }}
                                </label>
                            </li>
                        @endforeach
                    @else
                        @if (request()->get('keyword'))
                            User {{ request()->get('keyword') }} tidak ditemukan
                        @else
                            Data User Belum Ada
                        @endif
                    @endif
                </ul>
            </div>
            @if ($users->hasPages())
                <div class="card-footer">
                    {{ $users->links('vendor.pagination.bootstrap-4') }}
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
