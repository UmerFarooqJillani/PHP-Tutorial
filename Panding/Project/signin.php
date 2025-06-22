<?php
$pageTitle = "Sign In / Sign Up - The Next Apartment";
$currentPage = "signin";
include 'includes/header.php';

// Redirect if already logged in
if (isset($_SESSION['user_id'])) {
    header("Location: user-dashboard.php");
    exit;
}
?>

<!-- Authentication Section -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card shadow border-0 overflow-hidden">
                    <div class="row g-0">
                        <div class="col-md-5 d-none d-md-block">
                            <img src="/Project/src/images/Restaurant.jpg" alt="Apartment interior" class="img-fluid h-100 object-fit-cover">
                        </div>
                        <div class="col-md-7">
                            <div class="card-body p-4 p-lg-5">
                                <!-- Authentication Tabs -->
                                <ul class="nav nav-tabs mb-4" id="authTab" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link active" id="signin-tab" data-bs-toggle="tab" data-bs-target="#signin" type="button" role="tab" aria-controls="signin" aria-selected="true">Sign In</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="signup-tab" data-bs-toggle="tab" data-bs-target="#signup" type="button" role="tab" aria-controls="signup" aria-selected="false">Sign Up</button>
                                    </li>
                                </ul>
                                
                                <!-- Tab Content -->
                                <div class="tab-content" id="authTabContent">
                                    <!-- Sign In Form -->
                                    <div class="tab-pane fade show active" id="signin" role="tabpanel" aria-labelledby="signin-tab">
                                        <h2 class="mb-4">Welcome Back</h2>
                                        <div id="signinResponse" class="alert d-none"></div>
                                        <form id="signinForm">
                                            <div class="mb-3">
                                                <label for="signinEmail" class="form-label">Email Address</label>
                                                <input type="email" class="form-control" id="signinEmail" name="signinEmail" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="signinPassword" class="form-label">Password</label>
                                                <input type="password" class="form-control" id="signinPassword" name="signinPassword" required>
                                            </div>
                                            <div class="mb-3 form-check">
                                                <input type="checkbox" class="form-check-input" id="rememberMe" name="rememberMe">
                                                <label class="form-check-label" for="rememberMe">Remember me</label>
                                            </div>
                                            <div class="d-grid">
                                                <button type="submit" class="btn btn-primary btn-lg">Sign In</button>
                                            </div>
                                            <div class="text-center mt-3">
                                                <a href="#" class="text-decoration-none">Forgot password?</a>
                                            </div>
                                        </form>
                                        
                                        <div class="mt-4">
                                            <p class="text-center mb-3">Or sign in with</p>
                                            <div class="d-flex justify-content-center gap-2">
                                                <button class="btn btn-outline-secondary">
                                                    <i class="fab fa-google"></i> Google
                                                </button>
                                                <button class="btn btn-outline-secondary">
                                                    <i class="fab fa-facebook-f"></i> Facebook
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <!-- Sign Up Form -->
                                    <div class="tab-pane fade" id="signup" role="tabpanel" aria-labelledby="signup-tab">
                                        <h2 class="mb-4">Create an Account</h2>
                                        <div id="signupResponse" class="alert d-none"></div>
                                        <form id="signupForm">
                                            <div class="row">
                                                <div class="col-md-6 mb-3">
                                                    <label for="firstName" class="form-label">First Name</label>
                                                    <input type="text" class="form-control" id="firstName" name="firstName" required>
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label for="lastName" class="form-label">Last Name</label>
                                                    <input type="text" class="form-control" id="lastName" name="lastName" required>
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="signupEmail" class="form-label">Email Address</label>
                                                <input type="email" class="form-control" id="signupEmail" name="signupEmail" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="phone" class="form-label">Phone Number</label>
                                                <input type="tel" class="form-control" id="phone" name="phone" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="signupPassword" class="form-label">Password</label>
                                                <input type="password" class="form-control" id="signupPassword" name="signupPassword" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="confirmPassword" class="form-label">Confirm Password</label>
                                                <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" required>
                                            </div>
                                            <div class="mb-3 form-check">
                                                <input type="checkbox" class="form-check-input" id="termsAgree" name="termsAgree" required>
                                                <label class="form-check-label" for="termsAgree">I agree to the <a href="#">Terms of Service</a> and <a href="#">Privacy Policy</a></label>
                                            </div>
                                            <div class="d-grid">
                                                <button type="submit" class="btn btn-primary btn-lg">Create Account</button>
                                            </div>
                                        </form>
                                        
                                        <div class="mt-4">
                                            <p class="text-center mb-3">Or sign up with</p>
                                            <div class="d-flex justify-content-center gap-2">
                                                <button class="btn btn-outline-secondary">
                                                    <i class="fab fa-google"></i> Google
                                                </button>
                                                <button class="btn btn-outline-secondary">
                                                    <i class="fab fa-facebook-f"></i> Facebook
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Resident Benefits section remains the same as in signin.html -->

