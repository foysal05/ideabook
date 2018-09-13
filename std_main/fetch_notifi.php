<?php
//fetch_notifi.php;

session_start();
if(isset($_POST["view"]))
{
 include("db.php");
 if($_POST["view"] != '')
 {
  $update_query = "UPDATE comment SET comment_status=1 WHERE comment_status=0";
  mysqli_query($con, $update_query);
 }
 $query = "SELECT * FROM comment INNER JOIN users on comment.comment_author_id=users.uid INNER JOIN idea on comment.idea_id=idea.id where idea_author_id='".$_SESSION['id']."' and users.user_type !='STAFF'  ORDER BY comment_id DESC LIMIT 5";
 $result = mysqli_query($con, $query);
 $output = '';
 
 if(mysqli_num_rows($result) > 0)
 {
  while($row = mysqli_fetch_array($result))
  {
	  if($row['anonymous']=='Anonymous'){
		  $author='Anonymous';
	  }else{
		  $author=$row['first_name'];
	  }
   $output .= '
   <li>
    <a href="#">
     <strong>'.$author.'</strong><br />
     <small><em>'.$row["comment_body"].'</em></small>
    </a>
   </li>
   <li class="divider"></li>
   ';
  }
 }
 else
 {
  $output .= '<li><a href="#" class="text-bold text-italic">No Notification Found</a></li>';
 }
	$query_1="SELECT * FROM comment INNER JOIN users on comment.comment_author_id=users.uid INNER JOIN idea on comment.idea_id=idea.id where idea_author_id='".$_SESSION['id']."' and users.user_type !='STAFF' and comment_status=0";
 //$query_1 = "SELECT * FROM comment  WHERE comment_status=0";
 $result_1 = mysqli_query($con, $query_1);
 $count = mysqli_num_rows($result_1);
 $data = array(
  'notification'   => $output,
  'unseen_notification' => $count
 );
 echo json_encode($data);
}
?>
