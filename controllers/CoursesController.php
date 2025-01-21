<?php
require_once  __DIR__ .'/../models/Courses.php';



class CoursesController{
    
    private $CoursesModel;


    public function __construct(){
        $this->CoursesModel= new Courses();
    }



    public function DisplayCourse(){
        
    if (!isset($_SESSION['user_id'])) {
        header('Location: index.php?action=loginForm');
        exit();
    }

        // $teacherId = $_SESSION['user_id'];
        $courses = $this->CoursesModel->displayCourse();
        require_once __DIR__ . "/../views/course.php";
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


public function updateCourse() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $courseId = $_POST['course_id'];
        $title = $_POST['title'];
        $description = $_POST['description'];
        $category = $_POST['category'];
        $tags = $_POST['tags'];
        $price = $_POST['price'];
        $image = $_POST['image'];
        $video = $_POST['video'];

        try {
            $this->CoursesModel->updateCourse($courseId, $title, $description, $category, $tags, $price, $image, $video);
            echo json_encode(['success' => true, 'message' => 'Course updated successfully!']);
        } catch (Exception $e) {
            echo json_encode(['success' => false, 'message' => $e->getMessage()]);
        }
    }
}

    
}