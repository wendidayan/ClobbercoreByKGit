const chatBody = document.querySelector(".chatbox-body");
const messageInput = document.querySelector(".chatbox-message-input");
const sendMessageButton = document.querySelector("#send-message-btn");
const fileInput = document.querySelector("#chatbox-inputfile");
const fileUploadWrapper = document.querySelector(".chatbox-file-wrapper");
const fileCancelButton = document.querySelector("#file-cancel");
const closeBtn = document.getElementById('close-chatbox');

// User data for storing message and file information
const userData = {
    message: null,
    file: {
        data: null,
        mime_type: null
    }
};

// Function to create a message element
const createMessageElement = (content, classes) => {
    const div = document.createElement("div");
    div.classList.add("message", classes);
    div.innerHTML = content;
    return div;
};

// Handle outgoing messages
const handleOutgoingMessage = (e) => {
    e.preventDefault();
    userData.message = messageInput.value.trim();
    fileUploadWrapper.classList.remove("file-uploaded");

    // Check if there's a message or file to send
    if (!userData.message && !userData.file.data) return;

    // Construct the message content
    let messageContent = `<div class="message-text">${userData.message || ""}</div>`;
    if (userData.file.data) {
        messageContent += `<img src="data:${userData.file.mime_type};base64,${userData.file.data}" style="max-width: 150px; margin-top: 10px;" />`;
    }

    // Create the outgoing message element
    const outgoingMessageDiv = createMessageElement(messageContent, "user-message");
    chatBody.appendChild(outgoingMessageDiv);

    // Clear the input fields and reset user data
    messageInput.value = "";
    userData.message = null;
    userData.file = { data: null, mime_type: null };

    // Scroll to the bottom of the chat
    chatBody.scrollTop = chatBody.scrollHeight;
};

// Handle file input changes
fileInput.addEventListener("change", () => {
    const file = fileInput.files[0];
    if (!file) return;

    const reader = new FileReader();
    reader.onload = (e) => {
       fileUploadWrapper.querySelector("img").src = e.target.result;
        fileUploadWrapper.classList.add("file-uploaded");
        const base64String = e.target.result.split(",")[1];

        // Update user data with the file information
        userData.file = {
            data: base64String,
            mime_type: file.type
        };
        fileInput.value = ""; // Clear the file input
    };

    reader.readAsDataURL(file);
});

fileCancelButton.addEventListener("click", () =>{
    userData.file = {};
    fileUploadWrapper.classList.remove("file-uploaded");
});

const picker = new EmojiMart.Picker({
    theme: "light",
    skinTonePosition: "none",
    previewPosition: "none",
    onEmojiSelect: (emoji) => {
        const { selectionStart: start, selectionEnd: end } = messageInput;
        messageInput.setRangeText(emoji.native, start, end, "end");
        messageInput.focus();
    },
    onClickOutside: (e) => {
        if(e.target.id === "emoji-picker"){
            document.body.classList.toggle("show-emoji-picker");
        } else {
            document.body.classList.remove("show-emoji-picker");
        }
    }
});

document.querySelector(".chatbox-form").appendChild(picker);


// Add event listener for Enter key press
messageInput.addEventListener("keydown", (e) => {
    const userMessage = e.target.value.trim();
    if (e.key === "Enter" && userMessage) {
        handleOutgoingMessage(e);
    }
});

// Add event listener for send button click
sendMessageButton.addEventListener("click", (e) => handleOutgoingMessage(e));

// Trigger file input dialog when the upload button is clicked
document.querySelector("#chatbox-upload").addEventListener("click", () => fileInput.click());

//Close the chatbox
closeBtn.addEventListener('click', () => {
      chatbox.style.display = 'none';
    });