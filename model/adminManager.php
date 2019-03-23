<?php
require_once("manager.php");

class membersManager extends Manager
{
	public function checkInfo($checkPseudo,$checkmdp){
		$bdd=$this->dbConnect();
		$req= $bdd->prepare('SELECT id, mdp FROM membres WHERE pseudo = :pseudo  ');
		$req->execute(array(
	   			    ':pseudo' => $checkPseudo
                  
                  
	   			));
	  
		$resultat = $req->fetch();
		$isPasswordCorrect = password_verify($checkmdp, $resultat['mdp']);

		if (!$resultat){
			
             header("Location:./index.php");
		}
		else{
	    	if ($isPasswordCorrect) {
	        	$_SESSION['id'] = $resultat['id'];
	       		$_SESSION['pseudo'] = $checkPseudo;
	         header("Location:./index.php");
	        	
	   		}
	   		else{
	   			echo "Une erreur est survenu. Veuilliez ré-essayer.";
	    	}
		}
		return $isPasswordCorrect; 
    }   
	
	
}
    


	

//end class membersManager();
?>
