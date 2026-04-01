document.addEventListener("DOMContentLoaded", function() {
    const timerBlock = document.querySelector('.sl-timer-block');
    if (!timerBlock) return;

    const targetDateStr = timerBlock.getAttribute('data-target');
    if (!targetDateStr) return;

    const targetDate = new Date(targetDateStr).getTime();

    function updateTimer() {
        const now = new Date().getTime();
        const difference = targetDate - now;

        if (difference <= 0) {
            document.getElementById('sl-days').innerText = '00';
            document.getElementById('sl-hours').innerText = '00';
            document.getElementById('sl-minutes').innerText = '00';
            document.getElementById('sl-seconds').innerText = '00';
            return;
        }

        const days = Math.floor(difference / (1000 * 60 * 60 * 24));
        const hours = Math.floor((difference % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        const minutes = Math.floor((difference % (1000 * 60 * 60)) / (1000 * 60));
        const seconds = Math.floor((difference % (1000 * 60)) / 1000);

        document.getElementById('sl-days').innerText = days.toString().padStart(2, '0');
        document.getElementById('sl-hours').innerText = hours.toString().padStart(2, '0');
        document.getElementById('sl-minutes').innerText = minutes.toString().padStart(2, '0');
        document.getElementById('sl-seconds').innerText = seconds.toString().padStart(2, '0');
    }

    updateTimer(); // Initial call
    setInterval(updateTimer, 1000); // Update every second
});
