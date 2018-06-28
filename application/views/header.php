
<head>
    <title>Simple Blog by John Cooper</title>
    <!--CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/assets/css/bootstrap.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/assets/css/jquery-ui.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/assets/css/style.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/assets/css/glyphicon.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/assets/css/bootstrap-social.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/assets/css/bootstrap-markdown.min.css"/>

    <script src="https://use.fontawesome.com/7bfe799678.js"></script>  
      <!--JS-->

	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-1.8.2.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrap-markdown.js"></script>
<head>
<div class = "jumbotron">
	<div class="container">
  
	<h1>Coding a blog <small>While blogging the code</small></h1>
	
  </div>
</div>
  <?php
    if (isset($this->session->userdata['logged_in'])) :?>

    <nav class="navbar navbar-toggleable-md navbar-inverse bg-inverse" name="navbar">
          <div class="container">
            <div class="navcenter">
              <a class="navbar-brand" href="<?php echo base_url("index.php/Blog/index") ?>">Home</a>
              <a class="navbar-brand" href="<?php echo base_url("index.php/Blog/create") ?>">New Post</a>
              <a class="navbar-brand" href="<?php echo base_url("index.php/Blog/about") ?>">About</a>
              
                <a class="navbar-brand" name="logout" href="<?php echo base_url("index.php/Blog/logout") ?>">Logout</a>
                <div class="session"> <?php echo ("<h4> Signed in as : " . $_SESSION['logged_in']['username']."</h4>"); ?>
               </div>
              
              
            </div>
          </div>
      </nav>


  <?php endif;?>

