document.addEventListener("DOMContentLoaded", function () {
    // 1. Lấy tất cả các phần tử cần thiết từ DOM
    const cards = document.querySelectorAll(".card");
    const dots = document.querySelectorAll(".dot");

    // Hàm để cập nhật trạng thái active
    function setActive(index) {
        // 2. Xóa lớp 'active' khỏi tất cả các card và dot
        cards.forEach((card) => card.classList.remove("active"));
        dots.forEach((dot) => dot.classList.remove("active"));

        // 3. Thêm lớp 'active' vào card và dot được chọn
        cards[index].classList.add("active");
        dots[index].classList.add("active");
    }

    // 4. Thêm sự kiện click cho mỗi dot
    dots.forEach((dot, index) => {
        dot.addEventListener("click", () => {
            setActive(index);
        });
    });
});
