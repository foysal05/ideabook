<?php
		include('db.php');		
		
$idea_author_id='1';
$commenter_id='2';
		
$query="SELECT email from idea INNER JOIN users on idea.idea_author_id=users.uid where idea.id='$idea_author_id' group by uid";
						$result=mysqli_query($con,$query);
				
						if(mysqli_num_rows($result)>0){
						while($row=mysqli_fetch_array($result, MYSQLI_ASSOC)){
							$email=$row['email'];
							
						//echo "<script>alert('Email: '".$email.");</script>";
						echo $email;
						
					}
					
					}
					
$query="SELECT user_type from  users where uid='$commenter_id'";
						$result=mysqli_query($con,$query);
				
						if(mysqli_num_rows($result)>0){
						while($row=mysqli_fetch_array($result, MYSQLI_ASSOC)){
							$user_type=$row['user_type'];
						//echo "<script>alert('Email: '".$email.");</script>";
						echo $user_type;
						
					}
					
					}
					
				
				?>