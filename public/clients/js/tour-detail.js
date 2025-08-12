// File: js/tour-detail.js

// Image Carousel
const mainImage = document.getElementById("mainImage");
const thumbnails = document.querySelectorAll(".thumbnail-item");
const arrowLeft = document.querySelector(".arrow-left");
const arrowRight = document.querySelector(".arrow-right");
let currentImageIndex = 0;

function updateMainImage(index) {
    const img = thumbnails[index].querySelector("img");
    if (img) {
        mainImage.src = img.dataset.src;
    }

    thumbnails.forEach((thumb, i) => {
        thumb.classList.toggle("active", i === index);
    });
    currentImageIndex = index;
}

thumbnails.forEach((thumbnails, index) => {
    thumbnails.addEventListener("click", () => {
        updateMainImage(index);
    });
});
if (arrowLeft) {
    arrowLeft.addEventListener("click", () => {
        currentImageIndex =
            (currentImageIndex - 1 + thumbnails.length) % thumbnails.length;
        updateMainImage(currentImageIndex);
    });
}
if (arrowRight) {
    arrowRight.addEventListener("click", () => {
        currentImageIndex = (currentImageIndex + 1) % thumbnails.length;
        updateMainImage(currentImageIndex);
    });
}
// Tab Navigation
document.addEventListener("DOMContentLoaded", () => {
    const tabItems = document.querySelectorAll(".tab-item");
    const tabContent = document.getElementById("tabContent");

    if (
        tabItems.length &&
        tabContent &&
        typeof tourDescription !== "undefined"
    ) {
        const tabContents = {
            features: `
            <h3>Đặc điểm nổi bật</h3>
            <p> ${tourDescription}</p>
              
        `,
            "ticket-prices": `
            <h3>Giá vé Tour</h3>
            <ul>
                <li>Vé người lớn: ${tourPriceA} VND</li>
                <li>Vé trẻ em: ${tourPriceC} VND</li>
               
            </ul>
        `,
            introduction: `
            <h3>Giới thiệu</h3>
            <h6>${tourIntroduction}</h6>
            <p></p>
        `,
            regulations: `
            <h3>Lưu ý</h3>
            <section class="tour-section inclusions">
            <div class="included">
           
            <h3><i class="fas fa-check-circle"></i> Giá tour bao gồm</h3>
            <ul>
                <li>Xe đưa đón Limousine khứ hồi Hà Nội - Hạ Long.</li>
                <li>Du thuyền 5 sao, phòng nghỉ tiện nghi.</li>
                <li>Các bữa ăn theo chương trình (2 bữa trưa, 1 bữa tối, 1 bữa sáng).</li>
                <li>Vé tham quan các điểm trong lịch trình.</li>
                <li>Thuyền kayak, thuyền nan.</li>
                <li>Hướng dẫn viên nhiệt tình, kinh nghiệm.</li>
            </ul>
            </div>
            <div class="excluded">
            <h3><i class="fas fa-times-circle"></i> Giá tour không bao gồm</h3>
            <ul>
                <li>Đồ uống trong các bữa ăn.</li>
                <li>Chi phí cá nhân, giặt là, điện thoại.</li>
                <li>Tiền tip cho hướng dẫn viên và lái xe.</li>
                <li>Thuế VAT.</li>
            </ul>
            </div>
            </section>
        `,
            reviews: `
            <h3>Đánh giá</h3>
            <p>Hiện chưa có đánh giá nào. Hãy là người đầu tiên!</p>
        `,
        };

        // Hiển thị tab mặc định
        tabContent.innerHTML = tabContents["features"];

        tabItems.forEach((item) => {
            item.addEventListener("click", () => {
                const tab = item.dataset.tab;
                tabContent.innerHTML =
                    tabContents[tab] || "<p>Nội dung đang cập nhật...</p>";
                tabItems.forEach((i) => i.classList.remove("active"));
                item.classList.add("active");
            });
        });
    }
});

//Accordion
document.addEventListener("DOMContentLoaded", () => {
    const accordionItems = document.querySelectorAll(".accordion-item");

    if (accordionItems.length > 0) {
        accordionItems.forEach((item) => {
            const header = item.querySelector(".accordion-header");
            if (!header) return;

            const icon = header.querySelector(".icon");

            header.addEventListener("click", () => {
                const isActive = item.classList.contains("active");

                // Đóng tất cả
                accordionItems.forEach((i) => {
                    i.classList.remove("active");

                    const iHeader = i.querySelector(".accordion-header");
                    const iIcon = iHeader
                        ? iHeader.querySelector(".icon")
                        : null;
                    if (iIcon) {
                        iIcon.classList.remove("rotate");
                    }
                });

                // Mở nếu chưa mở
                if (!isActive) {
                    item.classList.add("active");
                    if (icon) {
                        icon.classList.add("rotate");
                    }
                }
            });
        });
    }
});

document.querySelectorAll(".qty-btn").forEach((btn) => {
    btn.addEventListener("click", function () {
        const targetId = this.getAttribute("data-target");
        const input = document.getElementById(targetId);
        let value = parseInt(input.value);

        if (this.textContent === "+") {
            value++;
        } else if (this.textContent === "-" && value > 0) {
            value--;
        }

        input.value = value;
    });
});

//Booking Form
