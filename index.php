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

/*--------------------------------LOGIN / SUBSCRIBE----------------------------------------*/
	if($_GET['action']=='inscription'){
		require("controller/Front.php");
	 	require ("controller/Back.php");
	 		headBand();
	 		formulaire();
	}//end of $_GET['action']=='inscription'		

	if ($_GET['action']=='subscribeMember') {//
		$lastname = htmlspecialchars($_POST['lastname']);
		$firstname= htmlspecialchars($_POST['firstname']);
		$pseudo = htmlspecialchars($_POST['pseudo']);//PSEUDO
		$mdp=$_POST['mdp'];//MOT DE PASSE
		$mdp1=$_POST['mdp1'];//CONFIRMATION MOT DE PASSE
		$mail = $_POST['mail'];//ADRESSE MAIL

		if(isset($lastname)&& isset($firstname)&&isset($pseudo)&&isset($mdp)&&isset($mdp1)&&isset($mail)){
			if ($mdp==$mdp1) {
				if ( preg_match ("#^[a-zA-Z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $_POST['mail']) ) {
					if ( isset($lastname)&& isset($firstname)&&isset($pseudo)&&($mdp==true)&&($mail== true) ) {
						$pseudoPresent=0;
							require ("controller/Front.php");
							require ("controller/Back.php");
							headBand();
							subscribe($lastname,$firstname,$pseudo,$mdp,$mail,$pseudoPresent);
						$infoIssues="Le pseudo que vous avez choisie est déjà utilisé. Veuillez en choisir un autre.";
							infoIssues($infoIssues);
					}
				}else{
				$message="Une erreur dans votre adresse mail s'est produit. Veuillez vérifier vos information";
				require ("controller/Front.php");
				require ("controller/Back.php");
				headBand();
				msgMail($message);
				}
			}else{
				$message="Les 2 mots de passes ne sont pas correspondant";
				require ("controller/Front.php");
				require ("controller/Back.php");
				headBand();
				msgPWD($message);
				
			}
		}//end of if(isset($lastname)&& isset($firstname)&&	.....
			
	}//end of if (isset($_POST['lastname'])) ligne30
	if ($_GET['action']=='logger'){
		$checkPseudo = htmlspecialchars($_POST['checkPseudo']);
		$checkmdp = $_POST['checkmdp'];

		if ( isset($checkPseudo)&& isset($checkmdp) ){
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

/*--------------------------------END OF SUBSCRIB/ LOGIN----------------------------------------*/

/*--------------------------------ADMIN LOG IN----------------------------------------*/
	if($_GET['action']=='admin'){
		if (isset($_SESSION["pseudo"])) {
			if( ($_SESSION["id"])=="115"){
				require("controller/Front.php");
				require("controller/Back.php");
				headBand();
				lastUpdate();
			}/*End of id's check*/
		}
		require("controller/Front.php");
		require("controller/Back.php");
		headBand();
		adminPage();
	}//end of 'admin'

	if($_GET['action']=='adminOnly'){
		if (!isset($AdminPseudo)&& !isset($AdminPwd)) {
			$AdminPseudo=htmlspecialchars($_POST['IdAdmin']);
			$AdminPwd=$_POST['PwdAdmin'];
				require("controller/Front.php");
				require("controller/Back.php");
				headBand();
				lastUpdate();
				adminConnexion($AdminPseudo,$AdminPwd);
		}else{
			require("controller/Front.php");
			require("controller/Back.php");
			headBand();
			lastUpdate();
			adminConnexion($AdminPseudo,$AdminPwd);
			
		}
	}//END 'adminOnly'
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
		$idPseudo=$_SESSION['id'];
		$textComment=$_POST['tinymce'];
		 	require("controller/Front.php");
		 	headBand();
			addComments($idPseudo,$textComment,$idChap);		
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