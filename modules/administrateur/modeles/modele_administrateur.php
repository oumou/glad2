<?php
function get_admin(){
	$bdd = PDO2::getInstance();
		$req = $bdd->query('select * from administrateur');
	return $req;
}
function ajouter_admin($info){
	$bdd = PDO2::getInstance();
		$req = $bdd->prepare('insert into administrateur(nom,prenom,login,motdepasse) values (?,?,?,?)');
		if($req->execute(array($info[0],$info[1],$info[2],$info[3]))){
			$_SESSION['msg'] = "Administrateur ajouté avec succès";
		}
	}

function update_admin($info){
	$bdd = PDO2::getInstance();
		$req = $bdd->prepare('update administrateur set nom=?,prenom=?,login=?,motdepasse=? where id=?');
		if($req->execute(array($info[1],$info[2],$info[3],$info[4],$info[0]))){
			$_SESSION['msg'] = "administrateur modifiée avec succès";
		}
	}

function delete_admin($id){
	$bdd = PDO2::getInstance();
		$req = $bdd->prepare('delete from administrateur where id=?');
		if($req->execute(array($id))){
			$_SESSION['msg'] = "administrateur supprimé avec succès";
		}
	}
?>