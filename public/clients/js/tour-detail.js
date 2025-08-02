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
            <p></p>
        `,
            regulations: `
            <h3>Quy định</h3>
            <ul>
                <li>Check-in: 14:00 | Check-out: 12:00</li>
                <li>Không hút thuốc trong phòng</li>
                <li>Không mang thú cưng</li>
                <li>Hủy tour trước 3 ngày sẽ được hoàn 80%</li>
            </ul>
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
