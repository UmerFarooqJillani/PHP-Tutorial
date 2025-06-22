<?php
$pageTitle = "The Next Apartment - Home";
$currentPage = "home";
include 'includes/header.php';

// Include database connection
require_once 'config/database.php';

// Get featured apartments
$sql = "SELECT * FROM apartments WHERE status = 'available' ORDER BY RAND() LIMIT 3";
$result = $conn->query($sql);
?>

<!-- Hero Section with Carousel -->
<header>
    <div id="heroCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active" style="height: 80vh; min-height: 500px;">
                <img src="/Project/src/images/Main-First-Banner.jpg" class="d-block w-100 h-100 object-fit-cover" alt="Luxury apartment exterior">
                <div class="carousel-caption d-flex h-100 align-items-center" style="background: rgba(0, 0, 0, 0.4); top: 0; bottom: 0; left: 0; right: 0;">
                    <div class="container">
                        <div class="row justify-content-start text-start">
                            <div class="col-lg-6">
                                <h1 class="display-4 fw-bold" style="text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.7);">Find Your Dream Apartment</h1>
                                <p class="lead" style="text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.7);">Discover the perfect living space with The Next Apartment. We offer premium apartments in prime locations with excellent amenities.</p>
                                <div class="d-grid gap-2 d-md-flex justify-content-md-start mb-4">
                                    <a href="apartments.php" class="btn btn-primary btn-lg px-4 me-md-2">View Apartments</a>
                                    <a href="contact.php" class="btn btn-outline-light btn-lg px-4">Contact Us</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item" style="height: 80vh; min-height: 500px;">
                <img src="/Project/src/images/Banner-4.jpg" class="d-block w-100 h-100 object-fit-cover" alt="Modern apartment interior">
                <div class="carousel-caption d-flex h-100 align-items-center" style="background: rgba(0, 0, 0, 0.4); top: 0; bottom: 0; left: 0; right: 0;">
                    <div class="container">
                        <div class="row justify-content-start text-start">
                            <div class="col-lg-6">
                                <h1 class="display-4 fw-bold" style="text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.7);">Luxury Living Spaces</h1>
                                <p class="lead" style="text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.7);">Experience the comfort and style of our modern apartments designed for contemporary living.</p>
                                <div class="d-grid gap-2 d-md-flex justify-content-md-start mb-4">
                                    <a href="apartments.php" class="btn btn-primary btn-lg px-4 me-md-2">Explore Apartments</a>
                                    <a href="contact.php" class="btn btn-outline-light btn-lg px-4">Schedule a Tour</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item" style="height: 80vh; min-height: 500px;">
                <img src="/Project/src/images/Executive-5-1.jpg" class="d-block w-100 h-100 object-fit-cover" alt="Apartment amenities">
                <div class="carousel-caption d-flex h-100 align-items-center" style="background: rgba(0, 0, 0, 0.4); top: 0; bottom: 0; left: 0; right: 0;">
                    <div class="container">
                        <div class="row justify-content-start text-start">
                            <div class="col-lg-6">
                                <h1 class="display-4 fw-bold" style="text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.7);">Premium Amenities</h1>
                                <p class="lead" style="text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.7);">Enjoy our state-of-the-art facilities including fitness centers, pools, and community spaces.</p>
                                <div class="d-grid gap-2 d-md-flex justify-content-md-start mb-4">
                                    <a href="about.php" class="btn btn-primary btn-lg px-4 me-md-2">Learn More</a>
                                    <a href="contact.php" class="btn btn-outline-light btn-lg px-4">Contact Us</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</header>

