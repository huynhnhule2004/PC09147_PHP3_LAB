<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $post->name ?? 'Bài viết không tồn tại' }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="container mt-4">
        @if($post)
            <div class="card shadow-sm">
                <div class="card-body">
                    <h1 class="text-primary">{{ $post->name }}</h1>
                    <p class="text-muted">Ngày đăng: {{ $post->created_at }}</p>
                    <hr>
                    <p class="lead">{{ $post->content }}</p>
                </div>
            </div>
        @else
            <div class="alert alert-danger text-center">
                ⚠️ Bài viết không tồn tại hoặc đã bị xóa!
            </div>
        @endif

        <a href="/posts" class="btn btn-secondary mt-3">⬅ Quay lại danh sách</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
