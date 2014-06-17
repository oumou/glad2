<?php
function get_rubrique(){
	$bdd = PDO2::getInstance();
		$req = $bdd->query('select * from rubrique');
	return $req;
}

function get_rubriqueid($id){
	$bdd = PDO2::getInstance();
		$req = $bdd->prepare('select * from rubrique where id_rubriques = ?');
		$req->execute(array($id));
	return $req;
}
function ajouter_rubrique($info){
	$bdd = PDO2::getInstance();
		$req = $bdd->prepare('insert into rubrique(nom_rubriques,description) values (?,?)');
		if($req->execute(array($info[0],$info[1]))){
			$_SESSION['msg'] = "Rubrique ajoutée avec succès";
		$id = $bdd->lastInsertId();
		return $id;
		}
	}

function update_rubrique($info){
	$bdd = PDO2::getInstance();
		$req = $bdd->prepare('update rubrique set nom_rubriques=?, description=? where id_rubriques=?');
		if($req->execute(array($info[1],$info[2],$info[0]))){
			$_SESSION['msg'] = "Rubrique modifiée avec succès";
		}
	}

function delete_rubrique($id){
	$bdd = PDO2::getInstance();
		$req = $bdd->prepare('delete from rubrique where id_rubriques=?');
		if($req->execute(array($id))){
			$_SESSION['msg'] = "Rubrique supprimée avec succès";
		}
	}

?>