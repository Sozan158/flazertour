//Toast

let progressStart = 0;
let progressEnd = 100;
let progressColor = "#28a745";
let progressInterval;

function showToast(type, message) {
    const toastBox = $(".toasts");
    const icon = $(".squad i");
    const title = $(".upside span");
    const text = $(".message");
    const squad = $(".squad");

    toastBox.removeClass("showing").css("display", "block");

    setTimeout(() => {
        toastBox.addClass("showing");
    }, 40);

    if (type === "success") {
        title.text("Thành công").css("color", "#28a745");
        icon.removeClass()
            .addClass("fa-solid fa-circle-check")
            .css("color", "#28a745");
        toastBox.css("border", "3px solid #28a745");
        progressColor = "#28a745";
    } else if (type === "warning") {
        title.text("Cảnh báo").css("color", "orange");
        icon.removeClass()
            .addClass("fa-solid fa-triangle-exclamation")
            .css("color", "orange");
        toastBox.css("border", "3px solid orange");
        progressColor = "orange";
    } else if (type === "error") {
        title.text("Lỗi").css("color", "red");
        icon.removeClass()
            .addClass("fa-solid fa-circle-xmark")
            .css("color", "red");
        toastBox.css("border", "3px solid red");
        progressColor = "red";
    }

    text.text(message);

    progressStart = 0;
    clearInterval(progressInterval);

    progressInterval = setInterval(() => {
        progressStart++;
        squad.css(
            "background",
            `conic-gradient(${progressColor} ${
                progressStart * 3.6
            }deg, #fff 0deg)`
        );

        if (progressStart >= progressEnd) {
            clearInterval(progressInterval);
        }
    }, 30);

    setTimeout(() => {
        toastBox.removeClass("showing");
        setTimeout(() => {
            toastBox.css("display", "none");
        }, 800);
    }, 3000);
}

if (typeof toastData !== "undefined") {
    showToast(toastData.type, toastData.message);
}

//Booking Form
document.addEventListener("DOMContentLoaded", function () {
    const discountInput = document.getElementById("discount");
    const applyButton = document.getElementById("apply-discount");

    discountInput.addEventListener("input", function () {
        if (this.value.trim() !== "") {
            applyButton.hidden = false;
        } else {
            applyButton.hidden = true;
        }
    });
});

let discount = 0;

