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
	
    <?php include('student_search.php');?>
	
    <ul class="nav navbar-nav navbar-right" style="backgruund-color:#337AB7">
      <li><a href="profile.php"><?php 

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
          <li><a href="logout.php">Logout</a></li>
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
        source: 'user_search.php'
    });
});
</script>