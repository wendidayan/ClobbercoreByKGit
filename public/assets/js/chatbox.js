let pusher = null;
let channel = null;

function initializePusher() {
    if (pusher) {
        pusher.disconnect();
    }

    pusher = new Pusher('8c5958395c6d071d9907', {
        cluster: 'ap1',
        encrypted: true,
        enabledTransports: ['ws', 'wss'],
        disabledTransports: ['xhr_streaming', 'xhr_polling'],
        authEndpoint: '/broadcasting/auth',
        auth: {
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
            }
        }
    });

    const currentUserId = document.getElementById('current-user-id').value;
    channel = pusher.subscribe(`private-chat.${currentUserId}`);

    channel.bind('App\\Events\\NewMessage', function(data) {
        const message = data.message;
        const currentUserType = document.getElementById('current-user-type').value;

        if ((message.sender_id == currentUserId && message.sender_type == currentUserType) ||
            (message.receiver_id == currentUserId && message.receiver_type == currentUserType)) {
            appendMessage(message);
        }
    });

    loadMessages(currentUserId, document.getElementById('current-user-type').value);
}

// DOM elements
const chatBody = document.querySelector(".chatbox-body");
const messageInput = document.querySelector(".chatbox-message-input");
const sendMessageButton = document.querySelector("#send-message-btn");
const fileInput = document.querySelector("#chatbox-inputfile");
const fileUploadWrapper = document.querySelector(".chatbox-file-wrapper");
const fileCancelButton = document.querySelector("#file-cancel");
const closeBtn = document.getElementById('close-chatbox');
const currentUserId = document.getElementById('current-user-id').value;
const currentUserType = document.getElementById('current-user-type').value;


console.log('Current User ID:', currentUserId);
console.log('Current User Type:', currentUserType);

// Load messages initially
loadMessages(currentUserId, currentUserType);

function loadMessages(userId, userType) {
    fetch(`/chat/messages?user_id=${userId}&user_type=${userType}`)
        .then(response => response.json())
        .then(messages => {
            chatBody.innerHTML = '';
            messages.forEach(message => appendMessage(message));
        })
        .catch(error => console.error('Error loading messages:', error));
}

function appendMessage(message) {
    const messageDiv = document.createElement('div');
    messageDiv.className = 'message';

    if (message.sender_type === 'admin') {
        messageDiv.classList.add('bot-message');
        const avatar = document.createElement('i');
        avatar.className = 'fa fa-user-circle seller-avatar';
        messageDiv.appendChild(avatar);
    } else {
        messageDiv.classList.add('user-message');
    }

    const messageText = document.createElement('div');
    messageText.className = 'message-text';
    messageText.innerHTML = `<p>${message.message}</p>`;

    if (message.file_url) {
        messageText.innerHTML += `<img src="${message.file_url}" style="max-width:150px; margin-top:10px;">`;
    }

    messageDiv.appendChild(messageText);
    chatBody.appendChild(messageDiv);
    chatBody.scrollTop = chatBody.scrollHeight;
}

const userData = {
    message: null,
    file: {
        data: null,
        mime_type: null
    }
};

function sendMessage(messageObj) {
    fetch('/chat/send', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
        },
        body: JSON.stringify(messageObj)
    })
    .then(response => response.json())
    .then(data => {
        // Append the message to current user chat
        appendMessage(data.message);

        // Trigger client event
        channel.trigger('client-App\\Events\\NewMessage', {
            message: data.message
        });
    })
    .catch(error => console.error('Error sending message:', error));
}

const handleOutgoingMessage = (e) => {
    e.preventDefault();
    const text = messageInput.value.trim();
    const receiverId = document.getElementById('receiver-id').value;
    const receiverType = document.getElementById('receiver-type').value;

    if (!text && !userData.file.data) return;

    const message = {
        sender_id: currentUserId,
        sender_type: 'App\\Models\\User',
        receiver_id: 1,
        receiver_type: 'admin',
        message: userData.message || text,
        file: userData.file
    };

    sendMessage(message);

    messageInput.value = "";
    userData.message = null;
    userData.file = { data: null, mime_type: null };
    fileUploadWrapper.classList.remove("file-uploaded");

    chatBody.scrollTop = chatBody.scrollHeight;
};

// File handling
fileInput.addEventListener("change", () => {
    const file = fileInput.files[0];
    if (!file) return;

    const reader = new FileReader();
    reader.onload = (e) => {
        fileUploadWrapper.querySelector("img").src = e.target.result;
        fileUploadWrapper.classList.add("file-uploaded");

        const base64String = e.target.result.split(",")[1];
        userData.file = {
            data: base64String,
            mime_type: file.type
        };
        fileInput.value = "";
    };

    reader.readAsDataURL(file);
});

fileCancelButton.addEventListener("click", () => {
    userData.file = {};
    fileUploadWrapper.classList.remove("file-uploaded");
});

// Emoji picker setup
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
        if (e.target.id === "emoji-picker") {
            document.body.classList.toggle("show-emoji-picker");
        } else {
            document.body.classList.remove("show-emoji-picker");
        }
    }
});
document.querySelector(".chatbox-form").appendChild(picker);

// Event listeners
messageInput.addEventListener("keydown", (e) => {
    if (e.key === "Enter" && messageInput.value.trim()) {
        handleOutgoingMessage(e);
    }
});
sendMessageButton.addEventListener("click", handleOutgoingMessage);
document.querySelector("#chatbox-upload").addEventListener("click", () => fileInput.click());
document.getElementById("close-chatbox").addEventListener("click", function () {
    document.getElementById("chatbox").style.display = "none";
});

// Initialize Pusher after DOM is ready
initializePusher();