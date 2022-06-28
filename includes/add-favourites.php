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
        if(isset($_GET['item_id']))
        {
            $id=$_GET['item_id'];
            $customerid=$_SESSION['customer_id'];
            $sql="INSERT into favourites (customer_id,item_id)
            values ('$customerid','$id')";
            $insert=mysqli_query($con,$sql);
            if($insert)
            {
                ?>
                    <script>
                        Swal.fire(
                        {
                            icon: 'success',
                            title: 'Success!',
                            text: 'Item Added to favourites!!'
                        }).then((result) => {
                            window.location='../favourites.php';
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
                            text: 'Item already in favourites!!'
                        }).then((result) => {
                            window.location='../items.php';
                        });
                    </script>

                <?php
            }
        }
        ?>

    </body>
</html>