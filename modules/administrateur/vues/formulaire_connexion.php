
<div id="contenu">
<div id="black-tr">		
	<h3>CONNEXION</h3>
	
	<?php
	// affichage d'un message d'erreur au cas ou il y en a...
	?>
	<form method="POST" action="admin.php?module=administrateur&controleur=connexion&action=connect">
		<input type="text" name="pseudo" id="pseudo" placeholder="login" autofocus></br>
		<input type="password" name="pwd" placeholder="mot de passe"></br>
		<input class="btn btn-small btn-warning" type="submit" value="Connexion">
	</form>
</div>					
						
</div>