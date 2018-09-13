<?php
include('../db.php');
	if($_GET['operation']=='change_std'){
	
	$uid=$_GET['id'];
	$status=$_GET['status'];
	//echo $uid;
	$query="UPDATE users set status='$status' where uid='$uid'";
	$result=mysqli_query($con,$query);
	header("location:student_profile.php?changed&id=".$uid."");
}
	if($_GET['operation']=='change_s'){
	//include('../db.php');
	$uid=$_GET['id'];
	$status=$_GET['status'];
	//echo $uid;
	$query="UPDATE users set status='$status' where uid='$uid'";
	$result=mysqli_query($con,$query);
	header("location:staff_profile.php?changed&id=".$uid."");
}
if($_GET['operation']=='change_account'){
	//include('../db.php');
	$uid=$_GET['id'];
	$status=$_GET['status'];
	//echo $uid;
	$query="UPDATE users set status='$status' where uid='$uid'";
	$result=mysqli_query($con,$query);
	header("location:account.php?changed");
}
if($_GET['operation']=='delete'){
	//include('../db.php');
	$uid=$_GET['id'];
	//$status=$_GET['status'];
	//echo $uid;
	$query="DELETE from users where uid='$uid'";
	$result=mysqli_query($con,$query);
	header("location:account.php?changed");
}
if($_GET['operation']=='delete_comment'){
	//include('../db.php');
	$cid=$_GET['cid'];
	$idea_id=$_GET['idea_id'];
	//$status=$_GET['status'];
	echo $id;
	$query="DELETE from comment where comment_id='$cid'";
	$result=mysqli_query($con,$query);
	header("location:idea_details.php?deleted&id=".$idea_id."");
}

?>