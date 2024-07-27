<?php
include "../../include/db/db.php";


$sql = "SELECT * FROM subjects_teachers ORDER BY id_added_list DESC";
$result = $conn->query($sql);

$sub_teach = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $sub_teach[] = $row;
    }
}

echo json_encode($sub_teach);

$conn->close();
?>