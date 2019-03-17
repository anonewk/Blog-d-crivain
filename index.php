<?php
session_start();

require("controller/Front.php");
require("controller/Back.php");

try {
    
     
    if (!(isset($_GET['action']))) {
	   headBand();	
        getAllChaps();
    }
     
if (isset($_GET['action'])){

	if($_GET['action']=='logOut'){//log ou session
		session_destroy();
		header("Location:index.php");
	}

/*--------------------------------LOGIN / SUBSCRIBE----------------------------------------*/ //Redirection on Connexion page
	if($_GET['action']=='inscription'){
               headBand();	
	 		formulaire();
	}//end of $_GET['action']=='inscription'		

    
    // Condition of connexion
	if ($_GET['action']=='logger'){
		$checkPseudo = htmlspecialchars($_POST['checkPseudo']);
		$checkmdp = $_POST['checkmdp'];
        

		if (isset($checkPseudo)&& isset($checkmdp) ){
			$noNickName="Aucun pseudo reconnu";
			$NoMatch="Pseudo ou mot de passe incorrect";

				    
				checkInfo($checkPseudo,$checkmdp);
				noNickName($noNickName);
				NoMatch($NoMatch);
          
              
		}
	}//end of 'logger'
    
    //Admin redirection  
    if($_GET['action'] == 'adminPage')
    {    
	     headBand();	
        lastUpdate();

    }
        

/*--------------------------------END OF SUBSCRIB/ LOGIN----------------------------------------*/
/*--------------------------------CHAPTERS----------------------------------------*/
 	if ($_GET['action']=='chapitres') {

	       headBand();	          
		getAllChaps();

            
	}

	if($_GET['action']=='selectionchapitre'){

		   headBand();	
		getOneChap();
	} 	

	if ($_GET['action']=='postChap') {
		$titleChap=$_POST['title'];
		$textChap=$_POST['tinymce_Chap'];
			
			postChap($titleChap,$textChap);
			lastUpdate();
	}

	if ($_GET['action']=='editChap') {
		$chapEdit=$_GET['id'];
			
		    headBand();
			editChapter();
	}

	if($_GET['action']=='reEdit'){
		$idEdit=$_GET['id'];
		$titleEdit=$_POST['title'];
		$textEdit=$_POST['tinymce_Chap'];
        reEditChap($idEdit,$titleEdit,$textEdit);
            headBand();
			lastUpdate();
			
		}
	if ($_GET['action']=='eraseChap') {
		$idChapter=$_GET['id'];

			deletedChapAndComments($idChapter);
	}
    
/*--------------------------------COMMENTS----------------------------------------*/
	if($_GET['action']=='ValiderComment'){
		$idChap=$_GET['id'];
		$textComment=$_POST['tinymce'];
		 	
			addComments($textComment,$idChap);		
	}
	if ($_GET['action']=='signaler'){
		$idChap=$_GET['id_comm'];
		$warningComm=$_GET['id'];
			updateWarningComm($warningComm,$idChap);
	}


	if($_GET['action']=='deleteComm'){
		$id_comm=$_GET['id'];
			deletedComment($id_comm);
	}

	if($_GET['action']=='commentChecked'){
		$id_comm=$_GET['id'];
			validationComment($id_comm);
	}

}
       
}
  
    
     


catch(Exception $e) {
    echo 'Erreur : ' . $e->getMessage();
}

?>
