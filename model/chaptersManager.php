<?php
require_once("manager.php");

class ChaptersManager extends Manager
{
	public function chapterCall(){//Chapter on the first page.
		$bdd=$this->dbConnect();
		$chapters= $bdd->query('SELECT id,titre,textchap,date_format(date_edition,"%d.%m.%y")as date_fr FROM chapitres ORDER BY date_edition  DESC LIMIT 0,3');	
		return $chapters;
	}

	public function oneChap(){//This function will selected one chapter.
		$bdd=$this->dbConnect();
		$selectOne=$bdd->prepare('SELECT id,titre,textchap FROM chapitres WHERE id=:idPage ');
		 $selectOne->execute(array(
			'idPage'=>$_GET['id']
		 	 ));
		return $selectOne;
	
	}
	public function listChap(){	//This function will call all the chapter, and only the first 250 caracters.
		$bdd=$this->dbConnect();
		$allchap= $bdd->query('SELECT id,titre,SUBSTR(textchap, 1, 250)as textchap,date_format(date_edition,"%d.%m.%y")as date_fr FROM chapitres  ');//Selection of the first 100 characters 
		return $allchap;
	}

	public function showAllChap(){
		$bdd=$this->dbConnect();
		$allchapters= $bdd->query('SELECT id,titre FROM chapitres ORDER BY DESC date_edition ');
		return $allchapters;
	}
	public function postChapter($titleChap,$textChap){//This function will added a new chapter
		$bdd=$this->dbConnect();
		$newChap=$bdd->prepare('INSERT INTO chapitres ( id_pseudoAuteur,titre,textchap, date_edition) VALUES(:id_pseudoAuteur,:titre,:textchap, NOW() )' );
		$newChap->execute(array(
			'id_pseudoAuteur'=>$_SESSION['id'],
			'titre'=>$titleChap,
			'textchap'=>$textChap
			
		));
		$newChap=$bdd->query('SELECT chapitres.id_pseudoAuteur, membres.pseudo FROM chapitres LEFT JOIN membres ON chapitres.id_pseudoAuteur=membres.id');
		header("Location:index.php?action=admin");
	}

	public function reditChapter($idEdit,$titleEdit,$textEdit){//This function will changed a chapter
		$bdd=$this->dbConnect();
		$editChap=$bdd->prepare('UPDATE chapitres SET titre=:titre, textchap=:textchap WHERE id=:id');
		$editChap->execute(array(
			'titre'=>$titleEdit,
			'textchap'=>$textEdit,
			'id'=>$idEdit
		));
		return $editChap;
	}
	public function eraseChapter($idChapter){//This function will deleted
		$bdd=$this->dbConnect();
		$dltAChap=$bdd->prepare('DELETE FROM chapitres WHERE id=?');
		$eraseComms=$dltAChap->execute(array($idChapter));
		header("Location:./index.php?action=admin");
	}
}