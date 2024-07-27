<?php
include "../../include/db/db.php";

$student_id = isset($_GET['student_id']) ? $_GET['student_id'] : '';
$sql = "SELECT * FROM STUDENTS WHERE student_id='$student_id'";

// Fetch student data
$result = $conn->query($sql);

$students = array();

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $students[] = $row;
    }
} else {
    echo "0 results";
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <!-- My CSS -->
    <link rel="stylesheet" href="../../include/css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/choices.js@9.0.1/public/assets/styles/choices.min.css"/>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/choices.js@9.0.1/public/assets/scripts/choices.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <title>TCMS - Tuition Class Management System</title>
</head>
<body>

<?php include "../../include/sidebar.php"; ?>

<!-- CONTENT -->
<section id="content">
    <main>


        <!-- ========== Start Profile Section ========== -->
        <div class="container">
        <a href="manage student.php"><i class="bx bxs-left-arrow-alt"></i> Back </a>

            <div class="row">
                <?php foreach ($students as $student): ?>
                <div class="col-md-4">
                    <div class="card">
                        <img src="https://via.placeholder.com/150" class="card-img-top" alt="Profile Picture">
                        <div class="card-body">
                            <h5 class="card-title"><?= $student['full_name'] ?></h5>
                            <p class="card-text"><?= $student['full_name'] ?></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Profile Details</h5>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item"><strong>Gender:</strong> <?= $student['gender'] ?></li>
                                <li class="list-group-item"><strong>Birth of Date:</strong> <?= $student['birth_date'] ?></li>
                                <li class="list-group-item"><strong>Age:</strong> <?= $student['age'] ?></li>
                                <li class="list-group-item"><strong>School:</strong> <?= $student['school'] ?></li>
                                <li class="list-group-item"><strong>Grade:</strong> <?= $student['grade'] ?></li>
                                <li class="list-group-item"><strong>Home Address:</strong> <?= $student['home_address'] ?></li>
                                <li class="list-group-item"><strong>Custodian's Name:</strong> <?= $student['custodian_name'] ?></li>
                                <li class="list-group-item"><strong>Custodian’s Phone Number:</strong> <?= $student['custodian_phone'] ?></li>
                                <li class="list-group-item"><strong>Custodian’s Whatsapp Number:</strong> <?= $student['custodian_whatsapp'] ?></li>
                                <li class="list-group-item"><strong>Subjects:</strong> <?= $student['subjects_name'] ?></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
        <!-- ========== End Profile Section ========== -->
    </main>
</section>
<!-- CONTENT -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="../../include/js/script.js"></script>

</body>
</html>
