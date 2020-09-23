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

	$article = new Article();
	$article->setCo_revue($_GET["co_revue"]);
	$datas["articles"] = $article->selectByRevue();

	$auteur = new Personne();
	$auteur->setCo_revue($_GET["co_revue"]);
	$datas["auteurs"] = $auteur->selectByRevue();

	$rubrique = new Rubrique();
	$rubrique->setCo_revue($_GET["co_revue"]);
	$rub = $rubrique->selectByRevue();
	$datas['rubriques'] = $rub;

	return ["template" => "views/the_revue.php", "datas" => $datas];
	
}

/**
 * Choix du template à insérer
 * Choix de la fonction à appeller en fonction des paramètres transmis via GET
 * Transfert des données ainsi récupérées vers l'affichage
 * @return array
 */
function showArticle() {
	
	$datas = [];
	$revue = new Revue;
	$revue->setCo_revue($_GET['co_revue']);
	$revue->selectById();
	$datas['revue'] = clone $revue;
	
	if(isset($_GET["personne_id"]) && isset($_GET["rubrique_id"])) {
		$template = "articlesbycat_per";
		foreach(showByRubAut() as $key => $entry) {
			$datas[$key] = $entry;
		}
	} elseif(isset($_GET["personne_id"])) {
		$template = "articlesbyper";
		foreach(showByAuteurs() as $key => $entry) {
			$datas[$key] = $entry;
		}
	} elseif(isset($_GET["rubrique_id"])) {
		$template = "articlesbycat";
		foreach(showByRubriques() as $key => $entry) {
			$datas[$key] = $entry;
		}
	} else {
		header("Location:index.php?page=revue&co_revue={$revue->getCo_revue()}");
	}

	if(isset($_GET["num_article"])) {
		$article = new Article();
		$article->setNum_article($_GET["num_article"]);
		$datas['article'] = $article->select();
	}

	return ["template" => "views/$template.php", "datas" => $datas];
}

/**
 * Récupère et renvoie les données lors de la sélection d'une rubrique
 * @return array
 */
function showByRubriques() {

	$rubrique = new Rubrique();
	$rubrique->setRubrique_id($_GET["rubrique_id"]);
	$rubrique->select();

	$article = new Article();
	$article->setRubrique_id($rubrique->getRubrique_id());
	$article->setCo_revue($_GET["co_revue"]);
	$articles = $article->selectByRubrique();

	$liaison = new PersonneHasArticle();
	$pers_articles = [];
	foreach($articles as $art) {
		$liaison->setNum_article($art['num_article']);
		$results = $liaison->selectByArticle();
		foreach($results as $res) {
			array_push($pers_articles, $res["personne_id"]);
		}
	}
	$pers_articles = array_unique($pers_articles);

	$auteur = new Personne();
	$auteurs = [];
	foreach($pers_articles as $per) {
		$auteur->setPersonne_id($per);
		array_push($auteurs, clone $auteur->select());
	}

	return ["rubrique" => $rubrique, "auteurs" => $auteurs, "articles" => $articles];
}

/**
 * Récupère et renvoie les données lors de la sélection d'un auteur
 * @return array
 */
function showByAuteurs() {

	$per = new Personne();
	$per->setPersonne_id($_GET["personne_id"]);
	$auteur = $per->select();

	$liaison = new PersonneHasArticle();
	$liaison->setPersonne_id($auteur->getPersonne_id());
	$liaison->setCo_revue($_GET['co_revue']);
	$pers_articles = $liaison->selectByPersRevue();
	
	$article = new Article();
	$articles = [];
	$ids_rubriques = [];
	foreach($pers_articles as $art) {
		$article->setNum_article($art['num_article']);
		array_push($articles, clone $article->select());
		array_push($ids_rubriques, $article->getRubrique_id());
	}
	$ids_rubriques = array_unique($ids_rubriques);

	$rubrique = new Rubrique();
	$rubriques = [];
	foreach($ids_rubriques as $id) {
		$rubrique->setRubrique_id($id);
		array_push($rubriques, clone $rubrique->select());
	}

	return ["rubriques" => $rubriques, "auteur" => $auteur, "articles" => $articles];
}

/**
 * Récupère et renvoie les données lors de la sélection d'un auteur ET d'une rubrique (articles intersection)
 * @return array
 */
function showByRubAut() {

	$rubrique = new Rubrique();
	$rubrique->setRubrique_id($_GET["rubrique_id"]);

	$auteur = new Personne();
	$auteur->setPersonne_id($_GET["personne_id"]);
	
	$article = new Article();
	$article->setRubrique_id($_GET["rubrique_id"]);
	$article->setCo_revue($_GET["co_revue"]);
	$articles = $article->selectByRubAut($_GET["personne_id"]);


	return ["rubrique" => $rubrique->select(), "auteur" => $auteur->select(), "articles" => $articles];
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
		<div id="encadre" class="sm-col lg-row">
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

