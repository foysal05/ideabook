  <header class="main-header">
    <!-- Logo -->
    <a href="index.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>i</b>B</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>ideaBook</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          
     
		 <?php
$id=$_SESSION['id'];
$post=$_SESSION['post'];
if($_SESSION['post']=='QAM'){
	
	//echo "<script>alert('QAM');</script>";
	$query="select * from users INNER JOIN staff on users.uid=staff.s_id where users.uid='$id' ";
}else{
	//echo "<script>alert('QAC');</script>";
	$query="select * from users INNER JOIN staff on users.uid=staff.s_id INNER JOIN department on staff.department_id=department.d_id where users.uid='$id' ";
}

					$result=mysqli_query($con,$query);
					if(mysqli_num_rows($result)>0){
						while($row=mysqli_fetch_array($result, MYSQLI_ASSOC)){
							
?>
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?php echo $row['photo'];?>" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo $_SESSION['name'];?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?php echo $row['photo'];?>" class="img-circle" alt="User Image">

                <p>
				
                  <?php
				  if($_SESSION['post']=='QAM'){
					  echo $row['first_name']. " ".$row['last_name']. " - ".$row['post'];
				  }else{
					  echo $row['first_name']. " ".$row['last_name']. " - ".$row['post']." (".$row['d_name']. " )";
				  }
				  ?> 




				  
                  <small>Work since <?php echo $row['joinning_date'];?></small>
                </p>
              </li>
              <!-- Menu Body -->
              
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="../../std_main/password_change.php" class="btn btn-default btn-flat">Account Setting</a>
                </div>
                <div class="pull-right">
                  <a href="../../logout.php" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
		  <?php
						}
					}
		  ?>
          
        </ul>
      </div>
    </nav>
  </header>