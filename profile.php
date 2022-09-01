<?php 

require "auth.php";
include ('nav.php');
            $product_ids = array();
            //session_destroy();
            
            // check if add to cart button has been clicked
            if (isset($_POST['add_to_cart'])) {
                if (isset($_SESSION['login_register'])) {
                    # keep track of shopping cart product
                    $count = count ($_SESSION['login_register']);
                    $products_ids = array_column($_SESSION['login_register'], 'id');
                    if (!in_array(filter_input(INPUT_GET, 'id'), $product_ids)) {
                            $_SESSION['login_register'][$count] = array(

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
                                            $_SESSION['login_register'][$i]['quantity'] += filter_input(INPUT_POST, 'quantity');
                                    }
                            }
                    }
                }else {
                    # if shopping cart doesn't exist, create first product with array key
                    $_SESSION['login_register'][0] = array(
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
                    foreach ($_SESSION['login_register'] as $key => $product) {
                        if ($product['id'] == filter_input(INPUT_GET, 'id')) {
                            # remove the item
                            unset($_SESSION['login_register'][$key]);
                        }
                    }
                    // reset session array keys so they match with product ids number array
                    $_SESSION['login_register'] =array_values($_SESSION['login_register']);
            }

            //check out

if (filter_input(INPUT_GET, 'action')  == 'checkout') {
    // go through the products to check a product that matches the GET ID
    foreach ($_SESSION['login_register'] as $key => $product) {
        # remove the iitem
        unset($_SESSION['login_register'] [$key]);
        
    }
     // reset session array keys so they match with product ids number array
    $_SESSION['login_register'] =array_values($_SESSION['login_register']);
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

    <title>Shopping Cart :: Sales Order</title>

</head>
</body>
<!--- Checkout products section ends here --->
<div class="container-fluid md-5">
    <div class="row px-5 py-2">
        <table class="table v-middle">
            <thead>
                <tr class="bg-dark text-white">

                    <th class="border-top-0">Order Name</th>
                    <th class="border-top-0">Total Price</th>
                    <th class="border-top-0">Remarks</th>
                </tr>
            </thead>
            <?php
                if (!empty ($_SESSION[' login_register'])):
                    $total = 0 ;
                    foreach ($_SESSION[' login_register'] as $key => $product):
                        $total = $total + ($product['quantity'] * $product['new_price']);
            ?>
            <tbody style="color:white">
                <td><?php echo $product ['product_name'];?> </td>
                <td> <?php echo $total?></td>
                <td> </td>

            </tbody>

            <?php 
                    endforeach;
                ?>
            <?php endif;  ?>
        </table>
        <a href="home.php" class="btn btn-danger btn-block">Continue Shopping</a>

    </div>
</div>
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