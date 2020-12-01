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
</head>
<body>

<div class="container my-4">
  <h2 >User Data</h2>
  <p>The .table class adds basic styling (light padding and horizontal dividers) to a table:</p>
  <a href="adduser.php"><button class="btn btn-md btn-primary my-4">Add New Info</button></a>            
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
			      <td><?php echo "Pending"?></td>
			    </tr>

				<?php

			}

	  	?>
	  	
	   
	  </tbody>
	</table>

	

</body>
</html>
