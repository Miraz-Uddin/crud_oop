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
}


 ?>
