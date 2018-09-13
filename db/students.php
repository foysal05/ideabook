<?php
$con=mysqli_connect("localhost","root","","ewsd");
				$qstudent ="INSERT INTO `student` VALUES ('1', '1', '2018', 'Active', 'dist/img/user1-128x128.jpg');";
				$qstudent.="INSERT INTO `student` VALUES ('3', '4', '2018', 'Active', 'dist/img/user8-128x128.jpg');";
				$qstudent.="INSERT INTO `student` VALUES ('4', '1', '2018', 'Active', 'dist/img/user6-128x128.jpg');";
				$qstudent.="INSERT INTO `student` VALUES ('5', '2', '2018', 'Active', 'dist/img/user2-160x160.jpg');";
				$qstudent.="INSERT INTO `student` VALUES ('6', '3', '2018', 'Active', 'dist/img/user8-128x128.jpg');";

		if ($con->multi_query($qstudent) === TRUE) {
				echo "Student records created successfully";
			} else {
				echo "Error: " . $qstudent . "<br>" . $con->error;
			}		
			header('location:database.php?students');

?>