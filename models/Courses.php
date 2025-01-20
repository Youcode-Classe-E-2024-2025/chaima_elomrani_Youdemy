<?php
require_once __DIR__ . '/../config/connexion.php';
require_once __DIR__ . '/../controllers/userController.php';


class Courses
{

    private $pdo;
    private $teacherId;

    public function __construct()
    {
        $pdo = new Connexion();
        $this->pdo = $pdo->getconnexion();
    }

    public function displayCourse()
    {
        if (!isset($_SESSION['user_name']) || !isset($_SESSION['user_role']) || $_SESSION['user_role'] !== 'Teacher') {
            // echo($_SESSION['user_id']);
            // return [];
            $stmt = $this->pdo->prepare("SELECT * FROM course");
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        $teacherId = $_SESSION['user_id'];
        // echo($_SESSION['user_id']); 
        $stmt = $this->pdo->prepare(
            "SELECT DISTINCT course.*, category.name AS category_name, users.name AS teacher_name
            FROM course
            LEFT JOIN category ON course.category = category.name
            LEFT JOIN users ON course.Teacher = users.id
            WHERE course.Teacher = :teacherId"
        );
        $stmt->execute(['teacherId' => $teacherId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    public function visitorCourses()
    {
        $stmt = $this->pdo->prepare("SELECT * FROM course");
        $stmt->execute();
        $visitor=$stmt->fetchAll(PDO::FETCH_ASSOC);
        return  $visitor;
    }



    public function deleteCourse($id)
    {
        $sql = "DELETE FROM course  WHERE  id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(["id" => $id]);

    }







}