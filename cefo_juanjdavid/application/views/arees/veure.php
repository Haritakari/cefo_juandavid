<section class="content">

		<div>
			<h2>Inscriure Árees Formatives </h2>

			<table class="most auto">
				<tr>
					<th>Nom</th>
				</tr>
				
			<?php 
				
				var_dump($subscripcions);
			
				foreach ($arees as $pro=>$item){
					
					echo "
						<tr onclick='Mrl($item->id)';>
							<td>$item->nom</td>
							
							<td onclick='event.stopPropagation();'><a class='botoncin bo3'href='".base_url()."index.php/subscripcions/inscriure/$item->id'>Inscriures</a></td>
						</tr></a>";
				}?>
			</table>
		</div>
</section>