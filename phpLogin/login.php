<?php
session_start();
ob_start();
require_once 'connect.php';

// Check if the user has submitted the form
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the email and password from the form
    $email = trim($_POST['user_email']);
    $pass = trim($_POST['user_pass']);

    // Check if the email and password are not empty
    if (!empty($email) && !empty($pass)) {
        // Query the database to check if the user exists
        $query = $connect->prepare("SELECT * FROM users WHERE user_email = ?");
        $query->bind_param('s', $email);
        $query->execute();
        $result = $query->get_result();

        // Check if the user exists
        if ($result->num_rows > 0) {
            // Get the user data from the database
            $user_data = $result->fetch_assoc();

            // Check if the password is correct
            if (password_verify($pass, $user_data['user_pass'])) {
                
                // Redirect the user to the dashboard
                $_SESSION['user_id'] = $user_data['user_id'];
                ob_end_clean();
              
                header('Location: ' . $_SERVER['HTTP_REFERER']);
                exit;
            } else {
                // Display an error message if the password is incorrect
                echo 'Invalid password';
            }
        } else {
            // Display an error message if the user does not exist
            echo 'User not found';
        }
    } else {
        // Display an error message if the email or password is empty
        echo 'Please fill in all fields';
    }
}
?>