<main>
    <!-- Featured Apartments -->
    <section class="py-5 bg-light">
        <div class="container">
            <h2 class="text-center mb-5">Featured Apartments</h2>
            <div class="row">
                <?php if ($result->num_rows > 0): ?>
                    <?php while ($apartment = $result->fetch_assoc()): ?>
                        <div class="col-md-4 mb-4">
                            <div class="card h-100 shadow-sm">
                                <img src="<?php echo $apartment['image_path']; ?>" class="card-img-top" alt="<?php echo htmlspecialchars($apartment['title']); ?>">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo htmlspecialchars($apartment['title']); ?></h5>
                                    <p class="card-text"><?php echo htmlspecialchars(substr($apartment['description'], 0, 100)) . '...'; ?></p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <span class="text-primary fw-bold">$<?php echo number_format($apartment['price']); ?>/month</span>
                                        <span class="badge <?php echo $apartment['status'] === 'available' ? 'bg-success' : 'bg-warning text-dark'; ?>">
                                            <?php echo $apartment['status'] === 'available' ? 'Available Now' : 'Coming Soon'; ?>
                                        </span>
                                    </div>
                                    <ul class="list-unstyled mt-3">
                                        <li><i class="fas fa-bed me-2"></i> <?php echo $apartment['bedrooms'] == 0 ? 'Studio' : $apartment['bedrooms'] . ' Bedrooms'; ?></li>
                                        <li><i class="fas fa-bath me-2"></i> <?php echo $apartment['bathrooms']; ?> Bathrooms</li>
                                        <li><i class="fas fa-ruler-combined me-2"></i> <?php echo number_format($apartment['area']); ?> sq ft</li>
                                    </ul>
                                </div>
                                <div class="card-footer bg-white border-top-0">
                                    <a href="apartment-details.php?id=<?php echo $apartment['apartment_id']; ?>" class="btn btn-outline-primary w-100">View Details</a>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                <?php else: ?>
                    <div class="col-12 text-center">
                        <p>No apartments available at this time. Please check back later.</p>
                    </div>
                <?php endif; ?>
            </div>
            <div class="text-center mt-4">
                <a href="apartments.php" class="btn btn-primary">View All Apartments</a>
            </div>
        </div>
    </section>

    <!-- Why Choose Us -->
    <section class="py-5">
        <div class="container">
            <h2 class="text-center mb-5">Why Choose The Next Apartment?</h2>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="text-center">
                        <div class="d-inline-flex align-items-center justify-content-center bg-primary text-white rounded-circle mb-3" style="width: 4rem; height: 4rem; font-size: 2rem;">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <h3>Prime Locations</h3>
                        <p>Our apartments are situated in the most desirable neighborhoods with easy access to transportation, shopping, and entertainment.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="text-center">
                        <div class="d-inline-flex align-items-center justify-content-center bg-primary text-white rounded-circle mb-3" style="width: 4rem; height: 4rem; font-size: 2rem;">
                            <i class="fas fa-star"></i>
                        </div>
                        <h3>Premium Amenities</h3>
                        <p>Enjoy modern amenities including fitness centers, rooftop terraces, swimming pools, and 24/7 security services.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="text-center">
                        <div class="d-inline-flex align-items-center justify-content-center bg-primary text-white rounded-circle mb-3" style="width: 4rem; height: 4rem; font-size: 2rem;">
                            <i class="fas fa-headset"></i>
                        </div>
                        <h3>Exceptional Service</h3>
                        <p>Our dedicated team provides responsive maintenance and support to ensure your living experience is always comfortable.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials -->
    <section class="py-5 bg-light">
        <div class="container">
            <h2 class="text-center mb-5">What Our Residents Say</h2>
            <div class="row">
                <div class="col-md-4 mb-4">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body">
                            <div class="d-flex mb-3">
                                <div class="text-warning">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                            </div>
                            <p class="card-text">"I've been living at The Next Apartment for over a year now, and I couldn't be happier. The location is perfect, and the staff is always helpful and responsive."</p>
                            <div class="d-flex align-items-center">
                                <img src="/Project/src/images/1 review.webp" class="rounded-circle me-3 w-25" alt="Resident">
                                <div>
                                    <h6 class="mb-0">Sarah Johnson</h6>
                                    <small class="text-muted">Downtown Loft Resident</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body">
                            <div class="d-flex mb-3">
                                <div class="text-warning">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
                                </div>
                            </div>
                            <p class="card-text">"The amenities are top-notch, and the community events make it easy to meet neighbors. I love the modern design and spacious layout of my apartment."</p>
                            <div class="d-flex align-items-center">
                                <img src="/Project/src/images/2 famile.jpeg" class="rounded-circle me-3 w-25" alt="Resident">
                                <div>
                                    <h6 class="mb-0">Michael Chen</h6>
                                    <small class="text-muted">Studio Apartment Resident</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body">
                            <div class="d-flex mb-3">
                                <div class="text-warning">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                            </div>
                            <p class="card-text">"Moving to The Next Apartment was the best decision for our family. The neighborhood is safe, and there are great schools nearby. The 3-bedroom layout is perfect for us."</p>
                            <div class="d-flex align-items-center">
                                <img src="/Project/src/images/3 famile.jpeg" class="rounded-circle me-3 w-25" alt="Resident">
                                <div>
                                    <h6 class="mb-0">The Rodriguez Family</h6>
                                    <small class="text-muted">Family Apartment Residents</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-center mt-4">
                <a href="reviews.php" class="btn btn-outline-primary">Read More Reviews</a>
            </div>
        </div>
    </section>

    <!-- Call to Action -->
    <section class="py-5 bg-primary text-white">
        <div class="container text-center">
            <h2 class="mb-4">Ready to Find Your Next Home?</h2>
            <p class="lead mb-4">Schedule a tour today and discover the perfect apartment for your lifestyle.</p>
            <a href="contact.php" class="btn btn-light btn-lg">Contact Us Now</a>
        </div>
    </section>
</main>

<?php include 'includes/footer.php'; ?>
