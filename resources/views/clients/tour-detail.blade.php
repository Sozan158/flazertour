@include('clients.blocks.header')

<div class="container">
    <div class="header-section">
        <div class="property-info">
            <h1>{{ $tourDetail->name }}</h1>
            <div class="rating-location">
                <span class="rating">5 (0 đánh giá)</span>
                <span><i class="fas fa-map-marker-alt"
                        style="margin-right: 5px;"></i>{{ $tourDetail->destination }}</span>
                <a href="#" style="margin-left: 10px; color: #007bff; text-decoration: none;">Xem bản đồ và địa
                    chỉ</a>
            </div>
        </div>
        <div class="price-info">
            <span class="current-price">{{ number_format($tourDetail->priceC, 0, ',', '.') }} VND</span>
            <span class="original-price">{{ number_format($tourDetail->priceA, 0, ',', '.') }} VND / người</span>
        </div>
    </div>

    <div class="image-carousel">
        <div class="main-image-container">
            <img id="mainImage" src="{{ asset('clients/img/gallery/' . $tourDetail->images[0]) }}"
                alt="{{ $tourDetail->destination }}">
        </div>
        <button id="arrowLeft" class="nav-arrow arrow-left"><i class="fas fa-chevron-left"></i></button>
        <button id="arrowRight"class="nav-arrow arrow-right"><i class="fas fa-chevron-right"></i></button>

        <div class="thumbnails">
            @foreach ($tourDetail->images as $index => $img)
                <div class="thumbnail-item {{ $index === 0 ? 'active' : '' }}">
                    <img class="thumbnail" data-src="{{ asset('clients/img/gallery/' . $img) }}"
                        src="{{ asset('clients/img/gallery/' . $img) }}" alt="Thumbnail {{ $index + 1 }}">
                </div>
            @endforeach
        </div>
    </div>


    <div class="tabs-navigation">
        <div class="tab-item active" data-tab="features">Đặc điểm</div>
        <div class="tab-item" data-tab="ticket-prices">Giá vé Tour</div>
        <div class="tab-item" data-tab="introduction">Giới thiệu</div>
        <div class="tab-item" data-tab="regulations">Lưu ý</div>
        <div class="tab-item" data-tab="reviews">Đánh giá </div>
    </div>

    <div class="content-area" id="tabContent">
        <p></p>
    </div>


    <div class="itinerary">
        <h2>Lịch trình</h2>
        <div class="accordion">
            @foreach ($tourDetail->timeline as $timeline)
                <div class="accordion-item {{ $loop->first ? 'active' : '' }}">
                    <div class="accordion-header">
                        <span class="fa fa-calendar" style="margin: 10px"> </span>
                        <h3>{{ 'Ngày ' . $loop->iteration . '. ' . $timeline->title }}</h3>
                        <span class="icon"></span>
                    </div>
                    <div class="accordion-body">
                        <p>{!! $timeline->description !!}</p>
                    </div>
                </div>
            @endforeach

        </div>
    </div>




    <form action="{{ route('booking', ['id' => $tourDetail->IDTour]) }}" method="POST" id="bookingForm">
        @csrf
        <aside class="booking-widget">
            <h3>Đặt Tour</h3>
            <hr class='mb-25' style="border: solid 1px cyan; margin-bottom: 40px; ">

            <div class="booking-input">
                <label>Từ ngày</label>
                <input type="date" name="start_date">
            </div>

            <div class="booking-input">
                <label>Đến ngày</label>
                <input type="date" name="end_date">
            </div>

            <div class="booking-input">
                <label>Thời gian: {{ $tourDetail->duration }}</label>

            </div>

            <hr class='mb-25'>
            <div class="booking-input">
                <label>Giá vé:</label>
                <p>Trẻ em
                <div class="quantity-control">
                    <button type="button" class="btn-acc" data-target="childQty">-</button>
                    <input type="number" id="childQty" name="child_qty" data-price="{{ $tourDetail->priceC }}"
                        value="0" min="0" readonly>
                    <button type="button" class="btn-acc" data-target="childQty">+</button>
                </div>
                <strong> X {{ number_format($tourDetail->priceC, 0, ',', '.') }}</strong>
                </p>
                <p>Người lớn
                <div class="quantity-control">
                    <button type="button" class="btn-acc" data-target="adultQty">-</button>
                    <input type="number" id="adultQty" name="adult_qty" data-price="{{ $tourDetail->priceA }}"
                        value="1" min="0" readonly>
                    <button type="button" class="btn-acc" data-target="adultQty">+</button>
                </div>
                <strong> X {{ number_format($tourDetail->priceA, 0, ',', '.') }}</strong>
                </p>

                <hr class='mb-25'>

                {{-- <div class="booking-input">
                <label>Phụ thu:</label>
                <label><input type="radio" name="extra"> Theo đơn đặt — $50</label><br>
                <label><input type="radio" name="extra"> Theo cá nhân — $24</label>
            </div> --}}

                <div class="total">Tổng giá Tour:</div>
                <span class="current-price"></span>
                <input type="hidden" name="total_price" id="total_price" value="0">

            </div>
            <button type = "submit" class="btn-book">Đặt
                ngay

            </button>
        </aside>
    </form>
</div>

<script>
    const tourDescription = `{!! $tourDetail->description !!}`;
    const tourIntroduction = `{!! $tourDetail->introduction !!}`;
    const tourPriceA = "{{ $tourDetail->priceA }}";
    const tourPriceC = "{{ $tourDetail->priceC }}";
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const qtyButtons = document.querySelectorAll('.btn-acc');
        const totalPriceEl = document.querySelector('.booking-widget .current-price');

        // Hàm format tiền tệ VND
        function formatCurrency(amount) {
            return amount.toLocaleString('vi-VN') + ' VND';
        }

        // Hàm tính tổng
        function updateTotal() {
            const childQty = parseInt(document.getElementById('childQty').value);
            const adultQty = parseInt(document.getElementById('adultQty').value);
            const childPrice = parseInt(document.getElementById('childQty').dataset.price);
            const adultPrice = parseInt(document.getElementById('adultQty').dataset.price);

            const total = (childQty * childPrice) + (adultQty * adultPrice);
            totalPriceEl.textContent = formatCurrency(total);

            document.getElementById('total_price').value = total;
        }

        // Xử lý click nút cộng/trừ
        qtyButtons.forEach(btn => {
            btn.addEventListener('click', function(e) {
                e.preventDefault();
                e.stopPropagation();

                const targetId = this.dataset.target;
                const input = document.getElementById(targetId);
                let value = parseInt(input.value);

                if (this.textContent === '+') {
                    value++;
                } else if (this.textContent === '-' && value > 0) {
                    value--;
                }

                input.value = value;
                updateTotal();
            });
        });

        updateTotal();


        document.getElementById('bookingForm').addEventListener('submit', function(e) {
            const totalPrice = parseInt(document.getElementById('total_price').value);

            if (!totalPrice || totalPrice === 0) {
                e.preventDefault();
            }
        });
    });
</script>




@include('clients.blocks.footer')
