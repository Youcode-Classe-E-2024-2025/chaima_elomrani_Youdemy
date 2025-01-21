<?php
// session_start();
require_once __DIR__ . '/../models/user.php';
require_once __DIR__ . '/../config/connexion.php';
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}


class UserController
{
    private $usermodel;

    public function __construct()
    {
        $this->usermodel = new Usermodel();
    }


    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = htmlspecialchars($_POST['name']);
            $email = htmlspecialchars($_POST['email']);
            $password = htmlspecialchars($_POST['password']);
            $role = htmlspecialchars($_POST['role']);
            if ($this->usermodel->InsertUser($name, $email, $password, $role)) {
                header('Location:index.php?action=loginForm');
            }
            ;

        }


    }

    public function loginCheck()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'];
            $password = $_POST['password'];

            try {
                $loginResult = $this->usermodel->login($email, $password);
                if ($loginResult) {
                    // require_once "./views/catalogue.php";
                    $_SESSION["user_id"] = $loginResult["id"];
                    $_SESSION["user_role"] = $loginResult["role"];
                    $_SESSION["user_status"] = $loginResult["status"];
                    if ($loginResult["status"] === 'suspended') {
                        header('Location: ./views/pended_page.php');
                    }elseif($loginResult['role'] === 'Student'){
                        header('Location: index.php?action=student');

                    }elseif($loginResult['role'] === 'ADMIN'){
                        header('Location: views/users.php');
                    
                    }else{
                        header('Location: index.php?action=teacher');

                    }

                    exit();
                } else {
                    require_once "views/404.php";
                    exit();
                }
            } catch (Exception $e) {
                $error = $e->getMessage();
            }
        }
    }


    public function DeleteUser($id)
    {
        $this->usermodel->deleteUser($id);
        header('Location: ./views/users.php');

    }


    public function AproveUser($id){
        $this->usermodel->aproveUser($id);
        header("Location: ./views/users.php");
    }


    public function SuspendUser($id){
        $this->usermodel->suspendUser($id);
        header("Location: ./views/users.php");
    }


    
    public function logout()
    {
       $this->usermodel->Logout();
        header('Location: index.php?action=loginForm');

    }











}



