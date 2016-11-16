<?php
	class Templ{	
		

		
		//PONE EL FORMULARIO DE LOGIN
		public static function login(){
			?>
		
			<form class="derecha" method="post" id="login" autocomplete="off">
				
            		<input placeholder="User" class="form-control" type="text" name="user" required="required" />
            	
            	
					<input placeholder="Password" class="form-control" type="password" name="password" required="required"/>
				
				
					<input type="submit" name="login" class="btn btn-success" value="Login"/>
           		
				
			</form>
			<?php 
		}
		
		//PONE LA INFO DEL USUARIO IDENTIFICADO Y EL FORMULARIOD E LOGOUT
		public static function logout($usuario){
			?>
		<form class="navbar-form navbar-right" method="post">
				<div class="form-group">
					<span class="logger"> Hola <a href="index.php?controlador=Usuario&operacion=modificacion" title="modificar datos"></span>
						<span class="logge"><?php echo $usuario->nombre;?></a></span>
					<span class="logger"> 	<?php echo ' ('.$usuario->email.')';?>
					<?php if($usuario->admin) echo ', eres administrador';?></span>
					<input class="btn btn-danger" type="submit" name="logout" value="Logout" />
				</span>
				</div>
		</form>	
			<?php 
		}
		
		
		//PONE EL MENU DE LA PAGINA
		public static function menu($usuario){
			
			?>

				<ul class="nav">
				
					<li class="unem"><a href="<?php echo base_url()?>index.php">Inicio</a></li>
					<li class="unem"><a href="<?php echo base_url()?>index.php/usuario/registro">Registro</a></li>
					<li class="unem"><a href="<?php echo base_url()?>index.php/producto/listar">Productos</a></li>
					
		<?php
				if($usuario){ echo "<li class='unem'><a href='".base_url()."index.php/producto/showcart'>Carrito</a></li>";
				if($usuario->admin) echo "<li class='unem'><a href='".base_url()."index.php/admin/showpanel'>Panel de control</a></li>";}?>
				</ul>
		<?php 	
		}
	
		
		//PONE EL PIE DE PAGINA
		public static function footer(){
			?>
			<footer>
				
					<br/>
					<span><a href="cefo@......com ">cefo@.....com</span><span> Esta pagina  es un proyecto academico de : </span> <span> David Sanchez y Juanjo guardiola</a></span>
         		
			</footer>

  </body>
</html>		
<?php
		}
		
	}
?>