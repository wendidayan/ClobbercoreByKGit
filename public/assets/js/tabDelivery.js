document.getElementById("meetupBTN").addEventListener("click", function(event) {
        event.preventDefault();
        document.getElementById("meetupDIV").style.display = "block";
        document.getElementById("pickupDIV").style.display = "none";
    });

    document.getElementById("pickupBTN").addEventListener("click", function(event) {
        event.preventDefault();
        document.getElementById("pickupDIV").style.display = "block";
        document.getElementById("meetupDIV").style.display = "none";
    });

    // Optional: Hide both if "Shipping" is clicked
    document.getElementById("shippingBTN").addEventListener("click", function(event) {
        event.preventDefault();
        document.getElementById("meetupDIV").style.display = "none";
        document.getElementById("pickupDIV").style.display = "none";
    });

