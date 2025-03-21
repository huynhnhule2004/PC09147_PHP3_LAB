@extends('client.layout')

@section('tieudetrang')
    {{ $post->name }}
@endsection

@section('noidung')
<div class="container mt-4">
    <div class="card shadow-sm p-4">
        <h2 class="fw-bold text-primary">{{ $post->name }}</h2>
        <p class="text-muted">
            🕒 Đăng ngày: <strong>{{ \Carbon\Carbon::parse($post->created_at)->format('d/m/Y') }}</strong>
        </p>
        <hr>
        <div id="noidung" class="mt-3">
            {!! $post->content !!}
        </div>
    </div>
</div>
@endsection
