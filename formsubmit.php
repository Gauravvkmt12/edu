<?php
include "connection.php";

// Function to sanitize input
function sanitize_input($data) {
    return htmlspecialchars(stripslashes(trim($data)));
}

// Function to validate email
function is_valid_email($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

// Function to validate phone number
function is_valid_phone($phone) {
    // Assuming phone number should be 10 digits
    return preg_match('/^[0-9]{10}$/', $phone);
}

// Function to validate name
function is_valid_name($name) {
    // Assuming name should only contain letters and whitespace
    return preg_match('/^[a-zA-Z\s]+$/', $name);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and validate inputs
    $name = sanitize_input($_POST['name']);
    $email = sanitize_input($_POST['email']);
    $phone = sanitize_input($_POST['phone']);
    $subject = sanitize_input($_POST['subject']);
    $message = sanitize_input($_POST['message']);

    $errors = [];

    if (!is_valid_name($name)) {
        $errors[] = "Invalid name. Only letters and white space allowed.";
    }
    if (!is_valid_email($email)) {
        $errors[] = "Invalid email format.";
    }
    if (!is_valid_phone($phone)) {
        $errors[] = "Invalid phone number. It should be 10 digits.";
    }

    // If there are no validation errors, insert into database
    if (empty($errors)) {
        // Prepare and bind
        $stmt = $conn->prepare("INSERT INTO your_table_name (name, email, phone, subject, message) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $name, $email, $phone, $subject, $message);

        // Execute the statement
        if ($stmt->execute()) {
            // Redirect to thank you page
            header("Location: thankyou.php");
            exit();
        } else {
            echo "<script>alert('Error: " . $stmt->error . "'); window.location.href='index.php';</script>";
        }

        $stmt->close();
    } else {
        // Display validation errors in an alert and redirect
        $error_message = implode("\\n", $errors);
        echo "<script>alert('$error_message'); window.location.href='index.php';</script>";
    }
}

$conn->close();
?>
