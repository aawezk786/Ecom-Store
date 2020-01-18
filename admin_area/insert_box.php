<?php



if(!isset($_SESSION['admin_email'])){

echo "<script>window.open('login.php','_self')</script>";

}

else {




?>

<div class="row" ><!-- 1 row Starts -->

<div class="col-lg-12"><!-- col-lg-12 Starts -->

<ol class="breadcrumb" ><!-- breadcrumb Starts -->

<li class="active">

<i class="fa fa-dashboard"></i> Dashboard / Insert Box

</li>

</ol><!-- breadcrumb Ends -->

</div><!-- col-lg-12 Ends -->

</div><!-- 1 row Ends -->

<div class="row" ><!-- 2 row Starts -->

<div class="col-lg-12" ><!-- col-lg-12 Starts -->

<div class="panel panel-default"><!-- panel panel-default Starts -->

<div class="panel-heading"><!-- panel-heading starts-->
<h3 class="panel-title">
<i class="fa fa-money fa-fw"></i> Insert Box

</h3>

</div><!-- panel-heading Ends-->

<div class="panel-body"><!-- panel-body Starts -->

<form class="form-horizontal" method="post" action=""><!-- form-horizontal Starts -->

<div class="form-group"><!-- 1 form-group Starts -->

<label class="col-md-3 control-label">Box Title : </label>

<div class="col-md-6">

<input type="text" name="box_title" class="form-control">

</div>

</div><!-- 1 form-group Ends -->


<div class="form-group"><!-- 2 form-group Starts -->

<label class="col-md-3 control-label">Box Description : </label>

<div class="col-md-6">

<textarea name="box_desc" class="form-control" rows="6" cols="19"> </textarea>

</div>

</div><!-- 2 form-group Ends -->


<div class="form-group"><!-- 3 form-group Starts -->

<label class="col-md-3 control-label"></label>

<div class="col-md-6">

<input type="submit" name="submit" value="Insert Box" class="btn btn-primary form-control">

</div>

</div><!-- 3 form-group Ends -->

</form><!-- form-horizontal Ends -->

</div><!-- panel-body Ends -->

</div><!-- panel panel-default Ends -->

</div><!-- col-lg-12 Ends -->

</div><!-- 2 row Ends -->


<?php

if(isset($_POST['submit'])){

$box_title = $_POST['box_title'];

$box_desc = $_POST['box_desc'];

$insert_box = "insert into boxes_section (box_title,box_desc) values ('$box_title','$box_desc')";

$run_box = mysqli_query($con,$insert_box);

echo "<script>alert('New Box Has Been Inserted')</script>";

echo "<script>window.open('index.php?view_boxes','_self')</script>";

}


?>




<?php } ?>