<?php



if(!isset($_SESSION['admin_email'])){

echo "<script>window.open('login.php','_self')</script>";

}

else {




?>

<div class="row"><!-- 1 row Starts -->

<div class="col-lg-12"><!-- col-lg-12 Starts -->

<ol class="breadcrumb"><!-- breadcrumb Starts -->

<li class="active" >

<i class="fa fa-dashboard"></i> Dashboard / View Boxes

</li>

</ol><!-- breadcrumb Ends -->

</div><!-- col-lg-12 Ends -->

</div><!-- 1 row Ends -->


<div class="row"><!-- 2 row Starts -->

<div class="col-lg-12"><!-- col-lg-12 Starts -->

<div class="panel panel-default"><!-- panel panel-default Starts --> 

<div class="panel-heading"><!-- panel-heading Starts -->

<h3 class="panel-title">

<i class="fa fa-money fa-fw"></i> View Boxes

</h3>

</div><!-- panel-heading Ends -->

<div class="panel-body"><!-- panel-body Starts -->

<?php

$get_boxes = "select * from boxes_section";

$run_boxes = mysqli_query($con,$get_boxes);

while($row_boxes = mysqli_fetch_array($run_boxes)){

$box_id = $row_boxes['box_id'];

$box_title = $row_boxes['box_title'];

$box_desc = $row_boxes['box_desc'];

?>


<div class="col-lg-4 col-md-4"><!-- col-lg-4 col-md-4 Starts -->


<div class="panel panel-primary"><!-- panel panel-primary Starts -->


<div class="panel-heading"><!-- panel-heading Starts -->

<h3 class="panel-title" align="center"><!-- panel-title Starts -->

<?php echo $box_title; ?>

</h3><!-- panel-title Ends -->

</div><!-- panel-heading Ends -->

<div class="panel-body"><!-- panel-body Starts -->

<?php echo $box_desc; ?>

</div><!-- panel-body Ends -->

<div class="panel-footer"><!-- panel-footer Starts -->

<a href="index.php?delete_box=<?php echo $box_id; ?>" class="pull-left">

<i class="fa fa-trash-o"></i> Delete

</a>

<a href="index.php?edit_box=<?php echo $box_id; ?>" class="pull-right">

<i class="fa fa-pencil"></i> Edit

</a>

<div class="clearfix"></div>

</div><!-- panel-footer Ends -->

</div><!-- panel panel-primary Ends -->

</div><!-- col-lg-4 col-md-4 Ends -->

<?php } ?>

</div><!-- panel-body Ends -->


</div><!-- panel panel-default Ends --> 

</div><!-- col-lg-12 Ends -->

</div><!-- 2 row Ends -->

<?php } ?>