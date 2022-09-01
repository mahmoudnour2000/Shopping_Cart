<?php

include 'config.php';
error_reporting(0);
session_start();

if(isset($_SESSION['username'])){
    header("Location:../home.php");
    }

if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $password = md5($_POST['password']);

    $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
    $result = mysqli_query($conn , $sql);

    if($result -> num_rows > 0 ){

        $row = mysqli_fetch_assoc($result);
        $_SESSION ['username'] = $row ['username'];
        header("Location: ../home.php");

    }else{
        echo "<script>alert('Email or Password Is Wrong ') </script>" ; 
    }

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- bootstrab CSS style -->
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

    <!-- Website CSS style -->
    <link href="login.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Pacifico&subset=latin-ext,vietnamese" rel="stylesheet">
    <!-- Website Font style -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
    <link rel="stylesheet" href="form1.css">
    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&subset=latin-ext"
        rel="stylesheet">

    <title>Login</title>
</head>

<body>
    <div class="container">
        <div class="col-sm-8 col-sm-offset-2 main">
            <div class="col-sm-6 left-side">
                <h1>Let's go <br>shopping</h1>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur tristique justo eget nibh
                    convallis pharetra.</p>
                <br>
                <p>Visit us on social media</p>
                <a class="fb" href="https://ccp.cloudaccess.net/aff.php?aff=5188" target="_blank"> Facebook</a>
                <a class="tw" href="https://ccp.cloudaccess.net/aff.php?aff=5188" target="_blank"> Twitter</a>

            </div>
            <!--col-sm-6-->

            <div class="col-sm-6 right-side">
                <h1>Login</h1>
                <p>Don't have an account? Create your account, it takes less than a minute</p>

                <!--Form with header-->
                <form action="" method="POST" class="form">


                    <div class="form-group">
                        <label for="form1">Your email</label>
                        <input type="email" id="form1" class="form-control" placeholder="Email" name="email"
                            value="<?php echo $email; ?>">
                    </div>

                    <div class="form-group">
                        <label for="form2">Your password</label>
                        <input type="password" id="form2" class="form-control" placeholder="Password" name="password"
                            value="<?php echo $_POST['password']; ?>">

                    </div>

                    <div class="text-xs-center">
                        <button class="btn btn-deep-purple" name="submit">Login</button>
                        <a href="./register.php" target="" class="tw">Register</a>
                    </div>


                </form>
                <!--/Form with header-->

            </div>
            <!--col-sm-6-->


        </div>
        <!--col-sm-8-->

    </div>
    <!--container-->


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="form1.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
</body>

</html>