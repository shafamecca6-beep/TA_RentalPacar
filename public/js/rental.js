// Typing effect for hero text
const typingText = document.getElementById('typing-text');
const text = "Jasa Rental Pacar Terpercaya";
let index = 0;

function typeWriter() {
    if (index < text.length) {
        typingText.innerHTML += text.charAt(index);
        index++;
        setTimeout(typeWriter, 100);
    } else {
        typingText.style.borderRight = 'none';
    }
}

// Start typing effect when page loads
window.addEventListener('load', () => {
    typeWriter();
});

// Smooth scroll to features section on CTA button click
const ctaButton = document.getElementById('cta-button');
ctaButton.addEventListener('click', () => {
    document.getElementById('features').scrollIntoView({
        behavior: 'smooth'
    });
});

// Add glow effect to feature cards on hover (enhancing CSS)
const featureCards = document.querySelectorAll('.feature-card');
featureCards.forEach(card => {
    card.addEventListener('mouseenter', () => {
        card.style.boxShadow = '0 20px 40px rgba(255, 0, 221, 0.6), 0 0 20px rgba(0, 255, 255, 0.4)';
    });
    card.addEventListener('mouseleave', () => {
        card.style.boxShadow = '0 20px 40px rgba(255, 0, 191, 0.3)';
    });
});

// Dropdown menu toggle for mobile and click interaction
const dropbtn = document.querySelector('.dropbtn');
const dropdownContent = document.querySelector('.dropdown-content');

dropbtn.addEventListener('click', function(event) {
    event.preventDefault(); // Prevent default link behavior
    dropdownContent.classList.toggle('show');
});

// Close the dropdown when clicking outside
window.addEventListener('click', function(event) {
    if (!event.target.matches('.dropbtn')) {
        if (dropdownContent.classList.contains('show')) {
            dropdownContent.classList.remove('show');
        }
    }
});

// Auto-hide success notification after 5 seconds
const successNotification = document.getElementById('success-notification');
if (successNotification) {
    setTimeout(() => {
        successNotification.style.display = 'none';
    }, 5000); // 5000 milliseconds = 5 seconds
}
