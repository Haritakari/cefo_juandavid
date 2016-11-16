<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$CI =& get_instance();
$CI->load->library('Templ');
$usuario = empty($_SESSION['user'])? null : unserialize($_SESSION['user']);
?><!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
  

    <title>Jumbotron Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

  </head>
  <body>
 <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">KITE SHOPING</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
        <?php 
		if(!$usuario) Templ::login();
		else Templ::logout($usuario);
		Templ::menu($usuario);
		?>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
	<section id="content">
		<div class="jumbotron">
	      <div class="container">
		<h1><?php echo $heading; ?></h1>
		<?php echo $message; ?>
			</div>
		</div>
	</section>

<?php Templ::footer(); ?>    
