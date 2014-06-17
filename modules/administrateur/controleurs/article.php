<?php
include CHEMIN_MODELE.'modele_rubrique.php';
include CHEMIN_VUE.'vue_article.php';
include CHEMIN_MODELE.'modele_article.php';
function mainarticle(){
	$req = get_rubrique();
	choix_rubrique($req);
	if(isset($_REQUEST['rubrique'])){
		$rubrique = get_rubriqueid($_REQUEST['rubrique']);
		$req = get_article_rubrique($_REQUEST['rubrique']);
		show_article_rubrique($req,$rubrique);
	}
}

function traiter(){
	$rubrique = $_REQUEST['idrubrique'];
	$_SESSION['error']="";
	if (isset($_REQUEST['ajouter'])){
		$info[] = $_REQUEST['nomarticle'];
		$info[] = $_REQUEST['price'];
		$info[] = $_REQUEST['taille'];
		$info[] = $_REQUEST['stock'];
		$info[] = $_REQUEST['idrubrique'];
		$last_id = ajouter_article($info);
		
		// insertion de l'icone et de la signature de du membre....
				if((isset($_FILES['icone'])) && ($_FILES['icone']['error']==0)){
					$extension_poss = array('jpg' , 'jpeg' , 'gif' , 'png','bmp');
					$infofile = pathinfo($_FILES['icone']['name']);
					$extension = $infofile['extension'];
					if (in_array($extension,$extension_poss))
					{
						$maxsize = 1000000;
						$maxwidth = 10000; //Largeur de l'image
						$maxheight = 10000; //Longueur de l'image
									
						if ($_FILES['icone']['size'] <= $maxsize)
						{
							$image_sizes = getimagesize($_FILES['icone']['tmp_name']);
							if ($image_sizes[0] <= $maxwidth && $image_sizes[1] <= $maxheight)
								{
									move_uploaded_file($_FILES['icone']['tmp_name'],'icones_articles/'.$last_id.".jpg");
							}
							else{
									$_SESSION['error'].="Image trop large ou trop longue :(<strong>".$image_sizes[0]."x".$image_sizes[1]."</strong> contre <strong>".$maxwidth."x".$maxheight."</strong>)<br />\n";
							}
						}
						else{
							$_SESSION['error'].= "Le fichier est trop gros :(<strong>".$_FILES['icone']['size']." Octets</strong> contre <strong>".$maxsize." Octets</strong>)<br />\n";
						}
					}else{
						$_SESSION['error'].= "L'extention du fichier n'est pas valide:<br />\n";
					}
				}else{
					$_SESSION['error'].= "Aucune icone n'a été ajouté: <br />\n";
				}
	}

	if (isset($_REQUEST['modifier'])){
		$info[]= $_REQUEST['id'];
		$info[] = $_REQUEST['nomarticle'];
		$info[] = $_REQUEST['price'];
		$info[] = $_REQUEST['taille'];
		$info[] = $_REQUEST['stock'];
		$info[] = $_REQUEST['idrubrique'];
		update_article($info);
	}
	if (isset($_REQUEST['supprimer'])){
		$id= $_REQUEST['id'];
		delete_article($id);
	}


	header("Location:admin.php?module=administrateur&controleur=article&action=mainarticle&rubrique=$rubrique");
}


?>	