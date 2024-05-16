<?php
// subscribe.php

// Check if email is set and not empty
if (isset($_POST['email']) && !empty($_POST['email'])) {
  // Get the email from POST data
  $email = $_POST['email'];

  // Insert the email into the database
  // Replace 'your_database_info' with your actual database connection details
  $conn= new mysqli('localhost','root','','alumni');
  if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
  }

  // Prepare and execute SQL statement to insert the email
  $stmt = $conn->prepare('INSERT INTO subscribe_letter (email) VALUES (?)');
  $stmt->bind_param('s', $email);
  if ($stmt->execute()) {
    echo 'success'; // Send success response to AJAX
  } else {
    echo 'error'; // Send error response to AJAX
  }

  // Close statement and connection
  $stmt->close();
  $conn->close();
}
?>
