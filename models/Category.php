<?php
require_once __DIR__ . '/../config/connexion.php';



class Category
{

    private $pdo;

    public function __construct()
    {
        $pdo = new Connexion();
        $this->pdo = $pdo->getconnexion();
    }
    public function displayCategory()
    {

        $stmt = $this->pdo->prepare("SELECT*FROM category");
        $stmt->execute();
        $categories = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $categories;

    }


    public function deleteCategory($id)
    {

        $sql = 'DELETE FROM category WHERE id = :id';
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(["id" => $id]);

    }


    public function add($name){
        $sql="INSERT INTO category (name) VALUES (:name)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['name'=> $name]);
    }









}