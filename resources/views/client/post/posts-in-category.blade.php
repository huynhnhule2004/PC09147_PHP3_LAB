@extends('client.layout')

@section('tieudetrang')
    {{ $category->name }}  
@endsection

@section('noidung')
<div class="container mt-4">
    <!-- Hiển thị tiêu đề danh mục với thiết kế nổi bật -->
    <h1 class="bg-warning text-center text-white py-3 rounded">{{ $category->name }}</h1>
    <hr>

    <!-- Hiển thị danh sách bài viết -->
    <div class="row">
        @foreach ($listPost as $post)
            <div class="col-md-6 mb-4">
                <div class="card shadow-sm h-100">
                    <div class="card-body">
                        <h3 class="card-title">
                            <a href="{{ url('/post', [$post->id]) }}" class="text-decoration-none text-dark">
                                {{ $post->name }}
                            </a>
                        </h3>
                        <p class="card-text text-muted">
                            {{ Str::limit($post->content, 100) }}  {{-- Hiển thị 100 ký tự đầu --}}
                        </p>
                        <a href="{{ url('/post', [$post->id]) }}" class="btn btn-primary">Xem chi tiết</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
