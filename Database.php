<?php

class Database
{
  public $isConnected;
  protected $database;
//connect
  public function __construct($username = "username", $password = "password", $host = "host", $dbname = "database name", $options = []) {
    $this->isConnected = TRUE;
    try {
      $this->database = new PDO("mysql:host={$host};dbname={$dbname};charset=utf8", $username, $password, $options);
      $this->database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $this->database->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    } catch (PDOexception $e){
      throw new Exception($e->getMessage());
    }
  }
//disconnect
  public function Disconnect() {
    $this->database = NULL;
    $this->isConnected = FALSE;
  }
//get row
  public function getRow($query, $params = []) {
    try{
      $stmt = $this->database->prepare($query);
      $stmt->execute($params);
      return $stmt->fetch();
    } catch (PDOexception $e) {
      throw new Exception($e->getMessage());
    }
  }
//get rows
  public function getRows($query, $params = []) {
    try{
      $stmt = $this->database->prepare($query);
      $stmt->execute($params);
      return $stmt->fetchAll();
    } catch (PDOexception $e) {
      throw new Exception($e->getMessage());
    }
  }
//insert row
  public function insertRow($query, $params = []) {
    try {
      $stmt = $this->database->prepare($query);
      $stmt->execute($params);
      return TRUE;
    } catch (PDOexception $e) {
      throw new Exception($e->getMessage());
    }
  }
//update row
  public function updateRow() {
    $this->insertRow($query, $params);
  }
//delete row
  public function deleteRow() {
    $this->insertRow($query, $params);
  }
}
