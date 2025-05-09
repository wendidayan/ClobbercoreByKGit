document.querySelectorAll(".notif-tab li").forEach(tab => {
        tab.addEventListener("click", function() {
            document.querySelectorAll(".notif-tab li").forEach(t => t.classList.remove("active"));
            document.querySelectorAll(".tab-pane").forEach(pane => pane.classList.remove("active"));

            this.classList.add("active");
            document.getElementById(this.dataset.tab).classList.add("active");
        });
    });

//Js for previewing multiple images
 const fileInput = document.getElementById('multiImageUpload');
  const previewContainer = document.getElementById('imagePreviewContainer');

  // Handle file input change (when user uploads images)
  fileInput.addEventListener('change', () => {
    const files = fileInput.files;
    
    // Loop through all files and append their preview images
    Array.from(files).forEach(file => {
      const reader = new FileReader();
      
      reader.onload = e => {
        const imageContainer = document.createElement('div');
        imageContainer.classList.add('image-container');
        
        const img = document.createElement('img');
        img.src = e.target.result;
        
        // Create the remove button for the image
        const removeButton = document.createElement('div');
        removeButton.classList.add('remove-btn-def');
        removeButton.innerHTML = 'X';
        removeButton.onclick = () => removeImage(imageContainer);
        
        imageContainer.appendChild(img);
        imageContainer.appendChild(removeButton);
        
        // Append the new image preview to the container
        previewContainer.appendChild(imageContainer);
      };
      
      reader.readAsDataURL(file); // Read the image as Data URL
    });
  });

  // Function to remove image preview when user clicks "X"
  function removeImage(imageContainer) {
    imageContainer.remove();
  }

//added for modals.....
const fileInput2 = document.getElementById('multiImageUpload2');
const previewContainer2 = document.getElementById('imagePreviewContainer2');

// Handle file input change (when user uploads images)
fileInput2.addEventListener('change', () => {
  const files = fileInput2.files;

  // Loop through all files and append their preview images
  Array.from(files).forEach(file => {
    const reader = new FileReader();

    reader.onload = e => {
      const imageContainer = document.createElement('div');
      imageContainer.classList.add('image-container');

      const img = document.createElement('img');
      img.src = e.target.result;

      // Create the remove button for the image
      const removeButton = document.createElement('div');
      removeButton.classList.add('remove-btn-def');
      removeButton.innerHTML = 'X';
      removeButton.onclick = () => removeImage2(imageContainer);

      imageContainer.appendChild(img);
      imageContainer.appendChild(removeButton);

      // Append the new image preview to the container
      previewContainer2.appendChild(imageContainer);
    };

    reader.readAsDataURL(file); // Read the image as Data URL
  });
});

// Function to remove image preview when user clicks "X"
function removeImage2(imageContainer) {
  imageContainer.remove();
}

const fileInput3 = document.getElementById('multiImageUpload3');
const previewContainer3 = document.getElementById('imagePreviewContainer3');

// Handle file input change (when user uploads images)
fileInput3.addEventListener('change', () => {
  const files = fileInput3.files;

  // Loop through all files and append their preview images
  Array.from(files).forEach(file => {
    const reader = new FileReader();

    reader.onload = e => {
      const imageContainer = document.createElement('div');
      imageContainer.classList.add('image-container');

      const img = document.createElement('img');
      img.src = e.target.result;

      // Create the remove button for the image
      const removeButton = document.createElement('div');
      removeButton.classList.add('remove-btn-def');
      removeButton.innerHTML = 'X';
      removeButton.onclick = () => removeImage3(imageContainer);

      imageContainer.appendChild(img);
      imageContainer.appendChild(removeButton);

      // Append the new image preview to the container
      previewContainer3.appendChild(imageContainer);
    };

    reader.readAsDataURL(file); // Read the image as Data URL
  });
});

// Function to remove image preview when user clicks "X"
function removeImage3(imageContainer) {
  imageContainer.remove();
}

//JS for CHATBOX

