	<div class="cont">
	<h2>Detalls alumnes</h2><br/>
		<table>
		<tr><td><label class="det">Nom complert:</label></td><td>	<?php echo $alumne[0]->nom; echo" ". $alumne[0]->cognom1; echo" ". $alumne[0]->cognom2 ;?></td></tr>
		<tr><td><label class="det">DNI:</label></td><td>	<?php echo $alumne[0]->dni;?></td></tr>
		<tr><td><label class="det">Estudis</label></td><td>
		<?php   if ($alumne[0]->estudis==1) echo "Sense estudis";
				if ($alumne[0]->estudis==2) echo "EGB o ESO";
				if ($alumne[0]->estudis==3) echo "CFGSuperior o Batxillerat";
				if ($alumne[0]->estudis==4) echo "Titol Universitari";
		?></td></tr>
		<tr><td><label class="det">Data de Naixement:</label></td><td><?php echo $alumne[0]->data_naixement;?></td></tr>
		<tr><td><label class="det">Situacio laboral:</label></td><td>
		<?php if($alumne[0]->situacio_laboral==1)echo "Aturat";
			  if($alumne[0]->situacio_laboral==2)echo "Actiu";
			  if($alumne[0]->situacio_laboral==3)echo "Altres";
		?></td></tr>
		<tr><td><label class="det">Prestacio:</label></td><td>
		<?php if ($alumne[0]->prestacio==1)echo "Si";
			  if ($alumne[0]->prestacio==2)echo "No";
		?></td></tr>
		<tr><td><label class="det">Telefon mobil:</label></td><td><?php echo $alumne[0]->telefon_mobil;?></td></tr>
		<tr><td><label class="det">Telefon fixe:</label></td><td><?php echo $alumne[0]->telefon_fix;?></td></tr>
		<tr><td><label class="det">Email:</label></td><td><?php echo $alumne[0]->email;?></td></tr>
		</table>
		<br><br><br>
		<a class="botoncin bo1" href="<?php echo base_url()?>/index.php/usuario/modificar">Modificar les teves dades</a>
		<a class="botoncin bo3 " href="<?php echo base_url()?>/index.php/usuario/baja">Donar-te de baixa</a>
		<br><br><br>
	</div>
	<?php if (count($curspreins)>=1){?>
	<div class="content3">
		<h2>Cursos als que t'has preinscrit</h2>
			<br><br>
		<table class="most">
				<tr>
					<th>Codi</th>
					<th>Nom</th>
					<th>Area</th>
					<th>Hores</th>
					<th>Data Inici</th>
					<th>Data Fi</th>
					<th></th>
					
				</tr>
				
			<?php 
			
				foreach ($curspreins as $pro=>$item){
					echo "
						<tr>
							<td>$item->codi</td>
							<td>$item->nom</td>
							<td>$item->id_area</td>
							<td>$item->hores</td>
							<td>$item->data_inici</td>
							<td>$item->data_fi</td>
			
							<td><a href='".base_url()."/index.php/preinscripcions/eliminar/$item->id/'><img src='".base_url()."/images/borr.png'/></a></td>
						</tr></a>";
				}?></table>
		<?php }?>
		
		<br><br>
	</div>
	<?php 
	if(!empty($alusubs))
	if (count($alusubs)>=1){?>
	<div class="content3">
		<h2>Arees formatives a les que t'has subscrit</h2>
		
		
		<table class="most auto">
				<tr>
					<th>Nom</th>
					<th></th>
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