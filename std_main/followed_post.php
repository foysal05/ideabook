<?php
session_start();
date_default_timezone_set('Asia/Dhaka');
if($_SESSION['login']==TRUE AND $_SESSION['status']=='Activate'){

//session_start();
include("db.php");
include("../db.php");

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
    
<nav class="navbar navbar-inverse" style="background-color:#428BCA; border-color:#428BCA" role="navigation">
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
		  
			  <li class="dropdown">
			   <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="label label-pill label-danger count" style="border-radius:10px;"></span> <span class="glyphicon glyphicon-envelope" style="font-size:18px;"></span></a>
			   <ul class="dropdown-menu"></ul>
			  </li>
		 
 <li><a href="timeline.php"><?php echo $_SESSION['name'];?></a></li>
  <li class="active"><a href="index.php">Home</a></li>
  <li><a href="#"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
 
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
  <ul class="nav nav-pills nav-stacked">
  
	<?php
	if($_SESSION['user_type']=='STAFF'){
		//echo $_SESSION['user_type'];
		?>
	
	
    
    <li><a ><?php echo $_SESSION['name']; ?></a></li>
	<li ><a href="../admin/control/index">Control</a></li>
    <li ><a href="index">Home</a></li>
    <li class="active"><a href="timeline">Timeline</a></li>
	<li><a href="message?std">Message</a></li>
		<?php
	}else{
		?>
		<li ><a href="index">Home</a></li>
		<li class="active"><a href="timeline">Timeline</a></li>
		<li><a href="category">Idea Category</a></li>
		<li><a href="message">Message</a></li>
		
		
		
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
	<div class="col-sm-6">
       <?php
		if($_SESSION['user_type']=='STD'){
			include('idea_post.php');
		}else{
			
		}
		
	?>
        <?php //include('comment_post.php'); ?>
<div class="btn-group btn-group-justified">
<a href="timeline.php" class="btn btn-primary">All Post</a>
<a href="my_post.php" class="btn btn-primary">My Post</a>
<a href="followed_post.php" class="btn btn-primary">Followed Post</a>
</div>
<br>
<div class="btn-group btn-group-justified">
<label class="btn btn-success">Following Posts </label>
</div>
<br>
<br>
        
        <?php 
$query  = "
SELECT * FROM  favourite INNER JOIN idea on idea.id=favourite.idea_id INNER JOIN category on idea.category_id=category.c_id INNER JOIN users on idea.idea_author_id=users.uid where idea_lover_id='".$_SESSION['id']."' and idea_status='Active'  order by idea.id DESC "; 
$res    = mysqli_query($connection,$query);

while($row=mysqli_fetch_array($res))
{
if($row['author_type']==""){
	$author=$row['first_name'];	
	
	
	}else{
		$author=$row['author_type'];
	}
	$id=$row['id'];
	$c_id=$row['category_id'];
// get likes and dislikes of a product
$query = mysqli_query($connection,"select sum(`like`) as `like`,sum(`unlike`) as `unlike` from `likes` where pid = ".$row['id']);
$rowCount = mysqli_fetch_array($query);
if($rowCount['like'] == "")
    $rowCount['like'] = 0;
    
if($rowCount['unlike'] == "")
    $rowCount['unlike'] = 0;
    
if($uid == "") // if user not loggedin then show login link on like button click
{
    $like = '
        <input onclick="location.href = \'login.php\';" type="button" value="'.$rowCount['like'].'" rel="'.$row['id'].'" data-toggle="tooltip"  data-placement="top" title="Login to Like" class="button_like" />
        <input onclick="location.href = \'login.php\';" type="button" value="'.$rowCount['unlike'].'" rel="'.$row['id'].'" data-toggle="tooltip" data-placement="top" title="Login to Unlike" class="button_unlike" />';
}
else
{
    $query = mysqli_query($connection,"SELECT * from `likes` WHERE pid='".$row['id']."' and uid='".$uid."'");
    if(mysqli_num_rows($query)>0){ //if already liked od disliked a product
        $likeORunlike = mysqli_fetch_array($query);
        // clear values of variables
        $liked = '';
        $unliked = '';
        $disable_like = '';
        $disable_unlike = '';
        
        if($likeORunlike['like'] == 1) // if alredy liked then disable like button
        {
            $liked = 'disabled="disabled"';
            $disable_unlike = "button_disable";
        }
        elseif($likeORunlike['unlike'] == 1) // if alredy dislike the disable unlike button
        {
            $unliked = 'disabled="disabled"';
            $disable_like = "button_disable";
        }
        
        $like = '
        <input '.$liked.' type="button" value="'.$rowCount['like'].'" rel="'.$row['id'].'" data-toggle="tooltip"  data-placement="top" title="Like" class="button_like '.$disable_like.'" id="linkeBtn_'.$row['id'].'" />
        <input '.$unliked.' type="button" value="'.$rowCount['unlike'].'" rel="'.$row['id'].'" data-toggle="tooltip" data-placement="top" title="Un-Like" class="button_unlike '.$disable_unlike.'" id="unlinkeBtn_'.$row['id'].'" />
        ';
    }
    else{ //not liked and disliked product
        $like = '
        <input  type="button" value="'.$rowCount['like'].'" rel="'.$row['id'].'" data-toggle="tooltip"  data-placement="top" title="Like" class="button_like" id="linkeBtn_'.$row['id'].'" />
        <input  type="button" value="'.$rowCount['unlike'].'" rel="'.$row['id'].'" data-toggle="tooltip" data-placement="top" title="Un-Like" class="button_unlike" id="unlinkeBtn_'.$row['id'].'" />
        ';
    }
}
 ?>   

       <div class="panel panel-default">
	<div class="panel-heading" style="height:50px"><strong > <?php echo $author?>
	
	
	
	
	</strong>
	 <i class="far fa-clock"></i><?php echo $row['date'] ." at ".$row['time'];?>
	 <div style="float:right">
		<?php echo$row['category_name'];?>
			
		</div>
		</div>
	  <div class="panel-body" style="max-height:300px;overflow-y: scroll;">
			<div class="form-group">
		<h3><?php echo $row['idea_title'];?></h3>
		
		 <p><?php echo $row['idea_body'];?></p>
	  </div>
	  
         </div>
	  <div class="panel-footer">
	  <table class="table">
	  <tr>
	  <?php
	  if(isset($_GET['favourite'])) {
		  $idea=$_GET['idea_id'];
		  $lover=$_SESSION['id'];
		 
		  $query="INSERT INTO favourite values('$idea','$lover')";
				$result=mysqli_query($connection,$query);
				
				//$query1="DELETE t1 FROM `favourite` t1, `favourite` t2 WHERE t1.idea_id < t2.idea_id AND t1.idea_lover_id = t2.idea_lover_id";
				//$result=mysqli_query($connection,$query1);
	  }
	  if(isset($_GET['unfavour'])) {
		  $idea=$_GET['idea_id'];
		  $lover=$_SESSION['id'];
		 
		  $query="DELETE FROM favourite where idea_id=$idea and idea_lover_id=$lover";
				$result=mysqli_query($connection,$query);
				
				//$query1="DELETE t1 FROM `favourite` t1, `favourite` t2 WHERE t1.idea_id < t2.idea_id AND t1.idea_lover_id = t2.idea_lover_id";
				//$result=mysqli_query($connection,$query1);
	  }
	  ?>
	  <form action="" method="put" >
	  <input type="hidden" name="idea_id" value="<?php echo $id;?>"> 
	  <div class="grid">
            <?php echo  $like; ?>
			<?php 
			$query="SELECT * FROM favourite where idea_id=$id and idea_lover_id='".$_SESSION['id']."'";
			$result=mysqli_query($connection,$query);
				if(mysqli_num_rows($result)>0){
					while($row=mysqli_fetch_array($result, MYSQLI_ASSOC)){
						
					echo "<button type='submit' name='unfavour' Title='Click for Unfollow This Idea'  style='background-color:#55281F; color:white' name='favourite' class='btn btn-success  '>Unfollow</button>";
						
					}
				
			?>
			
			<?php
			}else{
				echo "<button type='submit' title='Click For Follow This Idea'  style='background-color:#55281F'; name='favourite' class='btn btn-success  '>Follow</button>";
			}
			
			?>
			</form>
     </div>
		
	 
	 <form>
	  </tr>
	  <tr>
	  <td>
	  
	  
	  
	  </tr>
	  </table>
		
		<?php
		
		$query="select * from category where c_id=$c_id and final_closure_date < CURDATE()";
				$result=mysqli_query($con,$query);
				if(mysqli_num_rows($result)>0){
				while($row=mysqli_fetch_array($result, MYSQLI_ASSOC)){
					
					//echo $row['final_closure_date'];
					
					echo "<div class='alert alert-danger' role='alert'>
						  Comment Session Completed!
						</div>";
					
				}
				
				}else{
					//echo "Comment Enable";
					include('comment_post.php');
				}


		
		
		
		?>
	  </div>
	  <div style="max-height:400px;overflow-y: scroll; font-size:1em">
	<div id="1" style="display:block;"   >
	
			<?php
			
				

			if(isset($_GET['btncom'])){
				$comment = $_GET['comment'];
				$idea = $_GET['idea_id'];
				$author = $_GET['author_id'];
				$anonymous = $_GET['options'];
				$date=date('Y-m-d');
				$time=date('h:i:s a');
				
				
				
				$query="SELECT email from idea INNER JOIN users on idea.idea_author_id=users.uid where idea.id='$idea' group by uid";
					$result=mysqli_query($con,$query);
			
					if(mysqli_num_rows($result)>0){
					while($row=mysqli_fetch_array($result, MYSQLI_ASSOC)){
						$email=$row['email'];
						
					//echo "<script>alert('Email: '".$email.");</script>";
					//echo $email;
					
				}
				
				}
				
				$query="SELECT user_type from  users where uid='$author'";
					$result=mysqli_query($con,$query);
			
					if(mysqli_num_rows($result)>0){
					while($row=mysqli_fetch_array($result, MYSQLI_ASSOC)){
						$user_type=$row['user_type'];
					
					if($user_type=='STD'){
						//echo $email;
						//echo $anonymous;
						include('comment_email.php');
					}
					
					
				}
				
				}
				
				
				$query="INSERT INTO comment values('','$idea','$comment','$author','$date','$time','0','$anonymous')";
				$result=mysqli_query($connection,$query);
				
				$query1="DELETE t1 FROM `comment` t1, `comment` t2 WHERE t1.comment_id < t2.comment_id AND t1.comment_body = t2.comment_body";
				$result=mysqli_query($connection,$query1);
								
			}
			
				
			
			?>
			
			
		  <br><br>
		<?php 
		if($_SESSION['user_type']=='STD'){
			//echo "Student";
			
			$query="select * from comment INNER JOIN users on comment.comment_author_id=users.uid where idea_id='".$id."' and users.user_type='STD'";
		}else{
			//echo "Staff";
			$query="select * from comment INNER JOIN users on comment.comment_author_id=users.uid where idea_id='".$id."'";
		}
		
		
		
		
				$result=mysqli_query($connection,$query);
				if(mysqli_num_rows($result)>0){
					while($row=mysqli_fetch_array($result, MYSQLI_ASSOC)){
				?>
				<div class="row" id="postID">
   
					<div class="col-sm-2 text-center">
					  <img src="../image/user.png" class="img-circle" height="65" width="65" alt="Avatar">
					</div>
					<div class="col-sm-10">
					  <h4><?php echo $row['first_name']; ?> <small><?php echo $row['date']." at " .$row['time']; ?></small></h4>
					  <p><?php echo $row['comment_body']; ?></p>
					  <br>
					</div>
    
				</div>
				<div style="margin-bottom: 5%"><button style="margin-left:35%;" name="comment" type="submit" class="btn btn-success">Reply</button></div>
				<?php
					}
				}
	?>
	</div>
	</div>
</div>
   
	
		
<?php	
} 


?>
        <?php //echo $COMMENT; ?>
		
    </div>
	<div class="col-sm-3 sidenav" style="background-color:#F5F5F5">
  
  <ul class="nav nav-pills nav-stacked">
 
	


<li><a href="password_change.php">Account Setting</a></li>
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
url:"fetch.php",
method:"POST",
data:{view:view},
dataType:"json",
success:function(data)
{
$('.dropdown-menu').html(data.notification);
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

$(document).on('click', '.dropdown-toggle', function(){
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