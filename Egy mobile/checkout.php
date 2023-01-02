<?php
session_start();
require 'database.php';
$product = new database();
$result = $product->select('carts,users,mobiles', "carts.user_id={$_SESSION['user_id']} and carts.mobiles_id=mobiles.mobiles_id");
$data = $result->fetchAll(PDO::FETCH_ASSOC);
foreach ($data as $item) {
    $item['mobiles_quantity'] -= $item['cart_quantity'];
    $product->run("UPDATE mobiles SET mobiles_quantity='{$item['mobiles_quantity']} ' WHERE mobiles_id={$item['mobiles_id']}");
}
header("location:deletecart.php");
?>