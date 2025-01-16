<?php
require_once __DIR__ . '/../models/Category.php';


class CategoryController
{

    private $categorymodel;

    public function __construct()
    {
        $this->categorymodel = new Category();
    }


    public function showCategory()
    {
        $category = $this->categorymodel->displayCategory();
        require_once('views/category.php');
    }

    public function DeleteCategory($id){
       $this->categorymodel->deleteCategory($id);
       require_once('views/category.php');
    }


    public function addcategory(){
        if($_SERVER["REQUEST_METHOD"] === "POST"){
            $name = $_POST['name'];
            var_dump($name);
            $this->categorymodel->add($name);
            require_once('views/category.php');
        }
    }
}