@include('clients.blocks.header')


<div class='bgr'>
    <div class="register-box">
        <h2>Đăng ký thành viên Flazer</h2>

        <form action="{{ route('register') }}" method="POST" id = "register-form">
            @csrf
            <div class="input-group">
                <i class="fas fa-user"></i>
                <input type="text" name="username"id="username_register" placeholder="Tên đăng nhập" required>
            </div>
            <div class="invalid" style="margin-top: -10px" id= "validate_username_reg"></div>

            <div class="input-group">
                <i class="fa fa-envelope"></i>
                <input type="text" name="email" id ="email_register" placeholder="Email" required>
            </div>
            <div class="invalid" id= "validate_email_reg"></div>
            <div class="input-group">
                <i class="fas fa-lock"></i>
                <input type="password" name="password" id ="password_register" placeholder="Mật khẩu" required />
            </div>
            <div class="invalid" style="margin-top: -10px" id= "validate_password_reg"></div>
            <div class="input-group">
                <i class="fas fa-lock"></i>
                <input type="password" name="password_confirmation" id ="pass_confirm" placeholder="Xác nhận mật khẩu"
                    required>
            </div>
            <div class="invalid" style="margin-top: -10px" id= "validate_confirmp_reg"></div>



            <div class="input-group">
                <i class="fas fa-phone"></i>
                <input type="text" name="phone" id="phone" placeholder="Số điện thoại">
            </div>
            <div class="invalid" style="margin-top: -10px" id= "validate_phone"></div>

            <div class="input-group">
                <i class="fas fa-map-marker"></i>
                <input type="text" name="address" placeholder="Địa chỉ">
            </div>
            <button type="submit"id="sign-up">Đăng ký</button>


            {{-- Nút quay lại đăng nhập --}}
            <div class="text-center">
                <a href="{{ route('login') }}"
                    onclick="return confirm('Bạn có chắc muốn hủy đăng ký và quay lại đăng nhập không?')" ;
                    text-decoration: underline;">
                    ⬅ Tôi đã có tài khoản.
                </a>
            </div>
        </form>
    </div>
</div>


<script>
    document.addEventListener("DOMContentLoaded", function() {
        const csrf = '{{ csrf_token() }}';

        function checkExistence(inputSelector, route, errorSelector, fieldName) {
            const input = document.querySelector(inputSelector);
            input.addEventListener('blur', function() {
                fetch(route, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': csrf
                        },
                        body: JSON.stringify({
                            [fieldName]: this.value
                        })
                    })
                    .then(res => res.json())
                    .then(data => {
                        const msg = document.querySelector(errorSelector);
                        if (data.exists) {
                            msg.textContent = fieldName.charAt(0).toUpperCase() + fieldName.slice(
                                1) + ' đã tồn tại!';
                        } else {
                            msg.textContent = '';
                        }
                    });
            });
        }

        checkExistence('input[name="username"]', '{{ route('check.username') }}', '#validate_username_reg',
            'username');
        checkExistence('input[name="email"]', '{{ route('check.email') }}', '#validate_email_reg', 'email');
        checkExistence('input[name="phone"]', '{{ route('check.phone') }}', '#validate_phone', 'phone');
    });
</script>

</div>
@include('clients.blocks.footer')
