
<header>
    <div id="headR_Home">

        <h1><a href="./index.php"> "Billet simple pour l'Alaska"</a></h1>
        <div id="lower_Deco">
            <div id="line_Ink">
                <!--Ink line add in css-->
            </div>
            <h2> Jean Forteroche</h2>
        </div>
    </div>

    <div id="nav_Log">
        <nav>
            <ul>
                <?php
								if (!isset($_SESSION['pseudo'])){
							?>
                <li class="libar">
                    <a href="./index.php?action=inscription">Connexion</a>
                </li>
                <?php
								}
                                
							?>
                <li class="libar">
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
								echo "<p id='pseudoc'> Bonjour ".$_SESSION['pseudo']."<br/><a href='./index.php?action=logOut' id='disconect'>Déconnexion</a><p>";
							}
						?>

    </div>
</header>

       