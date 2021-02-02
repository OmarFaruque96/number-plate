<?php 
	include "db.php";

	ob_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <style type="">
  	.overlay{
  		position: absolute;
  		top: 0;
  		right: 0;
  		bottom: 0;
  		left: 0;
  		background-color: rgba(0,0,0,0.75);
  	}
  </style>
</head>
<body>


<div class="container my-4">
  <h2 class="text-center">Faulted Vehicle Information</h2>
  <p class="text-center">All detected user information list:</p>
            
  <div>
  	<form method="POST" action="dashboard.php?do=number">
  		<div class="form-group">
  			<input type="text" name="v_number" class="form-control" placeholder="Detected Car number">
  			<input type="submit" name="number_submit" class="btn btn-md btn-danger" value="Confirm Info">
  			<button class="btn btn-md btn-danger" style="margin-bottom: 20px;"><a href="dashboard.php?do=Manage" style="color: white;text-decoration: none;">Refresh</a></button>
  		</div>
  	</form>
  	<?php


  	?>
  </div>            
  <table class="table ">
	  <thead class="thead-dark">
	    <tr>
	      <th scope="col">Serial</th>
	      <th scope="col">Name</th> 
	      <th scope="col">NID</th>
	      <th scope="col">Email</th>
	      <th scope="col">Number Plate</th>
	      <th scope="col">Status</th>
	    </tr>
	  </thead>
	  <tbody>

	  	<!--  -->
	  	<?php

	  		
  			$do = isset($_GET['do']) ? $_GET['do'] : 'Manage';

  			if($do == 'Manage'){
  				$sql = "SELECT * FROM users INNER JOIN fault_info ON users.number_plate = fault_info.number_plate;";
			$result = mysqli_query($conn, $sql);
			$i = 0;

			while ($row = mysqli_fetch_assoc($result)) {
				# code...
				$user_id  		= $row['user_id'];
				$number_plate  	= $row['number_plate'];
				$name  			= $row['name'];
				$nId  			= $row['nId'];
				$address  		= $row['address'];
				$phone  		= $row['phone'];
				$email  		= $row['email'];
				$user_role  	= $row['user_role'];

				$i++;

				?>

				<tr>
			      <th scope="row"><?php echo $i;?></th>
			      <td><?php echo $name;?></td>
			      <td><?php echo $nId;?></td>
			      <td><?php echo $email;?></td>
			      <td><?php echo $number_plate;?></td>
			      <td>
			      	<a href="dashboard.php?do=mail&userid=<?php echo $email;?>" class="btn btn-md btn-primary">Sent Mail</a>
			      </td>
			    </tr>

				<?php

				}
  			}
  			else if($do == 'number'){

  				if($_SERVER['REQUEST_METHOD'] == 'POST'){
  					$car_number = $_POST['v_number'];
  					
		  			$sql = "INSERT INTO fault_info (number_plate) VALUES ('$car_number')";
					$result = mysqli_query($conn, $sql);

					if($result){
						header('Location: dashboard.php');
					}else{
						echo "Add New User Error!";
					}

				}
  			}
  			else if($do == 'mail'){

  				if(isset($_GET['userid'])){
  					$usermail = $_GET['userid'];

  					require 'PHPMailerAutoload.php';
					require 'pass.php';

					$mail = new PHPMailer;

					// $mail->SMTPDebug = 4;                               // Enable verbose debug output

					$mail->isSMTP();                                      	// Set mailer to use SMTP
					$mail->Host = 'smtp.gmail.com';  						// Specify main and backup SMTP servers
					$mail->SMTPAuth = true;                               // Enable SMTP authentication
					$mail->Username = EMAIL;                				 // SMTP username
					$mail->Password = PASS;                           		// SMTP password
					$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
					$mail->Port = 587;                                    // TCP port to connect to

					$mail->setFrom(EMAIL, 'NumberPlate');
					//$mail->addAddress($_POST['email']);     			// Add a recipient
					$mail->addAddress($usermail);     			// Add a recipient

					$mail->addReplyTo(EMAIL);
					// print_r($_FILES['file']); exit;
					// for ($i=0; $i < count($_FILES['file']['tmp_name']) ; $i++) { 
					// 	$mail->addAttachment($_FILES['file']['tmp_name'][$i], $_FILES['file']['name'][$i]);    
					// }
					$mail->isHTML(true);                                  

					$mail->Subject = 'Traffic Rules Violation Report.';
					$mail->Body    = '<h1>Hello Sir/Mam, <br> You just broke the traffic rules. According our traffice rules, You have to pay  bdt-1200/taka within next 7 working days. <br> Otherwise we will complain against you in your local police station. <br> Thank You. <br>  </h1>';
					$mail->AltBody = 'Traffic Rules Violation Report.';

					if(!$mail->send()) {
					    echo 'Message could not be sent.';
					    echo 'Mailer Error: ' . $mail->ErrorInfo;
					    header('Location: dashboard.php');
					} else {
					    echo 'Message has been sent';
					}
  				}

  				
  			}

  				
  			

	  	?>
	  	
	   
	  </tbody>
	</table>

	<div class="my-5">
		<a href="adduser.php"><button class="btn btn-md btn-primary my-4">Add New User</button></a>  
	</div>

</body>
</html>
