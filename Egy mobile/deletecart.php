<?php
require 'carts.php';
session_start();
$carts= new carts();
$result = $carts->delete_cart('user_id',$_SESSION['user_id']);
    header("location: cart.php");
?>