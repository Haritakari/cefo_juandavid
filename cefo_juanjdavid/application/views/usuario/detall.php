	<div class="cont">
	<h2>Detalls alumnes</h2>
		<label class="det">Nom complert:</label><span>	<?php echo $alumne[0]->nom; echo" ". $alumne[0]->cognom1; echo" ". $alumne[0]->cognom2 ;?></span><br/>
		<label class="det">DNI:</label><span>	<?php echo $alumne[0]->dni;?></span><br/>
		<label class="det">Estudis</label>	<span><?php echo $alumne[0]->estudis;?></span><br/>
		<label class="det">Data de Naixement:</label><span>	<?php echo $alumne[0]->data_naixement;?></span><br/>
		<label class="det">Situacio laboral:</label>	<span><?php echo $alumne[0]->situacio_laboral;?></span><br/>
		<label class="det">Prestacio:</label><span>	<?php echo $alumne[0]->prestacio;?></span><br/>
		<label class="det">Telefon mobil:</label><span>	<?php echo $alumne[0]->telefon_mobil;?></span><br/>
		<label class="det">Telefon fixe:</label><span>	<?php echo $alumne[0]->telefon_fix;?></span><br/>
		<label class="det">Email:</label>	<span><?php echo $alumne[0]->email;?></span><br/>
		
		<a class="botoncin bo1 bot2" href="<?php echo base_url()?>/index.php/usuario/modificar">Modificar les teves dades</a>
		<a class="botoncin bo3 " href="<?php echo base_url()?>/index.php/usuario/baja">Donar-te de baixa</a>
		
	</div>
	<?php if (count($curspreins)>=1){?>
	<div class="content3">
		<h2>Cursos als que t'has preinscrit</h2>
		
		
		<table class="most">
				<tr>
					<th>Codi</th>
					<th>Nom</th>
					<th>Area</th>
					<th>Descripcio</th>
					<th>Hores</th>
					<th>Data Inici</th>
					<th>Data Fi</th>
					
				</tr>
				
			<?php 
			
				foreach ($curspreins as $pro=>$item){
					echo "
						<tr>
							<td>$item->codi</td>
							<td>$item->nom</td>
							<td>$item->id_area</td>
							<td>$item->descripcio</td>
							<td>$item->hores</td>
							<td>$item->data_inici</td>
							<td>$item->data_fi</td>
			
							<td><a href='".base_url()."/index.php/preinscripcions/eliminar/$item->id/'><img src='".base_url()."/images/borr.png'/></a></td>
						</tr></a>";
				}?></table>
		<?php }?>
		
		
	</div>
	<?php 
	if(!empty($alusubs))
	if (count($alusubs)>=1){?>
	<div class="content3">
		<h2>Arees formatives a les que t'has subscrit</h2>
		
		
		<table class="most auto">
				<tr>
					<th>Nom</th>
				</tr>
				
			<?php 
				foreach ($alusubs as $pro=>$item){
					
					echo "
						<tr>
							<td>$item->nom</td>
							
							<td onclick='event.stopPropagation();'><a href='".base_url()."index.php/subscripcions/eliminar/$item->id'><img src='".base_url()."/images/borr.png'/></a></td>
						</tr></a>";
				}?>
			</table>
		<?php }?>
		
		
	</div>