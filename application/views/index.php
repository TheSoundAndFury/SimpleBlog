<div class="wrapper">
<?php include(APPPATH.'third_party/Parsedown.php'); ?>
<?php foreach($posts as $post) : ?>
	<div class ="well" name="content">
	<h2>
		<?php echo anchor("index.php/blog/read/{$post->id}", $post->title); ?>
	</h2>
	
		<h3><?php $Parsedown = new Parsedown();
			 echo $Parsedown->text($post->content); ?></h3><br>
		<?php echo $post->created; ?>
	</div>

<?php endforeach; ?>	
</div>