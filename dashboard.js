const ctx = document.getElementById('lineChart').getContext('2d');

const lineChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul'],
        datasets: [{
            label: 'Visitors',
            data: [1200, 1900, 3000, 2500, 3200, 4100, 3800],
            backgroundColor: 'rgba(255,39,112,0.2)',
            borderColor: 'rgba(255,39,112,1)',
            borderWidth: 3,
            tension: 0.4,
            fill: true,
            pointRadius: 5,
            pointHoverRadius: 7
        }]
    },
    options: {
        responsive: true,
        plugins: {
            legend: {
                labels: {
                    color: '#fff',
                    font: { size: 14 }
                }
            }
        },
        scales: {
            x: {
                ticks: { color: '#fff' },
                grid: { color: 'rgba(255,255,255,0.1)' }
            },
            y: {
                ticks: { color: '#fff' },
                grid: { color: 'rgba(255,255,255,0.1)' }
            }
        }
    }
});
function updateClock() {
    const now = new Date();
    document.getElementById('time').innerText =
        now.toLocaleTimeString();
    document.getElementById('date').innerText =
        now.toDateString();
}
setInterval(updateClock, 1000);
updateClock();
const toggle = document.getElementById('themeToggle');
toggle.onclick = () => {
    document.body.classList.toggle('light-mode');
};
const profileBtn = document.getElementById('profileBtn');
const profileMenu = document.getElementById('profileMenu');

profileBtn.addEventListener('click', function (e) {
    e.stopPropagation();
    profileMenu.style.display =
        profileMenu.style.display === 'flex' ? 'none' : 'flex';
});

// বাইরে ক্লিক করলে auto close
document.addEventListener('click', function () {
    profileMenu.style.display = 'none';
});
