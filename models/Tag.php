<?php
require_once __DIR__ . '/../config/connexion.php';


class Tag
{
    private $pdo;

    public function __construct()
    {
        $pdo = new Connexion();
        $this->pdo = $pdo->getconnexion();
    }
    public function displaytags()
    {
        $stmt = $this->pdo->prepare("SELECT*FROM tag");
        $stmt->execute();
        $tags = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $tags;
    }

    public function deletetag($id)
    {
        $sql ="DELETE FROM tag  WHERE  id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(["id"=>$id]);

    }   


    public function addtag($name){
        $sql= "INSERT INTO tag (title) values (:title)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['title'=>$name]);
    }
}

