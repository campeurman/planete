<?php 
class PersonneHasArticle extends DbConnect {

    private $personne_id;
    private $num_article;
    private $co_revue;

    function getPersonneId(): int {
        return $this->personne_id;
    }

    function getNumArticle(): string {
        return $this->num_article;
    }

    function getCoRevue(): string {
        return $this->co_revue;
    }

    function setPersonneId(int $id) {
        $this->personne_id = $id;
    }

    function setNumArticle(string $code) {
        $this->num_article = $code;
    }

    function setCoRevue(string $code) {
        $this->co_revue = $code;
    }

    function selectAll(){}
    function select(){}

    function selectByPersRevue(): array {
        $query = "SELECT DISTINCT personne_id, pe.num_article FROM personne_has_article pe, article ar WHERE personne_id = :id AND pe.num_article = ar.num_article AND ar.co_revue = :code";
        $result = $this->pdo->prepare($query);
        $result->bindValue('id', $this->personne_id , PDO::PARAM_INT);
        $result->bindValue('code', $this->co_revue , PDO::PARAM_STR);
        $result->execute();
        return $result->fetchAll();
    }

    function selectByArticle(): array {
        $query = "SELECT personne_id, num_article FROM personne_has_article WHERE num_article = :id";
        $result = $this->pdo->prepare($query);
        $result->bindValue('id', $this->num_article, PDO::PARAM_INT);
        $result->execute();
        return $result->fetchAll();
    }

    function insert(){}
    function update(){}
    function delete(){}
    
}