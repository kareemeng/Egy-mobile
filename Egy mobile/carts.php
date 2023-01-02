<?php
require_once 'database.php';
class carts extends database{
    private $cart_id, $mobiles_id, $user_id,$cart_quantity;
    public function setcart_id($cart_id){
        $this->cart_id= $cart_id;
    }
    public function setmobiles_id($mobiles_id){
        $this->mobiles_id= $mobiles_id;
    }
    public function setuser_id($user_id){
        $this->user_id= $user_id;
    }
    public function setcart_quantity($cart_quantity){
        $this->cart_quantity= $cart_quantity;
    }
    public function add(){
        $stm="INSERT INTO carts (`cart_id`, `mobiles_id`, `user_id`,cart_quantity)VALUES('','$this->mobiles_id','$this->user_id','$this->cart_quantity')";
        return $this->run($stm);
    }
    public function delete_cart($column,$id){
        $stm="DELETE FROM `carts` WHERE $column=$id";
        return $this->run($stm);
    }
    
}
