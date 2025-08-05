// Form login
$(document).ready(function () {
    $("#login-form").on("submit", function (e) {
        e.preventDefault();

        var username = $("#username_login").val().trim();
        var password = $("#password_login").val().trim();

        $("#validate_username").hide().text("");
        $("#validate_password").hide().text("");

        var isValid = true;
        var usernameRegex = /^[a-zA-Z0-9_]+$/;

        if (username === "") {
            isValid = false;
            $("#validate_username").show().text("Vui lòng nhập tên đăng nhập");
        } else if (!usernameRegex.test(username)) {
            isValid = false;
            $("#validate_username")
                .show()
                .text("Không được chứa ký tự đặc biệt");
        }

        if (password.length < 6) {
            isValid = false;
            $("#validate_password").show().text("Mật khẩu ít nhất 6 kí tự");
        }

        if (isValid) {
            this.submit();
        }
    });

    // Form register
    $("#register-form").on("submit", function (e) {
        e.preventDefault();

        var username = $("#username_register").val().trim();
        var password = $("#password_register").val().trim();
        var email = $("#email_register").val().trim();
        var confirm = $("#pass_confirm").val().trim();
        var phone = $("#phone").val().trim();

        $("#validate_username_reg").hide().text("");
        $("#validate_password_reg").hide().text("");
        $("#validate_email_reg").hide().text("");
        $("#validate_confirmp_reg").hide().text("");
        $("#validate_phone").hide().text("");

        var isValid = true;
        var usernameRegex = /^[a-zA-Z0-9_]+$/;
        var ePattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        var phoneRegex = /^(03|05|07|08|09)[0-9]{8}$/;

        if (username === "") {
            isValid = false;
            $("#validate_username_reg")
                .show()
                .text("Vui lòng nhập tên đăng nhập");
        } else if (!usernameRegex.test(username)) {
            isValid = false;
            $("#validate_username_reg")
                .show()
                .text("Không được chứa ký tự đặc biệt");
        }

        if (password.length < 6) {
            isValid = false;
            $("#validate_password_reg").show().text("Mật khẩu ít nhất 6 kí tự");
        }

        if (!ePattern.test(email)) {
            isValid = false;
            $("#validate_email_reg").show().text("Email không hợp lệ!!");
        }

        if (password !== confirm) {
            isValid = false;
            $("#validate_confirmp_reg")
                .show()
                .text("Mật khẩu không khớp. Vui lòng thử lại!!");
        }

        if (!phoneRegex.test(phone)) {
            isValid = false;
            $("#validate_phone").show().text("Số điện thoại không hợp lệ!!!");
        }

        if (isValid) {
            this.submit();
        }
    });

    // Ẩn alert sau 3 giây
    const alertAppear = document.querySelector(".alert");
    if (alertAppear) {
        setTimeout(() => {
            alertAppear.style.transition = "opacity 0.5s ease";
            alertAppear.style.opacity = "0";
            setTimeout(() => alertAppear.remove(), 500);
        }, 3000);
    }
});
