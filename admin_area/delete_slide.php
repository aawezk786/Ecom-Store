<?php



if(!isset($_SESSION['admin_email'])){

echo "<script>window.open('login.php','_self')</script>";

}

else {




?>
 
<?php
 
if(isset($_GET['delete_slide'])){


$delete_id = $_GET['delete_slide'];

$delete_slide = "delete from slider where slide_id='$delete_id'";


$run_delete = mysqli_query($con,$delete_slide);

if($run_delete){

echo "<script>alert('One Slide Has Been Deleted')</script>";

echo "<script>window.open('index.php?view_slides','_self')</script>";

}


} 
 
 
 

?>



<?php } ?>