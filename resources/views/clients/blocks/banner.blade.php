<!-- Banner -->
<div class="banner">
    <img id="banner-img" src="{{ asset('clients/img/hlb1.jpg') }}" alt="Vịnh Hạ Long">
    <div class="welcome-box">
        <img src="{{ asset('clients/img/flazerlogo1.png') }}" alt="Flazer Tour">
        <h2 style="color:skyblue"">Chào mừng đến FLAZER FAMILY!!</h2>
        <p class="zoom">Sẵn sàng đặt tour??</p>

    </div>

    <!-- Social -->
    <div class="social-bar">
        <a href="#"><i class="fab fa-facebook-f"></i></a>
        <a href="#"><i class="fab fa-instagram"></i></a>
        <a href="#"><i class="fab fa-x-twitter"></i></a>
        <a href="#"><i class="fab fa-youtube"></i></a>
        <a href="#"><i class="fab fa-tiktok"></i></a>
    </div>

</div>
<nav class="breadcrumb">
    <a href="{{ url('/') }}" class="breadcrumb-item">
        <i class="fas fa-home"></i> Trang chủ
    </a>
    <span class="breadcrumb-separator">/</span>
    <span class="breadcrumb-current"></span>
</nav>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const bannerImg = document.getElementById("banner-img");

        const bannerImages = [
            "{{ asset('clients/img/europe.jpg') }}",
            "{{ asset('clients/img/danang.jpg') }}",
            "{{ asset('clients/img/singapore.jpg') }}",
            "{{ asset('clients/img/codohue.jpg') }}"
        ];

        let currentIndex = 0;

        setInterval(() => {
            currentIndex = (currentIndex + 1) % bannerImages.length;
            bannerImg.src = bannerImages[currentIndex];
        }, 5000);
    });
</script>
