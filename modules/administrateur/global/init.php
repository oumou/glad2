<?php
// Inclusion du fichier de configuration (qui définit des constantes)
include '/modules/administrateur/global/config.php';
// Utilisation et démarrage des sessions
session_start();
// Inclusion de Pdo2, potentiellement utile partout
include CHEMIN_LIB.'pdo2.php';

function user_connected() {
	return !empty($_SESSION['type']);
	}

function menu_admin() {
	?>
		
		<ul>
			<li><a href="admin.php?module=administrateur&controleur=rubrique&action=mainrubrique">Rubriques</i></li>
			<li><i><a href="admin.php?module=administrateur&controleur=article&action=mainarticle">Articles</a></i></li>
			<li><i><a href="admin.php?module=administrateur&controleur=commande&action=maincommande">Commandes</a></i></li>
			<li><i><a href="admin.php?module=administrateur&controleur=administrateur&action=mainadmin">Administrateurs</a></i></li>
		</ul>
		
	<?php
	}
?>