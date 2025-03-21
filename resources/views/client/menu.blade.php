@php
    use Illuminate\Support\Facades\DB;
    $loaitin_arr = DB::table('post_categories')
        ->select('id', 'name')
        ->where('status', 1)
        ->orderBy('id', 'asc')
        ->limit(5)
        ->get();
@endphp

<nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm">
    <div class="container">
        <a class="navbar-brand fw-bold text-white" href="/post">Tin Tức</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link active text-white fw-semibold" aria-current="page" href="/post">Trang chủ</a>
                </li>
                @foreach ($loaitin_arr as $lt)
                    <li class="nav-item">
                        <a class="nav-link text-white fw-semibold" href="{{ url('/cat', [$lt->id]) }}">
                            {{ $lt->name }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</nav>
