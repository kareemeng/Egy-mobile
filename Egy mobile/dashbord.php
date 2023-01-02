<!-- all database -->
                                        <!-- ADMIN -->

<?php


session_start();
if(!isset($_SESSION['user_id']))
header('location: login.php');




require 'database.php';
$mobil = new database();
$result = $mobil->select('mobiles');
$data = $result->fetchall(PDO::FETCH_ASSOC);




$categ = new database();
$result1 = $categ->select('categories');
$data_categ = $result1->fetchall(PDO::FETCH_ASSOC);




// $user = new database();
// $result2 = $user->select('users', "user_id={$_SESSION['user_id']}");
// $user_data = $result2->fetch(PDO::FETCH_ASSOC);




// $product = new database();
// $result = $product->select('carts,users,mobiles', "carts.user_id=users.user_id and carts.mobiles_id=mobiles.mobiles_id");
// $product_data = $result->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title  -->
    <title>EGY MOBILE ADMINISTRATOR</title>

    <!-- Favicon  -->
    <link rel="icon" href="img/core-img/favicon.ico">

    <!-- Core Style CSS -->
    <link rel="stylesheet" href="css/core-style.css">
    <link rel="stylesheet" href="style.css">

    <!-- Responsive CSS -->
    <link href="css/responsive.css" rel="stylesheet">

</head>
<style>
    .UA {
        width: 70px;
        height: 70px;
        margin-top: 15px;
        margin-left: 7px;
        border-radius: 50%;
        display: inline-flex;
    }

    .h7 {
        margin-left: 14px;
        margin-top: 25px;
    }
    
    
    .button {
  position: relative;
  background-color: #089cff;
  border: none;
  font-size: 28px;
  color: #FFFFFF;
  padding: 20px;
  width: 200px;
  text-align: center;
  transition-duration: 0.4s;
  text-decoration: none;
  overflow: hidden;
  cursor: pointer;
}

.button:after {
  content: "";
  background: #f1f1f1;
  display: block;
  position: absolute;
  padding-top: 300%;
  padding-left: 350%;
  margin-left: -20px !important;
  margin-top: -120%;
  opacity: 0;
  transition: all 0.8s
}

.button:active:after {
  padding: 0;
  margin: 0;
  opacity: 1;
  transition: 0s
}
</style>

<body>
    
    <div id="wrapper">
        <!-- ****** Header Area Start ****** -->
        <header class="header_area">
            <!-- Top Header Area Start -->
            <div class="top_header_area">
                <div class="container h-100">
                    <div class="row h-100 align-items-center justify-content-end">

                        <div class="col-12 col-lg-7">
                            <div class="top_single_area d-flex align-items-center">
                                <!-- Logo Area -->
                                <div class="top_logo" >
                                    
                                    <a href="#"><img src="img/core-img/COVER2.png" alt="" ></a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <section class="top-discount-area d-md-flex align-items-center">
                <!-- Single Discount Area -->
                <div class="single-discount-area">
                    <h5>Free Shipping &amp; Returns</h5>
                    <!-- <h6><a href="shop.php">BUY NOW</a></h6> -->
                </div>
                <!-- Single Discount Area -->
                <div class="single-discount-area">
                    <h5>Huge Collection Of Men mobiles</h5>
                    <!-- <h6>USE CODE: Colorlib</h6> -->
                </div>
                <!-- Single Discount Area -->
                <div class="single-discount-area">
                    <h5>one year warranty</h5>
                    <!-- <h6>USE CODE: Colorlib</h6> -->
                </div>
            </section>

        </header>
      

<?php


?>
      
       
    
       