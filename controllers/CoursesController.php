<?php
require_once  __DIR__ .'/../models/Courses.php';



class CoursesController{
    
    private $CoursesController;


    public function __construct(){
        $this->CoursesController= new Courses();
    }



    public function DisplayCourse(){
        
    if (!isset($_SESSION['user_id'])) {
        header('Location: index.php?action=loginForm');
        exit();
    }

        // $teacherId = $_SESSION['user_id'];
        $courses = $this->CoursesController->displayCourse();
        require_once __DIR__ . "/../views/course.php";
    }



    public function  VisitorCourses(){
        $visitor = $this->CoursesController->visitorCourses();
        require_once "index.php?action=catalogue";

    }


    public function DeleteCourse($id)
    {
        $this->CoursesController->deleteCourse($id);
        header("location: views/tag.php");
    }


   public function AddCourse(){
    $this->CoursesController->addCourse();
    header('Location: ./views/teacher_courses.php');
}




    
}