<?php
class Manager{
	protected function dbConnect(){
		try{
			$bdd=new PDO('mysql:host=db729328087.db.1and1.com;dbname=db729328087;charset=utf8', 'dbo729328087','D@rklight2x');
			$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			return $bdd;
		}
		catch (Exception $e){
			die('Erreur: ' . $e->getmsg());
		}
	}
}