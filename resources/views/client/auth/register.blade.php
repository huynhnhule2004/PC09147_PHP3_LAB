@extends('client.layouts.auth')
@section('content')
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="card p-4 shadow" style="width: 350px;">
            <h3 class="text-center">Đăng ký</h3>
            <form>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" placeholder="Nhập email" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Mật khẩu</label>
                    <input type="password" class="form-control" id="password" placeholder="Nhập mật khẩu" required>
                </div>
                <div class="mb-3">
                    <label for="password_confirmation" class="form-label">Nhập lại mật khẩu</label>
                    <input type="password" class="form-control" id="password_confirmation" placeholder="Nhập lại mật khẩu"
                        required>
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">Giới tính</label>
                    <select name="" id="" class="form-select">
                        <option value="1">Nam</option>
                        <option value="0">Nữ</option>
                        <option value="2">Không xác đinh</option>
                    </select>
                </div>
                <div class="mb-3">
                    <select class="js-example-basic-single form-select" name="state">
                        <option value="AL">Alabama</option>
                        <option value="AL">abc</option>
                        <option value="WY">Wyoming</option>
                    </select>
                </div>

                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="remember">
                    <label class="form-check-label" for="remember">Ghi nhớ đăng nhập</label>
                </div>
                <button type="submit" class="btn btn-primary w-100">Đăng nhập</button>
            </form>
            <div class="text-center mt-3">
                <a href="#">Quên mật khẩu?</a>
            </div>
        </div>
    </div>
@endsection
@section('meta_title')
@endsection

@push('stylesheet')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endpush

@push('javascript')
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.js-example-basic-single').select2();
        });
    </script>
@endpush
