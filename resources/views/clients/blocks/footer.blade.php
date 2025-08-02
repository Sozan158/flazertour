<!-- Footer Start -->
<div class="footer-container">
    <!-- Logo & mạng xã hội -->
    <div class="footer-column">
        <a href="#" class="logo">
            <img style = "height: 200px" src="{{ asset('clients/img/flazerlogo1.png') }}" alt="Flazer Tour">
        </a>
        <p></p>
        <p class="slogan">Trải nghiệm vô tận</p>

        <h6 class="footer-subtitle">Theo dõi Flazer</h6>
        <div class="social-icons">
            <a href="https://www.facebook.com/kan.nguyen.56232"><i class="fab fa-facebook-f facebook"></i></a>
            <a href="#"><i class="fab fa-instagram instagram"></i></a>
            <a href="#"><i class="fab fa-x-twitter twitterx"></i></a>
            <a href="#"><i class="fab fa-tiktok tiktok"></i></a>
        </div>
    </div>

    <!-- Dịch vụ -->
    <div class="footer-column">
        <h5 class="footer-title">Dịch vụ</h5>
        <div class="footer-links">
            <a class="ft" href="{{ route('services') }}">Các dịch vụ</a>
            <a class="ft" href="{{ route('destination') }}">Điểm đến</a>
            <a class="ft" href="#">Ưu đãi</a>
            <a class="ft" href="#">Đánh giá</a>
            <a class="ft" href="#">Chăm sóc khách hàng</a>
        </div>
    </div>

    <!-- Thông tin cần biết -->
    <div class="footer-column">
        <h5 class="footer-title">Thông tin cần biết</h5>
        <div class="footer-links">
            <a class="ft" href="{{ route('about') }}">Về Flazer</a>
            <a class="ft" href="#">Điều kiện và điều khoản</a>
            <a class="ft" href="#">Chính sách riêng tư</a>
            <a class="ft" href="#">Câu hỏi thường gặp</a>
            <a class="ft" href="{{ route('blog') }}">Blog</a>
        </div>
    </div>

    <!-- Liên hệ -->
    <div class="footer-column">
        <h5 class="footer-title">Liên hệ Frazer</h5>
        <p class="ft"><span>📍</span> 153 Nguyễn Văn Trỗi, quận Phú Nhuận, HCM</p>
        <p class="ft"><span>📞</span> +093 204 63114</p>
        <p class="ft"><span>✉️</span> flazerinfo@gmail.com</p>

        <h6 class="footer-subtitle">Gửi mail</h6>
        <div class="email-wrapper">
            <div class="email-form">
                <input type="text" class="email-input" placeholder="Email của bạn">
                <button class="email-button">Đăng ký</button>
            </div>
        </div>
    </div>
</div>
</div>


<div class="container-fluid bg-dark text-white border-top py-4 px-sm-3 px-md-5"
    style="border-color: rgba(256, 256, 256, .1) !important;">
    <div class="row">
        <div class="col-lg-6 text-center text-md-left mb-3 mb-md-0">
            <p class="m-0 text-white-50">Copyright &copy; <a href="#">2025</a> FLAZERTOUR</a>
            </p>
        </div>
        <div class="col-lg-6 text-center text-md-right">
            <p class="m-0 text-white">Author <a href="https://www.youtube.com/@shukransozan">Sozan
                    Nguyen</a>
            </p>
        </div>
    </div>
</div>
<!-- Footer End -->


<!-- Back to Top -->
<a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="fa fa-angle-double-up"></i></a>



<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

{{-- <script src="{{ asset('clients/https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js') }}">
    </script>
    <script src="{{ asset('clients/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('clients/lib/owlcarousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('clients/lib/tempusdominus/js/moment.min.js') }}"></script>
    <script src="{{ asset('clients/lib/tempusdominus/js/moment-timezone.min.js') }}"></script>
    <script src="{{ asset('clients/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js') }}"></script>  --}}

<!-- Contact Javascript File -->
{{-- <script src="{{ asset('clients/mail/jqBootstrapValidation.min.js') }}"></script>
    <script src="{{ asset('clients/mail/contact.js') }}"></script> --}}

<!-- Template Javascript -->
{{-- <script src="{{ asset('clients/js/main.js') }}"></script> --}}
<script src="{{ asset('clients/js/slider.js') }}"></script>
<script src="{{ asset('clients/js/pagination.js') }}"></script>
<script src="{{ asset('clients/js/tour.js') }}"></script>
<script src="{{ asset('clients/js/tour-detail.js') }}"></script>
<script src="{{ asset('clients/js/custom.js') }}"></script>




</body>

</html>
