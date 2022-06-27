
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

        <!-- Sign up form -->
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">Sign up</h2>
                        <form method="POST" class="register-form" id="register-form" onsubmit="return validateForm()">
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="name" id="name" placeholder="Your Name" required/>
                            </div>
                            <div class="form-group">
                                <label for="address"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="address" id="address" placeholder="Your Address" required/>
                            </div>
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-email"></i></label>
                                <input type="email" name="email" id="email" placeholder="Your Email" required/>
                            </div>
                            <div class="form-group">
                                <label for="contactno"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="number" name="contactno" id="contactno" placeholder="Your Contact Number" required/>
                            </div>
                            <div class="form-group">
                                <label for="username"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="username" id="username" placeholder="Your Username" required/>
                            </div>
                            <div class="form-group">
                                <label for="password"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="password" id="password" placeholder="Your Password" required/>
                            </div>
                            <div class="form-group form-button">
                                <button type="submit" style="border: none" name="submit" class="form-submit">Register</button>
                            </div>
                        </form>
                    </div>
                    <div class="signup-image" style="margin-">
                        <figure><img src="./login/images/register.jpeg" alt="sing up image"></figure>
                        <a href="./login.php" class="signup-image-link">I am already member</a>
                    </div>
                    <?php
                        if(isset($_POST['submit']))
                        {
                            $name=mysqli_real_escape_string($con,$_POST['name']);
                            $address=mysqli_real_escape_string($con,$_POST['address']);
                            $contactno=mysqli_real_escape_string($con,$_POST['contactno']);
                            $email=mysqli_real_escape_string($con,$_POST['email']);
                            $username=mysqli_real_escape_string($con,$_POST['username']);
                            $password=mysqli_real_escape_string($con,$_POST['password']);

                            $sql="INSERT INTO customer (customer_name,customer_address,customer_contact_no,
                            customer_email,customer_username,customer_password)
                            VALUES ('$name','$address','$contactno','$email','$username','$password')";

                            $insert=mysqli_query($con,$sql);

                            if($insert)
                            {
                                ?>
                                    <script>
                                        Swal.fire(
                                        {
                                            icon: 'success',
                                            title: 'Success!',
                                            text: 'Register Successful'
                                        }).then((result) => {
                                            window.location='login.php';
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
                                            window.location='register.php';
                                        });
                                    </script>
                                <?php
                            }
                        }
                    ?>
                </div>
            </div>
        </section>
    </div>

    <!-- JS -->
    <script src="./login/vendor/jquery/jquery.min.js"></script>
    <script src="./login/js/main.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>