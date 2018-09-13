<?php
session_start();
	date_default_timezone_set('Asia/Dhaka');
	if($_SESSION['login']==TRUE AND $_SESSION['status']=='Activate'){

//session_start();
include("db.php");



?>


<html>
	<head>
  <title>ideaBook</title>
	<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
	<link rel="icon" href="favicon.ico" type="image/x-icon">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
	  <link rel="stylesheet" href="../css/bootstrap.css">
	  <link rel="stylesheet" href="../css/bootstrap.min.css">
	  <link href="../css/sb-admin-2.css" rel="stylesheet">
	  <link rel="stylesheet" href="../css/style.css">
	  <link rel="stylesheet" href="../css/file_upload.css">
	  <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet">
	  <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.1/themes/base/minified/jquery-ui.min.css" type="text/css" /> 
	  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
  
  
  <!-- sweet alert box-->
  
	  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	  <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
	  <script src="../js/file_upload.js"></script>
	  <script src="../js/checkbox.js"></script>
   
   <script type="text/javascript" src="jquery-1.8.0.min.js"></script>
    <script type="text/javascript" src="script.js"></script>
    <link href="style.css" rel="stylesheet" type="text/css" />
</head>
<body >
        
<nav class="navbar navbar-inverse" style="background-color:#428BCA; border-color:#428BCA" role="navigation">
  <!-- Brand and toggle get grouped for better mobile display -->
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand">ideaBook</a>
  </div>
<style>
.navbar-inverse .navbar-nav>li>a{
	color:#FFFFFF;
}
.navbar-inverse .navbar-brand{
	color:#FFFFFF;
}
.navbar-inverse .navbar-nav>.active>a, .navbar-inverse .navbar-nav>.active>a:hover, .navbar-inverse .navbar-nav>.active>a:focus{
	color: white;
	background-color:#428C02;
}
.dropdown-menu>li>a{
	color:white;
}
.navbar-inverse .navbar-nav>.open>a, .navbar-inverse .navbar-nav>.open>a:hover, .navbar-inverse .navbar-nav>.open>a:focus{
		 background-color:#428C02;
	 }
	  
	  </style>
  <!-- Collect the nav links, forms, and other content for toggling -->
  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    <ul class="nav navbar-nav">
     
    </ul>
	
    
	
    <ul class="nav navbar-nav navbar-right" style="backgruund-color:#337AB7">
			  
				  
			 
	 <li><a><?php echo $_SESSION['name'];?></a></li>
      
      <li><a href="../logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
     
	  <li><a href="index.php"></a></li>
	  <li><a href="index.php"></a></li>
      
    </ul>
  </div><!-- /.navbar-collapse -->
</nav>
<script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="http://code.jquery.com/ui/1.10.1/jquery-ui.min.js"></script>	
<script>
$(function() {
    $( "#std" ).autocomplete({
        source: '../user_search.php'
    });
});
</script>
  
  <div style="color:white; display:none">
               <?php //include('../admin/control/update_category_status.php');?>
			   </div>

  
  
  <!-- Content here -->
  <div class="container-fluid" style="height:auto;">
  
  <div class="row content" style="height:auto;width:100%">
   <div class="col-sm-3 sidenav">
      <h4></h4>
      <br>
      
	  <br>
	  <div class="panel panel-default">
		<div style="height:200px">
        <img src="../image/ib.png" height="100%" width="70%"><strong style="color:#337AB7; font-size:1.4em">ideaBook</strong>
		</div>
      </div>
	  
    </div>
		<div class="col-sm-6">
		
		<div class="panel panel-default">
			<div class="panel-heading">Update Password</div>
			<div class="panel-body">
			
			<script type="text/javascript">
				$(document).ready(function() {
					$('#example-progress-bar-hierarchy').strengthMeter('progressBar', {
						container: $('#example-progress-bar-hierarchy-container'),
						hierarchy: {
							'0': 'progress-bar-danger',
							'10': 'progress-bar-warning',
							'15': 'progress-bar-success'
						}
					});
				});
			</script>
			
			<?php
			//echo $_SESSION['email'];
			//echo $_SESSION['password'];
			require('db.php');
			if(isset($_POST['update'])){
				
				$email = $_SESSION['email'];
				$password = mysqli_real_escape_string($con, $_POST['current']);
				$new_password=$_POST['new_password'];
				$p_length=strlen($new_password);
				//echo $p_length;
				if($p_length <=5){
					echo "<div class='alert alert-danger'>
						  <strong>Warning!</strong> New Password Should be Minimum  6 Character .
						</div>";
				}else{
					$result = mysqli_query($con, "SELECT * FROM users WHERE email = '" . $email. "' and password = '" . $password. "'");
				if ($row = mysqli_fetch_array($result)) {
					
					$query="UPDATE users set password='$new_password' where email='$email'";
					if(mysqli_query($con,$query)){
						echo "<div class='alert alert-success'>
						  <strong>Updated!</strong> Password Successfuly Updated. Now do Logout and Login again
						</div>";
				}
					
					
				}else{
					echo "<div class='alert alert-danger'>
					  <strong>Wrong!</strong> Inputed Current Password is Wrong.
					</div>";
				}
				}
			
				
				
			}
			
			
			
			
			?>
			
			
			
			
			<form autocomplete="off" method="post" action="must_change.php">
				  
				  <div class="form-group row">
					<label for="inputPassword" class="col-sm-3 col-form-label">Current Password</label>
					<div class="col-sm-8" style="fload:right">
					  <input type="password" name="current" class="form-control" required id="inputPassword" placeholder="Current Password">
					  
					</div>
				  </div>
				   <div class="form-group row">
					<label for="inputPassword" class="col-sm-3 col-form-label">New Password</label>
					<div class="col-sm-8">
					  <input type="password" name="new_password" onblur="checkLength(this)" class="form-control" id='password'  maxlength="30" required placeholder="New Password">
					</div>
				  </div>
				  <script>
				  function checkLength(el) {
					  if (el.value.length <= 5) {
						alert("New Password Should be Minimum  6 Character")
					  }
					}
				  </script>
				   <div class="form-group row">
					<label for="inputPassword" class="col-sm-3 col-form-label">Confirm Password</label>
					<div class="col-sm-8">
					  <input type="password" name="confirm_password" class="form-control" id='confirm_password' required  placeholder="Confirm Password">
					</div>
				  </div>
				   <div class="form-group row">
					
					<div class="col-sm-8" style="margin-left:40%">
					  <input type="submit" name="update" value="Update"  class="btn btn-success">
					</div>
				  </div>
			</form>
			<script>
			var password = document.getElementById("password")
  , confirm_password = document.getElementById("confirm_password");

function validatePassword(){
  if(password.value != confirm_password.value) {
    confirm_password.setCustomValidity("Passwords Don't Match");
  } else {
    confirm_password.setCustomValidity('');
  }
}

password.onchange = validatePassword;
confirm_password.onkeyup = validatePassword;
			
			
			</script>
			</div>
		</div>
           
           
            

			
        </div>
	<div class="col-sm-2 sidenav" style="background-color:#F5F5F5; float:right">
      
      <ul class="nav nav-pills nav-stacked">
	 
		
	
	
	<li class="active"> <a href="password_change.php">Account Setting</a></li>
	<li><a href="../logout.php">Logout</a></li>
	
	  
        
		
      </ul><br>
     
	  
    </div>
	</div>


<!-- content end here -->
  

   

   

<footer class="container-fluid text-center" style="background-color:#286090; margin-top:10px;">
  <p>IdeaBook &copy; <?php echo date('Y');?></p>
  <?php echo $_SESSION['user_type'];?>
  
</footer>

</body>


</html>
<script>
$(document).ready(function(){
 
 function load_unseen_notification(view = '')
 {
  $.ajax({
   url:"fetch_message.php",
   method:"POST",
   data:{view:view},
   dataType:"json",
   success:function(data)
   {
    $('.dm_m').html(data.notification);
    if(data.unseen_notification > 0)
    {
     $('.count').html(data.unseen_notification);
    }
   }
  });
 }
 
 load_unseen_notification();
 
				/* $('#comment_form').on('submit', function(event){
				  event.preventDefault();
				  if($('#subject').val() != '' && $('#comment').val() != '')
				  {
				   var form_data = $(this).serialize();
				   $.ajax({
					url:"insert.php",
					method:"POST",
					data:form_data,
					success:function(data)
					{
					 $('#comment_form')[0].reset();
					 load_unseen_notification();
					}
				   });
				  }
				  else
				  {
				   alert("Both Fields are Required");
				  }
				 });*/
 
 $(document).on('click', '.dt_m', function(){
  $('.count').html('');
  load_unseen_notification('yes');
 });
 
 setInterval(function(){ 
  load_unseen_notification();; 
 }, 5000);
 
});
</script>
<?php
	
	}else 
		header('location:../login.php?deactivate');
?>