<?php
$pageTitle = "User Dashboard - The Next Apartment";
$currentPage = "dashboard";

// Include authentication check
include 'includes/auth_check.php';
include 'includes/header.php';

// Include database connection
require_once 'config/database.php';

// Get user data
$userId = $_SESSION['user_id'];
$sql = "SELECT * FROM users WHERE user_id = $userId";
$result = $conn->query($sql);
$user = $result->fetch_assoc();

// Get user's active applications
$appSql = "SELECT a.*, apt.title, apt.image_path FROM applications a 
           JOIN apartments apt ON a.apartment_id = apt.apartment_id 
           WHERE a.user_id = $userId AND a.status != 'rejected' AND a.status != 'cancelled'
           ORDER BY a.submitted_date DESC";
$appResult = $conn->query($appSql);

// Get user's favorites
$favSql = "SELECT f.*, apt.title, apt.price, apt.bedrooms, apt.bathrooms, apt.area, apt.status, apt.image_path 
           FROM favorites f 
           JOIN apartments apt ON f.apartment_id = apt.apartment_id 
           WHERE f.user_id = $userId
           ORDER BY f.created_at DESC
           LIMIT 3";
$favResult = $conn->query($favSql);

// Get user's complaints
$compSql = "SELECT * FROM complaints 
            WHERE user_id = $userId AND status != 'resolved'
            ORDER BY created_at DESC";
$compResult = $conn->query($compSql);

// Get recent activity
$activitySql = "SELECT 'application' as type, a.status, a.submitted_date as date, apt.title as title
                FROM applications a 
                JOIN apartments apt ON a.apartment_id = apt.apartment_id 
                WHERE a.user_id = $userId
                UNION
                SELECT 'favorite' as type, NULL as status, f.created_at as date, apt.title as title
                FROM favorites f
                JOIN apartments apt ON f.apartment_id = apt.apartment_id
                WHERE f.user_id = $userId
                UNION
                SELECT 'complaint' as type, c.status, c.created_at as date, c.type as title
                FROM complaints c
                WHERE c.user_id = $userId
                ORDER BY date DESC
                LIMIT 5";
$activityResult = $conn->query($activitySql);

// Get recommended apartments (not favorited by user)
$recSql = "SELECT * FROM apartments 
           WHERE apartment_id NOT IN (SELECT apartment_id FROM favorites WHERE user_id = $userId)
           AND status = 'available'
           ORDER BY RAND()
           LIMIT 3";
$recResult = $conn->query($recSql);
?>

