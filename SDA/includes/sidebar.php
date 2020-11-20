<?php


if(!isset($_SESSION['log_email'])){

echo "<script>window.open('login.php','_self')</script>";

}

else {




?>
<nav class="navbar navbar-inverse navbar-fixed-top" ><!-- navbar navbar-inverse navbar-fixed-top Starts -->

<div class="navbar-header" ><!-- navbar-header Starts -->

<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse" ><!-- navbar-ex1-collapse Starts -->


<span class="sr-only" >Toggle Navigation</span>

<span class="icon-bar" ></span>

<span class="icon-bar" ></span>

<span class="icon-bar" ></span>


</button><!-- navbar-ex1-collapse Ends -->

<a class="navbar-brand" href="index.php?dashboard" >Admin Panel</a>


</div><!-- navbar-header Ends -->

<ul class="nav navbar-right top-nav" ><!-- nav navbar-right top-nav Starts -->

	<?php

   /*User role query*/
if (isset($_SESSION['station_id'])) {
   $id  =  $_SESSION['station_id'];
}

if(isset($_SESSION['type'])){
	$type =$_SESSION['type'];
}
if (isset($_SESSION['log_email'])) {
$u_email = $_SESSION['log_email'];
} 

$q = mysqli_query($con,"SELECT* FROM users WHERE email='$u_email' AND type='$type'");
 
$r = mysqli_fetch_array($q);

$u_r = $r['type'];
$st  = $r['station_id'];
$_SESSION['station_id']  =  $st;

if($type=='Conference')
   {
   $st_query   = mysqli_query($con,"SELECT * FROM conferences WHERE id = $st");
   }

   if($type=='Lchurch')
   {
   $st_query   = mysqli_query($con,"SELECT * FROM churches WHERE id = $st");
   }

$res      = mysqli_fetch_array($st_query);
$s_name = $res['name'];

$_SESSION['name']  = $s_name;


	 ?>

	<li><a href="">User From: <?php echo $s_name; ?></a></li>


</ul><!-- nav navbar-right top-nav Ends -->

<div class="collapse navbar-collapse navbar-ex1-collapse"><!-- collapse navbar-collapse navbar-ex1-collapse Starts -->


<?php if(isset($_SESSION['type'])){
	$type = $_SESSION['type'];


	switch ($type) {
		case 'Conference':
			include_once('conference.php');
			break;
		
		case 'Lchurch':
			include_once('lchurch.php');
			break;
		default:
			# code...
			break;
	}
} ?>




</div><!-- collapse navbar-collapse navbar-ex1-collapse Ends -->

</nav><!-- navbar navbar-inverse navbar-fixed-top Ends -->

<?php } ?>