<div class="row g-4" id="tour-container" style="gap:40px; margin:55px;">
    @foreach ($tours as $tour)
        <div class="tour-card" data-available="{{ $tour->availability ? 1 : 0 }}">
            <div class="tour-img">
                <img src="{{ asset('clients/img/gallery/' . $tour->images) }}"
                    class="{{ !$tour->availability ? 'grayscale' : '' }}">
            </div>
            @if ($tour->availability == 0)
                <div class="unavailable-label">Tour không khả dụng</div>
            @endif
            <div class="tour-body">
                <div class="rating">
                    ⭐ 5.0 ({{ $tour->comments ?? 0 }} đánh giá)
                </div>
                <h3 class="tour-title">{{ $tour->name }}</h3>
                <p>📍{{ $tour->destination }}</p>
                <p> ⏱ {{ $tour->duration }}</p>
                <p><i class="fa fa-calendar"> {{ $tour->start_date }} </i></p>
                <div>
                    <span class="price">{{ number_format($tour->priceA, 0, ',', '.') }} VND /người</span>
                </div>
                <a href="{{ $tour->availability > 0 ? route('tour-detail', ['id' => $tour->IDTour]) : 'javascript:void(0)' }}"
                    class="btn-book {{ $tour->availability == 0 ? 'disabled' : '' }}"
                    style="{{ $tour->availability == 0 ? 'pointer-events: none; opacity: 0.5; cursor: not-allowed; background: grey;' : '' }}">Đặt
                    ngay</a>
            </div>
        </div>
    @endforeach

</div>
</div>
