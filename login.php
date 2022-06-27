
<?php
session_start();
if((isset($_SESSION['customer_id'])))
{
    header('Location:./customer/home.php');
}
include './includes/connection.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Modifying Gallery</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="./login/fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="./login/css/style.css">

    <script src="./js/sweetalert/jquery-3.4.1.min.js"></script>
    <script src="./js/sweetalert/sweetalert2.all.min.js"></script>

</head>
<body>

    <div class="main">
        <!-- Sing in  Form -->
        <section class="sign-in">
            <div class="container">
                <div class="signin-content">
                    <div class="signin-image">
                        <figure><img src="./login/images/login.jpeg" alt="sing up image"></figure>
                        <a href="./register.php" class="signup-image-link">Create an account</a>
                    </div>

                    <div class="signin-form">
                        <h2 class="form-title">Sign in</h2>
                        <form method="POST" class="register-form" onsubmit="return validateForm()">
                            <div class="form-group">
                                <label for="username"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="username" id="username" onclick="clearusernamevalidation()" placeholder="Username" required/>
                                <span id="validateusername" class="text-danger"></span>
                            </div>
                            <div class="form-group">
                                <label for="password"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="password" id="password" onclick="clearpasswordvalidation()" placeholder="Password" required/>
                                <span id="validatepassword" class="text-danger"></span>
                            </div>
                            <div class="form-group">
                                <a href="#">Forgot Password?</a>
                            </div>
                            <div class="form-group form-button">
                                <button class="form-submit" style="border:none" type="submit" name="submit">Log in</button>
                            </div>
                        </form>
                        <?php
                            if(isset($_POST['submit']))
                            {
                                $username=mysqli_real_escape_string($con,$_POST['username']);
                                $password=mysqli_real_escape_string($con,$_POST['password']);

                                $sql="SELECT * FROM customer WHERE customer_username='$username' AND customer_password='$password'";
                                $query=mysqli_query($con,$sql) or die(mysqli_error($con));
                                if(mysqli_num_rows($query))
                                {
                                    $fetch=mysqli_fetch_array($query);
                                    $_SESSION['customer_id']=$fetch['customer_id'];
                                    $_SESSION['customer_email']=$fetch['customer_email'];
                                    $_SESSION['customer_name']=$fetch['customer_name'];
                                    ?>
                                        <script>
                                            Swal.fire(
                                            {
                                                icon: 'success',
                                                title: 'Success!',
                                                text: 'You successfully Logged in'
                                            }).then((result) => {
                                                window.location='./customer/home.php';
                                            });
                                        </script>
                                    <?php
                                }
                                else
                                {
                                    ?>
                                    <script>
                                        Swal.fire(
                                        {
                                            icon: 'warning',
                                            title: 'Oops!',
                                            text: 'Something went wrong!!'
                                        }).then((result) => {
                                            window.location='login.php';
                                        });
                                    </script>
                                    <?php
                                }
                            }
                        ?>
                    </div>
                </div>
            </div>
        </section>

    </div>

    <!-- JS -->
    <script src="./login/vendor/jquery/jquery.min.js"></script>
    <script src="./login/js/main.js"></script>

    <!-- <script src="./js/validations/login.js"></script> -->

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>