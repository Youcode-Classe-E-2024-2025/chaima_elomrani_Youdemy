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
        $visitor = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $visitor;
    }



    public function deleteCourse($id)
    {
        $sql = "DELETE FROM course  WHERE  id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(["id" => $id]);

    }


    public function addCourse()
    {
        $name = $_POST['name'];
        $description = $_POST['description'];
        $category = $_POST['category'];
        $tags = $_POST['tags'];
        $teacher = $_SESSION['user_id'];
        $price = $_POST['price'];

        try {
            $this->pdo->beginTransaction();

            $sql = "INSERT INTO course (title, description, category, Teacher,price) VALUES (:name, :description, :category, :teacher , :price)";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute(['name' => $name, 'description' => $description, 'category' => $category, 'teacher' => $teacher , 'price' => $price]);
            $courseId = $this->pdo->lastInsertId();

            $sql = "INSERT INTO tag_to_course (tag_id, course_id) VALUES (:tag, :course)";
            $stmt = $this->pdo->prepare($sql);
            foreach ($tags as $tag) {
                $stmt->execute(['tag' => $tag, 'course' => $courseId]);
            }


            $this->pdo->commit();
        } catch (PDOException $e) {
            $this->pdo->rollBack();
            throw $e;
        }
    }





}