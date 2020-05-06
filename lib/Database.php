<?php

class Database{
    private $host = DB_HOST;
    private $user = DB_USER;  // All these is from config.php
    private $pass = DB_PASS;  
    private $dbname = DB_NAME;

    private $dbh; // Data base handeler
    private $error;
    private $stmt; // statement

    public function __construct(){
        // Set DSN (connection string)
        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbname;

        //Set options
        $options = array(
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,

        );

        //PDO Instance
        try{
            $this->dbh = new PDO($dsn, $this->user, $this->pass, $options);
        } catch(PDOexception $e) {
            $this->error = $e->getMessage();
        }
    }

    public function query($query){
        $this->stmt = $this->dbh->prepare($query);
    }
// Bind metode ir drosībai, lai nevarētu hakeri iemst drop table
    public function bind($param, $value, $type = null){
        if(is_null($type)){
            switch(true){
                case is_int ($value) :      
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool ($value) : 
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null ($value) : 
                    $type = PDO::PARAM_NULL;
                    break;
                default : 
                    $type = PDO::PARAM_STR;  
            }
        }
        $this->stmt->bindValue($param, $value, $type);
    }

    public function execute(){
        return $this->stmt->execute();
    }

    public function resultSet(){
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_OBJ); // Result will be returned in object
    }

    public function single(){
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_OBJ);
    }


}