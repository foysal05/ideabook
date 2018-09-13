 <?php
 include('db.php');
	  if(isset($_POST['btnreply'])){
					$comment = $_POST['comment_id'];
					$reply = $_POST['reply'];
					$author = $_POST['author_id'];
					$date=date('Y-m-d');
					$time=date('h:i:s a');
					
					$query="INSERT INTO reply values('','$comment','$author','$reply','$date','$time')";
					$result=mysqli_query($con,$query);
					
					header('location:index.php?replyed');
					//$query1="DELETE t1 FROM `comment` t1, `comment` t2 WHERE t1.comment_id < t2.comment_id AND t1.comment_body = t2.comment_body";
					//$result=mysqli_query($connection,$query1);
									
				}else{
					header('location:index.php?erroe');
				}
				
	  ?>