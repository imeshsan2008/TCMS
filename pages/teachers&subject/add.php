<?php

 include "../../include/web_settings.php";

 include "../../include/db/db.php";


$sql = "SELECT subject_id,teacher_id FROM subjects_teachers ORDER BY id_added_list DESC LIMIT 1";  // Replace 'your_table_name' with your actual table name
$result = $conn->query($sql);


if ($result->num_rows > 0) {
    // Fetch the last record
    $last_record = $result->fetch_assoc();

$subject_id = $last_record["subject_id"] +1;
$teacher_id = $last_record["teacher_id"] +1;

}else {
    $subject_id = "1";
    $teacher_id = "1";

}
// Query to fetch data
$sql = "SELECT id, grade FROM grade";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
  <link rel="stylesheet" href="../../include/css/style.css">
  <link rel="stylesheet" href="../../include/css/boot.css">  
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/choices.js@9.0.1/public/assets/styles/choices.min.css"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/choices.js@9.0.1/public/assets/scripts/choices.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title> TCMS - Tuition Class Management System</title>
    <style>
#add{
    position: relative;
    left: 940px;
}    </style>
</head>
<body>
<?php include "../../include/sidebar.php"; ?>

<section id="content">
    <main>
    
<form action="../../include/a_u_d/add.php" method="POST" id="studentForm" class="hide-scrollbar">
            <div class="form-group" style="display:none;">
                <label for="subject_id">Subject ID:</label>
                <input type="text" class="form-control" id="subject_id" name="subject_id" value="<?php echo $subject_id; ?>" readonly>
            </div>
            <div class="form-group">
                <label for="subject_name">Subject Name:</label>
                <input type="text" class="form-control" id="subject_name" name="subject_name"  required>
            </div>
            <div class="form-group" style="display:none;">
                <label for="teacher_id">Teacher Id:</label>
                <input type="text" class="form-control" id="teacher_id" name="teacher_id" readonly value="<?php echo $teacher_id; ?>" required>
            </div>
            <div class="form-group">
                <label for="teacher_name">Teacher Name:</label>
                <input type="text" class="form-control" id="teacher_name" name="teacher_name" required>
            </div>
          
            <!-- <div class="form-group">
                <label for="note">Note:</label>
                <input type="text" class="form-control" id="note" name="note" required>
            </div> -->
          
            <br>
            <button type="submit" name="BAST" class="btn btn-primary" id="add">Submit</button>
        </form>
    </main>
</section>

<script>
    new Choices(document.querySelector(".choices-single"));

    function change_subject_name() {
        let subjects_af_val = document.querySelector('.subjects_af_val');
        const selectedValues = [];
        const selectElement = document.getElementById('subjects');
        for (const option of selectElement.options) {
            if (option.selected) {
                selectedValues.push(option.value || option.text);
            }
        }

        if (selectedValues.length === 0) {
            console.warn('No options selected.');
        } else {
            subjects_af_val.value = selectedValues;
        }
    }
</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="../../include/js/script.js"></script>

<?php 
} else {
    header("refresh:5;url=grade.php");
    echo "<p>please add grades  You will be redirected in 5 seconds. If not, <a href='grade.php'>click here</a>.</p>";}
$conn->close();
?>
</body>
</html>
