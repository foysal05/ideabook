<?php
include('../db.php');
$category_id=$_POST['category_id'];
$query="DELETE FROM category where c_id='$category_id'";
$result=mysqli_query($con,$query);
	header("location:open_category.php?deleted");


?>