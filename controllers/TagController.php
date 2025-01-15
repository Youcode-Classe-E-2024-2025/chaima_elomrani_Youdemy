<?php
// require_once('./config/connexion.php');
require_once('./models/Tag.php');


class TagController
{

    private $tagmodel;
    // private $name ;

    public function __construct()
    {
        $this->tagmodel = new Tag();

    }

    public function DisplayTag(){
        $tags = $this->tagmodel->displaytags();
        require_once "views/tag.php";
    }

    public function DeleteTag($id)
    {
        $this->tagmodel->deletetag($id);
        header("location: views/tag.php");
    }

    public function Addtag($name){
        $this->tagmodel->addtag($name);
        header("location: views/tag.php");
    }

}


