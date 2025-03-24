@extends('client.layouts.layout')
@section('content')
    <section id="billboard"
        class="position-relative d-flex flex-column align-items-center justify-content-center py-5 bg-light-gray"
        style="background-image: url({{ asset('assets/client/images/banner-image-bg.jpg') }}); background-size: cover; background-repeat: no-repeat; background-position: center; height: 300px;">

        <h1 class="text-center">Lịch sử mua hàng</h1>

        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" class="text-black">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/" class="text-decoration-underline">Trang chủ</a></li>
                <li class="breadcrumb-item active text-black" aria-current="page">Lịch sử mua hàng</li>
            </ol>
        </nav>

    </section>
    <div class="container mt-5 mb-5">

        <div class="d-flex justify-content-between align-items-center mb-3">
            <!-- Tiêu đề Danh sách đơn hàng ở bên trái -->
            <h3 class="mb-4">Danh sách</h3>

            <!-- Form tìm kiếm nằm bên phải -->
            <form action="/orders/history/search" method="GET" class="d-flex">
                <select class="select2 form-select shadow-none me-2" name="keyword">
                    <option value="" readonly>Chọn trạng thái</option>
                    <option value="Pending">Đang chờ xử lý
                    </option>
                    <option value="Shipped">Đang giao hàng
                    </option>
                    <option value="Delivered">Đã giao hàng</option>
                    <option value="Cancelled">Đã hủy</option>
                </select>
                <button type="submit" class="btn btn-primary btn-sm"
                    style="white-space: nowrap; color: white; background-color: #F86D72; padding: 10px">Tìm kiếm</button>
            </form>

        </div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Mã Đơn Hàng</th>
                    <th>Ngày Đặt Hàng</th>
                    <th>Phương thức thanh toán</th>
                    <th>Trạng Thái Thanh Toán</th>
                    <th>Trạng Thái Giao Hàng</th>
                    <th>Tổng Tiền</th>
                    <th>Chi Tiết</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>15/03/2025</td>
                    <td>
                        <span class="">Thanh toán khi nhận hàng</span>
                    </td>
                    <td>
                        <span class=""></span>
                    </td>
                    <td>
                        <span class=""></span>
                    </td>
                    <td>399,000 VNĐ</td>
                    <td style="white-space: nowrap;">
                        <a href="/orders/1" class="btn btn-primary btn-sm" style="padding: 10px">
                            Xem Chi Tiết
                        </a>

                        <a href="/orders/cancel/1" class="btn btn-danger btn-sm" style="padding: 10px">
                            Hủy
                        </a>
                    </td>
                </tr>
            </tbody>
        </table>
        <style>
            .custom-pagination {
                display: flex;
                justify-content: center;
                list-style: none;
                padding: 10px 0;
            }

            .custom-pagination li {
                margin: 0 5px;
            }

            .custom-pagination li a {
                display: block;
                padding: 8px 15px;
                background: #f8f9fa;
                color: #333;
                text-decoration: none;
                border-radius: 5px;
                border: 1px solid #ddd;
                transition: all 0.3s ease;
            }

            .custom-pagination li a:hover {
                background: var(--primary-color);
                color: #fff;
            }

            .custom-pagination li.active a {
                background: var(--primary-color);
                color: #fff;
                font-weight: bold;
                border: 1px solid var(--primary-color);
            }
        </style>
        <!-- Pagination -->
        <nav aria-label="Page navigation">
            <ul class="custom-pagination">
                <!-- Nút Previous -->
                <a href="?page=1" aria-label="Previous">
                    <span>&laquo;</span>
                </a>
                </li>

                <!-- Các số trang -->

                <li class="1">
                    <a href="?page=1">1</a>
                </li>
                <li>
                    <a href="?page=1" aria-label="Next">
                        <span>&raquo;</span>
                    </a>
                </li>
            </ul>
        </nav>
        <div class="alert alert-info">
            Bạn chưa có đơn hàng nào.
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
