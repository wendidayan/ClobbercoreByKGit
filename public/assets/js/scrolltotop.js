// Scroll to Top Button Functionality
let scrollTopBtn = document.getElementById("scroll-top");

if (scrollTopBtn) {
    // Show or hide the button based on scroll position
    window.onscroll = function () {
        if (document.body.scrollTop > 300 || document.documentElement.scrollTop > 300) {
            scrollTopBtn.style.display = "block";
        } else {
            scrollTopBtn.style.display = "none";
        }
    };

    // Smooth scroll to the top when the button is clicked
    scrollTopBtn.onclick = function () {
        window.scrollTo({ top: 0, behavior: "smooth" });
    };
}

// Change Main Product Image Functionality
let smallImages = document.querySelectorAll(".small-img");
let mainImage = document.getElementById("mainImage");

if (mainImage && smallImages.length > 0) {
    // Add click event listeners to all small images
    smallImages.forEach((img) => {
        img.addEventListener("click", function () {
            mainImage.src = img.src; // Update the main image source
        });
    });
}

function toggleChatbox() {
    const chatbox = document.querySelector(".chatbox-popup"); // safer
    if (chatbox) {
        const isVisible = chatbox.style.display === "flex";
        chatbox.style.display = isVisible ? "none" : "flex";
        chatbox.style.flexDirection = 'column';
    } else {
        console.warn("Chatbox element not found.");
    }
}

// Toggle Function for View Details in To Deliver Tab
/*function toggleTrackDetails() {
      const details = document.getElementById("details-abc");
      details.style.display = details.style.display === "none" || details.style.display === "" ? "block" : "none";
    }*/

function toggleTrackDetails(orderId) {
    const details = document.getElementById("details-" + orderId);
    if (details) {
        details.style.display = (details.style.display === "none" || details.style.display === "") ? "block" : "none";
    }
}

//JS for meetup steps
function updateProgress(meetupSTEP) {
      document.querySelectorAll('.meetupSTEP').forEach((el, idx) => {
        el.classList.toggle('active', idx < meetupSTEP);
      });
    }

    function validateSelection() {
      const city = document.getElementById('city').value;
      const landmark = document.getElementById('landmark').value;
      const error = document.getElementById('errorMessage');

      if (!city && !landmark) {
        error.textContent = "Please select both your city and a landmark to proceed.";
        return;
      }
      if (!city) {
        error.textContent = "Please select your city to proceed.";
        return;
      }
      if (!landmark) {
        error.textContent = "Please choose a landmark for the meet-up.";
        return;
      }

      document.getElementById('selectionStep').classList.remove('active');
      document.getElementById('confirmationStep').classList.add('active');
      document.getElementById('confirmationMessage').textContent = 
        `You have selected ${city} and ${landmark} as your meet-up location. Is this correct?`;

      updateProgress(2);
    }

    function confirmLocation() {
      const city = document.getElementById('city').value;
      const landmark = document.getElementById('landmark').value;

      document.getElementById('confirmationStep').classList.remove('active');
      document.getElementById('successStep').classList.add('active');
      document.getElementById('successMessage').textContent = 
        `Your meet-up location has been set to <strong>${landmark}</strong>, <strong>${city}</strong>. You’ll receive further instructions via notification`;

      updateProgress(3);
    }

    function goBack() {
      document.getElementById('confirmationStep').classList.remove('active');
      document.getElementById('selectionStep').classList.add('active');
      updateProgress(1);
    }

//Display the confirmation message after placing the order
window.addEventListener('load', () => {
      // Check localStorage for order trigger
      if (localStorage.getItem('orderPlaced') === 'true') {
        document.getElementById('thankYouMessage').style.display = 'block';
        localStorage.removeItem('orderPlaced'); // clear it to prevent re-show
      }
    });

function placeOrder() {
      // Simulate storing the order flag
      localStorage.setItem('orderPlaced', 'true');
      // Redirect to clothing collection page
      window.location.href = 'Clothing.html';
    }

//Toggle Password
function togglePasswordVisibility(inputId, iconId) {
    // Get references to the input field and the eye icon
    const passwordInput = document.getElementById(inputId);
    const eyeIcon = document.getElementById(iconId);

    // Toggle the input type between 'password' and 'text'
    if (passwordInput.type === "password") {
        passwordInput.type = "text";
        eyeIcon.classList.remove("far fa-eye-slash");
        eyeIcon.classList.add("far fa-eye-");
    } else {
        passwordInput.type = "password";
        eyeIcon.classList.remove("fa-eye");
        eyeIcon.classList.add("fa-eye-slash");
    }
}

