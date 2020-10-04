<?php

namespace App\Support;

use mysqli;

/**
 * Data-Base Management
 */
abstract class DB
{
  /**
   * Server Related Property
   */
  private $host = 'localhost';
  private $user = 'root';
  private $pass = '';
  private $db = 'crud_oop';

  private $conn;

  /**
   * Database Connection Setup
   */
  private function connect()
  {
    return $this->conn = new mysqli($this->host, $this->user, $this->pass, $this->db);
  }

  protected function insert($table, array $data){

    // Make SQL Colum Form Data
    $array_key = array_keys($data);
    $array_col = implode(',',$array_key);

    // Make SQL Values Form Data
    $array_val = array_values($data);

    foreach ($array_val as $value) {
      $form_value[] = "'".$value."'";
    }

    $array_values = implode(',',$form_value);

    // Data Sent to table
    $sql = "INSERT INTO $table ($array_col)VALUES($array_values)";
    $query = $this->connect()->query($sql);
    if($query){
      return true;
    }
  }
}


 ?>
