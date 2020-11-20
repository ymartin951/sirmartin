<?php



if(!isset($_SESSION['log_email'])){
	

echo "<script>window.open('login.php','_self')</script>";

}

else {




?>

<div class="row"><!-- 1 row Starts -->

<div class="col-lg-12"><!-- col-lg-12 Starts -->

<h1 class="page-header">Dashboard</h1>

<ol class="breadcrumb"><!-- breadcrumb Starts -->

<li class="active">

<i class="fa fa-dashboard"></i> Dashboard

</li>

<?php if(isset($_SESSION['type'])){
	$type = $_SESSION['type'];
}  ?>
<?php if($type!="Lchurch"){ ?>

<form class="form" action="" >
            <div class="form-group" >
                    <div class="col-xs-7" id="select">
   <select name="church" class="form-control" required>
<option value="">View report from Churches........</option>
<?php 
if (isset($_SESSION['station_id'])) {
  $station_id = $_SESSION['station_id'];
}

if (isset($_SESSION['type'])) {
  $type = $_SESSION['type'];
}
$query_id = mysqli_query($con,"SELECT* FROM churches WHERE station_id=$station_id");

while($re = mysqli_fetch_array($query_id)){
	$name  =  $re['name'];

?>


 <option value="<?php echo $re['id'];?>"><?php echo $re['name']; ?></option>

<?php } ?>                       
    </select>        
                    
                     </div>
                      </div>
      <div class="form-group">
            <div class="col-xs-5" id="sub">
              <input type="submit" name="name" value="Lchurch"  class="btn btn-primary form-control">
             </div>
            </div>
    </form>
<?php }else{} ?>
</ol><!-- breadcrumb Ends -->

</div><!-- col-lg-12 Ends -->

</div><!-- 1 row Ends -->



<?php if(isset($_SESSION['type'])){
	$type = $_SESSION['type'];


	switch ($type) {
		case 'Conference':
			include_once('conference_dash.php');
			break;
		
		case 'Lchurch':
			include_once('lchurch_dash.php');
			break;
		default:
			# code...
			break;
	}
} ?>

<?php if(isset($_GET['church'])){echo $_GET['church'];} ?>


<div class="col-md-4"><!-- col-md-4 Starts -->

<div class="panel"><!-- panel Starts -->

<div class="panel-body"><!-- panel-body Starts -->

<div class="thumb-info mb-md"><!-- thumb-info mb-md Starts -->

<!-- <img src="admin_images/<?php  ?>" class="rounded img-responsive"> -->

<div class="thumb-info-title"><!-- thumb-info-title Starts -->

<!-- <span class="thumb-info-inner"> <?php  ?> </span>

<span class="thumb-info-type"> <?php  ?> </span> -->

</div><!-- thumb-info-title Ends -->

</div><!-- thumb-info mb-md Ends -->

<div class="mb-md"><!-- mb-md Starts -->

<div class="widget-content-expanded"><!-- widget-content-expanded Starts -->

<!-- <i class="fa fa-user"></i> <span>Email: </span> <?php  ?>  <br>
<i class="fa fa-user"></i> <span>: </span> <?php  ?>   <br>
<i class="fa fa-user"></i> <span>Contact: </span> <?php ?>   <br> -->

</div><!-- widget-content-expanded Ends -->

<hr class="dotted short">



<p>
<?php  ?>
</p>

</div><!-- mb-md Ends -->

</div><!-- panel-body Ends -->

</div><!-- panel Ends -->

</div><!-- col-md-4 Ends -->

</div><!-- 3 row Ends -->

<?php } ?>