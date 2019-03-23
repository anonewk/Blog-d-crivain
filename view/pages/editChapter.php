		<section>
			<article id="secondSideDeco">
				<h2>Ré-éditer le chapitre</h2>
				<?php
					while($chapitre = $pickOneChap->fetch()){
				?>

				<form id="editChaptre" action="./index.php?action=reEdit&amp;id=<?php echo $chapitre['id']; ?>" method="post">

					<label>Titre:<input type="text" name="title" id="title" value="<?php echo htmlspecialchars($chapitre['titre']);?>" required/></label>
					
					<textarea class="tinymce"  name="tinymce_Chap"><?= nl2br($chapitre['textchap'])?></textarea>
					
					<input type="submit" id="edit" value="Modifier" />
				</form>

				<?php
					}
					$pickOneChap->closeCursor();
				?>
			</article>
		</section>