// Open chatbox
  document.getElementById("message-icon").addEventListener("click", function () {
    document.getElementById("chat-container-abc").style.display = "block";
  });

  // Close chatbox
  document.getElementById("close-chatBOX").addEventListener("click", function () {
    document.getElementById("chat-container-abc").style.display = "none";
  });

// Send Message
document.getElementById('send-message-abc').addEventListener('click', () => {
    const input = document.getElementById('message-input-abc');
    if (!input.value.trim()) return;

    const conversationBody = document.querySelector('.conversation-body');
    const newMessage = document.createElement('div');
    newMessage.className = 'message sender';
    newMessage.innerText = input.value;
    conversationBody.appendChild(newMessage);

    input.value = ''; // Clear input
});

document.querySelectorAll('.message-preview').forEach(preview => {
    preview.addEventListener('click', () => {
        // Remove active class from all previews
        document.querySelectorAll('.message-preview').forEach(p => p.classList.remove('active'));

        // Add active class to clicked preview
        preview.classList.add('active');

        // Update conversation header
        const user = preview.getAttribute('data-user');
        document.getElementById('current-user').innerText = user;

        // Clear and mock load conversation
        const conversationBody = document.querySelector('.conversation-body');
        conversationBody.innerHTML = '';

        const mockMessages = [
            { sender: true, text: "Hi, how can I assist you?" },
            { sender: false, text: "I need help with my order." },
            { sender: true, text: "Sure, let me check that for you." }
        ];

        mockMessages.forEach(msg => {
            const messageDiv = document.createElement('div');
            messageDiv.className = `message ${msg.sender ? 'sender' : 'receiver'}`;
            messageDiv.innerText = msg.text;
            conversationBody.appendChild(messageDiv);
        });

        // Responsive toggle for mobile view
        const backBtn = document.getElementById('back-btn-convo');
        const closeBtn = document.getElementById('chat-close-btn-def');
        const messageBox = document.getElementById('message-box');
        const conversationColumn = document.getElementById('conversation-column');
        const chatBoxContainer = document.getElementById('chat-container-abc');

        if (window.innerWidth < 768) {
            if (messageBox) {
                messageBox.classList.add('hide');
            }
            if (conversationColumn) {
                conversationColumn.classList.add('active');
            }
        }

        // Update current user
        const currentUser = document.getElementById('current-user');
        currentUser.textContent = preview.dataset.user;
        
        
        //Close and Back button for mobile only
        if (backBtn) {
            backBtn.addEventListener('click', () => {
                conversationColumn.classList.remove('active');
                messageBox.classList.remove('hide');
            });
        }

        if (closeBtn) {
            closeBtn.addEventListener('click', () => {
                chatBoxContainer.style.display = 'none';
            });
        }
    });
});

const fileUpload = document.querySelector("#file-input");

const userData ={
    file: {
        data: null,
        mime_type: null
    }
}

document.querySelector("#file-upload").addEventListener("click", () => fileUpload.click());

fileUpload.addEventListener("change", () => {
    const file = fileUpload.files[0];
    if(!file) return;
    
    const reader = new FileReader();
    reader.onload = (e) => {
        const base64String = e.target.result.split(",")[1];
        
        //Store file in userData
        userData.file = {
            data: base64String,
            mime_type: file.type
        }
        console.log(userData);
    }
    
    reader.readAsDataURL(file);
});

