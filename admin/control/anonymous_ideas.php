<div class="box-body" style="max-height:auto; max-width:90%; overflow-y: hidden; overflow-x:scroll;">
            <table id="example3" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Idea Title</th>
                  <th>Idea Body</th>
				  
                  <th>Publisher Name</th>
                   <th>Date</th>
                   <th>Time</th>
                   <th>Attachment</th>
                   <th>Details</th>
                </tr>
                </thead>
                <tbody>
				<?php
				
				//$query="select * from idea where idea_category='$category'";
				$query="SELECT * FROM  `idea` INNER JOIN category on idea.category_id=category.c_id INNER JOIN users on idea.idea_author_id=users.uid where author_type='anonymous'";
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
								  $attachment=$row['attachment'];
								  //echo "Attachment". $attachment;
								 if ($attachment !="") {
									
								  ?>
								  <div class="attachment-block clearfix">
								  <td> <button class="btn btn-info"> <a  style="color:white;"target="_blank" href="<?php echo "../../std_main/". $row['attachment'];?>"><i class="fa fa-download margin-r-5"></i> Attachment</a></button></td>
									<!-- /.attachment-pushed -->
								  </div>
								  <?php
								 }else{
									 echo "<td>  No Attachment</td>";
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