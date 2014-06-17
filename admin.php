<?php

// Initialisation
include '/modules/administrateur/global/init.php';

// Début de la tamporisation de sortie
ob_start();
// Si un module est specifié, on regarde s'il existe
	if(!user_connected()){
		$module=dirname(__FILE__).'/modules/administrateur';
		$controleur=CHEMIN_CONTROLEUR.'connexion.php';
		include $module.$controleur;
			connect();
	}
	else
	{
		if($_SESSION['type']=="admin"){
		
			if (!empty($_GET['module'])) {
				$module = dirname(__FILE__).'/modules/'.$_GET['module'].'/';
			// Si le controleur est specifiée, on l'utilise, sinon, on tente une action par défaut
				$controleur = (!empty($_GET['controleur'])) ? CHEMIN_CONTROLEUR.$_GET['controleur'].'.php' :'admin.php';
			// Si le controleur existe, on l'exécute
				if (is_file($module.$controleur)) {
					include $module.$controleur;
					// Si l'action existe, on l'exécute sinon on tente une action par défaut
					if(!empty($_GET['action'])){
					
						$action = $_GET['action'];
						//appel de la fonction
						$action();
					}else
						include '/modules/administrateur/global/accueil.php';
					// Sinon, on reste dans la page d'accueil admin
				}else{
					include '/modules/administrateur/global/accueil.php';
				}
			}else{
				include '/modules/administrateur/global/accueil.php';
			}				
		}
	}		
			
			// Fin de la tamporisation de sortie
			$contenu = ob_get_clean();
			// Début du code HTML
			include '/modules/administrateur/global/haut.php';
			echo $contenu;
			// Fin du code HTML
			include '/modules/administrateur/global/bas.php';
	