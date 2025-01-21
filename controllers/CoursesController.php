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



    
}