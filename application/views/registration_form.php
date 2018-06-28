<html>
	<link rel="stylesheet" type="text/css" href="http://localhost/simpleblog/assets/css/style.css"/>
	<?php
	if (isset($this->session->userdata['logged_in'])) {
		header("location: http://localhost/simpleblog/index.php/blog/user_login_process");
	}
	?>
	<head>
		<title>Registration Form</title>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/style.css">
		<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro|Open+Sans+Condensed:300|Raleway' rel='stylesheet' type='text/css'>
		<?php
		$this->load->view('header');?>
	</head>
	<body>
		<div class="form-signin">
			<div id="main">
				<div id="login">
					<h2 class="form-signin-heading">Registration Form</h2>
					<hr/>
					<?php
						echo "<div class='error_msg'>";
						echo validation_errors();
						echo "</div>";
						echo form_open('index.php/blog/new_user_registration');

						echo form_label('Create Username : ');
						echo"<br/>";					
						echo form_input('username','', "<div class='form-control'");
						echo "<div class='error_msg'>";
						if (isset($message_display)) {
							echo $message_display;
						}
						echo "</div>";
						echo"<br/>";
						echo form_label('Email : ');
						echo"<br/>";
						$data = array(
						'type' => 'email',
						'name' => 'email_value'
						);
						echo form_input($data,'', "<div class='form-control'");
						echo"<br/>";
						echo form_label('Password : ');
						echo"<br/>";
						echo form_password('password','', "<div class='form-control'");
						echo"<br/>";
						echo"<br/>";
						echo form_submit('submit', 'Sign Up',"<div class='btn btn-lg btn-primary btn-block'" );
						echo"<br/>";
						echo form_close();
					?>
					<a href="<?php echo base_url() ?> " class="btn btn-lg btn-primary btn-block">For Login Click Here</a>
				</div>
			</div>
		</div>
	</body>
</html>