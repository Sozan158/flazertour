@include('clients.blocks.header')

<div class="bgr1">

    <div class="login-box">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @elseif (session('error'))
            <div class="alert alert-error">
                {{ session('error') }}
            </div>
        @endif

        <h2>Đăng nhập</h2>


        <form method="POST" action="{{ route('login') }}" id="login-form">
            @csrf
            <div class="input-group">
                <i class="fas fa-user"></i>
                <input type="text" name="username" id = "username_login" placeholder="Tên đăng nhập"
                    value="{{ old('username', session('registered_username')) }}" required />
            </div>
            <div class="invalid" style="margin-top: -15px" id= "validate_username"></div>


            <div class="input-group">
                <i class="fas fa-lock"></i>
                <input type="password" name="password" id ="password_login" placeholder="Mật khẩu" required />
            </div>
            <div class="invalid" style="margin-top: -15px" id= "validate_password"></div>
            <div class="input-group">
                <button type="submit" name ="signin">Đăng nhập</button>
            </div>
            <div class="social-login">

                <a href="{{ route('login-google') }}" class="google-btn">
                    <i class ="text-dark fab fa-google"></i>Google
                </a>

                <a href="{{ url('/auth/facebook') }}" class="facebook-btn">
                    <i class ="text-white fab fa-facebook-f" style="color: whitesmoke"></i>Facebook
                </a>

            </div>
            <div class="text-center">
                <a href="#">Quên mật khẩu?</a><br>
                <a href="{{ route('register') }}">Chưa có tài khoản? Đăng ký</a>
            </div>
            <div id="login-message" class="alert" style="display: none;"></div>

        </form>
    </div>


</div>

{{-- @if (Auth::check())
    Xin chào, {{ Auth::user()->name }}
@endif --}}



@include('clients.blocks.footer')
