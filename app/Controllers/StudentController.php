<?php

namespace App\Controllers;
use App\Support\DB;
/**
 * Student Controller
 */
class StudentController extends DB
{
  /**
   * Add New Student
   */
   public function addNewStudent($name,$email,$cell,$photo){

     // Data Sent
     $data = parent::insert('students',[
       'name'=>$name,
       'email'=>$email,
       'cell'=>$cell,
       'photo'=>$this->fileUpload($photo,'assets/uploads/students/')
     ]);

     //
     if($data){
       return '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Student Added Successfull !!!</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
     }
   }
}

?>
