<?php

include_once "config/helper.php";
include_once "controllers/userController.php";
include_once "controllers/CategoryController.php";
include_once "config/connexion.php";
include_once "controllers/TagController.php";
include_once "controllers/CoursesController.php";
// require_once "core/Router.php";

$action = $_GET['action'] ?? 'home';

// $router = new Router();

$userController = new UserController();
$tagController = new TagController();
$categoryController = new CategoryController();
$courseController = new CoursesController();

// $router->action();
// $router->view();

switch ($action){
    case 'home' :
        require_once "views/home.php"; 
        break;
    case 'SignupForm' : 
        require_once "views/signup.php"; 
        break;
    case "SignUp":
        $userController->register();
    break;
    case "loginForm" : 
        require_once "views/login.php"; 
        break;
    case "login" : 
        $userController->loginCheck();
        break;

    case "deleteTag" :
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
     
    case "deleteCategory" :
        $id = $_POST['id'];
        $categoryController->DeleteCategory($id);
        break;

    case "addCategory" :
        $categoryController->addcategory() ;
        break; 
       
    case "deleteUser" :
        $id = $_POST['id'];
        $userController->DeleteUser($id);
        break;
    
    case "aproveUser" :
        $id = $_POST['id'];
        $userController->AproveUser($id);
        break;

    case "SuspendUser" :
        $id = $_POST['id'];
        $userController->suspendUser($id);
        break;


    case "logout" :
        $logout = $_POST['log'];
        $userController->logout();
        break;    

    case "deleteCourse" :
        $id = $_POST['id'];
        $courseController->DeleteCourse($id);
        break; 

}

