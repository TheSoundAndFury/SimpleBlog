<html>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/style.css"/>
	<?php
	if (isset($this->session->userdata['logged_in'])) {
		
		header("location: http://www.cooperlabs.tech/index.php/blog/user_login_process");
	}
	?>
	<head>
	<title>Login Form</title>
		<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro|Open+Sans+Condensed:300|Raleway' rel='stylesheet' type='text/css'>
		<?php
		$this->load->view('header');?>
	</head>
	<body>
		<?php
		if (isset($logout_message)) {
			echo "<div class='message'>";
			echo $logout_message;
			echo "</div>";
		}
		?>
		<?php
		if (isset($message_display)) {
			echo "<div class='message'>";
			echo $message_display;
			echo "</div>";
			}
		?>
		<div class="form-signin">      
			<div id="main">
				<div id=login>
					 
			     		 <h2 class="form-signin-heading">Please login</h2>
								<hr/>
								<?php echo form_open('index.php/blog/user_login_process'); ?>

								<?php
								echo "<div class='error_msg'>";
							if (isset($error_message)) {
								echo $error_message;
							}
								echo validation_errors();
								echo "</div>";
							?>
							<label>UserName :</label>
							<input type="text" class="form-control" name="username" id="name" placeholder="username"/><br /><br />

							<label>Password :</label>
							<input type="password" class="form-control" name="password" id="password" placeholder="**********"/><br/><br />

							<input class="btn btn-lg btn-primary btn-block" type="submit" value=" Login " name="submit"/><br />

							<a href="<?php echo base_url('index.php/blog/user_registration_show')  ?>" class="btn btn-lg btn-primary btn-block">To SignUp Click Here</a>
							<?php echo form_close(); ?>
				</div>
			</div>
		</div>
	</body>
</html>