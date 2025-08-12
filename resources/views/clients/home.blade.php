@include('clients.blocks.header')
@include('clients.blocks.banner')
@include('components.toast')

<!-- Carousel Start -->

<div>

    <div class=" d-flex flex-column align-items-center justify-content-center">
        <div class="p-3" style="max-width: 900px;">
            <h1 style="text-align: center">Hơn 200+ tour giá tốt trong tầm tay</h1>

            <img class="w-100" src="{{ asset('clients/img/hlb2.jpg') }}" alt="Image">
        </div>
    </div>


</div>


<div class = "toasts_message">
    <div class = "toasts">
        <div class="upside">
            <div class="squad">
                <i class = "fa-solid fa-circle-check"></i>

            </div>
            <span class="title">
                Rỗng
            </span>
        </div>
        <span class="message">Không thay đổi </span>
        <i class="fa-solid fa-xmark close"></i>

    </div>

</div>
{{-- <button class="showToast">Toast</button> --}}

<!-- Carousel End -->


<!-- Destination Start -->
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
<!-- Destination Start -->


<!-- Service Start -->
<div class="container-fluid py-5">
    <div class="container pt-5 pb-3">
        <div class="text-center mb-3 pb-3">
            <h6 class="text-primary text-uppercase" style="letter-spacing: 5px;">Dịch vụ</h6>
            <h1>Dịch vụ của FLAZER</h1>
        </div>


        <div class="services-container">
            <div class="service">
                <div class="icon"><img src="clients/img/payment.svg" alt=""></div>
                <h4>Thanh toán an toàn</h4>
                <p>Bảo mật tối ưu cho các giao dịch lớn nhỏ</p>
            </div>
            <div class="service">
                <div class="icon"><img src="clients/img/findtour.svg" alt=""></div>
                <h4>Đặt vé</h4>
                <p>Nhanh chóng, tiện lợi Flazer tự hào mang đến trải nghiệm hoàn hảo cho kì nghỉ của bạn</p>
            </div>
            <div class="service">
                <div class="icon"><img src="clients/img/hotel.svg" alt=""></div>
                <h4>Đặt khách sạn</h4>
                <p>Khám phá, trải nghiệm không gian nghỉ dưỡng sang trọng với mức giá tốt nhất</p>
            </div>
        </div>
    </div>
</div>



<!-- Registration Start -->
<div class="container-fluid bg-registration py-5" style="margin: 90px 0;">
    <div class="container py-5">
        <div class="row justify-content-between align-items-center">
            <div class="col-lg-6 mb-5 mb-lg-0">
                <div class="mb-4">
                    <h6 class="text-primary text-uppercase" style="letter-spacing: 5px;">SIÊU SALE XẬP XÌNH
                    </h6>
                    <h1 class="text-white"><span class="text-primary">30% OFF</span> cho TUẦN TRĂNG MẬT</h1>
                </div>
                <p class="text-white">Tận hưởng sự sang trọng tiện nghi, trải nghiệm chuyến đi đáng nhớ</p>
                <ul class="list-inline text-white m-0">
                    <li class="py-2"><i class="fa fa-check text-primary mr-3"></i>Hỗ trợ tận tình</li>
                    <li class="py-2"><i class="fa fa-check text-primary mr-3"></i>Tìm kiếm chuyến đi nhanh
                        chóng
                    </li>
                    <li class="py-2"><i class="fa fa-check text-primary mr-3"></i>Giá cả phải chăng.</li>
                </ul>
            </div>
            <div class="col-lg-5 d-flex justify-content-center">
                <div class="card border-0 shadow-lg w-100">
                    <div class="card-header bg-success text-center p-4 rounded-top">
                        <h2 class="text-white m-0">Đăng ký ngay</h2>
                    </div>
                    <div class="card-body bg-white p-4">
                        <form>
                            <div class="form-group mb-3">
                                <input type="text" class="form-control p-3" placeholder="Tên của bạn" required />
                            </div>
                            <div class="form-group mb-3">
                                <input type="email" class="form-control p-3" placeholder="Email của bạn"
                                    required />
                            </div>
                            <div class="form-group mb-4">
                                <select class="custom-select p-3" style="height: auto;">
                                    <option selected>Lựa chọn điểm đến</option>
                                    <option value="1">Điểm đến 1</option>
                                    <option value="2">Điểm đến 2</option>
                                    <option value="3">Điểm đến 3</option>
                                </select>
                            </div>
                            <button class="btn btn-success btn-block py-3" type="submit">Đăng ký</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Registration End -->




<!-- Testimonial Start -->
<div class="container-fluid py-5">
    <div class="container py-5">
        <div class="text-center mb-3 pb-3">
            <h6 class="text-primary text-uppercase" style="letter-spacing: 5px;">Về Flazer</h6>
            <h1>Đánh giá từ những người trải nghiệm</h1>
        </div>
        <section class="testimonials">

            <div class="testimonial-cards">
                <div class="card">
                    <img src="clients/img/testimonial-1.jpg" alt="Client 1">
                    <p class="quote">.....................................</p>
                    <p class="client-name">Client Name</p>
                    <p class="client-profession">Profession</p>
                </div>

                <div class="card active">
                    <img src="clients/img/testimonial-2.jpg" alt="Client 2">
                    <p class="quote">...................................</p>
                    <p class="client-name">Client Name</p>
                    <p class="client-profession">Profession</p>
                </div>

                <div class="card">
                    <img src="clients/img/testimonial-3.jpg" alt="Client 3">
                    <p class="quote">..................................</p>
                    <p class="client-name">Client Name</p>
                    <p class="client-profession">Profession</p>
                </div>
            </div>

            <div class="pagination-dots">
                <div class="dot"></div>
                <div class="dot active"></div>
                <div class="dot"></div>
            </div>
        </section>
    </div>
</div>

<!-- Testimonial End -->




@include('clients.blocks.footer')
