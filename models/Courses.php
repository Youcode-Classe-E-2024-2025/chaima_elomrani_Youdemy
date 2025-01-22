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
            $stmt = $this->pdo->prepare(
                "SELECT course.*, category.name AS category_name 
                 FROM course 
                 LEFT JOIN category ON course.category = category.id"
            );
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
    
        $teacherId = $_SESSION['user_id'];
        $stmt = $this->pdo->prepare(
            "SELECT DISTINCT course.*, category.name AS category_name, users.name AS teacher_name
             FROM course
             LEFT JOIN category ON course.category = category.id
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
        $video = $_POST['video'];
        $image = $_POST['image'];

        try {
            $this->pdo->beginTransaction();

            $sql = "INSERT INTO course (title, description, category, Teacher,price, image_path , video_path) VALUES (:name, :description, :category, :teacher , :price, :image, :video)";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute(['name' => $name, 'description' => $description, 'category' => $category, 'teacher' => $teacher, 'price' => $price, 'image' => $image, 'video' => $video]);
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



    public function searchCourse($searchTerm, $limit, $offset)
    {
        $query = "SELECT * FROM course WHERE title LIKE :searchTerm1 OR description LIKE :searchTerm2 LIMIT :limit OFFSET :offset";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([
            'searchTerm1' => '%' . $searchTerm . '%',
            'searchTerm2' => '%' . $searchTerm . '%',
            'limit' => $limit,
            'offset' => $offset
        ]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }






    public function getAll()
    {
        $sql = "SELECT * FROM course ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }






    public function getTotalCourses()
    {
        return $this->pdo->query("SELECT COUNT(*) FROM course")->fetchColumn();
    }

    public function getCourses($limit, $offset)
    {
        $sql = "SELECT*FROM course LIMIT :limit OFFSET :offset";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
        $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }






    public function countSearchResults($searchTerm)
    {
        // Count total search results for pagination
        $query = "SELECT COUNT(*) as total 
                  FROM course c
                  LEFT JOIN category cat ON c.category = cat.id
                  WHERE c.title LIKE :searchTerm1 
                  OR c.description LIKE :searchTerm2 
                  OR cat.name LIKE :searchTerm3";

        $stmt = $this->pdo->prepare($query);
        $stmt->bindValue(':searchTerm1', '%' . $searchTerm . '%', PDO::PARAM_STR);
        $stmt->bindValue(':searchTerm2', '%' . $searchTerm . '%', PDO::PARAM_STR);
        $stmt->bindValue(':searchTerm3', '%' . $searchTerm . '%', PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC)['total'];
    }



    public function countTotalCourses($teacher_id) {
        $sql = "SELECT COUNT(*) AS total_courses FROM course WHERE Teacher = :teacher_id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':teacher_id', $teacher_id, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return $result['total_courses'] ?? 0; 
    }
}