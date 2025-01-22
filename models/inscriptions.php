<?php
require_once __DIR__ . '/../config/connexion.php';


class Inscriptions
{
    private $pdo;


    public function __construct()
    {
        $pdo = new Connexion();
        $this->pdo = $pdo->getconnexion();
    }

    public function insertInscription()
    {
        if (isset($_SESSION['user_id'])) {
            $student_id = $_SESSION['user_id'];
            $course_id = $_POST['course_id'];


            $sql = "INSERT INTO inscription (student_id, course_id) VALUES (:user_id, :course_id)";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([
                ':user_id' => $student_id,
                ':course_id' => $course_id
            ]);

            if ($stmt->rowCount() > 0) {
                $_SESSION['enrollment_success'] = true;
                header('Location: index.php?action=enrolledCourse');
                exit();
            } else {
                echo "Erreur lors de l'inscription.";
            }
        } else {
            echo "Utilisateur non connecté.";
        }

    }



    public function getInscriptions()
    {
        $sql = "SELECT i.id, c.title AS course_title, c.id as course_id, i.student_id, u.name AS student_name, u.email AS student_email 
                FROM inscription i
                JOIN course c ON i.course_id = c.id 
                JOIN users u ON i.student_id = u.id 
                WHERE c.Teacher = :user_id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['user_id' => $_SESSION['user_id']]);
        $inscriptions = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $inscriptions;
    }

    // recuperer les inscription li kaynin f chaque cours 
    public function getUsersByCourse($course_id)
    {
        $sql = "SELECT u.id, u.name, u.email, u.role, u.status 
                FROM inscription i
                JOIN users u ON i.student_id = u.id 
                WHERE i.course_id = :course_id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['course_id' => $course_id]);
        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $users;
    }





    public function totalInscription($user_id) {
        $sql = "SELECT COUNT(DISTINCT inscription.student_id) AS total_student 
                FROM users 
                JOIN course ON users.id = course.Teacher
                JOIN inscription ON course.id = inscription.course_id
                WHERE users.id = :user_id"; 
    
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
    
        return $result['total_student'] ?? 0;
    }




    





}