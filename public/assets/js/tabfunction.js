document.addEventListener("DOMContentLoaded", function () {
    const tabs = document.querySelectorAll("#ukayTabs .nav-link");
    const products = document.querySelectorAll(".product-container");
    const filters = document.querySelectorAll(".form-select");
 

    // Initially show only "new-arrival" products
    function resetTabs() {
        products.forEach(product => product.classList.remove("show"));
        document.querySelector(".product-container.new-arrival").classList.add("show");
    }
    resetTabs(); // Call at the start

    tabs.forEach(tab => {
        tab.addEventListener("click", function (e) {
            e.preventDefault();

            if (this.classList.contains("active")) return; // Prevent redundant clicks

            // Remove active class from all tabs and add to the clicked one
            document.querySelector("#ukayTabs .nav-link.active").classList.remove("active");
            this.classList.add("active");

            const category = this.getAttribute("data-category");

            // Show only the selected category and reset filters
            products.forEach(product => {
                product.classList.remove("show");
                if (product.classList.contains(category)) {
                    product.classList.add("show");
                }
            });

            // Reset filters when switching tabs
            filters.forEach(filter => (filter.value = ""));
        });
    });

    // Filtering Functionality
    filters.forEach(filter => {
        filter.addEventListener("change", function () {
            const selectedColor = document.getElementById("filterColor").value;
            const selectedCategory = document.getElementById("filterCategory-1").value;
            const selectedSize = document.getElementById("filterSize").value;
            const activeTab = document.querySelector("#ukayTabs .nav-link.active").getAttribute("data-category");

            products.forEach(product => {
                if (!product.classList.contains(activeTab)) {
                    product.classList.remove("show");
                    return;
                }

                const matchesColor = selectedColor === "" || product.classList.contains(selectedColor);
                const matchesCategory = selectedCategory === "" || product.classList.contains(selectedCategory);
                const matchesSize = selectedSize === "" || product.classList.contains(selectedSize);

                if (matchesColor && matchesCategory && matchesSize) {
                    product.classList.add("show");
                } else {
                    product.classList.remove("show");
                }
            });
        });
    });
});
