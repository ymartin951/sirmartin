<?php


if(!isset($_SESSION['log_email'])){

echo "<script>window.open('login.php','_self')</script>";

}

else {
	$log_email = $_SESSION['log_email'];

?>

<div class="row" ><!-- 1 row Starts -->

<div class="col-lg-12" ><!-- col-lg-12 Starts -->

<ol class="breadcrumb" ><!-- breadcrumb Starts -->

<li class="active" >

<i class="fa fa-dashboard" ></i> Dashboard / Income Breakdown

</li>

</ol><!-- breadcrumb Ends -->


</div><!-- col-lg-12 Ends -->

</div><!-- 1 row Ends -->


<?php if(isset($_GET['district'])){
  $district_id  =  $_GET['district'];
}
 ?>



<div class="row" ><!-- 2 row Starts -->

<div class="col-lg-12" ><!-- col-lg-12 Starts -->

<div class="panel panel-default" ><!-- panel panel-default Starts -->

<div class="panel-heading" ><!-- panel-heading Starts -->

<h3 class="panel-title" ><!-- panel-title Starts -->

<i class="fa fa-money fa-fw" ></i>Breakdown View

</h3><!-- panel-title Ends -->


</div><!-- panel-heading Ends -->

<div class="panel-body" ><!-- panel-body Starts -->

<div class="table-responsive" ><!-- table-responsive Starts -->

    <form class="form" action="" method="post">
            <div class="form-group" >
                    <div class="col-xs-7" id="select">
   <select name="month" class="form-control" required>
<option value="">Select to view monthly Details........</option>
<?php
$query_id = mysqli_query($con,"SELECT DISTINCT month,year FROM tithe");

while($re = mysqli_fetch_array($query_id)){

?>


 <option value="<?php echo $re['month'].' '.$re['year'];?>"><?php echo $re['month'].','.$re['year']; ?></option>

<?php } ?>                       
    </select>        
                    
                     </div>
                      </div>
      <div class="form-group">
            <div class="col-xs-5" id="sub">
              <input type="submit" name="monthly" value="View Details"  class="btn btn-primary form-control">
             </div>
            </div>
    </form>

    <form class="form" action="" method="post">
            <div class="form-group" >
                    <div class="col-xs-7" id="select">
   <select name="year" class="form-control" required>
<option value="">Select to view Yearly Details........</option>
<?php 
if (isset($_SESSION['station_id'])) {
  $station_id = $_SESSION['station_id'];
}

if (isset($_SESSION['type'])) {
  $type = $_SESSION['type'];
}


$query_id = mysqli_query($con,"SELECT DISTINCT year FROM tithe");

while($re = mysqli_fetch_array($query_id)){

?>


 <option value="<?php echo $re['year'];?>"><?php echo $re['year']; ?></option>

<?php } ?>                       
    </select>        
                    
                     </div>
                      </div>
      <div class="form-group">
            <div class="col-xs-5" id="sub">
              <input type="submit" name="yearly" value="View Details"  class="btn btn-primary form-control">
             </div>
            </div>
    </form>

            <form class="form" action="" method="post">
            <div class="form-group" >
                    <div class="col-xs-7" id="select">
   <select name="date" class="form-control" required>
<option value="">Select to view by date........</option>
<?php 


$query_id = mysqli_query($con,"SELECT DISTINCT paymentdate FROM tithe");

while($re = mysqli_fetch_array($query_id)){

?>


 <option value="<?php echo $re['paymentdate'];?>"><?php echo $re['paymentdate']; ?></option>

<?php } ?>                       
    </select>        
                    
                     </div>
                      </div>
      <div class="form-group">
            <div class="col-xs-5" id="sub">
              <input type="submit" name="dates" value="View Details"  class="btn btn-primary form-control">
             </div>
            </div>
    </form>
   
    <a href="javscript:void(0);" class="btn btn-primary form-control" id="printD">Print Receipt(s)</a> <br> <br>

    <a href="export.php?export=<?php echo $station_id; ?>&type=<?php echo $type; ?>" class="btn btn-primary form-control" style="background-color: #228B22;" >Export Excel</a>

<div class="printDetails">
<table class="table table-bordered table-hover table-striped" ><!-- table table-bordered table-hover table-striped Starts -->

<tr>
  <th>Church</th>
   <th>Total Tithe</th>
    <th>Total Systematics</th>
     <th>Total Others</th>
      <th>Total Thanks</th>
      <th>Total Loose Off</th>
      <th>Mission Off</th>
      <th>Total Sabbath Sch Off</th>
</tr>


<tbody><!-- tbody Starts -->

<?php

if(isset($_SESSION['church'])){
  $station_id = $_SESSION['church'];
  $cquery  = mysqli_query($con,"SELECT * FROM churches WHERE id =  $station_id");
  $cresults = mysqli_fetch_array($cquery);
  $cname   = $cresults['name'];
}else{ 
if (isset($_SESSION['station_id'])) {
  $station_id = $_SESSION['station_id'];
  $cquery  = mysqli_query($con,"SELECT * FROM churches WHERE id =  $station_id");
  $cresults = mysqli_fetch_array($cquery);
  $cname   = $cresults['name'];
}
}


if(isset($_SESSION['ctype'])){
  $type = $_SESSION['ctype'];
}else{
if (isset($_SESSION['type'])) {
  $type = $_SESSION['type'];
}
}
if (isset($_SESSION['station_id'])) {
   $id  =  $_SESSION['station_id'];
   
   $st_query   = mysqli_query($con,"SELECT * FROM conferences WHERE id =  $id");
   $st_result     = mysqli_fetch_array($st_query);
   $st_name      = $st_result['name'];

  }

//if the submit button is clicked

 if (isset($_POST['monthly']) AND !empty($_POST['month'])) {
       $value = mysqli_real_escape_string($con,$_POST['month']);
        echo $_SESSION['monthly']  = $value;
        $_SESSION['dates']  = "";
        $_SESSION['yearly']  = "";
        $_SESSION['totalConBreakdown'] = "";

       $get_payers = mysqli_query($con,"SELECT * FROM tithe WHERE district=$district_id AND paymentdate LIKE '%$value%'");
       //getting results from other offerings table
       $otherqueries   = mysqli_query($con,"SELECT*FROM others WHERE district=$district_id AND paymentdate LIKE '%$value%'");

 }elseif(isset($_POST['yearly']) AND !empty($_POST['year'])){
 	$value = mysqli_real_escape_string($con,$_POST['year']);
  $_SESSION['yearly']  = $value;
  $_SESSION['monthly'] = "";
  $_SESSION['dates']   = "";
  $_SESSION['totalConBreakdown'] = ""; 

       $get_payers = mysqli_query($con,"SELECT * FROM tithe WHERE district=$district_id AND year LIKE '%$value%'");
       //getting results from other offerings table
       $otherqueries   = mysqli_query($con,"SELECT*FROM others WHERE district=$district_id AND year LIKE '%$value%'");
 	$num_rows = mysqli_num_rows($get_payers);
 }elseif(isset($_POST['dates']) AND !empty($_POST['date'])){
  $value = mysqli_real_escape_string($con,$_POST['date']);
  echo $_SESSION['dates']  = $value;
  $_SESSION['yearly']  = "";
  $_SESSION['monthly'] = "";
  $_SESSION['totalConBreakdown'] = "";
  

       $get_payers = mysqli_query($con,"SELECT * FROM tithe WHERE district=$district_id AND paymentdate LIKE '%$value%'");
        $otherqueries   = mysqli_query($con,"SELECT*FROM others WHERE district=$district_id AND paymentdate LIKE '%$value%'");
  $num_rows = mysqli_num_rows($get_payers);
 }else{

 	$get_payers = mysqli_query($con,"SELECT DISTINCT * FROM tithe WHERE district=$district_id");
  //getting results from other offerings table
       $otherqueries   = mysqli_query($con,"SELECT*FROM others WHERE district=$district_id");
  $num_rows = mysqli_num_rows($get_payers);
 }

$sum  = 0;
$sum1 = 0;
$sum2 = 0;
$sum3 = 0;
while($row    = mysqli_fetch_array($get_payers)) {
	$sum  +=$row['others'];
  $sum1 +=$row['tithe'];
  $sum2 +=$row['offering'];
  $sum3  +=$row['thanks'];
  $year  = $row['year'];
  $station_id = $row['station'];

  $churchQ  =  mysqli_query($con,"SELECT * FROM churches WHERE id =$station_id");
  $churRes  =  mysqli_fetch_assoc($churchQ);
  echo $chName   = $churRes['name'];
}


$osum  = 0;
$osum1 = 0;
$osum2 = 0;
$osum3 = 0;
while ($rowo = mysqli_fetch_array($otherqueries)) {
  $osum +=$rowo['loose'];
  $osum1+=$rowo['mission'];
  $osum2+=$rowo['sabbathSc'];
  $osum3+=$rowo['bdedication'];
  $station_id =$rowo['station'];
}
?>
<h1 style="text-align: center;"><?php if(isset($_POST['monthly']) AND !empty($_POST['month'])) {
       echo $value = $cname.' '.mysqli_real_escape_string($con,$_POST['month']).", Income Breakdown";}else{
        if(isset($_POST['yearly']) AND !empty($_POST['year'])) {
       echo $value = $cname.' '.mysqli_real_escape_string($con,$_POST['year']).", Income Breakdown";
       }else{
        if(isset($_POST['dates']) AND !empty($_POST['date'])) {
       echo $value = $cname.' '.mysqli_real_escape_string($con,$_POST['date']).", Income Breakdown";
       }else{echo $cname.', '."Total Income Breakdown";} }}?></h1>




       <?php 

       
$totalTithe = 0;
$totalOffering =0;
if(isset($_GET['district'])){

  $district   =  $_GET['district'];

  $query      =  mysqli_query($con,"SELECT * FROM churches WHERE district = $district");

  while($row  = mysqli_fetch_array($query)){
    $id       = $row['id'];
    $titheQ   =  mysqli_query($con,"SELECT * FROM tithe WHERE station = $id");

    while($tithe=mysqli_fetch_array($titheQ)){
      $totalTithe+=$tithe['tithe'];
      } 
?>

<tr>
<td><?php echo $row['name']; ?></td>
<td><?php echo $totalTithe; ?></td>
</tr>
<?php
}}
 ?>

</tbody><!-- tbody Ends -->


</table><!-- table table-bordered table-hover table-striped Ends -->


</div><!-- table-responsive Ends -->

</div><!-- panel-body Ends -->


</div><!-- panel panel-default Ends -->


</div><!-- col-lg-12 Ends -->


</div><!-- 2 row Ends -->


<?php 
/*
if(isset($_GET['district'])){
  $district_id= $_GET['district'];
}

$get_tithe = mysqli_query($con,"SELECT districts.name,tithe.tithe,tithe.offering,tithe.others,tithe.thanks,tithe.paymentdate, districts.* FROM tithe INNER JOIN districts ON tithe.district=districts.id WHERE tithe.district=$district_id");
echo $num_rows  =  mysqli_num_rows($get_tithe);
*/


if(isset($_GET['district'])){
  $district  = $_GET['district'];
}

$sum = 0;
$churchQ  = mysqli_query($con,"SELECT * FROM churches WHERE district = $district");

while ($church = mysqli_fetch_array($churchQ)) {
  $church_id = $church['id'];
}

 ?>

<?php }  ?>



