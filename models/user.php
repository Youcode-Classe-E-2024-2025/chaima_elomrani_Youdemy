<?php
require_once('./config/connexion.php');
class User
{

    private int $id;
    private string $name;
    private string $email;
    private string $password;
    private string $role;

    public function __construct(string $name, string $email, string $role, string $password, $id = null)
    {
        //  the ?? is used to check if their is no id prvides then the id of that user get's the default value which is 0, it's usefull when 
        // we creat a database and the id will be set from the database it self 
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
        $this->role = $role;
        $this->id = $id ?? 0;
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



    public function InsertUser()
    {



        // verifying the connexion with the data base 
        $pdo = new Connexion();
        $pdo = $pdo->getconnexion();

        if (!$pdo) {
            error_log("Échec de la connexion à la base de données");
            return false;
        }

        // cheking if the email already exists in the database or not 
        $checkemail = $pdo->prepare('SELECT * FROM users WHERE email = ?'); // ? is a placeholder of the email that wikk be entred by the user 
        $checkemail->execute([$this->email]);    // executing the prepared query with replacing the ? with the amail of the user entered 
        $emailCount = $checkemail->fetch();  // retreiving all the users with that email if no one has the same email the variable emailcount with return 


        if ($emailCount) {
            echo 'mail already exists';
            return;
        }

        // inserting the user into the database 

        $stmt = $pdo->prepare('INSERT INTO users (name , email, password , role) VALUES (?,?,?,?)');
        $hashedpassword = password_hash($this->password, PASSWORD_DEFAULT);
        $result = $stmt->execute([$this->name, $this->email, $hashedpassword, $this->role]);
        if ($result) {
            echo "User saved successfully!";
        } else {
            echo "Failed to save user.";
            return false;
        }
        

        $this->id = $pdo->lastInsertId();
        return true;
    }



    public function login(string $email , string $password){
        $pdo = new Connexion();
        $pdo = $pdo->getconnexion();

        $stmt =$pdo->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);
        $verifyUser = $stmt->fetch( PDO::FETCH_ASSOC);   // fetching the data and stock in a a variable called verifyuser

        if($verifyUser && password_verify($password,$verifyUser['password'])){
            // verifying the data of the user
            $user = new User($verifyUser['name'], $verifyUser['email'], $password, $verifyUser['role'], $verifyUser['id']);
            return $user ;
        }else{
            return null ;
        }
        
    }

}