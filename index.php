<?php

include_once "config/helper.php";
include_once "controllers/userController.php";
include_once "controllers/CategoryController.php";
include_once "config/connexion.php";
include_once "controllers/TagController.php";
include_once "controllers/CoursesController.php";
include_once "controllers/inscriptionsController.php";
// require_once "core/Router.php";

$action = $_GET['action'] ?? 'home';

// $router = new Router();

$userController = new UserController();
$tagController = new TagController();
$categoryController = new CategoryController();
$courseController = new CoursesController();
$inscriptionController = new Inscription();

// $router->action();
// $router->view();

switch ($action) {
    case 'home':
        require_once "views/home.php";
        break;

    case 'catalogue':
        require_once "views/catalogue.php";
        break;

    case 'student':
        require_once "views/studentFirst_page.php";
        break;

    case 'teacher':
        require_once "views/teacher_courses.php";
        break;

    case 'statistic' :
        require_once 'views/teacher_statistics.php' ;
        break;

    case 'SignupForm':
        require_once "views/signup.php";
        break;

    case "SignUp":
        $userController->register();
        break;

    case "loginForm":
        require_once "views/login.php";
        break;

    case "login":
        $userController->loginCheck();
        break;

    case "deleteTag":
        $id = $_POST['id'];
        $tagController->DeleteTag($id);
        break;

    case "addtag":
        $name = $_POST['name'];
        $tagController->Addtag($name);
        break;
    // case "diplaytags" : 
    //     $tagController->DisplayTag();
    //     break;

    case "deleteCategory":
        $id = $_POST['id'];
        $categoryController->DeleteCategory($id);
        break;

    case "addCategory":
        $categoryController->addcategory();
        break;

    case "deleteUser":
        $id = $_POST['id'];
        $userController->DeleteUser($id);
        break;

    case "aproveUser":
        $id = $_POST['id'];
        $userController->AproveUser($id);
        break;

    case "SuspendUser":
        $id = $_POST['id'];
        $userController->suspendUser($id);
        break;


    case "logout":
        $logout = $_POST['log'];
        $userController->logout();
        break;

    case "deleteCourse":
        $id = $_POST['id'];
        $courseController->DeleteCourse($id);
        break;

    case "addCourse" : 
        $courseController->AddCourse();
        break; 

    // case "updateCourse" :
    //     $courseController->updateCourse();
    //     // header('Location: http://localhost/views/update_course.php');
    //     break;

    case "enrolledCourse":
        $inscriptionController->InsertInscription();
        // require_once "views/teacher_statistics.php";
        break;

    case "search" :
        $courseController->searchCourse();
        // require_once 'views/catalogue.php';
        break; 
    case "manage" : 
        $course_id = $_GET["id"];
        $inscriptionController->GetUsersByCourse($course_id);
        break;

        

        
}

