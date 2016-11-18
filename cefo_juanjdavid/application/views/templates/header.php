<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    
    <title>Cefo Valles</title>
    <link href="<?php echo base_url() ?>/css/style.css" rel="stylesheet">
	 <script src="<?php echo base_url()?>js/script.js"></script>
  </head>
  <body>
 <nav class="menu">
	<div>
      	<div class="izquierda">
					<span>CEFO</span><br/>
					<span>VALLES</span>
		</div>
	</div>
    <div>
        <?php 
		if(!$usuario) Templ::login();
		else Templ::logout($usuario);
		Templ::menu($usuario);
		?>
       
    </div>
</nav>