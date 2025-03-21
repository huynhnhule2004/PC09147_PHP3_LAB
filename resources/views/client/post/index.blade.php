@extends('client.layout')

@section('tieudetrang')
    Trang tin tức
@endsection

@section('noidung')
<div class="container mt-4">
    <div class="text-center">
        <h1 class="fw-bold text-primary">Chào mừng bạn đến với Trang Tin Tức</h1>
        <p class="text-muted">Cập nhật những tin tức mới nhất mỗi ngày!</p>
    </div>

    <div class="row mt-4">
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h3 class="card-title text-success">Tin nổi bật</h3>
                    <p class="card-text">Xem những bài viết hot nhất đang được quan tâm.</p>
                    <a href="{{ url('/category/hot') }}" class="btn btn-outline-success">Xem ngay</a>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h3 class="card-title text-danger">Tin mới nhất</h3>
                    <p class="card-text">Cập nhật các bài viết mới nhất hôm nay.</p>
                    <a href="{{ url('/category/latest') }}" class="btn btn-outline-danger">Xem ngay</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
