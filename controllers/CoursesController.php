<?php
require_once  __DIR__ .'/../models/Courses.php';


class CoursesController{
    
    private $CoursesController;


    public function __construct(){
        $this->CoursesController= new Courses();
    }



    public function DisplayCourse(){
        $courses = $this->CoursesController->displayCourse();
        require_once __DIR__ . "/../views/course.php";
    }



    // public function DeleteCourse($id)
    // {
    //     $this->CoursesController->deleteCourse($id);
    //     header("location: views/tag.php");
    // }







    
}