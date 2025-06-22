<?php
// Include database connection
require_once '../config/database.php';

// Start session
session_start();

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data and sanitize inputs
    $email = $conn->real_escape_string($_POST['signinEmail']);
    $password = $_POST['signinPassword'];
    $rememberMe = isset($_POST['rememberMe']) ? true : false;
    
    // Validate inputs
    $errors = [];
    
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Valid email is required";
    }
    
    if (empty($password)) {
        $errors[] = "Password is required";
    }
    
    // If no errors, check credentials
    if (empty($errors)) {
        $sql = "SELECT * FROM users WHERE email = '$email'";
        $result = $conn->query($sql);
        
        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();
            
            // Verify password
            if (password_verify($password, $user['password'])) {
                // Set user session
                $_SESSION['user_id'] = $user['user_id'];
                $_SESSION['user_name'] = $user['first_name'] . ' ' . $user['last_name'];
                $_SESSION['user_email'] = $user['email'];
                
                // Set remember me cookie if checked
                if ($rememberMe) {
                    $token = bin2hex(random_bytes(32));
                    setcookie('remember_token', $token, time() + (86400 * 30), "/"); // 30 days
                    
                    // Store token in database (you would need a tokens table for this)
                    // This is simplified for this example
                }
                
                $response = [
                    'status' => 'success',
                    'message' => 'Sign in successful!',
                    'redirect' => 'user-dashboard.php'
                ];
            } else {
                $response = [
                    'status' => 'error',
                    'message' => 'Invalid email or password'
                ];
            }
        } else {
            $response = [
                'status' => 'error',
                'message' => 'Invalid email or password'
            ];
        }
    } else {
        // Return validation errors
        $response = [
            'status' => 'error',
            'message' => 'Please correct the following errors:',
            'errors' => $errors
        ];
    }
    
    // Return JSON response
    header('Content-Type: application/json');
    echo json_encode($response);
    exit;
}
?>
