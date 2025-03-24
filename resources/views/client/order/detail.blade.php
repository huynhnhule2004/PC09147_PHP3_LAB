@extends('client.layouts.layout')
@section('content')
    <section id="billboard"
        class="position-relative d-flex flex-column align-items-center justify-content-center py-5 bg-light-gray"
        style="background-image: url({{ asset('assets/client/images/banner-image-bg.jpg') }}); background-size: cover; background-repeat: no-repeat; background-position: center; height: 300px;">

        <h1 class="text-center">Chi tiết đơn hàng</h1>

        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" class="text-black">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/" class="text-decoration-underline">Trang chủ</a></li>
                <li class="breadcrumb-item active text-black" aria-current="page">Chi tiết đơn hàng</li>
            </ol>
        </nav>

    </section>
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <!-- Card chứa thông tin đơn hàng -->
                <div class="card shadow-sm border-0">
                    <div class="card-header bg-primary text-white">
                        <h4 class="mb-0">Chi tiết đơn hàng</h4>
                    </div>
                    <div class="card-body">
                        <p><strong>Mã đơn hàng:</strong> #1</p>
                        <p><strong>Ngày đặt hàng:</strong> 16/03/2025</p>
                        <p><strong>Phương thức thanh toán:</strong> <span class="badge bg-success">Thanh toán khi nhận hàng</span></p>
                        <p><strong>Tình trạng thanh toán:</strong> <span class="badge bg-danger">Chưa thanh toán</span></p>
                    </div>
                </div>

                <!-- Danh sách sản phẩm -->
                <div class="card mt-4 shadow-sm border-0">
                    <div class="card-header bg-secondary text-white">
                        <h5 class="mb-0">Sản phẩm đã đặt</h5>
                    </div>
                    <div class="card-body">
                        <table class="table align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th>Hình ảnh</th>
                                    <th>Tên sản phẩm</th>
                                    <th>Giá</th>
                                    <th>Số lượng</th>
                                    <th>Tổng</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <img src="{{ asset(path: 'assets/client/images/product-item1.png') }}" alt="Đắc Nhân Tâm" class="img-thumbnail" width="80">
                                    </td>
                                    <td>Đắc Nhân Tâm</td>
                                    <td>199,000 VNĐ</td>
                                    <td>1</td>
                                    <td><strong>199,000 VNĐ</strong></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Tổng cộng -->
                <div class="card mt-4 shadow-sm border-0">
                    <div class="card-body">
                        <p class="d-flex justify-content-between">
                            <span><strong>Phí vận chuyển:</strong></span> <span>0 VNĐ</span>
                        </p>
                        <p class="d-flex justify-content-between fs-5">
                            <span><strong>Tổng tiền:</strong></span> <span class="text-danger fw-bold">199,000 VNĐ</span>
                        </p>
                    </div>
                </div>

                {{-- <!-- Nút hành động -->
                <div class="mt-4 text-center">
                    <a href="#" class="btn btn-primary">Tiếp tục mua sắm</a>
                    <a href="#" class="btn btn-danger">Hủy đơn hàng</a>
                </div> --}}
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
