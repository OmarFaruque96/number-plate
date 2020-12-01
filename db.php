<?php 

	$conn = mysqli_connect('localhost', 'root', '', 'number');


	if($conn){
		//echo "Database is connected successfully!";
	}else{
		echo "Database connection error!";
	}
?>