<?php
function show_rubrique($result){
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
		if($result->rowCount()>0){
			echo '<table align="center" border="2" cellpadding="" cellspacing="">';
				echo '<TR>
							<TH>Icone</TH>
							<TH>Nom Rubrique</TH>
							<TH>Description</TH>';
				echo '</TR>';	
			while($data = $result->fetch()){	
				echo '<form method="POST" action="admin.php?module=administrateur&controleur=rubrique&action=mainrubrique">';
				echo '<TR>';
							echo'<TD>';
							$photo = $data['id_rubriques'];
							if (is_file("icones_rubriques/$photo.jpg")) {
								echo "<img src='icones_rubriques/$photo.jpg' width='50' height='30' alt='logo' />";
								}else{
								?>
									<img src='icones_rubriques/logoalt.jpg' width='50' height='30' alt='logo_alt' />
								<?php
								}
						 	
							echo'<TD><input name="nomrubrique" type="text" value="'.$data['nom_rubriques'].'"></TD>';
							echo'<TD><textarea name="description">'.$data['description'].'</textarea></TD>';	
				//action
				echo '<input type="hidden" name="id" value='.$data['id_rubriques'].'>';				
				echo '<TD><input type="submit" class="btn btn-small " value="modifier" name="modifier" value="modifier"></TD>
					  <TD><input type="submit" class="btn btn-small btn-warning" value="supprimer" name="supprimer" value="supprimer"></TD>
					</form>';
				echo '</TR>';
			}
			echo'</table>';

	}else{
		echo '<div class="black-box2 alert">Aucune rubrique trouvée</div>';
	}

echo '<table align="center"><form method="POST" enctype="multipart/form-data" action="admin.php?module=administrateur&controleur=rubrique&action=mainrubrique">';
				echo '<TR>';
							echo '<TD><input type="file" name="icone" style="width:140px" ></TD>';
							echo'<TD><input name="nomrubrique" type="text"></TD>';
							echo'<TD><textarea name="description"></textarea></TD>';											
				echo '<TD><input type="submit" class="btn btn-small btn-primary " value="Ajouter" name="ajouter" value="ajouter"></TD>
					</form>';
				echo '</TR>';
			echo'</table>';
}

?>
</div>					
<div class="clear"></div>						
</div>