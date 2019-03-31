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

	 		formulaire();
	   }//end of $_GET['action']=='inscription'		

    
    // Condition of connexion
	   if ($_GET['action']=='logger'){
		  $checkPseudo = htmlspecialchars($_POST['checkPseudo']);
		  $checkmdp = $_POST['checkmdp'];
        
		if ( isset($checkPseudo)&& isset($checkmdp) ){

				checkInfo($checkPseudo,$checkmdp);
         
			
          
        }
	}//end of 'logger'
    
    //Admin redirection  
   if($_GET['action'] == 'adminPage'){   
        if($_SESSION['id']){
         	
        lastUpdate();
         
  }else {
            header('Location: ./index.php');
        }
    }

/*--------------------------------END OF SUBSCRIB/ LOGIN----------------------------------------*/
/*--------------------------------CHAPTERS----------------------------------------*/
 	if ($_GET['action']=='chapitres') {

          
		getAllChaps();

	}

	if($_GET['action']=='selectionchapitre'){

	
		getOneChap();
	} 	

	if ($_GET['action']=='postChap') {
        if($_SESSION['id']){
         $titleChap=$_POST['title'];
		$textChap=$_POST['tinymce_Chap'];
			
			postChap($titleChap,$textChap);
			lastUpdate();
         
  }else {
            header('Location: ./index.php');
        }
		
	}

	if ($_GET['action']=='editChap') {
        if($_SESSION['id']){
        $chapEdit=$_GET['id'];
			
		
			editChapter();
         
  }else {
            header('Location: ./index.php');
        }
		
	}

	if($_GET['action']=='reEdit'){
        if($_SESSION['id']){
     	$idEdit=$_GET['id'];
		$titleEdit=$_POST['title'];
		$textEdit=$_POST['tinymce_Chap'];
        reEditChap($idEdit,$titleEdit,$textEdit);
			lastUpdate();
         
  }else {
            header('Location: ./index.php');
        }
	
			
		}
	if ($_GET['action']=='eraseChap') {
        if($_SESSION){
            	$idChapter=$_GET['id'];

			deletedChapAndComments($idChapter);
        }else{
            header('Location: ./index.php');
        }
	
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
