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
      <!-- Sidebar user panel -->
     
     
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
<?php include('left_nav.php');?>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Staff Profile
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="student.php">Student</a></li>
        <li class="active">Staff profile</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-md-3">
<?php
$id=$_GET['id'];
$query="select * from users INNER JOIN staff on users.uid=staff.s_id INNER JOIN department on staff.department_id=department.d_id where users.uid='$id' ";
					$result=mysqli_query($con,$query);
					if(mysqli_num_rows($result)>0){
						while($row=mysqli_fetch_array($result, MYSQLI_ASSOC)){
							
?>
          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="<?php echo $row['photo']?>" alt="User profile picture">

              <h3 class="profile-username text-center"><?php echo $row['first_name']. " ".$row['last_name']?></h3>

              <p class="text-muted text-center"><?php echo $row['user_type']?></p>
              <p class="text-muted text-center">Staff ID: <?php echo $row['uid']?></p>

              <ul class="list-group list-group-unbordered">
			   <li class="list-group-item">
                  <b>Account Status</b> <a class="pull-right"><?php echo $row['status']?></a>
                </li>
			  <li class="list-group-item">
                  <b>Joinning Date</b> <a class="pull-right"><?php echo $row['joinning_date']?></a>
                </li>
                
                <li class="list-group-item">
                  <b>Total Comments</b> <a class="pull-right">
				  <?php
				  
				  $query="select count(comment_id)  from comment where comment_author_id='$id'";
				$result=mysqli_query($con,$query);
				//echo mysqli_error();
				if(mysqli_num_rows($result)>0){
					
				while($row=mysqli_fetch_array($result, MYSQLI_ASSOC)){
				$mark=$row['count(comment_id)'];	
				echo $mark. " Comment's";
				}
				}else
				{
					echo "No Comment";
				}
				
				  
				  
				  
				  ?>
				  
				  </a>
                </li>
               <div class="box-footer">
              <form action="send_message.php" method="post">
                <div class="input-group">
				<input type="hidden" name="receiver" value="<?php echo $id;?>">
                  <input type="text" name="message" placeholder="Type Message ..." class="form-control">
                      <span class="input-group-btn">
                        <button type="submit" name="from_profile" class="btn btn-primary btn-flat">Send</button>
                      </span>
                </div>
              </form>
            </div> 
              </ul>
<?php


$query="SELECT * FROM users where uid='$id'";
$result=mysqli_query($con,$query);
if(mysqli_num_rows($result)>0){
	while($row=mysqli_fetch_array($result, MYSQLI_ASSOC)){
		if($row['status']=='Activate'){
			echo " <a style='color:white;' href='change_status.php?operation=change_s&id=".$_GET['id']."&status=Dectivate'><button type='submit' name='change_status' class='btn btn-success btn-block'><i class='icon-eye-open'></i>Dectivate</button></a>";
		}else{
			echo " <a style='color:white' href='change_status.php?operation=change_s&id=".$_GET['id']."&status=Activate'><button type='submit' name='change_status' class='btn btn-danger btn-block'><i class='icon-eye-open'></i>Activate</button></a>";
		}
	}
}

?>
		
		<!--<form action="" method="post">
			<input type="hidden" name="uid" value="<?php //echo $id;?>">
			<input type="hidden" name="status" value="Deactivate">
			
              <input type="submit" name="deactivate" class="btn btn-primary btn-block" value="Deactivate">
		</form>-->
            </div>
            <!-- /.box-body -->
          </div>

        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#activity" data-toggle="tab">Timeline</a></li>
             
            </ul>
            <div class="tab-content">
			
              <div class="active tab-pane" id="activity">
			  
			  
			  <?php
			  $query="SELECT * FROM comment INNER JOIN staff on comment.comment_author_id=staff.s_id INNER JOIN users on staff.s_id=users.uid  where comment_author_id='$id'";
					$result=mysqli_query($con,$query);
					if(mysqli_num_rows($result)>0){
						while($row=mysqli_fetch_array($result, MYSQLI_ASSOC)){
			 
			  
			  
			  ?>
                <!-- Post -->
                <div class="post">
                  <div class="user-block">
                    <img class="img-circle img-bordered-sm" src="<?php echo $row['photo']; ?>" alt="user image">
                        <span class="username">
                          <a><?php echo $row['first_name']. " ".$row['last_name'];?></a>
                          
                        </span>
                    <span class="description">Shared publicly - <?php echo $row['date']." at ".$row['time'];?></span>
                  </div>
                  <!-- /.user-block -->
				  <h3><?php //echo "Category: ". $row['category_name'];?></h3>
				  <h2><?php //echo $row['idea_title'];?></h2>
                  <p>
                    <?php echo "<h3>Comment: </h3>". $row['comment_body'];?>
                  </p>
				   
                  <ul class="list-inline">
				
				
                   
				   
					
                   </ul>

                 
                </div>
                <!-- /.post -->

                <?php
				
				
						}
					}
			  
			  ?>

                
              </div>
         

              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
   <footer class="main-footer">
    <div class="pull-right hidden-xs">
     
    </div>
    <strong>Copyright &copy; <?php echo date('Y');?> ideaBook</strong> All rights
    reserved.
  </footer>


  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->
<?php
						}
					}
?>
<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
</body>
</html>
<?php
	}
	else 
		header('location:../../login.php');
?>