  // Initialize Pusher with reconnection handling
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

      // Subscribe to the chat channel
      channel = pusher.subscribe(`private-chat`);

      // Handle new messages
      channel.bind('App\\Events\\NewMessage', function(data) {
          const message = data.message;
          const currentUserId = document.getElementById('current-user-id').value;
          const currentUserType = document.getElementById('current-user-type').value;

          // Check if the message is for the current user
          if ((message.sender_id == currentUserId && message.sender_type == currentUserType) ||
              (message.receiver_id == currentUserId && message.receiver_type == currentUserType)) {
              appendMessage(message);
          }
      });

      // Handle connection state changes
      pusher.connection.bind('state_change', function(states) {
          console.log('Pusher connection state:', states.current);
          if (states.current === 'connected') {
              console.log('Successfully connected to Pusher');
          } else if (states.current === 'disconnected' || states.current === 'failed') {
              console.log('Pusher connection lost, attempting to reconnect...');
              setTimeout(initializePusher, 3000); // Try to reconnect after 3 seconds
          }
      });

      // Handle subscription errors
      channel.bind('subscription_error', function(error) {
          console.error('Pusher subscription error:', error);
      });
  }

  // Function to load messages
  function loadMessages(userId, userType) {
      fetch(`/chat/messages?user_id=${userId}&user_type=${userType}`)
          .then(response => response.json())
          .then(messages => {
              const conversationBody = document.querySelector('.conversation-body');
              conversationBody.innerHTML = '';
              messages.forEach(message => appendMessage(message));
          })
          .catch(error => console.error('Error loading messages:', error));
  }

  // Function to append a message to the chat
  function appendMessage(message) {
      const conversationBody = document.querySelector('.conversation-body');
      const messageDiv = document.createElement('div');
      messageDiv.className = `message ${message.sender_type === 'admin' ? 'sender' : 'receiver'}`;
      
      const messageText = document.createElement('div');
      messageText.className = 'message-text';
      messageText.innerHTML = `<span>${message.message}</span>`;
      
      messageDiv.appendChild(messageText);
      conversationBody.appendChild(messageDiv);
      conversationBody.scrollTop = conversationBody.scrollHeight;
  }

  // Function to send a message
  function sendMessage() {
      const messageInput = document.getElementById('message-input-abc');
      const message = messageInput.value.trim();
      
      if (message) {
          const currentUserId = document.getElementById('current-user-id').value;
          const currentUserType = document.getElementById('current-user-type').value;
          const receiverId = document.getElementById('receiver-id').value;
          const receiverType = document.getElementById('receiver-type').value;

          fetch('/chat/send', {
              method: 'POST',
              headers: {
                  'Content-Type': 'application/json',
                  'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
              },
              body: JSON.stringify({
                  sender_id: currentUserId,
                  sender_type: currentUserType,
                  receiver_id: receiverId,
                  receiver_type: receiverType,
                  message: message
              })
          })
          .then(response => response.json())
          .then(data => {
              messageInput.value = '';
              appendMessage(data.message);
          })
          .catch(error => console.error('Error sending message:', error));
      }
  }

  // Event listeners
  document.addEventListener('DOMContentLoaded', function() {
      // Initialize Pusher
      initializePusher();

  // Load users
  fetch('/chat/users')
      .then(response => {
          if (!response.ok) {
              throw new Error(`HTTP error! Status: ${response.status}`);
          }
          return response.json();
      })
      .then(users => {
          const wrapper = document.querySelector('.inbox-messages-wrapper');
          wrapper.innerHTML = '';

          users.forEach(user => {
              const div = document.createElement('div');
              div.className = 'message-preview';
              div.setAttribute('data-user-id', user.id);
              div.setAttribute('data-user', user.fullname);
              div.innerHTML = `
                  <span>${user.username}</span>
                  <p class="pb-1">Click to start chat</p>
                  <span class="text-muted" style="font-size:8px;">${new Date().toLocaleTimeString()}</span>
              `;
              wrapper.appendChild(div);
          });
      })
      .catch(error => {
          console.error('Error loading users:', error);
          alert('Failed to load users. Please check if you’re logged in.');
      });

      // Handle user selection
      document.querySelector('.inbox-messages-wrapper').addEventListener('click', (e) => {
          const userDiv = e.target.closest('.message-preview');
          if (userDiv) {
              const userId = userDiv.getAttribute('data-user-id');
              const userName = userDiv.getAttribute('data-user');

              document.getElementById('current-user').textContent = userName;
              document.getElementById('receiver-id').value = userId;
              document.getElementById('receiver-type').value = 'App\\Models\\User';

              // Load previous messages
              loadMessages(userId, 'App\\Models\\User');
          }
      });

      // Handle send message
      document.getElementById('send-message-abc').addEventListener('click', sendMessage);
      document.getElementById('message-input-abc').addEventListener('keydown', function(e) {
          if (e.key === 'Enter') {
              sendMessage();
          }
      });
  });

