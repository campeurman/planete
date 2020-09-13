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
   
    // public function verify_user(){//verifie que le pseudo est egal au pseudo dans la base de données et renvoie le resultat
    //     $query2 = "SELECT * FROM 'utilisateur' WHERE pseudo = :pseudo AND password = :password;";
    //     $result2 = $this->pdo->prepare($query2);
    //     $result2->bindValue(':pseudo', $this->pseudo, PDO::PARAM_STR);
    //     $result2->bindValue(':password', $this->password, PDO::PARAM_STR);
    //     $result2->execute();
    //     $data2 = $result2->fetch();
    //      return $data2;
    //     }
       
        
        
        
        
    //         function deconnectUser() {//permet de revenir a l'etat de non membre
    //         unset($_SESSION['pseudo']);
            
    //         header('Location:index.php');
                }
        
    function insert() {//enregistre dans la base de donnée le pseudo le password et cree une id
    $query = "INSERT INTO utilisateur ('pseudo', 'password') VALUES (:pseudo, :passwd);";
    $result = $this->pdo->prepare($query);
    $result->bindValue('pseudo', $this->pseudo, PDO::PARAM_STR);
    $result->bindValue('passwd', $this->password, PDO::PARAM_STR);
    $result->execute();
    
    $this->id = $this->pdo->lastInsertId();
    var_dump($this);
    var_dump($this->pdo);
    return $this;

    }
        

    function selectAll(){//prendre les infos d'utilisateur dans la BDD
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
    function select(){

    }
     function update(){

    }
    function delete(){
        
    }

?>

