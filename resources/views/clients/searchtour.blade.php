@include('clients.blocks.header')

<x-search-tour />
<hr class='mb-25'>

<div id="tour-section">
    <div class="container">
        <h2 style="text-align: center; margin-bottom: 30px;">Kết quả tìm kiếm</h2>

        <form id="filterForm" action="/search" method="GET">
            {{-- Sắp xếp --}}
            <div class="col-md-3">
                <label for="sort" class="form-label" style="margin-left:10px;">
                    <i class="fas fa-sort"></i> Sắp xếp theo
                </label>
                <select class="form-select" name="sort" id="sort" onchange="this.form.submit()">
                    <option value="">-- Mặc định --</option>
                    <option value="price-asc" {{ request('sort') == 'price-asc' ? 'selected' : '' }}>Giá thấp → cao
                    </option>
                    <option value="price-desc" {{ request('sort') == 'price-desc' ? 'selected' : '' }}>Giá cao → thấp
                    </option>
                    <option value="newest" {{ request('sort') == 'newest' ? 'selected' : '' }}>Mới nhất</option>
                </select>
            </div>
        </form>
        <hr class='mb-25'>

        @if ($tours->isEmpty())
            <p style="text-align: center;">Không tìm thấy tour nào phù hợp.</p>
        @else
            <p>
                🔍 Có {{ $count }} tour phù hợp.
            </p>

            <x-tour-list :tours="$tours" :sort="request('sort')" />
        @endif
    </div>
</div>



@include('clients.blocks.footer')
