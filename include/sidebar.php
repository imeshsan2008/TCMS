<?php 


include "web_settings.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>



</head>
<body>


<style>
    a:hover{
        text-decoration: none;
    }
    .dropdown {
        position: relative;
    }

    .dropdown-container {
        display: none;
        position: relative;
        background-color: #f9f9f9;
    }

    .dropdown-container a {
        color: black;
        text-decoration: none;
        display: block;
    }

    .dropdown-container a:hover {
        background-color: #f1f1f1;
    }

    /* Animation */
    @keyframes fade-in {
        from {
            opacity: 0;
        }

        to {
            opacity: 1;
        }
    }

    .dropdown-container.show {
        animation: fade-in 0.3s ease-in-out;
        display: block;
    }
</style>

<!-- SIDEBAR -->
<section id="sidebar">
    <a href="#" class="brand">
        <i class='bx bxs-smile'style="opacity:0%;"></i>
        <span class="text"><?php echo $websitename; ?> </php></span>
    </a>
    <ul class="side-menu top">
        <li id="dashboard">
            <a href="<?php echo $host_name; ?>">
                <i class='bx bxs-dashboard'></i>
                <span class="text">Dashboard</span>
            </a>
        </li>
        <li id="students" onclick="toggleDropdown('studentsDropdown')">
            <a href="#">
                <i class='bx bxs-group'></i>
                <span class="text">Students</span>
                <i class='bx bx-chevron-down dropdown-icon'></i>
            </a>
        </li>
        <ul class="dropdown-container " id="studentsDropdown">
            <li><a href="<?php echo $host_name; ?>pages/students/Add_student"><i class='bx bxs-user-plus'></i><span class="text">Add Student</span></a></li>
            <li><a href="<?php echo $host_name; ?>pages/students/Manage Student.php"><i class='bx bxs-user'></i><span class="text">Manage Students</span></a></li>
        </ul>
        <li id="class_schedule" onclick="toggleDropdown('classScheduleDropdown')">
            <a href="#">
                <i class='bx bxs-doughnut-chart'></i>
                <span class="text">Class Schedule</span>
                <i class='bx bx-chevron-down dropdown-icon'></i>
            </a>
        </li>
        <ul class="dropdown-container" id="classScheduleDropdown">
            <li><a href="<?php echo $host_name; ?>"><i class='bx bxs-user-plus'></i><span class="text">Add Schedule</span></a></li>
            <li><a href="<?php echo $host_name; ?>"><i class='bx bxs-user'></i><span class="text">Manage Schedules</span></a></li>
        </ul>

        <li id="exam_result"  onclick="toggleDropdown('exam_resultDropdown')">
            <a href="#">
                <i class='bx bxs-group'></i>
                <span class="text">Exam Result</span>
                <i class='bx bx-chevron-down dropdown-icon'></i>
            </a>
        </li>
        <ul class="dropdown-container" id="exam_resultDropdown">
            <li><a href="<?php echo $host_name; ?>"><i class='bx bxs-user-plus'></i><span class="text">Add Schedule</span></a></li>
            <li><a href="<?php echo $host_name; ?>"><i class='bx bxs-user'></i><span class="text">Manage Schedules</span></a></li>
        </ul>


        <li id="Class_Fee"  onclick="toggleDropdown('Class_FeeDropdown')">
            <a href="#">
                <i class='bx bxs-message-dots'></i>
                <span class="text">Class Fee</span>
                <i class='bx bx-chevron-down dropdown-icon'></i>
            </a>
        </li>
        <ul class="dropdown-container" id="Class_FeeDropdown">
            <li><a href="<?php echo $host_name; ?>"><i class='bx bxs-user-plus'></i><span class="text">Add Schedule</span></a></li>
            <li><a href="<?php echo $host_name; ?>"><i class='bx bxs-user'></i><span class="text">Manage Schedules</span></a></li>
        </ul>
        
        <li id="subject" onclick="toggleDropdown('subjectDropdown')">
            <a href="#">
                <i class='bx bxs-group'></i>
                <span class="text">Teachers And Subject</span>
                <i class='bx bx-chevron-down dropdown-icon'></i>
            </a>
        </li>
        <ul class="dropdown-container" id="subjectDropdown">
            <li><a href="<?php echo $host_name; ?>/pages/teachers&subject/add.php"><i class='bx bxs-user-plus'></i><span class="text">Add Teacher And Subject</span></a></li>
            <li><a href="<?php echo $host_name; ?>/pages/teachers&subject/manage.php"><i class='bx bxs-user'></i><span class="text">Manage Teacher And Subject</span></a></li>
        </ul>
    </ul>

    <ul class="side-menu">
        <li>
            <a href="#">
                <i class='bx bxs-cog'></i>
                <span class="text">Settings</span>
            </a>
        </li>
        <li>
            <a href="#" class="logout">
                <i class='bx bxs-log-out-circle'></i>
                <span class="text">Logout</span>
            </a>
        </li>
    </ul>
    <?php  include "alerts.php"; ?>

</section>
<!-- SIDEBAR -->

<!-- CONTENT -->
<section id="content">
    <!-- NAVBAR -->
    <nav>
        
        <i class='bx bx-menu'></i>
        <form action="#">
            <div class="form-input">
                <input type="search" placeholder="Search..." id="search_to">
                <button type="submit" class="search-btn"><i class='bx bx-search'></i></button>
            </div>
        </form>
        <input type="checkbox" id="switch-mode" hidden>
        <label for="switch-mode" class="switch-mode"></label>
        <a href="#" class="notification">
            <i class='bx bxs-bell'></i>
            <span class="num">0</span>
        </a>
        <a href="#" class="profile">
            <img src="img/people.png">
        </a>
    </nav>
    <!-- NAVBAR -->

    <!-- MAIN -->
    <!-- MAIN -->
</section>

<script>
    function toggleDropdown(id) {
        // Get all dropdown containers
        var dropdowns = document.getElementsByClassName('dropdown-container');
        
        // Close all dropdowns
        for (var i = 0; i < dropdowns.length; i++) {
            if (dropdowns[i].id !== id) {
                dropdowns[i].classList.remove('show');
            }
        }
        
        // Toggle the selected dropdown
        var dropdownContainer = document.getElementById(id);
        dropdownContainer.classList.toggle('show');
    }
</script>

</body>
</html>