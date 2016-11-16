<div class="content">
<?php
if($p>=2){
?>
		<a  href="<?php echo base_url()?>index.php/producto/listar/<?php echo $p-1 ?>"><figure class="lefting"><img src="<?php echo base_url()?>/images/left.png" alt="flecha izquierda" /></figure></a>
<?php }if($p<$numpag){?>
		<a  href="<?php echo base_url()?>index.php/producto/listar/<?php echo $p+1 ?>"><figure class="righting"><img src="<?php echo base_url()?>/images/right.png" alt="flecha derecha" /></figure></a>
<?php }	?>	
		<h2 id='col'>Panel Gestion Productos</h2>
		
<?php echo "<img  id='peque' src='".base_url()."/images/agregar.png' alt='agregar producto'/>";?>
			<table class="most adm">
				<tr>
					<th></th>
					<th>Nombre</th>
					<th>Tipo</th>
					<th>Precio</th>
					<th>Caracteristicas</th>
					<th>Proveedor</th>
					<th>Modificar</th>
					<th>Delete</th>
		</tr>
<?php 
			foreach ($productos as $cos=>$valor){
			echo "
			<tr> <form method='post'/>
							<td><img src='".base_url()."/application/views/producto/pic/$valor->imagen' alt='imagen producto'/></td>
							<td>".$valor->nombre."</td>
							<td>$valor->n_tipos</td>
							<td>$valor->precio €</td>
							<td>$valor->caracteristicas €</td>
							<td>$valor->nom</td>
							<td><input class='boten' type='submit' name='delete' value='modificar' /></td>
							<td><input class='boten' type='submit' name='delete' value='Eliminar' /></td>
							
							
					</form>
			</tr>";
			}
			echo "</table>
			<span id='pagin'> Pagina $p de $numpag</span>";
?>
</div>