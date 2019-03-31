<?php ob_start()?>
   <section>
    <div id="secondSideDeco">
        <article id="rules">
            <p id="mentions">Projet réalisé dans le cadre de la formation OpenClassroom: Développeur Web Junior.</p>
        </article>
        <div id="subBlock">
            <div class="formulaires">
                <h3>Connexion: </h3>
                <form method="post" action="./index.php?action=logger">
                    <label name="checkPseudo"> Pseudo:<input type="text" name="checkPseudo" id="pseudoMember" required></label>
                    <label name="checkmdp">Mot de passe:<input type="password" name="checkmdp" id="motDpasseMember" required /></label>
                    <input type="submit" id="validation" value="Valider" />
                </form>
            
            </div>
        </div>
    </div>
    <!--end secondSideDeco-->

</section>
<?php $content = ob_get_clean();?>
<?php require('./view/pages/template.php');?>