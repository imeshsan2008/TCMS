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

// Get the search term from the URL parameter
$search = isset($_GET['search']) ? $_GET['search'] : '';

// Query to fetch data
$sql = "SELECT  id,full_name FROM students WHERE full_name LIKE ?";
$stmt = $conn->prepare($sql);
$searchParam = "%$search%";
$stmt->bind_param("s", $searchParam);
$stmt->execute();
$result = $stmt->get_result();

// Fetch data
$data = array();
while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}

$stmt->close();
$conn->close();

echo json_encode($data);

