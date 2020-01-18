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

<li class="active">
<a href="index.php"> Home </a>
</li>

<li>
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

<div id="content"><!-- content Starts -->

<div class="container"><!-- container Starts -->

<div class="col-md-12"><!-- col-md-12 Starts -->

<ul class="breadcrumb"><!-- breadcrumb Starts -->

<li> <a href="index.php">Home</a> </li>

<li>Terms And Conditions | Refund Policy</li>

</ul><!-- breadcrumb Ends -->

</div><!-- col-md-12 Ends -->

<div class="col-md-3"><!-- col-md-3 Starts -->

<div class="box"><!-- box Starts -->

<ul class="nav nav-pills nav-stacked"><!-- nav nav-pills nav-stacked Starts -->

<?php

$get_terms = "select * from terms LIMIT 0,1";

$run_terms = mysqli_query($con,$get_terms);

while($row_terms = mysqli_fetch_array($run_terms)){ 

$term_title = $row_terms['term_title'];

$term_link = $row_terms['term_link'];

?>

<li class="active">

<a data-toggle="pill" href="#<?php echo $term_link; ?>">

<?php echo $term_title; ?>

</a>

</li>

<?php } ?>

<?php

$count_terms = "select * from terms";

$run_count = mysqli_query($con,$count_terms);

$count = mysqli_num_rows($run_count);

$get_terms = "select * from terms LIMIT 1,$count";

$run_terms = mysqli_query($con,$get_terms);

while($row_terms = mysqli_fetch_array($run_terms)){

$term_title = $row_terms['term_title'];

$term_link = $row_terms['term_link'];

?>

<li>

<a data-toggle="pill" href="#<?php echo $term_link; ?>">

<?php echo $term_title; ?>

</a>

</li>

<?php } ?>

</ul><!-- nav nav-pills nav-stacked Ends -->

</div><!-- box Ends -->

</div><!-- col-md-3 Ends -->

<div class="col-md-9"><!-- col-md-9 Starts -->

<div class="box"><!-- box Starts -->

<div class="tab-content" ><!-- tab-content Starts -->

<?php

$get_terms = "select * from terms LIMIT 0,1";

$run_terms = mysqli_query($con,$get_terms);

while($row_terms = mysqli_fetch_array($run_terms)){

$term_title = $row_terms['term_title'];

$term_desc = $row_terms['term_desc'];

$term_link = $row_terms['term_link'];

?>

<div id="<?php echo $term_link; ?>" class="tab-pane fade in active" ><!-- tab-pane fade in active Starts -->

<h1> <?php echo $term_title; ?>  </h1>

<p> <?php echo $term_desc; ?> </p>

</div><!-- tab-pane fade in active Ends -->

<?php } ?>


<?php

$count_terms = "select * from terms";

$run_count = mysqli_query($con,$count_terms);

$count = mysqli_num_rows($run_count);

$get_terms = "select * from terms LIMIT 1,$count";

$run_terms = mysqli_query($con,$get_terms);

while($row_terms = mysqli_fetch_array($run_terms)){

$term_title = $row_terms['term_title'];

$term_desc = $row_terms['term_desc'];

$term_link = $row_terms['term_link'];

?>

<div id="<?php echo $term_link; ?>" class="tab-pane fade in"><!-- tab-pane fade in Starts -->


<h1><?php echo $term_title; ?></h1>

<p><?php echo $term_desc; ?></p>


</div><!-- tab-pane fade in Ends -->

<?php } ?>

</div><!-- tab-content Ends -->

</div><!-- box Ends -->


</div><!-- col-md-9 Ends -->

</div><!-- container Ends -->

</div><!-- content Ends -->

<?php

include("includes/footer.php");

?>

<script src="js/jquery.min.js"> </script>

<script src="js/bootstrap.min.js"></script>

</body>
</html>