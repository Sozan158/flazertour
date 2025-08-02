@include('clients.blocks.header')
@include('clients.blocks.banner')
<!-- Blog Start -->
<div class="container-fluid py-5">
    <div class="container pt-5 pb-3">
        <div class="text-center mb-3 pb-3">
            <h6 class="text-primary text-uppercase" style="letter-spacing: 5px;">Flazer Blog</h6>
            <h1>Tin tức mới nhất về Flazer</h1>
        </div>
        <div class="row pb-3">
            <div class="col-lg-4 col-md-6 mb-4 pb-2">
                <div class="blog-item">
                    <div class="position-relative">
                        <img class="img-fluid w-100" src="{{ asset('clients/img/blog-1.jpg') }}" alt="">
                        <div class="blog-date">
                            <h6 class="font-weight-bold mb-n1">10</h6>
                            <small class="text-white text-uppercase">th3</small>
                        </div>
                    </div>
                    <div class="bg-white p-4">
                        <div class="d-flex mb-2">
                            <a class="text-primary text-uppercase text-decoration-none" href="">Admin</a>
                            <span class="text-primary px-2">|</span>
                            <a class="text-primary text-uppercase text-decoration-none" href="">Du lịch</a>
                        </div>
                        <a class="h5 m-0 text-decoration-none" href="">Top 5 bãi biển đẹp nhất Phú Quốc-
                            Thiên đường nghỉ dưỡng</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-4 pb-2">
                <div class="blog-item">
                    <div class="position-relative">
                        <img class="img-fluid w-100" src="{{ asset('clients/img/blog-2.jpg') }}" alt="">
                        <div class="blog-date">
                            <h6 class="font-weight-bold mb-n1">13</h6>
                            <small class="text-white text-uppercase">th4</small>
                        </div>
                    </div>
                    <div class="bg-white p-4">
                        <div class="d-flex mb-2">
                            <a class="text-primary text-uppercase text-decoration-none" href="">Admin</a>
                            <span class="text-primary px-2">|</span>
                            <a class="text-primary text-uppercase text-decoration-none" href="">Du lịch</a>
                        </div>
                        <a class="h5 m-0 text-decoration-none" href="">Top 5 danh lam thắng cảnh không thể
                            bỏ lỡ</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-4 pb-2">
                <div class="blog-item">
                    <div class="position-relative">
                        <img class="img-fluid w-100" src="{{ asset('clients/img/blog-3.jpg') }}" alt="">
                        <div class="blog-date">
                            <h6 class="font-weight-bold mb-n1">17</h6>
                            <small class="text-white text-uppercase">th7</small>
                        </div>
                    </div>
                    <div class="bg-white p-4">
                        <div class="d-flex mb-2">
                            <a class="text-primary text-uppercase text-decoration-none" href="">Admin</a>
                            <span class="text-primary px-2">|</span>
                            <a class="text-primary text-uppercase text-decoration-none" href="">Du lịch</a>
                        </div>
                        <a class="h5 m-0 text-decoration-none" href="">5 bãi biển ở Huế không thể bỏ qua
                            dịp hè 2025</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Blog End -->

@include('clients.blocks.footer')
