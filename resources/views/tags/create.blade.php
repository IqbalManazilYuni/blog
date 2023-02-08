@extends('layouts.dashboard')

@section('title')
    Tambah Tag
@endsection

@section('breadcrumbs')
    {{ Breadcrumbs::render('add_tag') }}
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('tags.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="input_tag_title" class="font-weight-bold">
                                Title
                            </label>
                            <input id="input_tag_title" value="{{ old('title') }}" name="title" type="text"
                                class="form-control  @error('title') is-invalid @enderror" placeholder="Masukkan Title" />
                            @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="input_tag_slug" class="font-weight-bold">
                                Slug
                            </label>
                            <input id="input_tag_slug" value="{{ old('slug') }}" name="slug" type="text"
                                class="form-control @error('slug') is-invalid @enderror" placeholder="Auto Generate"
                                readonly />
                            @error('slug')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="float-right">
                            <a class="btn btn-warning px-4" href="{{ route('tags.index') }}">Back</a>
                            <button type="submit" class="btn btn-primary px-4">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('javascript-internal')
    <script>
        $(document).ready(function() {
            const generateSlug = (value) => {
                return value.trim()
                    .toLowerCase()
                    .replace(/[^a-z\d-]/gi, '-')
                    .replace(/-+/g, '-').replace(/^-|-$/g, "")
            }
            $('#input_tag_title').change(function() {
                $('#input_tag_slug').val(generateSlug(event.target.value));
            });
        });
    </script>
@endpush
