<div class="row"><!-- 2 row Starts -->

<div class="col-lg-4 col-md-6"><!-- col-lg-3 col-md-6 Starts -->

<div class="panel panel-primary"><!-- panel panel-primary Starts -->

<div class="panel-heading"><!-- panel-heading Starts -->

<div class="row"><!-- panel-heading row Starts -->

<div class="col-xs-3"><!-- col-xs-3 Starts -->

<i class="fa fa-user fa-3x"> </i>

</div><!-- col-xs-3 Ends -->

<div class="col-xs-9 text-right"><!-- col-xs-9 text-right Starts -->

<div class="huge"> <?php 
if(isset($_SESSION['type'])){
    $type = $_SESSION['type'];
}

if(isset($_GET['church'])&&isset($_GET['name'])){
    $_SESSION['church'] = $_GET['church'];
    $_SESSION['ctype']  = $_GET['name'];
}

if(isset($_SESSION['station_id'])){

$id = $_SESSION['station_id'];
$Pquery = mysqli_query($con,"SELECT * FROM users WHERE station_id=$id AND type = '$type'");
 echo $num_rows = mysqli_num_rows($Pquery);

} ?>   </div>

<?php if($num_rows<2): ?>
<div>User</div>
<?php else: ?>
<div>Users</div>
<?php endif; ?>



</div><!-- col-xs-9 text-right Ends -->

</div><!-- panel-heading row Ends -->

</div><!-- panel-heading Ends -->

<a href="index.php?view_users">

<div class="panel-footer"><!-- panel-footer Starts -->

<span class="pull-left"> View Users </span>

<span class="pull-right"> <i class="fa fa-arrow-circle-right"></i> </span>

<div class="clearfix"></div>

</div><!-- panel-footer Ends -->

</a>

</div><!-- panel panel-primary Ends -->

</div><!-- col-lg-3 col-md-6 Ends -->


<div class="col-lg-4 col-md-6"><!-- col-lg-3 col-md-6 Starts -->

<div class="panel panel-green"><!-- panel panel-green Starts -->

<div class="panel-heading"><!-- panel-heading Starts -->

<div class="row"><!-- panel-heading row Starts -->

<div class="col-xs-3"><!-- col-xs-3 Starts -->
<i class="fa fa-group fa-3x"> </i>

</div><!-- col-xs-3 Ends -->

<div class="col-xs-9 text-right"><!-- col-xs-9 text-right Starts -->


<div class="huge"> <?php if(isset($_SESSION['station_id'])){

$id = $_SESSION['station_id'];
$Pquery = mysqli_query($con,"SELECT * FROM payers WHERE station_id=$id");
echo $num_rows = mysqli_num_rows($Pquery);

} ?> </div>

<?php if($num_rows==1){


?> 

<div>Member</div>

<?php }else{ ?>
  <div>Members</div>  
<?php } ?>


</div><!-- col-xs-9 text-right Ends -->

</div><!-- panel-heading row Ends -->

</div><!-- panel-heading Ends -->

<?php if(!isset($_GET['church'])&&!isset($_GET['name'])){

?>
<a href="index.php?view_payers">
<?php }else{
?>

<a href="#">
<?php } ?>


<div class="panel-footer"><!-- panel-footer Starts -->

<span class="pull-left"> View Details </span>

<span class="pull-right"> <i class="fa fa-arrow-circle-right"></i> </span>

<div class="clearfix"></div>

</div><!-- panel-footer Ends -->

</a>

</div><!-- panel panel-green Ends -->

</div><!-- col-lg-3 col-md-6 Ends -->


<div class="col-lg-4 col-md-6"><!-- col-lg-3 col-md-6 Starts -->

<div class="panel panel-tithe"><!-- panel panel-yellow Starts -->

<div class="panel-heading"><!-- panel-heading Starts -->

<div class="row"><!-- panel-heading row Starts -->

<div class="col-xs-3"><!-- col-xs-3 Starts -->

<i class="fa fa-money fa-3x"></i>

</div><!-- col-xs-3 Ends -->

<div class="col-xs-9 text-right"><!-- col-xs-9 text-right Starts -->

