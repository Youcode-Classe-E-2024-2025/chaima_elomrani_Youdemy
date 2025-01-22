<?php
require_once __DIR__ . '/../config/connexion.php';


class Inscriptions {
    private $pdo;


    public function __construct()
    {
        $pdo = new Connexion();
        $this->pdo = $pdo->getconnexion();
    }

    public function insertInscription() {
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
                header('Location: index.php?action=statistic'); 
                exit();
            } else {
                echo "Erreur lors de l'inscription.";
            }
        } else {
            echo "Utilisateur non connecté.";
        }
        
    }



public function getInscriptions() {
    $sql = "SELECT i.id, c.title AS course_title, i.student_id 
            FROM inscription i
            JOIN course c ON i.course_id = c.id";
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute();
    $inscriptions = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    return $inscriptions;
}

}