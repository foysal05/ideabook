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


	<!-- Main content -->
	<?php
	$id=$_GET['id'];

	$query  = "SELECT * FROM  idea INNER JOIN users on idea.idea_author_id= users.uid INNER JOIN student on idea.idea_author_id=student.std_id where idea.id='$id'";
	//$query  = "SELECT * FROM  idea  where i_id='$id'";
	$res    = mysqli_query($con,$query);

	while($row=mysqli_fetch_array($res))
	{
	$std_id=$row['uid'];


	?>

	<div class="col-md-12">
	<!-- Box Comment -->
	<div class="box box-widget">
	<div class="box-header with-border">
	<div class="user-block">
	<img class="img-circle" src="<?php echo $row['photo'];?>" alt="User Image">
	<?php
	if($row['department_id']==$_SESSION['department'] or $_SESSION['id']==7){

	?>
	<span class="username"><a href="student_profile.php?id=<?php echo $row['uid']?>"> <?php echo $row['first_name']." ".$row['last_name'];?></a></span>

	<?php

	}
	/*else if($_SESSION['id']='7'){

	?>
	<span class="username"><a href="student_profile.php?id=<?php echo $row['uid']?>"> <?php echo $row['first_name']." ".$row['last_name'];?></a></span>

	<?php

	}*/
	else{
	?>
	<span class="username"><a> <?php echo $row['first_name']." ".$row['last_name'];?></a></span>

	<?php
	}
	?>

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

	<?php 
	$exc;
	$query="SELECT id,idea_author_id,student.department_id,idea_status,std_id FROM idea INNER JOIN student on idea.idea_author_id=student.std_id INNER JOIN staff on student.department_id=staff.department_id where student.department_id='".$_SESSION['department']."' and idea_author_id='$std_id'";
	$result=mysqli_query($con,$query);
	if(mysqli_num_rows($result)>0){
	$exc="Own";
	if($row['idea_status']=='Active'){

	?>
	<td>
	<form action="change_idea_status.php" method="post">
	<input type="hidden" name="id" value="<?php echo $row['id'];?>">
	<input type="hidden" name="uid" value="<?php echo $_GET['id'];?>">
	<input type="hidden" name="status" value="Block">
	<li><button type="submit" name="change_from_admin" class="btn btn-success"><i class="fa fa-lock margin-r-5"></i> Block</button></li>
	</form>
	<?php

	}else{

	?>
	<form action="change_idea_status.php" method="post">
	<input type="hidden" name="id" value="<?php echo $row['id'];?>">
	<input type="hidden" name="uid" value="<?php echo $_GET['id'];?>">
	<input type="hidden" name="status" value="Active">
	<button type="submit" name="change_from_admin" class="btn btn-danger"><i class="fa fa-unlock margin-r-5"></i> Unblock</button>
	</form>



	<?php
	$idea=$row['id'];
	}

	?>

	</td>
	<td>
	<form action="delete_idea.php" method="post">
	<input type="hidden" name="id" value="<?php echo $row['id'];?>">

	<button type="submit" name="delete" class="btn btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
	</form>
	</td>	
	<?php
	//}
	}else{
	$exc="Another";
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
	$query="select sum(unlike), sum(`like`) from likes where pid='$id'";
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

	$query="SELECT COUNT(comment_id) from comment where idea_id='$id'";
	$result=mysqli_query($con,$query);
	if(mysqli_num_rows($result)>0){
	while($row=mysqli_fetch_array($result, MYSQLI_ASSOC)){
	//echo $row['d_name'];
	$total=$row['COUNT(comment_id)'];
	echo $total." Comment's";
	}
	}

	?>



	</span>
	</div>
	<!-- /.box-body -->
	<div class="box-footer box-comments">

	<?php
	$idea=$_GET['id'];
	$query="select * from comment INNER JOIN users on comment.comment_author_id=users.uid INNER JOIN student on users.uid=student.std_id where idea_id='$id' ";
	$result=mysqli_query($con,$query);
	if(mysqli_num_rows($result)>0){
	while($row=mysqli_fetch_array($result, MYSQLI_ASSOC)){

	?>


	<div class="box-comment">
	<!-- User image -->
	<img class="img-circle img-sm" src="<?php echo $row['photo'];?>" alt="User Image">

	<div class="comment-text">
	<span class="username">
	<a href="student_profile.php?id=<?php echo $row['uid']?>">  <?php echo $row['first_name']." ".$row['last_name'];?></a>
	<span class="text-muted pull-right"><?php echo $row['date']." at ".$row['time'];?></span>
	</span><!-- /.username -->
	<?php echo $row['comment_body'];?>
	</div>
	<!-- /.comment-text -->

	<?php
	//echo "Exception Value ". $exc;

	?>
	<?php
	if($exc=="Own"){



	?>
	<button class="btn btn-danger"><a style="color:white;" href="change_status.php?operation=delete_comment&idea_id=<?php echo $id;?>&cid=<?php echo $row['comment_id'];?>">Delete</a></button>
	<?php
	}

	?>
	</div>
	<?php
	}
	}
	?>

	</div>

	</div>
	<!-- /.box -->
	</div>


	<?php
	}
	?>





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