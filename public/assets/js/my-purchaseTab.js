document.addEventListener("DOMContentLoaded", function () {
    const tabs = document.querySelectorAll("#purchaseTabs .nav-link");
    const contentSections = document.querySelectorAll(".tab-content-div");

    // Function to switch tabs
    function switchTab(targetId) {
        // Remove 'active' class from all tabs
        tabs.forEach(tab => tab.classList.remove("active"));

        // Hide all tab content
        contentSections.forEach(section => section.style.display = "none");

        // Add 'active' class to the clicked tab
        document.querySelector(`[href='${targetId}']`).classList.add("active");

        // Show the corresponding content section
        document.getElementById(targetId).style.display = "block";
    }

    // Set the initial active tab
    switchTab("all");

    // Event listener for tab clicks
    tabs.forEach(tab => {
        tab.addEventListener("click", function (e) {
            e.preventDefault();
            const targetId = this.getAttribute("href");
            switchTab(targetId);
        });
    });
});
