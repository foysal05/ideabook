<?php
$conn = new mysqli("localhost","root","","ewsd");

$sql="UPDATE comments SET comment_status=1 WHERE comment_status=0";	
$result=mysqli_query($conn, $sql);

$sql="select * from comment ORDER BY comment_id DESC limit 5";
$result=mysqli_query($conn, $sql);

$response='';
while($row=mysqli_fetch_array($result)) {
	$response = $response . "<div class='notification-item'>" .
	"<div class='notification-subject'>". $row["comment_author_id"] . "</div>" . 
	"<div class='notification-comment'>" . $row["comment_body"]  . "</div>" .
	"</div>";
}
if(!empty($response)) {
	print $response;
}


?>