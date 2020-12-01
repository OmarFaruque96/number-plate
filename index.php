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
<div class="site-title">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="title">
					<h1>Number Plate Recognition</h1>
					<p>Automatic Number Plate Recognition using Yolo Algorithm with Machine Learning</p>
					<button type="button" data-toggle="modal" data-target="#exampleModal">Click To Login</button>

					<!--  -->
					<!-- Button trigger modal -->
						<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
						  Launch demo modal
						</button> -->

						<!-- Modal -->
						<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
						  <div class="modal-dialog" role="document">
						    <div class="modal-content">
						      <!-- <div class="modal-header ">
						        <h5 class="modal-title text-center" id="exampleModalLabel">Login</h5>
						        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
						          <span aria-hidden="true">&times;</span>
						        </button>
						      </div> -->
						      <div class="modal-body">
						      	<img src="img/user-male.png">
						        <form method="post">
						        	<input type="text" name="name" placeholder="Your Name" class="form-control">
						        	<input type="password" name="password" placeholder="Your password" class="form-control">
						        	<input type="submit" class="form-control login" name="submit" value="Login">
						        </form>
						      </div>
						      <!-- login check -->
						      <?php 

						      	if(isset($_POST['submit'])){
						      		$name  		= 	$_POST['name'];
						      		$password  	= 	$_POST['password'];
						      		$role = 1;

						      		$hasspassword = sha1($password);
						      		// check with database
						      		$query  = "SELECT * FROM users WHERE name = '$name' AND password = '$hasspassword' AND user_role = '$role'";
						      		echo $query;
						      		$result = mysqli_query($conn, $query);

						      		$isOK = mysqli_num_rows($result);

						      		

						      		if($isOK>0){
						      		 	header('Location: dashboard.php');
						      		}else{
						      		 	header('Location: index.php');
						      		}

						      }

						      ?>
						    </div>
						  </div>
						</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- body title section part end from here-->
<!-- user data section start from here -->
<div class="user-table">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				
			</div>
		</div>
	</div>
</div>
<!-- user data section end from here -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<?php ob_end_flush(); ?>

</body>
</html>