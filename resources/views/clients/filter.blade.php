<header id="header" class="header d-flex align-items-center light-background sticky-top">
    <div class="container-fluid position-relative d-flex align-items-center justify-content-between">

        <a href="index.html" class="logo d-flex align-items-center me-auto me-xl-0">
            <!-- Uncomment the line below if you also wish to use an image logo -->
            <!-- <img src="assets/img/logo.png" alt=""> -->
            <h1 class="sitename">Kelly</h1>
        </a>

        <nav id="navmenu" class="navmenu">
            <ul>
                <li><a href="index.html" class="active">Home</a></li>
                <li><a href="about.html">About</a></li>
                <li><a href="resume.html">Resume</a></li>
                <li><a href="services.html">Services</a></li>
                <li><a href="portfolio.html">Portfolio</a></li>
                <li class="dropdown"><a href="#"><span>Dropdown</span> <i
                            class="bi bi-chevron-down toggle-dropdown"></i></a>
                    <ul>
                        <li><a href="#">Dropdown 1</a></li>
                        <li class="dropdown"><a href="#"><span>Deep Dropdown</span> <i
                                    class="bi bi-chevron-down toggle-dropdown"></i></a>
                            <ul>
                                <li><a href="#">Deep Dropdown 1</a></li>
                                <li><a href="#">Deep Dropdown 2</a></li>
                                <li><a href="#">Deep Dropdown 3</a></li>
                                <li><a href="#">Deep Dropdown 4</a></li>
                                <li><a href="#">Deep Dropdown 5</a></li>
                            </ul>
                        </li>
                        <li><a href="#">Dropdown 2</a></li>
                        <li><a href="#">Dropdown 3</a></li>
                        <li><a href="#">Dropdown 4</a></li>
                    </ul>
                </li>
                <li><a href="contact.html">Contact</a></li>
            </ul>
            <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
        </nav>

        <div class="header-social-links">
            <a href="#" class="twitter"><i class="bi bi-twitter-x"></i></a>
            <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
            <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
            <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
        </div>

    </div>
</header>


<!-- Tour Grid Area start -->
<section class="tour-grid-page py-100 rel z-2">
    <div class="container">
        <div class="row">
            @if ($tours->isEmpty())
                <h4 class="alert alert-danger">Không có tour nào liên quan đến tìm kiếm của bạn. Thử tìm kiếm với từ
                    khóa
                    khác nhé!</h4>
            @else
                <x-tour-list :tours="$tours" />
            @endif

        </div>
    </div>
</section>
<!-- Tour Grid Area end -->


<section class="tour-grid-page py-100 rel z-2">
    <div class="container">
        <div class="row">
            @if ($tours->isEmpty())
                <h4 class="alert alert-danger">Không có tour nào liên quan đến tìm kiếm của bạn. Thử tìm kiếm với từ
                    khóa
                    khác nhé!</h4>
            @else
                @foreach ($tours as $tour)
                    <div class="col-xl-4 col-md-6" style="margin-bottom: 30px">
                        <div class="destination-item tour-grid style-three bgc-lighter equal-block-fix"
                            data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                            <div class="image">
                                <a href="#" class="heart"><i class="fas fa-heart"></i></a>
                                @if ($tour->images)
                                    <img src="{{ asset('admin/assets/images/gallery-tours/' . $tour->images[0]) }}"
                                        alt="Tour List">
                                @else
                                    <img src="{{ asset('admin/assets/images/no-image.jpg') }}" alt="No Image Available">
                                @endif
                            </div>
                            <div class="content equal-content-fix">
                                <div class="destination-header">
                                    <span class="location"><i class="fal fa-map-marker-alt"></i>
                                        {{ $tour->destination }}</span>
                                    <div class="ratting">
                                        @for ($i = 0; $i < 5; $i++)
                                            @if ($tour->destination)
                                                <i class="fas fa-star"></i>
                                            @else
                                                <i class="far fa-star"></i>
                                            @endif
                                        @endfor
                                    </div>
                                </div>
                                <h5><a href="#"></a>
                                </h5>
                                <ul class="blog-meta">
                                    <li><i class="far fa-clock"></i>12:00</li>
                                    <li><i class="far fa-user"></i>4</li>
                                </ul>
                                <div class="destination-footer">
                                    <span class="price"><span>{{ number_format(2000, 0, ',', '.') }}</span>
                                        VND / người</span>
                                    <a href="#" class="theme-btn style-two style-three">
                                        <span data-hover="Đặt ngay">Đặt ngay</span>
                                        <i class="fal fa-arrow-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif

        </div>
    </div>
</section>
@include('clients.blocks.footer')
