<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tcms";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get selected item
$selectedItem = $_POST['selected-item'];
echo "Selected item ID: " . $selectedItem . "<br>";

// Get new input fields
if (isset($_POST['new-inputs'])) {
    foreach ($_POST['new-inputs'] as $input) {
        echo "New input: " . htmlspecialchars($input) . "<br>";
    }
}

$conn->close();
?>
