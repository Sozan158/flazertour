document.addEventListener("DOMContentLoaded", function () {
    const bannerImg = document.getElementById("banner-imag");

    if (bannerImg && typeof tourDescription !== "undefined") {
        const bannerImages = [
            "/clients/img/danang.jpg",
            "/clients/img/hlb2.jpg",
            "/clients/img/ninhbinh.jpg",
        ];

        let currentIndex = 0;

        setInterval(() => {
            currentIndex = (currentIndex + 1) % bannerImages.length;
            bannerImg.src = bannerImages[currentIndex];
        }, 10000);
    }
});
