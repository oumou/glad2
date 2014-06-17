<?php
function affiche_admin($result){
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
							<TH>Nom</TH>
							<TH>Prenom</TH>
							<TH>Login</TH>
							<TH>Mot de passe</TH>';
				echo '</TR>';	
			while($data = $result->fetch()){	
				echo '<form method="POST" action="admin.php?module=administrateur&controleur=administrateur&action=mainadmin">';
				echo '<TR>';
							if($data['id'] == $_SESSION['id']){
								echo'<TD><input class="dim" name="nom" type="text" value="'.$data['nom'].'"></TD>';
								echo'<TD><input class="dim2" name="prenom" type="text" value="'.$data['prenom'].'"></TD>';
								echo'<TD><input class="dim" name="login" type="text" value="'.$data['login'].'"></TD>';
								echo'<TD><input name="motdepasse" type="password" ></TD>';	
							}else{
								echo'<TD><input class="dim" disabled name="nom" type="text" value="'.$data['nom'].'"></TD>';
								echo'<TD><input class="dim2" disabled name="prenom" type="text" value="'.$data['prenom'].'"></TD>';
								echo'<TD><input class="dim" disabled name="login" type="text" value="'.$data['login'].'"></TD>';
								echo'<TD><input disabled name="motdepasse" type="password" value="'.$data['motdepasse'].'"></TD>';	
							}							
				//action
				echo '<input name="id" type="hidden" value="'.$data['id'].'">';
				if($data['id'] == $_SESSION['id']){			
					echo '<TD><input type="submit" class="btn btn-small " value="modifier" name="modifier" value="modifier"></TD>';
				}else
					echo '<TD><input type="submit" class="btn btn-small btn-warning" value="supprimer" name="supprimer" value="supprimer"></TD>';
				echo'	</form>';
				echo '</TR>';
			}
			echo'</table>';

	}else{
		echo '<div class="black-box2 alert">Aucun administrateur trouvé</div>';
	}
?>	
<br/><br/><br/>
<div id="submenu">
		<span class="menu"><i>Ajouter un nouvel administrateur</i></span><br/><br/>
	</div>
<?php			
echo '<table align="center"><form method="POST" action="admin.php?module=administrateur&controleur=administrateur&action=mainadmin">';
				echo '<TR>
					<TH>Nom</TH>
					<TH>Prenom</TH>
					<TH>Login</TH>
					<TH>Mot de passe</TH>';
				echo '</TR>';

				echo '<TR>';
							
							echo'<TD><input class="dim" name="nom" type="text" ></TD>';
							echo'<TD><input name="prenom" type="text" ></TD>';
							echo'<TD><input class="dim" name="login" type="text" ></TD>';
							echo'<TD><input name="motdepasse" type="password" ></TD>';										
				echo '<TD><input type="submit" class="btn btn-small btn-primary " value="Ajouter" name="ajouter" value="ajouter"></TD>
					</form>';
				echo '</TR>';
			echo'</table>';
}

?>
</div>					
<div class="clear"></div>						
</div>