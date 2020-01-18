<?php


if(!isset($_SESSION['admin_email'])){

echo "<script>window.open('login.php','_self')</script>";

}

else {


?>

<div class="row"><!-- 1 row Starts -->

<div class="col-lg-12"><!-- col-lg-12 Starts -->

<ol class="breadcrumb"><!-- breadcrumb Starts -->

<li class="active">

<i class="fa fa-dashboard"> </i> Dashboard / View Icons

</li>

</ol><!-- breadcrumb Ends -->

</div><!-- col-lg-12 Ends -->

</div><!-- 1 row Ends -->


<div class="row"><!-- 2 row Starts --->

<div class="col-lg-12"><!-- col-lg-12 Starts -->

<div class="panel panel-default"><!-- panel panel-default Starts -->

<div class="panel-heading"><!-- panel-heading Starts -->

<h3 class="panel-title">

<i class="fa fa-money fa-fw"> </i> View Icons

</h3>

</div><!-- panel-heading Ends -->

<div class="panel-body"><!-- panel-body Starts -->

<div class="table-responsive"><!-- table-responsive Starts -->

<table class="table table-bordered table-hover table-striped"><!-- table table-bordered table-hover table-striped Starts -->

<thead><!-- thead Starts -->

<tr>

<th>Icon Id:</th>
<th>Icon Tile:</th>
<th>Icon Product:</th>
<th>Icon Image:</th>
<th>Delete Icon:</th>
<th>Edit Icon:</th>


</tr>

</thead><!-- thead Ends -->

<tbody><!-- tbody Starts -->

<?php

$i = 0;

$get_icons = "select * from icons";

$run_icons = mysqli_query($con,$get_icons);

while($row_icons = mysqli_fetch_array($run_icons)){

$icon_id = $row_icons['icon_id'];

$product_id = $row_icons['icon_product'];

$icon_title = $row_icons['icon_title'];

$icon_image = $row_icons['icon_image'];

$get_p = "select * from products where product_id='$product_id'";

$run_p = mysqli_query($con,$get_p);

$row_p = mysqli_fetch_array($run_p);

$p_title = $row_p['product_title'];

$i++;

?>

<tr>

<td><?php echo $i; ?></td>

<td><?php echo $icon_title; ?></td>

<td><?php echo $p_title; ?></td>

<td>

<img src="icon_images/<?php echo $icon_image; ?>" width="50" height="50">

</td>

<td>

<a href="index.php?delete_icon=<?php echo $icon_id; ?>">

<i class="fa fa-trash-o"> </i> Delete

</a>

</td>

<td>

<a href="index.php?edit_icon=<?php echo $icon_id; ?>">

<i class="fa fa-pencil"> </i> Edit

</a>

</td>

</tr>

<?php } ?>

</tbody><!-- tbody Ends -->

</table><!-- table table-bordered table-hover table-striped Ends -->

</div><!-- table-responsive Ends -->

</div><!-- panel-body Ends -->

</div><!-- panel panel-default Ends -->

</div><!-- col-lg-12 Ends -->

</div><!-- 2 row Ends --->



<?php } ?>