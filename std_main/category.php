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
  <li><a href="index.php">Home</a></li>
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
  <ul class="nav nav-pills nav-stacked">
  
	<?php
	if($_SESSION['user_type']=='STAFF'){
		//echo $_SESSION['user_type'];
		?>
	
	
    <li><a href="#section2"><?php echo $_SESSION['name']; ?></a></li>
	<li ><a href="../admin/control/index">Control</a></li>
    <li class="active"><a href="index">Home</a></li>
    <li><a href="timeline">Timeline</a></li>
    <li><a href="message?std">Message</a></li>
		<?php
	}else{
		?>
		<li ><a href="index">Home</a></li>
		<li><a href="timeline">Timeline</a></li>
		<li class="active"><a href="category">Idea Category</a></li>
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
	<div class="col-sm-9 table-responsive">
	 <table id="example1" class="table table-bordered table-striped">
            <thead style="background-color:#337AB7; color:white">
            <tr>
              <th>Category Name</th>
              <th>Start Date</th>
              <th>Closure Date</th>
              <th>Remaining Closure Date</th>
              <th>Final Closure Date</th>
              <th>Remaining Final Closure Date</th>
              
               
            </tr>
            </thead>
            <tbody>
			<?php
			
			$query="select * from category WHERE closure_date >= CURDATE()";
			//$query="SELECT * FROM  `category` INNER JOIN users on idea.idea_author_id=users.uid";
				$result=mysqli_query($con,$query);
				if(mysqli_num_rows($result)>0){
					while($row=mysqli_fetch_array($result, MYSQLI_ASSOC)){
						$first_date=$row['closure_date'];
						 $second_date=$row['final_closure_date'];
						
						 $now = time(); // or your date as well
						//$your_date = strtotime("2018-01-01");
						$your_date1 = strtotime($first_date);
						$your_date2 = strtotime($second_date);
						$datediff1 = $your_date1 -$now;
						$datediff2 = $your_date2 -$now;
						
						
						echo "<tr>";
						echo "<td>".$row['category_name']."</td>";
						echo "<td>".$row['start_date']."</td>";
						echo "<td>".$row['closure_date']."</td>";
						echo "<td>". round($datediff1 / (60 * 60 * 24)+2)." Days</td>";
						echo "<td>".$row['final_closure_date']."</td>";
						echo "<td>". round($datediff2 / (60 * 60 * 24)+2)." Days</td>";
						
						
						
						//echo "<td>".$row['date']."</td>";
						//echo "<td>".$row['time']."</td>";
						//echo "<td> <button type='submit' name='details' class='btn '><i class='icon-eye-open'></i><a style='color:red' href='idea_details.php?operation=select&id=".$row['id']."'>Details</button></td>";
						
						echo "</tr>";
					}
				}
			
			?>
           
            </tbody>
           
			<tfoot style="background-color:#337AB7; color:white">
            <tr>
               <th>Category Name</th>
              <th>Start Date</th>
              <th>Closure Date</th>
              <th>Remaining Closure Date</th>
              <th>Final Closure Date</th>
              <th>Remaining Final Closure Date</th>
               
            </tr>
            </tfoot>
          </table>
      
        
       
       
        

		
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