<?php
require_once "vendor/autoload.php";

// Class use
use App\Controllers\StudentController;

//Class Instance
$student = new StudentController;

// Data Delete
if(isset($_GET['delete_id'])){
	$student_id = $_GET['delete_id'];

	$mess = $student->deleteStudent($student_id);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<!-- <base href="/crud_oop/"> -->
	<title>Development Area</title>
	<!-- ALL CSS FILES  -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/style.css">
	<link rel="stylesheet" href="assets/css/responsive.css">
</head>
<body>


	<div class="wrap-table">
		<?php

		if(isset($mess)){
			echo $mess;
		}
		 ?>
		<a class="btn btn-primary btn-sm" href="create.php">ADD New</a>
		<div class="card shadow">
			<div class="card-body">
				<h2>All Users</h2>
				<table class="table table-striped">
					<thead>
						<tr>
							<th>#</th>
							<th>Name</th>
							<th>Email</th>
							<th>Cell</th>
							<th>Photo</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$data = $student -> allStudent('DESC');

							while($student = $data->fetch_assoc()):
						?>
						<tr>
							<td><?=$student['id']?></td>
							<td><?=$student['name']?></td>
							<td><?=$student['email']?></td>
							<td><?=$student['cell']?></td>
							<td><img src="assets/uploads/students/<?=$student['photo']?>" alt=""></td>
							<td>
								<a class="btn btn-sm btn-info" href="#">View</a>
								<a class="btn btn-sm btn-warning" href="#">Edit</a>
								<a class="btn btn-sm btn-danger" href="?delete_id=<?=$student['id']?>">Delete</a>
							</td>
						</tr>
					<?php  endwhile; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>








	<!-- JS FILES  -->
	<script src="assets/js/jquery-3.4.1.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/custom.js"></script>
</body>
</html>
