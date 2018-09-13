<?php

include('db.php');
$year=date('Y');
$y=(int)$year;
//echo gettype($y);
$query="SELECT * from student where session<'$y'";
	$result=mysqli_query($con,$query);
	if(mysqli_num_rows($result)>0){
	while($row=mysqli_fetch_array($result, MYSQLI_ASSOC)){
	$std=$row['std_id'];
	$query="UPDATE users set status='Deactivate' where uid='$std' ";
	$result=mysqli_query($con,$query);	
						}
					}

?>