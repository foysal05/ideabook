

<style>

hr.style1{
	border-top: 1px solid #8c8b8b;
}


hr.style2 {
	border-top: 3px double #8c8b8b;
}

hr.style3 {
	border-top: 1px dashed #8c8b8b;
}

hr.style4 {
	border-top: 1px dotted #8c8b8b;
}

hr.style5 {
	background-color: #fff;
	border-top: 2px dashed #8c8b8b;
}


hr.style6 {
	background-color: #fff;
	border-top: 2px dotted #8c8b8b;
}

hr.style7 {
	border-top: 1px solid #8c8b8b;
	border-bottom: 1px solid #fff;
}


hr.style8 {
	border-top: 1px solid #8c8b8b;
	border-bottom: 1px solid #fff;
}
hr.style8:after {
	content: '';
	display: block;
	margin-top: 2px;
	border-top: 1px solid #8c8b8b;
	border-bottom: 1px solid #fff;
}

hr.style9 {
	border-top: 1px dashed #8c8b8b;
	border-bottom: 1px dashed #fff;
}

hr.style10 {
	border-top: 1px dotted #8c8b8b;
	border-bottom: 1px dotted #fff;
}


hr.style11 {
	height: 6px;
	background: url(http://ibrahimjabbari.com/english/images/hr-11.png) repeat-x 0 0;
    border: 0;
}


hr.style12 {
	height: 6px;
	background: url(http://ibrahimjabbari.com/english/images/hr-12.png) repeat-x 0 0;
    border: 0;
}

hr.style13 {
	height: 10px;
	border: 0;
	box-shadow: 0 10px 10px -10px #8c8b8b inset;
}


hr.style14 { 
  border: 0; 
  height: 1px; 
  background-image: -webkit-linear-gradient(left, #f0f0f0, #8c8b8b, #f0f0f0);
  background-image: -moz-linear-gradient(left, #f0f0f0, #8c8b8b, #f0f0f0);
  background-image: -ms-linear-gradient(left, #f0f0f0, #8c8b8b, #f0f0f0);
  background-image: -o-linear-gradient(left, #f0f0f0, #8c8b8b, #f0f0f0); 
}


hr.style15 {
	border-top: 4px double #8c8b8b;
	text-align: center;
}
hr.style15:after {
	content: '\002665';
	display: inline-block;
	position: relative;
	top: -15px;
	padding: 0 10px;
	background: #f0f0f0;
	color: #8c8b8b;
	font-size: 18px;
}

hr.style16 { 
  border-top: 1px dashed #8c8b8b; 
} 
hr.style16:after { 
  content: '\002702'; 
  display: inline-block; 
  position: relative; 
  top: -12px; 
  left: 40px; 
  padding: 0 3px; 
  background: #f0f0f0; 
  color: #8c8b8b; 
  font-size: 18px; 
}


hr.style17 {
	border-top: 1px solid #8c8b8b;
	text-align: center;
}
hr.style17:after {
	content: '§';
	display: inline-block;
	position: relative;
	top: -14px;
	padding: 0 10px;
	background: #f0f0f0;
	color: #8c8b8b;
	font-size: 18px;
	-webkit-transform: rotate(60deg);
	-moz-transform: rotate(60deg);
	transform: rotate(60deg);
}


hr.style18 { 
  height: 30px; 
  border-style: solid; 
  border-color: #8c8b8b; 
  border-width: 1px 0 0 0; 
  border-radius: 20px; 
} 
hr.style18:before { 
  display: block; 
  content: ""; 
  height: 30px; 
  margin-top: -31px; 
  border-style: solid; 
  border-color: #8c8b8b; 
  border-width: 0 0 1px 0; 
  border-radius: 20px; 
}


</style>
<form action="db_idea_post.php" method="post" id="frmMyform" enctype="multipart/form-data">

	<div class="panel panel-default" id="anonymous" style="background-color:#4CAF50">
		  <div class="panel-heading" style="height:50px">
		   <div style="float:left">
		  <strong >Post Your Idea</strong><h3>
		  </div>
		 <div style="float:right">
			
				<select id="category" required class="form-control" name="category" onchange="showHide(this)" >
				  <option value="">Select Category</option>
				 <?php
				 include('../db.php');
				 
					$query="SELECT * FROM category WHERE closure_date >= CURDATE()";
					$result=mysqli_query($con,$query);
					if(mysqli_num_rows($result)>0){
					while($row=mysqli_fetch_array($result, MYSQLI_ASSOC)){
					 echo "<option value='".$row['c_id']."'>".$row['category_name']."</option>";
					}
					}
					else 
						echo "<option value=''>No Category</option>";
					?>
				</select>

			</div>
				
		  </div>
		  
	 <div id="post_area" style="display:none;">
		  <div class="panel-body">
				<div class="form-group">
			<input type="text" id="title" class="form-control" placeholder="Idea Title" required  name="post_title" ><br>
			
			<textarea class="form-control" name="post_body" maxlength="2000" id="textarea" required style="resize: none;" placeholder="What's on your mind?" onkeyup="countChar(this)"  cols="50" rows="4"></textarea>
		  </div>
		  <div style="color:white;" id="textarea_feedback"></div>
		  <script>
			$(document).ready(function() {
    var text_max = 2000;
    $('#textarea_feedback').html(text_max + ' characters remaining');

    $('#textarea').keyup(function() {
        var text_length = $('#textarea').val().length;
        var text_remaining = text_max - text_length;

        $('#textarea_feedback').html(text_remaining + ' characters remaining');
    });
});
		  </script>
		  
		  </div>
		  <div class="panel-footer">
		<table>
		 
		  <td>
				<div class="fileupload fileupload-new" data-provides="fileupload">
				<span class="btn btn-primary btn-file"><span class="fileupload-new">Select file</span>
				<span class="fileupload-exists">Change</span>  <input type="file" accept=".pdf,.jpg,.jpeg,.png,.doc,.docx,.dotx,.docm,.dotm,.docb,.txt"  name="file[]" multiple="multiple"></span>
				<span class="fileupload-preview"></span>
				<a href="#" class="close fileupload-exists" data-dismiss="fileupload" style="float: none">X</a>
			  </div>
		  
		  
		  
		  </td>
		  
		  <td></td>
		  
		  <td style="margin-left:80%; float:right"> <span class="button-checkbox">
        <button type="button" class="btn" data-color="primary">Anonymous?</button>
        <input  onChange="anonymousColor(anonymous,this)"  name="anonymous" value="anonymous" type="checkbox" class="hidden" /></span></td>
		  <td></td>
		 
		   
		  </table>
		  <hr class="style5">
		  <table>
		  <td style="margin-left:80%; float:right"> <span class="button-checkbox">
        <button type="button"  class="btn" data-color="primary">Agree with terms & conditions</button> 
        <input type="checkbox" onchange="document.getElementById('post').disabled = !this.checked;"  class="hidden"  /></span></td>
		<td><a target="_blank" href="trems_conditions.php">Learn More</a></td>
		
		 <td style="margin-left:70%; float:right;"><button style="margin-left:10%" id="post" disabled title="Check Terms & Conditions"  type="submit"  name="post" class="btn btn-primary">Post</button></td>
		  </table>
			<script>
			function anonymousColor(x, _this) {
				  if (_this.checked) {
					x.style.backgroundColor = '#4B4B4B';
				  } else  {
					x.style.backgroundColor = '#4CAF50';
				  }
				}
			</script>
<script type="text/javascript">
 
function showHide(elem) {
    if(elem.selectedIndex != 0) {
       
        document.getElementById('post_area').style.display = 'block';
    }else if(elem.selectedIndex == 0) {
       
        document.getElementById('post_area').style.display = 'none';
    }
}
 
window.onload=function() {
    //get the divs to show/hide
    divsO = document.getElementById("frmMyform").getElementsByTagName('post_area');
}
</script>

		  </div>
	</div>
	</div>
	</form>
	