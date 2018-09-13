<?php
//fetch.php;
session_start();
if(isset($_POST["view"]))
{
 include("db.php");
 
 if($_POST["view"] != '')
 {
  $update_query = "UPDATE message SET status=1 WHERE status=0 and receiver_id='".$_SESSION['id']."'";
  mysqli_query($con, $update_query);
 }
 $query = "SELECT * FROM message INNER JOIN users on message.sender_id=users.uid where receiver_id='".$_SESSION['id']."' ORDER BY m_id DESC LIMIT 5";
 $result = mysqli_query($con, $query);
 $output = '';
 
 if(mysqli_num_rows($result) > 0)
 {
  while($row = mysqli_fetch_array($result))
  {
   $output .= '
   <li>
    <a href="#">
     <strong>'.$row["first_name"].'</strong><br />
     <small><em>'.$row["message"].'</em></small>
    </a>
   </li>
   <li class="divider"></li>
   ';
  }
 }
 else
 {
  $output .= '<li><a href="#" class="text-bold text-italic">No Message Found</a></li>';
 }
 
 $query_1 = "SELECT * FROM message WHERE status=0 and receiver_id='".$_SESSION['id']."'";
 $result_1 = mysqli_query($con, $query_1);
 $count = mysqli_num_rows($result_1);
  $data = array(
  'notification'   => $output,
  'unseen_notification' => $count
 );
 echo json_encode($data);
}
?>
