<?php
require_once 'database.php';
class categories extends database{
    private $category_id, $category_name, $category_image;
    public function setcategory_id($category_id){
        $this->category_id = $category_id;
    }
    public function setcategory_name($category_name){
        $this->category_name= $category_name;
    }
    public function setcategory_image($category_image){
        $this->category_image= $category_image;
    }
    public function add(){
        $stm="INSERT INTO categories (`category_id`, `category_name`, `category_image`)VALUES('','$this->category_name','$this->category_image')";
        return $this->run($stm);
    }
    public function delete_category($column,$id){
        $stm="DELETE FROM `categories` WHERE $column=$id";
        return $this->run($stm);
    }
    public function edit_category($column,$id){
        $stm="UPDATE `categories` SET `category_name`='$this->category_name',`category_image`='$this->category_image' WHERE $column=$id";
        return $this->run($stm);
    }
}
