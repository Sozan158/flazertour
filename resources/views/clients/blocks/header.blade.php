<!DOCTYPE html>
<html lang="en">
{{-- - {{ $title }} --}}

<head>
    <meta charset="utf-8">
    <title>FLAZER TOUR </title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="tour du lịch, đặt tour, flazer tour, du lịch Việt Nam" name="keywords">
    <meta content="Flazer Tour - Đặt tour giá rẻ, khám phá vô tận" name="description">

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">


    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('clients/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('clients/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css') }}" rel="stylesheet" />

    {{-- <!-- Customized Bootstrap Stylesheet --}}
    <link href="{{ asset('clients/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('clients/css/menu.css') }}" rel="stylesheet">
    <link href="{{ asset('clients/css/tour-cards.css') }}" rel="stylesheet">
    <link href="{{ asset('clients/css/tour-detail.css') }}" rel="stylesheet">
    <link href="{{ asset('clients/css/packages.css') }}" rel="stylesheet">
    <link href="{{ asset('clients/css/testimonial.css') }}" rel="stylesheet">
    <link href="{{ asset('clients/css/ft.css') }}" rel="stylesheet">
    <link href="{{ asset('clients/css/reg.css') }}" rel="stylesheet">



    <!-- Bootstrap CSS -->
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous"> --}}
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


    <!-- Flatpickr -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>



</head>
<!-- Loader overlay -->
<div id="loader"
    style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%;
     background: rgba(255, 255, 255, 0.8); z-index: 9999; justify-content: center; align-items: center;">
    <div class="spinner"></div>
</div>



<body>
    <header class="navbar">
        <div class="logo">
            <div class="logo-text">
                <h1 style="color: lightskyblue"><span class="text-dark">FLAZER</span>TOUR</h1>
                <p>TRẢI NGHIỆM VÔ TẬN</p>
            </div>
        </div>
        <nav class="menu">
            <ul class="main-menu">
                <li class="nav-item {{ request()->is('trang-chu') ? 'active' : '' }}">
                    <a href="{{ route('home') }} ">Trang chủ</a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('about') }}">Về Flazer</a>
                </li>

                <li class="nav-item ">
                    <a href="{{ route('tours') }}">Tours</a>
                </li>


                <li class="nav-item ">
                    <a href="{{ route('services') }}">Dịch vụ</a>
                </li>

                <li class="has-dropdown">
                    <a href="#">Pages <span class="dropdown-icon">&#9660;</span></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ route('blog') }}">Flazer Blog</a></li>
                        <li><a href="{{ route('packages') }}">Tour trọn gói</a></li>
                        <li><a href="{{ route('destination') }}"">Điểm đến</a></li>
                        <li><a href="{{ route('contact') }}">Hỗ trợ</a></li>
                        <li><a href="{{ route('contact') }}">Liên hệ Flazer</a></li>
                    </ul>
                </li>
                {{-- Nếu chưa đăng nhập --}}
                @guest
                    <li>
                        <a href="{{ route('login') }}" class="account-link">
                            <i class="fas fa-user"></i>
                            <span>Tài khoản</span>
                        </a>
                    </li>
                @endguest

                {{-- Nếu đã đăng nhập --}}
                @auth
                    <li class="has-dropdown">
                        <a href="#" class="account-link">
                            {{-- <i class="fas fa-user-check"></i>  --}}
                            <img src="{{ asset('clients/img/profile/' . auth()->user()->avatar) }}"
                                style="cursor:pointer; width: 40px;">

                            <span>{{ auth()->user()->username }}</span>
                            <span class="dropdown-icon">&#9660;</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a>{{ auth()->user()->role }}</a></li>
                            <li><a href="{{ route('profile') }}">Thông tin cá nhân</a></li>
                            <li>
                                <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    Đăng xuất
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </li>
                @endauth

            </ul>

        </nav>
    </header>
