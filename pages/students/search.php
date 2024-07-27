<?php
include "../../include/db/db.php";

// Get the search term from the URL parameter
$search = isset($_GET['search_value']) ? $_GET['search_value'] : '';

// Query to fetch data
$sql = "SELECT * FROM students WHERE full_name  LIKE  ? OR student_id LIKE ?";
$stmt = $conn->prepare($sql);
$searchParam = "%$search%";
$student_id = "%$search%";

$stmt->bind_param("ss", $searchParam ,$student_id);
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
?>
