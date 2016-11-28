

	<div class="cont">
			<h2 class="det"><?php echo $curso[0]->nom;?></h2><br/><br/><br/>
		<table >
			<tr>
				<td><label class="det">Codi del curs:</label></td><td><?php echo $curso[0]->codi;?></span><br/>
			</tr><tr>
				<td><label class="det">Hores totals</label></td><td><?php echo $curso[0]->hores;?></span></td>
			</tr><tr>
				<td><label class="det">Data de inici del curs:</label></td><td>	<?php echo $curso[0]->data_inici;?></span></td>
			</tr><tr>
				<td><label class="det">Data fi del curs:</label></td><td><?php echo $curso[0]->data_fi;?></span></td>
			</tr><tr>
				<td><label class="det">Quin horari tindra:</label></td><td>	<?php echo $curso[0]->horari;?></span></td>
			</tr><tr>
				<td><label class="det">Mati o tarda?:</label></td><td><?php echo $curso[0]->torn;?></span></td>
			</tr><tr>
				<td><label class="det">Quina graduació te:</label></td><td>	<?php echo $curso[0]->tipus;?></span></td>
			</tr><tr>
				<td><label class="det">Requisits per poder accedir:</label></td><td><?php echo $curso[0]->requisits;?></span></td>
			</tr><tr>
				<td><label class="det">Descripció del curs:</label></td><td><?php echo $curso[0]->descripcio;?></td>
			</tr>
		</table>
		<br/><br/>
		<a class="botoncin bo1" href="http://localhost/cefo_juandavid/index.php/cursos/llistar">Tornar a cursos</a>
		
		<?php 
		if ($usuario){
			if (!$preinscripcions){
		?>
				<a class="botoncin bo3" href="http://localhost/cefo_juandavid/index.php/preinscripcions/registroP/<?php echo $curso[0]->id ?>">Preinscriures</a>
				<?php 
			}else{
				?>
					<span class='color'>Ja estas preinscrit en aquest curs</span>
				<?php 
			}
		}else{
			echo "<a class='botoncin bo3' href='http://localhost/cefo_juandavid/index.php/usuario/registroYpreinscri/".$curso[0]->id."'>Registre</a>";
		}
				?><br/><br/>
	</div>