<?php	

session_start();
require "conf/global.php";
//var_dump($_SESSION);

spl_autoload_register(function ($class) {
    if(file_exists("models/$class.php")){
        require_once "models/$class.php";
    }
});

$page = isset($_REQUEST["page"])? $_REQUEST["page"] : "home";

switch ($page) {
	case "home" : $include = showHome();//renvoie sur fonction showhome qui elle meme renvoie sur la page home
	break;
	case "insert_user" : insertUser(); //renvoie sur fonction insertUser qui elle meme integre l'utilisateur à condition
	break;
	case "connect_user" : connectUser();//renvoie sur fonction connectUser qui elle meme creer un objet utilisateur
	break;
	case "revue" : $include = showRevue();//renvoie sur fonction showhome qui elle meme renvoie sur la page home
	break;
	case "membre" : $include = showMembre();//renvoie sur fonction showhome qui elle meme renvoie sur la page home
	break;
	case "the_revue": $include = ["template"=>"views/the_revue.php"];
	break;
	case "article" : $include = showArticle();
	break;
	default : $include = showHome();//sinon renvoie sur fonction showhome qui elle meme renvoie sur la page home
}


function showHome(): array {
    return ["template"=>"views/home.php"];//elle meme renvoie sur la page home
}

function insertUser(){
	
	if(!empty($_POST["pseudo"]) && !empty($_POST["password"]) && ($_POST["password"] == $_POST["password2"]) && preg_match ("#^[a-zA-Z-ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØŒŠþÙÚÛÜÝŸàáâãäåæçèéêëìíîïðñòóôõöøœšÞùúûüýÿ]*$#" , $_POST['pseudo']) && preg_match ("#^[a-zA-Z0-9-ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØŒŠþÙÚÛÜÝŸàáâãäåæçèéêëìíîïðñòóôõöøœšÞùúûüýÿ]*$#" , $_POST['password'])) {
		$user = new Utilisateur(); //creer un nouvelle utilisateur
		$user->setPseudo($_POST["pseudo"]);//avec son pseudo
		$user->setPassword(password_hash($_POST["password"], PASSWORD_DEFAULT));//avec son password et crypter le password
		$user->insert();
		header('Location:index.php');//renvoie sur l'index
	}
	header('Location:index.php');//renvoie sur l'index
}

function connectUser() {
	if(!empty($_POST["pseudo"]) && !empty($_POST["password"]) && preg_match("#^[a-zA-Z-ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØŒŠþÙÚÛÜÝŸàáâãäåæçèéêëìíîïðñòóôõöøœšÞùúûüýÿ]*$#" , $_POST['pseudo']) && preg_match("#^[a-zA-Z0-9-ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØŒŠþÙÚÛÜÝŸàáâãäåæçèéêëìíîïðñòóôõöøœšÞùúûüýÿ]*$#", $_POST['password'])) { 
		$user = new Utilisateur();
		$user-> setPseudo($_POST['pseudo']);
		$user-> setPassword($_POST['password']);
		$reponse = $user->verify_user();
		
		if ($reponse && password_verify($_POST['password'],$reponse['password'])) {
			$_SESSION['id'] = $reponse['id'];
			$_SESSION['pseudo']= $reponse['pseudo'];
			header('Location:index.php?page=membre');
		}else {
			header('Location:index.php');
		}
	}
}
	
function showRevue() {
	
	$datas = [];
	$revue = new Revue();
	$revue->setCo_revue($_GET["co_revue"]);
	$revue->selectById();
	$datas['revue'] = clone $revue;
	$auteur = new Personne();
	$auteur->setCo_revue($_GET["co_revue"]);
	$per = $auteur->selectByRevue();
	$datas['auteur'] = $per;
	$rubrique = new Rubrique();
	$rubrique->setCo_revue($_GET["co_revue"]);
	$rub = $rubrique->selectByRevue();
	$datas['rubrique'] = $rub;

	return ["template" => "views/the_revue.php", "datas" => $datas];
	
}

