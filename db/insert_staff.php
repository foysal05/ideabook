<?php
$con=mysqli_connect("localhost","root","","ewsd");
	$sql  = "INSERT INTO `staff` VALUES ('2', '1', '2018-5-1', 'QAC', 'dist/img/avatar3.png');";
	$sql .= "INSERT INTO `staff` VALUES ('7', '0', '2018-5-1', 'QAM', 'dist/img/avatar.png');";
				
				
			if ($con->multi_query($sql) === TRUE) {
				echo "Staff records created successfully<br>";
			} else {
				echo "Error: " . $sql . "<br>" . $con->error;
			}
			$con->close();
			header('location:database.php?staffs');
?>