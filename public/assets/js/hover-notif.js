 const notif = document.getElementById('notif');
    const notifContent = document.getElementById('notif-content');

    notif.addEventListener('click', () => {
        notifContent.classList.add('show');
    });

   document.addEventListener('click', function (event) {
      if (!notif.contains(event.target) && !notifContent.contains(event.target)) {
        notifContent.classList.remove('show');
      }
    });

    viewAll.addEventListener('click', (event) => {
        event.preventDefault();
        alert('Redirecting to all notifications...');
        notifContent.classList.remove('show');
    });