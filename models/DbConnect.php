<?php

abstract class DbConnect implements Crud {
    protected $pdo;
    
    function __construct() {
        $this->pdo = new PDO(DATABASE, LOGIN, PASSWORD);
    }

    abstract function selectAll();
    abstract function insert();
    abstract function select();
    abstract function update();
    abstract function delete();
}
?>