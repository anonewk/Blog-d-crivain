<?php
require_once("./model/chaptersManager.php");
require_once("./model/commentsManager.php");

//////////////////////VIEW\\\\\\\\\\\\\\\\\\\\\\\
function  headBand(){
    ob_start();
    
    $content = ob_get_clean();
    require('./view/pages/template.php');
    
}

/*------------------CHAPTERS-----------------------*/
function getAllChaps(){
	$callChapters= new ChaptersManager();
	$listChapters=$callChapters-> listChap();
    
	require("./view/pages/chapitres.php");
    
}

function getOneChap(){
	$callChapters= new ChaptersManager();
	$pickOneChap=$callChapters->oneChap();

	$getallComms= new CommentsManager();
	$commByChap=$getallComms->getComments();

	require("./view/pages/chapitre.php");
}
/*------------------END CHAPTERS-----------------------*/

/*------------------COMMENTS-----------------------*/

function addComments($textComment,$idChap){
	$addComm= new CommentsManager();
	$newComment=$addComm->addComment($textComment,$idChap);

	$getallComms= new CommentsManager();
	$commByChap=$getallComms->getComments();
	require('./view/pages/chapitre.php');
}