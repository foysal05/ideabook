<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
    /* Remove the navbar's default margin-bottom and rounded borders */ 
    .navbar {
      margin-bottom: 0;
      border-radius: 0;
    }
    
    /* Add a gray background color and some padding to the footer */
    footer {
      background-color: #f2f2f2;
      padding: 25px;
    }
  </style>
</head>
<body>



<div class="jumbotron">
  <div class="container text-center">
    <h1>ideaBook Database</h1>      
    
  </div>
</div>

  <?php
  if(isset($_GET['table_created'])){
	  echo "<div class='alert alert-success'>
  <strong>Success!</strong> Database Created with Tables.
</div>";
  }else if(isset($_GET['users'])){
	  echo "<div class='alert alert-success'>
  <strong>Success!</strong> Users Information Inserted.
</div>";
  }
  else if(isset($_GET['department'])){
	  echo "<div class='alert alert-success'>
  <strong>Success!</strong> Department Information Inserted.
</div>";
  }else if(isset($_GET['students'])){
	  echo "<div class='alert alert-success'>
  <strong>Success!</strong> Student Information Inserted.
</div>";
  }else if(isset($_GET['staffs'])){
	  echo "<div class='alert alert-success'>
  <strong>Success!</strong> Staff Information Inserted.
</div>";
  }
  ?>
<div class="container-fluid bg-2 text-center">    
  <h3></h3><br>
  <div class="row">
    <div class="col-sm-2">
      <button  class="btn btn-success"><a style="color:white" href="setup.php">Create Tables</a></button>
    </div>
    <div class="col-sm-2"> 
       <button class="btn btn-success"><a style="color:white" href="insert_users.php">Insert Users Table</a></button>
    </div>
	 <div class="col-sm-2"> 
       <button class="btn btn-success"><a style="color:white" href="department.php">Insert Department Table</a></button>
    </div>
    <div class="col-sm-2"> 
       <button class="btn btn-success"><a style="color:white" href="insert_staff.php">Insert Staff Tables</a></button>
    </div>
    <div class="col-sm-2"> 
       <button class="btn btn-success"><a style="color:white" href="students.php">Insert Student Tables</a></button>
    </div>
  </div>
</div><br>


</div><br><br>

<footer class="container-fluid text-center">
  <p>ideaBook - <?php echo date('Y');?></p>
</footer>

</body>
</html>
