function updateProgress(meetupSTEP) {
      document.querySelectorAll('.meetupSTEP').forEach((el, idx) => {
        el.classList.toggle('active', idx < meetupSTEP);
      });
    }

    function validateSelection() {
      const city = document.getElementById('city').value;
      const landmark = document.getElementById('landmark').value;
      const error = document.getElementById('errorMessage');

      if (!city) {
        error.textContent = "Please select your city to proceed.";
        return;
      }
      if (!landmark) {
        error.textContent = "Please choose a landmark for the meet-up.";
        return;
      }
      error.textContent = "";

      document.getElementById('selectionStep').classList.remove('active');
      document.getElementById('confirmationStep').classList.add('active');
      document.getElementById('confirmationMessage').textContent = 
        `You have selected ${city} and ${landmark} as your meet-up location. Is this correct?`;

      updateProgress(2);
    }
/*
    function confirmLocation() {
      const city = document.getElementById('city').value;
      const landmark = document.getElementById('landmark').value;

      document.getElementById('confirmationStep').classList.remove('active');
      document.getElementById('successStep').classList.add('active');
      document.getElementById('successMessage').textContent = 
        `Your meet-up location has been set to ${landmark}, ${city}. You’ll receive further instructions via email/SMS.`;

      updateProgress(3);
    }
*/
    function goBack() {
      document.getElementById('confirmationStep').classList.remove('active');
      document.getElementById('selectionStep').classList.add('active');
      updateProgress(1);
    }