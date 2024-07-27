<?php
include_once "../web_settings.php";
include "../db/db.php";

// Check if the ID is set in POST request
if (isset($_POST['id'])) {
    $studentId = $_POST['id'];

    // Prepare the SQL statement
    $stmt = $conn->prepare("DELETE FROM students WHERE id = ?");
    $stmt->bind_param("i", $studentId);

    // Execute the statement
    if ($stmt->execute()) {
echo "success";     
   
    } else {
        echo "error"; 
    }

    // Close the statement
    $stmt->close();
} else {
        echo "error"; 
}

// Close the connection
$conn->close();

