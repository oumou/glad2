<?php
function affiche_article($result,$req){
	$data = $req->fetch();
	$rubrique = $data['nom_rubriques'];
?>
<div id="DIV_MOVE">
  <div id="D_MOVE_TITRE"></div>
  <div id="D_MOVE_CONTENT">
  		<div id="contenupanier">

  		</div>
  </div>
  <div id="D_MOVE_BAS">
  <form method="POST" action="index.php?module=general&controleur=global&action=commander" >
  	<div id="articleP"></div>
  	<button type="submit"style="margin-top:10px;" class="btn btn-warning btn-small">Commander</button>
  </form>
  </div>

 </div>
<div id="contenu">
<div id="black-article">
<?php
	if($result->rowCount()>0){
?>
<div id="submenu">
	<span class="menu"><i>Articles de la rubrique <?php echo $rubrique ?></i></span><br/><br/>
</div>
<p>

	<div class="span6 m6slider">
		 						<div id="myCarousel" class="carousel slide">  
	 							<div class="carousel-inner">
	 								<div class="item active"> 
		 									<img src='icones_articles/deb.jpg' height='600' alt='icone' />      
		 									<div class="carousel-caption">        
		 										<p>Défiler et voyez les articles de cette rubrique</p>      
		 									</div>
		 							</div>    
							<?php		 								
								while($data = $result->fetch())
							{		
								echo '<div class="item">';
								$photo = $data['id_article'];
								if (is_file("icones_articles/$photo.jpg")) {
								echo "<img src='icones_articles/$photo.jpg' height='600' alt='icone' />";
							
								}else{
							?>
								<img src='icones_articles/default.jpg' alt='alticone' />
							<?php
							}		      
		 						echo'		<div class="carousel-caption">        
		 										<h5 style="visibility:hidden"><i>'.$data['id_article'].'</i></h5>
		 										<h5><i>'.$data['nom_articles'].'</i></h5>
		 										<h5>PRIX: <i>'.$data['price'].'</i></h5>
		 										<h5>TAILLE: <i>'.$data['taille'].'</i></h5> 
		 										<h5>EN STOCK: <i>>'.$data['stock'].'</i></h5>      
		 										<h5 style="text-align:center">';
		 						$idA =$data['id_article'];
		 						$nomA =$data['nom_articles'];
		 						$prixA = $data['price'];
		 						$tailleA =$data['taille']; 
		 						$stockA = $data['stock'];  
		 						?>				
		 										<input tabindex=10 type="image" src="./images/panier.png" onClick="ajout_panier('<?php echo $idA ?>','<?php echo $nomA ?>','<?php echo $prixA ?>','<?php echo $tailleA ?>','<?php echo $stockA ?>');" /></h5>
		 									</div>    
		 								</div>
		 						<?php	
							}
							?>
		 							
		 							</div> 
		 							<a class="carousel-control left" data-slide="prev" href="#myCarousel">‹</a> <a class="carousel-control right" data-slide="next" href="#myCarousel">›</a> 
		 						</div> 
		 					</div>
		 		<?php
				}else
					echo '<div class="black-box2 alert">Aucun article dans cette rubrique</div>';	
?>
</p>
</div>					
<div class="clear"></div>						
</div>

<?php
}

function show_commande($result){
?>

<div id="contenu">
<div id="black-article">	
<div id="submenu">
	<span class="menu"><i>Articles Commandés</i></span><br/><br/>
</div>
<?php
$i = 0;
echo '<table align="center" border="2" cellpadding="" cellspacing="">';
	echo '<TR>
			<TH>Icone</TH>
			<TH>Nom Article</TH>
			<TH>PRIX</TH>
			<TH>TAILLE</TH>';
	echo '</TR>';	
while($i <count($result)){
		$id =$result[$i]; 
		$bdd = PDO2::getInstance();
    	$req = $bdd->prepare('select * from articles where id_article=?');
		$req->execute(array($id));
		$data = $req->fetch();
		echo '<TR>';
							echo'<TD>';
							$photo = $data['id_article'];
							if (is_file("icones_articles/$photo.jpg")) {
								echo "<img src='icones_articles/$photo.jpg' width='50' height='30' alt='logo' />";
								}else{
								?>
									<img src='icones_articles/logoalt.jpg' width='50' height='30' alt='logo_alt' />
								<?php
								}
							echo'</TD><TD>'.$data['nom_articles'].'</TD>';
							echo'<TD>'.$data['price'].'</TD>';
							echo'<TD>'.$data['taille'].'</TD>';
				echo '</TR>';
			
			
$i++;
}
echo'</table>';
?>
<div id="submenu">
	<span class="menu"><i>Mode de paiement</i></span><br/><br/>

	<img src='images/paypal.jpeg' width='50' height='30' alt='logop'/>
	<img src='images/visa.jpg' width='50' height='30' alt='logovisa'/>
	<img src='images/sgbs.jpg' width='50' height='30' alt='logosgbs'/>
	<img src='images/poste.jpg' width='50' height='30' alt='logoposte'/>
</div>
</div>					
<div class="clear"></div>						
</div>

<?php

}

?>
