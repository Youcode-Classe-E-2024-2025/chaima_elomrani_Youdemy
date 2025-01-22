<?php
require_once('./models/inscriptions.php');

class Inscription{

    
     private $inscriptionModel;
    
      public function __construct()
        {
            $this->inscriptionModel = new Inscriptions();
    
        }
    
    
       
    
    
        public function GetUsersByCourse($course_id){
            $users = $this->inscriptionModel->getUsersByCourse($course_id);
            require_once "./views/teacher_statistics.php";
        }

        public function InsertInscription(){
            $this->inscriptionModel->insertInscription();
            require_once './views/studentFirst_page.php';
        }

         
        public function TotalInscription() {
            if (!isset($_SESSION['user_id'])) {
                header('Location: login.php'); 
                exit();
            }
        
            $user_id = $_SESSION['user_id']; 
        
            $inscriptionModel = new Inscriptions();
            $total_students = $inscriptionModel->totalInscription($user_id);
        
           
            require_once './views/teacher_statistics.php';
        }


        
        

}