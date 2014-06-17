<?php
function verif_user($login,$pwd){
	$valid=0;
		$bdd = PDO2::getInstance();
		$req1 = $bdd->prepare('select * from administrateur where login =? and motdepasse =?');
		$req1->execute(array($login,SHA1($pwd)));
		if($res=$req1->fetch()){
			$_SESSION['type'] = 'admin';
			$_SESSION['id'] = $res['id'];
			$_SESSION['prenom'] = $res['prenom'];
			$_SESSION['nom'] = $res['nom'];
		$valid = 1;
		}
	return $valid;
	}
?>
		