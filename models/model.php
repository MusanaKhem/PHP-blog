<?php

abstract class Model{
    
    private static $_bdd;

    // BDD connection
    private static function setBdd(){
        self::$_bdd = new PDO('mysql:host=localhost;dbname=php_blog_mvc;charset=utf8', 'root', '');

    // We use PDO's constants to manage errors
    self::$_bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    }

    // Default DB connection
    protected function getBdd(){
        if(self::$_bdd == null){
            self::setBdd();
            return self::$_bdd;
        }
    }

    // Create method to recover list of elements in BDD
    protected function getAll($table, $obj){
        $this->getBdd();
        $varTable = [];
        $reqRecover = self::$_bdd->prepare('SELECT * FROM '.$table.' ORDER BY id desc');
        $reqRecover->execute();

        // Create data variable which
        // contains data
        while($data = $reqRecover->fetch(PDO::FETCH_ASSOC)){
            // varTable will contains data as objects
            $varTable = new $obj($data);
        }

        return $var;
        $req->closeCursor();
    }
}
?>