		<section>
		    <article id="secondSideDeco">
		        <h2>Ré-éditer le chapitre</h2>


		        <form id="editChaptre" action="./index.php?action=reEdit&amp;id=<?php echo $pickOneChap['id']; ?>" method="post">

		            <label>Titre:<input type="text" name="title" id="title" value="<?php echo htmlspecialchars($pickOneChap['titre']);?>" required /></label>

		            <textarea class="tinymce" name="tinymce_Chap"><?= nl2br($pickOneChap['textchap'])?></textarea>

		            <input type="submit" id="edit" value="Modifier" />
		        </form>


		    </article>
		</section>
