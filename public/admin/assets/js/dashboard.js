document.getElementById('menu-toggle').addEventListener('click', function() {
            document.querySelector('.sidebar').classList.toggle('hidden');
            document.querySelector('.main-content').classList.toggle('full-width');
        });

document.querySelectorAll('.nav-link').forEach(link => {
            link.addEventListener('click', function() {
                document.querySelectorAll('.nav-link').forEach(nav => nav.classList.remove('active'));
                this.classList.add('active');
                
                document.querySelectorAll('.dashboard-section').forEach(section => section.classList.remove('active-section'));
                document.getElementById(this.getAttribute('data-section')).classList.add('active-section');
            });     
        });

