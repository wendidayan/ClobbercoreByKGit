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
      error1.textContent = "";
      document.getElementById('messageBox').textContent = "Code sent to " + email;
      showStep(2);
    }

    function goToStep3() {
      const code = document.getElementById('code').value;
      const error2 = document.getElementById('error2');
      if (code.length < 4) {
        error2.textContent = "Invalid verification code.";
        return;
      }
      error2.textContent = "";
      document.getElementById('messageBox').textContent = "Code verified successfully.";
      showStep(3);
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

      error3.textContent = "";
      document.getElementById('messageBox').textContent = "";

      // Show success modal
      const modal = document.getElementById('password-change-sucess');
      modal.style.display = 'flex';

      // Redirect after 2 seconds
      setTimeout(() => {
        window.location.href = "ShoppingPage.html";
      }, 2000);
    }