<?php

include_once "config/helper.php";
include_once "controllers/userController.php";
include_once "config/connexion.php";
include_once "controllers/TagController.php";
// require_once "core/Router.php";

$action = $_GET['action'] ?? 'home';

// $router = new Router();

$userController = new UserController();
$tagController = new TagController();

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

        


}

