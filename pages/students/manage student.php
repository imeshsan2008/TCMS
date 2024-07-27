<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TCMS - Tuition Class Management System</title>
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="../../include/css/style.css">
    <link rel="stylesheet" href="../../include/css/boot.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
    <style>
        .table-responsive {
            height: 100%;
            overflow-y: hidden;
        }
        thead th {
            position: sticky;
            top: 0;
            background-color: #f8f9fa;
        }
        table {
            width: 100%;
            table-layout: auto;
            white-space: nowrap;
        }
        .action-buttons .btn {
            margin-right: 5px;
        }
        .col-12 {
            overflow-y: hidden;
        }
        .search {
            position: static;
            top: 0;
        }	
        .space {
            margin-right: 10px;
        }
    </style>
</head>
<body>
<?php include "../../include/sidebar.php"; ?>

<section id="content">
    <main>
       

        <div class="container mt-4">
            <div class="row">
                <div class="col-12">
                    <h2 id="t">Student List</h2>
                    <input class="form-control mb-4 search" id="searchInput" type="text" placeholder="Enter Student Id Or Full Name" autofocus>

                    <div class="table-responsive">
                        <table class="table table-striped table-hover" id="studentTable">
                            <thead>
                                <tr>
                                    <th>Student ID</th>
                                    <th>Full Name</th>
                                    <th>Birth Date</th>
                                    <th>Age</th>
                                    <th>Gender</th>
                                    <th>Custodian Phone Number</th>
                                    <th>Custodian Whatsapp</th>
                                    <th>Subjects</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <!-- Data will be inserted here by JavaScript -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>
</section>

<!-- Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Confirm Delete</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete this student?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger" id="confirmDeleteBtn">Delete</button>
            </div>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="../../include/js/script.js"></script>
<script>
    $(document).ready(function() {
        var table = $('#studentTable').DataTable({
            paging: true,
            scrollX: true,
            searching: false,
            info: true,
            responsive: true,
            autoWidth: false,
            order: []
        });

        // Fetch and update data every 10 seconds
        function fetchAndUpdateData() {
            $.ajax({
                url: 'fetch_students.php',
                method: 'GET',
                dataType: 'json',
                success: function(data) {
                    table.clear().draw();
                    data.forEach(function(student) {
                        table.row.add([
                            student.student_id,
                            student.full_name,
                            student.birth_date,
                            student.age,
                            student.gender,
                            student.custodian_phone,
                            '<a target="_blank" href="https://wa.me/94' + student.custodian_phone + '"><i class="bx bx-whatsapp"></i>' + student.custodian_phone + '</a>',
                            student.subjects_name,
                            '<a class="btn btn-info btn-sm space" href="profile.php?student_id=' + student.student_id + '"><i class="bx bx-show"></i> View</a>' +
                            '<a class="btn btn-warning btn-sm space" href="update_student.php?student_id=' + student.student_id + '"><i class="bx bx-edit"></i> Update</a>' +
                            '<button class="btn btn-danger btn-sm space deleteBtn" data-id="' + student.id + '"><i class="bx bx-trash"></i> Delete</button>'
                        ]).draw();
                    });
                }
            });
        }

        fetchAndUpdateData();
        // setInterval(fetchAndUpdateData, 10000); // Update every 10 seconds

        // Delete button handling
        $('#studentTable').on('click', '.deleteBtn', function() {
            var studentId = $(this).data('id');
            $('#confirmDeleteBtn').data('id', studentId);
            $('#deleteModal').modal('show');
        });

        // Confirm delete action
        $('#confirmDeleteBtn').on('click', function() {
            var studentId = $(this).data('id');
            $.ajax({
                url: '../../include/a_u_d/delete.php',
                method: 'POST',
                data: { id: studentId },
                success: function(response) {
                    if (response === 'success') {
                  
                        location.href="?success=SSD";

                    } else {
                        location.href="?error=ESD";
                    }
                },
                error: function(error) {
                    location.href="?error=ESD";
                }
            });
        });

        // Function to dynamically show alert
        function showAlert(message, type) {
            var alertHtml = '<div class="alert alert-' + type + '" role="alert">' + message + '</div>';
            $('main').prepend(alertHtml);
            $(".alert").fadeTo(2000, 500).delay(10000).slideUp(500, function() {
                $(this).remove();
            });
        }

        // Search student
        $('#searchInput').on('keyup', function() {
            var search_value = $(this).val();
            $.ajax({
                url: 'search.php',
                method: 'GET',
                data: { search_value: search_value },
                success: function(response) {
                    var data = JSON.parse(response);
                    table.clear().draw();
                    data.forEach(function(student) {
                        table.row.add([
                            student.student_id,
                            student.full_name,
                            student.birth_date,
                            student.age,
                            student.gender,
                            student.custodian_phone,
                            '<a target="_blank" href="https://wa.me/94' + student.custodian_phone + '"><i class="bx bx-whatsapp"></i>' + student.custodian_phone + '</a>',
                            student.subjects_name,
                            '<a class="btn btn-info btn-sm space" href="profile.php?student_id=' + student.student_id + '"><i class="bx bx-show"></i> View</a>' +
                            '<a class="btn btn-warning btn-sm space" href="update_student.php?student_id=' + student.student_id + '"><i class="bx bx-edit"></i> Update</a>' +
                            '<button class="btn btn-danger btn-sm space deleteBtn" data-id="' + student.id + '"><i class="bx bx-trash"></i> Delete</button>'
                        ]).draw();
                    });
                }
            });
        });
    });
</script>
</body>
</html>
