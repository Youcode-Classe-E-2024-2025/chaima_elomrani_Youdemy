<?php
require_once __DIR__ . '/../config/connexion.php';
class Usermodel
{

    private $id;
    private $name;
    private $email;
    private $password;
    private $role;
    private $connexion;


    public function __construct()
    {
        $pdo = new Connexion();
        $this->connexion = $pdo->getconnexion();

    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getRole(): string
    {
        return $this->role;
    }

    public function setPassword(string $password)
    {
        $this->password = password_hash($password, PASSWORD_BCRYPT);
    }


    public static function validateUsername(string $username): bool
    {
        return strlen($username) >= 3 && strlen($username) <= 50;
    }// strlen($username) returns the lenght of the name 


    public static function validateEmail(string $email): bool
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
    }// filter_var($email, FILTER_VALIDATE_EMAIL) checking the format of the email inserted 

    public static function validatePassword(string $password): bool
    {
        return strlen($password) >= 8; // checking if the lenght of the password is 8 or more if it's not returns false 

    }



    public function InsertUser($name, $email, $password, $role)
    {



        // verifying the connexion with the data base 

        if (!$this->connexion) {
            error_log("Échec de la connexion à la base de données");
            return false;
        }

        // cheking if the email already exists in the database or not 
        $checkemail = $this->connexion->prepare('SELECT * FROM users WHERE email = ?'); // ? is a placeholder of the email that wikk be entred by the user 
        $checkemail->execute([$email]);    // executing the prepared query with replacing the ? with the amail of the user entered 
        $emailCount = $checkemail->fetch();  // retreiving all the users with that email if no one has the same email the variable emailcount with return 


        if ($emailCount) {
            echo 'mail already exists';
            return false;
        }

        // inserting the user into the database 

        $stmt = $this->connexion->prepare('INSERT INTO users (name , email, password , role,status) VALUES (?,?,?,?,?)');
        $hashedpassword = password_hash($password, PASSWORD_DEFAULT);
        if ($role === 'Teacher') {
            $result = $stmt->execute([$name, $email, $hashedpassword, $role, "suspended"]);
        } else {
            $result = $stmt->execute([$name, $email, $hashedpassword, $role, "active"]);

        }
        if ($result) {
            echo "User saved successfully!";
        } else {
            echo "Failed to save user.";
            return false;
        }


        // $this->id = $this->connexion->lastInsertId();
        return true;
    }



    public function login(string $email, string $password)
    {


        $stmt = $this->connexion->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);
        $verifyUser = $stmt->fetch(PDO::FETCH_ASSOC);   // fetching the data and stock in a a variable called verifyuser

        if ($verifyUser && password_verify($password, $verifyUser['password'])) {
            // session_start();
            $_SESSION['user_id'] = $verifyUser['id']; // Ensure 'id' is the correct key from the database result
            $_SESSION['user_name'] = $verifyUser['name'];
            $_SESSION['user_role'] = $verifyUser['role'];
            return $verifyUser;
        
        } else {
            return null;
        }
    }

    public function getTeacherCourses($teacherId) {
    try {
        $query = "SELECT * FROM courses WHERE teacher_id = :teacher_id";
        $stmt = $this->connexion->prepare($query);
        $stmt->bindParam(':teacher_id', $teacherId);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        throw new Exception("Error fetching teacher courses: " . $e->getMessage());
    }
}


    public function displayUsers()
    {
        $sql = "SELECT*FROM users";
        $stmt = $this->connexion->prepare($sql);
        $stmt->execute();
        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $users;
    }


    public function deleteUser($id)
    {
        $sql = "DELETE FROM users WHERE id = :id";
        $stmt = $this->connexion->prepare($sql);
        $stmt->execute(["id" => $id]);
    }


    public function aproveUser($id)
    {
        $sql = "UPDATE users SET status = :status WHERE id = :id";
        $stmt = $this->connexion->prepare($sql);
        $stmt->execute([
            'status' => 'active',
            'id' => $id
        ]);
    }


    public function suspendUser($id)
    {
        $sql = "UPDATE users SET status = :status WHERE id = :id";
        $stmt = $this->connexion->prepare($sql);
        $stmt->execute([
            'status' => 'suspended',
            'id' => $id
        ]);
    }

    
    public function Logout(){
        // session_start();
        session_unset();
        session_destroy();
    }












}