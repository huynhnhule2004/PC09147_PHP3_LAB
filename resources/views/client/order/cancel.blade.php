@extends('client.layouts.layout')
@section('content')
    <div class="container mt-5">
        <h2>Hủy Đơn Hàng #1</h2>
        <h3>Mã đơn #abc</h3>
        <p><strong>Ngày đặt hàng:</strong> 16/03/2025</p>
        <p><strong>Tổng tiền:</strong> 199,000 VNĐ</p>

        <form method="POST" action="">
            @csrf {{-- Bảo vệ CSRF --}}

            <input type="hidden" name="order_id" value="1">
            <input type="hidden" name="order_code" value="abc">

            <div class="mb-3">
                <label class="form-label">Chọn lý do hủy đơn:</label>

                <div class="form-check">
                    <input class="form-check-input" type="radio" name="cancel_reason" id="reason_1"
                        value="Đổi ý, không muốn mua nữa" required>
                    <label class="form-check-label" for="reason_1">Đổi ý, không muốn mua nữa</label>
                </div>

                <div class="form-check">
                    <input class="form-check-input" type="radio" name="cancel_reason" id="reason_2"
                        value="Tìm thấy giá rẻ hơn">
                    <label class="form-check-label" for="reason_2">Tìm thấy giá rẻ hơn</label>
                </div>

                <div class="form-check">
                    <input class="form-check-input" type="radio" name="cancel_reason" id="reason_3"
                        value="Thời gian giao hàng quá lâu">
                    <label class="form-check-label" for="reason_3">Thời gian giao hàng quá lâu</label>
                </div>

                <div class="form-check">
                    <input class="form-check-input" type="radio" name="cancel_reason" id="reason_4"
                        value="Nhập sai thông tin đặt hàng">
                    <label class="form-check-label" for="reason_4">Nhập sai thông tin đặt hàng</label>
                </div>

                <div class="form-check">
                    <input class="form-check-input" type="radio" name="cancel_reason" id="reason_5" value="Lý do khác">
                    <label class="form-check-label" for="reason_5">Lý do khác</label>
                </div>
            </div>

            <div class="mb-3">
                <label for="note" class="form-label">Ghi chú (nếu có):</label>
                <textarea id="note" name="note" class="form-control" rows="3" placeholder="Nhập ghi chú nếu cần"></textarea>
            </div>

            <button type="submit" class="btn btn-danger">Xác nhận hủy đơn</button>
            <a href="/orders/1" class="btn btn-secondary">Quay lại</a>
        </form>
    </div>
@endsection
