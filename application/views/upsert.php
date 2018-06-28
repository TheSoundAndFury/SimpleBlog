<?php echo form_open($action);

?>
<div class= "wrapper" >
	<div class="newpost">
		<form>
			<div class="form-group " >
			  <label for="title">Title:</label>
			  <input type="text" class="form-control" id="title" name="title" value="<?php echo $title; ?>" >  
			</div>

			<div class="form-group" >
			  <label for="content">Content:</label>
			  <textarea class="form-control" rows="8" name="content" id="content" data-provide="markdown"><?php echo $content; ?>	</textarea>
			</div>

			<div class="form-group">
				<input type="submit" class="btn btn-primary" />
			</div>
		</form>	
	</div>
</div>
