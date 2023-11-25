import './bootstrap';

function applyGradientButtonEffect(button) {
    button.addEventListener('mousemove', function(e) {
        const rect = this.getBoundingClientRect();
        const x = e.clientX - rect.left;
        const y = e.clientY - rect.top;
        const percentX = Math.round((x / rect.width) * 100);
        const percentY = Math.round((y / rect.height) * 100);
        this.style.background = `radial-gradient(circle at ${percentX}% ${percentY}%, #ff8a00, #e52e71)`;
    });

    button.addEventListener('mouseleave', function() {
        this.style.background = 'linear-gradient(to left, #ff8a00, #e52e71)';
    });
}

const buttons = document.querySelectorAll('.gradient-button');
buttons.forEach(button => {
    applyGradientButtonEffect(button);
});




