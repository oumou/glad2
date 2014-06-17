
<?php
function choix_rubrique($req){
?>
<div id="contenu">
<div id="black-tl2">
<?php
if (isset($_SESSION['msg']) && $_SESSION['msg']!=""){
	echo '<div class="alert">'.$_SESSION['msg'].'</div>';
	$_SESSION['msg']="";
}
if (isset($_SESSION['error']) && $_SESSION['error']!=""){
	echo '<div class="alert">'.$_SESSION['error'].'</div>';
	$_SESSION['error']="";
}

echo '<div id="submenu">
	<span class="menu"><i>Liste des articles</i></span><br/><br/>
</div>';
	
if(!$req->rowCount()>0){
		echo '<div class="black-box2 alert">Aucune rubrique trouvée</div>';
	}
	else{
	
		echo '<form name="ajout" method="POST" action="admin.php?module=administrateur&controleur=article&action=mainarticle">';
				echo '<table align="center" border="0" border="1" cellpadding="2" cellspacing="2">';
				echo '<tr><td>Selectionner une rubrique:</td></tr>';
				echo "<tr><td><select name='rubrique' id='rubrique' onChange='this.form.submit()'>";
					echo "<option value=''>sélectionner...</option>";
					while($res = $req->fetch()){	
						echo '<option value='.$res['id_rubriques'].'>'.$res['nom_rubriques'].'</option>';
					}
				echo '</select></td></tr>';
				echo '</table>';
		echo '</form>';
		
		}
}

function show_article_rubrique($result,$rubrique){
	$inforubrique = $rubrique->fetch();

	?>
	<div id="submenu">
		<span class="menu"><i>Articles de la rubrique <?php echo $inforubrique['nom_rubriques'] ?></i></span><br/><br/>

	</div>
	<?php
	if($result->rowCount()>0){
		echo '<table align="center" border="2" cellpadding="" cellspacing="">';
				echo '<TR>
							<TH>Icone</TH>
							<TH>Nom Article</TH>
							<TH>PRIX</TH>
							<TH>TAILLE</TH>
							<TH>STOCK</TH>';
				echo '</TR>';	
			while($data = $result->fetch()){	
				echo '<form method="POST" action="admin.php?module=administrateur&controleur=article&action=traiter">';
				echo '<TR>';
							echo'<TD>';
							$photo = $data['id_article'];
							if (is_file("icones_articles/$photo.jpg")) {
								echo "<img src='icones_articles/$photo.jpg' width='50' height='30' alt='logo' />";
								}else{
								?>
									<img src='icones_articles/logoalt.jpg' width='50' height='30' alt='logo_alt' />
								<?php
								}
							echo'<TD><input name="nomarticle" type="text" value="'.$data['nom_articles'].'"></TD>';
							echo'<TD><input name="price" class="dim" type="text" value="'.$data['price'].'"></TD>';
							echo'<TD><input name="taille" class="dim" type="text" value="'.$data['taille'].'"></TD>';
							echo'<TD><input name="stock" class="dim" type="text" value="'.$data['stock'].'"></TD>';

				//action
				echo '<input type="hidden" name="id" value='.$data['id_article'].'>';	
				echo'<input name="idrubrique" type="hidden" value='.$inforubrique['id_rubriques'].'>';			
				echo '<TD><input type="submit" class="btn btn-small " value="modifier" name="modifier" value="modifier"></TD>
					  <TD><input type="submit" class="btn btn-small btn-warning" value="supprimer" name="supprimer" value="supprimer"></TD>
					</form>';
				echo '</TR>';
			}
			echo'</table>';

		}else
			echo '<div class="black-box2 alert">Aucun article dans cette rubrique</div>';	
?>	
<br/><br/><br/>
<div id="submenu">
		<span class="menu"><i>Ajouter un article dans cette rubrique</i></span><br/><br/>
	</div>
<?php
echo '<table align="center"><form method="POST" enctype="multipart/form-data" action="admin.php?module=administrateur&controleur=article&action=traiter">';
				echo '<TR>
							<TH>Icone</TH>
							<TH>Nom Article</TH>
							<TH>PRIX</TH>
							<TH>TAILLE</TH>
							<TH>STOCK</TH>';
				echo '</TR>';	
				echo '<TR>';
							echo '<TD><input type="file" name="icone" style="width:140px" ></TD>';
							echo'<TD><input name="nomarticle" type="text" ></TD>';
							echo'<TD><input name="price" class="dim" type="text"></TD>';
							echo'<TD><input name="taille" class="dim" type="text" ></TD>';
							echo'<TD><input name="stock" class="dim" type="text" ></TD>';	
							echo'<TD><input name="idrubrique" type="hidden" value='.$inforubrique['id_rubriques'].'></TD>';	
				echo '<TD><input type="submit" class="btn btn-small btn-primary " value="Ajouter" name="ajouter" value="ajouter"></TD>
					</form>';
				echo '</TR>';
			echo'</table>';
}

?>

</div>					
<div class="clear"></div>						
</div>