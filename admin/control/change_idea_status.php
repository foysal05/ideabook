<?php
if(isset($_POST['change'])){
	include('../db.php');
	$id=$_POST['id'];
	$uid=$_POST['uid'];
	$status=$_POST['status'];
	//echo $uid;
	$query="UPDATE idea set idea_status='$status' where id='$id'";
	$result=mysqli_query($con,$query);
	header("location:student_profile.php?changed&id=".$uid."");
}
if(isset($_POST['change_from_admin'])){
	include('../db.php');
	$id=$_POST['id'];
	$uid=$_POST['uid'];
	$status=$_POST['status'];
	//echo $uid;
	$query="UPDATE idea set idea_status='$status' where id='$id'";
	$result=mysqli_query($con,$query);
	header("location:idea_details.php?changed&id=".$id."");
}

if(isset($_POST['change_from_admin_top'])){
	include('../db.php');
	$id=$_POST['id'];
	$uid=$_POST['uid'];
	$status=$_POST['status'];
	//echo $uid;
	$query="UPDATE idea set idea_status='$status' where id='$id'";
	$result=mysqli_query($con,$query);
	header("location:idea_category.php?changed&id=".$id."");
}
?>