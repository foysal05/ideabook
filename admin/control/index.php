<?php
session_start();
	include ('../db.php');
	if($_SESSION['user_type']=='STAFF'){
?>

<!DOCTYPE html>
<html>
<?php include('head.php');?>
<?php
$result = $con->query("SELECT  count(id),department,category_id FROM  idea GROUP BY department");

?>
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
        title: 'Department wise Overall Contribution',
        width: 900,
        height: 500,
    };
    
    var chart = new google.visualization.PieChart(document.getElementById('piechart'));
    
    chart.draw(data, options);
}
</script>
<?php
	   $result = $con->query("SELECT count(idea_author_id),department from (SELECT idea_author_id,department from idea inner join users on idea.idea_author_id=users.uid inner join student on users.uid=student.std_id  group by idea_author_id) AS SUBQUERY GROUP BY department");
	   
	   ?>
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
			  $mark=$row['count(idea_author_id)'];
            //echo "['".$row['count(id)']."', ".$row['d_id']."],";
            echo "['".$row['department']."', ".$row['count(idea_author_id)']."],";
          }
      }
      ?>
    ]);
    
    var options = {
        title: 'Department wise Contributior',
        width: 900,
        height: 500,
    };
    
    var chart = new google.visualization.PieChart(document.getElementById('piechart2'));
    
    chart.draw(data, options);
}
</script>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

<?php include('header_top.php');?>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
     
<?php include('left_nav.php');?>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
     
      <ol class="breadcrumb">
        <li><a><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
      <!-- Info boxes -->
      <div class="row">
	   <div class="row">
        <div class="col-lg-3 col-xs-12">
          
        </div>
        </div>
	  <?php
	  $query="SELECT count(std_id), department_id,d_name from student INNER JOIN department on student.department_id=department.d_id GROUP BY department_id ";
	  $result=mysqli_query($con,$query);
				
				if(mysqli_num_rows($result)>0){
					
				while($row=mysqli_fetch_array($result, MYSQLI_ASSOC)){
	  
	  ?>
	  
	 
	  
	  
	  
	  
	  
        <div class="col-md-3 col-sm-6 col-xs-12">
		
			<!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?php echo $row['d_name'];?></h3>

              <p><?php echo "Students: ". $row['count(std_id)'];?></p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="<?php echo "dep_student.php?operation=select&d_id=".$row['department_id']."";?>" class="small-box-footer">
              More info <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
			
		
		
		
		
          
          <!-- /.info-box -->
        </div>
		<?php
				}
				}
		?>
       
      </div>
	  </br>

    <!-- /.content -->
	
	
			
		<div class="box-header with-border">
					
	<div class="container">
  
  <ul style="color:black" class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#home">Department Wise Contribution</a></li>
    <li><a data-toggle="tab" href="#menu1">Department Wise Contributior</a></li>
    
  </ul>

  <div class="tab-content">
    <div id="home" class="tab-pane fade in active">
      <h3>Department Wise Contribution</h3>
     <div style=" overflow-y: scroll; height: 500px;" id="piechart"></div>
    </div>
    <div id="menu1" class="tab-pane fade">
      <h3>Department wise Contributior</h3>
       
	   <div style=" overflow-y: scroll; height: 500px;" id="piechart2"></div>
    </div>
   
  </div>
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
 <?php //include('right_nav.php');?>
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
<!-- jvectormap -->
<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="bower_components/moment/min/moment.min.js"></script>
<script src="bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
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
</body>
</html>
<?php
	}
	else 
		header('location:../../login.php');
?>