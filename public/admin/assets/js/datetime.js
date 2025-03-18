function updateDateTime() {
            let now = new Date();
            let options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
            let formattedDate = now.toLocaleDateString('en-US', options);
            let formattedTime = now.toLocaleTimeString();
            document.getElementById("current-date").innerText = formattedDate;
            document.getElementById("current-time").innerText = formattedTime;
        }
        setInterval(updateDateTime, 1000);
        window.onload = updateDateTime;

function toggleDropdown(id) {
            var dropdown = document.getElementById('dropdown-' + id);
            dropdown.style.display = dropdown.style.display === 'table-row' ? 'none' : 'table-row';
        }

        function updateStatus(status) {
            const statusElement = document.getElementById('order-status');
            
            if (status === 'completed') {
                statusElement.textContent = 'COMPLETED';
                statusElement.className = 'status completed';
            } else if (status === 'cancelled') {
                statusElement.textContent = 'CANCELLED';
                statusElement.className = 'status cancelled';
            }
        }
