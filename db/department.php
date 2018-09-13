<?php
$con=mysqli_connect("localhost","root","","ewsd");
				$qstudent ="INSERT INTO `department` VALUES ('0', 'Super');";
				$qstudent.="INSERT INTO `department` VALUES ('1', 'IT');";
				$qstudent.="INSERT INTO `department` VALUES ('2', 'CSE');";
				$qstudent.="INSERT INTO `department` VALUES ('3', 'BBA');";
				$qstudent.="INSERT INTO `department` VALUES ('4', 'CIS');";
					
		if ($con->multi_query($qstudent) === TRUE) {
				echo "Student records created successfully";
			} else {
				echo "Error: " . $qstudent . "<br>" . $con->error;
			}		
			header('location:database.php?department');

?>