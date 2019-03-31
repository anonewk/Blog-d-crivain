<?php ob_start()?>
   <section>
    <div id="chapterSideDeco">
        <article id="chapterText">

            <h2><?php echo $pickOneChap['titre'];?></h2>
            <p><?php echo $pickOneChap['textchap'];?></p>


        </article>

        <article id="showComms">
            <h4>Commentaires:</h4>
            <?php
					
				while($commentaires= $commByChap->fetch() ){
			?>
            <span class="commChapter">
                <span class="membreComm">
                    <strong>Visiteur</strong>

                    à posté le : <?php echo htmlspecialchars($commentaires['date_poste_fr']);?>
                    <p>

                        <?= nl2br($commentaires['contenu']);?><span class="signaler"><a href="./index.php?action=signaler&amp;id=<?php echo $commentaires['id_comm']; ?>"> Signaler ce commentaire</a></span>
                    </p>

                </span>
            </span>
            <?php
							}
							$commByChap->closeCursor();
						?>

            <div id="writeComm">
                <form id="getNewComment" action="./index.php?action=ValiderComment&amp;id=<?php echo $_GET['id']; ?>" method="post">


                    <textarea id="tinymce" name="tinymce"></textarea>
                    <input type="submit" id="save" value="Valider" />
                </form>

            </div>
        </article>

    </div>
</section>
<?php $content = ob_get_clean();?>
<?php require('template.php');?>