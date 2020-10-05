<?php
require_once "vendor/autoload.php";

// Class use
use App\Controllers\StudentController;

//Class Instance
$student = new StudentController;

// Get ID
if(isset($_GET['view_id'])){
	$id=$_GET['view_id'];
	$single_student = $student->singleStudent($id);
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
	<div class="container">
		<div class="card shadow m-5">
			<div class="card-header">
				<h3 class="text-center">Information</h3>
			</div>
			<div class="card-body">
				<div class="row">
					<div class="col-md-5">
						<img class="img-fluid shadow rounded-circle w-75 d-block m-auto" style="border: 7px solid #fff;" src="assets/uploads/students/<?=$single_student['photo']?>">
					</div>
					<div class="col-md-7">
						<table class="table table-striped mt-3">
							<tr class="d-flex">
								<th class="col-4">Name</th>
								<th class="col-1">:</th>
								<td class="col-7"><?=$single_student['name']?></td>
							</tr>
							<tr class="d-flex">
								<th class="col-4">Email</th>
								<th class="col-1">:</th>
								<td class="col-7"><?=$single_student['email']?></td>
							</tr>
							<tr class="d-flex">
								<th class="col-4">Cell</th>
								<th class="col-1">:</th>
								<td class="col-7"><?=$single_student['cell']?></td>
							</tr>

							<tr class="d-flex">
								<th class="col-4">Registered At</th>
								<th class="col-1">:</th>
								<td class="col-7"><?=$single_student['created_at']?></td>
							</tr>
						</table>
						<div class="row">
							<div class="col-md-6">
								<a href="index.php" class="btn btn-success d-block">
									Edit Profile
								</a>
							</div>
							<div class="col-md-6">
								<a href="index.php" class="btn btn-primary d-block">
									Go back to Main
								</a>
							</div>
						</div>
					</div>
				</div>
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