<div class="huge">&#8373; <?php if(isset($_GET['church'])&&isset($_GET['name'])){
 $id = $_GET['church'];
 $type    = $_GET['name'];
$Pquery = mysqli_query($con,"SELECT * FROM tithe WHERE station=$id AND type='$type'");
 $num_rows = mysqli_num_rows($Pquery);
 $sum = 0;
 $sum1= 0;
 $sum2= 0;
 $sum3= 0;
 while ($row = mysqli_fetch_array($Pquery)) {
     $sum+=$row['tithe'];
     $sum1+=$row['offering'];
     $sum2+=$row['others'];
     $sum3+=$row['thanks'];
 }
echo $sum;

} else{if(isset($_SESSION['station_id'])){

$id = $_SESSION['station_id'];
$Pquery = mysqli_query($con,"SELECT * FROM tithe WHERE station=$id AND type='$type'");
 $num_rows = mysqli_num_rows($Pquery);
 $sum = 0;
 $sum1= 0;
 $sum2= 0;
 $sum3= 0;
 while ($row = mysqli_fetch_array($Pquery)) {
     $sum+=$row['tithe'];
     $sum1+=$row['offering'];
     $sum2+=$row['others'];
     $sum3+=$row['thanks'];
 }
echo $sum;
}} ?> </div>

<div>Total Tithe</div>

</div><!-- col-xs-9 text-right Ends -->

</div><!-- panel-heading row Ends -->

</div><!-- panel-heading Ends -->

<a href="index.php?tithe_breakdown">

<div class="panel-footer"><!-- panel-footer Starts -->

<span class="pull-left"> View Breakdown </span>

<span class="pull-right"> <i class="fa fa-arrow-circle-right"></i> </span>

<div class="clearfix"></div>

</div><!-- panel-footer Ends -->

</a>

</div><!-- panel panel-yellow Ends -->

</div><!-- col-lg-3 col-md-6 Ends -->



<div class="col-lg-4 col-md-6"><!-- col-lg-3 col-md-6 Starts -->

<div class="panel panel-offering"><!-- panel panel-yellow Starts -->

<div class="panel-heading"><!-- panel-heading Starts -->

<div class="row"><!-- panel-heading row Starts -->

<div class="col-xs-3"><!-- col-xs-3 Starts -->

<i class="fa fa-money fa-3x"></i>

</div><!-- col-xs-3 Ends -->

<div class="col-xs-9 text-right"><!-- col-xs-9 text-right Starts -->

<div class="huge">&#8373; <?php if(isset($_GET['church'])&&isset($_GET['name'])){
 $id = $_GET['church'];
 $type    = $_GET['name'];
$Pquery = mysqli_query($con,"SELECT * FROM tithe WHERE station=$id AND type='$type'");
 $num_rows = mysqli_num_rows($Pquery);
 $sum = 0;
 $sum1= 0;
 $sum2= 0;
 $sum3= 0;
 while ($row = mysqli_fetch_array($Pquery)) {
     $sum+=$row['tithe'];
     $sum1+=$row['offering'];
     $sum2+=$row['others'];
     $sum3+=$row['thanks'];
 }
echo $sum1;

} else{if(isset($_SESSION['station_id'])){

$id = $_SESSION['station_id'];
$Pquery = mysqli_query($con,"SELECT * FROM tithe WHERE station=$id AND type='$type'");
 $num_rows = mysqli_num_rows($Pquery);
 $sum = 0;
 $sum1= 0;
 $sum2= 0;
 $sum3= 0;
 while ($row = mysqli_fetch_array($Pquery)) {
     $sum+=$row['tithe'];
     $sum1+=$row['offering'];
     $sum2+=$row['others'];
     $sum3+=$row['thanks'];
 }
echo $sum1;
}} ?> </div>

<div>Total Offerings</div>

</div><!-- col-xs-9 text-right Ends -->

</div><!-- panel-heading row Ends -->

</div><!-- panel-heading Ends -->

<a href="index.php?offering_breakdown">

<div class="panel-footer"><!-- panel-footer Starts -->

<span class="pull-left"> View Breakdown </span>

