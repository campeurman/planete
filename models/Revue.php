<?php
class Revue extends DbConnect {

    private $co_revue;
    private $rev_numero;
    private $rev_moiscouverts;
    private $rev_dateparution;
    private $rev_couv;
    private $num_article;
    private $art_page;
    private $art_titre;
    private $rubrique_id;
    private $rub_nom;
    private $srubrique_id;
    private $srub_nom;
    private $ssrubrique_id;
    private $ssrub_nom;
    private $genre_id;
    private $gen_nom;
    private $personne_id;
    private $per_nom;
    private $per_titre;

    public function getCo_revue() {
        return $this->co_revue;
    }
     public function setCo_revue($co_revue) {
        $this->co_revue = $co_revue;
    }
     public function getRev_numero() {
        return $this->rev_numero;
    }
     public function setRev_numero($rev_numero) {
        $this->rev_numero = $rev_numero;
    }
    public function getRev_moiscouverts() {
        return $this->rev_moiscouverts;
    }
     public function setRev_moiscouverts($rev_moiscouverts) {
        $this->rev_moiscouverts = $rev_moiscouverts;
    }
    public function getRev_dateparution() {
        return $this->rev_dateparution;
    }
     public function setRev_dateparution($rev_dateparution) {
        $this->rev_dateparution = $rev_dateparution;
    }
    public function getRev_couv() {
        return $this->rev_couv;
    }
     public function setRev_couv($rev_couv) {
        $this->rev_couv = $rev_couv;
    }
    public function getNum_article() {
        return $this->num_article;
    }
     public function setNum_article($num_article) {
        $this->num_article = $num_article;
    }
     public function getArt_page() {
        return $this->art_page;
    }
     public function setArt_page($art_page) {
        $this->art_page = $art_page;
    }
    public function getArt_titre() {
        return $this->art_titre;
    }
     public function setArt_titre($art_titre) {
        $this->art_titre = $art_titre;
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
    public function getSrub_nom() {
        return $this->srub_nom;
    }
     public function setSrub_nom($srub_nom) {
        $this->srub_nom = $srub_nom;
    }
    public function getSsrubrique_id() {
        return $this->ssrubrique_id;
    }
     public function setSsrubrique_id($ssrubrique_id) {
        $this->ssrubrique_id = $ssrubrique_id;
    }
    public function getSsrub_nom() {
        return $this->ssrub_nom;
    }
     public function setSsrub_nom($ssrub_nom) {
        $this->ssrub_nom = $ssrub_nom;
    }
     public function getGenre_id() {
        return $this->genre_id;
    }
     public function setGenre_id($genre_id) {
        $this->genre_id = $genre_id;
    }
    public function getGen_nom() {
        return $this->gen_nom;
    }
     public function setGen_nom($gen_nom) {
        $this->gen_nom = $gen_nom;
    }
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
  
    function selectAll() {
        $query = "SELECT * FROM revue;";
        $result = $this->pdo->prepare($query);
        $result->execute();
        $datas = $result->fetchAll();
        return $datas;
    }

         function insert(){

         }
         public function selectById(){
            $query = "SELECT * FROM revue WHERE  co_revue = :co_revue;";
            $result = $this->pdo->prepare($query);
            $result->bindValue(":co_revue",$this->co_revue,PDO::PARAM_STR);
            $result->execute();
            $datas = $result->fetchAll();
            
            $this->setRev_numero($datas['0']['rev_numero']);
            $this->setRev_moiscouverts($datas['0']['rev_moiscouverts']);
            $this->setRev_dateparution($datas['0']['rev_dateparution']);
            $this->setRev_couv($datas['0']['rev_couv']);
            
            return $this;
            
        }

        public function selectByRevue() {
            $query = "SELECT article.num_article, article.art_page, article.art_titre, personne_has_article.personne_id FROM article, personne_has_article  WHERE  co_revue = :co_revue  ;";
            $result = $this->pdo->prepare($query);
            $result->bindValue(":co_revue",$this->co_revue,PDO::PARAM_STR);
            $result->execute();
            $art = $result->fetchall();
            var_dump($art);
            $datas=[];
            foreach($art as $elem) {//et transforme en tableau d'objet puis le retourne
                $article = new Revue();
                $article->setNum_article($elem["num_article"]);
                $article->setArt_page($elem["art_page"]);
                $article->setArt_titre($elem["art_titre"]);
                $article->setPersonne_id($elem["personne_id"]);
                
                array_push($datas, $article);
            }

            var_dump($datas);
            return $datas;
        }
        
        public function selectByRubrique() {
            $query = "SELECT rub_nom FROM rubrique WHERE  rubrique_id IN (:rubrique_id)";
            $result = $this->pdo->prepare($query);
            $result->bindValue(":rubrique_id",$this->rubrique_id,PDO::PARAM_STR);
            $result->execute();
            $datas = $result->fetchall();
            $i=1;
           
            var_dump($datas);
            
            return $this;
        }


        public function selectByStyle(){
            $query = "SELECT * FROM genre WHERE  style = :style;";
            $result = $this->pdo->prepare($query);
            $result->bindValue(":style",$this->style,PDO::PARAM_STR);
            $result->execute();
            $datas = $result->fetchall();
            //$this->setId_genre($datas['0']['id_genre']);

            return $this;
            
        }
        function select(){
            $query = "SELECT * FROM articles WHERE  id_genre = :id_genre AND numero = :numero";
            $result = $this->pdo->prepare($query);
            $result->bindValue("id_genre", $this->id_genre, PDO::PARAM_INT);
            $result->bindValue("numero", $this->id_bouton, PDO::PARAM_INT);
            $result->execute();
            $datas = $result->fetch();
            //$this->setcontenu($datas['contenu']);


        }
        function update(){

        }
        function delete(){

        }
}
?>