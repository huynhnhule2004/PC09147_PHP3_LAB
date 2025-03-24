@extends('client.layouts.layout')
@section('content')
<style>
    .container-box {
        background: white;
        padding: 50px;
        border-radius: 20px;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
    }
    .receipt-container {
        background: #F5F5F5;
        padding: 30px;
        border-radius: 15px;
        position: relative;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
        margin-top: 30px;
        max-width: 600px;
        margin: auto;
    }
    .receipt-container::before, .receipt-container::after {
        content: "";
        position: absolute;
        width: 20px;
        height: 20px;
        background: #F5F5F5;
        border-radius: 50%;
        top: -10px;
    }
    .receipt-container::before {
        left: -10px;
    }
    .receipt-container::after {
        right: -10px;
    }
    .receipt-header {
        text-align: center;
        font-weight: bold;
        font-size: 20px;
        margin-bottom: 15px;
    }
    .receipt-details {
        display: flex;
        justify-content: space-between;
        font-size: 14px;
        border-bottom: 1px dashed #ddd;
        padding-bottom: 10px;
        margin-bottom: 10px;
    }
    .product-item {
        display: flex;
        align-items: center;
        margin-bottom: 10px;
    }
    .product-item img {
        width: 60px;
        height: 60px;
        object-fit: cover;
        border-radius: 10px;
        margin-right: 15px;
    }
    .product-info {
        flex: 1;
    }
    .total-section {
        border-top: 1px dashed #ddd;
        padding-top: 10px;
        font-weight: bold;
        font-size: 16px;
    }
    .zigzag {
        content: "";
        display: block;
        height: 10px;
        background: repeating-linear-gradient(
            -45deg,
            #F5F5F5,
            #F5F5F5 5px,
            white 5px,
            white 10px
        );
        margin-top: 15px;
    }
</style>

<section id="billboard"
    class="position-relative d-flex flex-column align-items-center justify-content-center py-5 bg-light-gray"
    style="background-image: url('{{ asset('assets/client/images/banner-image-bg.jpg') }}'); background-size: cover; background-repeat: no-repeat; background-position: center; height: 300px;">
    <h1 class="text-center">Chi tiết đơn hàng</h1>
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" class="text-black">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/" class="text-decoration-underline">Trang chủ</a></li>
            <li class="breadcrumb-item"><a href="/products" class="text-decoration-underline">Sản phẩm</a></li>
            <li class="breadcrumb-item active text-black" aria-current="page">Chi tiết Đơn hàng</li>
        </ol>
    </nav>
</section>

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-10 container-box">
            <div class="row">
                <div class="col-md-6">
                    <div class="billing-info p-4">
                        <h2 class="fw-bold mb-3"><i class="fas fa-check-circle text-success"></i> Cảm ơn bạn đã mua hàng!</h2>
                        <p>
                            Đơn hàng của bạn sẽ được xử lý trong vòng 24 giờ vào ngày làm việc. Chúng tôi sẽ thông báo qua email khi đơn hàng được gửi đi.
                        </p>
                
                        <div class="billing-details mt-4">
                            <h5 class="fw-bold text-primary"><i class="fas fa-map-marker-alt"></i> Thông tin giao hàng</h5>
                            <p><strong>Tên:</strong> Jane Smith</p>
                            <p><strong>Địa chỉ:</strong> 456 Oak St #3b, San Francisco, CA 94102, United States</p>
                            <p><strong>SĐT:</strong> +1 (415) 555-1234</p>
                            <p><strong>Email:</strong> jane.smith@email.com</p>
                        </div>
                        <div class="text-center mt-4">
                            <a href="/products" class="btn btn-success btn-lg">
                                <i class="fas fa-shopping-cart"></i> Tiếp tục mua hàng
                            </a>
                        </div>                        
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="receipt-container">
                        <div class="receipt-header">Thông tin đơn hàng</div>
                        
                        <div class="receipt-details">
                            <span>Ngày đặt:</span> <span>02 May 2023</span>
                        </div>
                        <div class="receipt-details">
                            <span>Mã đơn hàng:</span> <span>024-125478956</span>
                        </div>
                        <div class="receipt-details">
                            <span>Phương thức thanh toán:</span> <span>Mastercard</span>
                        </div>
                    
                        <div class="product-item">
                            <img src="{{ asset('assets/client/images/product-item1.png') }}" alt="All In One Chocolate Combo">
                            <div class="product-info">
                                <p><strong>All In One Chocolate Combo</strong></p>
                                <p>Pack: Medium, Qty: 1</p>
                            </div>
                            <span><strong>$50.00</strong></span>
                        </div>
                        
                        <div class="product-item">
                            <img src="{{ asset('assets/client/images/product-item2.png') }}" alt="Desire Of Hearts">
                            <div class="product-info">
                                <p><strong>Desire Of Hearts</strong></p>
                                <p>Pack: Large, Qty: 1</p>
                            </div>
                            <span><strong>$50.00</strong></span>
                        </div>
                        
                        <div class="total-section">
                            <p>Subtotal <span class="float-end">$100.00</span></p>
                            <p>Shipping <span class="float-end">$2.00</span></p>
                            <p>Tax <span class="float-end">$5.00</span></p>
                            <p><strong>Tổng cộng <span class="float-end">$107.00</span></strong></p>
                        </div>
                        
                        <div class="zigzag"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
