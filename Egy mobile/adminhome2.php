<!-- all database -->
<?php require 'dashbord.php';
$id = $_SERVER["QUERY_STRING"];
$product = new database();
$result = $product->select('mobiles', "category_id='$id'");
$data_mobil = $result->fetchall(PDO::FETCH_ASSOC);

?>
        <!-- ****** Welcome Slides Area Start ****** -->
       
        <!-- ****** New Arrivals Area Start ****** -->
        <section class="new_arrivals_area section_padding_100_0 clearfix">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="section_heading text-center">
                            <div  style="font-size: 40px;">The mobiles</div>
                            <div >
                                    <form method="post" enctype="multipart/form-data" action="admincreatemobil.php?<?php echo $id ?>">
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
                    <?php foreach($data_mobil as $mobil){?>
                    <div class="col-12 col-sm-6 col-md-4 single_gallery_item women wow fadeInUpBig" data-wow-delay="0.2s">
                        <!-- Product Image -->
                        <div class="product-img">
                            <img src="img/images/<?php echo $mobil['mobiles_image'];?>" alt="" >
                            
                        </div>
                        <!-- Product Description -->
                        <div class="product-description" >
                            <p style="font-size: 30px;"><?php echo $mobil['mobiles_name']?>
                            <div style="display: inline-block;">
                            <form method="post" enctype="multipart/form-data" action="adminedit2.php?<?php echo $mobil['mobiles_id'];?>?<?php echo $id;?>" >
                                <input class="button" type="submit" value="edit" name="<?php echo $mobil['mobiles_id'];?>"  style="width: 172.5px;">
                             </form>
                    </div>
                    <div style="display: inline-block;">
                             <form method="post" enctype="multipart/form-data" action="delete_mobil_temp.php?<?php echo $mobil['mobiles_id'];?>?<?php echo $id;?>" >
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
        <form method="post" enctype="multipart/form-data" action="adminhome.php"class="back"  >
                                <input class="button" type="submit" value="back" class="back" name="back" style="background-color:black;width: 100px; border-radius: 20px;height: 70px;" >
                             </form>
        <?php require 'footer.php'?>
        <style>
            .back{
                position: -webkit-sticky;
                position: sticky;
                bottom: 0;
            }
            </style>