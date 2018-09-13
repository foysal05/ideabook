<div class="box-body" style="max-height:auto; max-width:90%; overflow-y: hidden; overflow-x:scroll;">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Idea Title</th>
                  <th>Idea Body</th>
				  
                  <th>Publisher Name</th>
                   <th>Date</th>
                   <th>Time</th>
                   <th>Publisher Identiy</th>
                   
                   <th>Details</th>
                </tr>
                </thead>
                <tbody>
				<?php
				
				$query  = "SELECT * FROM idea INNER JOIN users on idea.idea_author_id=users.uid INNER JOIN comment on idea.id=comment.idea_id GROUP BY id";
					$result=mysqli_query($con,$query);
					if(mysqli_num_rows($result)>0){
						while($row=mysqli_fetch_array($result, MYSQLI_ASSOC)){
							echo "<tr>";
							echo "<td>".$row['idea_title']."</td>";
							echo "<td>".$row['idea_body']."</td>";
							echo "<td>".$row['first_name']."</td>";
							
							
							
							echo "<td>".$row['date']."</td>";
							echo "<td>".$row['time']."</td>";
							?>
							 <?php 
								  $author_type=$row['author_type'];
								  //echo "Attachment". $attachment;
								 if ($author_type !="") {
									
								   echo "<td>  Anonymous</td>";
								 }else{
									 echo "<td>  Identified</td>";
								 }

								  ?>
							<?php
							//echo "<td><a target='_blank' href='../../std_main/'".$row['attachment'].">Download</a></td>";
							
							echo "<td> <button type='submit' name='details' class='btn btn-info '><i class='icon-eye-open'></i><a style='color:white' href='idea_details.php?operation=select&id=".$row['id']."'>Details</button></td>";
							
							echo "</tr>";
						}
					}
				
				?>
               
                </tbody>
                <tfoot>
                <tr>
                  <th>Idea Title</th>
                  <th>Idea Body</th>
				  
                  <th>Punlisher Name</th>
                   <th>Date</th>
                   <th>Time</th>
				   <th>Attachment</th>
				  
                   <th>Details</th>
                </tr>
                </tfoot>
              </table>
          
           
              
              </div>