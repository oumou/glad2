<?php
function get_article_rubrique($id){
	$bdd = PDO2::getInstance();
		$req = $bdd->prepare('select * from articles where id_rubrique=?');
		$req->execute(array($id));
	return $req;
}

function ajouter_article($info){
	$bdd = PDO2::getInstance();
		$req = $bdd->prepare('insert into articles(nom_articles,price,taille,stock,id_rubrique) values (?,?,?,?,?)');
		if($req->execute(array($info[0],$info[1],$info[2],$info[3],$info[4]))){
			$_SESSION['msg'] = "Article ajouté avec succès";
		$id = $bdd->lastInsertId();
		return $id;
		}
	}

function update_article($info){
	$bdd = PDO2::getInstance();
		$req = $bdd->prepare('update articles set nom_articles=?,price=?,taille=?,stock=?,id_rubrique=? where id_article=?');
		if($req->execute(array($info[1],$info[2],$info[3],$info[4],$info[5],$info[0]))){
			$_SESSION['msg'] = "Article modifié avec succès";
		}
	}

function delete_article($id){
	$bdd = PDO2::getInstance();
		$req = $bdd->prepare('delete from articles where id_article=?');
		if($req->execute(array($id))){
			$_SESSION['msg'] = "Article supprimé avec succès";
		}
	}

?>