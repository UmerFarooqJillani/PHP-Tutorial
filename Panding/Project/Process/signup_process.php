<?php
// Include database connection
require_once '../config/database.php';

// Start session
session_start();

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data and sanitize inputs
    $firstName = $conn->real_escape_string($_POST['firstName']);
    $lastName = $conn->real_escape_string($_POST['lastName']);
    $email = $conn->real_escape_string($_POST['signupEmail']);
    $phone = $conn->real_escape_string($_POST['phone']);
    $password = $_POST['signupPassword'];
    $confirmPassword = $_POST['confirmPassword'];
    
    // Validate inputs
    $errors = [];
    
    if (empty($firstName)) {
        $errors[] = "First name is required";
    }
    
    if (empty($lastName)) {
        $errors[] = "Last name is required";
    }
    
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Valid email is required";
    }
    
    if (empty($phone)) {
        $errors[] = "Phone number is required";
    }
    
    if (empty($password)) {
        $errors[] = "Password is required";
    } elseif (strlen($password) < 8) {
        $errors[] = "Password must be at least 8 characters long";
    }
    
    if ($password !== $confirmPassword) {
        $errors[] = "Passwords do not match";
    }
    
    // Check if email already exists
    $checkEmail = "SELECT * FROM users WHERE email = '$email'";
    $result = $conn->query($checkEmail);
    
    if ($result->num_rows > 0) {
        $errors[] = "Email already exists. Please use a different email or sign in.";
    }
    
    // If no errors, insert into database
    if (empty($errors)) {
        // Hash password
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        
        $sql = "INSERT INTO users (first_name, last_name, email, phone, password) 
                VALUES ('$firstName', '$lastName', '$email', '$phone', '$hashedPassword')";
        
        if ($conn->query($sql) === TRUE) {
            // Set success message and user session
            $_SESSION['user_id'] = $conn->insert_id;
            $_SESSION['user_name'] = $firstName . ' ' . $lastName;
            $_SESSION['user_email'] = $email;
            
            $response = [
                'status' => 'success',
                'message' => 'Account created successfully!',
                'redirect' => 'user-dashboard.php'
            ];
        } else {
            // Set error message
            $response = [
                'status' => 'error',
                'message' => 'Error: ' . $conn->error
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
