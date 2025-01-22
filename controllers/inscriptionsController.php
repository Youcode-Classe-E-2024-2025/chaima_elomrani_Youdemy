<?php
require_once('./models/inscriptions.php');


public function __construct(){
   

 private $inscriptionModel;

  public function __construct()
    {
        $this->inscriptionModel = new Inscriptions();

    }


    public function DisplayInscription(){
        $inscriptions = $this->inscriptionModel->displayinscriptions();
        require_once "./views/teacher_statistics.php";
    }

}