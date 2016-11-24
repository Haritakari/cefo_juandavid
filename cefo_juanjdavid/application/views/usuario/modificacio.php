<div class="content">
		<div>
			<h2>Formulari per a modificar les teves dades</h2>
			<?php echo validation_errors(); ?>
			<form method="post" autocomplete="off" action="<? echo base_url();?>validator/validar">
				<div class="flexi">
				<div class="flex">
				<label>Nom:</label>
				<input type="text" name="nom" value="<?php echo $usuario->nom ?>" required="required"/><br/>
				<label>Primer cognom:</label>
				<input type="text" name="cognom1" value="<?php echo $usuario->cognom1 ?>" required="required"/><br/>
				<label>Segon cognom:</label>
				<input type="text" name="cognom2" value="<?php echo $usuario->cognom2 ?>" required="required"/><br/>
				<label>Telefon fixe:</label>
				<input type="text" name="tfixe" value="<?php echo $usuario->telefon_fix ?>" required="required" pattern="[0-9]{9}" title="Telefon fixe"/><br/>
				<label>Telefon mobil:</label>
				<input type="text" name="tmobil" value="<?php echo $usuario->telefon_mobil ?>" required="required" pattern="[0-9]{9}" title="Telefon mobil"/><br/>
				<label>Data de naixement:</label>
				<input type="text" name="naix" value="<?php echo $usuario->data_naixement ?>" required="required"/><br/>
				<label>DNI:</label>
				<input type="text" name="dni" value="<?php echo $usuario->dni ?>" required="required"/><br/>
				<label>Email:</label>
				<input type="email" name="email" value="<?php echo $usuario->email ?>" required="required"/><br/>
				
				
			
			
			
					</div>
				<div class="flex alilef">
				<label>Estudis:</label>
				<select name="estudis">
					<option <?php if ($usuario->estudis==1)echo 'selected'?> value="1">Sense estudis</option>
					<option <?php if ($usuario->estudis==2)echo 'selected'?> value="2">EGB o ESO</option>
					<option <?php if ($usuario->estudis==3)echo 'selected'?> value="3">CFGSuperior o Batxillerat</option>
					<option <?php if ($usuario->estudis==4)echo 'selected'?> value="4">Titol Universitari</option>
				</select><br/><br/><br/>
				<label>Situació laboral</label>
				<select name="sl">
					<option <?php if ($usuario->situacio_laboral==1)echo 'selected'?> value="1">Aturat</option>
					<option <?php if ($usuario->situacio_laboral==2)echo 'selected'?> value="2">Actiu</option>
					<option <?php if ($usuario->situacio_laboral==3)echo 'selected'?> value="3">Altres</option>
				</select><br/><br/><br/>
				<label>Prestació</label>
				<select name="prestacio">
					<option <?php if ($usuario->prestacio==1)echo 'selected'?> value="1">Si</option>
					<option <?php if ($usuario->prestacio==2)echo 'selected'?> value="2">No</option>
				</select><br/><br/><br/>
			</div>
				
			</div>
				<input class="botoncin" type="submit" name="modificar" value="Guardar"/><br/>
				<br/>
				<a class="botoncin bo3" href='<?php echo base_url()?>/index.php/usuario/alumne/<?php echo $usuario->id;?>'>Enrere</a><br/>
			</form>
			</div>
		</div>