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

  /**
   * File Upload Managements
   */
  protected function fileUpload($file, $location='', array $file_type=['jpg','png','jpeg','gif'])
  {
    // File Information
    $file_name = $file['name'];
    $file_tmp = $file['tmp_name'];
    $file_size = $file['size'];

    // File Extension
    $file_array = explode('.',$file_name);
    $file_extension = strtolower(end($file_array));

    // File Unique Name
    $name = md5(time().rand()).'.'.$file_extension;

    // File Upload
    move_uploaded_file($file_tmp, ($location.$name));

    return $name;
  }

  /**
   * Data Insert  to  Table
   */
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

  /**
   * Get All Data
   */
   protected function all($table, $order_by){
     // Data Sent to table
     $sql = "SELECT * FROM $table ORDER BY id='$order_by'";
     $data = $this->connect()->query($sql);
     if($data){
       return $data;
     }
   }

  /**
   * Delete Data
   */
   protected function deleteID($table, $student_id){

     // Photo Delete
     $sql = "SELECT * FROM $table WHERE id='$student_id'";
     $data = $this->connect()->query($sql);
     $student_info = $data->fetch_assoc();
     unlink('assets/uploads/students/'.$student_info['photo']);

     // Data Delete from table
     $sql = "DELETE FROM $table WHERE id='$student_id'";
     $data = $this->connect()->query($sql);
     if($data){
       return true;
     }
   }
}


 ?>
