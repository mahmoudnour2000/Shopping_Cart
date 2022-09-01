<?php 
require "auth.php";
include ('nav.php');
            // session_start();
            $product_ids = array();
            //session_destroy();

            // check if add to cart button has been clicked
            if (isset($_POST['add_to_cart'])) {
                if (isset($_SESSION[' login_register'])) {
                    # keep track of shopping cart product
                    $count = count ($_SESSION[' login_register']);
                    $products_ids = array_column($_SESSION[' login_register'], 'id');
                    if (!in_array(filter_input(INPUT_GET, 'id'), $product_ids)) {
                            $_SESSION[' login_register'][$count] = array(

                                'id' => filter_input(INPUT_GET, 'id'),
                                'product_name' => filter_input(INPUT_POST, 'product_name'),
                                'description' => filter_input(INPUT_POST, 'description'),
                                'new_price' => filter_input(INPUT_POST, 'new_price'),
                                'quantity' => filter_input(INPUT_POST, 'quantity'),
                                'old_price' => filter_input(INPUT_POST, 'old_price'),
                                'product_img' => filter_input(INPUT_POST, 'product_img')

                            );
                    }else {
                            for ($i = 0 ; $i < count ($product_ids); $i++){
                                    if ($product_ids[$i]  == filter_input(INPUT_GET, 'id')) {
                                            $_SESSION[' login_register'][$i]['quantity'] += filter_input(INPUT_POST, 'quantity');
                                    }
                            }
                    }
                }else {
                    # if shopping cart doesn't exist, create first product with array key
                    $_SESSION[' login_register'][0] = array(
                    'id' => filter_input(INPUT_GET, 'id'),
                    'product_name' => filter_input(INPUT_POST, 'product_name'),
                    'description' => filter_input(INPUT_POST, 'description'),
                    'new_price' => filter_input(INPUT_POST, 'new_price'),
                    'quantity' => filter_input(INPUT_POST, 'quantity'),
                    'old_price' => filter_input(INPUT_POST, 'old_price'),
                    'product_img' => filter_input(INPUT_POST, 'product_img')


                    );
                }
            }
            # delete item from the cart
            if (filter_input(INPUT_GET, 'action') == 'delete') {
                # go through the products to check a product that matches the Get Id
                    foreach ($_SESSION[' login_register'] as $key => $product) {
                        if ($product['id'] == filter_input(INPUT_GET, 'id')) {
                            # remove the item
                            unset($_SESSION[' login_register'][$key]);
                        }
                    }
                    // reset session array keys so they match with product ids number array
                    $_SESSION[' login_register'] =array_values($_SESSION[' login_register']);
            }

            //check out

if (filter_input(INPUT_GET, 'action')  == 'checkout') {
    // go through the products to check a product that matches the GET ID
    foreach ($_SESSION[' login_register'] as $key => $product) {
        # remove the iitem
        unset($_SESSION[' login_register'] [$key]);
        
    }
     // reset session array keys so they match with product ids number array
    $_SESSION[' login_register'] =array_values($_SESSION[' login_register']);
}

           // pre_r ($_SESSION);

            function pre_r($array){
            echo '<pre>';
            print_r($array);
            echo '<pre>';
            }

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


    <title>shopping cart :: checkout</title>
</head>

<body>

    <!--- Navigation Start here ---->
    <?php

?>
    <!--- Navigation Ends here --->

    <!--- Checkout products section ends here --->
    <div class="container-fluid md-5">

        <div class="row px-5 py-2">

            <br>
            <hr>
            <div class="col-md-7">
                <a href="home.php" class="btn btn-success btn-block">Continue Shopping</a>
                <h4 style="color: white">My Cart</h4>
                <?php
                if (!empty ($_SESSION[' login_register'])):
                    $total = 0 ;
                    foreach ($_SESSION[' login_register'] as $key => $product):
                    
            ?>

                <div class="card px-3 mb-5">

                    <div class="card-body">
                        <div class="row">

                            <!--- Product image --->
                            <div class="col-md-4">
                                <img src="<?php echo $product ['product_img'];?>" class="img-fluid px-5 prdimg "
                                    alt="product image">
                            </div>
                            <div class="col-md-4">
                                <h4><?php echo $product ['product_name'];?></h4>
                                <h6><b>Description</b><?php echo $product ['description'];?></h6>
                                <p></p>
                                <h5 class="secondary"><small><s><?php echo $product ['old_price'];?>/-</s></small>
                                    <span class="price"> <b><?php echo $product ['new_price'];?>/-</b></span>
                                </h5>
                            </div>

                            <div class="col-md-4 py-5 px-5">
                                <a href="checkout.php?action=delete&id=<?php echo $product ['id'];?>">
                                    <div class="btn btn-danger">Remove</div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php 
                    $total = $total + ($product['quantity'] * $product['new_price']);
                    endforeach;
                ?>
                <?php endif;  ?>
            </div>
            <!--- Checkout products section ends here --->
            <!--- Total Price section --->
            <?php 
            if(!empty ($_SESSION[' login_register'])):
                if(count($_SESSION[' login_register']) > 0);
        ?>

            <div class="col-md-5 py-5 px5">

                <div class="card">

                    <div class="card-body">
                        <b>Price Details</b>
                        <hr>
                        <div class="row">
                            <div class="col-md-5">
                                <h5>Price ( <?php echo $product['quantity']?> items)</h5>
                            </div>
                            <div class="col-md-5">
                                <h5 class="float-right">
                                    <?php echo $total;?>
                                </h5>
                            </div>
                            <!--- Price section --->
                            <!--- Total price section --->
                            <div class="row">
                                <div class="col-md-5 py-4">
                                    <h5><b>Amount Payable</b></h5>
                                </div>
                                <div class="col-md-5 py-4">
                                    <h5 class="float-right"><b><?php echo $total;?></b></h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <a href="sales_order.php">
                    <div class="btn btn-warning btn-block px-5">Continue Checkout</div>
                </a>
            </div>
        </div>



        <?php 
                        endif;
                ?>
        <!--- Total Price section ends here --->
    </div>
    </div>
    <hr>

    <!-- footer start -->
    <?php

include('footer.php')

?>

    <!-- footer End -->

    <!-- Font Awesome scripting -->
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <!-- Bootstrap scripting -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js"
        integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js"
        integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous">
    </script>
</body>

</html>