<span class="pull-right"> <i class="fa fa-arrow-circle-right"></i> </span>

<div class="clearfix"></div>

</div><!-- panel-footer Ends -->

</a>

</div><!-- panel panel-yellow Ends -->

</div><!-- col-lg-3 col-md-6 Ends -->


<div class="col-lg-4 col-md-6"><!-- col-lg-3 col-md-6 Starts -->

<div class="panel panel-others"><!-- panel panel-yellow Starts -->

<div class="panel-heading"><!-- panel-heading Starts -->

<div class="row"><!-- panel-heading row Starts -->

<div class="col-xs-3"><!-- col-xs-3 Starts -->

<i class="fa fa-money fa-3x"></i>

</div><!-- col-xs-3 Ends -->

<div class="col-xs-9 text-right"><!-- col-xs-9 text-right Starts -->

<div class="huge">&#8373; <?php if(isset($_GET['church'])&&isset($_GET['name'])){
 $id = $_GET['church'];
 $type    = $_GET['name'];
$Pquery = mysqli_query($con,"SELECT * FROM tithe WHERE station=$id AND type='$type'");
 $num_rows = mysqli_num_rows($Pquery);
 $sum = 0;
 $sum1= 0;
 $sum2= 0;
 $sum3= 0;
 while ($row = mysqli_fetch_array($Pquery)) {
     $sum+=$row['tithe'];
     $sum1+=$row['offering'];
     $sum2+=$row['others'];
     $sum3+=$row['thanks'];
 }
echo $sum2;

} else{if(isset($_SESSION['station_id'])){

$id = $_SESSION['station_id'];
$Pquery = mysqli_query($con,"SELECT * FROM tithe WHERE station=$id AND type='$type'");
 $num_rows = mysqli_num_rows($Pquery);
 $sum = 0;
 $sum1= 0;
 $sum2= 0;
 $sum3= 0;
 while ($row = mysqli_fetch_array($Pquery)) {
     $sum+=$row['tithe'];
     $sum1+=$row['offering'];
     $sum2+=$row['others'];
     $sum3+=$row['thanks'];
 }
echo $sum2;
}} ?> </div>

<div>Total Others</div>

</div><!-- col-xs-9 text-right Ends -->

</div><!-- panel-heading row Ends -->

</div><!-- panel-heading Ends -->

<a href="index.php?others_breakdown">

<div class="panel-footer"><!-- panel-footer Starts -->

<span class="pull-left"> View Breakdown </span>

<span class="pull-right"> <i class="fa fa-arrow-circle-right"></i> </span>

<div class="clearfix"></div>

</div><!-- panel-footer Ends -->

</a>

</div><!-- panel panel-yellow Ends -->

</div><!-- col-lg-3 col-md-6 Ends -->


<div class="col-lg-4 col-md-6"><!-- col-lg-3 col-md-6 Starts -->

<div class="panel panel-thanks"><!-- panel panel-yellow Starts -->

<div class="panel-heading"><!-- panel-heading Starts -->

<div class="row"><!-- panel-heading row Starts -->

<div class="col-xs-3"><!-- col-xs-3 Starts -->

<i class="fa fa-money fa-3x"></i>

</div><!-- col-xs-3 Ends -->

<div class="col-xs-9 text-right"><!-- col-xs-9 text-right Starts -->

<div class="huge">&#8373; <?php if(isset($_GET['church'])&&isset($_GET['name'])){
 $id = $_GET['church'];
 $type    = $_GET['name'];
$Pquery = mysqli_query($con,"SELECT * FROM tithe WHERE station=$id AND type='$type'");
 $num_rows = mysqli_num_rows($Pquery);
 $sum = 0;
 $sum1= 0;
 $sum2= 0;
 $sum3= 0;
 while ($row = mysqli_fetch_array($Pquery)) {
     $sum+=$row['tithe'];
     $sum1+=$row['offering'];
     $sum2+=$row['others'];
     $sum3+=$row['thanks'];
 }
