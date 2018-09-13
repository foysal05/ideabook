<?php
include('../db.php');
$id=$_POST['id'];
$query="DELETE FROM idea where id='$id'";
$result=mysqli_query($con,$query);
	header("location:open_category.php?idea_deleted");


?>