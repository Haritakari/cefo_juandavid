<div class="content">
		<div>
			<h2>Formulari de registre</h2>
			<form method="post" autocomplete="off" >
			<div class="flexi">
				<div class="flex">
				<label>Nom:</label>
				<input type="text" name="nom" required="required"/><br/>
				<label>Primer cognom:</label>
				<input type="text" name="cognom1" required="required"/><br/>
				<label>Segon cognom:</label>
				<input type="text" name="cognom2" required="required"/><br/>
				<label>Telefon fixe:</label>
				<input type="text" name="tfixe" required="required" pattern="[0-9]{9}" title="Telefon fixe"/><br/>
				<label>Telefon mobil:</label>
				<input type="text" name="tmobil" required="required" pattern="[0-9]{9}" title="Telefon mobil"/><br/>
				<label>Data de naixement:</label>
				<input type="text" name="naix" required="required"/><br/>
				<label>DNI:</label>
				<input type="text" name="dni" required="required"/><br/>
				<label>Email:</label>
				<input type="email" name="email" required="required"/><br/>
				
				</div>
				<div class="flex alilef">
				<label>Estudis:</label>
				<select name="estudis">
					<option value="1">Sense estudis</option>
					<option value="2">EGB o ESO</option>
					<option value="3">CFGSuperior o Batxillerat</option>
					<option value="4">Titol Universitari</option>
				</select><br/><br/><br/>
				<label>Situació laboral</label>
				<select name="sl">
					<option value="1">Aturat</option>
					<option value="2">Actiu</option>
					<option value="3">Altres</option>
				</select><br/><br/><br/>
				<label>Prestació</label>
				<select name="prestacio">
					<option value="1">Si</option>
					<option value="2">No</option>
				</select><br/><br/><br/>
			</div>
			</div>
			<input class="botoncin" type="submit" name="guardar" value="Guardar"/><br/>
			</form>
			</div>
		</div>