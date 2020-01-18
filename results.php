<?php

session_start();

include("includes/db.php");

include("functions/functions.php");

?>
<!DOCTYPE html>
<html>

<head>
<title>E commerce Store </title>

<link href="http://fonts.googleapis.com/css?family=Roboto:400,500,700,300,100" rel="stylesheet" >

<link href="styles/bootstrap.min.css" rel="stylesheet">

<link href="styles/style.css" rel="stylesheet">

<link href="font-awesome/css/font-awesome.min.css" rel="stylesheet">

</head>

<body>

<div id="top"><!-- top Starts -->

<div class="container"><!-- container Starts -->

<div class="col-md-6 offer"><!-- col-md-6 offer Starts -->

<a href="#" class="btn btn-success btn-sm" >
<?php

if(!isset($_SESSION['customer_email'])){

echo "Welcome :Guest";


}else{

echo "Welcome : " . $_SESSION['customer_email'] . "";

}


?>
</a>

<a href="#">
Shopping Cart Total Price: <?php total_price(); ?>, Total Items <?php items(); ?>
</a>

</div><!-- col-md-6 offer Ends -->

<div class="col-md-6"><!-- col-md-6 Starts -->
<ul class="menu"><!-- menu Starts -->

<li>
<a href="customer_register.php">
Register
</a>
</li>

<li>
<?php

if(!isset($_SESSION['customer_email'])){

echo "<a href='checkout.php' >My Account</a>";

}
else{

echo "<a href='customer/my_account.php?my_orders'>My Account</a>";

}


?>
</li>

<li>
<a href="cart.php">
Go to Cart
</a>
</li>

<li>
<?php

if(!isset($_SESSION['customer_email'])){

echo "<a href='checkout.php'> Login </a>";

}else {

echo "<a href='logout.php'> Logout </a>";

}

?>
</li>

</ul><!-- menu Ends -->

</div><!-- col-md-6 Ends -->

</div><!-- container Ends -->
</div><!-- top Ends -->

<div class="navbar navbar-default" id="navbar"><!-- navbar navbar-default Starts -->
<div class="container" ><!-- container Starts -->

<div class="navbar-header"><!-- navbar-header Starts -->

<a class="navbar-brand home" href="index.php" ><!--- navbar navbar-brand home Starts -->

<img src="images/freedom.jpg" alt="freedom-power-llp logo" class="hidden-xs" height="100%" >
<img src="images/freedom.jpg" alt="freedom-power-llp logo" class="visible-xs" >

</a><!--- navbar navbar-brand home Ends -->

<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation"  >

<span class="sr-only" >Toggle Navigation </span>

<i class="fa fa-align-justify"></i>

</button>

<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#search" >

<span class="sr-only" >Toggle Search</span>

<i class="fa fa-search" ></i>

</button>


</div><!-- navbar-header Ends -->

<div class="navbar-collapse collapse" id="navigation" ><!-- navbar-collapse collapse Starts -->

<div class="padding-nav" ><!-- padding-nav Starts -->

<ul class="nav navbar-nav navbar-left"><!-- nav navbar-nav navbar-left Starts -->

<li>
<a href="index.php"> Home </a>
</li>

<li class="active" >
<a href="shop.php"> Shop </a>
</li>

<li>
<?php

if(!isset($_SESSION['customer_email'])){

echo "<a href='checkout.php' >My Account</a>";

}
else{

echo "<a href='customer/my_account.php?my_orders'>My Account</a>";

}


?>
</li>

<li>
<a href="cart.php"> Shopping Cart </a>
</li>

<li>
<a href="about.php"> About Us </a>
</li>

<li>

<a href="services.php"> Services </a>

</li>

<li>
<a href="contact.php"> Contact Us </a>
</li>

</ul><!-- nav navbar-nav navbar-left Ends -->

</div><!-- padding-nav Ends -->

<a class="btn btn-primary navbar-btn right" href="cart.php"><!-- btn btn-primary navbar-btn right Starts -->

<i class="fa fa-shopping-cart"></i>

<span> <?php items(); ?> items in cart </span>

</a><!-- btn btn-primary navbar-btn right Ends -->

<div class="navbar-collapse collapse right"><!-- navbar-collapse collapse right Starts -->

