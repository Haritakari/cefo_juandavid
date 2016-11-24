<section class="content">

		<div>
			<h2>Inscriure Árees Formatives </h2>

			<table class="most">
				<tr>
					<th>Nom</th>
				</tr>
				
			<?php 
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