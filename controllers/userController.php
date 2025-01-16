<?php
session_start();
require_once __DIR__ . '/../models/user.php';
require_once __DIR__ . '/../config/connexion.php';


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
                    session_start();
                    $_SESSION["user_id"] = $loginResult["id"];
                    $_SESSION["user_role"] = $loginResult["role"];
                    $_SESSION["user_status"] = $loginResult["status"];

                    if ( $loginResult["status"] === 'suspended') {
                        header('Location: ./views/pended_page.php');
                    } else {
                        header('Location: ./views/catalogue.php');
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




    public function DeleteUser($id){
      $this->usermodel->deleteUser($id);
      header('Location: ./views/users.php');

    }
}



