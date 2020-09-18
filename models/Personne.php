<?php

/**
 * Création de la classe Utilisateur extension de la classe DbConnect
 */
class Personne extends DbConnect {
    
    private $personne_id;
    private $per_nom;
    private $per_titre;
    private $per_datenais;
    private $per_datemort;
    private $per_sexe;
    private $per_bio;

    
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

    public function insert() {} 

    public function selectAll(){}

    /**
     * Sélectionne un utilisateur en fonction de la valeur de sa propriété $personne_id (id)
     * @return self
     */
    public function select(): self {
        $query = "SELECT DISTINCT personne_id, per_nom, per_titre FROM  personne WHERE personne_id = :id";
        $result = $this->pdo->prepare($query);
        $result->bindValue(":id",$this->personne_id,PDO::PARAM_INT);
        $result->execute();
        $per = $result->fetch();
        $this->per_nom = $per['per_nom'];
        $this->per_titre = $per['per_titre'];
        return $this;
    }
    
    public function update(){}

    public function delete(){}
}

?>

