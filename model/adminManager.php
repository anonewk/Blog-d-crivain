<?php
require_once("manager.php");

class membersManager extends Manager
{
	public function checkInfo($checkPseudo,$checkmdp){
		$bdd=$this->dbConnect();
		$req= $bdd->prepare('SELECT pseudo, mdp FROM membres');
		$req->execute(array(
	   			    ':pseudo' => $checkPseudo,
                    ':mdp' => $checkmdp
            
	   			));
	
		$resultat = $req->fetch();
	
	    	if (
            $checkmdp = $_POST['checkmdp']   
	   ) {
	       		$_SESSION['pseudo'] = $checkPseudo;
	        	echo 'Content de vous revoir '. $_SESSION['pseudo'];
	        	 header("Location:./index.php");
	   		}
	   		else{
	   			echo "Une erreur est survenu. Veuilliez ré-essayer.";
	    	}
//        	return $isPasswordCorrect; 
		}
	
	}


	

//end class membersManager();
