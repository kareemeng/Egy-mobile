<?php
require_once 'database.php';
class mobiles extends database{
    private $mobiles_id, $mobiles_name, $mobiles_image,$mobiles_price,$mobiles_description,$mobiles_quantity;
    public function setmobil_id($mobiles_id){
        $this->mobiles_id = $mobiles_id;
    }
    public function setmobil_name($mobiles_name){
        $this->mobiles_name= $mobiles_name;
    }
    public function setmobil_image($mobiles_image){
        $this->mobiles_image= $mobiles_image;
    }
    public function setmobil_price($mobiles_price){
        $this->mobiles_price= $mobiles_price;
    }
    public function setmobil_description($mobiles_description){
        $this->mobiles_description= $mobiles_description;
    }
    public function setmobil_quantity($mobiles_quantity){
        $this->mobiles_quantity= $mobiles_quantity;
    }
    public function add($category_id){
        $stm="INSERT INTO `mobiles`(`mobiles_id`, `mobiles_name`, `mobiles_price`, `mobiles_description`, `mobiles_image`, `mobiles_quantity`, `category_id`) VALUES ('','$this->mobiles_name','$this->mobiles_price','$this->mobiles_description','$this->mobiles_image','$this->mobiles_quantity','$category_id')";
        return $this->run($stm);
    }
    public function delete_mobiles($column,$id){
        $stm="DELETE FROM `mobiles` WHERE $column=$id";
        return $this->run($stm);
    }
    public function edit_mobiles($column,$id){
        $stm="UPDATE `mobiles` SET `mobiles_name`='$this->mobiles_name',`mobiles_price`='$this->mobiles_price',`mobiles_description`='$this->mobiles_description',`mobiles_image`='$this->mobiles_image',`mobiles_quantity`='$this->mobiles_quantity' WHERE $column=$id";
        return $this->run($stm);
    }
}
