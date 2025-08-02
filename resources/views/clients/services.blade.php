@include('clients.blocks.header')
@include('clients.blocks.banner')

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
            <div class="service">
                <div class="icon"><img src="clients/img/hotel.svg" alt=""></div>
                <h4>Đặt khách sạn</h4>
                <p>Khám phá, trải nghiệm không gian nghỉ dưỡng sang trọng với mức giá tốt nhất</p>
            </div>
            <div class="service">
                <div class="icon"><img src="clients/img/hotel.svg" alt=""></div>
                <h4>Đặt khách sạn</h4>
                <p>Khám phá, trải nghiệm không gian nghỉ dưỡng sang trọng với mức giá tốt nhất</p>
            </div>
            <div class="service">
                <div class="icon"><img src="clients/img/hotel.svg" alt=""></div>
                <h4>Đặt khách sạn</h4>
                <p>Khám phá, trải nghiệm không gian nghỉ dưỡng sang trọng với mức giá tốt nhất</p>
            </div>

        </div>
    </div>
</div>
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
@include('clients.blocks.footer')
