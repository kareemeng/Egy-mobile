<?php require 'nav.php'?>
<!-- category database -->

        <!-- ****** Welcome Slides Area Start ****** -->
        <section class="welcome_area">
            <div class="welcome_slides owl-carousel">
                <!-- Single Slide Start -->
                <div class="single_slide height-800 bg-img background-overlay" style="background-image: url(img/bg-img/mobiles1.png);">
                    <div class="container h-100">
                        <div class="row h-100 align-items-center">
                            <div class="col-12">
                                <div class="welcome_slide_text">
                                    <h6 data-animation="bounceInDown" data-delay="0" data-duration="500ms">* Only today we offer free shipping</h6>
                                    <h2 data-animation="fadeInUp" data-delay="500ms" data-duration="500ms">Welcome in Mobiles World</h2>
                                    <a href="shop.php?*" class="btn karl-btn" data-animation="fadeInUp" data-delay="1s" data-duration="500ms">Shop Now</a>
                                </div>
                            </div>
                        </div> 
                    </div>
                </div>
                
                <!-- Single Slide Start -->
                <div class="single_slide height-800 bg-img background-overlay" style="background-image: url(img/bg-img/soon.jpg);">
                    <div class="container h-100">
                        <div class="row h-100 align-items-center">
                            <div class="col-12">
                                <div class="welcome_slide_text">
                                    <h6 data-animation="fadeInDown" data-delay="0" data-duration="500ms">* Only today we offer free shipping</h6>
                                    <h2 data-animation="fadeInUp" data-delay="500ms" data-duration="500ms">POCO X3 Pro</h2>
                                    <h3 data-animation="fadeInUp" data-delay="500ms" style="color: white;" data-duration="500ms" >Coming soon</h3>
                                    <!-- <a href="#" class="btn karl-btn" data-animation="fadeInLeftBig" data-delay="1s" data-duration="500ms">Check Collection</a> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </section>
        <!-- ****** New Arrivals Area Start ****** -->
        <section class="new_arrivals_area section_padding_100_0 clearfix">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="section_heading text-center">
                            <h2>Category</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row karl-new-arrivals">
<!-- ======================================== divs ============================================================================= -->
                    <!-- Single gallery Item Start -->
                    <?php foreach($data_categ as $mobil){?>
                    <div class="col-12 col-sm-6 col-md-4 single_gallery_item women wow fadeInUpBig" data-wow-delay="0.2s">
                        <!-- Product Image -->
                        <div class="product-img">
                            <img src="img/images/<?php echo $mobil['category_image'];?>" alt="">
                            <div class="product-quicview">
                                <a href="shop.php?<?php echo $mobil['category_id'];?>"><i class="ti-plus"></i></a>
                            </div>
                        </div>
                        <!-- Product Description -->
                        <div class="product-description">
                            <p><?php echo $mobil['category_name']?>
                            <!-- Add to Cart -->
                        </div>
                    </div>
                   <?php  }?>
                </div>
            </div>
        </section>
        <?php require 'footer.php'?>