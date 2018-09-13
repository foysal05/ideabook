<?php
session_start();
	include ('../db.php');
	if($_SESSION['user_type']=='STAFF'){
?>

<!DOCTYPE html>
<html>
<?php include('head.php');?>
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
    
</br>
    <!-- Main content -->
 <!-- general form elements -->

			<div class="box-body" style="max-height:400px; overflow-y: hidden; overflow-x:scroll;">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID:</th>
                  <th>Full Name</th>
				  
                  <th>Session</th>
                  <th>Department</th>
                   <th>Details</th>
                </tr>
                </thead>
                <tbody>
				<?php
				$department=$_GET['d_id'];
				//echo $department;
				$query="select * from users INNER JOIN student on users.uid=student.std_id INNER JOIN department on student.department_id=department.d_id where student.department_id='$department' ";
					$result=mysqli_query($con,$query);
					if(mysqli_num_rows($result)>0){
						while($row=mysqli_fetch_array($result, MYSQLI_ASSOC)){
							echo "<tr>";
							echo "<td>".$row['std_id']."</td>";
							echo "<td>".$row['first_name']. " ".$row['last_name']."</td>";
							
							
							
							echo "<td>".$row['session']."</td>";
							echo "<td>".$row['d_name']."</td>";
							echo "<td> <button type='submit' name='details' class='btn btn-info'><i class='icon-eye-open'></i><a style='color:white' href='student_profile.php?operation=select&id=".$row['std_id']."'>Details</button></td>";
							
							echo "</tr>";
						}
					}
				
				?>
				
                </tbody>
                <tfoot>
                <tr>
                 <th>ID:</th>
                  <th>Full Name</th>
				  
                  <th>Session</th>
                  <th>Department</th>
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
    var dateFormat = 'yy-mm-dd',
      from = $( "#closure_date" )
        .datepicker({
			minDate: 0,
          defaultDate: "+1w",
		   dateFormat: 'yy-mm-dd',
          changeMonth: true,
          numberOfMonths: 1
        })
        .on( "change", function() {
          to.datepicker( "option", "minDate", getDate( this ) );
        }),
      to = $( "#final_closure_date" ).datepicker({
        defaultDate: "+1w",
		 dateFormat: 'yy-mm-dd',
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