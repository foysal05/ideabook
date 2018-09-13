<?php
session_start();
/*
Developer: Ehtesham Mehmood
Site:      PHPCodify.com
Script:    Insert Data in PHP using jQuery AJAX without Page Refresh
File:      Insert-Data.php
*/
include('../db.php');

//$name=$_POST['name'];
//$final_closure_date=$_POST['final_closure_date'];
//$closure_date=$_POST['closure_date'];
$name="hfdsf";
$final_closure_date="ghhgh";
$closure_date="dgfdgdf";

$host_department_id=$_SESSION['department'];
$start_date=date('mm/dd/y');

$stmt = $con->prepare("INSERT INTO category(category_name,start_date,closure_date,final_closure_date,host_department_id) VALUES(:name, :start_date,:closure_date,:final_closure_date,:host_department_id)");

$stmt->bindparam(':name', $name);
$stmt->bindparam(':start_date', $start_date);
$stmt->bindparam(':closure_date', $closure_date);
$stmt->bindparam(':final_closure_date', $final_closure_date);
$stmt->bindparam(':host_department_id', $host_department_id);
if($stmt->execute())
{
  $res="Data Inserted Successfully:";
  echo json_encode($res);
}
else {
  $error="Not Inserted,Some Probelm occur.";
  echo json_encode($error);
}



 ?>
