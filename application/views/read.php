<div class="wrapper">
	<div class ="well" name="content">
	<h2> 
		<?php echo $post->title; ?>
	</h2>
	<p>
		<div class ="well" name="content">
			<h3><?php echo $post->content; ?>&nbsp</h3>
			<?php echo $post->created; ?><br />
		</div>
		<button class="btn btn-default"><?php echo anchor('index.php/blog/update/'.$post->id,'Update'); ?></button>
		<button class="btn btn-default"><?php echo anchor('index.php/blog/delete/'.$post->id,'Delete',
			array('Onclick' => "return confirm('Are you sure you want to delete this post?')")); ?></button>
	</p>
</div>