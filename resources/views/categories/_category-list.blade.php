@foreach ($categories as $category)
    <li class="list-group-item list-group-item-action d-flex justify-content-between align-items-center pr-0">
        <label class="mt-auto mb-auto">
            {{ str_repeat('-', $count) . ' ' . $category->title }}
        </label>
        <div>
            <a href="{{ route('categories.show', ['category' => $category]) }}" class="btn btn-sm btn-primary"
                role="button">
                <i class="fas fa-eye"></i>
            </a>
            <a href="{{ route('categories.edit', ['category' => $category]) }}"class="btn btn-sm btn-info" role="button">
                <i class="fas fa-edit"></i>
            </a>
            <form class="d-inline" action="{{ route('categories.destroy', ['category' => $category]) }}"
                role="alert"method="POST" alert-title="Menghapus Kategori"
                alert-text="Apakah Anda Yakin Akan Menghapus {{ $category->title }} ?" alert-btn-cancel="Batal"
                alert-btn-iya="Hapus">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-sm btn-danger">
                    <i class="fas fa-trash"></i>
                </button>
            </form>
        </div>
        @if ($category->descendants && !trim(request()->get('keyword')))
            @include('categories._category-list', [
                'categories' => $category->descendants,
                'count' => $count + 2,
            ])
        @endif
    </li>
@endforeach
