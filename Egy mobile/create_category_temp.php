<?php 
require 'categories.php';

if(isset($_POST['category_name'])){
    $category = new categories();
$category->setcategory_name($_POST["category_name"]);

    $image_name=$_FILES['image']['name']; //img.jpg....
    $image_temp=$_FILES['image']['tmp_name']; // from
    $allowed_extensions=['jpg','png','jpeg'];
    $extensions=explode(".",$image_name);
    $img_extension=end($extensions);
    $img_extension=strtolower($img_extension);
    if(in_array($img_extension,$allowed_extensions)){
        $image_name=$_POST['category_name'].rand(0,100000).$image_name;
    }else{
        $image_name="";
    }

    $category->setcategory_image($image_name);
    try{
        if($check==0)
        {
            $result=$category->add();
        if($result){
            if($image_name != ""){
            
                move_uploaded_file($image_temp,'img/images/'.$image_name); //move(from,to)
            }
            // $login='login.php?id='.$_POST['id'];
            header("location: adminhome.php");

        }
        }
        
        
    }
    catch(Exception $e){
        echo $e->getMessage();
    }  
}
?>