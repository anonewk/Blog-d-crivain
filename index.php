<?php
session_start();

if (!(isset($_GET['action']) ) ) {
	require("controller/Front.php");
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
		require("controller/Front.php");
	 	require ("controller/Back.php");
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
				require("controller/Front.php");
				require ("controller/Back.php");
				headBand();
				checkInfo($checkPseudo,$checkmdp);
				noNickName($noNickName);
				NoMatch($NoMatch);
          
              
		}
	}//end of 'logger'
    
    //Admin redirection  
    if($_GET['action'] == 'adminPage')
    {    
        require("controller/Front.php");
        require ("controller/Back.php");	
        lastUpdate();

    }
        

/*--------------------------------END OF SUBSCRIB/ LOGIN----------------------------------------*/

/*--------------------------------ADMIN LOG IN----------------------------------------*/
//		"if ($_GET['action']=='logger') {
//		
//				require("controller/Front.php");
//				require("controller/Back.php");
//				headBand();
//				lastUpdate();
//
//		}
//		require("controller/Front.php");
//		require("controller/Back.php");
//		headBand();
//		adminPage();
//	
//	if($_GET['action']=='logger'){
//		if (!isset($AdminPseudo)&& !isset($AdminPwd)) {
//			$AdminPseudo=htmlspecialchars($_POST['IdAdmin']);
//			$AdminPwd=$_POST['PwdAdmin'];
//				require("controller/Front.php");
//				require("controller/Back.php");
//				headBand();
//				lastUpdate();
//				adminConnexion($AdminPseudo,$AdminPwd);
//		}else{
//			require("controller/Front.php");
//			require("controller/Back.php");
//			headBand();
//			lastUpdate();
//			adminConnexion($AdminPseudo,$AdminPwd);
//			
//		}
//	}"//END 'adminOnly'
/*--------------------------------END OF ADMIN CONNEXION----------------------------------------*/
/*--------------------------------CHAPTERS----------------------------------------*/
 	if ($_GET['action']=='chapitres') {
		require("controller/Front.php");
		headBand();
		getAllChaps();
	}

	if($_GET['action']=='selectionchapitre'){
		require("controller/Front.php");
		headBand();
		getOneChap();
	} 	

	if ($_GET['action']=='postChap') {
		$titleChap=$_POST['title'];
		$textChap=$_POST['tinymce_Chap'];
			require("controller/Front.php");
			require("controller/Back.php");
			headBand();
			postChap($titleChap,$textChap);
			lastUpdate();
	}

	if ($_GET['action']=='editChap') {
		$chapEdit=$_GET['id'];
			require("controller/Front.php");
			require("controller/Back.php");
			headBand();
			editChapter();
	}

	if($_GET['action']=='reEdit'){
		$idEdit=$_GET['id'];
		$titleEdit=$_POST['title'];
		$textEdit=$_POST['tinymce_Chap'];
			require("controller/Front.php");
			require("controller/Back.php");
			headBand();reEditChap($idEdit,$titleEdit,$textEdit);
			lastUpdate();
			
		}
	if ($_GET['action']=='eraseChap') {
		$idChapter=$_GET['id'];
			require("controller/Front.php");
			require("controller/Back.php");
			deletedChapAndComments($idChapter);
	}
    
/*--------------------------------COMMENTS----------------------------------------*/
	if($_GET['action']=='ValiderComment'){
		$idChap=$_GET['id'];
		$textComment=$_POST['tinymce'];
		 	require("controller/Front.php");
		 	headBand();
			addComments($textComment,$idChap);		
	}
	if ($_GET['action']=='signaler'){
		$idChap=$_GET['id_chap'];
		$warningComm=$_GET['id'];
			require("controller/Back.php");
			updateWarningComm($warningComm,$idChap);
	}


	if($_GET['action']=='deleteComm'){
		$id_comm=$_GET['id'];
			require("controller/Front.php");
			require("controller/Back.php");
			deletedComment($id_comm);
	}

	if($_GET['action']=='commentChecked'){
		$id_comm=$_GET['id'];
			require("controller/Front.php");
			require("controller/Back.php");
			validationComment($id_comm);
	}

}

?>
