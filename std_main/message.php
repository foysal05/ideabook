<?php
session_start();
	date_default_timezone_set('Asia/Dhaka');
	if($_SESSION['login']==TRUE AND $_SESSION['status']=='Activate'){

//session_start();
include("db.php");



?>
<script>
/*setTimeout(function () {
   window.location.href= window.location.href; // the redirect goes here

},10000); */
</script>

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
    <link href="message.css" rel="stylesheet" type="text/css" />
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
        <li><a href="index">Home</a></li>
        <li><a href="timeline">Timeline</a></li>
        <li class="active"><a href="message?std">Message</a></li>
			<?php
		}else{
			?>
			<li ><a href="index">Home</a></li>
			<li><a href="timeline">Timeline</a></li>
			<li><a href="category">Idea Category</a></li>
			<li class="active"><a href="message?std">Message</a></li>
			
			
			
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
		<div class="col-sm-9">
		 <div class="col-md-6">
	<div style="margin-left:0%;">
	<div class="btn-group">
	
 
  <button type="button" class="btn btn-primary"><a style="color:white;" href="staff_message.php">Staff</a></button>
  
</div>
	
				<div class="row ">
        <div class="panel panel-default ">
            <div class="panel-heading">
                <h3 class="panel-title">Students List</h3>
            </div>
            <div class="panel-body" style="max-height:500px; overflow-y: scroll; overflow-x:scroll;">
				<div class="table-container">
                    <table class="table-users table" border="0">
                        <tbody>
						
						<?php
						$query="select * from users INNER JOIN student on users.uid=student.std_id INNER JOIN department on student.department_id=department.d_id where users.uid !='".$_SESSION['id']."' ";
						$result=mysqli_query($con,$query);
						if(mysqli_num_rows($result)>0){
						while($row=mysqli_fetch_array($result, MYSQLI_ASSOC)){
						
						?>
                            <tr>
                                <td width="10">
                                    <img class="pull-left img-circle nav-user-photo" width="50" src="<?php echo $row['photo']?>" />  
                                </td>
                                <td>
								
                                     <?php
									 


									 echo $row['first_name']. " ".$row['last_name'];?>
                                </td>
                                <td>
                                   <?php echo $row['d_name'];?>
                                </td>
                                <td align="center">
                                   <?php
								   echo "<button type='submit' name='details' class='btn btn-info '><i class='fa fa-comment'></i><a style='color:white' href='message.php?operation=select&std_id=".$row['std_id']."&name=".$row['first_name']."'>Message</button>";
								   
								   ?>
                                </td>
                            </tr>
                          <?php
						}
						}
						?>						  
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

	</div>
	</div>
	</div>
    <div class="col-md-6" id="messageBody" style="max-height:500px; overflow-y: scroll; overflow-x:hidden;">
	<h2><?php if(isset($_GET['name'])){
		echo $_GET['name'];
	} ?></h2>
  <?php
  if(isset($_GET['std_id'])){
	  $std_id=$_GET['std_id'];
	  
	  $query="SELECT * FROM message INNER JOIN users as s on message.sender_id=s.uid  WHERE (sender_id ='".$_SESSION['id']."' AND  receiver_id='$std_id') or (sender_id ='$std_id' AND  receiver_id='".$_SESSION['id']."')";
	  $result=mysqli_query($con,$query);
						if(mysqli_num_rows($result)>0){
						while($row=mysqli_fetch_array($result, MYSQLI_ASSOC)){
  //echo "Sender :" .$row['']
  
  ?>
	<div class="col-sm-8">
            <div id="tb-testimonial" class="testimonial testimonial-info-filled">
                <div class="testimonial-section">
                   <?php echo $row['message'];?>
                </div>
                <div class="testimonial-desc">
                   
                    <div class="testimonial-writer">
                    	<div class="testimonial-writer-name"><?php echo $row['first_name'];?></div>
                    	<div class="testimonial-writer-designation"><?php echo $row['time'];?></div>
                    	<a href="#" class="testimonial-writer-company"><?php echo $row['date'];?></a>
                    </div>
                </div>
            </div>   
		</div>
       
     <?php
  }
  }else{
	  echo"No Conversation";
  }
  ?>
  
  <div class="box-footer">
              <form action="send_message.php" method="post" style="float:left;">
                <div class="input-group">
				<input type="hidden" name="receiver" value="<?php echo $_GET['std_id'];?>">
                  <input type="text" name="message" placeholder="Type Message ..." class="form-control">
                      <span class="input-group-btn">
                        <button type="submit" name="from_message" class="btn btn-primary btn-flat">Send</button>
                        <button style="margin-left:2%" onClick="window.location.href=window.location.href" type="button" name="from_message" class="btn btn-primary btn-flat"> <span class="glyphicon glyphicon-refresh"></span></button>
                      </span>
                </div>
              </form>
            </div>  
			<?php
  }
	?>	 
   
  </div>        
           
           
            

			
        </div>
		
	</div>


<!-- content end here -->
  
<script>
var messageBody = document.querySelector('#messageBody');
messageBody.scrollTop = messageBody.scrollHeight - messageBody.clientHeight;
</script>
   

   

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