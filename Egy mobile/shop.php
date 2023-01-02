<?php require 'nav.php';

$id = $_SERVER["QUERY_STRING"];
$product = new database();
$result = $product->select('mobiles', "category_id='$id'");
$data_mobil = $result->fetchall(PDO::FETCH_ASSOC);


?>
  <section class="welcome_area">
    
    
                <!-- Single Slide Start -->
                <?php if ($id!="*"){ ?>
                <?php foreach ($data_categ as $category) { ?>
                    <?php if ($category['category_id']==$id) {
                        
                        ?>
                <div class="single_slide height-800 bg-img background-overlay" style="background-image: url(img/images/<?php echo $category['category_image'];  ?>)  ; background-position: center; ">
                 <?php }}}else {?>
                    <div class="welcome_slides owl-carousel">    
                    <?php foreach ($data_categ as $category) { ?>
                        
                        <div class="single_slide height-800 bg-img background-overlay" style="background-image: url(img/images/<?php echo $category['category_image'];  ?>)  ; background-position: center; ">
                            <div class="container h-100">
                                <div class="row h-100 align-items-center">
                                    <div class="col-12">
                                        <div class="welcome_slide_text">
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                </div>
                      
                <?php }  ?>
                </div>
                <?php }  ?>
                 
                      
            
        </section>
<section class="shop_grid_area section_padding_100">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-4 col-lg-3">
                <div class="shop_sidebar_area">

                    <div class="widget catagory mb-50">
                        <!--  Side Nav  -->
                        <div class="nav-side-menu" style="position: relative;">
                            <h6 class="mb-0">Catagories</h6>
                            <div class="menu-list">
                                <ul id="menu-content2" class="menu-content collapse out">
                                    <!-- Single Item -->
                                    <li data-toggle="collapse" data-target="#man2" class="collapsed">
                                        <a href="shop.php?*">All</a>
                                    </li>
                                    <?php foreach ($data_categ as $category) { ?>
                                        <li data-toggle="collapse" data-target="#man2" class="collapsed">
                                            
                                            <a href="shop.php?<?php echo $category['category_id'] ?>"><?php echo $category['category_name'] ?></a>
                                        </li>
                                    <?php } ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
            <div class="col-12 col-md-8 col-lg-9">
                <div class="shop_grid_product_area">
                    <div class="row">
                        <?php if ($id != "*") { ?>
                            <?php foreach ($data_mobil as $clo) {
                                
                                if($clo['mobiles_quantity']>0){
                                
                                ?>

                                <!-- Single gallery Item -->
                                <div class="col-12 col-sm-6 col-lg-4 single_gallery_item wow fadeInUpBig" data-wow-delay="0.2s">
                                    <!-- Product Image -->
                                    <div class="product-img">
                                        <img src="img/images/<?php echo $clo['mobiles_image']; ?>" alt="">
                                        <div class="product-quicview">
                                            <a href="product-details.php?<?php echo $clo['mobiles_id']; ?>"><i class="ti-plus"></i></a>
                                        </div>
                                    </div>
                                    <!-- Product Description -->
                                    <div class="product-description">
                                        <h4 class="product-price">$<?php echo $clo['mobiles_price']; ?></h4>
                                        <p><?php echo $clo['mobiles_name']; ?></p>
                                        <!-- Add to Cart -->

                                        <form action="cart.php" class="cart clearfix mb-50 d-flex" method="post">
                                            <div class="quantity">
                                                <input type="hidden" id="qty2" class="qty-text" name="quantity" value="1">
                                            </div>
                                            <button type="submit" name="addtocart" id="s" value="<?php echo $clo['mobiles_id'] ?>" class="btn cart-submit d-block">Add to cart</button>
                                        </form>
                                       
                                    </div>
                                </div>
                            <?php }
                            }
                        } else { ?>
                            <?php foreach ($data as $mobil) { ?>
                                <!-- Single gallery Item -->
                                <?php if($mobil['mobiles_quantity']>0 ){ ?>
                                <div class="col-12 col-sm-6 col-lg-4 single_gallery_item wow fadeInUpBig" data-wow-delay="0.2s">
                                    <!-- Product Image -->
                                    <div class="product-img">
                                        <img src="img/images/<?php echo $mobil['mobiles_image'] ?>" style="width=500px,hight=500px" alt="">
                                        <div class="product-quicview">
                                            <a href="product-details.php?<?php echo $mobil['mobiles_id'] ?>"><i class="ti-plus"></i></a>
                                        </div>
                                    </div>
                                    <!-- Product Description -->
                                    <div class="product-description">
                                        <h4 class="product-price">$<?php echo $mobil['mobiles_price'] ?></h4>
                                        <p><?php echo $mobil['mobiles_name'] ?></p>
                                        <!-- Add to Cart -->
                                        <form action="cart.php" class="cart clearfix mb-50 d-flex" method="post" id="ad">
                                            <div class="quantity">
                                                <input type="hidden" id="qty2" class="qty-text" name="quantity" value="1">
                                            </div>
                                            <button type="submit" name="addtocart" value="<?php echo $mobil['mobiles_id'] ?>" class="btn cart-submit d-block">Add to cart</button>
                                        </form>
                                    </div>
                                </div>
                        <?php  }}
                        } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php require 'footer.php' ?>