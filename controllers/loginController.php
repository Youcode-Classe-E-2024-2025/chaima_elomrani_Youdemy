<?php
session_start();
require_once __DIR__ . '/../models/user.php';
require_once __DIR__ . '/../config/connexion.php';


class LoginController
{
    public function login(string $email, string $password)
    {
        try {

            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $email = $_POST['email'];
                $password = $_POST['password'];
            }


            $db = new Connexion();
            $db = $db->getconnexion();


            $stmt = $db->prepare('SELECT * FROM users WHERE email = ?');
            $stmt->execute([$email]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($user && password_verify($password, $user['password'])) {
                $_SESSION['user_id'] = (int) $user['id'];
                $_SESSION['user_role'] = (string) $user['role'];
                error_log("Connexion réussie pour l'utilisateur ID: " . $_SESSION['user_id']);
                header('Location: ?view=catalogue');


                return [
                    'success' => true,
                    'message' => 'Connexion réussie',
                    'user_id' => $user['id'],
                    'user_role' => $user['role']
                ];


            } else {
                error_log("Login failed: Incorrect password for email $email.");
                header('Location: ?view=404');
                return [
                    'success' => false,
                    'message' => 'Email ou mot de passe incorrect'
                ];
            }

        } catch (PDOException $e) {
            error_log("Erreur de connexion : " . $e->getMessage());
            return [
                'success' => false,
                'message' => 'Erreur de connexion : ' . $e->getMessage()
            ];
        }

    }
}


$userController = new LoginController();
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    try {
        $loginResult = $userController->login($email, $password);
        
        if ($loginResult['success']) {
            if ($loginResult) {
                header('Location: ?view=catalogue');
                exit();
            } else {
                header('Location: ?view=404');
                exit();
            }
        } else {
            $error = $loginResult['message'];
        }
    } catch (Exception $e) {
        $error = $e->getMessage();
    }
}









































