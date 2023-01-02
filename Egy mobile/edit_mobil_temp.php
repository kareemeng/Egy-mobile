<?php 
require 'mobiles.php';
$ids = $_SERVER["QUERY_STRING"];
$id = explode("?", $ids); /////0->id mobil    1-> id category
if(isset($_POST['mobil_name'])){
    $mobil = new mobiles();
$mobil->setmobil_name($_POST["mobil_name"]);
$mobil->setmobil_price($_POST["price"]);
$mobil->setmobil_description($_POST["description"]);
$mobil->setmobil_quantity($_POST["quantity"]);

    $image_name=$_FILES['image']['name']; //img.jpg....
    $image_temp=$_FILES['image']['tmp_name']; // from
    $allowed_extensions=['jpg','png','jpeg'];
    $extensions=explode(".",$image_name);
    $img_extension=end($extensions);
    $img_extension=strtolower($img_extension);
    if(in_array($img_extension,$allowed_extensions)){
        $image_name=$_POST['mobil_name'].rand(0,100000).$image_name;
    }else{
        $image_name="";
    }

    $mobil->setmobil_image($image_name);
    try{
        if($check==0)
        {
            $result=$mobil->edit_mobiles('mobiles_id',$id[0]);
        if($result){
            if($image_name != ""){
            
                move_uploaded_file($image_temp,'img/images/'.$image_name); //move(from,to)
            }
            // $login='login.php?id='.$_POST['id'];
            header("location: adminhome2.php?$id[1]");

        }
        }
        
        
    }
    catch(Exception $e){
        echo $e->getMessage();
    }  
}
?>