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

