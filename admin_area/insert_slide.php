<?php



if(!isset($_SESSION['admin_email'])){

echo "<script>window.open('login.php','_self')</script>";

}

else {

?>

<div class="row" ><!-- 1 row Starts -->

<div class="col-lg-12" ><!-- col-lg-12 Starts --> 

<ol class="breadcrumb"><!-- breadcrumb Starts -->

<li class="active">

<i class="fa fa-dashboard" ></i> Dashboard / Insert Slide

</li>

</ol><!-- breadcrumb Ends -->



</div><!-- col-lg-12 Ends --> 

</div><!-- 1 row Ends -->

<div class="row" ><!-- 2 row Starts -->

<div class="col-lg-12" ><!-- col-lg-12 Starts -->

<div class="panel panel-default" ><!-- panel panel-default Starts -->

<div class="panel-heading" ><!-- panel-heading Starts -->

<h3 class="panel-title" >

<i class="fa fa-money fa-fw"></i> Insert Slide

</h3>

</div><!-- panel-heading Ends -->

<div class="panel-body" ><!-- panel-body Starts -->

<form class="form-horizontal" action="" method="post" enctype="multipart/form-data" ><!-- form-horizontal Starts -->

<div class="form-group" ><!-- 1 form-group Starts -->

<label class="col-md-3 control-label">Slide Name:</label>

<div class="col-md-6">

<input type="text" name="slide_name" class="form-control" >

</div>

</div><!-- 1 form-group Ends -->

<div class="form-group" ><!-- 2 form-group Starts -->

<label class="col-md-3 control-label">Slide Image:</label>

<div class="col-md-6">

<input type="file" name="slide_image" class="form-control" >

</div>

</div><!-- 2 form-group Ends -->


<div class="form-group" ><!-- 3 form-group Starts -->

<label class="col-md-3 control-label">Slide Url:</label>

<div class="col-md-6">

<input type="text" name="slide_url" class="form-control" >

</div>

</div><!-- 3 form-group Ends -->

<div class="form-group" ><!-- 4 form-group Starts -->

<label class="col-md-3 control-label"></label>

<div class="col-md-6">

<input type="submit" name="submit" value="Submit Now" class=" btn btn-primary form-control" >

</div>

</div><!--4 form-group Ends -->


</form><!-- form-horizontal Ends -->

</div><!-- panel-body Ends -->


</div><!-- panel panel-default Ends -->

</div><!-- col-lg-12 Ends -->


</div><!-- 2 row Ends -->

<?php

if(isset($_POST['submit'])){

$slide_name = $_POST['slide_name'];

$slide_image = $_FILES['slide_image']['name'];

$temp_name = $_FILES['slide_image']['tmp_name'];

$slide_url = $_POST['slide_url'];

$view_slides = "select * from slider";

$view_run_slides = mysqli_query($con,$view_slides);

$count = mysqli_num_rows($view_run_slides);

if($count<4){

move_uploaded_file($temp_name,"slides_images/$slide_image");

$insert_slide = "insert into slider (slide_name,slide_image,slide_url) values ('$slide_name','$slide_image','$slide_url')";

$run_slide = mysqli_query($con,$insert_slide);

echo "<script>alert('New Slide Has Been Inserted')</script>";

echo "<script>window.open('index.php?view_slides','_self')</script>";

}
else {

echo "<script>alert('You have already inserted 4 slides')</script>";

}

}


?>



<?php } ?>