const codeInput = document.getElementById("dis_code");
$(".apply-discount").on("click", function () {
    const discountCode = $(".discount-code").val();

    if (discountCode === "FZDISCOUNT10") {
        discount = 0.1 * totalprice;
        updateTotalPrice = totalprice - discount;

        $(".discount-value").text(
            " - " + discount.toLocaleString("vi-VN") + " VND"
        );

        $(".totalPriceValue").text(
            updateTotalPrice.toLocaleString("vi-VN") + " VND"
        );

        codeInput.hidden = false;
        showToast("success", "Áp dụng mã giảm giá thành công!");
    } else {
        discount = 0;

        $(".discount-value").text("");
        $(".totalPriceValue").text(totalprice.toLocaleString("vi-VN") + " VND");

        codeInput.hidden = true;
        showToast("error", "Mã giảm giá vô hiệu!!");
    }
});

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

        if (password !== confirm) {
            isValid = false;
            $("#validate_confirmp_reg")
                .show()
                .text("Mật khẩu không khớp. Vui lòng thử lại!!");
        }

        if (!ePattern.test(email)) {
            isValid = false;
            $("#validate_email_reg").show().text("Email không hợp lệ!!");
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

    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    document.querySelectorAll(".updateUser").forEach((form) => {
        form.addEventListener("submit", function (e) {
            e.preventDefault();

            const formData = new FormData(this);

            fetch(this.action, {
                method: "POST",
                body: formData,
                headers: {
                    "X-CSRF-TOKEN": document.querySelector(
                        'meta[name="csrf-token"]'
                    ).content,
                },
            })
                .then((res) => res.json())
                .then((data) => {
                    if (data.success) {
                        if (data.message) {
                            document.querySelector("#fullname").value =
                                data.message.fullname || "";
                            document.querySelector("#email").value =
                                data.message.email || "";
                            document.querySelector("#phone").value =
                                data.message.phone || "";
                            document.querySelector("#address").value =
                                data.message.address || "";
                        }

                        showToast("success", "Lưu thông tin thành công!");
                    } else if (data.unchanged) {
                        showToast(
                            "warning",
                            data.message || "Không có thay đổi nào."
                        );
                    } else {
                        showToast(
                            "error",
                            data.message || "Lưu thông tin thất bại!!"
                        );
                    }
                })
                .catch((error) => {
                    console.error(error);
                    showToast("error", "Lỗi xảy ra khi gửi dữ liệu!!");
                });
        });
    });

    $(".changePassword").on("submit", function (e) {
        e.preventDefault();

        var oldPass = $("#old_password").val();
        var newPass = $("#new_password").val();
        var confPass = $("#confirm_password").val();

        var isValid = true;
        var actionUrl = $(".changePassword").data("url");

        $("#alertPassword").hide().text("");

        const $submitBtn = $(this).find("button[type='submit']");
        $submitBtn.prop("disabled", true);

        if (oldPass.length < 6 || newPass.length < 6) {
            isValid = false;
            showToast("error", "Mật khẩu ít nhất 6 kí tự!!");
        }

        if (newPass !== confPass) {
            isValid = false;
            showToast("error", "Mật khẩu xác thực không khớp!!");
        }

        if (isValid) {
            $.ajax({
                type: "POST",
                url: actionUrl,
                data: {
                    _token: $('meta[name="csrf-token"]').attr("content"),
                    oldPass: oldPass,
                    newPass: newPass,
                    confPass: confPass,
                },
                success: function (response) {
                    if (response.success) {
                        showToast("success", "Cập nhật thành công!");
                    } else if (response.unchanged) {
                        showToast("warning", "Không thay đổi mật khẩu");
                    } else {
                        showToast("error", "Cập nhật thất bại!");
                    }
                },

                error: function (xhr) {
                    console.error(xhr.responseText);
                    alert(
                        "Có lỗi xảy ra: " + xhr.status + " - " + xhr.statusText
                    );
                },
                complete: function () {
                    setTimeout(() => {
                        $submitBtn.prop("disabled", false);
                    }, 3000);
                },
            });
        } else {
            setTimeout(() => {
                $submitBtn.prop("disabled", false);
            }, 3000);
        }
    });

    // Đóng toast khi click nút close
    $(".close").on("click", () => {
        $(".toasts_message").fadeOut();
    });

    $("#booking-form").on("submit", function (e) {
        e.preventDefault();

        const fullname = $("#fullname_booking").val().trim();
        const email = $("#email_booking").val().trim();
        const phone = $("#phone_booking").val().trim();
        const address = $("#address_booking").val().trim();
        const paymentMethod = $("input[name='payment']:checked").val();

        var isValid = true;
        const fullnameRegex = /^[\p{L}\s]+$/u;
        const ePattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        const phoneRegex = /^(03|05|07|08|09)[0-9]{8}$/;

        if (fullname === "") {
            isValid = false;
            showToast("error", "Họ tên không được để trống");
        } else if (!fullnameRegex.test(fullname)) {
            isValid = false;
            showToast("error", "Họ tên không được chứa ký tự đặc biệt");
        }

        if (email === "") {
            isValid = false;
            showToast("error", "Email không được để trống!!");
        } else if (!ePattern.test(email)) {
            isValid = false;
            showToast("error", "Email không hợp lệ!!");
        }

        if (phone === "") {
            isValid = false;
            showToast("error", "Số điện thoại không được để trống!!");
        } else if (!phoneRegex.test(phone)) {
            isValid = false;
            showToast("error", "Số điện thoại không hợp lệ!!!");
        }

        if (!paymentMethod) {
            isValid = false;
            showToast("error", "Chọn phương thức thanh toán!!");
        }

        if (isValid) {
            this.submit();
        }
    });
});

//PreviewAvt
document.addEventListener("DOMContentLoaded", function () {
    const input = document.getElementById("avtInput");
    const preview = document.getElementById("preview");
    const form = document.getElementById("avatarForm");

    if (!input || !preview || !form) return;

    input.addEventListener("change", function (event) {
        const file = event.target.files[0];
        if (!file) return;

        const reader = new FileReader();
        reader.onload = function () {
            preview.src = reader.result;
        };
        reader.readAsDataURL(file);
    });
});
