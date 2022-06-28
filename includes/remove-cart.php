<?php 
session_start();
include './connection.php'; 
if(!(isset($_SESSION['customer_id'])))
{
    header('Location:../login.php');
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Campus Recruitment System</title>

        <!-- sweetalert -->
        <script src="../js/sweetalert/jquery-3.4.1.min.js"></script>
        <script src="../js/sweetalert/sweetalert2.all.min.js"></script>
    </head>
    <body>
        <?php 
        if(isset($_GET['cart_id']))
        {
            $id=$_GET['cart_id'];
            $customerid=$_SESSION['customer_id'];
            $sql="DELETE from cart where cart_id=$id";
            $insert=mysqli_query($con,$sql);
            if($insert)
            {
                ?>
                    <script>
                        Swal.fire(
                        {
                            icon: 'success',
                            title: 'Success!',
                            text: 'Item Removed from cart!!'
                        }).then((result) => {
                            window.location='../cart.php';
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
                            icon: 'error',
                            title: 'Oops',
                            text: 'Something went wrong!!'
                        }).then((result) => {
                            window.location='../cart.php';
                        });
                    </script>

                <?php
            }
        }
        ?>

    </body>
</html>