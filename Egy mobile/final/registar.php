<?php
require "css.php";
require  'users.php';
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
$nameErr="";
$emailErr="";
$passErr ="";
$creditErr="";
$check=0;
?>
<?php

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    
        if (empty($_POST["name"])) {
            $check=1;
            $nameErr = "*Name is required";
          } else {
            $_POST["name"] = test_input($_POST["name"]);
            // check if name only contains letters and whitespace
            if (!preg_match("/^[a-zA-Z-' ]*$/",$_POST["name"])) {
                $check=1;
              $nameErr = "*Only letters and white space allowed";
            }
          }
          
          if (empty($_POST["email"])) {
            $check=1;
            $emailErr = "*Email is required";
          } else {
            $_POST["email"] = test_input($_POST["email"]);
            // check if e-mail address is well-formed
            if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
                $check=1;
              $emailErr = "*Invalid email format";
            }
        }
        if (empty($_POST["password"])) {
            $check=1;
            $passErr = "*password is required";
          } else {
            // check if e-mail address is well-formed
            if (strlen($_POST["password"])<5 || strlen($_POST["password"])>255) {
              $check=1;
              $passErr = "*Invalid password:at least 5";
            }
        } 
        if (empty($_POST["credit_no"])) {
            $check=1;
            $creditErr = "*credit number is required";
        }
            else{
                $_POST ["credit_no"]= test_input($_POST ["credit_no"]);
                if (!preg_match ("/^[0-9]*$/", $_POST ["credit_no"]) || strlen($_POST ["credit_no"])!=16){  
                    $check=1;
                    $creditErr = "*Invalid number:Only numeric and length(16)";  
                } 
            }
} 
?>
<?php
if(isset($_POST['name'])){
    $use=new users();
    $use->setName($_POST['name']);
    $use->setEmail($_POST['email']);
    $use->setpassword(sha1($_POST['password']));
    $use->setuser_credit_no($_POST['credit_no']);

    $image_name=$_FILES['image']['name']; //img.jpg....
    $image_temp=$_FILES['image']['tmp_name']; // from
    $allowed_extensions=['jpg','png','jpeg'];
    $extensions=explode(".",$image_name);
    $img_extension=end($extensions);
    $img_extension=strtolower($img_extension);
    if(in_array($img_extension,$allowed_extensions)){
        $image_name=$_POST['name'].rand(0,100000).$image_name;
    }else{
        $image_name="";
    }

    $use->setImage($image_name);
    try{
        if($check==0)
        {
            $result=$use->add();
        if($result){
            if($image_name != ""){
            
                move_uploaded_file($image_temp,'images/'.$image_name); //move(from,to)
            }
            // $login='login.php?id='.$_POST['id'];
            header("location: login.php");

        }
        }
        
        
    }
    catch(Exception $e){
        echo $e->getMessage();
    }  
}

?>
<style>
    .error{
        color:red;
    }
    </style>
<center>
 <div>
     <h1>Add users</h1>
    <form method="post"  enctype="multipart/form-data">
        <!-- <div>
            <input type="name" name="id" placeholder="ID" class="form-control">
        </div> -->
        <div>
            <input type="name" name="name" placeholder="name" class="form-control" value=<?php  if(isset($_POST['name']))echo $_POST['name']?>><br>
            <span class="error"> <?php echo $nameErr; ?></span>
        </div>
        <div>
            <input type="email" name="email" placeholder="email" class="form-control" value=<?php if(isset($_POST['email']))echo $_POST['email']?>><br>
            <span class="error"> <?php echo $emailErr; ?></span>
        </div>
        <div>
            <input type="password" name="password" placeholder="password" class="form-control" value=<?php if(isset($_POST['password']))echo $_POST['password']?> ><br>
            <span class="error"> <?php echo $passErr; ?></span>
        </div>
        <div>
            <input type="text" name="credit_no" placeholder="credit number" class="form-control" value=<?php if(isset($_POST['credit_no']))echo $_POST['credit_no']?> ><br>
            <span class="error"> <?php echo $creditErr; ?></span>
        </div>
        <div>
            <input type="file" name="image" class="form-control">
        </div>
        <div>
            <input type="submit" name="add" value="add" class="form-control">
        </div>
    </form>
    </div>

</center>
