<div class="box-body" style="max-height:auto; max-width:90%; overflow-y: hidden; overflow-x:scroll;">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  
                  <th>Idea Body</th>
				  <th>Comment</th>
                  <th>Commenter Name</th>
                   <th>Date</th>
                   <th>Time</th>
                   <th>Anonymous</th>
                   <th>Details</th>
                </tr>
                </thead>
                <tbody>
				<?php
				
				//$query="select * from idea where idea_category='$category'";
				$query="SELECT * from comment INNER JOIN users on comment.comment_author_id=users.uid INNER JOIN idea on comment.idea_id=idea.id ORDER BY comment_id DESC limit 5";
					$result=mysqli_query($con,$query);
					if(mysqli_num_rows($result)>0){
						while($row=mysqli_fetch_array($result, MYSQLI_ASSOC)){
							echo "<tr>";
							echo "<td>".$row['idea_body']."</td>";
							echo "<td>".$row['comment_body']."</td>";
							echo "<td>".$row['first_name']."</td>";
							
							
							
							echo "<td>".$row['date']."</td>";
							echo "<td>".$row['time']."</td>";
							echo "<td>".$row['anonymous']."</td>";
							
							//echo "<td><a target='_blank' href='../../std_main/'".$row['attachment'].">Download</a></td>";
							
							echo "<td> <button type='submit' name='details' class='btn btn-info '><i class='icon-eye-open'></i><a style='color:white' href='idea_details.php?operation=select&id=".$row['id']."'>Details</button></td>";
							
							echo "</tr>";
						}
					}
				
				?>
               
                </tbody>
                <tfoot>
                <tr>
                   <th>Idea Body</th>
				  <th>Comment</th>
                  <th>Commenter Name</th>
                   <th>Date</th>
                   <th>Time</th>
                   <th>Anonymous</th>
                   <th>Details</th>
                </tr>
                </tfoot>
              </table>
          
           
              
              </div>