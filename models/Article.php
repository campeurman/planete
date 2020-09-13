<?php
class Article extends Livre {//creation de la class Utilisateur extention de la class DbConnect
    
    private $num_article;
    private $art_page;
    private $art_titre;
    private $art_texte;
    private $co_revue;
    private $rev_numero;
    private $rubrique_id;
    private $rub_nom;
    private $srubrique_id;
    private $srub_nom;
    private $ssrubrique_id;
    private $ssrub_nom;
    private $personne_id;
    private $per_nom;

    

    public function getNum_article(): {
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
    public function getCo_revue(): {
        return $this->co_revue;
    }
     public function setCo_revue( $co_revue) {
        $this->co_revue = $co_revue;
    }
    public function getRev_numero(): {
        return $this->rev_numero;
    }
     public function setRev_numero($rev_numero) {
        $this->rev_numero = $rev_numero;
    }
     public function getRubrique_id():int {
        return $this->rubrique_id;
    }
     public function setRubrique_id(int $rubrique_id) {
        $this->rubrique_id = $rubrique_id;
    }
    public function getRub_nom(): {
        return $this->rub_nom;
    }
     public function setRub_nom(int $rub_nom) {
        $this->rub_nom = $rub_nom;
    }
    public function getSrubrique_id():int {
        return $this->srubrique_id;
    }
     public function setSrubrique_id(int $srubrique_id) {
        $this->srubrique_id = $srubrique_id;
    }
    public function getSrub_nom():int {
        return $this->srub_nom;
    }
     public function setSrub_nom(int $srub_nom) {
        $this->rub_nom = $rub_nom;
    }
    public function getSsrubrique_id():int {
        return $this->ssrubrique_id;
    }
     public function setSsrubrique_id(int $ssrubrique_id) {
        $this->ssrubrique_id = $ssrubrique_id;
    }
    public function getSsrub_nom():int {
        return $this->ssrub_nom;
    }
     public function setSsrub_nom(int $ssrub_nom) {
        $this->ssrub_nom = $ssrub_nom;
    }
    public function getPersonne_id():int {
        return $this->personne_id;
    }
     public function setPersonne_id(int $personne_id) {
        $this->personne_id = $personne_id;
    }
    public function getPer_nom():string {
        return $this->per_nom;
    }
     public function setPer_nom(string $per_nom) {
        $this->per_nom = $per_nom;
    }
   
    public function verify_user(){//verifie que le pseudo est egal au pseudo dans la base de données et renvoie le resultat
        $query2 = "SELECT * FROM utilisateur WHERE pseudo = :pseudo;";
        $result2 = $this->pdo->prepare($query2);
        $result2->bindValue(':pseudo',$this->pseudo,PDO::PARAM_STR);
        $result2->execute();
        $data2 = $result2->fetch();
         return $data2;
        }

   public function insert() {//enregistre dans la base de donnée le pseudo le password et cree une id
    $query="INSERT INTO utilisateur(PSEUDO, PASSWORD) VALUES (:pseudo,:password)";
    $result=$this->pdo->prepare($query);
    $result->bindvalue(':pseudo',$this->pseudo,PDO::PARAM_STR);
    $result->bindvalue(':password',$this->password,PDO::PARAM_STR);
    $result->execute();
    $this->id_utilisateur=$this->pdo->lastInsertId();
    return $this;
        }

    public function selectAll(){//prendre les infos d'utilisateur dans la BDD
        $query ="SELECT * FROM utilisateur;";
        $result = $this->pdo->prepare($query);
        $result->execute();
        $datas= $result->fetchAll();

        $tab=[];

        foreach($datas as $data) {//cree un tableau d'objet utilisateur et le retourner
            $current = new Utilisateur();
            $current->setId($data['id_utilisateur']);
            array_push($tab, $current);
            }
            return $tab;

    }
    public function select(){

    }
    public function update(){

    }
   public function delete(){
        
    }
}

?>

