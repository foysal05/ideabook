<?php
session_start();
include ('../db.php');

date_default_timezone_set('Asia/Dhaka');

if(isset($_POST['from_message'])){
	

$receiver=$_POST['receiver'];
$sender=$_SESSION['id'];
$message=$_POST['message'];
$date=date('Y-m-d');
$time=date('h:i:s a');
$query="INSERT INTO message values('','$sender','$message','$receiver','$date','$time','0')";
mysqli_query($con,$query);

		header("location:message.php?changed&std_id=".$receiver."");
}

?>