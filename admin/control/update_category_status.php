<?php
include('../db.php');


		$query="select * from category where status='Active'";
		
			$result=mysqli_query($con,$query);
			if(mysqli_num_rows($result)>0){
				while($row=mysqli_fetch_array($result, MYSQLI_ASSOC)){
										
					$first_date=$row['closure_date'];
					
					
					
					$past_date = array($first_date);
 
					// Loop through colors array
					foreach($past_date as $closure_date){
						echo $closure_date . "<br>";
						
					
					$your_date1 = strtotime($closure_date);
					$now = time();
					$datediff1 = $your_date1 -$now;
					
						if(round($datediff1 / (60 * 60 * 24))<0){
							echo "Minus Figure </br>";
							$sql="UPDATE category SET STATUS='Deactive' WHERE closure_date ='$closure_date'";
							$result=mysqli_query($con,$sql);
						}
					}

					
									
									}
								}
								
								
								
?>
