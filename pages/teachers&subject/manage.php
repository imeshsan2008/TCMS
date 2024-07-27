<?php 
 include "../../include/web_settings.php";


?>
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

		.alert-success {
			display: none;
		}

		.col-12 {
			overflow-y: hidden;
		}

		.search {
			position: static;
			top: 0;
		}
		/*****  *****/ .space{
			margin-right: 10px;
		} /***** End  *****/
		
	</style>
</head>

<body>
	<?php include "../../include/sidebar.php"; ?>

	<section id="content">
		<main>
			<!-- Alerts for success  messages -->
<?php if (isset($_GET['success']) && $_GET['success'] == 1): ?>
        <div class="alert alert-success" style="display:none;" id="success" role="alert">
            Subject added successfully!

        </div>
        <script>    setTimeout(() => {
                    $("#success").fadeIn();

                 }, 000);
                 setTimeout(() => {
                    $("#success").fadeOut();

                 }, 2000);
        

        </script>
        <?php endif; ?>
			<!-- Alerts for success and error messages -->
			<?php if (isset($_GET['success']) && $_GET['success'] == 2): ?>
				<div class="alert alert-success" role="alert">
					 updated successfully!
				</div>
				<script>
					$(document).ready(function () {
						$(".alert-success").fadeTo(2000, 500).slideUp(500, function () {
							$(this).slideUp(500);
						});
					});
				</script>
			<?php elseif (isset($_GET['error']) && $_GET['error'] == 2): ?>
				<div class="alert alert-danger" role="alert">
					There was an error updating the student. Please try again.
				</div>
				<script>
					$(document).ready(function () {
						$(".alert-danger").fadeTo(2000, 500).slideUp(500, function () {
							$(this).slideUp(500);
						});
					});
				</script>
			<?php elseif (isset($_GET['error']) && $_GET['error'] == 3): ?>
				<div class="alert alert-danger" role="alert">
					There was an error deleting the student. Please try again.
				</div>
				<script>
					$(document).ready(function () {
						$(".alert-danger").fadeTo(2000, 500).slideUp(500, function () {
							$(this).slideUp(500);
						});
					});
				</script>
			<?php elseif (isset($_GET['error']) && $_GET['error'] == 4): ?>
				<div class="alert alert-danger" role="alert">
					Error: ID not set
				</div>
				<script>
					$(document).ready(function () {
						$(".alert-danger").fadeTo(2000, 500).slideUp(500, function () {
							$(this).slideUp(500);
						});
					});
				</script>
			<?php endif; ?>

			<div class="alert alert-success" role="alert">
				Student deleted successfully!
			</div>
			<script>
				// function alert_success(studentId) {
				//     $('#deleteModal').modal('hide');
				//     $(".alert-success").css("display", "block").slideDown(500).delay(2000).slideUp(500, function() {
				//         var row = $('button[data-id="' + studentId + '"]').closest('tr');
				//         $('#studentTable').DataTable().row(row).remove().draw();
				//         $('.mt-4').scrollLeft(0); // Reset horizontal scroll position to 0
				//     });
				// }

				// function deleteStudent(sub_teach) {
				//     // Perform your delete operation here, then call alert_success
				//     alert_success(sub_teach);
				// }
			</script>
			<!-- ... existing alert handling code ... -->

			<div class="container mt-4">
				<div class="row">
					<div class="col-12">
						<h2 id="t">Student List</h2>
						<input class="form-control mb-4 search" id="searchInput" type="text" placeholder="Search...">

						<div class="table-responsive">
							<table class="table table-striped table-hover" id="sub_teach_table">
								<thead>
									<tr>
										<th>Subject Name</th>
								

										<th>Teacher Name</th>

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
		$(document).ready(function () {
			var table = $('#sub_teach_table').DataTable({
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
					url: 'fetch.php',
					method: 'GET',
					dataType: 'json',
					success: function (data) {
						table.clear().draw();
						data.forEach(function (sub_teach) {
							table.row.add([
								sub_teach.subject_name,
							
								 sub_teach.teacher_name,
								'<a class="btn btn-warning btn-sm space" href="update.php?subject_id=' + sub_teach.subject_id
								+ '"><i class="bx bx-edit space"></i> Update</a>' +
								'<button class="btn btn-danger btn-sm deleteBtn space" data-id="' + sub_teach.subject_id + '"><i class="bx bx-trash"></i> Delete</button>'


							]).draw();
						});
					}
				});
			}

			fetchAndUpdateData();
			setInterval(fetchAndUpdateData, 10000); // Update every 10 seconds

			// Delete button handling
			// $('#studentTable').on('click', '.deleteBtn', function() {
			//     var studentId = $(this).data('id');
			//     $('#confirmDeleteBtn').data('id', studentId);
			//     $('#deleteModal').modal('show');
			// });

			// Confirm delete action
			// $('#confirmDeleteBtn').on('click', function() {
			//     var studentId = $(this).data('id');
			//     $.ajax({
			//         url: 'delete_student.php',
			//         method: 'POST',
			//         data: { id: studentId },
			//         success: function(response) {
			//             alert_success(studentId);
			//         },
			//         error: function(error) {
			//             alert('Error deleting student');
			//         }
			//     });
			// });

			// Search student
			// $('#searchInput').on('keyup', function() {
			//     var search_value = $(this).val();
			//     $.ajax({
			//         url: 'search.php',
			//         method: 'GET',
			//         data: { search_value: search_value },
			//         success: function(response) {
			//             var data = JSON.parse(response);
			//             table.clear().draw();
			//             data.forEach(function(student) {
			//                 table.row.add([
			//                     student.student_id,
			//                     student.full_name,
			//                     student.birth_date,
			//                     student.age,
			//                     student.gender,
			//                     student.custodian_phone,
			//                     '<a target="_blank" href="https://wa.me/94' + student.custodian_phone + '"><i class="bx bx-whatsapp"></i>' + student.custodian_phone + '</a>',
			//                     student.subjects_name,
			//                     '<a class="btn btn-info btn-sm" href="profile.php?student_id=' + student.student_id + '"><i class="bx bx-show"></i> View</a>' +
			//                     '<a class="btn btn-warning btn-sm" href="update_student.php?student_id=' + student.student_id + '"><i class="bx bx-edit"></i> Update</a>' +
			//                     '<button class="btn btn-danger btn-sm deleteBtn" data-id="' + student.id + '"><i class="bx bx-trash"></i> Delete</button>'
			//                 ]).draw();
			//             });
			//         }
			//     });
			// });
		});
	</script>
</body>

</html>