<?php
$pageTitle = "Contact Us - The Next Apartment";
$currentPage = "contact";
include 'includes/header.php';
?>

<!-- Page Header -->
<header class="bg-primary text-white text-center py-5">
    <div class="container">
        <h1 class="display-4 fw-bold">Contact Us</h1>
        <p class="lead">We're here to answer your questions and help you find your perfect apartment.</p>
    </div>
</header>

<!-- Contact Information -->
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 mb-4 mb-lg-0">
                <div class="card h-100 shadow-sm">
                    <div class="card-body text-center">
                        <i class="fas fa-map-marker-alt display-3 text-primary mb-3"></i>
                        <h5 class="card-title">Visit Us</h5>
                        <p class="card-text">
                            123 Apartment Ave<br>
                            City, State 12345<br>
                            United States
                        </p>
                        <a href="https://maps.google.com" target="_blank" class="btn btn-outline-primary">Get Directions</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mb-4 mb-lg-0">
                <div class="card h-100 shadow-sm">
                    <div class="card-body text-center">
                        <i class="fas fa-phone display-3 text-primary mb-3"></i>
                        <h5 class="card-title">Call Us</h5>
                        <p class="card-text">
                            Main Office: (123) 456-7890<br>
                            Leasing: (123) 456-7891<br>
                            Maintenance: (123) 456-7892
                        </p>
                        <a href="tel:+11234567890" class="btn btn-outline-primary">Call Now</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card h-100 shadow-sm">
                    <div class="card-body text-center">
                        <i class="fas fa-envelope display-3 text-primary mb-3"></i>
                        <h5 class="card-title">Email Us</h5>
                        <p class="card-text">
                            General Inquiries: info@thenextapartment.com<br>
                            Leasing: leasing@thenextapartment.com<br>
                            Support: support@thenextapartment.com
                        </p>
                        <a href="mailto:info@thenextapartment.com" class="btn btn-outline-primary">Email Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Contact Form -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card shadow">
                    <div class="card-body p-5">
                        <h2 class="text-center mb-4">Send Us a Message</h2>
                        <div id="formResponse" class="alert d-none"></div>
                        <form id="contactForm">
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
                                <label for="email" class="form-label">Email Address</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                            <div class="mb-3">
                                <label for="phone" class="form-label">Phone Number</label>
                                <input type="tel" class="form-control" id="phone" name="phone" required>
                            </div>
                            <div class="mb-3">
                                <label for="subject" class="form-label">Subject</label>
                                <select class="form-select" id="subject" name="subject" required>
                                    <option value="" selected disabled>Select a subject</option>
                                    <option value="general">General Inquiry</option>
                                    <option value="leasing">Leasing Information</option>
                                    <option value="tour">Schedule a Tour</option>
                                    <option value="maintenance">Maintenance Request</option>
                                    <option value="other">Other</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="message" class="form-label">Message</label>
                                <textarea class="form-control" id="message" name="message" rows="5" required></textarea>
                            </div>
                            <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" id="newsletter" name="newsletter">
                                <label class="form-check-label" for="newsletter">Subscribe to our newsletter</label>
                            </div>
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary btn-lg">Send Message</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Rest of the content remains the same as in contact.html -->
<!-- Office Hours, Map, and FAQ sections -->

<?php include 'includes/footer.php'; ?>

<script>
document.getElementById('contactForm').addEventListener('submit', function(e) {
    e.preventDefault();
    
    // Get form data
    const formData = new FormData(this);
    
    // Send AJAX request
    fetch('process/contact_process.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        const responseDiv = document.getElementById('formResponse');
        responseDiv.classList.remove('d-none', 'alert-success', 'alert-danger');
        
        if (data.status === 'success') {
            responseDiv.classList.add('alert-success');
            responseDiv.innerHTML = data.message;
            document.getElementById('contactForm').reset();
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
        const responseDiv = document.getElementById('formResponse');
        responseDiv.classList.remove('d-none', 'alert-success');
        responseDiv.classList.add('alert-danger');
        responseDiv.innerHTML = 'An error occurred. Please try again later.';
    });
});
</script>
