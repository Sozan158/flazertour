<div class="tm-section tm-bg-img" id="tm-section-1">
    <div class="tm-bg-white ie-container-width-fix-2">
        <div class="container ie-h-align-center-fix">
            <div class="row">
                <div class="col-xs-12 ml-auto mr-auto ie-container-width-fix">
                    <form method="GET" action="{{ route('search') }}" method="get"
                        class="tm-search-form tm-section-pad-2">
                        <div class="form-row tm-search-form-row">
                            <div class="form-floating">
                                <input type="text" id="destination" name="destination" class="form-input"
                                    placeholder=" ">
                                <label for="destination"><i class="fa fa-map-marker-alt"></i> Chọn điểm đến...</label>
                            </div>

                            <div class="form-floating">
                                <input type="text" id="checkIn" name="check_in" class="form-input" placeholder=" ">
                                <label for="checkIn"><i class="fa fa-calendar-alt"></i> Ngày khởi hành</label>
                            </div>

                            <div class="form-floating">
                                <select name="region" class="form-input">
                                    <option value="">--Chọn miền--</option>
                                    <option value="b">Miền Bắc</option>
                                    <option value="t">Miền Trung</option>
                                    <option value="n">Miền Nam</option>
                                </select>

                            </div>
                        </div>

                        <div class="filter-group">
                            <label for="budget">Ngân sách</label>
                            <input type="range" id="budget" name ="budget" min="0" max="20000000"
                                step="100000" value="{{ request('budget', 10000000) }}">
                            <div class="budget-value">0tr/người - 20tr/người</div>
                        </div>



                        <button type="submit" class="btn btn-primary tm-btn-search">Tìm tour</button>
                        <div class="filter-group">
                            <label>Hiển thị những chuyến đi</label>
                            <label><input type="checkbox" name="promo">Khuyến mãi</label>
                            <label><input type="checkbox" name="available" id="filterAvailable">Còn chỗ</label>
                        </div>
                        <div class="form-row clearfix pl-2 pr-2 tm-fx-col-xs">
                            <a href="#" class="ie-10-ml-auto ml-auto mt-1 tm-font-semibold tm-color-primary">Cần
                                hỗ trợ?</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
