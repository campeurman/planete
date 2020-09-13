<?php

abstract class DbConnect implements Crud {
    protected $pdo;
    protected $id;
    
    function __construct($id = null) {
        $this->pdo = new PDO(DATABASE, LOGIN, PASSWORD);
        $this->id = $id;
    }
    
    function setId($id) {
        $this->id = $id;
    }

    abstract function selectAll();
    abstract function insert();
    abstract function select();
    abstract function update();
    abstract function delete();
}
?>