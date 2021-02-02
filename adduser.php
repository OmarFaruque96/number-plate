<?php 

	include "db.php";

	ob_start();
?>


<!DOCTYPE html>
<html>
<head>
	<title>
		Automated Number Plate Recognition
	</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

	<!--  custom css file here -->
	<link rel="stylesheet" type="text/css" href=css/style.css>
</head>
<body>

<!-- body title section part start from here-->
<div class="my-5 container">
	<center>Add new user information</center>
	<form method="post">
		<div class="form-group">
			<input type="text" name="username" placeholder="User Name*" class="form-control" required="required">
		</div>
		<div class="form-group">
			<input type="email" name="email" placeholder="User Email*" class="form-control" required="required">
		</div>
		<div class="form-group">
			<input type="text" name="nid" placeholder="NID number*" class="form-control" required="required">
		</div>
		<div class="form-group">
			<input type="text" name="number_plate" placeholder="Lisence Number*" class="form-control" required="required">
		</div>
		<div class="form-group">
			<input type="password" name="password" placeholder="Set Password*" class="form-control" required="required">
		</div>
		<div class="form-group">
			<input type="text" name="address" placeholder="Address*" class="form-control" required="required">
		</div>
		<div class="form-group">
			<input type="number" name="phone" placeholder="Phone*" class="form-control" required="required">
		</div>
		<div class="form-group">
			<input type="submit" name="submit" value="Confirm Info" class="form-control">
		</div>
	</form>

	<button class="btn btn-md btn-danger"><a href="dashboard.php" style="color: white;text-decoration: none">Back to Home</a></button>

	<?php 

		if(isset($_POST['submit'])){
			$username 		= $_POST['username'];
			$email 			= $_POST['email'];
			$nid 			= $_POST['nid'];
			$number_plate 	= $_POST['number_plate'];
			$phone   	    = $_POST['phone'];
			$password 		= $_POST['password'];
			$address 		= $_POST['address'];

			$sql = "INSERT INTO users (	number_plate,name,nId,address,phone,email,user_role) VALUES ('$number_plate','$username', '$nid', '$address', '$phone', '$email','0')";
			$result = mysqli_query($conn, $sql);

			if($result){
				header('Location: dashboard.php');
			}else{
				echo "Add New User Error!";
			}
		}
	?>
</div>
<!-- body title section part end from here-->

<!-- user data section end from here -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<?php ob_end_flush(); ?>

</body>
</html>