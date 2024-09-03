
document.addEventListener("DOMContentLoaded", function() {
    // JavaScript code can be added here for interaction
});

// Responsive header menu
const menuToggle = document.querySelector('.menu-toggle');
const nav = document.querySelector('nav');

menuToggle.addEventListener('click', () => {
            nav.classList.toggle('show');
});