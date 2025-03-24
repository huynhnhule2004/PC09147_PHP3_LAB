@extends('client.layouts.layout')
@section('content')
    <section id="billboard"
        class="position-relative d-flex flex-column align-items-center justify-content-center py-5 bg-light-gray"
        style="background-image: url({{ asset('assets/client/images/banner-image-bg.jpg') }}); background-size: cover; background-repeat: no-repeat; background-position: center; height: 300px;">

        <h1 class="text-center">Đổi mật khẩu</h1>

        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" class="text-black">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/" class="text-decoration-underline">Trang chủ</a></li>
                <li class="breadcrumb-item active text-black" aria-current="page">Đổi mật khẩu</li>
            </ol>
        </nav>

    </section>
    <div class="container mt-5">
        <div class="row" style="padding-bottom: 7em;">
            <div class="offset-md-1 col-md-3">

                <img src="public/uploads/users/" alt="" width="100%">


                <img src="{{ asset('assets/client/images/avatar-vo-tri-thumbnail.jpg') }}" alt="" width="100%">

            </div>
            <div class="col-md-7">
                <div class="card card-body">
                    <h4 class="text-center text-danger">Đổi mật khẩu</h4>
                    <form action="/change-password" method="post">
                        <input type="hidden" name="method" value="PUT" id="">
                        <div class="mb-3">
                            <label for="username">Tên đăng nhập*</label>
                            <input type="text" name="username" id="username" class="form-control"
                                placeholder="Nhập tên đăng nhập" disabled value="nhu10">
                        </div>
                        <div class="mb-3">
                            <label for="old_password">Mật khẩu cũ*</label>
                            <input type="password" name="old_password" id="old_password" class="form-control"
                                placeholder="Nhập mật khẩu cũ" required>
                        </div>
                        <div class="mb-3">
                            <label for="new_password">Mật khẩu mới*</label>
                            <input type="password" name="new_password" id="new_password" class="form-control"
                                placeholder="Nhập mật khẩu mới" required>
                        </div>
                        <div class="mb-3">
                            <label for="re_password">Nhập lại mật khẩu mới*</label>
                            <input type="password" name="re_password" id="re_password" class="form-control"
                                placeholder="Nhập lại mật khẩu mới" required>
                        </div>

                        <button type="reset" class="btn btn-outline-danger">Nhập lại</button>
                        <button type="submit" class="btn btn-outline-info">Cập nhật</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <section id="instagram">
        <div class="container">
            <div class="text-center mb-4">
                <h3>Instagram</h3>
            </div>
            <div class="row">
                <div class="col-md-2">
                    <figure class="instagram-item position-relative rounded-3">
                        <a href="https://templatesjungle.com/" class="image-link position-relative">
                            <div class="icon-overlay position-absolute d-flex justify-content-center">
                                <svg class="instagram">
                                    <use xlink:href="#instagram"></use>
                                </svg>
                            </div>
                            <img src="{{ asset('assets/client/images/insta-item1.jpg') }}" alt="instagram"
                                class="img-fluid rounded-3 insta-image">
                        </a>
                    </figure>
                </div>
                <div class="col-md-2">
                    <figure class="instagram-item position-relative rounded-3">
                        <a href="https://templatesjungle.com/" class="image-link position-relative">
                            <div class="icon-overlay position-absolute d-flex justify-content-center">
                                <svg class="instagram">
                                    <use xlink:href="#instagram"></use>
                                </svg>
                            </div>
                            <img src="{{ asset('assets/client/images/insta-item2.jpg') }}" alt="instagram"
                                class="img-fluid rounded-3 insta-image">
                        </a>
                    </figure>
                </div>
                <div class="col-md-2">
                    <figure class="instagram-item position-relative rounded-3">
                        <a href="https://templatesjungle.com/" class="image-link position-relative">
                            <div class="icon-overlay position-absolute d-flex justify-content-center">
                                <svg class="instagram">
                                    <use xlink:href="#instagram"></use>
                                </svg>
                            </div>
                            <img src="{{ asset('assets/client/images/insta-item3.jpg') }}" alt="instagram"
                                class="img-fluid rounded-3 insta-image">
                        </a>
                    </figure>
                </div>
                <div class="col-md-2">
                    <figure class="instagram-item position-relative rounded-3">
                        <a href="https://templatesjungle.com/" class="image-link position-relative">
                            <div class="icon-overlay position-absolute d-flex justify-content-center">
                                <svg class="instagram">
                                    <use xlink:href="#instagram"></use>
                                </svg>
                            </div>
                            <img src="{{ asset('assets/client/images/insta-item4.jpg') }}" alt="instagram"
                                class="img-fluid rounded-3 insta-image">
                        </a>
                    </figure>
                </div>
                <div class="col-md-2">
                    <figure class="instagram-item position-relative rounded-3">
                        <a href="https://templatesjungle.com/" class="image-link position-relative">
                            <div class="icon-overlay position-absolute d-flex justify-content-center">
                                <svg class="instagram">
                                    <use xlink:href="#instagram"></use>
                                </svg>
                            </div>
                            <img src="{{ asset('assets/client/images/insta-item5.jpg') }}" alt="instagram"
                                class="img-fluid rounded-3 insta-image">
                        </a>
                    </figure>
                </div>
                <div class="col-md-2">
                    <figure class="instagram-item position-relative rounded-3">
                        <a href="https://templatesjungle.com/" class="image-link position-relative">
                            <div class="icon-overlay position-absolute d-flex justify-content-center">
                                <svg class="instagram">
                                    <use xlink:href="#instagram"></use>
                                </svg>
                            </div>
                            <img src="{{ asset('assets/client/images/insta-item6.jpg') }}" alt="instagram"
                                class="img-fluid rounded-3 insta-image">
                        </a>
                    </figure>
                </div>
            </div>
        </div>
    </section>
@endsection