//Privacy Policy Js
document.querySelectorAll('.accordion-header').forEach(header => {
      header.addEventListener('click', () => {
        const item = header.parentElement;
        item.classList.toggle('active');
      });
    });

const navItems = document.querySelectorAll('.nav-item-abc');
    const sections = document.querySelectorAll('.privacy-container');

    navItems.forEach(item => {
      item.addEventListener('click', () => {
        navItems.forEach(i => i.classList.remove('active'));
        item.classList.add('active');

        sections.forEach(section => {
          section.style.display = 'none';
        });

        document.getElementById(item.getAttribute('data-target')).style.display = 'block';
      });
    });

//Notification Item Redirect to Invoice Page
function redirectToInvoicePage() {
    window.location.href = 'E-invoice.html'; // or full path if needed
  }

function redirectToViewDetailsPage() {
    window.location.href = 'Notif-View-Details.html'; // or full path if needed
  }

//Editable Email
const data = {
    email: {
      full: "do***********@gmail.com",
      element: document.getElementById('emailContent'),
      toggle: document.getElementById('emailToggle')
    },
    phone: {
      full: "09123456709",
      element: document.getElementById('phoneContent'),
      toggle: document.getElementById('phoneToggle')
    }
  };

  function toggleEdit(event, type) {
    event.preventDefault();
    const content = data[type].element;
    const toggleBtn = data[type].toggle;

    if (toggleBtn.textContent === "Change") {
      toggleBtn.textContent = "Save";
      content.contentEditable = true;
      content.textContent = data[type].full;
      content.focus();
    } else {
      const updated = content.textContent.trim();

      if (type === "email" && validateEmail(updated)) {
        data[type].full = updated;
        content.textContent = maskEmail(updated);
      } else if (type === "phone" && validatePhone(updated)) {
        data[type].full = updated;
        content.textContent = maskPhone(updated);
      } else {
        alert("Please enter a valid " + type + ".");
        content.textContent = data[type].full;
        content.focus();
        return;
      }

      content.contentEditable = false;
      toggleBtn.textContent = "Change";
    }
  }

  function validateEmail(email) {
    const regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return regex.test(email);
  }

  function validatePhone(phone) {
    return /^[0-9]{11}$/.test(phone); // Philippine 11-digit format
  }

  function maskEmail(email) {
    const [user, domain] = email.split('@');
    const masked = user.slice(0, 2) + '*'.repeat(user.length - 2);
    return `${masked}@${domain}`;
  }

  function maskPhone(phone) {
    return '*'.repeat(phone.length - 2) + phone.slice(-2);
  }

//Edit Button in Profile-Address Section
document.addEventListener("DOMContentLoaded", () => {
    document.querySelectorAll('.edit-address, .change-address').forEach(link => {
      link.addEventListener('click', function () {
        const block = this.closest('.address-block');
        if (!block) return;

        document.getElementById("editFName").value = block.dataset.fname;
        document.getElementById("editLName").value = block.dataset.lname;
        document.getElementById("editPhone").value = block.dataset.phone;
        document.getElementById("editStreet").value = block.dataset.street;
        document.getElementById("editCity").value = block.dataset.city;
        document.getElementById("editProvince").value = block.dataset.province;
        document.getElementById("editRegion").value = block.dataset.region;
        document.getElementById("editZip").value = block.dataset.zip;
      });
    });
  });


//Js for previewing multiple images
 function previewImages(event) {
    const files = event.target.files;
    const previewContainer = document.getElementById('image-preview-abc');
    const uploadBox = document.getElementById('upload-box');

    Array.from(files).forEach(file => {
      if (file.type.startsWith('image/')) {
        const reader = new FileReader();

        reader.onload = function (e) {
          const imageContainer = document.createElement('div');
          imageContainer.classList.add('image-container');

          const img = document.createElement('img');
          img.src = e.target.result;

          const removeButton = document.createElement('div');
          removeButton.classList.add('remove-btn-abc');
          removeButton.innerHTML = 'X';
          removeButton.onclick = () => removeImage(imageContainer);

          imageContainer.appendChild(img);
          imageContainer.appendChild(removeButton);
          previewContainer.appendChild(imageContainer);
        };

        reader.readAsDataURL(file);
      }
    });
  }

function removeImage(imageContainer) {
    imageContainer.remove();
  }