<section id="content">
			<div>
			<h2>Formulari per donar de baixa</h2>
			<p>Per favor, confirma la teva solicitud de baixa introducin la data de naixement</p>
		
			<form method="post" autocomplete="off">
				<label>User:</label>
				<input type="text" readonly="readonly" value="<?php echo $usuario->nom;?>" /><br/>
				
				<label>Data naixement:</label>
				<input type="text" name="naix" required="required"/><br/>
				
				<label></label>
				<input type="submit" name="confirmar" value="Confirmar"/><br/>
			</form>
			</div>
		</section>