echo $sum3;

} else{if(isset($_SESSION['station_id'])){

$id = $_SESSION['station_id'];
$Pquery = mysqli_query($con,"SELECT * FROM tithe WHERE station=$id AND type='$type'");
 $num_rows = mysqli_num_rows($Pquery);
 $sum = 0;
 $sum1= 0;
 $sum2= 0;
 $sum3= 0;
 while ($row = mysqli_fetch_array($Pquery)) {
     $sum+=$row['tithe'];
     $sum1+=$row['offering'];
     $sum2+=$row['others'];
     $sum3+=$row['thanks'];
 }
echo $sum3;
}} ?> </div>

<div>Total Thanks</div>

</div><!-- col-xs-9 text-right Ends -->

</div><!-- panel-heading row Ends -->

</div><!-- panel-heading Ends -->

<a href="index.php?thanks_breakdown">

<div class="panel-footer"><!-- panel-footer Starts -->

<span class="pull-left"> View Breakdown </span>

<span class="pull-right"> <i class="fa fa-arrow-circle-right"></i> </span>

<div class="clearfix"></div>

</div><!-- panel-footer Ends -->

</a>

</div><!-- panel panel-yellow Ends -->

</div><!-- col-lg-3 col-md-6 Ends -->



<div class="col-lg-6 col-md-6"><!-- col-lg-3 col-md-6 Starts -->

<div class="panel panel-conf"><!-- panel panel-yellow Starts -->

<div class="panel-heading"><!-- panel-heading Starts -->

<div class="row"><!-- panel-heading row Starts -->

<div class="col-xs-3"><!-- col-xs-3 Starts -->

<i class="fa fa-money fa-3x"></i>

</div><!-- col-xs-3 Ends -->

<div class="col-xs-9 text-right"><!-- col-xs-9 text-right Starts -->

<div class="huge">&#8373; <?php if(isset($_GET['church'])&&isset($_GET['name'])){
 $id = $_GET['church'];
 $type    = $_GET['name'];
$Pquery = mysqli_query($con,"SELECT * FROM tithe WHERE station=$id AND type='$type'");
 $num_rows = mysqli_num_rows($Pquery);
 $sum = 0;
 $sum1= 0;
 $sum2= 0;
 $sum3= 0;
 while ($row = mysqli_fetch_array($Pquery)) {
     $sum+=$row['tithe'];
     $sum1+=$row['offering'];
     $sum2+=$row['others'];
     $sum3+=$row['thanks'];
 }

  //Getting records from other offerings table
   $otherqueries   = mysqli_query($con,"SELECT*FROM others WHERE station=$id");
$osum  = 0;
$osum1 = 0;
$osum2 = 0;
$osum3 = 0;
while ($rowo = mysqli_fetch_array($otherqueries)) {
  $osum+=$rowo['loose'];
  $osum1+=$rowo['mission'];
  $osum2+=$rowo['sabbathSc'];
  $osum3+=$rowo['bdedication'];
}

echo $sum+$osum1+($sum1+$sum2+$sum3+$osum+$osum3)/2;;

} else{if(isset($_SESSION['station_id'])){

$id = $_SESSION['station_id'];
$Pquery = mysqli_query($con,"SELECT * FROM tithe WHERE station=$id AND type='$type'");
 $num_rows = mysqli_num_rows($Pquery);
 $sum = 0;
 $sum1= 0;
 $sum2= 0;
 $sum3= 0;
 while ($row = mysqli_fetch_array($Pquery)) {
     $sum+=$row['tithe'];
     $sum1+=$row['offering'];
     $sum2+=$row['others'];
     $sum3+=$row['thanks'];
 }


  //Getting records from other offerings table
   $otherqueries   = mysqli_query($con,"SELECT*FROM others WHERE station=$id");
$osum  = 0;
$osum1 = 0;
$osum2 = 0;
$osum3 = 0;
while ($rowo = mysqli_fetch_array($otherqueries)) {
  $osum+=$rowo['loose'];
  $osum1+=$rowo['mission'];
  $osum2+=$rowo['sabbathSc'];
  $osum3+=$rowo['bdedication'];
}


echo $sum+$osum1+($sum1+$sum2+$sum3+$osum+$osum3)/2;
}} ?> </div>


<div>CONF Total</div>

</div><!-- col-xs-9 text-right Ends -->

