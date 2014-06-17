<?php

// fonction de connexion de l'admin
function connect(){
	
	if(!isset($_REQUEST['pseudo']) || !isset($_REQUEST['pwd']) || $_REQUEST['pwd']=='' || $_REQUEST['pseudo']==''){
	
		include CHEMIN_VUE.'formulaire_connexion.php';
	
	}else{
	
	// si l'admin s'est authentifier...
	$pseudo = htmlspecialchars($_REQUEST['pseudo']);
	$pwd = $_REQUEST['pwd'];
		
		//inclusion du modéle
		include CHEMIN_MODELE.'connexion.php';
		if(verif_user($pseudo,$pwd)){
			header('Location:admin.php');
		}
		else{
			include CHEMIN_VUE.'formulaire_connexion.php';
		}
	}
}

// fonction de deconnexion de l'admin
function deconnect(){
	unset($_SESSION);
	session_destroy();
	header('Location:admin.php');
}

?>