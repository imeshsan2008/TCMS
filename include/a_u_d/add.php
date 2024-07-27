<?php 

include_once "../web_settings.php";
include "../db/db.php";

if (isset($_POST['add_student'])) {
    $full_name = $_POST['full_name'];
    $age = $_POST['age'];
    $custodian_name = $_POST['custodian_name'];
    $school = $_POST['school'];
    $birth_date = $_POST['birth_date'];
    $gender = $_POST['gender'];
    $home_address = $_POST['home_address'];
    $custodian_whatsapp = $_POST['custodian_whatsapp'];
    $custodian_phone = $_POST['custodian_phone'];
    $grade = $_POST['grade'];
    $subject = $_POST['subject_name'];
    $student_id = $_POST['student_id'];


    
    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO students (full_name, age, custodian_name, school, birth_date, gender, home_address, custodian_phone, custodian_whatsapp, grade, subjects_name, student_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssssssss", $full_name, $age, $custodian_name, $school, $birth_date, $gender, $home_address, $custodian_phone, $custodian_whatsapp, $grade, $subject, $student_id);

    // Execute the statement
    if ($stmt->execute() === TRUE) {
        // Redirect to the form page with success parameter
        header("Location: $host_name/pages/students/add_student.php?success=SSA");
        exit();
    } else {      header("Location: $host_name/pages/students/add_student.php?error=ESA");
        exit();
    }

    // Close the statement
    $stmt->close();
}




if (isset($_POST['BAST'])) {
    $subject_name = $_POST['subject_name'];
   $sub_id =  $_POST['subject_id'];

   $teach_id = $_POST['teacher_id'];

    $teacher_name = $_POST['teacher_name'];


    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO subjects_teachers (subject_id,subject_name,teacher_id,teacher_name) VALUES ( ?, ?, ?, ?)");
    $stmt->bind_param("ssss", $sub_id, $subject_name, $teach_id, $teacher_name,);

    // Execute the statement
    if ($stmt->execute() === TRUE) {
        header("Location: $host_name/pages/teachers&subject/add.php?success=SSTA");
    } else {
        header("Location: add.php?error=ESA");
    }

    // Close the statement
    $stmt->close();
}


// Close the connection
$conn->close();

?>