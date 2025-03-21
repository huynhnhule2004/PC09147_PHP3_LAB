<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tin Mới Nhất</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <h1 class="text-primary text-center mb-4">🆕 Tin Mới Nhất</h1>

    @foreach($data as $post)
        <div class="card mb-3 shadow-sm">
            <div class="card-body">
                <h5 class="card-title text-dark">{{ $post->name }}</h5>
                <p class="text-muted">📅 Ngày đăng: {{ date('d/m/Y', strtotime($post->created_at)) }}</p>
                <a href="#" class="btn btn-primary btn-sm">Đọc tiếp</a>
            </div>
        </div>
    @endforeach
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
