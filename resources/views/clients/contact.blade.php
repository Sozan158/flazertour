@include('clients.blocks.header')


<div class="container-fluid page-header">
    <div class="container">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 400px">
            <h3 class="text-primary text-uppercase" style="letter-spacing: 5px;">LIÊN HỆ</h3>

        </div>
    </div>
</div>
<!-- Header End -->


<section id="contact" class="contact section">

    <div class="container" data-aos="fade-up" data-aos-delay="100">

        <!-- Contact Info Boxes -->
        <div class="row gy-4 mb-5">
            <div class="col-lg-4 " data-aos="fade-up" data-aos-delay="100">
                <div class="contact-info-box">
                    <div class="icon-box">
                        <i class="bi bi-geo-alt"></i>
                    </div>
                    <div class="info-content">
                        <h4>Địa chỉ Flazer</h4>
                        <p>153 Nguyễn Văn Trỗi, quận Phú Nhuận, Thành phố Hồ Chí Minh</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-4" data-aos="fade-up" data-aos-delay="200">
                <div class="contact-info-box">
                    <div class="icon-box">
                        <i class="bi bi-envelope"></i>
                    </div>
                    <div class="info-content">
                        <h4>Địa chỉ email</h4>
                        <p>flazerinfo@gmail.com</p>

                    </div>
                </div>
            </div>

            <div class="col-lg-4" data-aos="fade-up" data-aos-delay="300">
                <div class="contact-info-box">
                    <div class="icon-box">
                        <i class="bi bi-headset"></i>
                    </div>
                    <div class="info-content">
                        <h4>Giờ hoạt động</h4>
                        <p>Chủ nhật - Thứ 6: 9 AM - 6 PM</p>
                        <p>Thứ 7: 9 AM - 4 PM</p>
                    </div>
                </div>
            </div>
        </div>

    </div>


    <!-- Contact Start -->
    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="text-center mb-3 pb-3">

                <h1>Liên hệ với Flazer</h1>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="contact-form bg-white" style="padding: 30px;">
                        <div id="success"></div>
                        <form name="sentMessage" id="contactForm" novalidate="novalidate">
                            <div class="form-row">
                                <div class="control-group col-sm-6">
                                    <input type="text" class="form-control p-4" id="name"
                                        placeholder="Nhập họ tên " required="required"
                                        data-validation-required-message="Please enter your name" />
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="control-group col-sm-6">
                                    <input type="email" class="form-control p-4" id="email"
                                        placeholder="Email của bạn" required="required"
                                        data-validation-required-message="Please enter your email" />
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <div class="control-group">
                                <input type="text" class="form-control p-4" id="subject" placeholder="Chủ đề"
                                    required="required" data-validation-required-message="Please enter a subject" />
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="control-group">
                                <textarea class="form-control py-3 px-4" rows="5" id="message" placeholder="Nội dung" required="required"
                                    data-validation-required-message="Please enter your message"></textarea>
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="text-center">
                                <button class="btn btn-primary py-3 px-4" type="submit" id="sendMessageButton">Gửi yêu
                                    cầu</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    @include('clients.blocks.footer')
