<?php
//session_start();
require 'nav.php';
require 'carts.php';
//$id = $_POST["addtocart"];
$product1 = new database();
$result2 = $product1->select('carts,users,mobiles', "carts.user_id=users.user_id and carts.mobiles_id=mobiles.mobiles_id");
$data2 = $result2->fetchAll(PDO::FETCH_ASSOC);
$buy = 1;
if (isset($_POST["addtocart"])) {
    foreach ($data2 as $item) {
        if ($_SESSION['user_id'] == $item['user_id']) {
            if ($item['mobiles_id'] == $_POST["addtocart"]) {
                $buy = 0;
            }
        }
        if ($_SESSION['user_id'] != $item['user_id']) {
            $buy = 1;
        }
    }
    if ($buy == 1) {
        $cart = new carts();
        $cart->setmobiles_id($_POST["addtocart"]);
        $cart->setuser_id($_SESSION['user_id']);
        $cart->setcart_quantity($_POST["quantity"]);
        $result = $cart->add();
    }
}
//$product1 = new database();
$result1 = $product1->select(' carts,users,mobiles ', "carts.user_id=users.user_id and carts.mobiles_id=mobiles.mobiles_id");
$data1 = $result1->fetchAll(PDO::FETCH_ASSOC);
$sum = 0;

// data base cart

?>
<!-- ****** Cart Area Start ****** -->
<div class="cart_area section_padding_100 clearfix">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="cart-table clearfix">
                    <table class="table table-responsive">
                        <thead>
                            <tr>
                                <th>Product</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                                <th>Remove</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($data1 as $item) {

                                if ($_SESSION['user_id'] == $item['user_id']) {
                            ?>
                                    <tr>
                                        <td class="cart_product_img d-flex align-items-center">
                                            <a href="#"><img src="img/images/<?php echo $item['mobiles_image'] ?> " alt="Product"></a>
                                            <h6><?php echo $item['mobiles_name'] ?></h6>
                                        </td>
                                        <td class="price"><span>$<?php echo $item['mobiles_price'] ?></span></td>
                                        <td class="qty">
                                            <div class="quantity">
                                                <input type="text" class="qty-text" id="qty" name="quantity" value="<?php echo $item['cart_quantity']  ?>" readonly>
                                            </div>
                                        </td>
                                        <?php
                                        $temp=$item['mobiles_price'];
                                        $temp = floatval($temp);
                                        $temp *= $item['cart_quantity'];
                                        $sum += $temp;
                                        
                                        ?>
                                        <td class="total_price"><span>$<?php  echo $item['mobiles_price']*$item['cart_quantity'] ?></span></td>
                                        <td>
                                        <div class="update-checkout w-50 text-right">
                                            <?php
                                            $cart_remove= new database();
                                            $stm=$item['mobiles_id'];
                                            $cart_remove_data1 = $cart_remove->select("carts","mobiles_id=$stm");
                                            $cart_remove_data=$cart_remove_data1->fetch(PDO::FETCH_ASSOC);
                                           
                                            ?>
                                                <a href="remove_item_cart.php?<?php echo $cart_remove_data['cart_id'] ;?>"> Remove</a>
                                        </div>
                                        </td>

                                    </tr>
                            <?php }
                            } ?>

                        </tbody>
                    </table>
                </div>
                <div class="cart-footer d-flex mt-30">
                    <div class="back-to-shop w-50">
                        <a href="shop.php?*">Continue shooping</a>
                    </div>
                    <div class="update-checkout w-50 text-right">
                        <a href="deletecart.php">clear cart</a>
                    </div>
                </div>

            </div>
        </div>
        <div class="row">
            <div class="col-12 col-lg-">
                <div class="cart-total-area mt-70">
                    <div class="cart-page-heading">
                        <h5>Cart total</h5>
                        <p>Final info</p>
                    </div>
                    <ul class="cart-total-chart">
                        <li><span>Subtotal</span> <span><?php echo $sum ?>$</span></li>
                        <li><span>Shipping</span> <span>Free</span></li>
                        <li><span><strong>Total</strong></span><span><strong><?php echo $sum ?>$</strong></span></li>
                    </ul>
                    <a href="checkout.php" class="btn karl-checkout-btn">Proceed to checkout</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ****** Cart Area End ****** -->

<?php require 'footer.php' ?>