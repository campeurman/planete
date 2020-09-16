<?php
class Utilisateur extends DbConnect {//creation de la class Utilisateur extention de la class DbConnect
    
    private $pseudo;
    protected $password;
    protected $id_utilisateur;

    public function getPseudo():string {
        return $this->pseudo;
    }
    public function setPseudo(string $pseudo) {
        $this->pseudo = $pseudo;
    }
    public function getPassword():string {
        return $this->password;
    }
    public function setPassword(string $password) {
        $this->password = $password;
    }
    public function getId_utilisateur():string {
        return $this->id_utilisateur;
    }
     public function setId_utilisateur(string $id_utilisateur) {
        $this->id_utilisateur = $id_utilisateur;
    }

    public function verify_user(){//verifie que le pseudo est egal au pseudo dans la base de données et renvoie le resultat
        $query = "SELECT * FROM utilisateur WHERE pseudo = :pseudo;";
        $result = $this->pdo->prepare($query);
        $result->bindValue(':pseudo',$this->pseudo,PDO::PARAM_STR);
        $result->execute();
        $data = $result->fetch();
        return $data;
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
        return $datas;
    }
    function select(){

    }
    function update(){

    }
    function delete(){
        
    }
}
?>

