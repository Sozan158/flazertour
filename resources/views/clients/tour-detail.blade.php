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
        <div class="tab-item" data-tab="regulations">Quy định</div>
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



    <div class="right">
        <h3>Đặt Tour</h3>

        <div class="booking-input">
            <label>Từ ngày</label>
            <input type="date">
        </div>

        <div class="booking-input">
            <label>Đến ngày</label>
            <input type="date">
        </div>

        <div class="booking-input">
            <label>Thời gian: {{ $tourDetail->duration }}</label>

        </div>

        {{-- <hr class='mb-25'> --}}
        <div class="booking-input">
            <label>Giá vé:</label>
            <p>Trẻ em <select>
                    <option>01</option>
                    <option>02</option>
                    <option>03</option>
                    <option>04</option>
                    <option>05</option>
                </select></p>
            <p>Người lớn <select>
                    <option>01</option>
                    <option>02</option>
                    <option>03</option>
                    <option>04</option>
                    <option>05</option>
                </select></p>
        </div>
        <hr class='mb-25'>

        <div class="booking-input">
            <label>Phụ thu:</label>
            <label><input type="radio" name="extra"> Theo đơn đặt — $50</label><br>
            <label><input type="radio" name="extra"> Theo cá nhân — $24</label>
        </div>

        <div class="total">Tổng giá Tour:</div>
        <span class="current-price">{{ number_format($tourDetail->priceC, 0, ',', '.') }} VND</span>
        <button class="btn-book">Book Now</button>
    </div>
</div>
<div class="form-row tm-search-form-row">
    <div class="form-group tm-form-element tm-form-element-2">
        <select name="adult" class="form-control tm-select" id="adult">
            <option value="">Người lớn</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
            <option value="9">9</option>
            <option value="10">10</option>
        </select>
        <i class="fa fa-2x fa-user tm-form-element-icon"></i>
    </div>
    <div class="form-group tm-form-element tm-form-element-2">
        <select name="children" class="form-control tm-select" id="children">
            <option value="">Trẻ em</option>
            <option value="0">0</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
            <option value="9">9</option>
            <option value="10">10</option>
        </select>
        <i class="fa fa-user tm-form-element-icon tm-form-element-icon-small"></i>
    </div>
    <div class="form-group tm-form-element tm-form-element-2">
        <select name="room" class="form-control tm-select" id="room">
            <option value="">Phòng</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
            <option value="9">9</option>
            <option value="10">10</option>
        </select>
        <i class="fa fa-2x fa-bed tm-form-element-icon"></i>
    </div>
    <div class="form-group tm-form-element tm-form-element-2">
        <button type="submit" class="btn btn-primary tm-btn-search">Check Availability</button>
    </div>
</div>



<script>
    const tourDescription = `{!! $tourDetail->description !!}`;
    const tourPriceA = "{{ $tourDetail->priceA }}";
    const tourPriceC = "{{ $tourDetail->priceC }}";
</script>

@include('clients.blocks.footer')
