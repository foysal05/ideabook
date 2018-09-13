<?php
session_start();
	date_default_timezone_set('Asia/Dhaka');
	if($_SESSION['login']==TRUE){

//session_start();
include("db.php");


if(!isset($_SESSION['user']))
{
    $_SESSION['user'] = session_id();
}
$uid = $_SESSION['id'];  // set your user id settings

if($_POST)  // AJAX request received section
{
    $pid    = mysqli_real_escape_string($connection,$_POST['pid']);  // product id
    $op     = mysqli_real_escape_string($connection,$_POST['op']);  // like or unlike op
    

    if($op == "like")
    {
        $gofor = "like";
    }
    elseif($op == "unlike")
    {
        $gofor = "unlike";
    }
    else
    {
        exit;
    }
    // check if alredy liked or not query
    $query = mysqli_query($connection,"SELECT * from `likes` WHERE pid='".$pid."' and uid='".$uid."'");
    $num_rows = mysqli_num_rows($query);

    if($num_rows>0) // check if alredy liked or not condition
    {
        $likeORunlike = mysqli_fetch_array($query);
    
        if($likeORunlike['like'] == 1)  // if alredy liked set unlike for alredy liked product
        {
            mysqli_query($connection,"update `likes` set `unlike`=1,`like`=0 where id='".$likeORunlike['id']."' and uid='".$uid."'");
            echo 2;
        }
        elseif($likeORunlike['unlike'] == 1) // if alredy unliked set like for alredy unliked product
        {
            mysqli_query($connection,"update `likes` set `like`=1,`unlike`=0 where id='".$likeORunlike['id']."' and uid='".$uid."'");
            echo 2;
        }
    }
    else  // New Like
    {
       mysqli_query($connection,"INSERT INTO `likes` (`pid`,`uid`, `$gofor`) VALUES ('$pid','$uid','1')");
       echo 1;
    }
    exit;
}





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
        
<nav class="navbar navbar-default main" role="navigation">
  <!-- Brand and toggle get grouped for better mobile display -->
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="index.php">ideaBook</a>
  </div>
<style>
	  .dropdown-menu>li>a{
		  color:white;
	  }
	  .navbar-default .navbar-nav>li>a{
		   color:white;
	  }
	  .navbar-default .navbar-brand{
		   color:white;
	  }
	  .navbar-default .navbar-nav>.open>a, .navbar-default .navbar-nav>.open>a:focus, .navbar-default .navbar-nav>.open>a:hover{
		  background-color:#337AB7;
	  }
	  </style>
  <!-- Collect the nav links, forms, and other content for toggling -->
  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    <ul class="nav navbar-nav">
     
    </ul>
	
    <?php include('../student_search.php');?>
	
    <ul class="nav navbar-nav navbar-right" style="backgruund-color:#337AB7">
      <li><a href="../profile.php"><?php 

			echo $_SESSION['name'];
		


	  ?></a></li>
      <li class="active"><a href="index.php">Home</a></li>
      <li><a href="message.php">Message</a></li>
      <li class="dropdown" style="backgruund-color:#337AB7">
	  
        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fas fa-cogs"></i> <b class="caret"></b></a>
        <ul class="dropdown-menu">
          
          <li><a href="#">Account Setting</a></li>
          <li><a href="#">Something else here</a></li>
          <li class="divider"></li>
          <li><a href="../logout.php">Logout</a></li>
        </ul>
      </li>
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
  
  <div class="row content" style="height:auto;">
   <div class="col-sm-3 sidenav">
      <h4></h4>
      <ul class="nav nav-pills nav-stacked">
	  
		<?php
		if($_SESSION['user_type']=='STAFF'){
			//echo $_SESSION['user_type'];
			?>
		
		
        <li><a href="#section2"><?php echo $_SESSION['name']; ?></a></li>
		<li ><a href="../admin/control/index.php">Control</a></li>
        <li class="active"><a href="index.php">Home</a></li>
        <li><a href="timeline.php">Timeline</a></li>
        
			<?php
		}else{
			?>
			<li ><a href="index.php">Home</a></li>
			<li><a href="timeline.php">Timeline</a></li>
			<li class="active"><a href="profile.php">Profile</a></li>
			
			<li><a href="#section3">Photos</a></li>
			
			<?php
				
			}
			
			?>
	  
	  
        
		
      </ul><br>
      
	  <br>
	  <div class="panel panel-default">
		<div style="height:200px">
        <img src="../image/ib.png" height="100%" width="70%"><strong style="color:#337AB7; font-size:1.4em">ideaBook</strong>
		</div>
      </div>
	  
    </div>
		<div class="col-sm-6 sidenav">
		<?php include('profile_info.php');?>
		</div>
		<div class="col-sm-3 sidenav" style="background-color:#F5F5F5">
      
      <ul class="nav nav-pills nav-stacked">
	 
		
	
	<li><a href="#section2">Profile</a></li>
	<li><a href="#section3">Messages</a></li>
	<li><a href="#section3">Account Setting</a></li>
	<li><a href="../logout.php">Logout</a></li>
	
	  
        
		
      </ul><br>
      <div class="panel panel-default">
		<div style="max-height:600px;overflow-y: scroll; font-size:1em; font-family: "Comic Sans MS", cursive, sans-serif>
        <div style="border-bottom:1px solid gray; font-size:2em; padding-left:20%">Latest Notice</div>
        
		<p style="margin:5px">Get the latest BBC World News: international news, features and analysis from Africa, the Asia-Pacific, Europe, Latin America, the Middle East, South Asia, and the United States and ... Also in the News. A Hindu devotee, smeared in coloured powder, takes a rest on a road during ... Do you have a secret British accent?</p>
		</div>
      </div>
	  
    </div>
	</div>


<!-- content end here -->
  

   

   

<footer class="container-fluid text-center" style="background-color:#286090; margin-top:10px;">
  <p>IdeaBook &copy; <?php echo date('Y');?></p>
  <?php echo $_SESSION['user_type'];?>
  
</footer>

</body>


</html>
<?php
	
	}else 
		header('location:../login.php');
?>