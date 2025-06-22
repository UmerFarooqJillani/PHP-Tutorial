<?php
// Include database connection
require_once '../config/database.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data and sanitize inputs
    $firstName = $conn->real_escape_string($_POST['firstName']);
    $lastName = $conn->real_escape_string($_POST['lastName']);
    $email = $conn->real_escape_string($_POST['email']);
    $phone = $conn->real_escape_string($_POST['phone']);
    $subject = $conn->real_escape_string($_POST['subject']);
    $message = $conn->real_escape_string($_POST['message']);
    $newsletter = isset($_POST['newsletter']) ? 1 : 0;
    
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
    
    if (empty($subject)) {
        $errors[] = "Subject is required";
    }
    
    if (empty($message)) {
        $errors[] = "Message is required";
    }
    
    // If no errors, insert into database
    if (empty($errors)) {
        $sql = "INSERT INTO contact_messages (first_name, last_name, email, phone, subject, message, newsletter_signup) 
                VALUES ('$firstName', '$lastName', '$email', '$phone', '$subject', '$message', $newsletter)";
        
        if ($conn->query($sql) === TRUE) {
            // Set success message
            $response = [
                'status' => 'success',
                'message' => 'Thank you for your message! We will get back to you soon.'
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
