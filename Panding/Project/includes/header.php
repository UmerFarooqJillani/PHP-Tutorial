<?php
// Start session if not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Check if user is logged in
$isLoggedIn = isset($_SESSION['user_id']);
$userName = $isLoggedIn ? $_SESSION['user_name'] : '';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $pageTitle ?? 'The Next Apartment'; ?></title>
    <link rel="shortcut icon" href="/Project/src/Favicon.ico" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="/Project/src/css/style.css">
</head>
<body>
    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
        <div class="container">
            <a class="navbar-brand" href="index.php">
                <img src="/Project/src/images/nestapt.spng_.png" alt="" width="55" height="55">
                The Next Apartment
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link <?php echo $currentPage === 'home' ? 'active' : ''; ?>" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo $currentPage === 'about' ? 'active' : ''; ?>" href="about.php">About</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle <?php echo in_array($currentPage, ['apartments', 'reviews']) ? 'active' : ''; ?>" href="#" role="button" data-bs-toggle="dropdown">
                            Services
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item <?php echo $currentPage === 'apartments' ? 'active' : ''; ?>" href="apartments.php">Apartments For Rent</a></li>
                            <li><a class="dropdown-item <?php echo $currentPage === 'reviews' ? 'active' : ''; ?>" href="reviews.php">Reviews</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo $currentPage === 'contact' ? 'active' : ''; ?>" href="contact.php">Contact Us</a>
                    </li>
                </ul>
                
                <?php if ($isLoggedIn): ?>
                <!-- User Dropdown -->
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" role="button" data-bs-toggle="dropdown">
                            <img src="/Project/src/images/John.png" class="rounded-circle me-2" alt="User" width="32" height="32">
                            <span><?php echo htmlspecialchars($userName); ?></span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item <?php echo $currentPage === 'dashboard' ? 'active' : ''; ?>" href="user-dashboard.php"><i class="fas fa-tachometer-alt me-2"></i>Dashboard</a></li>
                            <li><a class="dropdown-item <?php echo $currentPage === 'profile' ? 'active' : ''; ?>" href="user-profile.php"><i class="fas fa-user me-2"></i>My Profile</a></li>
                            <li><a class="dropdown-item <?php echo $currentPage === 'favorites' ? 'active' : ''; ?>" href="user-favorites.php"><i class="fas fa-heart me-2"></i>Favorites</a></li>
                            <li><a class="dropdown-item <?php echo $currentPage === 'applications' ? 'active' : ''; ?>" href="user-applications.php"><i class="fas fa-file-alt me-2"></i>My Applications</a></li>
                            <li><a class="dropdown-item <?php echo $currentPage === 'complaints' ? 'active' : ''; ?>" href="user-complaints.php"><i class="fas fa-exclamation-circle me-2"></i>Complaints</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="process/logout.php"><i class="fas fa-sign-out-alt me-2"></i>Logout</a></li>
                        </ul>
                    </li>
                </ul>
                <?php else: ?>
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link <?php echo $currentPage === 'signin' ? 'active' : ''; ?>" href="signin.php">Sign In/Sign Up</a>
                    </li>
                </ul>
                <?php endif; ?>
            </div>
        </div>
    </nav>
