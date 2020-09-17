<?php
class Personne extends DbConnect {//creation de la class Utilisateur extention de la class DbConnect
    
    private $co_revue;
    private $personne_id;
    private $per_nom;
    private $per_titre;
    private $per_datenais;
    private $per_datemort;
    private $per_sexe;
    private $per_bio;
    private $num_article;
    private $art_page;
    private $art_titre;
    private $genre_id;
    private $genre_nom;
    private $rubrique_id;
    private $rub_nom;
    private $srubrique_id;
    private $srub_nom;
    private $ssrubrique_id;
    private $ssrub_nom;

    
    public function getPersonne_id() {
        return $this->personne_id;
    }
     public function setPersonne_id($personne_id) {
        $this->personne_id = $personne_id;
    }
    public function getPer_nom() {
        return $this->per_nom;
    }
     public function setPer_nom($per_nom) {
        $this->per_nom = $per_nom;
    }
     public function getPer_titre() {
        return $this->per_titre;
    }
     public function setPer_titre($per_titre) {
        $this->per_titre = $per_titre;
    }
    public function getPer_datenais() {
        return $this->per_datenais;
    }
     public function setPer_datenais($per_datenais) {
        $this->per_datenais = $per_datenais;
    }
    public function getPer_datemort() {
        return $this->per_datemort;
    }
     public function setPer_datemort($per_datemort) {
        $this->per_datemort = $per_datemort;
    }
     public function getPer_sexe() {
        return $this->per_sexe;
    }
     public function setPer_sexe($per_sexe) {
        $this->per_sexe = $per_sexe;
    }
    public function getPer_bio() {
        return $this->per_bio;
    }
     public function setPer_bio($per_bio) {
        $this->per_bio = $per_bio;
    }
    public function getNum_article() {
        return $this->num_article;
    }
     public function setNum_article($num_article) {
        $this->num_article = $num_article;
    }
    public function getArt_page():int {
        return $this->art_page;
    }
     public function setArt_page(int $art_page) {
        $this->art_page = $art_page;
    }
    public function getArt_titre() {
        return $this->art_titre;
    }
     public function setArt_titre($art_titre) {
        $this->art_titre = $art_titre;
    }
    public function getGenre_id() {
        return $this->genre_id;
    }
     public function setGenre_id($genre_id) {
        $this->genre_id = $genre_id;
    }
     public function getGenre_nom() {
        return $this->genre_nom;
    }
     public function setGenre_nom($genre_nom) {
        $this->genre_nom = $genre_nom;
    }
    public function getRubrique_id() {
        return $this->rubrique_id;
    }
     public function setRubrique_id($rubrique_id) {
        $this->rubrique_id = $rubrique_id;
    }
    public function getRub_nom() {
        return $this->rub_nom;
    }
     public function setRub_nom($rub_nom) {
        $this->rub_nom = $rub_nom;
    }
     public function getSrubrique_id() {
        return $this->srubrique_id;
    }
     public function setSrubrique_id($srubrique_id) {
        $this->srubrique_id = $srubrique_id;
    }
    public function getCo_revue() {
        return $this->co_revue;
    }
     public function setCo_revue($co_revue) {
        $this->co_revue = $co_revue;
    }
    public function selectByAuteur() {
        $query = "SELECT per_nom, per_titre FROM  personne WHERE  personne_id = :personne_id AND co_revue = :co_revue ;";
        $result = $this->pdo->prepare($query);
        $result->bindValue(":co_revue",$this->co_revue,PDO::PARAM_STR);
        $result->bindValue(":personne_id",$this->personne_id,PDO::PARAM_STR);
        $result->execute();
        $per = $result->fetchAll();

        return $per;
    
    }

    public function selectByRubrique() {
        $query = "SELECT DISTINCT per_nom, per_titre FROM  personne WHERE  rubrique_id = :rubrique_id AND co_revue = :co_revue AND article.num_article = personne_has_article.num_article AND personne_has_article.personne_id = personne.personne_id;";
        $result = $this->pdo->prepare($query);
        $result->bindValue(":co_revue",$this->co_revue,PDO::PARAM_STR);
        $result->bindValue(":rubrique_id",$this->rubrique_id,PDO::PARAM_STR);
        $result->execute();
        $per = $result->fetchAll();

        return $per;
    }
    
   
    public function selectByRevue(){
        $query = "SELECT DISTINCT personne.per_nom, personne.per_titre, personne.personne_id FROM personne, personne_has_article, article WHERE  co_revue = :co_revue AND article.num_article = personne_has_article.num_article AND personne_has_article.personne_id = personne.personne_id;";
            $result = $this->pdo->prepare($query);
            $result->bindValue(":co_revue",$this->co_revue,PDO::PARAM_STR);
            $result->execute();
            $per = $result->fetchAll();
            
           
            return $per;
        }
   public function insert() {

        }
    public function selectAll(){

    }
    public function select(){
        $query = "SELECT DISTINCT per_nom, per_titre FROM  personne WHERE  rubrique_id = :rubrique_id AND co_revue = :co_revue AND personne_id = :personne_id AND article.num_article = personne_has_article.num_article;";
        $result = $this->pdo->prepare($query);
        $result->bindValue(":co_revue",$this->co_revue,PDO::PARAM_STR);
        $result->bindValue(":rubrique_id",$this->rubrique_id,PDO::PARAM_STR);
        $result->bindValue(":personne_id",$this->personne_id,PDO::PARAM_STR);
        $result->execute();
        $per = $result->fetchAll();

        return $per;
    }
    public function update(){

    }
   public function delete(){
        
    }
}

?>

