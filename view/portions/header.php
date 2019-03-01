<!DOCTYPE html>

<html>
	<head>
		<meta charset="utf-8">

		<meta name="description" content="Découvert le nouveau roman de Jean Forteroche, 'Billet simple pour Alaska'.(Projet Openclassroom)">

		<meta name="keywords" content="Billet simple pour l'Alaska, Jean Forteroche, Roman, Livre, En Ligne, nouveautées, Actulitée, Auteur" />

			<link rel="stylesheet" type="text/css" href="view/css/menu.css">
		<link rel="stylesheet" type="text/css" href="view/css/styles.css">
		<link rel="stylesheet" type="text/css" href="view/css/stylesA.css">
		<link rel="stylesheet" type="text/css" href="view/css/stylesResponsiv.css">
		<!--POLICES-->
		<link href="https://fonts.googleapis.com/css?family=Dancing+Script" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Courgette" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Raleway:500" rel="stylesheet">

		<script src="view/tinymce/js/tinymce/tinymce.min.js"></script>
		<script>
			tinymce.init({ 
				selector:'textarea',
				height:'250px'
			});
		</script>
		<title>Billet simple pour l'Alaska, par JF</title>

	</head>

		<body>	
			<header>
				<div id="headR_Home">

					<h1><a href="./index.php"> "Billet simple pour l'Alaska"</a></h1>
						<div id="lower_Deco">
							<div id="line_Ink"><!--Ink line add in css--></div>
							<h2> Jean Forteroche</h2>
						</div>
				</div>
					
				<div id="nav_Log">
					<nav>
						<ul>
							<?php
								if (!isset($_SESSION['pseudo'])){
							?> 
								<li>
									<a href="./index.php?action=inscription">Connexion</a>
								</li>
							<?php
								}
                                
							?>
								<li>
									<a href="./index.php?action=chapitres">Les Chapitres</a>
								</li>
							<?php
								if (isset($_SESSION['pseudo'])){
									echo "<li><a href='./index.php?action=adminPage'>Admin</a></li>";
									}
							?> 
								
						</ul>
					</nav>
						<?php
							if (isset($_SESSION['pseudo'] ) ) {
								echo "<p> Bonjour ".$_SESSION['pseudo']."<br/><a href='./index.php?action=logOut'>Déconnexion</a><p>";
							}
						?>
						
				</div>
			</header>
