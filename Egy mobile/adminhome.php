<!-- all database -->
<?php require 'dashbord.php';
?>
        <!-- ****** Welcome Slides Area Start ****** -->
       
        <!-- ****** New Arrivals Area Start ****** -->
        <section class="new_arrivals_area section_padding_100_0 clearfix">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="section_heading text-center">
                            <div  style="font-size: 40px;">Category</div>
                            <div >
                            <form action="AdminCreateCategory.php">
                                <input class="button" type="submit" value="create" name="create" class="create" >
                             </form>
                            </div>
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
                            <img src="img/images/<?php echo $mobil['category_image'];?>" alt="" >
                            <div class="product-quicview">
                                <a href="adminhome2.php?<?php echo $mobil['category_id'];?>"><i class="ti-plus"></i></a>
                            </div>
                        </div>
                        <!-- Product Description 
                    -->
                        <div class="product-description" >
                            <p style="font-size: 30px;"><?php echo $mobil['category_name']?>
                            <div style="display: inline-block;">
                            <form method="post" enctype="multipart/form-data" action="adminedit.php?<?php echo $mobil['category_id'];?>" >
                                <input class="button" type="submit" value="edit" name="<?php echo $mobil['category_id'];?>"  style="width: 172.5px;">
                             </form>
                    </div>
                    <div style="display: inline-block;">
                             <form method="post" enctype="multipart/form-data" action="delete_category_temp.php?<?php echo $mobil['category_id'];?>" >
                                <input class="button" type="submit" value="delete" name="delete"  style=" width: 172.5px; ">
                             </form>
                    </div>
                            <!-- Add to Cart -->
                        </div>
                    </div>
                   <?php  }?>
                </div>
            </div>
        </section>
        <form method="post" enctype="multipart/form-data" action="logout.php"class="back"  >
                                <input class="button" type="submit" value="logout" class="back" name="logout" style="background-color:black;width: 130px; border-radius: 20px;height: 70px;" >
                             </form>
        
                             <style>
            .back{
                position: -webkit-sticky;
                position: sticky;
                bottom: 0;
            }
            </style>
        <?php require 'footer.php'?>