<?php

if(!isset($_SESSION['admin_email'])){

echo "<script>window.open('login.php','_self')</script>";

}

else {

?>

<?php

$file = "../styles/style.css";

if(file_exists($file)){

$data = file_get_contents($file);

}

?>

<div class="row"><!-- 1 row Starts -->

<div class="col-lg-12"><!-- col-lg-12 Starts -->

<ol class="breadcrumb"><!-- breadcrumb Starts -->

<li class="active">

<i class="fa fa-dashboard"></i> Dashboard / Edit css File

</li>

</ol><!-- breadcrumb Ends -->

</div><!-- col-lg-12 Ends -->

</div><!-- 1 row Ends -->

<div class="row"><!-- 2 row Starts -->

<div class="col-lg-12"><!-- col-lg-12 Starts -->

<div class="panel panel-default"><!-- panel panel-default Starts -->

<div class="panel-heading"><!-- panel-heading Starts -->

<h3 class="panel-title"><!-- panel-title Starts -->

<i class="fa fa-money fa-fw"></i> Edit css File

</h3><!-- panel-title Ends -->

</div><!-- panel-heading Ends -->


<div class="panel-body"><!-- panel-body Starts -->

<form class="form-horizontal" action="" method="post"><!-- form-horizontal Starts -->

<div class="form-group"><!-- 1 form-group Starts -->

<div class="col-md-12">

<textarea class="form-control" name="newdata" rows="25">
<?php echo $data; ?>
</textarea>

</div>

</div><!-- 1 form-group Ends -->

<div class="form-group"><!-- 2 form-group Starts -->

<label class="col-md-3 control-label"> </label>

<div class="col-md-6">

<input type="submit" name="update" value="Update css File" class="btn btn-primary form-control">

</div>

</div><!-- 2 form-group Ends -->

</form><!-- form-horizontal Ends -->

</div><!-- panel-body Ends -->


</div><!-- panel panel-default Ends -->

</div><!-- col-lg-12 Ends -->

</div><!-- 2 row Ends -->

<?php

if(isset($_POST['update'])){

$newdata = $_POST['newdata'];

$handle = fopen($file, "w");

fwrite($handle, $newdata);

fclose($handle);

echo "<script>alert('css File Has Been Updated')</script>";

echo "<script>window.open('index.php?edit_css','_self')</script>";

}

?>

<?php } ?>