<div class="content">
		<div>
			<h2>Formulario de registro</h2>
			<form method="post" autocomplete="off">
				<label>User:</label>
				<input type="text" name="user" required="required" 
					pattern="^[a-zA-Z]\w{2,9}" title="3 a 10 caracteres (numeros, letras o guión bajo), comenzando por letra"/><br/>
				
				<label>Password:</label>
				<input type="password" name="password" required="required" 
					pattern=".{4,16}" title="4 a 16 caracteres"/><br/>
				
				<label>Nombre:</label>
				<input type="text" name="nombre" required="required"/><br/>
				<label>Apellidos:</label>
				<input type="text" name="apellidos" required="required"/><br/>
				<label>Telefono:</label>
				<input type="text" name="telefono" required="required" pattern="[0-9]{9}" title="Telefono"/><br/>
				<label>Fecha de nacimiento:</label>
				<input type="text" name="fecha_nacimiento" required="required"/><br/>
				<label>Dirección:</label>
				<input type="text" name="direccion" required="required"/><br/>
				<label>DNI:</label>
				<input type="text" name="dni" required="required"/><br/>
				<label>Email:</label>
				<input type="email" name="email" required="required"/><br/>
				<label>Ciudad:</label>
				<input type="text" name="ciudad" required="required"/><br/>
				<label>Pais:</label>
				<input type="text" name="pais" required="required"/><br/>
				
				
				
				<label></label>
				<input type="submit" name="guardar" value="guardar"/><br/>
			</form>
			</div>
		</div>