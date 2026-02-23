
        // Toggle Password Visibility
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const toggleIcon = document.getElementById('toggleIcon');
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                toggleIcon.classList.remove('fa-eye');
                toggleIcon.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                toggleIcon.classList.remove('fa-eye-slash');
                toggleIcon.classList.add('fa-eye');
            }
        }

        // Form Validation & Submission
        document.getElementById('loginForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const email = document.getElementById('email');
            const password = document.getElementById('password');
            const loginBtn = document.getElementById('loginBtn');
            let isValid = true;

            // Reset error states
            document.querySelectorAll('.input-wrapper').forEach(wrapper => {
                wrapper.classList.remove('error', 'success');
            });

            // Validate Email
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(email.value)) {
                email.parentElement.classList.add('error');
                isValid = false;
            } else {
                email.parentElement.classList.add('success');
            }

            // Validate Password
            if (password.value.length < 8) {
                password.parentElement.classList.add('error');
                isValid = false;
            } else {
                password.parentElement.classList.add('success');
            }

            // If valid, show loading state
            if (isValid) {
                loginBtn.classList.add('loading');
                
                // Simulate API call
                setTimeout(() => {
                    loginBtn.classList.remove('loading');
                    // alert('Login successful! Welcome to the Medical Portal.');
                    // Redirect or perform other actions here
                }, 2000);
            }
        });

        // Real-time validation
        document.getElementById('email').addEventListener('input', function() {
            this.parentElement.classList.remove('error', 'success');
        });

        document.getElementById('password').addEventListener('input', function() {
            this.parentElement.classList.remove('error', 'success');
        });
    