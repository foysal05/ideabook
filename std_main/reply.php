
      <form role="form" action="db_reply.php" method="post">
	  
        <div class="form-group" style="margin-left:25%; margin-right:5%; margin-top:2$;">
		<input type="hidden" name="comment_id" class="form-control" value="<?php echo $comment;?>">
		<input type="hidden" name="author_id" class="form-control" value="<?php echo $_SESSION['id'];?>">
         <textarea class="form-control" id="exampleFormControlTextarea1" name="reply" style="resize: none;" placeholder="Leave a Reply here" required cols="10" rows="2"></textarea>
        </div>
        <button style="margin-left:25%" type="submit" name="btnreply" class="btn btn-success">Reply</button>
      </form>
      <br><br>
      
     
	 