<?php
include CHEMIN_MODELE.'modele_administrateur.php';
include CHEMIN_VUE.'vue_administrateur.php';
function mainadmin(){

	if (isset($_REQUEST['ajouter'])){
		$info[] = $_REQUEST['nom'];
		$info[] = $_REQUEST['prenom'];
		$info[] = $_REQUEST['login'];
		$info[] = sha1($_REQUEST['motdepasse']);
		ajouter_admin($info);
	}
if (isset($_REQUEST['modifier'])){
		$info[]= $_REQUEST['id'];
		$info[] = $_REQUEST['nom'];
		$info[] = $_REQUEST['prenom'];
		$info[] = $_REQUEST['login'];
		$info[] = sha1($_REQUEST['motdepasse']);
		update_admin($info);
	}
	if (isset($_REQUEST['supprimer'])){
		$id= $_REQUEST['id'];
		delete_admin($id);
	}
	
	$req = get_admin();
	affiche_admin($req);
}
?>