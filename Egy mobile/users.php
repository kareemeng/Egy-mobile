<?php
require_once 'database.php';
class users extends database{
    private $user_id, $user_name,$user_email,$user_password,$user_image,$user_credit_no;
    public function setid($user_id){
        $this->user_id=$user_id;
    }
    public function setName($user_name){
        $this->user_name=$user_name;
    }
    public function setEmail($user_email){
        $this->user_email=$user_email;
    }
    public function setpassword($user_password){
        $this->user_password=$user_password;
    }
    public function setImage($user_image){
        $this->user_image=$user_image;
    }public function setuser_credit_no($user_credit_no){
        $this->user_credit_no=$user_credit_no;
    }
    public function add(){
        $stm="INSERT INTO users (`user_id`, `user_name`, `user_email`, `user_password`, `user_image`,`user_credit_no`)VALUES('','$this->user_name','$this->user_email','$this->user_password','$this->user_image','$this->user_credit_no')";
        
        return $this->run($stm);
      
    }
}
?>