<?php
require_once "vendor/autoload.php";

// Class use
use App\Controllers\StudentController;

//Class Instance
$student = new StudentController;

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Development Area</title>
	<base href="/crud_oop/">
	<!-- ALL CSS FILES  -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/style.css">
	<link rel="stylesheet" href="assets/css/responsive.css">
</head>
<body>

	<?php

	/**
	 * Student Data Form Manage
	 */
	if(isset($_POST['submit'])){
		// Values Stored in variables
		$name = $_POST['name'];
		$email = $_POST['email'];
		$cell = $_POST['cell'];

		// File Manage
		$photo = $_FILES['photo'];

		if(empty($name) || empty($email) || empty($cell)){
      $messageOfError = '<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>All Fields are Required !!!</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';

    }
    else if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
			$messageOfError = '<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Invalid E-Mail Address !!!</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';

		}else{
      $messageOfSuccess = $student -> addNewStudent($name,$email,$cell,$photo);
    }
	}
	?>
	<div class="wrap">
		<a class="btn btn-primary btn-sm" href="index.php">Show all Students</a>
		<div class="card shadow">
			<div class="card-body">
				<h2>Sign Up</h2>
				<?php
          if(isset($messageOfSuccess)){
            echo $messageOfSuccess;
          }
          if(isset($messageOfError)){
            echo $messageOfError;
          }
         ?>
				<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
					<div class="form-group">
						<label for="">Name</label>
						<input class="form-control" type="text" name="name">
					</div>
					<div class="form-group">
						<label for="">Email</label>
						<input class="form-control" type="text" name="email">
					</div>
					<div class="form-group">
						<label for="">Cell</label>
						<input class="form-control" type="text" name="cell">
					</div>
					<div class="form-group">
						<label for="">Photo</label>
						<input class="form-control" type="file" name="photo">
					</div>
					<div class="form-group">
						<input class="btn btn-primary" type="submit" value="Sign Up" name="submit">
					</div>
				</form>
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
