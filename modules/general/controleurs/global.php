<?php
include CHEMIN_VUE.'vue_apropos.php';

include CHEMIN_MODELE.'rubrique.php';
include CHEMIN_VUE.'vue_rubrique.php';
function apropos(){
	texte_apropos();
}


function rubrique(){
	if(isset($_REQUEST['id'])){
		$resultat = get_article($_REQUEST['id']);
		$rubrique = get_rubriquebd($_REQUEST['id']);
		affiche_article($resultat,$rubrique);
	}
}
function commander(){
	show_commande($_REQUEST['article']);
}
?>
