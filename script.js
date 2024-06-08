document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('myForm');

    if (form) {
        form.addEventListener('submit', (event) => {
            // Get form values
            const username = document.getElementById('username').value;
            const email = document.getElementById('email').value;
            const password = document.getElementById('password').value;

            // Basic validation
            let validationErrors = false;

            if (!username) {
                alert('Username is required');
                validationErrors = true;
            }

            if (!email) {
                alert('Email is required');
                validationErrors = true;
            } else if (!validateEmail(email)) {
                alert('Please enter a valid email address');
                validationErrors = true;
            }

            if (!password) {
                alert('Password is required');
                validationErrors = true;
            } else if (password.length < 6) {
                alert('Password must be at least 6 characters long');
                validationErrors = true;
            }

            if (validationErrors) {
                event.preventDefault(); // Prevent form submission if there are validation errors
            }
        });

        // Email validation function
        function validateEmail(email) {
            const re = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
            return re.test(String(email).toLowerCase());
        }
    } else {
        console.error('Form element not found');
    }
});
