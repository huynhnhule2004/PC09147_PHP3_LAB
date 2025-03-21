<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $category->name ?? 'Danh Mục' }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="container mt-4">
        <h1 class="text-primary text-center">Tin trong loại: {{ $category->name ?? 'Không xác định' }}</h1>

        @if ($data->isEmpty())
            <div class="alert alert-warning text-center">Không có bài viết nào trong danh mục này.</div>
        @else
            <div class="row">
                @foreach ($data as $post)
                    <div class="col-md-6">
                        <div class="card mb-3 shadow-sm">
                            <div class="card-body">
                                <a href="{{ url('/posts/' . $post->id) }}" class="text-decoration-none"><h5 class="card-title text-dark">{{ $post->name }}</h5></a>
                                <p class="text-muted">{{ Str::limit($post->content, 100) }}</p>
                                <a href="{{ url('/posts/' . $post->id) }}" class="btn btn-primary btn-sm">Đọc tiếp</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
