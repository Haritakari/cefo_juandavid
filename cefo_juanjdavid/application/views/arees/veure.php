<section class="content">

		<div>
			<h2>Inscriure Árees Formatives </h2>
			<br><br>
			<p>Si vols que t'avisem cuan tinguem cursos d'alguna area especifica, subscriu-te </p>
			<table class="most auto">
				<tr>
					<th>Nom</th>
					<th></th>
				</tr>
				
			<?php 
				foreach ($arees as $pro=>$item){
					echo "
						<tr onclick='Mrl($item->id)';>
							<td>$item->nom</td>
							
							<td onclick='event.stopPropagation();'>";
							$sw1=0;
							if(!$usuario)
								echo "<a class='botoncin bo3'href='".base_url()."index.php/usuario/registroYsubscri/$item->id'>Registrarse</a>";
							else{
								
								foreach ($subscripcions as $p=>$v){
									if ($v->id_area == $item->id){
										echo "<span class='small'><b>Ja estas subscrit</b><span>"; $sw1=1;
									}
								}
								if ($sw1==0)
										echo "<a class='botoncin bo3'href='".base_url()."index.php/subscripcions/inscriure/$item->id'>Subscriures</a>";
							}
										echo "</td></tr>";
				}?>
			</table>
		</div>
</section>