//Script For Adding Products by Section
document.addEventListener("DOMContentLoaded", function () {
  document.querySelectorAll(".addprod-form").forEach(form => {
      form.addEventListener("submit", function (e) {
          e.preventDefault(); // Prevent default form submission

          let formData = new FormData(this);
          let modalElement = this.closest(".modal"); // Get the parent modal dynamically
          let successModalId = modalElement.dataset.successModal; // Get success modal ID from data attribute

            // Determine the target section based on the modal
          //let targetSection = modalElement.id === "addprodModal" ? "#new-arrival .photos" : "#bagsak-presyo-sec .photos";
          // Determine the target section based on the modal
          let targetSection;
          if (modalElement.id === "addprodModal") {
              targetSection = "#new-arrival .photos";
          } else if (modalElement.id === "addprodModal2") {
              targetSection = "#bagsak-presyo-1 .photos";
          } else if (modalElement.id === "addprodModal3") {
              targetSection = "#all-products-2 .photos";
          }

          // AJAX request using Fetch API
          fetch(this.action, {
              method: this.method,
              body: formData,
              headers: {
                  'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
              }
          })
          .then(response => response.json())
          .then(data => {
              if (data.success) {
                  // Hide the current modal
                  let modalInstance = bootstrap.Modal.getInstance(modalElement);
                  if (modalInstance) {
                      modalInstance.hide();
                  }

                  // Wait for modal animation to finish before showing the correct success modal
                  setTimeout(() => {
                      let successModal = new bootstrap.Modal(document.getElementById(successModalId));
                      successModal.show();
                  }, 500);

                  // Reset the form after a short delay
                  setTimeout(() => this.reset(), 500);

                  // Dynamically add the new product to the "New Arrivals" section
                  let newProductHTML = `
                      <div class="col item">
                          <div class="card card-prod" style="transition:transform 0.3s ease;">
                              <div class="card-body">
                                  <i class="fa fa-pencil edit-pencil" data-bs-toggle="modal" data-bs-target="#editProduct"></i>
                                  <a href="${data.product.image}">
                                      <img class="img-fluid" alt="${data.product.name}" src="${data.product.image}" style="width: 100%; height: 180px; object-fit: cover; border-radius: 3px;">
                                  </a>
                                  <h4 id="product-name" class="card-title mt-2 p-1" style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; width: 100%; display: block; font-size: 16.5px;">
                                      ${data.product.name}
                                  </h4>
                                  <p class="card-text p-1" style="font-weight: bold; color: #d7ac4b;">
                                      ₱<span id="product-price-span">${data.product.price}</span>
                                  </p>
                              </div>
                          </div>
                      </div>
                  `;
                  document.querySelector(targetSection).insertAdjacentHTML("beforeend", newProductHTML);
              } else {
                  alert("Failed to add product. Please try again.");
              }
          })
          .catch(error => console.error("Error:", error));
      });
  });
});

//Fetch and populate the edit product modal
document.addEventListener("DOMContentLoaded", function () {
  document.querySelectorAll(".edit-pencil").forEach(button => {
      button.addEventListener("click", function () {
          const productId = this.getAttribute("data-id");

          // Fetch product details via AJAX
          fetch(`/product/${productId}`)
              .then(response => response.json())
              .then(data => {
                  if (data.success) {
                      // Populate the modal fields
                      document.querySelector("#edit-prodName").value = data.product.name;
                      document.querySelector("#edit-prodPrice").value = data.product.price;
                      document.querySelector("#editProduct").setAttribute("data-id", data.product.id); // Store product ID in the modal
                  } else {
                      alert("Failed to fetch product details.");
                  }
              })
              .catch(error => console.error("Error:", error));
      });
  });
});

//Submit the Edited Details
document.addEventListener("DOMContentLoaded", function () {
  //let saveBtn = document.querySelector("#editProduct .modal-footer button");
  let saveBtn = document.getElementById("save-changes-btn");
  saveBtn.addEventListener("click", function () {
      const modal = document.querySelector("#editProduct");
      const productId = modal.getAttribute("data-id");
      const name = document.querySelector("#edit-prodName").value;
      const price = document.querySelector("#edit-prodPrice").value;

      fetch(`/product/update/${productId}`, {
          method: "PUT",
          headers: {
              "Content-Type": "application/json",
              "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute("content"),
          },
          body: JSON.stringify({ name: name, price: price })
      })
      .then(response => response.json())
      .then(data => {
          if (data.success) {
              // Update the card UI without reload
              const card = document.querySelector(`.edit-pencil[data-id="${productId}"]`).closest('.card');
              //card.querySelector("#product-name").textContent = data.product.name;
              //card.querySelector("#product-price-span").textContent = data.product.price;
              document.querySelector(`.product-name[data-id="${productId}"]`).textContent = data.product.name;
              document.querySelector(`.product-span-price[data-id="${productId}"]`).textContent = data.product.price;


              // Hide edit modal and show save confirmation
              let editModal = bootstrap.Modal.getInstance(document.getElementById('editProduct'));
              editModal.hide();

              let saveModal = new bootstrap.Modal(document.getElementById('saveChanges'));
              saveModal.show();

              setTimeout(() => {
                location.reload();
            }, 1000);
          } else {
              alert("Failed to update product.");
          }
      })
      .catch(error => console.error("Error:", error));
  });
});

