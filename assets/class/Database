<?php

abstract class Database
{
  //fonction de connextion à la base
  public function connect()
  {
    try {
      $db = new PDO('mysql:host=localhost;dbname=blablacampus', 'root', '');
      return $db;
    } catch (PDOException $e) {
      print "Erreur !: " . $e->getMessage() . "<br/>";
      die();
    }
  }
}
