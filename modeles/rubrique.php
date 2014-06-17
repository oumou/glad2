<?php
function get_article($id){
	$bdd = PDO2::getInstance();
    $req = $bdd->prepare('select * from articles where id_rubrique=?');
		$req->execute(array($id));
return $req;
	}

function get_rubriquebd($id){
	$bdd = PDO2::getInstance();
    $req = $bdd->prepare('select * from rubrique where id_rubriques=?');
		$req->execute(array($id));
return $req;
	}

?>
		