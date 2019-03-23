<?php
/*----------------REQUIRE TO ADMINPAGE----------------*/
require_once("./model/adminManager.php");
require_once("./model/chaptersManager.php");
require_once("./model/commentsManager.php");

function adminPage(){
	require("./view/pages/connexionAdmin.php");
}

function formulaire(){
	require ("./view/pages/inscription.php");
}

function sessionOut(){
	require('./index.php');
}

/*--------------------------------CONNEXION----------------------------------------*/
function checkInfo($checkPseudo,$checkmdp){
	$checkUser= new membersManager();
	$userLogin= $checkUser->checkInfo($checkPseudo,$checkmdp);
	//A redirection will be done on the Adminpage.php
}

function subscribe($lastname,$firstname,$pseudo,$mdp,$mail,$pseudoPresent){
	$newMember= new membersManager();
	$subMember= $newMember->getNewUser($lastname,$firstname,$pseudo,$mdp,$mail,$pseudoPresent);
	//A redirection will be done on the Adminpage.php
}

function adminConnexion($AdminPseudo,$AdminPwd){
	$adminlog= new membersManager();
	$infoAdmin= $adminlog->AdminCheckInfo($AdminPseudo,$AdminPwd);
	require("./view/pages/adminPage.php");
}

/*--------------------------------MESSAGE LOGIN----------------------------------------*/
function msgPWD($message){
	$message;

	require('./view/pages/inscription.php');
}
function msgMail($message){
	$message;

	require('./view/pages/inscription.php');
}

function infoIssues($infoIssues){
	$infoIssues;
	require('./view/pages/inscription.php');
}
function noNickName($noNickName){

	$noNickName;
	require('./view/pages/inscription.php');
}
function NoMatch($NoMatch){
	$NoMatch;

	require('./view/pages/inscription.php');
}
/*--------------------------------END MESSAGES----------------------------------------*/

/*--------------------------------END CONNEXION----------------------------------------*/

function updateWarningComm($warningComm,$idChap){
	$signalement= new CommentsManager();
	$warningComment=$signalement->signalComm($warningComm,$idChap);
	require('./view/pages/chapitre.php');
}
/*--------------------------------ADMIN----------------------------------------*/
function lastUpdate(){
	$callChapters= new ChaptersManager();
	$listChapters=$callChapters-> listChap();

	$repotedComm= new CommentsManager();
	$reportedComments= $repotedComm->getReportingComments();

	require("./view/pages/adminPage.php");
}
/*--------------------------------CHAPTERS----------------------------------------*/
function postChap($titleChap,$textChap){
	$postNewChap=new chaptersManager();
	$newChapter= $postNewChap->postChapter($titleChap,$textChap);
	//A redirection will be done on the Adminpage.php
}

function editChapter(){
	$callChapters= new ChaptersManager();
	$pickOneChap=$callChapters->oneChap();

	require("./view/pages/editChapter.php");
}

function reEditChap($idEdit,$titleEdit,$textEdit){
	$editChapter= new ChaptersManager();
	$reEditChapter=$editChapter->reditChapter($idEdit,$titleEdit,$textEdit);
	//A redirection will be done on the Adminpage.php
}

function deletedChapAndComments($idChapter){
	$deletedChapter= new ChaptersManager();
	$dltOneChapter= $deletedChapter->eraseChapter($idChapter);

	$deletedAllComments= new CommentsManager();
	$dltAllCommments= $deletedAllComments-> deleteAllComments($idChapter);
	//A redirection will be done on the Adminpage.php
}
/*--------------------------------END CHAPTERS----------------------------------------*/

/*--------------------------------COMMENTS----------------------------------------*/
function deletedComment($id_comm){
	$eraseComment= new CommentsManager();
	$erase=$eraseComment->deleteComment($id_comm);
	//A redirection will be done on the commentsManager.php
}

function validationComment($id_comm){
	$checkingComm= new CommentsManager();
	$commentOk= $checkingComm-> commentValidation($id_comm);
	//A redirection will be done on the commentsManager.php
}
/*--------------------------------END COMMENTS----------------------------------------*/

/*--------------------------------END ADMIN----------------------------------------*/