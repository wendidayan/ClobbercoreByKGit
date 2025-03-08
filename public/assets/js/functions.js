document.addEventListener("DOMContentLoaded", function () {
    let searchIcon = document.querySelector(".search");
    let overlay = document.querySelector(".overlay");
    let closeIcon = document.querySelector(".close");
    
    searchIcon.onclick = function (event) {
        event.stopPropagation(); // Prevent click from bubbling up
        overlay.classList.toggle("active");
    };

    closeIcon.onclick = function (event) {
        event.stopPropagation();
        overlay.classList.remove("active");
    };

    // Close search when clicking outside the overlay
    document.addEventListener("click", function (event) {
        if (!overlay.contains(event.target) && !searchIcon.contains(event.target)) {
            overlay.classList.remove("active");
        }
    });

    // Scroll to Top Button
    let scrollTopBtn = document.getElementById("scroll-top");
    if (scrollTopBtn) {
        window.onscroll = function () {
            if (document.body.scrollTop > 300 || document.documentElement.scrollTop > 300) {
                scrollTopBtn.style.display = "block";
            } else {
                scrollTopBtn.style.display = "none";
            }
        };

        scrollTopBtn.onclick = function () {
            window.scrollTo({ top: 0, behavior: "smooth" });
        };
    }

    // Scrollable New Arrivals Section
    function scrollGallery(direction) {
        const container = document.getElementById("newArrivals");
        if (container) {
            const scrollAmount = 220; // Adjust scroll speed
            container.scrollLeft += direction * scrollAmount;
        }
    }

    // Image Slider in ShoppingPage
    let prevBtn = document.querySelector(".prev-btn");
    let nextBtn = document.querySelector(".next-btn");

    if (prevBtn && nextBtn) {
        prevBtn.addEventListener("click", function () {
            scrollGallery(-1);
        });

        nextBtn.addEventListener("click", function () {
            scrollGallery(1);
        });
    }
    
    // Change Image in product view
    let smallImages = document.querySelectorAll(".small-img");
    let mainImage = document.getElementById("mainImage");

    smallImages.forEach((img) => {
        img.addEventListener("click", function () {
            mainImage.src = img.src;
        });
    });
});

