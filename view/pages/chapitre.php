<section>
	<div id="chapterSideDeco">
		<article id="chapterText"> 
			<?php

				while($chapitre = $pickOneChap->fetch()){
			?>
			<h2><?php echo htmlspecialchars($chapitre['titre']);?></h2>		
				<p><?php echo($chapitre['textchap'])?></p>
			<?php
			}
				$pickOneChap->closeCursor();
			?>
		</article>

		<article id="showComms">
			<h4>Commentaires:</h4>
			<?php
				if( isset($_SESSION['pseudo']) ){		
				while($commentaires= $commByChap->fetch() ){
			?>
				<span class="commChapter">
					<span class="membreComm">
						<strong><?php echo htmlspecialchars($commentaires['pseudo']);?></strong>
					
						à posté le : <?php echo htmlspecialchars($commentaires['date_poste_fr']);?>
						<p>
						<?php
							if ($commentaires['warning_comm'] ==1) {
								echo '<span class="attentionRequired"> Vérification du contenu en cours</span>';
							}
						?>
							<?= nl2br($commentaires['contenu']);?><span class="signaler"><a href="./index.php?action=signaler&amp;id=<?php echo $commentaires['id_comm']; ?>&amp;id_chap=<?php echo $commentaires['id_chap']; ?>"> Signaler ce commentaire</a></span>
						</p>

					</span>
				</span>
						<?php
							}
							$commByChap->closeCursor();
						?>

					<div id="writeComm">
						<form id="getNewComment" action="./index.php?action=ValiderComment&amp;id=<?php echo $_GET['id']; ?>" method="post">
							
							<label>Pseudo:<?php echo htmlspecialchars($_SESSION['pseudo']);?></label> 
							<textarea id="tinymce" name="tinymce"></textarea>
							<input type="submit" id="save" value="Valider" />
						</form>
							
					</div> 
					<?php
					}//end of pseudo session condition
					else{
							echo "<p class='restrictionMembre'>Vous devez être <a href='./index.php?action=inscription'>connecté </a> pour avoir accès aux commentaires.</p>";
						}
					?>
		</article>		

				</div>
			</section>
</body>
</html>