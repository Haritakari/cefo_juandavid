<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
  

    <title>Kite shop</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url() ?>/css/style.css" rel="stylesheet">
	 <script src="<?php echo base_url()?>js/script.js"></script>
  </head>
  <body>
 <nav class="navbar navbar-inverse navbar-fixed-top menu">
      <div class="container">
        
          </button>
          <div class="izquierda">
					<span>CEFO</span><br/>
					<span>VALLES</span>
				</div>
        </div>
       
        <?php 
		if(!$usuario) Templ::login();
		else Templ::logout($usuario);
		Templ::menu($usuario);
		?>
       
      </div>
    </nav>
    
