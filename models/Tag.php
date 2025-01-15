<?php
require_once('./config/connexion.php');

class Tag
{
    private $pdo;

    public function __construct(){
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

    public function deletetag(){
        $stmt = $this->pdo->prepare('DELETE FROM tags WHERE id = ?');
        $stmt->execute();
        
    }

}