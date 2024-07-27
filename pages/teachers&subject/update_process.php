<?php 

include "../../include/db/db.php";

$subject_id = $_POST['subject_id'];
$subject_name = $_POST['teacher_name'];
$teacher_name = $_POST['subject_name'];




$sql = "UPDATE subjects_teachers SET subject_name = '$subject_name',teacher_name='$teacher_name' WHERE subject_id=$subject_id";

if($conn->query($sql) === TRUE){
	header("Location: manage.php?success=2", true, 301);
	exit();}
else{	header("Location: manage.php?error=2", true, 301);

}

$conn->close();