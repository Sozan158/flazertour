const navItems = document.querySelectorAll(".nav-item");

navItems.forEach((item) => {
    item.addEventListener("click", () => {
        navItems.forEach((i) => i.classList.remove("active"));
        item.classList.add("active");
    });
});

//Profile Tabs

document.addEventListener("DOMContentLoaded", function () {
    const navItems = document.querySelectorAll(".nav li");
    const contentTabs = document.querySelectorAll(".content-tab");
    const titleTabs = document.getElementById("tab-title");

    const tabNames = {
        "tab-profile": "Thông tin cá nhân",
        "tab-password": "Thay đổi mật khẩu",
        "tab-notification": "Thông báo",
        "tab-cart": "Đơn hàng của bạn",
    };
    navItems.forEach((item) => {
        item.addEventListener("click", function (e) {
            e.preventDefault();

            navItems.forEach((i) => i.classList.remove("active"));
            item.classList.add("active");

            const targetID = item.getAttribute("data-tab");

            contentTabs.forEach((tab) => {
                tab.style.display = "none";
            });

            document.getElementById(targetID).style.display = "block";

            titleTabs.textContent = tabNames[targetID] || "";
        });
    });
});
