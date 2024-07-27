<?php 
include_once "../web_settings.php";
include "../db/db.php";
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_student'])) {
    $student_id = isset($_POST['student_id']) ? $_POST['student_id'] : '';
    $full_name = isset($_POST['full_name']) ? $_POST['full_name'] : '';
    $gender = isset($_POST['gender']) ? $_POST['gender'] : '';
    $birth_date = isset($_POST['birth_date']) ? $_POST['birth_date'] : '';
    $age = isset($_POST['age']) ? $_POST['age'] : '';
    $school = isset($_POST['school']) ? $_POST['school'] : '';
    $grade = isset($_POST['grade']) ? $_POST['grade'] : '';
    $home_address = isset($_POST['home_address']) ? $_POST['home_address'] : '';
    $custodian_name = isset($_POST['custodian_name']) ? $_POST['custodian_name'] : '';
    $custodian_phone = isset($_POST['custodian_phone']) ? $_POST['custodian_phone'] : '';
    $custodian_whatsapp = isset($_POST['custodian_whatsapp']) ? $_POST['custodian_whatsapp'] : '';
    $subjects_af_val = isset($_POST['subjects_af_val']) ? explode(',', $_POST['subjects_af_val']) : [];

    // Ensure subjects_af_val is an array before using implode
    if (!is_array($subjects_af_val)) {
        $subjects_af_val = [];
    }
    $subjects_name = implode(',', $subjects_af_val);

    // Prepare SQL query to update student data
    $sql = "UPDATE students SET 
                full_name = ?, 
                gender = ?, 
                birth_date = ?, 
                age = ?, 
                school = ?, 
                grade = ?, 
                home_address = ?, 
                custodian_name = ?, 
                custodian_phone = ?, 
                custodian_whatsapp = ?, 
                subjects_name = ?
            WHERE student_id = ?";

    // Use prepared statements to prevent SQL injection
    $stmt = $conn->prepare($sql);
    if ($stmt) {
        $stmt->bind_param('ssssssssssss', $full_name, $gender, $birth_date, $age, $school, $grade, $home_address, $custodian_name, $custodian_phone, $custodian_whatsapp, $subjects_name, $student_id);
        if ($stmt->execute()) {
            // Redirect to the form with a success message
            header("Location: $host_name/pages/students/manage student.php?success=SSU");
        } else {
            // Redirect to the form with an error message
            header("Location:  $host_name/pages/students/manage student.php?error=ESU");
        }
        $stmt->close();
    } else {
        // Redirect to the form with an error message
        header("Location:  $host_name/pages/students/manage student.php?error=ESU");
    }
}
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_subject_teacher'])) {
    # code...
}
?>