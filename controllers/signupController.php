<?php
// require_once __DIR__ . '/../models/user.php';
// require_once __DIR__ . '/../config/connexion.php';

// if (empty($_SESSION['csrf_token'])) {
//     $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
// }
// ;



// if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//     try {
//         $name = $_POST['name'];
//         $email = $_POST['email'];
//         $password = $_POST['password'];
//         $role = $_POST['role'];
//         //  echo "Username: $username, Role: $role";

//         // dd($_POST);
//         // exit;

//         //  if (empty($name) || strlen($name) < 3 || strlen($name) > 50) {
//         //     throw new InvalidArgumentException("Le nom d'utilisateur doit contenir entre 3 et 50 caractères");
//         // }

//         $user = new Use($name, $email, $role, $password);

//         if ($user->InsertUser()) {
//             echo 'user saved succesfully';
//         } else {
//             echo 'check the code again';
//         }

//         return $user->InsertUser();
//     } catch (PDOException $e) {
//         throw new Exception("Error Processing Request" . $e->getMessage());

//     }

// }