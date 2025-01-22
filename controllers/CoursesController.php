<?php
require_once  __DIR__ .'/../models/Courses.php';



class CoursesController{
    
    protected $CoursesModel;


    public function __construct(){
        $this->CoursesModel= new Courses();
    }



    public function DisplayCourse()
    {
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $limit = 10;
        $offset = ($page - 1) * $limit;

        $courses = $this->CoursesModel->getCourses($limit, $offset);

        $totalCourses = $this->CoursesModel->getTotalCourses();
        $totalPages = ceil($totalCourses / $limit);

        if (!isset($_SESSION['user_id'])) {
            header('Location: index.php?action=loginForm');
            exit();
        }

        $courses = $this->CoursesModel->displayCourse();
        return $courses;
    }


    public function  VisitorCourses(){
        $visitor = $this->CoursesModel->visitorCourses();
        require_once "index.php?action=catalogue";

    }


    public function DeleteCourse($id)
    {
        $this->CoursesModel->deleteCourse($id);
        header("location: index.php?action=teacher");
    }


   public function AddCourse(){
    $this->CoursesModel->addCourse();
    header('Location: ./views/teacher_courses.php');
}


public function searchCourse()
{
    $keyword = isset($_GET['search']) ? $_GET['search'] : '';
    $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

    $limit = 9;
    $offset = ($page - 1) * $limit;

    if (empty($keyword)) {
        return $this->CoursesModel->getCourses($limit, $offset);
    } else {
        return $this->CoursesModel->searchCourse($keyword, $limit, $offset);
    }

}


public function getCoursesModel(){
    return $this->CoursesModel;
}


// public function updateCourse() {
//     if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//         $courseId = $_POST['course_id'] ?? null;
//         $title = $_POST['title'] ?? '';
//         $description = $_POST['description'] ?? '';
//         $category = $_POST['category'] ?? '';
//         $tags = $_POST['tags'] ?? [];
//         $price = $_POST['price'] ?? '';
//         $image = $_POST['image'] ?? '';
//         $video = $_POST['video'] ?? '';

//         if (!$courseId) {
//             echo json_encode(['success' => false, 'message' => 'Course ID is required.']);
//             return;
//         }

//         try {
//             $this->CoursesModel->updateCourse($courseId, $title, $description, $category, $tags, $price, $image, $video);
//             echo json_encode(['success' => true, 'message' => 'Course updated successfully!']);
//         } catch (Exception $e) {
//             echo json_encode(['success' => false, 'message' => $e->getMessage()]);
//         }
//     }
// }

    
}