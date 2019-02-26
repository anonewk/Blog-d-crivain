<section>
	<?php
		if(isset($_SESSION["pseudo"])){
			if( ($_SESSION["id"])=="115"){
			
			require("adminPage.php");
		
			}
		}
		else{
			echo'<section>
				<div id="AdminConnexion">
					<p class="warningAcces">Seul l\'administrateur de ce blog à accès à cette section.<br/>
					 Veulliez retrourner<a href="./index.php"> à la page d\'accueil </a>ou <a href="./home.php?action=inscription"> connecter vous à votre espace</a> pour profiter des fonctionnalitées du site.<br/>
					Merci.</p>
				</div>';
		}
	?>
</section>
</body>
</html>