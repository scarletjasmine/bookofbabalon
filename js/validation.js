document.addEventListener('DOMContentLoaded', function() {
    // Get the contact form element
    const contactForm = document.getElementById('contactForm');
    
    // Only add validation if the form exists on the page
    if (contactForm) {
        contactForm.addEventListener('submit', function(event) {
            // Flag to track if the form is valid
            let isValid = true;
            
            // Get form fields
            const nameInput = document.getElementById('name');
            const emailInput = document.getElementById('email');
            const messageInput = document.getElementById('message');
            
            // Clear any existing error messages
            clearErrors();
            
            // Validate name (required, at least 2 characters)
            if (nameInput.value.trim() === '') {
                showError(nameInput, 'Name is required');
                isValid = false;
            } else if (nameInput.value.trim().length < 2) {
                showError(nameInput, 'Name must be at least 2 characters long');
                isValid = false;
            }
            
            // Validate email (required, valid format)
            if (emailInput.value.trim() === '') {
                showError(emailInput, 'Email is required');
                isValid = false;
            } else if (!isValidEmail(emailInput.value.trim())) {
                showError(emailInput, 'Please enter a valid email address');
                isValid = false;
            }
            
            // Validate message (required, at least 10 characters)
            if (messageInput.value.trim() === '') {
                showError(messageInput, 'Message is required');
                isValid = false;
            } else if (messageInput.value.trim().length < 10) {
                showError(messageInput, 'Message must be at least 10 characters long');
                isValid = false;
            }
            
            // If the form is not valid, prevent submission
            if (!isValid) {
                event.preventDefault();
            }
        });
    }
    
    // Function to validate email format
    function isValidEmail(email) {
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return emailRegex.test(email);
    }
    
    // Function to show error message
    function showError(inputElement, message) {
        // Find the parent form-group element
        const formGroup = inputElement.closest('.form-group');
        
        // Check if there's already an error span, otherwise create one
        let errorSpan = formGroup.querySelector('.error');
        if (!errorSpan) {
            errorSpan = document.createElement('span');
            errorSpan.className = 'error';
            formGroup.appendChild(errorSpan);
        }
        
        // Set the error message
        errorSpan.textContent = message;
        
        // Add error styling to the input
        inputElement.style.borderColor = '#e74c3c';
    }
    
    // Function to clear all error messages
    function clearErrors() {
        // Remove all error messages
        const errorSpans = document.querySelectorAll('.error');
        errorSpans.forEach(function(span) {
            span.textContent = '';
        });
        
        // Reset input styling
        const inputs = contactForm.querySelectorAll('input, textarea');
        inputs.forEach(function(input) {
            input.style.borderColor = '#ddd';
        });
    }
});