<!-- User Dashboard Content -->
<div class="container py-5">
    <div class="row mb-4">
        <div class="col-md-8">
            <h1 class="mb-0">Welcome back, <?php echo htmlspecialchars($user['first_name']); ?>!</h1>
            <p class="text-muted">Here's what's happening with your apartment journey.</p>
        </div>
        <div class="col-md-4 text-md-end">
            <a href="#" class="btn btn-outline-primary me-2 position-relative">
                <i class="fas fa-bell"></i> Notifications
                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                    3
                    <span class="visually-hidden">unread notifications</span>
                </span>
            </a>
            <a href="#" class="btn btn-outline-primary position-relative">
                <i class="fas fa-envelope"></i> Messages
                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                    2
                    <span class="visually-hidden">unread messages</span>
                </span>
            </a>
        </div>
    </div>

    <!-- Status Cards -->
    <div class="row g-4 mb-5">
        <div class="col-md-3">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body text-center">
                    <div class="display-4 text-primary mb-3">
                        <i class="fas fa-file-alt"></i>
                    </div>
                    <h5 class="card-title">Application Status</h5>
                    <p class="card-text">
                        <?php 
                        if ($appResult->num_rows > 0) {
                            $app = $appResult->fetch_assoc();
                            echo ucfirst(str_replace('_', ' ', $app['status']));
                        } else {
                            echo "No Applications";
                        }
                        ?>
                    </p>
                    <a href="user-applications.php" class="btn btn-sm btn-outline-primary">View Details</a>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body text-center">
                    <div class="display-4 text-primary mb-3">
                        <i class="fas fa-calendar-check"></i>
                    </div>
                    <h5 class="card-title">Upcoming Tours</h5>
                    <p class="card-text">2 Scheduled</p>
                    <a href="#" class="btn btn-sm btn-outline-primary">View Schedule</a>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body text-center">
                    <div class="display-4 text-primary mb-3">
                        <i class="fas fa-heart"></i>
                    </div>
                    <h5 class="card-title">Saved Apartments</h5>
                    <p class="card-text"><?php echo $favResult->num_rows; ?> Favorites</p>
                    <a href="user-favorites.php" class="btn btn-sm btn-outline-primary">View Favorites</a>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body text-center">
                    <div class="display-4 text-primary mb-3">
                        <i class="fas fa-exclamation-circle"></i>
                    </div>
                    <h5 class="card-title">Open Complaints</h5>
                    <p class="card-text"><?php echo $compResult->num_rows; ?> Pending</p>
                    <a href="user-complaints.php" class="btn btn-sm btn-outline-primary">View Complaints</a>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-4">
        <!-- Recent Activity -->
        <div class="col-lg-8 mb-4">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white py-3">
                    <h5 class="card-title mb-0">Recent Activity</h5>
                </div>
                <div class="card-body">
                    <div class="list-group list-group-flush">
                        <?php if ($activityResult->num_rows > 0): ?>
                            <?php while ($activity = $activityResult->fetch_assoc()): ?>
                                <div class="list-group-item px-0 py-3 d-flex align-items-center border-top-0 border-start-0 border-end-0">
                                    <?php 
                                    $icon = '';
                                    $bgClass = '';
                                    $textClass = '';
                                    
                                    switch ($activity['type']) {
                                        case 'application':
                                            $icon = 'fa-file-alt';
                                            $bgClass = 'bg-success';
                                            $textClass = 'text-success';
                                            $title = "Application Submitted";
                                            $description = "Your application for {$activity['title']} has been received.";
                                            break;
                                        case 'favorite':
                                            $icon = 'fa-heart';
                                            $bgClass = 'bg-info';
                                            $textClass = 'text-info';
                                            $title = "Apartment Saved";
                                            $description = "You added {$activity['title']} to your favorites list.";
                                            break;
                                        case 'complaint':
                                            $icon = 'fa-exclamation-circle';
                                            $bgClass = 'bg-warning';
                                            $textClass = 'text-warning';
                                            $title = "Complaint Filed";
                                            $description = "You submitted a complaint regarding {$activity['title']}.";
                                            break;
                                    }
                                    
                                    // Calculate time ago
                                    $activityDate = new DateTime($activity['date']);
                                    $now = new DateTime();
                                    $interval = $now->diff($activityDate);
                                    
                                    if ($interval->d == 0) {
                                        if ($interval->h == 0) {
                                            $timeAgo = "Today";
                                        } else {
                                            $timeAgo = "Today";
                                        }
                                    } elseif ($interval->d == 1) {
                                        $timeAgo = "Yesterday";
                                    } elseif ($interval->d < 7) {
                                        $timeAgo = $interval->d . " days ago";
                                    } else {
                                        $timeAgo = $activityDate->format('M j, Y');
                                    }
                                    ?>
                                    <div class="<?php echo $bgClass; ?> bg-opacity-10 p-3 rounded-circle me-3">
                                        <i class="fas <?php echo $icon; ?> <?php echo $textClass; ?>"></i>
                                    </div>
                                    <div>
                                        <h6 class="mb-1"><?php echo $title; ?></h6>
                                        <p class="mb-0 text-muted small"><?php echo $description; ?></p>
                                    </div>
                                    <div class="ms-auto text-end">
                                        <span class="badge <?php echo $interval->d == 0 ? 'bg-primary' : 'bg-secondary'; ?>"><?php echo $timeAgo; ?></span>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                        <?php else: ?>
                            <div class="text-center py-4">
                                <p class="text-muted mb-0">No recent activity to display.</p>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="card-footer bg-white text-center">
                    <a href="#" class="btn btn-sm btn-link text-decoration-none">View All Activity</a>
                </div>
            </div>
        </div>

        <!-- Recommended Apartments -->
        <div class="col-lg-4 mb-4">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
                    <h5 class="card-title mb-0">Recommended For You</h5>
                    <a href="apartments.php" class="btn btn-sm btn-link text-decoration-none">View All</a>
                </div>
                <div class="card-body p-0">
                    <div class="list-group list-group-flush">
                        <?php if ($recResult->num_rows > 0): ?>
                            <?php while ($apartment = $recResult->fetch_assoc()): ?>
                                <a href="apartment-details.php?id=<?php echo $apartment['apartment_id']; ?>" class="list-group-item list-group-item-action p-3">
                                    <div class="row g-0">
                                        <div class="col-4">
                                            <img src="<?php echo $apartment['image_path']; ?>" class="img-fluid rounded" alt="<?php echo htmlspecialchars($apartment['title']); ?>">
                                        </div>
                                        <div class="col-8 ps-3">
                                            <h6 class="mb-1"><?php echo htmlspecialchars($apartment['title']); ?></h6>
                                            <p class="mb-1 small text-muted">
                                                <?php 
                                                echo $apartment['bedrooms'] == 0 ? 'Studio' : $apartment['bedrooms'] . ' bed';
                                                echo ' • ' . $apartment['bathrooms'] . ' bath';
                                                echo ' • $' . number_format($apartment['price']) . '/mo';
                                                ?>
                                            </p>
                                            <div class="text-warning small">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star-half-alt"></i>
                                                <span class="text-muted ms-1">4.5</span>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            <?php endwhile; ?>
                        <?php else: ?>
                            <div class="text-center py-4">
                                <p class="text-muted mb-0">No recommendations available at this time.</p>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <!-- Upcoming Tours -->
            <div class="card border-0 shadow-sm mt-4">
                <div class="card-header bg-white py-3">
                    <h5 class="card-title mb-0">Upcoming Tours</h5>
                </div>
                <div class="card-body">
                    <div class="d-flex align-items-center mb-3">
                        <div class="bg-primary bg-opacity-10 p-3 rounded me-3 text-center" style="min-width: 70px;">
                            <div class="fw-bold">MAY</div>
                            <div class="fs-4">15</div>
                        </div>
                        <div>
                            <h6 class="mb-1">Luxury Downtown Loft</h6>
                            <p class="mb-0 text-muted small">2:00 PM - 2:30 PM</p>
                        </div>
                        <div class="ms-auto">
                            <button class="btn btn-sm btn-outline-secondary">Reschedule</button>
                        </div>
                    </div>
                    <div class="d-flex align-items-center">
                        <div class="bg-primary bg-opacity-10 p-3 rounded me-3 text-center" style="min-width: 70px;">
                            <div class="fw-bold">MAY</div>
                            <div class="fs-4">18</div>
                        </div>
                        <div>
                            <h6 class="mb-1">Modern Studio Apartment</h6>
                            <p class="mb-0 text-muted small">10:00 AM - 10:30 AM</p>
                        </div>
                        <div class="ms-auto">
                            <button class="btn btn-sm btn-outline-secondary">Reschedule</button>
                        </div>
                    </div>
                </div>
                
                <div class="card-footer bg-white text-center">
                    <a href="#" class="btn btn-sm btn-primary">Schedule New Tour</a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>
