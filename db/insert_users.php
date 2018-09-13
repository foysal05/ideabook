<?php
$con=mysqli_connect("localhost","root","","ewsd");
				$sql = "INSERT INTO `users` VALUES ('1', 'Foysal', 'Ahammad', 'STD', 'foysal35@diit.info', '123', 'Activate');";
				$sql .= "INSERT INTO `users` VALUES ('2', 'Nazrana', 'Haque', 'STAFF', 'foysalahammed055@gmail.com', '123', 'Activate');";
				$sql .= "INSERT INTO `users` VALUES ('3', 'Sajid', 'Rayhan', 'STD', 'sajid35@diit.info', '123', 'Activate');";
				$sql.="INSERT INTO `users` VALUES ('4', 'Mahmudur', 'Rahman', 'STD', 'samir35@diit.info', '123', 'Activate');";
				$sql.="INSERT INTO `users` VALUES ('5', 'Muntasir', 'Hasan', 'STD', 'siam35@diit.info', '123', 'Activate');";
				$sql.="INSERT INTO `users` VALUES ('6', 'Najiul', 'Tanvir', 'STD', 'tanvir@gmail.com', '123', 'Activate');";
				$sql.="INSERT INTO `users` VALUES ('7', 'Mr.', 'QAM', 'STAFF', 'foysal.int@gmail.com', '123', 'Activate');";
				
				
				
			if ($con->multi_query($sql) === TRUE) {
				echo "Users records created successfully<br>";
			} else {
				echo "Error: " . $sql . "<br>" . $con->error;
			}
			$con->close();
			header('location:database.php?users');
?>