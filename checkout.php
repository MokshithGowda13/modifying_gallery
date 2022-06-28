<?php
//echo $_SERVER['REQUEST_URI'];
session_start();
if(!isset($_SESSION['customer_id']))
{
    header('Location:login.php');
}
include 'includes/connection.php';
//include 'check-sms.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="SPARKER - Premium directory and listings template by Ansonika.">
    <meta name="author" content="Ansonika">
    <title>Modifying Gallery</title>

    <!-- Favicons-->
    <link rel="shortcut icon" href="img/Titlelogo.ico" type="./checkout/image/x-icon">
    <link rel="apple-touch-icon" type="image/x-icon" href="./checkout/img/apple-touch-icon-57x57-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="./checkout/img/apple-touch-icon-72x72-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="./checkout/img/apple-touch-icon-114x114-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="./checkout/img/apple-touch-icon-144x144-precomposed.png">

    <!-- GOOGLE WEB FONT -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">

    <!-- BASE CSS -->
    <link href="./checkout/css/bootstrap.min.css" rel="stylesheet">
    <link href="./checkout/css/style.css" rel="stylesheet">
	<link href="./checkout/css/vendors.css" rel="stylesheet">

    <!-- YOUR CUSTOM CSS -->
    <link href="./checkout/css/custom.css" rel="stylesheet">

    <!-- sweetalert -->
    <script src="./js/sweetalert/jquery-3.4.1.min.js"></script>
    <script src="./js/sweetalert/sweetalert2.all.min.js"></script>

</head>

<body>
	
	<div id="page">
	<!-- /header -->
	
	<div class="sub_header_in sticky_header">
		<div class="container">
			<h1>Chekout - Order</h1>
		</div>
		<!-- /container -->
	</div>
	<!-- /sub_header -->
	
	<main>
		<div class="container margin_60">
			<form method="POST">
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="step first">
                            <h3>1. Item Details</h3>
                            <div class="box_general summary">
                                <?php  
                                    $item_id=$_GET['item_id'];
                                    $query_bus=mysqli_query($con,"SELECT * from items WHERE item_id=$item_id") or die(mysqli_error($con));
                                    if(mysqli_num_rows($query_bus)){
                                        while($fetch=mysqli_fetch_array($query_bus))
                                        {
                                ?>
                                    <ul>
                                        <img src="<?php echo str_replace("../","./",$fetch['image_loc']); ?>" height="250" class="ml-5">
                                        <li></li>
                                    </ul>
                                <?php
                                        }
                                    }
                                ?>
                        
                            </div>	
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="step first">
                            <h3>2. Item Details</h3>
                            <div class="box_general summary">
                                <?php  
                                    $query_bus=mysqli_query($con,"SELECT * from items WHERE item_id=$item_id") or die(mysqli_error($con));
                                    if(mysqli_num_rows($query_bus)){
                                        while($fetch=mysqli_fetch_array($query_bus))
                                        {
                                            $amount=$fetch['item_cost'];
                                ?>
                                    <ul>
                                        <li>Item Name:<span class="float-right"><b><?php echo $fetch['item_name']; ?></b></span></li>
                                        <li>Item Cost:<span class="float-right"><b>&#8377;<?php echo $fetch['item_cost']; ?>.00</b></span></li>
                                        <li>Quantity <span class="float-right"><b>1</b></span></li>
                                        <li>Amount: <span class="float-right"><b>&#8377;<?php echo $fetch['item_cost']; ?>.00</b></span></li>
                                        <li></li>
                                    </ul>
                                <?php
                                        }
                                    }
                                ?>
                            </div>	
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <form method="POST">
                            <div class="step first">
                                <h3>3. Order Details</h3>
                                <div class="box_general summary">
                                    <?php  
                                        $customer_id=$_SESSION['customer_id'];
                                        $query_bus=mysqli_query($con,"SELECT * from customer WHERE customer_id=$customer_id") or die(mysqli_error($con));
                                        if(mysqli_num_rows($query_bus)){
                                            while($fetch=mysqli_fetch_array($query_bus))
                                            {
                                    ?>
                                        <ul>
                                            <li>Name:<span class="float-right"><b><?php echo $fetch['customer_name']; ?></b></span></li>
                                            <li>Address:<span class="float-right"><b><?php echo $fetch['customer_address']; ?></b></span></li>
                                            <li>Email:<span class="float-right"><b><?php echo $fetch['customer_email']; ?></b></span></li>
                                            <li>Contact Number:<span class="float-right"><b><?php echo $fetch['customer_contact_no']; ?></b></span></li>
                                            <li></li>
                                        </ul>
                                    <?php
                                            }
                                        }
                                    ?>
                                    
                            
                                </div>	
                            </div>
                        </form>
                        <button type="submit" name="submit" class="btn_1 full-width cart text-white">CONFIRM AND ORDER</button>
                    </div>
                </div>
            </form>
            <?php
                if(isset($_POST['submit']))
                {
                    function generateRandomString($length = 10) {
                        $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
                        $charactersLength = strlen($characters);
                        $randomString = '';
                        for ($i = 0; $i < $length; $i++) {
                            $randomString .= $characters[rand(0, $charactersLength - 1)];
                        }
                        return $randomString;
                    }

                    $_SESSION['item_id']=$_GET['item_id'];
                    $_SESSION['amount']=$amount;
                    $_SESSION['invoice_number']=generateRandomString();
                    
                    ?>
                        <script>
                            window.location = 'payment/buy.php';
                        </script>
                    <?php

                    
                    
                }
            ?>
			<!-- /row -->
		</div>
		<!-- /container -->
	</main>
	<!--/main-->
	
	<!--/footer-->
	</div>
	<!-- page -->
	
	<!-- Sign In Popup -->
	
	<!-- /Sign In Popup -->
	
	<div id="toTop"></div><!-- Back to top button -->
	
	<!-- COMMON SCRIPTS -->
    <script src="./checkout/js/common_scripts.js"></script>
	<script src="./checkout/js/functions.js"></script>
	<script src="./checkout/assets/validate.js"></script>

  <script type="text/javascript">
  	// var a=500;
  	// var b=$('#price').val();
  	jQuery(document).ready(function($){
  	$('#total').html($('#price').val());
  	$('#days').on('keyup',function(){
    var tot = $('#price').val() * 1 + (this.value * 500 );
    $('#total').html(tot);
    console.log(tot);
});
  });
  </script>
</body>
</html>