<?php
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
            header("location: Home.php");
        } else {
            $emailErr = "";
            $acount = 'acount.php?id=' . $data['user_id'];
            header("location: Home.php");
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
        $po2 = 0;
        foreach ($data2 as $user) {
            if ($user['user_password'] == $password || $password == sha1("")) {
                $po2 = 1;
                break;
            }
        }
        if ($po2 == 0) {
            $passErr = "The password is wrong";
        }
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



<style>
    .container {
        margin-top: 70px;
        border: 2px solid white;
        width: 600px;
        height: 300px;
        background: white;
    }

    form div {
        margin-top: 20px;
    }

    body {
        background-color: lightgray;
    }

    input {
        border: 2px solid gray;
        padding: 10px;
        width: 300px;
        height: 30px;
        border-radius: 20px;
    }

    input[type=submit] {
        background: gray;
        color: #fff;
        font-weight: bold;
        line-height: 10px;
    }

    .error {
        color: red;
    }
</style>
<center>
    <div class="container">
        <h1>login</h1>
        <form method="post">
            <div>
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
        </form>
    </div>
</center>