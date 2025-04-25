//Full width for larger screen
document.getElementById('menu-toggle').addEventListener('click', function() {
            document.querySelector('.sidebar').classList.toggle('hidden');
            document.querySelector('.main-content').classList.toggle('full-width');
        });

// Auto-close sidebar when clicking outside (mobile screens)
document.addEventListener('click', function(event) {
    const sidebar = document.querySelector('.sidebar');
    const toggleButton = document.getElementById('menu-toggle');
    const isClickInsideSidebar = sidebar.contains(event.target);
    const isClickToggle = toggleButton.contains(event.target);
    const isMobile = window.innerWidth <= 768;

    if (!isClickInsideSidebar && !isClickToggle && isMobile && !sidebar.classList.contains('hidden')) {
        sidebar.classList.add('hidden');
        document.querySelector('.main-content').classList.add('full-width');
    }
});

document.querySelectorAll('.nav-link').forEach(link => {
            link.addEventListener('click', function() {
                document.querySelectorAll('.nav-link').forEach(nav => nav.classList.remove('active'));
                this.classList.add('active');
                
                document.querySelectorAll('.dashboard-section').forEach(section => section.classList.remove('active-section'));
                document.getElementById(this.getAttribute('data-section')).classList.add('active-section');
            });     
        });

