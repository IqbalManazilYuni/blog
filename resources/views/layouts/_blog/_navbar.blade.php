<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-info fixed-top">
    <div class="container">
        <a class="navbar-brand" href="{{ route('blog.home') }}">
            BPS
        </a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
            data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <form class="input-group my-1" action="{{ route('blog.search') }}" method="GET">
                <input name="keyword" value="{{ request()->get('keyword') }}" type="search" class="form-control"
                    placeholder="Enter title">
                <div class="input-group-append">
                    <button class="btn btn-info" type="submit">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </form>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('blog.home') }}">
                        <p class="mt-2 text-center text-white">Home</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('blog.categories') }}">
                        <p class="mt-2 text-center text-white">Categories</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('blog.tags') }}">
                        <p class="mt-2 text-center text-white">Tags</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