//Fetch Data to confirm order 
document.addEventListener('DOMContentLoaded', function () {
  const buttons = document.querySelectorAll('.view-order-btn');

    buttons.forEach(button => {
        button.addEventListener('click', function () {
            const orderId = this.getAttribute('data-order-id');
            console.log("Order ID clicked:", orderId); // DEBUG

            if (!orderId || orderId === "null") {
                alert("Invalid order ID");
                return;
            }

          //Show modal (make sure your modal's ID is correct)
          document.getElementById('invoiceModal').style.display = 'flex';

          // Update the Confirm Order button with the correct order_id
          const confirmOrderBtn = document.getElementById('confirm-order-btn');
          confirmOrderBtn.href = `/generate-invoice?order_id=${orderId}`;

          fetch(`/order-details/${orderId}`)
              .then(response => response.json())
              .then(data => {
                  // Inject data into modal
                  document.getElementById('modal-order-id').textContent = data.id;
                  document.getElementById('modal-customer-name').textContent = data.customer_name;
                  document.getElementById('modal-order-date').textContent = data.order_date;
                  document.getElementById('modal-payment-method').textContent = data.payment_method;
                  document.getElementById('modal-delivery-method').textContent = data.delivery_method;
                  document.getElementById('modal-delivery-location').textContent = data.delivery_location;
                  /*document.getElementById('modal-subtotal').textContent = ₱${data.subtotal};
                  document.getElementById('modal-delivery-fee').textContent = ₱${data.delivery_fee};
                  document.getElementById('modal-total-amount').textContent = ₱${data.total};*/

                  // Load product items
                  const orderList = document.querySelector('.order-list-abc');
                  orderList.innerHTML = '';
                  data.items.forEach(item => {
                      orderList.innerHTML += `
                          <div class="order-item-abc">
                              <img src="${item.image}" alt="${item.name}">
                              <div class="order-details-abc">
                                  <p>${item.name}</p>
                                  <p>₱<span>${item.price}</span></p>
                              </div>
                          </div>
                      `;
                  });

                  // Show modal
                  document.getElementById('invoiceModal').style.display = 'flex';
              })
              .catch(error => {
                  console.error('Error fetching order details:', error);
              });
      });
  });
});

