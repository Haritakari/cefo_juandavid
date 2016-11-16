<section class="content">
		<div>
			<h2>Productos seleccionados para comprar</h2>
			<table class="most">
				<tr>
					<th></th>
					<th>Cantidad</th>
					<th>Nombre</th>
					<th>Precio</th>
				</tr>
			<?php 
				$total=0;
				$num=0;
				$sel='';
				foreach ($this->cart->contents() as $item){
					$precio=$item['price'] * $item['qty'];
					$total+=$precio;
					$num+=$item['qty'];
					$sel=$num>1? 'Productos':'Producto';
					
					echo "
						<tr> <form method='post'/>
						
							
							<td><img src='".$item['url']."' alt='imagen producto'/></td>
							<td class='relative'><input name='num' value='".$item['qty']."'/>
							<input type='image' class='cant su' name='suma' src='".base_url()."/images/sube.png' alt='imagen +'/>
							<input type='image' class='cant ba' name='rest' src='".base_url()."/images/baja.png' alt='imagen -'/></td>
							
							<td>".$item['name']."</td>
							<td>$precio €</td>
							<form method='post'/>
							<input type='hidden' name='roid' value='".$item['rowid']."'>
							<td><input class='boten' type='submit' name='delete' value='Eliminar' /></td>
							</form>
						</tr>";
				}
				echo "<tr>
							<th>Total</th>
							<th>$num</th>
							<th>$sel</th>
							<th>$total €</th>
						</tr>";
			
			
			?>
			</table><?php if($num>0){?>
						<a class="butadd" href='index.php?controlador=Producto&operacion=compra'>Tramitar compra</a>
					<?php }	?>
					<br/><br/><h3>Paso 1 de 3</h3>
			</div>
	</section>