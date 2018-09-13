
  <form role="form" action="commentindex.php" method="post">
  
    <div class="form-group" style="margin-left:5%; margin-right:5%; margin-top:2$;">
	<input type="hidden" name="idea_id" class="form-control" value="<?php echo $id;?>">
	<input type="hidden" name="author_id" class="form-control" value="<?php echo $_SESSION['id'];?>">
     <textarea class="form-control" id="exampleFormControlTextarea1" name="comment" style="resize: none;" placeholder="Leave a Comment here" required cols="10" rows="2"></textarea>
	 <br>
	 <table>
		<tr>
			<!--<td>
			<span class="button-checkbox">
    <button type="button" class="btn" data-color="primary">Anonymous?</button>
    <input  onChange="anonymousColor(anonymous,this)"  name="anonymous_comment" value="anonymous" type="checkbox" class="hidden" /></span>
			</td>-->
			<td>
			<style>
		.btn span.glyphicon {    			
opacity: 0;				
}
.btn.active span.glyphicon {				
opacity: 1;				
}
			</style>
			<script>
							$('#radioBtn a').on('click', function(){
				var sel = $(this).data('title');
				var tog = $(this).data('toggle');
				$('#'+tog).prop('value', sel);
				
				$('a[data-toggle="'+tog+'"]').not('[data-title="'+sel+'"]').removeClass('active').addClass('notActive');
				$('a[data-toggle="'+tog+'"][data-title="'+sel+'"]').removeClass('notActive').addClass('active');
			})
			</script>
			
	
	<?php if($_SESSION['user_type']=='STAFF'){
		?>
		<div class="btn-group" data-toggle="buttons">
		
		<label class="btn btn-success active">
			<input type="radio" name="options" value="Identified" id="option2" autocomplete="off" checked > 
			<span class="glyphicon glyphicon-ok"></span> Identified
		</label>

		
	
	</div>
		
		<?php
	}else{
		?>
		<div class="btn-group" data-toggle="buttons">
		
		<label class="btn btn-success active">
			<input type="radio" name="options" value="Identified" id="option2" autocomplete="off" checked > 
			<span class="glyphicon glyphicon-ok"></span> Identified
		</label>

		<label class="btn btn-warning" style="">
			<input type="radio" name="options" value="Anonymous" id="option2" autocomplete="off"> 
			<span class="glyphicon glyphicon-ok"></span> Anonymous
		</label>
	
	</div>
		
		<?php
	}
	?>
	



			</td>
			<td>
			<button style="margin-left:5%" type="submit" name="btncom" class="btn btn-primary">Comment</button>
			</td>
		</tr>
	 </table>
	 
    </div>
    
  </form>
  
  <br><br>
  
  
 