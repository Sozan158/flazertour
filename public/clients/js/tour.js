// Thanh trượt giá

document.addEventListener("DOMContentLoaded", function () {
    const budgetSlider = document.getElementById("budget");
    const budgetValueDisplay = document.querySelector(".budget-value");

    if (budgetSlider && budgetValueDisplay) {
        // Cập nhật giá trị hiển thị khi người dùng kéo thanh trượt
        const updateDisplay = (value) => {
            const formattedValue = (value / 1000000)
                .toFixed(1)
                .replace(".0", "");
            budgetValueDisplay.textContent = `0tr/đầu - ${formattedValue}tr/đầu`;
        };

        budgetSlider.addEventListener("input", function () {
            updateDisplay(this.value);
        });

        updateDisplay(budgetSlider.value);
    }
});

function showLoader() {
    const loader = document.getElementById("loader");
    if (loader) {
        loader.style.display = "flex";
    }
}
//load khi ấn pagination
document.addEventListener("DOMContentLoaded", function () {
    const links = document.querySelectorAll(".pagination a");

    links.forEach((link) => {
        link.addEventListener("click", function (e) {
            e.preventDefault(); // ✅ Ngăn hành vi mặc định

            // ✅ Tạo URL mới từ href
            const url = new URL(this.href);

            // ✅ Gắn thêm hash vào URL
            url.hash = "tour-section";

            // ✅ Hiển thị loader (nếu có)
            showLoader();

            // ✅ Chuyển trang thủ công
            window.location.href = url.toString();
        });
    });
});

// Sau khi trang load, nếu không có hash mà có tour section thì thêm hash vào
window.addEventListener("load", () => {
    const section = document.getElementById("tour-section");

    if (section && !window.location.hash) {
        // Chỉ thêm nếu chưa có hash
        history.replaceState(
            null,
            null,
            window.location.pathname + window.location.search + "#tour-section"
        );

        // Scroll mượt
        section.scrollIntoView({ behavior: "smooth" });
    }
});

//Check Availability

const filterAvailable = document.getElementById("filterAvailable");
// const filterPromo = document.getElementById("filterPromo");

function filterTours() {
    const showAvailable = filterAvailable.checked;
    // const showPromo = filterPromo.checked;

    document.querySelectorAll(".tour-card").forEach((tour) => {
        const isAvailable = parseInt(tour.dataset.available) > 0;
        // const isPromo = parseInt(tour.dataset.promo) > 0;

        let show = true;

        if (showAvailable && !isAvailable) show = false;
        // if (showPromo && !isPromo) show = false;

        tour.style.display = show ? "block" : "none";
    });
}

if (filterAvailable) {
    filterAvailable.addEventListener("change", filterTours);
    // filterPromo.addEventListener("change", filterTours);
}

//Flatpickr

flatpickr("#checkIn", {
    dateFormat: "d/m/Y",
});

flatpickr("#checkOut", {
    dateFormat: "d/m/Y",
});
