<section class="content">



		<div class="rel">
			<h2>Cursos ofertats </h2><br>
			<table class="most">
				<tr>
					<th>Codi</th>
					<th>Nom</th>
					<th>Hores</th>
					<th>Data Inici</th>
					<th>Data Fi</th>
					
				</tr>
				
			<?php 
				foreach ($cursos as $pro=>$item){
					
					echo "
						<tr class='point' onclick='myUrl($item->id);'>
							<td>$item->codi</td>
							<td>$item->nom</td>
							<td>$item->hores</td>
							<td>$item->data_inici</td>
							<td>$item->data_fi</td>
						</tr></a>";
				}?></table>
				 <?php if($p>=2){?>
						<a  href="<?php echo base_url()?>index.php/cursos/llistar/<?php echo $p-1 ?>"><figure class="pagpeque"><img class="i" src="<?php echo base_url()?>/images/left.png" alt="flecha izquierda" /></figure></a>
			<?php }if($p<$numpag){?>
						<a  href="<?php echo base_url()?>index.php/cursos/llistar/<?php echo $p+1 ?>"><figure class="pagpeque"><img class="d" src="<?php echo base_url()?>/images/right.png" alt="flecha derecha" /></figure></a>
			<?php }	
								
				echo "<br/><br/><span id='pagin'> Pagina $p de $numpag</span>";
			?>
			
					
			</div>
	</section>