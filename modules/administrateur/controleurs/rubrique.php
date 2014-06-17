<?php
include CHEMIN_VUE.'vue_rubrique.php';
include CHEMIN_MODELE.'modele_rubrique.php';
function mainrubrique(){
	$_SESSION['error']="";
	if (isset($_REQUEST['ajouter'])){
		$info[] = $_REQUEST['nomrubrique'];
		$info[] = $_REQUEST['description'];
		$last_id = ajouter_rubrique($info);
		
		// insertion de l'icone et de la signature de du membre....
				if((isset($_FILES['icone'])) && ($_FILES['icone']['error']==0)){
					$extension_poss = array('jpg' , 'jpeg' , 'gif' , 'png','bmp');
					$infofile = pathinfo($_FILES['icone']['name']);
					$extension = $infofile['extension'];
					if (in_array($extension,$extension_poss))
					{
						$maxsize = 100024;
						$maxwidth = 1000; //Largeur de l'image
						$maxheight = 1000; //Longueur de l'image
									
						if ($_FILES['icone']['size'] <= $maxsize)
						{
							$image_sizes = getimagesize($_FILES['icone']['tmp_name']);
							if ($image_sizes[0] <= $maxwidth && $image_sizes[1] <= $maxheight)
								{
									move_uploaded_file($_FILES['icone']['tmp_name'],'icones_rubriques/'.$last_id.".jpg");
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
		$info[] = $_REQUEST['nomrubrique'];
		$info[] = $_REQUEST['description'];
		update_rubrique($info);
	}
	if (isset($_REQUEST['supprimer'])){
		$id= $_REQUEST['id'];
		delete_rubrique($id);
	}
	$result = get_rubrique();
	show_rubrique($result);
}


?>	