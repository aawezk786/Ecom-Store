<?php

session_start();

include("includes/db.php");                       

include("functions/functions.php");                

?>

<?php


$product_id = @$_GET['pro_id'];

$get_product = "select * from products where product_url='$product_id'";

$run_product = mysqli_query($con,$get_product);

$check_product = mysqli_num_rows($run_product);

if($check_product == 0){

echo "<script> window.open('index.php','_self') </script>";

}
else{



$row_product = mysqli_fetch_array($run_product);

$p_cat_id = $row_product['p_cat_id'];

$pro_id = $row_product['product_id'];

$pro_title = $row_product['product_title'];

$pro_price = $row_product['product_price'];

$pro_desc = $row_product['product_desc'];

$pro_img1 = $row_product['product_img1'];

$pro_img2 = $row_product['product_img2'];

$pro_img3 = $row_product['product_img3']; 

$pro_label = $row_product['product_label'];

$pro_psp_price = $row_product['product_psp_price'];

$pro_features = $row_product['product_features'];

$pro_video = $row_product['product_video'];

$status = $row_product['status'];

$pro_url = $row_product['product_url'];

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

$get_p_cat = "select * from product_categories where p_cat_id='$p_cat_id'";

$run_p_cat = mysqli_query($con,$get_p_cat);

$row_p_cat = mysqli_fetch_array($run_p_cat);

$p_cat_title = $row_p_cat['p_cat_title'];




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

<img src="images/logo.png" alt="computerfever logo" class="hidden-xs" >
<img src="images/logo-small.png" alt="computerfever logo" class="visible-xs" >

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

<li><a href="shop.php">Shop</a></li>

<li>

<a href="shop.php?p_cat=<?php echo $p_cat_id; ?>"> <?php echo $p_cat_title; ?> </a>

</li>

<li> <?php echo $pro_title; ?> </li>

</ul><!-- breadcrumb Ends -->


</div><!--- col-md-12 Ends -->



<div class="col-md-12"><!-- col-md-12 Starts -->

<div class="row" id="productMain"><!-- row Starts -->

<div class="col-sm-6"><!-- col-sm-6 Starts -->

<div id="mainImage"><!-- mainImage Starts -->

<div id="myCarousel" class="carousel slide" data-ride="carousel">

<ol class="carousel-indicators"><!-- carousel-indicators Starts -->

<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
<li data-target="#myCarousel" data-slide-to="1"></li>
<li data-target="#myCarousel" data-slide-to="2"></li>

</ol><!-- carousel-indicators Ends -->

<div class="carousel-inner"><!-- carousel-inner Starts -->

<div class="item active">
<center>
<img src="admin_area/product_images/<?php echo $pro_img1; ?>" class="img-responsive">
</center>
</div>

<div class="item">
<center>
<img src="admin_area/product_images/<?php echo $pro_img2; ?>" class="img-responsive">
</center>
</div>

<div class="item">
<center>
<img src="admin_area/product_images/<?php echo $pro_img3; ?>" class="img-responsive">
</center>
</div>

</div><!-- carousel-inner Ends -->

<a href="#myCarousel" class="left carousel-control" data-slide="prev"><!-- left carousel-control Starts -->

<span class="glyphicon glyphicon-chevron-left"> </span>

<span class="sr-only"> Previous </span>

</a><!-- left carousel-control Ends -->

<a class="right carousel-control" href="#myCarousel" data-slide="next"><!-- right carousel-control Starts -->

<span class="glyphicon glyphicon-chevron-right"> </span>

<span class="sr-only"> Next </span>

</a><!-- right carousel-control Ends -->

</div>

</div><!-- mainImage Ends -->

<?php echo $product_label; ?>

</div><!-- col-sm-6 Ends -->


<div class="col-sm-6" ><!-- col-sm-6 Starts -->

<div class="box" ><!-- box Starts -->

<h1 class="text-center" > <?php echo $pro_title; ?> </h1>

<?php 


if(isset($_POST['add_cart'])){

$ip_add = getRealUserIp();

$p_id = $pro_id;

$product_qty = $_POST['product_qty'];

$product_size = $_POST['product_size'];


$check_product = "select * from cart where ip_add='$ip_add' AND p_id='$p_id'";

$run_check = mysqli_query($con,$check_product);

if(mysqli_num_rows($run_check)>0){

echo "<script>alert('This Product is already added in cart')</script>";

echo "<script>window.open('$pro_url','_self')</script>";

}
else {

$get_price = "select * from products where product_id='$p_id'";

$run_price = mysqli_query($con,$get_price);

$row_price = mysqli_fetch_array($run_price);

$pro_price = $row_price['product_price'];

$pro_psp_price = $row_price['product_psp_price'];

$pro_label = $row_price['product_label'];

if($pro_label == "Sale" or $pro_label == "Gift"){

$product_price = $pro_psp_price;

}
else{

$product_price = $pro_price;

}

$query = "insert into cart (p_id,ip_add,qty,p_price,size) values ('$p_id','$ip_add','$product_qty','$product_price','$product_size')";

$run_query = mysqli_query($db,$query);

echo "<script>window.open('$pro_url','_self')</script>";

}

}


?>

<form action="" method="post" class="form-horizontal" ><!-- form-horizontal Starts -->

<?php

if($status == "product"){

?>

<div class="form-group"><!-- form-group Starts -->

<label class="col-md-5 control-label" >Product Quantity </label>

<div class="col-md-7" ><!-- col-md-7 Starts -->

<select name="product_qty" class="form-control" >

<option>Select quantity</option>
<option>1</option>
<option>2</option>
<option>3</option>
<option>4</option>
<option>5</option>


</select>

</div><!-- col-md-7 Ends -->

</div><!-- form-group Ends -->

<div class="form-group" ><!-- form-group Starts -->

<label class="col-md-5 control-label" >Product Size</label>

<div class="col-md-7" ><!-- col-md-7 Starts -->

<select name="product_size" class="form-control" >

<option>Select a Size</option>
<option>Small</option>
<option>Medium</option>
<option>Large</option>


</select>

</div><!-- col-md-7 Ends -->


</div><!-- form-group Ends -->

<?php }else { ?>


<div class="form-group"><!-- form-group Starts -->

<label class="col-md-5 control-label" >Bundle Quantity </label>

<div class="col-md-7" ><!-- col-md-7 Starts -->

<select name="product_qty" class="form-control" >

<option>Select quantity</option>
<option>1</option>
<option>2</option>
<option>3</option>
<option>4</option>
<option>5</option>


</select>

</div><!-- col-md-7 Ends -->

</div><!-- form-group Ends -->

<div class="form-group" ><!-- form-group Starts -->

<label class="col-md-5 control-label" >Bundle Size</label>

<div class="col-md-7" ><!-- col-md-7 Starts -->

<select name="product_size" class="form-control" >

<option>Select a Size</option>
<option>Small</option>
<option>Medium</option>
<option>Large</option>


</select>

</div><!-- col-md-7 Ends -->


</div><!-- form-group Ends -->


<?php } ?>

<center><!-- center Starts -->

<?php

$get_icons = "select * from icons where icon_product='$pro_id'";

$run_icons = mysqli_query($con,$get_icons);

while($row_icons = mysqli_fetch_array($run_icons)){

$icon_image = $row_icons['icon_image'];

echo "<img src='admin_area/icon_images/$icon_image' width='45' height='45' > &nbsp;&nbsp;&nbsp; ";


}

?>

</center><!-- center Ends -->

<?php

if($status == "product"){




if($pro_label == "Sale" or $pro_label == "Gift"){

echo "

<p class='price'>

Product Price : <del> &#8377; $pro_price </del><br>

Product sale Price : &#8377; $pro_psp_price

</p>

";

}
else{

echo "

<p class='price'>

Product Price : &#8377; $pro_price

</p>

";

}

}
else{


if($pro_label == "Sale" or $pro_label == "Gift"){

echo "

<p class='price'>

Bundle Price : <del> &#8377; $pro_price </del><br>

Bundle sale Price : &#8377; $pro_psp_price

</p>

";

}
else{

echo "

<p class='price'>

Bundle Price : &#8377; $pro_price

</p>

";

}


}

?>

<p class="text-center buttons" ><!-- text-center buttons Starts -->

<button class="btn btn-primary" type="submit" name="add_cart">

<i class="fa fa-shopping-cart" ></i> Add to Cart

</button>

<button class="btn btn-primary" type="submit" name="add_wishlist">

<i class="fa fa-heart" ></i> Add to Wishlist

</button>


<?php

if(isset($_POST['add_wishlist'])){

if(!isset($_SESSION['customer_email'])){

echo "<script>alert('You Must Login To Add Product In Wishlist')</script>";

echo "<script>window.open('checkout.php','_self')</script>";

}
else{

$customer_session = $_SESSION['customer_email'];

$get_customer = "select * from customers where customer_email='$customer_session'";

$run_customer = mysqli_query($con,$get_customer);

$row_customer = mysqli_fetch_array($run_customer);

$customer_id = $row_customer['customer_id']; 

$select_wishlist = "select * from wishlist where customer_id='$customer_id' AND product_id='$pro_id'";

$run_wishlist = mysqli_query($con,$select_wishlist);

$check_wishlist = mysqli_num_rows($run_wishlist);

if($check_wishlist == 1){

echo "<script>alert('This Product Has Been already Added In Wishlist')</script>";

echo "<script>window.open('$pro_url','_self')</script>";

}
else{

$insert_wishlist = "insert into wishlist (customer_id,product_id) values ('$customer_id','$pro_id')";

$run_wishlist = mysqli_query($con,$insert_wishlist);

if($run_wishlist){

echo "<script> alert('Product Has Inserted Into Wishlist') </script>";

echo "<script>window.open('$pro_url','_self')</script>";

}

}

}

}

?>

</p><!-- text-center buttons Ends -->

</form><!-- form-horizontal Ends -->

</div><!-- box Ends -->


<div class="row" id="thumbs" ><!-- row Starts -->

<div class="col-xs-4" ><!-- col-xs-4 Starts -->

<a href="#" class="thumb" >

<img src="admin_area/product_images/<?php echo $pro_img1; ?>" class="img-responsive" >

</a>

</div><!-- col-xs-4 Ends -->

<div class="col-xs-4" ><!-- col-xs-4 Starts -->

<a href="#" class="thumb" >

<img src="admin_area/product_images/<?php echo $pro_img2; ?>" class="img-responsive" >

</a>

</div><!-- col-xs-4 Ends -->

<div class="col-xs-4" ><!-- col-xs-4 Starts -->

<a href="#" class="thumb" >

<img src="admin_area/product_images/<?php echo $pro_img3; ?>" class="img-responsive" >

</a>

</div><!-- col-xs-4 Ends -->


</div><!-- row Ends -->


</div><!-- col-sm-6 Ends -->


</div><!-- row Ends -->

<div class="box" id="details"><!-- box Starts -->

<a class="btn btn-primary tab" style="margin-bottom:10px;" href="#description" data-toggle="tab"><!-- btn btn-primary tab Starts -->

<?php

if($status == "product"){

echo "Product Description";

}
else{

echo "Bundle Description";

}

?>

</a><!-- btn btn-primary tab Ends -->

<a class="btn btn-primary tab" style="margin-bottom:10px;" href="#features" data-toggle="tab"><!-- btn btn-primary tab Starts -->

Features

</a><!-- btn btn-primary tab Ends -->

<a class="btn btn-primary tab" style="margin-bottom:10px;" href="#video" data-toggle="tab"><!-- btn btn-primary tab Starts -->

Sounds and Videos

</a><!-- btn btn-primary tab Ends -->

<hr style="margin-top:0px;">

<div class="tab-content"><!-- tab-content Starts -->

<div id="description" class="tab-pane fade in active" style="margin-top:7px;" ><!-- description tab-pane fade in active Starts -->

<?php echo $pro_desc; ?>

</div><!-- description tab-pane fade in active Ends -->

<div id="features" class="tab-pane fade in" style="margin-top:7px;" ><!-- features tab-pane fade in  Starts -->

<?php echo $pro_features; ?>

</div><!-- features tab-pane fade in  Ends -->

<div id="video" class="tab-pane fade in" style="margin-top:7px;" ><!-- video tab-pane fade in Starts -->

<?php echo $pro_video; ?>

</div><!-- video tab-pane fade in  Ends -->


</div><!-- tab-content Ends -->

</div><!-- box Ends -->

<div id="row same-height-row"><!-- row same-height-row Starts -->

<?php

if($status == "product"){



?>

<div class="col-md-3 col-sm-6"><!-- col-md-3 col-sm-6 Starts -->

<div class="box same-height headline"><!-- box same-height headline Starts -->

<h3 class="text-center"> You also like these Products </h3>

</div><!-- box same-height headline Ends -->

</div><!-- col-md-3 col-sm-6 Ends -->

<?php

$get_products = "select * from products order by rand() LIMIT 0,3";

$run_products = mysqli_query($con,$get_products); 

while($row_products = mysqli_fetch_array($run_products)) {

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

$product_price = "<del> &#8377; $pro_price </del>";

$product_psp_price = "| &#8377; $pro_psp_price";

}
else{

$product_psp_price = "";

$product_price = "&#8377; $pro_price";

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


?>

<?php }else{ ?>

<div class="box same-height"><!-- box same-height Starts -->

<h3 class="text-center"> Bundle Products </h3>

</div><!-- box same-height Ends -->

<?php

$get_bundle_product_relation = "select * from bundle_product_relation where bundle_id='$pro_id'";

$run_bundle_product_relation = mysqli_query($con,$get_bundle_product_relation);

while($row_bundle_product_relation = mysqli_fetch_array($run_bundle_product_relation)){

$bundle_product_relation_product_id = $row_bundle_product_relation['product_id'];

$get_products = "select * from products where product_id='$bundle_product_relation_product_id'";


$run_products = mysqli_query($con,$get_products);

while($row_products = mysqli_fetch_array($run_products)){
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

$product_price = "<del> &#8377; $pro_price </del>";

$product_psp_price = "| &#8377; $pro_psp_price";

}
else{

$product_psp_price = "";

$product_price = "&#8377; $pro_price";

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



?>


<?php } ?>

</div><!-- row same-height-row Ends -->

</div><!-- col-md-12 Ends -->


</div><!-- container Ends -->
</div><!-- content Ends -->



<?php

include("includes/footer.php");

?>

<script src="js/jquery.min.js"> </script>

<script src="js/bootstrap.min.js"></script>

</body>
</html>

<?php } ?>
