@extends('client.layouts.layout')
@section('content')
    <style>
        /*CART*/
        .table>tfoot>tr>td {
            border-top: none !important;
        }

        #info-cart-wp table tr td {
            display: table-cell;
            vertical-align: middle;
            text-align: center;
            white-space: nowrap;
        }

        #info-cart-wp table thead tr td {
            font-family: 'Roboto Medium';
            padding: 10px 20px;
            color: #333;
            border: 0;
        }

        #info-cart-wp table tbody tr td {
            color: #444;
            padding: 15px 0px;
        }

        #info-cart-wp table tbody tr td .num-order {
            width: 35px;
            height: 35px;
            line-height: 35px;
            text-align: center;
            border: 1px solid #bbb;
            border-radius: 3px;
        }

        #info-cart-wp table tbody tr td .thumb {
            display: inline-block;
            width: 100px;
            height: 100px;
            overflow: hidden;
            border: 1px solid #ddd;
        }

        #checkout-cart,
        #update-cart {
            display: inline-block;
            color: #333;
            background: #ececec;
            border: 1px solid #c5c5c5;
            padding: 10px 15px;
            margin-right: 5px;
            font-size: 13px;
            border-radius: 3px;
        }

        #checkout-cart:hover,
        #update-cart:hover {
            background: #d0d0d0;
        }

        #info-cart-wp table tfoot tr td #action-cart a:nth-child(2) {
            margin-right: 0;
        }

        #total-price {
            font-family: 'Roboto Medium';
            font-weight: normal;
        }

        #total-price span {
            color: #ad0000;
        }

        #action-cart-wp {
            padding: 30px 0px;
        }

        #action-cart-wp .title {
            padding-bottom: 5px;
        }

        #action-cart-wp .section-detail .title span {
            font-family: 'Roboto Medium';
            font-weight: normal;
        }

        #action-cart-wp a {
            display: inline-block;
            padding: 5px 0px;
            color: #006cbb;
            line-height: 21px;
        }

        .cart-page #breadcrumb-wp .title {
            display: block;
            padding: 20px 0px;
            font-family: 'Roboto Medium';
            text-transform: uppercase;
            font-size: 18px;
            color: #272727;
            text-align: center;
        }

        #info-cart-wp .table thead {
            background: #efefef;
            border-top: 1px solid #dadada;
        }

        .btn-quantity {
            padding: 0.25rem 0.5rem;
            border-radius: 0.25rem;
            color: black;
            background: white;
            border: 1px solid var(--bs-border-color);
        }

        .btn-quantity:hover {
            color: var(--white-color);
            background-color: var(--black-color);
        }
    </style>

    <section id="billboard"
        class="position-relative d-flex flex-column align-items-center justify-content-center py-5 bg-light-gray"
        style="background-image: url({{ asset('assets/client/images/banner-image-bg.jpg') }}); background-size: cover; background-repeat: no-repeat; background-position: center; height: 300px;">

        <h1 class="text-center">Giỏ hàng</h1>

        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" class="text-black">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/" class="text-decoration-underline">Trang chủ</a></li>
                <li class="breadcrumb-item active text-black" aria-current="page">Giỏ hàng</li>
            </ol>
        </nav>

    </section>

    <div class="container" style="margin-top: 100px;">
        <div id="main-content-wp" class="cart-page">
            <div class="section" id="breadcrumb-wp">
                <div class="wp-inner">
                    <div class="section-detail">
                        <!-- <h3 class="title">Giỏ hàng</h3> -->
                    </div>
                </div>
            </div>
            <div id="wrapper" class="wp-inner clearfix">
                <div class="section" id="info-cart-wp">

                    <div class="section-detail table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <td>Ảnh sản phẩm</td>
                                    <td>Tên sản phẩm</td>
                                    <td>Giá sản phẩm</td>
                                    <td>Số lượng</td>
                                    <td>Thành tiền</td>
                                    <td></td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <a href="/products/1" title="" class="thumb rounded-3 p-3">
                                            <img src="{{ asset('assets/client/images/cart-item1.png') }}"
                                                class="card-img-top " alt="" style="width: 100%; display: block;"
                                                data-holder-rendered="true">
                                        </a>
                                    </td>
                                    <td>
                                        <a href="/products/1" title="" class="name-product">Đắc Nhân Tâm</a>
                                    </td>
                                    <td>99,000 đ</td>
                                    <td>
                                        <div class="d-flex align-items-center justify-content-center">
                                            <!-- <button class="btn-quantity update-cart-btn" data-id="1" data-action="decrease">-</button> -->
                                            <input type="text" value="1"
                                                class="form-control text-center mx-2 quantity-input"
                                                style="width: 60px; height: 40px;" readonly>
                                            <!-- <button class="btn-quantity update-cart-btn" data-id="1" data-action="increase">+</button> -->
                                        </div>
                                        <!-- <input type="number" name="qty[1]" value="1" class="num-order" min="1" max="10"> -->
                                    </td>
                                    <td>299,000 đ</td>
                                    <td>
                                        <form action="/cart/1" method="post" style="display: inline-block;"
                                            onsubmit="return confirm('Chắc chưa?')">
                                            <input type="hidden" name="method" value="DELETE">
                                            <button type="submit" class="btn btn-danger text-white"
                                                style="padding: 0.5rem 1.5rem;"><i class="fa-solid fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <a href="/products/1" title="" class="thumb rounded-3 p-3">
                                            <img src="{{ asset('assets/client/images/cart-item1.png') }}"
                                                class="card-img-top " alt="" style="width: 100%; display: block;"
                                                data-holder-rendered="true">
                                        </a>
                                    </td>
                                    <td>
                                        <a href="/products/1" title="" class="name-product">Đắc Nhân Tâm</a>
                                    </td>
                                    <td>99,000 đ</td>
                                    <td>
                                        <div class="d-flex align-items-center justify-content-center">
                                            <!-- <button class="btn-quantity update-cart-btn" data-id="1" data-action="decrease">-</button> -->
                                            <input type="text" value="1"
                                                class="form-control text-center mx-2 quantity-input"
                                                style="width: 60px; height: 40px;" readonly>
                                            <!-- <button class="btn-quantity update-cart-btn" data-id="1" data-action="increase">+</button> -->
                                        </div>
                                        <!-- <input type="number" name="qty[1]" value="1" class="num-order" min="1" max="10"> -->
                                    </td>
                                    <td>299,000 đ</td>
                                    <td>
                                        <form action="/cart/1" method="post" style="display: inline-block;"
                                            onsubmit="return confirm('Chắc chưa?')">
                                            <input type="hidden" name="method" value="DELETE">
                                            <button type="submit" class="btn btn-danger text-white"
                                                style="padding: 0.5rem 1.5rem;"><i class="fa-solid fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="7">
                                        <div class="clearfix">
                                            <p id="total-price" class="fl-right" style="float: right;">Tổng giá: <span
                                                    class="text-danger">299,000
                                                    đ</span> </p>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="7">
                                        <div class="clearfix">
                                            <div class="fl-right">
                                                <a href="/checkout" title="" style="float: right;"
                                                    class="btn btn-danger text-white">Thêm tất cả vào giỏ</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
                <div class="section" id="action-cart-wp">
                    <div class="section-detail">
                        <a href="/products" title="" id="buy-more">Mua tiếp</a><br />
                        <a href="/cart/clearCart" title="" id="delete-cart">Xóa giỏ hàng</a>
                    </div>
                </div>

                {{-- <h3 class="text-center text-danger mt-3 mb-5">Giỏ hàng trống! </h3>
                <p class="text-center">Click <a href="/" class="text-decoration-underline fw-bold">vào đây</a> để quay
                    lại trang chủ</p> --}}
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
    <script>
        document.querySelectorAll(".update-cart-btn").forEach((button) => {
            button.addEventListener("click", function() {
                let productId = this.getAttribute("data-id");
                let action = this.getAttribute("data-action");

                let data = {
                    method: "POST",
                    productId: productId,
                    action: action
                };

                console.log("Gửi request: ", data); // Kiểm tra dữ liệu gửi lên

                fetch("/cart/update", {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json",
                        },
                        body: JSON.stringify(data),
                    })
                    .then((response) => response.text()) // Đọc phản hồi dưới dạng văn bản để debug
                    .then((text) => {
                        console.log("Phản hồi server (trước JSON):", text);
                        return JSON.parse(text); // Chuyển đổi sang JSON
                    })
                    .then((data) => {
                        if (data.success) {
                            console.log("Cập nhật thành công:", data);
                        } else {
                            console.error("Lỗi cập nhật:", data.message);
                        }
                    })
                    .catch((error) => console.error("Lỗi AJAX:", error));
            });
        });
    </script>
@endsection
