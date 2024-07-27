
<?php 
include "../../include/db/db.php";

$subject_id = $_GET['subject_id'];

$sql = "SELECT * FROM subjects_teachers WHERE subject_id='$subject_id'LIMIT 1";
$result = $conn->query($sql);
if($result->num_rows > 0){

    while($row = $result->fetch_assoc()){
//output data

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

        <form action="../../include/a_u_d/update.php" method="POST" id="studentForm" class="hide-scrollbar">
            <div class="form-group" style="display:none;">
                <label for="subject_id">Subject ID:</label>
                <input type="text" class="form-control" id="subject_id" name="subject_id" value="<?php echo htmlspecialchars($row['subject_id']); ?>" readonly>
            </div>
            <div class="form-group">
                <label for="subject_name">Subject Name:</label>
                <input type="text" class="form-control" id="subject_name" name="subject_name" value="<?php echo htmlspecialchars($row['subject_name']); ?>"  required>
            </div>
            <div class="form-group" style="display:none;">
                <label for="teacher_id">Teacher Id:</label>
                <input type="text" class="form-control" id="teacher_id" name="teacher_id" readonly value="" required>
            </div>
            <div class="form-group">
                <label for="teacher_name">Teacher Name:</label>
                <input type="text" class="form-control" id="teacher_name" name="teacher_name" value="<?php echo htmlspecialchars($row['teacher_name']); ?>" required>
            </div>
            <?php 
}

}else {
    echo "0";
}

?> 
            <!-- <div class="form-group">
                <label for="note">Note:</label>
                <input type="text" class="form-control" id="note" name="note" required>
            </div> -->
         
            <br>
            <button type="submit" name="update_subject_teacher" class="btn btn-primary" id="add">Update</button>
        </form>
    </main>
</section>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="../../include/js/script.js"></script>


</body>
</html>
