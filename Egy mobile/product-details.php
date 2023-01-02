<?php require 'nav.php' ?>
<?php
$id = $_SERVER["QUERY_STRING"];
$product = new database();
$result = $product->select('mobiles', "mobiles_id='$id'");
$data = $result->fetch(PDO::FETCH_ASSOC);
?>
<!-- <<<<<<<<<<<<<<<<<<<< Breadcumb Area Start <<<<<<<<<<<<<<<<<<<< -->
<div class="breadcumb_area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <!-- btn -->
                <a href="index.php" class="backToHome d-block"><i class="fa fa-angle-double-left"></i> Back to Category</a>
            </div>
        </div>
    </div>
</div>
<!-- <<<<<<<<<<<<<<<<<<<< Breadcumb Area End <<<<<<<<<<<<<<<<<<<< -->

<!-- <<<<<<<<<<<<<<<<<<<< Single Product Details Area Start >>>>>>>>>>>>>>>>>>>>>>>>> -->
<section class="single_product_details_area section_padding_0_100">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6">
                <div class="single_product_thumb">
                    <div id="product_details_slider" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <!-- <a class="gallery_img" href="img/product-img/product-9.jpg"> -->
                                <img class="d-block w-100" src="img/images/<?php echo $data['mobiles_image'] ?>" alt="First slide">
                                </a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="single_product_desc">
                    <h4 class="title"><a href="#"><?php echo $data['mobiles_name'] ?></a></h4>
                    <h4 class="price">price : <?php echo $data['mobiles_price']; ?> $</h4>
                    <?php if ($data['mobiles_quantity'] != 0) { ?>
                        <p class="available">Available: <span class="text-muted">In Stock</span></p>
                    <?php } else { ?>
                        <p class="available">Unavailable: <span class="text-muted">Out of Stock</span></p>   <!-- if there any problem with quantaty -->
                    <?php } ?>
                   
                    <!-- Add to Cart Form -->

                    <form action="cart.php" class="cart clearfix mb-50 d-flex" method="post">
                        <div class="quantity">
                            <script>
                                function updateTextInput(val) {
                                    document.getElementById('qty').value = val;
                                }
                            </script>
                            <label>quantity:</label>
                            <input type="text" id="qty" min="1" value="1" style="width:25px" class="widget-title" readonly><br>
                            <input type="range" id="qty2" class="qty-text" step="1" min="1" max="<?php echo $data['mobiles_quantity'] ?>" name="quantity" value="1" onchange="updateTextInput(this.value);">
                        </div>
                        <button type="submit" name="addtocart" id="s" value="<?php echo $data['mobiles_id'] ?>" class="btn cart-submit d-block">Add to cart</button>
                    </form>
                    <!-- <script>
                        var val2 = document.getElementById('qty').value;
                        var btn = document.getElementById('s')
                        btn.onclick = function() {
                            if (val2 <= 0) {
                                document.write("kos om hos")
                                button.disabled = true;
                            } else{
                                button.disabled = false;
                                <?php 
                                header("location: cart.php");
                                ?>
                            } 

                        };
                    </script> -->

                    <div id="accordion" role="tablist">
                        <div class="card">
                            <div class="card-header" role="tab" id="headingOne">
                                <h6 class="mb-0">
                                    <a data-toggle="collapse" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">Information</a>
                                </h6>
                            </div>
                            <div id="collapseOne" class="collapse show" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordion">
                                <div class="card-body">
                                    <p><?php echo $data['mobiles_description'] ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    -
                </div>
            </div>
        </div>
    </div>
</section>
<!-- <<<<<<<<<<<<<<<<<<<< Single Product Details Area End >>>>>>>>>>>>>>>>>>>>>>>>> -->
<?php require 'footer.php' ?>