<button class="btn navbar-btn btn-primary" type="button" data-toggle="collapse" data-target="#search">

<span class="sr-only">Toggle Search</span>

<i class="fa fa-search"></i>

</button>

</div><!-- navbar-collapse collapse right Ends -->

<div class="collapse clearfix" id="search"><!-- collapse clearfix Starts -->

<form class="navbar-form" method="get" action="results.php"><!-- navbar-form Starts -->

<div class="input-group"><!-- input-group Starts -->

<input class="form-control" type="text" placeholder="Search" name="user_query" required>

<span class="input-group-btn"><!-- input-group-btn Starts -->

<button type="submit" value="Search" name="search" class="btn btn-primary">

<i class="fa fa-search"></i>

</button>

</span><!-- input-group-btn Ends -->

</div><!-- input-group Ends -->

</form><!-- navbar-form Ends -->

</div><!-- collapse clearfix Ends -->

</div><!-- navbar-collapse collapse Ends -->

</div><!-- container Ends -->
</div><!-- navbar navbar-default Ends -->


<div id="content" ><!-- content Starts -->
<div class="container" ><!-- container Starts -->

<div class="col-md-12" ><!--- col-md-12 Starts -->

<ul class="breadcrumb" ><!-- breadcrumb Starts -->

<li>
<a href="index.php">Home</a>
</li>

<li>Search Results</li>

</ul><!-- breadcrumb Ends -->



</div><!--- col-md-12 Ends -->

<div class="col-md-12" ><!-- col-md-12 Starts --->

<div class="row" id="Products" ><!-- row Starts -->

<?php

if(isset($_GET['search'])){

$user_keyword = $_GET['user_query'];

$get_products = "select * from products where product_keywords like '%$user_keyword%'";

$run_products = mysqli_query($con,$get_products);

$count = mysqli_num_rows($run_products);

if($count==0){

echo "

<div class='box'>

<h2>No Search Results Found</h2>

</div>

";

}else{

while($row_products=mysqli_fetch_array($run_products)){

$pro_id = $row_products['product_id'];

$pro_title = $row_products['product_title'];

$pro_price = $row_products['product_price'];

$pro_img1 = $row_products['product_img1'];

$pro_label = $row_products['product_label'];

$manufacturer_id = $row_products['manufacturer_id'];

$get_manufacturer = "select * from manufacturers where manufacturer_id='$manufacturer_id'";

$run_manufacturer = mysqli_query($db,$get_manufacturer);

$row_manufacturer = mysqli_fetch_array($run_manufacturer);

$manufacturer_name = $row_manufacturer['manufacturer_title'];

$pro_psp_price = $row_products['product_psp_price'];

$pro_url = $row_products['product_url'];


if($pro_label == "Sale" or $pro_label == "Gift"){

$product_price = "<del> &#8377;$pro_price </del>";

$product_psp_price = "| &#8377;$pro_psp_price";

}
else{

$product_psp_price = "";

$product_price = "&#8377;$pro_price";

}


if($pro_label == ""){


}
else{

$product_label = "

<a class='label sale' href='#' style='color:black;'>

<div class='thelabel'>$pro_label</div>

<div class='label-background'> </div>

</a>

";

}


echo "

<div class='col-md-3 col-sm-6 center-responsive' >

<div class='product' >

<a href='$pro_url' >

<img src='admin_area/product_images/$pro_img1' class='img-responsive' >

</a>

<div class='text' >

<center>

<p class='btn btn-primary'> $manufacturer_name </p>

</center>

<hr>

<h3><a href='$pro_url' >$pro_title</a></h3>

<p class='price' > $product_price $product_psp_price </p>

<p class='buttons' >

<a href='$pro_url' class='btn btn-default' >View details</a>

<a href='$pro_url' class='btn btn-primary'>

<i class='fa fa-shopping-cart'></i> Add to cart

</a>


</p>

</div>

$product_label


</div>

</div>

";

}

}

}
 ?>

</div><!-- row Ends -->

</div><!-- col-md-9 Ends --->

</div><!-- container Ends -->

</div><!-- content Ends -->


<?php

include("includes/footer.php");

?>

<script src="js/jquery.min.js"> </script>

<script src="js/bootstrap.min.js"></script>


</body>

</html>