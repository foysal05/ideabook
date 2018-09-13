     
 <?php
$id=$_SESSION['id'];
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
 <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo $row['photo'];?>" class="img-circle" alt="User Image">
        </div>
		
        <div class="pull-left info">
          <p><?php echo $_SESSION['name'];?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
<?php
						}
					}
?>

	 <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        
		 
		 <li>
          <a href="../../std_main/index">
            <i class="fa fa-newspaper-o" aria-hidden="true"></i>
            <span>Timeline</span>
            
          </a>
		  </li>
		  <li>
          <a href="index">
            <i class="fa fa-home" aria-hidden="true"></i>
            <span>Home</span>
            
          </a>
		  </li>
		  <?php
			if($_SESSION['post']=='QAM'){
				echo"
					<li>
				  <a href='staff'>
					<i class='fa fa-users'></i>
					<span>Staff</span>
					
				  </a>
				  </li>
				<li>
          <a href='account'>
            <i class='fa fa-cogs'></i>
            <span>Users Account</span>
            
          </a>
		  </li>
		   <li>
          <a href='student'>
            <i class='fa fa-users'></i>
            <span>Student</span>
            
          </a>
		  </li>
				";
			}
		  
		  
		  ?>
		  <li>
          <a href="open_category">
            <i class="fa fa-calendar" aria-hidden="true"></i>
            <span>Category</span>
            
          </a>
		  </li>
		  <?php
		  if($_SESSION['post']=='QAC'){
			  
		  
		  ?>
		   <li>
          <a href="department_idea">
            <i class="fa fa-users"></i>
            <span>Departmental Idea</span>
            
          </a>
		  </li>
		  <li>
          <a href="qac_student?d_id=<?php echo $_SESSION['department'];?>">
            <i class="fa fa-users"></i>
            <span>Departmental Student</span>
            
          </a>
		  </li>
		  <?php
		  }
		  ?>
		
		  
		<li>
          <a href="message">
            <i class="fa fa-comment"></i>
            <span>Messages</span>
            
          </a>
		  </li>
		  
        <li class="treeview">
          <a href="#">
            <i class="fa fa-folder"></i> <span>Reports</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="most"><i class="fa fa-circle-o"></i> Report on Idea</a></li>
            <li><a href="without_comment"><i class="fa fa-circle-o"></i> Report on Comment</a></li>
            
            
          </ul>
        </li>
      
      
       
       
      </ul>