<?php

/*
Developer: Ehtesham Mehmood
Site:      PHPCodify.com
Script:    Insert Data in PHP using jQuery AJAX without Page Refresh
File:      Insert-Data.php
*/
include('db.php');
$idea_id=$_POST['idea_id'];
$user_id=$_POST['user_id'];
//$student_class=$_POST['student_class'];

$stmt = $DBcon->prepare("INSERT INTO view(idea_id,u_id) VALUES(:idea_id, :user_id)");

$stmt->bindparam(':idea_id', $idea_id);
$stmt->bindparam(':user_id', $user_id);

if($stmt->execute())
{
  $res="Data Inserted Successfully:";
  echo json_encode($res);
}
else {
  $error="Not Inserted,Some Probelm occur.";
  echo json_encode($error);
}

			$query1="DELETE t1 FROM view t1, view t2 WHERE t1.v_id < t2.v_id AND t1.idea_id = t2.idea_id and t1.u_id=t2.u_id";
				$result=mysqli_query($connection,$query1);

 ?>
