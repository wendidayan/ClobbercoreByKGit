 function showSection(event, sectionId) {
            event.preventDefault();
            document.querySelectorAll('.profile-section').forEach(section => {
                section.style.display = 'none';
            });
            document.getElementById(sectionId).style.display = 'block';
            
            document.querySelectorAll('.list-group-item').forEach(tab => {
                tab.classList.remove('active');
            });
            event.target.classList.add('active');
        }

        function showPurchase(event) {
            event.preventDefault();
            document.getElementById('left-sidebar').style.display = 'none';
            showSection(event, 'purchase');
        }