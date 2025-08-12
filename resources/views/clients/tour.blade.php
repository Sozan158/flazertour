@include('clients.blocks.header')
@include('clients.blocks.banner')


<x-search-tour />


<!--Tour list -->
<div id="tour-section">
    <div class="container py-4">
        <h6 class="text-primary text-uppercase text-center" style="letter-spacing: 5px;">Danh sách</h6>
        <h1 class="text-center">Tour du lịch hiện hành</h1>


        <x-tour-list :tours="$tours" />

    </div>
    <div class="d-flex justify-content-center">
        {{ $tours->links('pagination::bootstrap-5') }}
    </div>

</div>


<div id="tour-section">
    <div class="container py-4">
        <h6 class="text-primary text-uppercase text-center" style="letter-spacing: 5px;">Danh sách</h6>
        <h1 class="text-center">Tour du lịch Miền Bắc</h1>
    </div>

</div>



<div class="container-fluid py-5">
    <div class="container pt-5 pb-3">
        <div class="text-center mb-3 pb-3">
            <h6 class="text-primary text-uppercase" style="letter-spacing: 5px;">Điểm đến</h6>
            <h1>Tour du lịch hàng đầu</h1>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="destination-item position-relative overflow-hidden mb-2">
                    <img class="img-fluid" src="clients/img/hlb1.jpg" alt="">
                    <a class="destination-overlay text-white text-decoration-none" href="">
                        <h5 class="text-white">Hạ Long</h5>
                        <span>15 Tour</span>
                    </a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="destination-item position-relative overflow-hidden mb-2">
                    <img class="img-fluid" src="clients/img/danang.jpg" alt="">
                    <a class="destination-overlay text-white text-decoration-none" href="">
                        <h5 class="text-white">Đà Nẵng</h5>
                        <span>20 Tour</span>
                    </a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="destination-item position-relative overflow-hidden mb-2">
                    <img class="img-fluid" src="clients/img/ntrang.jpg" alt="">
                    <a class="destination-overlay text-white text-decoration-none" href="">
                        <h5 class="text-white">Nha Trang</h5>
                        <span>30 Tours</span>
                    </a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="destination-item position-relative overflow-hidden mb-2">
                    <img class="img-fluid" src="clients/img/ninhbinh.jpg" alt="">
                    <a class="destination-overlay text-white text-decoration-none" href="">
                        <h5 class="text-white">Ninh Bình</h5>
                        <span>17 Tours</span>
                    </a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="destination-item position-relative overflow-hidden mb-2">
                    <img class="img-fluid" src="clients/img/phuquoc1.jpg" alt="">
                    <a class="destination-overlay text-white text-decoration-none" href="">
                        <h5 class="text-white">Phú Quốc</h5>
                        <span>15 Tours</span>
                    </a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="destination-item position-relative overflow-hidden mb-2">
                    <img class="img-fluid" src="clients/img/Hue-1.jpg" alt="">
                    <a class="destination-overlay text-white text-decoration-none" href="">
                        <h5 class="text-white">Huế</h5>
                        <span>10 Tour</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>


@include('clients.blocks.footer')
