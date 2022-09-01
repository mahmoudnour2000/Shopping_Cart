<?php

include('auth.php');
require 'nav.php';

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <!-- css file style -->
    <!-- <link rel="stylesheet" href="home.css"> -->

    <!-- Bootstrap cdn -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

    <!-- owl cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"
        integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css"
        integrity="sha512-OTcub78R3msOCtY3Tc6FzeDJ8N9qvQn1Ph49ou13xgA9VsH9+LRxoFU6EqLhW4+PKRfU+/HReXmSZXHEkpYoOA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- font Awesome icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css"
        integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.4.0/mdb.min.css" rel="stylesheet" />

    <title>home</title>
</head>

<body>
    <!-- Header start -->

    <!-- Header end -->



    <!--- Top banner starte here --->

    <div class="container">

        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="img/GT-Neo2.jpg" class="d-block w-100 " alt="...">
                </div>
                <div class="carousel-item">
                    <img src="img/Nova-Y70.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="img/S1.jpg" class="d-block w-100" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>


        <div class="row align-items-center">
            <div class="col-lg-12 py-5">
                <div class="card px-3">
                    <div class="card-body">
                        <h3>Limited offer !! Hurry and Order yours today.</h3>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- Top banner ends here. ---->

    <!--- Side section start here.. --->


    <div class="container-fluid">
        <div class="row">
            <div class="col-xm-12 col-sm-12 col-md-5 col-lg-3 py-5 px-5">

                <div class="card align-itmes-center category1">

                </div>
                <div class="row">
                    <div class="card align-items-center mb-4">
                        <div class="card-body">
                            <div class="py-3">
                                <h2>Categories</h2>
                                <p>Mobiles</p>
                                <p>Tablets</p>
                                <p>Laptops</p>
                                <p>Ipads</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Side Section ends here. --->


            <!-- search -->

            <div class="col-xm-12 col-sm-12 col-md-6 col-lg-9 py-5">

                <div class="row">
                    <form action="" class="d-flex py-3">
                        <input type="text" class="form-control" placeholder="Type here to search">
                        <button type="submit" class="btn btn-success"> Submit</button>
                    </form>

                    <!--End search -->

                    <!-- the products section --->

                    <div class="card section-intro px-4">

                        <div class="card-body">
                            <div class="card-header  items-header">
                                <h4><b>Featured Items</b></h4>
                            </div>
                            <div class=" row py-3 items">

                                <?php 
        
        include 'log&register/config.php';
        $query = "SELECT * FROM products_tbl";
            $result = mysqli_query($conn, $query);

            if($result):

                if(mysqli_num_rows ($result) > 0):
                    while ($product = mysqli_fetch_assoc($result)):


        ?>

                                <div class="col-lg-4">
                                    <form action="checkout.php?action=add&id=<?php echo $product ['id'];?>"
                                        method="post" enctype="multipart/form-data">
                                        <div class="card shadow mb-4">
                                            <div class="card-body">
                                                <div>
                                                    <img src="<?php echo $product['product_img'];?>"
                                                        class="img-fluid px-5 prdimg" alt="">
                                                </div>
                                                <h6 class="secondary"><?php echo $product['product_name'];?></h6>
                                                <h4 class="secondary"><?php echo $product['description'];?></h4>
                                                <h5 class="secondary">
                                                    <small><s>EGP<?php echo $product['old_price'];?></s></small><br>
                                                    <span
                                                        class="price"><b>EGP<?php echo $product['new_price'];?></b></span>
                                                </h5>
                                                <input type="number" class="form-control mb-3" name="quantity"
                                                    value="1">
                                                <input type="hidden" name="id" value="<?php echo $product['id'];?>">
                                                <input type="hidden" name="product_img"
                                                    value="<?php echo $product['product_img'];?>">
                                                <input type="hidden" name="product_name"
                                                    value="<?php echo $product['product_name'];?>">
                                                <input type="hidden" name="description"
                                                    value="<?php echo $product['description'];?>">
                                                <input type="hidden" name="old_price"
                                                    value="<?php echo $product['old_price'];?>">
                                                <input type="hidden" name="new_price"
                                                    value="<?php echo $product['old_price'];?>">
                                                <button type="submit" name="add_to_cart" class="btn btn-warning">
                                                    <i class="fa fa-shopping-cart"></i>
                                                    Add to cart
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                                <?php 
    endwhile;
endif;
endif;
?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Products section ends here.. --->

            <!-- footer start -->
            <?php

require "footer.php";

?>

            <!-- footer End -->


            <!-- MDB -->
            <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.4.0/mdb.min.js">
            </script>
            <!-- Font Awesome scripting -->
            <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
            <!-- Bootstrap scripting -->
            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js"
                integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk"
                crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js"
                integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK"
                crossorigin="anonymous"></script>
</body>

</html>