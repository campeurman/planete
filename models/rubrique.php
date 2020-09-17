<?php
class Rubrique extends DbConnect {
    
    // private $num_article;
    // private $art_page;
    // private $art_titre;
    //private $art_sstitre; ?
    // private $art_texte;
    // private $co_revue;
    //private $rev_numero;
    //private $art_infos;

    private $rub_nom;
    private $rubrique_id;
    private $srubrique_id;
    private $ssrubrique_id;
    private $personne_id;

    function getRub_nom(): string {
        return $this->rub_nom;
    }

    function setRub_nom(string $nom) {
        $this->rub_nom = $nom;
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
    public function getArt_titre():string {
        return $this->art_titre;
    }
    public function setArt_titre(string $art_titre) {
        $this->art_titre = $art_titre;
    }
    public function getArt_texte():string {
        return $this->art_texte;
    }
     public function setArt_texte(string $art_texte) {
        $this->art_texte = $art_texte;
    }
    public function getCo_revue() {
        return $this->co_revue;
    }
     public function setCo_revue( $co_revue) {
        $this->co_revue = $co_revue;
    }
    public function getRubrique_id():int {
        return $this->rubrique_id;
    }
    public function setRubrique_id(string $rubrique_id) {
        $this->rubrique_id = $rubrique_id;
    }
    public function getSrubrique_id():int {
        return $this->srubrique_id;
    }
    public function setSrubrique_id(int $srubrique_id) {
        $this->srubrique_id = $srubrique_id;
    }
    public function getSsrubrique_id():int {
        return $this->ssrubrique_id;
    }
     public function setSsrubrique_id(int $ssrubrique_id) {
        $this->ssrubrique_id = $ssrubrique_id;
    }
    public function getPersonne_id():int {
        return $this->personne_id;
    }
     public function setPersonne_id(int $personne_id) {
        $this->personne_id = $personne_id;
    }
    public function selectByAuteur() {
        $query = "SELECT rub_nom FROM rubrique WHERE personne_id = :personne_id AND co_revue = :co_revue AND personne_has_article.num_article = article.num_article AND article.rubrique_id = rubrique.rubrique_id;";
        $result = $this->pdo->prepare($query);
        $result->bindValue(":co_revue",$this->co_revue,PDO::PARAM_STR);
        $result->bindValue(":personne_id",$this->personne_id,PDO::PARAM_STR);
        $result->execute();
        $per = $result->fetchAll();

        return $per;
    } 

    public function selectByRubrique() {
        $query = "SELECT DISTINCT rub_nom FROM rubrique WHERE rubrique_id = :rubrique_id AND co_revue = :co_revue;";
        $result = $this->pdo->prepare($query);
        $result->bindValue(":co_revue",$this->co_revue,PDO::PARAM_STR);
        $result->bindValue(":rubrique_id",$this->rubrique_id,PDO::PARAM_STR);
        $result->execute();
        $per = $result->fetchAll();

        return $per;
    }
    
    public function selectByRevue(){
        $query = "SELECT DISTINCT  rubrique.rubrique_id, rub_nom FROM article, rubrique WHERE  co_revue = :co_revue AND article.rubrique_id = rubrique.rubrique_id;";
            $result = $this->pdo->prepare($query);
            $result->bindValue(":co_revue",$this->co_revue,PDO::PARAM_STR);
            $result->execute();
            $rub = $result->fetchAll();
            
           
            return $rub;
        }
       


    public function insert(){

    }
    public function selectAll(){

    }
    public function select() : self {
        $query = "SELECT DISTINCT rub_nom FROM rubrique WHERE rubrique_id = :rubrique_id";
        $result = $this->pdo->prepare($query);
        $result->bindValue(":rubrique_id",$this->rubrique_id,PDO::PARAM_INT);
        $result->execute();
        $rub = $result->fetch();
        var_dump($rub);
        $this->rub_nom = $rub['rub_nom'];
        var_dump($this);
        return $this;
    }
    public function update(){

    }
    public function delete(){
        
    }
}

?>

