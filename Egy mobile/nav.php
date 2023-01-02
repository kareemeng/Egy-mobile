<!-- all database -->
                                        <!-- USER -->
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



$user = new database();
$result2 = $user->select('users', "user_id={$_SESSION['user_id']}");
$user_data = $result2->fetch(PDO::FETCH_ASSOC);



$product = new database();
$result = $product->select('carts,users,mobiles', "carts.user_id=users.user_id and carts.mobiles_id=mobiles.mobiles_id");
$product_data = $result->fetchAll(PDO::FETCH_ASSOC);


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
    <title>EGY MOBILE | HOME</title>

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
</style>

<body>
    <div class="catagories-side-menu">
        <!-- Close Icon -->
        <div id="sideMenuClose">
            <i class="ti-close"></i>
        </div>
        <!--  Side Nav  -->
        <div class="nav-side-menu">
            <div class="menu-list">
                <h6>User Account</h6>
                <ul data-toggle="collapse" data-target="#Home" class="collapsed">
                    <img src=" images/<?php echo $user_data['user_image'] ?>" class="UA">
                    <h7 class="h7"><?php echo $user_data['user_name'] ?></h7>
                </ul>
                <h6>Main Menu</h6>
                <ul id="menu-content" class="menu-content collapse out">
                    <!-- Single Item  -->
                    <li data-toggle="collapse" data-target="#Home" class="collapsed">
                        <a href="index.php">Home</a>
                    </li>
                    <li data-toggle="collapse" data-target="#shop" class="collapsed">
                        <a href="shop.php?*">shop</a>
                    </li>
                    <li data-toggle="collapse" data-target="#cart" class="collapsed">
                        <a href="cart.php">cart</a>
                    </li>
                </ul>
                <h6>Categories</h6>
                <ul id="menu-content" class="menu-content collapse out">
                    <!-- Single Item  -->
                    <?php foreach ($data_categ as $category) { 
                        ?>
                        <li data-toggle="collapse" data-target="#<?php echo $category['category_name']; ?>" class="collapsed">
                            <a href="shop.php?<?php echo $category['category_id']; ?>"><?php echo $category['category_name']; ?> </a>
                        </li>
                    <?php } ?>
                </ul>
                <ul>
                    <li data-toggle="collapse" data-target="#Logout" class="collapsed">
                        <a href="logout.php">
                            <h6>Logout</h6>
                        </a>
                    </li>
                </ul>

            </div>
        </div>
    </div>
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
                                <div class="top_logo">
                                    <a href="#"><img src="img/core-img/COVER2.png" alt="" ></a>
                                </div>
                                <!-- Cart & Menu Area -->
                                <div class="header-cart-menu d-flex align-items-center ml-auto">
                                    <!-- Cart Area -->
                                    <?php
                                    $sum = 0; 
                                    $count=0;
                                    foreach ($product_data as $item) if ($_SESSION['user_id'] == $item['user_id']) {$count++;}
                                    ?>

                                    <div class="cart">
                                        <a href="#" id="header-cart-btn" target="_blank"><span class="cart_quantity"><?php echo $count ?></span> <i class="ti-bag"></i> Your Bag </a>
                                        <!-- Cart List Area Start -->
                                        <ul class="cart-list">
                                            <?php
                                            foreach ($product_data as $item) {
                                                if ($_SESSION['user_id'] == $item['user_id']) {
                                            ?>
                                                <li>
                                                    <a href="product-details.php?<?php echo $item['mobiles_id'] ?>" class="image"><img src="img/images/<?php echo $item['mobiles_image'] ?>" class=" cart-thumb" alt="img/images/face.php"></a>
                                                    <div class="cart-item-desc">
                                                        <h6><a href="product-details.php?<?php echo $item['mobiles_id'] ?>"><?php echo $item['mobiles_name'] ?></a></h6>
                                                        <p><?php echo $item['cart_quantity']  ?>x - <span class="price"><?php echo $item['mobiles_price'] ?></span></p>
                                                    </div>
                                                    <?php
                                                    $temp = $item['mobiles_price'];
                                                    $temp = floatval($temp);
                                                    $temp *=  $item['cart_quantity'];
                                                    $sum += $temp;
                                                    ?>
                                                    <td class="total_price"><span>$<?php echo $item['mobiles_price']*$item['cart_quantity'] ?></span></td>
                                                </li>
                                            <?php }
                                            }
                                            ?>
                                            <li class="total">
                                                <span class="pull-right">Total: $<?php echo $sum ?></span>
                                                <a href="cart.php" class="btn btn-sm btn-cart">Cart</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="header-right-side-menu ml-15">
                                        <a href="#" id="sideMenuBtn"><i class="ti-menu" aria-hidden="true"></i></a>
                                    </div>
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
                    <h5>Huge Collection Of mobiles</h5>
                    <!-- <h6>USE CODE: Colorlib</h6> -->
                </div>
                <!-- Single Discount Area -->
                <div class="single-discount-area">
                    <h5>one year warranty</h5>
                    <!-- <h6>USE CODE: Colorlib</h6> -->
                </div>
                
            </section>
        </header>
        <!-- ****** Header Area End ****** -->