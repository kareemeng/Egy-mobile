<?php
session_start();
require  'css.php';

$emailErr = "";
$passErr = "";
require 'database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["email"])) {
        $emailErr = "*Email is required";
    } else {
        $email = test_input($_POST["email"]);
    }
    if (empty($_POST["password"])) {
        $passErr = "*password is required";
    } else {
        $password = $_POST["password"];
    }
}
if (isset($_POST['email'])) {
    $email = $_POST['email'];
    $password = sha1($_POST['password']);
    $conn = new database();
    $result = $conn->run("SELECT * FROM users WHERE user_email='$email' AND user_password='$password'");
    $count = $result->rowCount();
    $data = $result->fetch(PDO::FETCH_ASSOC);

    $result2 = $conn->run("SELECT * FROM users");
    $data2 = $result2->fetchAll(PDO::FETCH_ASSOC);
    if ($count > 0) {
        
        if ($data['user_is_admin'] == '1') {
            $emailErr = "";
            $_SESSION['user_id'] = $data['user_id'];
            header("location: adminhome.php"); 
        } else {
            $emailErr = "";
            $_SESSION['user_id'] = $data['user_id'];
            header("location: index.php ");
        }
    } else {
        $po = 0;
        foreach ($data2 as $user) {
            if ($user['user_email'] == $email || $email == "") {
                $po = 1;
                break;
            }
        }
        if ($po == 0) {
            $emailErr = "The e_mail not found";
        }
        // $po2 = 0;
        // foreach ($data2 as $user) {
        //     if ($user['user_password'] == $password || $password == sha1("")) {
        //         $po2 = 1;
        //         break;
        //     }
        // }
        // if ($po2 == 0) {
            $passErr = "The password is wrong";
        //}
    }
}
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>




<center>

    <head>
        <link type="text/css" rel="stylesheet" href="icon/font-awesome-4.7.0/css/font-awesome.min.css">

    </head>
    <div class="container">
        <div class="cover"> </div>
        <div class="form">
            <div class="conent">
                <div class="logo">
                    <i class="fa fa-user-circle-o" aria-hidden="true"></i>
                </div>
                <div class="log-in">
                    <h1>Welcome</h1>
                </div>

                <form method="post">
                    <div class="input">
                        <input type="email" name="email" placeholder="email"><br>
                        <span class="error"> <?php echo $emailErr; ?></span>
                    </div>

                    <div>
                        <input type="password" name="password" placeholder="password"><br>
                        <span class="error"> <?php echo $passErr; ?></span>
                    </div>
                    <div>
                        <input type="submit" name="login" value="login">
                    </div>
                    <div>
                        <a href="registar.php">Don't Have an Account?</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</center>