</div><!-- panel-heading row Ends -->

</div><!-- panel-heading Ends -->

<a href="index.php?totalConBreakdown">

<div class="panel-footer"><!-- panel-footer Starts -->

<span class="pull-left"> View Breakdown </span>

<span class="pull-right"> <i class="fa fa-arrow-circle-right"></i> </span>

<div class="clearfix"></div>

</div><!-- panel-footer Ends -->

</a>

</div><!-- panel panel-yellow Ends -->

</div><!-- col-lg-3 col-md-6 Ends -->



<div class="col-lg-6 col-md-6"><!-- col-lg-3 col-md-6 Starts -->

<div class="panel panel-loc"><!-- panel panel-yellow Starts -->

<div class="panel-heading"><!-- panel-heading Starts -->

<div class="row"><!-- panel-heading row Starts -->

<div class="col-xs-3"><!-- col-xs-3 Starts -->

<i class="fa fa-money fa-3x"></i>

</div><!-- col-xs-3 Ends -->

<div class="col-xs-9 text-right"><!-- col-xs-9 text-right Starts -->

<div class="huge">&#8373; <?php if(isset($_GET['church'])&&isset($_GET['name'])){
 $id = $_GET['church'];
 $type    = $_GET['name'];
$Pquery = mysqli_query($con,"SELECT * FROM tithe WHERE station=$id AND type='$type'");

 //Getting records from other offerings table
   $otherqueries   = mysqli_query($con,"SELECT*FROM others WHERE station=$id");
$osum  = 0;
$osum1 = 0;
$osum2 = 0;
$osum3 = 0;
while ($rowo = mysqli_fetch_array($otherqueries)) {
  $osum+=$rowo['loose'];
  $osum1+=$rowo['mission'];
  $osum2+=$rowo['sabbathSc'];
  $osum3+=$rowo['bdedication'];
}
 $num_rows = mysqli_num_rows($Pquery);
 $sum = 0;
 $sum1= 0;
 $sum2= 0;
 $sum3= 0;
 while ($row = mysqli_fetch_array($Pquery)) {
     $sum+=$row['tithe'];
     $sum1+=$row['offering'];
     $sum2+=$row['others'];
     $sum3+=$row['thanks'];
 }
echo $osum2+($sum1+$sum2+$sum3+$osum+$osum3)/2;

} else{if(isset($_SESSION['station_id'])){

$id = $_SESSION['station_id'];
$Pquery = mysqli_query($con,"SELECT * FROM tithe WHERE station=$id AND type='$type'");

 //Getting records from other offerings table
   $otherqueries   = mysqli_query($con,"SELECT*FROM others WHERE station=$id");
 $num_rows = mysqli_num_rows($Pquery);
 $sum = 0;
 $sum1= 0;
 $sum2= 0;
 $sum3= 0;
 while ($row = mysqli_fetch_array($Pquery)) {
     $sum+=$row['tithe'];
     $sum1+=$row['offering'];
     $sum2+=$row['others'];
     $sum3+=$row['thanks'];
 }

 $osum  = 0;
$osum1 = 0;
$osum2 = 0;
$osum3 = 0;
while ($rowo = mysqli_fetch_array($otherqueries)) {
  $osum+=$rowo['loose'];
  $osum1+=$rowo['mission'];
  $osum2+=$rowo['sabbathSc'];
  $osum3+=$rowo['bdedication'];
}
echo $osum2+($sum1+$sum2+$sum3+$osum+$osum3)/2;
}} ?> </div>

<div>LOC Total</div>

</div><!-- col-xs-9 text-right Ends -->

</div><!-- panel-heading row Ends -->

</div><!-- panel-heading Ends -->

<a href="index.php?totalLocalBreakdown">

<div class="panel-footer"><!-- panel-footer Starts -->

<span class="pull-left"> View Breakdown </span>

<span class="pull-right"> <i class="fa fa-arrow-circle-right"></i> </span>

<div class="clearfix"></div>

</div><!-- panel-footer Ends -->

</a>

</div><!-- panel panel-yellow Ends -->

</div><!-- col-lg-3 col-md-6 Ends -->



</div><!-- 2 row Ends -->


