<?php
require 'carts.php';
$carts= new carts();
$result = $carts->delete_cart('cart_id',$_SERVER['QUERY_STRING']);

if($result)
    header("location: cart.php");
?>

