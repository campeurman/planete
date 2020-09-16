<?php
class Article extends DbConnect {
    
    private $num_article;
    private $art_page;
    private $art_titre;
    //private $art_sstitre; ?
    private $art_texte;
    private $co_revue;
    //private $rev_numero;
    //private $art_infos;

    private $rubrique_id;
    private $srubrique_id;
    private $ssrubrique_id;
    private $personne_id;

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
    public function setRubrique_id(int $rubrique_id) {
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


    public function selectitre(){
        $query = "SELECT article.num_article, article.art_page, article.art_titre FROM article  WHERE  co_revue = :co_revue  ;";
            $result = $this->pdo->prepare($query);
            $result->bindValue(":co_revue",$this->co_revue,PDO::PARAM_STR);
            $result->execute();
            $art = $result->fetchall();
            var_dump($art);
            // $data=[];
            // foreach($art as $elem) {//et transforme en tableau d'objet puis le retourne
            //     $article = new Revue();
            //     $article->setNum_article($elem["num_article"]);
            //     $article->setArt_page($elem["art_page"]);
            //     $article->setArt_titre($elem["art_titre"]);
          
                

            //     array_push($data, $article);
            // }

            var_dump($art);
            return $art;
        }



    public function insert(){

    }
    public function selectAll(){

    }
    public function select(){

    }
    public function update(){

    }
    public function delete(){
        
    }
}

?>

