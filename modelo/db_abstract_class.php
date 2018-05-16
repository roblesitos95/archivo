<?php

/**
 * Created by PhpStorm.
 * User: CAPACITACION-PC
 * Date: 22/07/2016
 * Time: 9:17
 */
abstract class db_abstract_class {

    public $isConnected;
    protected $datab;
    private $username = "root";
    private $password = "";
    private $host = "localhost";
    private $dbname = "bd_documentacion";

    # métodos abstractos para ABM de clases que hereden
    abstract protected static function buscarForId($id);
    abstract protected static function buscar($query);
    abstract protected static function getAll();
    abstract protected function insertar();
    abstract protected function editar();
    abstract protected function eliminar($id);

    public function __construct(){
        $this->isConnected = true;
        try {
            $this->datab = new PDO("mysql:host={$this->host};dbname={$this->dbname};charset=utf8", $this->username, $this->password, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
            $this->datab->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->datab->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        }catch(PDOException $e) {
            $this->isConnected = false;
            throw new Exception($e->getMessage());
        }
    }

    //disconnecting from database
    //$database->Disconnect();
    public function Disconnect(){
        $this->datab = null;
        $this->isConnected = false;
    }

    //Getting row
    //$getrow = $database->getRow("SELECT email, username FROM users WHERE username =?", array("yusaf"));
    public function getRow($query, $params=array()){
        try{
            $stmt = $this->datab->prepare($query);
            $stmt->execute($params);
            return $stmt->fetch();
        }catch(PDOException $e){
            throw new Exception($e->getMessage());
        }
    }

    //Getting multiple rows
    //$getrows = $database->getRows("SELECT id, username FROM users");
    public function getRows($query, $params=array()){
        try{
            $stmt = $this->datab->prepare($query);
            $stmt->execute($params);
            return $stmt->fetchAll();
        }catch(PDOException $e){
            header('../vista/theme/404.php');
            throw new Exception($e->getMessage());
        }
    }

    //inserting un campo
    //$insertrow = $database ->insertRow("INSERT INTO users (username, email) VALUES (?, ?)", array("Diego", "yusaf@email.com"));
    public function insertRow($query, $params){
        try{
            if (is_null($this->datab)){
                $this->__construct();
            }
            $stmt = $this->datab->prepare($query);
            $stmt->execute($params);
            return $this->datab->lastInsertId();

        }catch(PDOException $e){
            throw new Exception($e->getMessage());
        }
    }

    //updating existing row
    //$updaterow = $database->updateRow("UPDATE users SET username = ?, email = ? WHERE id = ?", array("yusafk", "yusafk@email.com", "1"));
    public function updateRow2($query ){
        try{
        $stmt=$this->datab->prepare($query);
        $stmt->execute();

        }
        catch (Exception $e){
            echo $e->getMessage();
        }
        }

        public function updateRow($query, $params){
            return $this->insertRow($query, $params);

    }



    //delete a row
    //$deleterow = $database->deleteRow("DELETE FROM users WHERE id = ?", array("1"));
    public function deleteRow($query, $params){
        return $this->insertRow($query, $params);
    }
}