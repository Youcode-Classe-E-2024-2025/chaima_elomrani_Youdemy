<?php
require_once __DIR__ . '/../config/connexion.php';


class Courses{
   
    private $pdo;

    
    public function __construct(){
        $pdo = new Connexion();
        $this->pdo = $pdo->getconnexion();
    }


    public function displayCourse(){
        $stmt = $this->pdo->prepare(
            "SELECT course.* , category.name,  users.name 
                    FROM course LEFT JOIN category ON course.category = category.id
                    LEFT JOIN users ON course.Teacher = users.id;
                    ");
        $stmt->execute();
        $courses= $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $courses;
    }
    

    public function deleteCourse($id)
    {
        $sql ="DELETE FROM course  WHERE  id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(["id"=>$id]);

    }   







}