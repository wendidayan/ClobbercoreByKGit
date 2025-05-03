//Forgot Password JS
 function showStep(stepNumber) {
      document.querySelectorAll('.stepXY').forEach(step => step.classList.remove('active'));
      document.getElementById('step' + stepNumber).classList.add('active');
    }

    function goToStep2() {
      const email = document.getElementById('email').value;
      const error1 = document.getElementById('error1');
    
      if (!email || !email.includes("@")) {
        error1.textContent = "Please enter a valid email address.";
        return;
      }
    
      fetch('/forgot-password/send-code', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
          'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: JSON.stringify({ email })
      })
      .then(response => response.json())
      .then(data => {
        if (data.success) {
          error1.textContent = "";
          document.getElementById('messageBox').textContent = "Code sent to " + email;
          showStep(2);
        } else {
          error1.textContent = data.message || "Failed to send code.";
        }
      })
      .catch(err => {
        error1.textContent = "An error occurred.";
        console.error(err);
      });
    }
    

    function goToStep3() {
      const code = document.getElementById('code').value;
      const error2 = document.getElementById('error2');
    
      fetch('/forgot-password/verify-code', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
          'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: JSON.stringify({ code })
      })
      .then(response => response.json())
      .then(data => {
        if (data.success) {
          error2.textContent = "";
          document.getElementById('messageBox').textContent = "Code verified successfully.";
          showStep(3);
        } else {
          error2.textContent = data.message || "Invalid code.";
        }
      })
      .catch(err => {
        error2.textContent = "An error occurred.";
        console.error(err);
      });
    }
    

    function finishReset() {
      const newPassword = document.getElementById('newPassword').value;
      const confirmPassword = document.getElementById('confirmPassword').value;
      const error3 = document.getElementById('error3');
    
      if (newPassword.length < 6) {
        error3.textContent = "Password must be at least 6 characters.";
        return;
      }
      if (newPassword !== confirmPassword) {
        error3.textContent = "Passwords do not match.";
        return;
      }
    
      fetch('/forgot-password/reset', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
          'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: JSON.stringify({ password: newPassword })
      })
      .then(response => response.json())
      .then(data => {
        if (data.success) {
          error3.textContent = "";
          document.getElementById('messageBox').textContent = "";
    
          // Show success modal
          const modal = document.getElementById('password-change-sucess');
          modal.style.display = 'flex';
    
          setTimeout(() => {
            window.location.href = "ShoppingPage.html";
          }, 2000);
        } else {
          error3.textContent = data.message || "Could not reset password.";
        }
      })
      .catch(err => {
        error3.textContent = "An error occurred.";
        console.error(err);
      });
    }
    
    