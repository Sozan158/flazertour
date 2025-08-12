@include('clients.blocks.header')
@include('components.toast')
<header class="bkheader">ĐẶT TOUR</header>
<div class="checkout-container">
    <main class="checkout-main">
        <header class="checkout-header">
            <h1>Hoàn tất thông tin đặt tour</h1>
            <p>Vui lòng kiểm tra lại thông tin tour và điền đầy đủ các mục bên dưới.</p>
        </header>

        <form action="{{ route('booking.confirm', ['id' => $tourBooking->IDTour]) }}" method="POST" id="booking-form">
            @csrf
            <section class="info-section">
                <h2>1. Thông tin liên hệ</h2>
                <div class="form-grid">
                    <div class="form-group">
                        <label for="fullname_booking">Họ và Tên</label>
                        <input type="text" id="fullname_booking" name="fullname" placeholder="Nhập họ tên....">
                    </div>
                    <div class="form-group">
                        <label for="email_booking">Địa chỉ Email</label>
                        <input type="email" id="email_booking" name="email" placeholder="fz@email.com">
                    </div>
                    <div class="form-group">
                        <label for="phone_booking">Số điện thoại</label>
                        <input type="tel" id="phone_booking" name="phone" placeholder="09xxxxxxxx">
                    </div>
                    <div class="form-group">
                        <label for="address_booking">Địa chỉ</label>
                        <input type="text" id="address_booking" name="address"
                            placeholder="Số nhà, tên đường, phường/xã...">
                    </div>
                </div>
            </section>

            <section class="info-section">
                <h2>2. Mã giảm giá</h2>
                <div class="passenger-info">
                    <strong>Mã ưu đãi</strong>
                    <div class="form-grid">
                        <div class="form-group">
                            <input type="text" class="discount-code" id="discount"
                                placeholder="Mã giảm giá (nếu có)">
                            <button type="button" class="apply-discount"id="apply-discount" hidden>Áp dụng</button>
                        </div>

                    </div>
                </div>

            </section>

            <section class="info-section">
                <h2>3. Yêu cầu đặc biệt (Nếu có)</h2>
                <div class="form-group">
                    <textarea id="requests" name="requests" rows="4"
                        placeholder="Ví dụ: Ăn chay, phòng gần thang máy, dị ứng thực phẩm..."></textarea>
                </div>
            </section>

            <section class="info-section">
                <h2>4. Chọn phương thức thanh toán</h2>
                <div class="payment-options">
                    <div class="payment-option">
                        <input type="radio" id="at-branch" name="payment" value="at-branch" checked>
                        <label for="at-branch">Thanh toán tại chi nhánh</label>
                    </div>
                    <div class="payment-option">
                        <input type="radio" id="credit-card" name="payment" value="credit-card" checked>
                        <label for="credit-card">Thẻ Tín dụng / Ghi nợ (Visa, Mastercard)</label>
                    </div>
                    <div class="payment-option">
                        <input type="radio" id="bank-transfer" name="payment" value="bank-transfer">
                        <label for="bank-transfer">Chuyển khoản ngân hàng</label>
                    </div>
                    <div class="payment-option">
                        <input type="radio" id="momo" name="payment" value="momo">
                        <label for="momo">Ví điện tử MoMo</label>
                    </div>
                </div>
            </section>

    </main>

    <aside class="order-summary">
        <h3>Thông tin đơn đặt</h3>
        <div class="tour-details">
            <input type="hidden" id="IDtour_booking" name="IDTour" value="{{ $tourBooking->IDTour }}">
            <img src="{{ asset('clients/img/gallery/' . $tourBooking->images[0]) }}" alt="Hình ảnh tour du lịch">
            <h4>{{ $tourBooking->name }}</h4>
            <p><strong>Ngày khởi hành:</strong> {{ $tourBooking->start_date }}</p>
            <p><strong>Số lượng:</strong> {{ $numAdult }} người lớn, {{ $numChild }} trẻ em</p>
            <p><strong>Điểm khởi hành:</strong> Hà Nội</p>
            <p><strong>Điểm đến:</strong>{{ $tourBooking->destination }}</p>
        </div>
        <div class="price-details">
            <div class="price-item">
                <span>Vé người lớn ({{ $numAdult }} x {{ number_format($tourBooking->priceA, 0, ',', '.') }})</span>
                <span>{{ number_format($priceA, 0, ',', '.') }}đ</span>
                <input type="hidden" id="numA_booking" name="numA" value="{{ $numAdult }}">

            </div>
            <div class="price-item">
                <span>Vé trẻ em ({{ $numChild }} x {{ number_format($tourBooking->priceC, 0, ',', '.') }})</span>
                <span>{{ number_format($priceC, 0, ',', '.') }}đ</span>
                <input type="hidden" id="numC_booking" name="numC" value="{{ $numChild }}">
            </div>
            <div class="price-item">
                <span>Phụ thu & Thuế</span>
                <span>200.000đ</span>
            </div>
            <div class="price-item" id="dis_code" hidden>
                <span>Giảm giá</span>
                <span class="discount-value"></span>
            </div>
            <hr>
            <div class="price-total">
                <strong>Tổng cộng</strong>
                <strong class="totalPriceValue">{{ number_format($totalPrice, 0, ',', '.') }} VND</strong>
                <input type="hidden" class="total_price" name = "total_price" value="{{ $totalPrice }}">
            </div>
            <div class="terms">
                <input type="checkbox" id="terms-agree" required>
                <label for="terms-agree">Tôi đã đọc và đồng ý với các <a href="#">điều khoản và điều kiện</a>
                    của
                    công
                    ty.</label>
            </div>
            <button type = "submit" class="btn-booking">Hoàn tất & Thanh toán</button>
            <div class="secure-badge">
                <p>🔒 Giao dịch an toàn và bảo mật</p>
            </div>
    </aside>
    </form>
</div>

<script>
    const numA = Number("{{ $numAdult }}");
    const numC = Number("{{ $numChild }}");
    const totalprice = Number("{{ $totalPrice }}");
</script>


<script src="{{ asset('clients/js/auth.js') }}"></script>
