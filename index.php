<?php
// Initialisation
include 'global/init.php';
// Début de la tamporisation de sortie
ob_start();
// Si un module est specifié, on regarde s'il existe
	if (!empty($_GET['module'])) {
		$module = dirname(__FILE__).'/modules/'.$_GET['module'].'/';
	// Si le controleur est specifiée, on l'utilise, sinon, on tente une action par défaut
				$controleur = (!empty($_GET['controleur'])) ? CHEMIN_CONTROLEUR.$_GET['controleur'].'.php' :'index.php';
		// Si le controleur existe, on l'exécute
				if (is_file($module.$controleur)) {
					include $module.$controleur;
					// Si l'action existe, on l'exécute sinon on tente une action par défaut
					if(!empty($_GET['action'])){
						$action = $_GET['action'];
						//appel de la fonction
						$action();
					} else 
						include 'global/accueil.php';
				}
				// Controleur non specifié ou invalide ? On affiche la page d'accueil !
				} else {
					include 'global/accueil.php';
				}
// Fin de la tamporisation de sortie
$contenu = ob_get_clean();
// Début du code HTML
include 'global/haut.php';
echo $contenu;
// Fin du code HTML
include 'global/bas.php';
