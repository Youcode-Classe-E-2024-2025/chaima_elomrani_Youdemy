<?php

class Connexion
{
    private const HOST = 'localhost';
    private const USERNAME = 'root';
    private const PASSWORD = '';
    private const DBNAME = 'youdemy';

    private  ?PDO $instance = null;    // PDO representes the database connection  and ? is  a shorthand for nullable , wich means the property can be either PDO typed or null
// instance is the name of the property where the pdo connection will be stored / null : is for initializing that property with a value of null to store the database connection in  it later 

    
        public function __construct(){ //  construct  function is for initialising the objects in the class once they're crated 
            
            try {  //  try catch is used to handle exeptions and errors 
            
                $dsn = "mysql:host=" . self::HOST . ";dbname=" . self::DBNAME . ";charset=utf8mb4";//  string defining the database informations 
                $options = [  // array of options used to configure the database connection
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,//  This option tells PDO to throw exceptions if there are any errors.

                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, // sets the default fetch mode for the data (in a assiociative array )

                    PDO::ATTR_EMULATE_PREPARES => false, // used for better performance and security 

                    PDO::MYSQL_ATTR_FOUND_ROWS => true // Ensures that the ROW_COUNT() function returns the correct number of rows affected.

                ];
                
                $this->instance = new PDO($dsn, self::USERNAME, self::PASSWORD, $options);
                $this->instance->exec('SET NAMES utf8mb4');// handling special characters 
            } catch (PDOException $e) {                // $e: The caught exception object.

                error_log("Erreur de connexion à la base de données : " . $e->getMessage());
                throw new Exception("Impossible de se connecter à la base de données.");
            }
        

        }
       public function getconnexion():PDO{
             return $this->instance;
       }
          
    }
   
    
