<?php
include "../../include/web_settings.php";

include "../../include/db/db.php";


// Fetch student data to be updated
$student_id = isset($_GET['student_id']) ? $_GET['student_id'] : '';

if ($student_id) {
    $sql = "SELECT * FROM students WHERE student_id = '$student_id'";
    $result = $conn->query($sql);
    $student = $result ? $result->fetch_assoc() : null;
} else {
    $student = null;
}

// Query to fetch grades
$sql_grades = "SELECT id, grade FROM grade";
$grades_result = $conn->query($sql_grades);

// Query to fetch subjects
$sql_subjects = "SELECT id_added_list, subject_name FROM subjects_teachers";
$subjects_result = $conn->query($sql_subjects);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="../../include/css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/choices.js@9.0.1/public/assets/styles/choices.min.css"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/choices.js@9.0.1/public/assets/scripts/choices.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title>TCMS - Tuition Class Management System</title>
    <style>
        #update-student-submit-btn {
            position: relative;
            left: 940px;
        }
    </style>
</head>
<body>
<?php include "../../include/sidebar.php"; ?>

<section id="content">
    <main>
 

        <?php if ($student): ?>
        <form action="../../include/a_u_d/update.php" method="POST" id="studentForm" class="hide-scrollbar">
            <input type="hidden" name="student_id" value="<?php echo htmlspecialchars($student['student_id']); ?>">
            <div class="form-group">
                <label for="full_name">Full Name:</label>
                <input type="text" class="form-control P_ENTER"  id="full_name" name="full_name" value="<?php echo htmlspecialchars($student['full_name']); ?>" required>
            </div>
            <div class="form-group">
                <label for="gender">Gender:</label>
                <select class="form-control" id="gender" name="gender" required>
                    <option value="Male" <?php echo ($student['gender'] == 'Male') ? 'selected' : ''; ?>>Male</option>
                    <option value="Female" <?php echo ($student['gender'] == 'Female') ? 'selected' : ''; ?>>Female</option>
                </select>
            </div>
            <div class="form-group">
                <label for="birth_date">Birth of Date:</label>
                <input type="date" class="form-control" id="birth_date" name="birth_date" value="<?php echo htmlspecialchars($student['birth_date']); ?>" onchange="cal_age();" required>
            </div>
            <div class="form-group">
                <label for="age">Age:</label>
                <input type="text" class="form-control" id="age" name="age" value="<?php echo htmlspecialchars($student['age']); ?>" required readonly>
            </div>
            <div class="form-group">
                <label for="school">School:</label>
                <input type="text" class="form-control" id="school" name="school" value="<?php echo htmlspecialchars($student['school']); ?>" required>
            </div>
            <div class="form-group">
                <label for="grade">Grade:</label>
                <select class="form-control choices-single" id="grade" name="grade">
                    <?php while($row = $grades_result->fetch_assoc()): ?>
                        <option value="<?php echo $row["grade"]; ?>" <?php echo ($student['grade'] == $row["grade"]) ? 'selected' : ''; ?>><?php echo $row["grade"]; ?></option>
                    <?php endwhile; ?>
                    <option disabled  value="" class="select_grade">Select Grade</option>
                </select>
            </div>
            <div class="form-group">
                <label for="home_address">Home Address:</label>
                <input type="text" class="form-control" id="home_address" name="home_address" value="<?php echo htmlspecialchars($student['home_address']); ?>" required>
            </div>
            <div class="form-group">
                <label for="custodian_name">Custodian's Name:</label>
                <input type="text" class="form-control" id="custodian_name" name="custodian_name" value="<?php echo htmlspecialchars($student['custodian_name']); ?>" required>
            </div>
            <div class="form-group">
                <label for="custodian_phone">Custodian’s Phone Number:</label>
                <input type="number" class="form-control" id="custodian_phone" name="custodian_phone" value="<?php echo htmlspecialchars($student['custodian_phone']); ?>" oninput="hi(this.value)" required>
            </div>
            <div class="form-group">
                <label for="custodian_whatsapp">Custodian’s Whatsapp Number:</label>
                <input type="text" class="form-control" id="custodian_whatsapp" name="custodian_whatsapp" value="<?php echo htmlspecialchars($student['custodian_whatsapp']); ?>"  required>
            </div>
            <div class="form-group">
                <label for="subjects">Subjects:</label>
                <select class="form-control subjects" onchange="change_subject_name();" id="subjects" name="subjects_name" multiple required>
                    <?php while($subjects_row = $subjects_result->fetch_assoc()): ?>
                        <option value="<?php echo $subjects_row["subject_name"]; ?>" <?php echo (in_array($subjects_row["subject_name"], explode(',', $student['subject_name']))) ? 'selected' : ''; ?>><?php echo $subjects_row["subject_name"]; ?></option>
                    <?php endwhile; ?>
                    <option disabled value="">Select Subjects</option>
                </select>
                <input type="text" class="subjects_af_val" style="display:none;" name="subjects_af_val">
            </div>
            <br>
            <button type="submit" name="update_student" class="btn btn-primary" id="update-student-submit-btn">Update</button>
        </form>
        <?php else: ?>
            <div class="alert alert-danger" role="alert">
<script>location.href="manage student.php?error=NOSD"</script>
        </div>
        <?php endif; ?>
    </main>
</section>

<script>
    var input = document.querySelector("input");
input.addEventListener("keypress", function(event) {
  if (event.key === "Enter") {
    event.preventDefault();
    document.getElementById("update-student-submit-btn").click();
  }
});
    new Choices(document.querySelector(".choices-single"));
    new Choices(document.querySelector(".subjects"));

    function cal_age() {
        const birthdayInput = document.getElementById('birth_date').value;
        const birthday = new Date(birthdayInput);
        const today = new Date();

        let years = today.getFullYear() - birthday.getFullYear();
        let months = today.getMonth() - birthday.getMonth();
        let days = today.getDate() - birthday.getDate();

        if (days < 0) {
            months--;
            days += new Date(today.getFullYear(), today.getMonth(), 0).getDate();
        }

        if (months < 0) {
            years--;
            months += 12;
        }

        const result = `${years} years, ${months} months, and ${days} days old.`;
        document.getElementById('age').value = result;
    }

    function hi(val) {
        document.querySelector('#custodian_whatsapp').value = val;
    }
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

</body>
</html>

<?php
// Close the database connection
if ($conn) {
    $conn->close();
}
?>