<?php include 'includes/footer.php'; ?>

<script>
// Sign In Form Submission
document.getElementById('signinForm').addEventListener('submit', function(e) {
    e.preventDefault();
    
    // Get form data
    const formData = new FormData(this);
    
    // Send AJAX request
    fetch('process/signin_process.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        const responseDiv = document.getElementById('signinResponse');
        responseDiv.classList.remove('d-none', 'alert-success', 'alert-danger');
        
        if (data.status === 'success') {
            responseDiv.classList.add('alert-success');
            responseDiv.innerHTML = data.message;
            
            // Redirect after successful login
            setTimeout(() => {
                window.location.href = data.redirect;
            }, 1500);
        } else {
            responseDiv.classList.add('alert-danger');
            let errorMessage = data.message;
            
            if (data.errors && data.errors.length > 0) {
                errorMessage += '<ul>';
                data.errors.forEach(error => {
                    errorMessage += `<li>${error}</li>`;
                });
                errorMessage += '</ul>';
            }
            
            responseDiv.innerHTML = errorMessage;
        }
    })
    .catch(error => {
        console.error('Error:', error);
        const responseDiv = document.getElementById('signinResponse');
        responseDiv.classList.remove('d-none', 'alert-success');
        responseDiv.classList.add('alert-danger');
        responseDiv.innerHTML = 'An error occurred. Please try again later.';
    });
});

// Sign Up Form Submission
document.getElementById('signupForm').addEventListener('submit', function(e) {
    e.preventDefault();
    
    // Get form data
    const formData = new FormData(this);
    
    // Check if passwords match
    const password = document.getElementById('signupPassword').value;
    const confirmPassword = document.getElementById('confirmPassword').value;
    
    if (password !== confirmPassword) {
        const responseDiv = document.getElementById('signupResponse');
        responseDiv.classList.remove('d-none', 'alert-success');
        responseDiv.classList.add('alert-danger');
        responseDiv.innerHTML = 'Passwords do not match!';
        return;
    }
    
    // Send AJAX request
    fetch('process/signup_process.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        const responseDiv = document.getElementById('signupResponse');
        responseDiv.classList.remove('d-none', 'alert-success', 'alert-danger');
        
        if (data.status === 'success') {
            responseDiv.classList.add('alert-success');
            responseDiv.innerHTML = data.message;
            
            // Redirect after successful signup
            setTimeout(() => {
                window.location.href = data.redirect;
            }, 1500);
        } else {
            responseDiv.classList.add('alert-danger');
            let errorMessage = data.message;
            
            if (data.errors && data.errors.length > 0) {
                errorMessage += '<ul>';
                data.errors.forEach(error => {
                    errorMessage += `<li>${error}</li>`;
                });
                errorMessage += '</ul>';
            }
            
            responseDiv.innerHTML = errorMessage;
        }
    })
    .catch(error => {
        console.error('Error:', error);
        const responseDiv = document.getElementById('signupResponse');
        responseDiv.classList.remove('d-none', 'alert-success');
        responseDiv.classList.add('alert-danger');
        responseDiv.innerHTML = 'An error occurred. Please try again later.';
    });
});
</script>
