<div class="list">
<?php
if($p>=2){
?>
		<a  href="<?php echo base_url()?>index.php/producto/listar/<?php echo $p-1 ?>"><figure class="lefting"><img src="<?php echo base_url()?>/images/left.png" alt="flecha izquierda" /></figure></a>
<?php }if($p<$numpag){?>
		<a  href="<?php echo base_url()?>index.php/producto/listar/<?php echo $p+1 ?>"><figure class="righting"><img src="<?php echo base_url()?>/images/right.png" alt="flecha derecha" /></figure></a>
<?php }		

			foreach ($productos as $cos=>$valor){
			echo "
			<div class='col-md-4'>
			<figure class='produ'>";
				if(!$usuario)
					echo "<img onclick='mosrar(this)' src='".base_url()."/application/views/producto/pic/$valor->imagen' alt='$valor->nombre'/>";
				else 
					echo "
				<img onclick='mostrar(this)' src='".base_url()."/application/views/producto/pic/$valor->imagen' alt='$valor->nombre'/>";
		
				echo "
				<p class='hidd'>$valor->caracteristicas</p>
				<p class='hidd'>$valor->precio</p>
				<p class='hidd'>$valor->id</p>
				<figcaption>$valor->nombre </figcaption>
			</figure>
			</div>";
			}
			echo "<br/><br/><span id='pagin'> Pagina $p de $numpag</span>";
?>
</div>