<?php
require_once('./models/inscriptions.php');

class Inscription{

    
     private $inscriptionModel;
    
      public function __construct()
        {
            $this->inscriptionModel = new Inscriptions();
    
        }
    
    
        // public function DisplayInscription(){
        //      $this->inscriptionModel->displayinscriptions();
        //     require_once "./views/teacher_statistics.php";
        // }
    
    
        public function GetUsersByCourse($course_id){
            $users = $this->inscriptionModel->getUsersByCourse($course_id);
            require_once "./views/teacher_statistics.php";
        }

        public function InsertInscription(){
            $this->inscriptionModel->insertInscription();
            require_once './views/studentFirst_page.php';
        }


}