function showArticle() {
	var_dump($_GET);
	$datas = [];
	$datas['id'] = $_GET;
	$revue = new Revue;
	$revue->setCo_revue($_GET['co_revue']);
	$revue->selectById();
	$datas['revue'] = clone $revue;
	if (null !==($_GET['personne_id'] & $_GET["rubrique_id"])) {
		$article = new Article;
		$article->setPersonne_id($_GET["personne_id"]);
		$article->setRubrique_id($_GET["rubrique_id"]);
		$article->setCo_revue($_GET["co_revue"]);
		$article->select();
		$datas['article'] = $article;
		$rubrique = new Rubrique;
		$rubrique->setPersonne_id($_GET["personne_id"]);
		$rubrique->setRubrique_id($_GET["rubrique_id"]);
		$rubrique->setCo_revue($_GET["co_revue"]);
		$rubrique->select();
		$datas['rubrique'] = $rubrique;
		$auteur = new Personne;
		$auteur->setPersonne_id($_GET["personne_id"]);
		$auteur->setRubrique_id($_GET["rubrique_id"]);
		$auteur->setCo_revue($_GET["co_revue"]);
		$auteur->select();
		$datas['auteur'] = $auteur;
		
	}else if (empty($_GET['personne_id'])) {
		$article = new Article;
		$article->setRubrique_id($_GET["rubrique_id"]);
		$article->setCo_revue($_GET["co_revue"]);
		$article->selectByRubrique();
		$datas['article'] = $article;
		$rubrique = new Rubrique;
		$rubrique->setRubrique_id($_GET["rubrique_id"]);
		$rubrique->setCo_revue($_GET["co_revue"]);
		$rubrique->selectByRubrique();
		$datas['rubrique'] = $rubrique;
		$auteur = new Personne;
		$auteur->setRubrique_id($_GET["rubrique_id"]);
		$auteur->setCo_revue($_GET["co_revue"]);
		$auteur->selectByRubrique();
		$datas['auteur'] = $auteur;
		
	}else {
		$article = new Article;
		$article->setPersonne_id($_GET["personne_id"]);
		$article->setCo_revue($_GET["co_revue"]);
		$article->selectByAuteur();
		$datas['article'] = $article;
		$rubrique = new Rubrique;
		$rubrique->setPersonne_id($_GET["personne_id"]);
		$rubrique->setCo_revue($_GET["co_revue"]);
		$rubrique->selectByAuteur();
		$datas['rubrique'] = $rubrique;
		$auteur = new Personne;
		$auteur->setPersonne_id($_GET["personne_id"]);
		$auteur->setCo_revue($_GET["co_revue"]);
		$auteur->selectByAuteur();
		$datas['auteur'] = $auteur;
		
	}
	return ["template" => "views/the_revue.php", "datas" => $datas];
}
	
function showMembre() {

	if(!isset($_SESSION["id"])) {
		header("Location:index.php");
	}
	$revue = new Revue();
	$datas = [];
	$datas["revues"] = $revue->selectAll();
	return ["template" => "views/membre.php", "datas" => $datas];
}

?>

<!DOCTYPE html>
<html lang="fr">
		<head>
			<title>Planete</title>
			<meta charset="utf-8">
			<link rel="stylesheet" type="text/css" href="style.css">
        </head>
        <body>
            
		<header id="entete">
            <img src="image/planete-logo.png" alt="logo"><img src="image/planete-background-blancvert.jpg" id="flag" alt="logo">
        </header>
		<div id="encadre">
			<div id="menu">
				<ul>
					<li><a href="index.php?page=home">Accueil</a></li>
					<li><a href="index.php?page=membre">La revue planete</a></li>
					<li><a href="index.php?page=">Le nouveau planete</a></li>
					<li><a href="index.php?page=">Le dictionnaire des a</a></li>
				</ul>
			</div>
			<?php require $include["template"]; ?>
		</div>
		
		<? if(isset($_SESSION["id"]) && isset($_SESSION["pseudo"])): ?>
			<footer id="admin"><a href="">Espace Admin</a></footer>
		<? endif ?>
		<script type="text/javascript" src="slid.js"></script>
	</body>
</html>

