<?php 

include "include/db/db.php";

// Generate the student ID in the format S0001
$sql = "SELECT COUNT(student_id) AS count FROM students";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$count_students = $row['count'];
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<!-- My CSS -->
	<link rel="stylesheet" href="include/css/style.css">

	<title>TCMS - Tiution class magment system</title>
</head>
<body>

<?php 
include "include/sidebar.php";

 ?>

	<!-- CONTENT -->
	<section id="content">
		
<main>


			<ul class="box-info">
				<li>
					<i class='bx bxs-calendar-check' ></i>
					<span class="text">
						<h3>0</h3>
						<p>Today's arrival</p>
					</span>
				</li>
				<li>
					<i class='bx bxs-group' ></i>
					<span class="text">
						<h3><?php echo $count_students;  ?></h3>
						<p>Students</p>
					</span>
				</li>
				<li>
					<i class='bx bxs-dollar-circle' ></i>
					<span class="text">
						<h3>LKR 2543.00</h3>
						<p>Total Fee</p>
					</span>
				</li>
			</ul>


			<div class="table-data" >
				<div class="order">
					<div class="head">
						<h3>today Fee</h3>
						<i class='bx bx-search' ></i>
						<i class='bx bx-filter' ></i>
					</div>
					<table>
						<thead>
							<tr>
								<th>Student Name</th>
								<th>Date </th>
								<th>Status</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>
									<img src="img/people.png">
									<p>John Doe</p>
								</td>
								<td>01-10-2021</td>
								<td><button style="border: none;cursor: pointer;" onclick="alert('hi')"><span class="status completed"><i class='bx bx-check' ></i>
								</span></button>
								</td>
							</tr>
							</tr>
						</tbody>
					</table>
				</div>
				<div class="todo">
					<div class="head">
						<div class="order">
							<div class="head">
								<h3>not given</h3>
								<i class='bx bx-search' ></i>
								<i class='bx bx-filter' ></i>
							</div>
							<table>
								<thead>
									<tr>
										<th>User</th>
										<th>Date Order</th>
										<th>Status</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>
											<img src="img/people.png">
											<p>John Doe</p>
										</td>
										<td>01-10-2021</td>
										<td><button style="border: none;cursor: pointer;" onclick="alert('hi')"><span class="status completed"><i class='bx bx-check' ></i>
										</span></button>
										</td>
									</tr>
								</tbody>
							</table>
						</div>
						
			</div>
			
		</main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->

	<script src="include/js/script.js"></script>
</body>
</html>