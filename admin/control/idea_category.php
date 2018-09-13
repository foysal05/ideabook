<?php
session_start();
	include ('../db.php');
	if($_SESSION['user_type']=='STAFF'){
	
$category_id=$_GET['category_id'];	
					
$result = $con->query("SELECT  count(id),department,category_id FROM  idea  where category_id='$category_id' GROUP BY department");
					
					
?>

<!DOCTYPE html>
<html>
<?php include('head.php');?>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

function drawChart() {

    var data = google.visualization.arrayToDataTable([
      ['Department', 'Idea'],
      <?php
      if($result->num_rows > 0){
          while($row = $result->fetch_assoc()){
			  //echo $row['d_name'];
			  $mark=$row['count(id)'];
            //echo "['".$row['count(id)']."', ".$row['d_id']."],";
            echo "['".$row['department']."', ".$row['count(id)']."],";
          }
      }
      ?>
    ]);
    
    var options = {
        title: 'Department wise Contribution',
        width: 900,
        height: 500,
    };
    
    var chart = new google.visualization.PieChart(document.getElementById('piechart'));
    
    chart.draw(data, options);
}
</script>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

<?php include('header_top.php');?>
  <!-- Left side column. contains the logo and sidebar -->
  <?php include('left_side.php');?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
   
</br>
    <!-- Main content -->
 <!-- general form elements -->
		
			  <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <!--<h3 style="font-size:2em; color:green" class="box-title"><?php //echo $_GET['category'];?></h3>-->
			  <div style="float:left;">
				
				<h2 style="width:100%" class="alert alert-success">Category: <?php echo $_GET['category'];?></h2>
				<h2 style="width:100%" class="alert alert-success">Launched: <?php echo $_GET['department'];?></h2>
			  </div>
			  <div style="float:right">
			 <?php
			 $first_date=$_GET['closure_date'];
			 $second_date=$_GET['final_closure_date'];
			
			 $now = time(); // or your date as well
			//$your_date = strtotime("2018-01-01");
			$your_date1 = strtotime($first_date);
			$your_date2 = strtotime($second_date);
			$datediff1 = $your_date1 -$now;
			$datediff2 = $your_date2 -$now;
			$cd=round($datediff1 / (60 * 60 * 24)+1);
			$fcd=round($datediff2 / (60 * 60 * 24)+1);
			if($cd >0){
				echo "<h2  class='alert alert-success'>Remaining Closure Days : ". round($datediff1 / (60 * 60 * 24)+1)."</h2> ";
			}else{
				echo "<h2  class='alert alert-danger'>Closure Date Finished </h2> ";
			}

			if($fcd >0){
			echo "<h2 class='alert alert-success'>Remaining Final Closure Days : ". round($datediff2 / (60 * 60 * 24)+1)."</h2> ";
			}else{
				echo "<h2  class='alert alert-danger'>Final Closure Date Finished </h2> ";
			}
			//echo "Remaining Final Closure Days : ". round($datediff2 / (60 * 60 * 24));
			 
			 ?>
			  
			  </div>
            </div>
			<?php
			if($_SESSION['post']=='QAM'){
			?>
			<div class="box-header with-border">
					
					<!-- Delete Category -->
			<?php
			$category_id=$_GET['category_id'];
			$category=$_GET['category'];
			$closure_date=$_GET['closure_date'];
			$final_closure_date=$_GET['final_closure_date'];
			$query="SELECT * FROM  `idea` where category_id='$category_id' ";
			$result=mysqli_query($con,$query);
					if(mysqli_num_rows($result)>0){
						//while($row=mysqli_fetch_array($result, MYSQLI_ASSOC)){
						echo "<button type='submit' name='edit' class='btn btn-info '><a style='color:white' href='open_category.php?operation=edit_category&category_id=".$category_id."&category=".$category."&closure_date=".$closure_date."&final_closure_date=".$final_closure_date."'>Edit Category</a></button>";	
						//}
					}else{
						
						echo "<table>";
						
						echo "<tr>";
							echo "<td>";
									echo "<a style='color:white' href='open_category.php?operation=edit_category&category=".$category."&closure_date=".$closure_date."&final_closure_date=".$final_closure_date."'><button type='submit' name='edit' class='btn btn-info '>Edit Category</button></a>";	
							echo "</td>";
							
							echo "<td>";
										echo "<form action='delete_category.php' method='post'>
						<input type='hidden' name='category_id' value=".$category_id.">
						<button type='submit' class='btn btn-danger' name='delete'>Delete Category</button>
						
						</form>
						";
							echo "</td>";
						echo "</tr>";
						
						echo "</table>";
						
						
					}
			?>
				
            </div>
			<?php
				}
			?>
			<div class="box-header with-border" style="overflow-y: scroll; overflow-x:scroll;">
					
					<!-- Display the pie chart -->
				<div id="piechart"></div>
            </div>
			<div class="box-header with-border" style="overflow-y: scroll; overflow-x:scroll;">
					
					<!-- Display Most Viewed Idea -->
					<?php
					
					$query="SELECT MAX(counted),idea_id FROM(SELECT COUNT(v_id) as counted,idea_id FROM VIEW as v INNER JOIN idea as i on v.idea_id=i.id where i.category_id='$category_id' GROUP BY v.idea_id ) as Top_Idea";
					$result=mysqli_query($con,$query);
					if(mysqli_num_rows($result)>0){
						while($row=mysqli_fetch_array($result, MYSQLI_ASSOC)){
							$idea_id=$row['idea_id'];
							$view =$row['MAX(counted)'];
							//echo "Idea ID ".$idea_id;
							echo "<h3>Most Viewed Idea</h3>";
							//echo "<h5>Viewed ".$view."</h5>";
						}
					}
					
					?>
					
					    <!-- Main content -->
	<?php
	//$id=$_GET['id'];
	
	$query  = "SELECT * FROM  idea INNER JOIN users on idea.idea_author_id= users.uid INNER JOIN student on users.uid=student.std_id where idea.id='$idea_id'";
	//$query  = "SELECT * FROM  idea  where i_id='$id'";
	$res    = mysqli_query($con,$query);

	while($row=mysqli_fetch_array($res))
	{
		
		
	
	?>

	 <div class="col-md-12">
	 
	 
	 
	 
	 
          <!-- Box Comment -->
          <div class="box box-widget">
            <div class="box-header with-border">
              <div class="user-block">
                <img class="img-circle" src="<?php echo $row['photo'];?>" alt="User Image">
                <span class="username"><a href="#"><?php echo $row['first_name']." ".$row['last_name'];?></a></span>
                <span class="description">Published - <?php echo $row['date']." at ".$row['time']; ?></span>
              </div>
              <!-- /.user-block -->
              <div class="box-tools">
               
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <!-- post text -->
              <h3><?php echo  $row['idea_title']; ?> </h3>

              <p><?php echo  $row['idea_body']; ?></p>

              <!-- Attachment -->
<ul class="list-inline">
				
				
                   
				   <table>
					<tr>
		
					<td>
					<?php 
								  $attachment=$row['attachment'];
								  //echo "Attachment". $attachment;
								 if ($attachment !="") {
									
								  ?>
		<td>
		<li><a target="_blank" href="<?php echo "../../std_main/". $row['attachment'];?>"><button type="button" name="change" class="btn btn-success"><i class	="fa fa-download margin-r-5"></i> Attachment</button> </a></li>
		</td>
						
						 <?php
								 }else{
		echo "<td> <li> No Attachment</li></td>";
								 }

								  ?>
								  
					
					</tr>
				   </table>
					
                   </ul>

              <!-- /.attachment-block -->

              <!-- Social sharing buttons -->
              
              <span class="pull-right text-muted">
			  
			  
			  
			  <?php
			  //echo $id;
			  $query="select sum(unlike), sum(`like`) from likes where pid='$idea_id'";
				$result=mysqli_query($con,$query);
				//echo mysqli_error();
				if(mysqli_num_rows($result)>0){
					
				while($row=mysqli_fetch_array($result, MYSQLI_ASSOC)){
				$like=$row['sum(`like`)'];	
				$unlike=$row['sum(unlike)'];	
				echo $like ." Like(s) & ";
				echo $unlike ." Unlike(s)";
				}
				}else
				{
					echo "No Likes";
				}
			  ?> - 
			  <?php
			  
			  $query="SELECT COUNT(comment_id) from comment where idea_id='$idea_id'";
				$result=mysqli_query($con,$query);
					if(mysqli_num_rows($result)>0){
						while($row=mysqli_fetch_array($result, MYSQLI_ASSOC)){
					  //echo $row['d_name'];
					  $total=$row['COUNT(comment_id)'];
					  echo $total." Comment's ";
					}
				}
			  echo " -Viewed ".$view." Times";
			  ?>
			  
			  
			  
			  </span>
            </div>
            <!-- /.box-body -->
           
            
          </div>
          <!-- /.box -->
        </div>
	
	
	<?php
	}
	?>
				
            </div>
			<!-- Most Populer Idea-->
			<div class="box-header with-border">
			<h2>Most Populer Idea</h2>
				<?php
				
					$query="SELECT pid, (sum(`like`) - sum(unlike)) as mostLikes From likes group by pid order by (sum(`like`) - sum(unlike)) desc limit 1";
					$result=mysqli_query($con,$query);
					if(mysqli_num_rows($result)>0){
						while($row=mysqli_fetch_array($result, MYSQLI_ASSOC)){
						$idea_id=$row['pid'];
						$mostlikes=$row['mostLikes'];
						//echo $idea_id;
						//echo $mostlikes;
						
						}
					}
				$query="SELECT * FROM idea INNER JOIN users on idea.idea_author_id=users.uid INNER JOIN student on users.uid=student.std_id  where id='$idea_id'";
				$result=mysqli_query($con,$query);
					if(mysqli_num_rows($result)>0){
						while($row=mysqli_fetch_array($result, MYSQLI_ASSOC)){
				?>
				<div class="col-md-12">
	 
	 
	 
	 
	 
          <!-- Box Comment -->
          <div class="box box-widget">
            <div class="box-header with-border">
              <div class="user-block">
                <img class="img-circle" src="<?php echo $row['photo'];?>" alt="User Image">
                <span class="username"><a href="#"><?php echo $row['first_name']." ".$row['last_name'];?></a></span>
                <span class="description">Published - <?php echo $row['date']." at ".$row['time']; ?></span>
              </div>
              <!-- /.user-block -->
              <div class="box-tools">
               
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <!-- post text -->
              <h3><?php echo  $row['idea_title']; ?> </h3>

              <p><?php echo  $row['idea_body']; ?></p>

              <!-- Attachment -->
<ul class="list-inline">
				
				
                   
				   <table>
					<tr>
		
					<td>
					<?php 
								  $attachment=$row['attachment'];
								  //echo "Attachment". $attachment;
								 if ($attachment !="") {
									
								  ?>
		<td>
		<li><a target="_blank" href="<?php echo "../../std_main/". $row['attachment'];?>"><button type="button" name="change" class="btn btn-success"><i class	="fa fa-download margin-r-5"></i> Attachment</button> </a></li>
		</td>
						
						 <?php
								 }else{
		echo "<td> <li> No Attachment</li></td>";
								 }

								  ?>
								  
					
					</tr>
				   </table>
					
                   </ul>

              <!-- /.attachment-block -->

              <!-- Social sharing buttons -->
              
              <span class="pull-right text-muted">
			  
			  
			  
			  <?php
			  //echo $id;
			  $query="select sum(unlike), sum(`like`) from likes where pid='$idea_id'";
				$result=mysqli_query($con,$query);
				//echo mysqli_error();
				if(mysqli_num_rows($result)>0){
					
				while($row=mysqli_fetch_array($result, MYSQLI_ASSOC)){
				$like=$row['sum(`like`)'];	
				$unlike=$row['sum(unlike)'];	
				echo $like ." Like(s) & ";
				echo $unlike ." Unlike(s)";
				}
				}else
				{
					echo "No Likes";
				}
			  ?> - 
			  <?php
			  
			  $query="SELECT COUNT(comment_id) from comment where idea_id='$idea_id'";
				$result=mysqli_query($con,$query);
					if(mysqli_num_rows($result)>0){
						while($row=mysqli_fetch_array($result, MYSQLI_ASSOC)){
					  //echo $row['d_name'];
					  $total=$row['COUNT(comment_id)'];
					  echo $total." Comment's ";
					}
				}
			  echo " -Viewed ".$view." Times";
			  ?>
			  
			  
			  
			  </span>
            </div>
            <!-- /.box-body -->
           
            
          </div>
          <!-- /.box -->
        </div>
				
				
				
				<?php
						}
					}
				
				?>
			</div>
			<div class="box-body" style="max-height:auto; overflow-y: hidden; overflow-x:scroll;">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Idea Title</th>
                  <th>Idea Body</th>
				  
                  <th>Punlisher Name</th>
                   <th>Date</th>
                   <th>Time</th>
                   <th>Attachment</th>
                   <th>Details</th>
                </tr>
                </thead>
                <tbody>
				<?php
				$category=$_GET['category'];
				//$query="select * from idea where idea_category='$category'";
				$query="SELECT * FROM  `idea` INNER JOIN category on idea.category_id=category.c_id INNER JOIN users on idea.idea_author_id=users.uid where category.c_id='$category_id' ";
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
							
							echo "<td> <a style='color:white' href='idea_details.php?operation=select&id=".$row['id']."'><button type='submit' name='details' class='btn btn-info '><i class='icon-eye-open'></i>Details</button></a></td>";
							
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
              </div>
              </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
     
    </div>
    <strong>Copyright &copy; <?php echo date('Y');?> ideaBook</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
 <?php include('right_nav.php');?>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="bower_components/raphael/raphael.min.js"></script>
<script src="bower_components/morris.js/morris.min.js"></script>
<!-- Sparkline -->
<script src="bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- DataTables -->
<script src="bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- jvectormap -->
<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="bower_components/moment/min/moment.min.js"></script>
<script src="bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="//bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
 <script>
 $( function() {
    var dateFormat = 'dd-mm-yy',
      from = $( "#closure_date" )
        .datepicker({
          defaultDate: "+1w",
		   dateFormat: 'dd-mm-yy',
          changeMonth: true,
          numberOfMonths: 1
        })
        .on( "change", function() {
          to.datepicker( "option", "minDate", getDate( this ) );
        }),
      to = $( "#final_closure_date" ).datepicker({
        defaultDate: "+1w",
		 dateFormat: 'dd-mm-yy',
        changeMonth: true,
        numberOfMonths: 1
      })
      .on( "change", function() {
        from.datepicker( "option", "maxDate", getDate( this ) );
      });

    function getDate( element ) {
      var date;
      try {
        date = $.datepicker.parseDate( dateFormat, element.value );
      } catch( error ) {
        date = null;
      }

      return date;
    }
  } );
  </script>
 <script type="text/javascript">

  function insertData() {
    var student_name=$("#name").val();
    var student_roll_no=$("#closure_date").val();
    var student_class=$("#final_closure_date").val();


// AJAX code to send data to php file.
        $.ajax({
            type: "POST",
            url: "insert-data.php",
            data: {student_name:student_name,student_roll_no:student_roll_no,student_class:student_class},
            dataType: "JSON",
            success: function(data) {
             $("#message").html(data);
            $("p").addClass("alert alert-success");
            },
            error: function(err) {
            alert(err);
            }
        });

}

  </script>
</body>
</html>
<?php
	}
	else 
		header('location:../../login.php');
?>