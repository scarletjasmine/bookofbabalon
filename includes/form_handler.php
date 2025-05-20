<?php
// Starting the session to maintain state
session_start();

// Only process POST requests
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Initialize variables to store validation errors and form data
    $errors = [];
    $old_input = [];
    
    // Get form inputs and sanitize them
    $name = isset($_POST['name']) ? trim($_POST['name']) : '';
    $email = isset($_POST['email']) ? trim($_POST['email']) : '';
    $message = isset($_POST['message']) ? trim($_POST['message']) : '';
    
    // Store inputs for repopulating the form if there are errors
    $old_input = [
        'name' => $name,
        'email' => $email,
        'message' => $message
    ];
    
    // Validate name (required, at least 2 characters)
    if (empty($name)) {
        $errors['name'] = "Name is required";
    } elseif (strlen($name) < 2) {
        $errors['name'] = "Name must be at least 2 characters long";
    }
    
    // Validate email (required, valid format)
    if (empty($email)) {
        $errors['email'] = "Email is required";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Please enter a valid email address";
    }
    
    // Validate message (required, at least 10 characters)
    if (empty($message)) {
        $errors['message'] = "Message is required";
    } elseif (strlen($message) < 10) {
        $errors['message'] = "Message must be at least 10 characters long";
    }
    
    // Process form if there are no errors
    if (empty($errors)) {
        // In a real application, you would:
        // 1. Store data in a database
        // 2. Send an email notification
        // 3. Perform other necessary actions
        
        // For this example, we'll just set a success flag
        $_SESSION['form_submission'] = [
            'success' => true
        ];
    } else {
        // Store errors and old input in session to display on the form
        $_SESSION['form_submission'] = [
            'success' => false,
            'errors' => $errors,
            'old_input' => $old_input
        ];
    }
    
    // Redirect back to the contact page
    header("Location: ../contact.php");
    exit;
} else {
    // If not a POST request, redirect to the homepage
    header("Location: ../index.php");
    exit;
}
?>
