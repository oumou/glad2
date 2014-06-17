<!DOCTYPE html>
<html>
	<head>
		<title>ADMIN GLAD</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<link rel="stylesheet" href="style/bootstrap.css" type="text/css" media="screen" />
		<link rel="stylesheet" href="style/style1.css" type="text/css" media="screen" />
	</head>

<body>

	<div id="wrapper">
	
		<div id="header">
			<a href="admin.php"><img src="./images/glad.png" width="280" height="100" alt="logo_glad"/></a>
		</div>
		<?php
			if(user_connected()){
				if($_SESSION['type']=="admin"){
					?>
					<div id="left-person">
						<?php menu_admin();	?>
					</div>

					<?php
				}
			}
		?>
		<div id="uppers">
			<form action="#">
				<h1><em>ADMIN GLAD</em></h1> 
			</form>
			<div id="nav-top">
					<?php
							if(user_connected()){
							if($_SESSION['type']=="admin"){
								echo '<p><h3>'.$_SESSION['prenom'].' '.$_SESSION['nom'].'</h3></p>';
					?>
									<p><a href="admin.php?module=administrateur&controleur=connexion&action=deconnect">Se déconnecter</a>
									</p>
					<?php

								}
							}
					?>
			</div>
		</div>
			
	