/*document.addEventListener('DOMContentLoaded', function () {
    const buttons = document.querySelectorAll('.view-order-btn');

    buttons.forEach(button => {
        button.addEventListener('click', function () {
            const orderId = this.getAttribute('data-order-id');
            console.log("Order ID clicked:", orderId);

            if (!orderId || orderId === "null") {
                alert("Invalid order ID");
                return;
            }

            // Show modal
            document.getElementById('invoiceModal').style.display = 'flex';

            // Update Confirm Order button
            const confirmOrderBtn = document.getElementById('confirm-order-btn');
            confirmOrderBtn.href = /generate-invoice?order_id=${orderId};

            fetch(/order-details/${orderId})
                .then(response => response.json())
                .then(data => {
                    // Inject general data into modal
                    document.getElementById('modal-order-id').textContent = data.id;
                    document.getElementById('modal-customer-name').textContent = data.customer_name;
                    document.getElementById('modal-order-date').textContent = data.order_date;
                    document.getElementById('modal-payment-method').textContent = data.payment_method;

                    // Get DOM elements for toggling
                    const deliveryMethodSpan = document.getElementById('modal-delivery-method');
                    const deliveryLocationSection = document.getElementById('delivery-location-section');
                    const pickupAddressSection = document.getElementById('pickup-address-section');

                    // Set delivery method text
                    deliveryMethodSpan.textContent = data.delivery_method;

                    // Toggle Pick Up Address / Delivery Location
                    if (data.delivery_method.trim() === 'pick-up') {
                        deliveryLocationSection.style.display = 'none';
                        pickupAddressSection.style.display = 'block';
                    } else {
                        deliveryLocationSection.style.display = 'block';
                        pickupAddressSection.style.display = 'none';
                    }

                    // Set delivery location only if visible
                    document.getElementById('modal-delivery-location').textContent = data.delivery_location;

                    // Load product items
                    const orderList = document.querySelector('.order-list-abc');
                    orderList.innerHTML = '';
                    data.items.forEach(item => {
                        orderList.innerHTML += `
                            <div class="order-item-abc">
                                <img src="${item.image}" alt="${item.name}">
                                <div class="order-details-abc">
                                    <p>${item.name}</p>
                                    <p>₱<span>${item.price}</span></p>
                                </div>
                            </div>
                        `;
                    });

                    // Make sure modal stays visible
                    document.getElementById('invoiceModal').style.display = 'flex';
                })
                .catch(error => {
                    console.error('Error fetching order details:', error);
                });
        });
    });
});*/

//Function to store deliveryDate & time to database
document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('invoice-form');
    const successModal = document.getElementById('success-invoice-modal');
    const okayButton = document.getElementById('success-modal-okay');

    form.addEventListener('submit', function (e) {
        e.preventDefault(); // Prevent the default form submission

        const formData = new FormData(form);

        // Add transaction-specific details to the form data
        //Transaction details are added to form data to submit when generate invoice button is clicked
        formData.append('transaction_id', `TXN-${Date.now()}`); // Generate a unique transaction ID
        formData.append('payment_method', document.querySelector('input[name="payment_method"]').value || 'N/A');
        formData.append('amount', parseFloat(document.querySelector('.summary-abc span:last-child').textContent.replace('₱', '')) || 0); // Extract total amount

        // Send the form data via AJAX
        fetch('/store-invoice', {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            },
            body: formData,
        })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Show the success modal
                    successModal.style.display = 'flex';
                } else {
                    alert('Failed to send the invoice. Please try again.');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('An error occurred. Please try again.');
            });
    });

    // Redirect to the dashboard when "Okay" is clicked
    okayButton.addEventListener('click', function () {
        window.location.href = "/admin/Dashboard";
    });
});


//Handle payment confirmation
// This function will be called when the "Confirm Payment" button is clicked
function confirmPayment(transactionId) {
    fetch(`/admin/transactions/confirm/${transactionId}`, {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            'Content-Type': 'application/json',
        },
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            // Scroll to the top of the page
            window.scrollTo({ top: 0, behavior: 'smooth' });

            // Store a flag in sessionStorage to show the alert after reload
            sessionStorage.setItem('paymentConfirmed', 'true');

            // Remove the notification message
            const notificationItem = document.querySelector(button[onclick="confirmPayment('${transactionId}')"]).closest('.notification-item');
            if (notificationItem) {
                notificationItem.remove();
            }

            // Reload the page
            location.reload();
        } else {
            alert('Failed to confirm payment. Please try again.');
        }
    })
    .catch(error => console.error('Error:', error));
}
// Show alert message after payment confirmation
document.addEventListener('DOMContentLoaded', function () {
    // Check if the payment confirmation flag is set in sessionStorage
    if (sessionStorage.getItem('paymentConfirmed') === 'true') {
        const alertMessage = document.getElementById('alert-message');
        if (alertMessage) {
            alertMessage.style.display = 'block';

            // Scroll to the top of the page to show the alert
            window.scrollTo({ top: 0, behavior: 'smooth' });

            // Remove the flag from sessionStorage
            sessionStorage.removeItem('paymentConfirmed');

            // Hide the alert message after 3 seconds
            setTimeout(() => {
                alertMessage.style.display = 'none';
            }, 3000);
        }
    }
});