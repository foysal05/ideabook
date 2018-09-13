<?php
include('../db.php');
session_start();
date_default_timezone_set('Asia/Dhaka');
define('SITE_ROOT',dirname(__FILE__));
if($_SERVER['REQUEST_METHOD']=='POST')
{
	$filesToZip=array();
	 foreach($_FILES['file']['tmp_name'] as $key => $tmp_name)
	{
		$name=basename($_FILES['file']['name'] [$key]);
		$uploads_dir=SITE_ROOT.'/references/'.$name;
		array_push($filesToZip,$name);
		move_uploaded_file($_FILES['file']['tmp_name'][$key],"$uploads_dir");
	}
	$zip=new ZipArchive();
	$zip_Name=time().'.zip';
	if($zip->open($zip_Name,ZipArchive::CREATE)==TRUE){
		foreach($filesToZip as $file){
			
			$zip->addFile('references/'.$file,$file);
		}
		$zip->close();
			
	}
	
	$query="SELECT * FROM student INNER JOIN department on student.department_id=department.d_id WHERE std_id = '".$_SESSION['id']."'";
				$result=mysqli_query($con,$query);
				if(mysqli_num_rows($result)>0){
				while($row=mysqli_fetch_array($result, MYSQLI_ASSOC)){
					$department= $row['d_name'];
				}
				}
	
	$name=$_POST['post_title'];
	
	$category=$_POST['category'];
	$post_title=$_POST['post_title'];
	$post_body=$_POST['post_body'];
	
	$author_id=$_SESSION['id'];
	//echo $department;
	//$department=$_POST['department'];
	$date=date('Y-m-d');
	$time=date('h:i:s a');
	$author_type=$_POST['anonymous'];
	
	//echo "Department ID: ". $d_id;
	
	//==============
	$source_file = $zip_Name;
	$destination_path = 'zip_file/';
	rename($source_file, $destination_path . pathinfo($source_file, PATHINFO_BASENAME));
	
	
	$total = count(array_filter($_FILES['file']['name']));
	
	$ftotal=$total+1;
	//echo "Number of files :" .$ftotal ."<br>";
	$query="SELECT department_id from student where std_id='$author_id'";
	
				$result=mysqli_query($con,$query);
				if(mysqli_num_rows($result)>0){
				while($row=mysqli_fetch_array($result, MYSQLI_ASSOC)){
					//$qac_email=$row['email'];
					$department_id=$row['department_id'];
				}
				}
	$query="SELECT email from users INNER JOIN staff on users.uid=staff.s_id where staff.department_id='$department_id'";
	
				$result=mysqli_query($con,$query);
				if(mysqli_num_rows($result)>0){
				while($row=mysqli_fetch_array($result, MYSQLI_ASSOC)){
					$qac_email=$row['email'];
					
				}
				}
	
	//echo $qac_email;
	include('send_mail.php');
	
	if($total<1) {
		//echo "Insert without attachment<br>";
		//echo "Department ID: ". $d_id;
	$query="INSERT INTO idea values('','$category','$post_title','$post_body','$author_id','$department','$date','$time','$author_type','','Active')";
	
	$result=mysqli_query($con,$query);
	}else{
		
		//echo "Insert with attachment<br>";
		//echo $source_file;
	$query="INSERT INTO idea values('','$category','$post_title','$post_body','$author_id','$department','$date','$time','$author_type','zip_file/$source_file','Active')";
	
	$result=mysqli_query($con,$query);
	}
	
	//echo "<a href='zip_file/$source_file'>Download</a>";
header('location:index.php?posted');
	//===========
}

?>