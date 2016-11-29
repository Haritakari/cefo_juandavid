<div class="content">
		<div>
			<h2>Formulari de registre</h2>
			<?php echo validation_errors(); ?>
			<form method="post" autocomplete="off" >
			<div class="flexi">
				<div class="flex">
				<label>Nom:</label>
				<input type="text" name="nom" maxlength="15" required="required"  title="de 2 a 15 lletres" pattern="[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð]{2,15}"/><br/>
				<label>Primer cognom:</label>
				<input type="text" name="cognom1" maxlength="15" required="required" title="de 2 a 15 lletres" pattern="[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð]{2,15}"/><br/>
				<label>Segon cognom:</label>
				<input type="text" name="cognom2" maxlength="15" required="required" title="de 2 a 15 lletres" pattern="[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð]{2,15}"/><br/>
				<label>Telefon fixe:</label>
				<input type="text" name="tfixe" maxlength="11" required="required" pattern="[0-9]{5,11}" title="Telefon fixe"/><br/>
				<label>Telefon mobil:</label>
				<input type="text" name="tmobil" required="required" maxlength="11" pattern="[0-9]{5,11}" title="Telefon mobil"/><br/>
				<label>Data de naixement:</label>
				<input class="col" type="text" name="naix3" pattern="[0-3][0-9]{1}" required="required" maxlength="2" placeholder="dia" title="Dia"/><br/>
				<label></label>
				<input class="col" type="text" name="naix2" pattern="[0-1][0-9]{1}" required="required" maxlength="2" placeholder="mes" title="Mes"/><br/>
				<label></label>
				<input class="col" type="text" name="naix" pattern="[1-2][0-9][0-9][0-9]{1}" required="required" maxlength="4" placeholder="any" title="any"/><br/>
				<label>DNI:</label>								
				<input type="text" name="dni" maxlength="9" pattern="[XYZ0-9][0-9]{7}[A-Z]" required="required" title="DNI o NIE Lletra en mayuscula"/><br/>
				<label>Email:</label>
				<input type="email" name="email" required="required" title="Correu Electronic"/><br/>
				
				</div>
				<div class="flex alilef">
				<label>Estudis:</label>
				<select name="estudis" required="required">
					<option value="">Selecciona</option>
					<option value="1">Sense estudis</option>
					<option value="2">EGB o ESO</option>
					<option value="3">CFGSuperior o Batxillerat</option>
					<option value="4">Titol Universitari</option>
				</select><br/><br/><br/>
				<label>Situació laboral</label>
				<select name="sl" required="required">
					<option value="">Selecciona</option>
					<option value="1">Aturat</option>
					<option value="2">Actiu</option>
					<option value="3">Altres</option>
				</select><br/><br/><br/>
				<label>Prestació</label>
				<select name="prestacio" required="required">
					<option value="">Selecciona</option>	
					<option value="1">Si</option>
					<option value="2">No</option>
				</select><br/><br/><br/>
			</div>
			</div>
			<input class="botoncin bo3" type="submit" name="guardar" value="Guardar"/><br/>
			</form>
			</div>
		</div>