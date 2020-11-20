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
<option value="">Select month and generate Report........</option>
<?php

if(isset($_SESSION['church'])){
  $station_id = $_SESSION['church'];
}else{ 
if (isset($_SESSION['station_id'])) {
  $station_id = $_SESSION['station_id'];
}
}


if(isset($_SESSION['ctype'])){
  $type = $_SESSION['ctype'];
}else{
if (isset($_SESSION['type'])) {
  $type = $_SESSION['type'];
}
}

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

    <a href="export.php?export=<?php echo $station_id; ?>&type=<?php echo $type; ?>" class="btn btn-primary form-control" style="background-color: #228B22;" >Export Excel</a> <br> <br>

    <a href="javscript:void(0);" class="btn btn-primary form-control" id="printD">Print Report</a> <br> <br>
<div class="printDetails">

<table class="table  table-hover table-striped" style="margin-top: 20px;" ><!-- table table-bordered table-hover table-striped Starts -->

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
       $_SESSION['monthly'] = $value;

       $get_payers = mysqli_query($con,"SELECT * FROM tithe WHERE station = $station_id AND paymentdate LIKE '%$value%' ORDER BY id ASC");
       $otherqueries   = mysqli_query($con,"SELECT*FROM others WHERE station=$station_id AND paymentdate LIKE '%$value%'");

$sum  = 0;
$sum1 = 0;
$sum2 = 0;
$sum3 = 0;

while($row    = mysqli_fetch_array($get_payers))
{
  $sum  +=$row['others'];
  $sum1 +=$row['tithe'];
  $sum2 +=$row['offering'];
  $sum3  +=$row['thanks'];
  $year  = $row['year'];
  $month  = $row['month'];
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
  $week  =  $rowo['week'];

}


?>
<tr style="border: none;">
  <th></th>
  <th></th>
  <th></th>
  <th></th>
  <th></th>
  <th><?php echo $month." / ".$year; ?></th>
  <th></th>
  <th></th>
   <th></th>
</tr>
<tr style="border: 1px solid gray;">
  <th style="border: 1px solid gray;">CONFERENCE</th>
  <th style="border: 1px solid gray;">Tithe(GHC)</th>
  <th style="border: 1px solid gray;">Systematics(GHC) 50%</th>
  <th style="border: 1px solid gray;">Others(GHC) 50%</th>
  <th style="border: 1px solid gray;">Thanks(GHC) 50%</th>
  <th style="border: 1px solid gray;">Loose Offering(GHC) 50%</th>
  <th style="border: 1px solid gray;">Mission Offering(GHC)</th>
  <th style="border: 1px solid gray;">Baby Dedication(GHC)</th>
   <th style="border: 1px solid gray;">Total(GHC)</th>
</tr>
<?php 
$get_payers = mysqli_query($con,"SELECT DISTINCT week from tithe WHERE station = $station_id AND paymentdate LIKE '%$value%' ORDER BY id ASC"); 
$tithe=0;
while ($week = mysqli_fetch_array($get_payers)) {
  $week = $week['week'];
?>

<tr>
  <th>Week <?php echo $week; ?></th>
  <?php 

$query = mysqli_query($con,"SELECT tithe FROM tithe WHERE station =$station_id AND week LIKE '%$week%' AND paymentdate LIKE '%$value%'");
 $tithe    = 0;
 $offering = 0;
 $thanks   = 0;
 $others   = 0;

    while ($r=mysqli_fetch_array($query)) {
       $tithe+=$r['tithe'];
       
    }

   ?>
  <td><?php echo bcadd($tithe, '0',2);?></td>

  <?php 

 $query = mysqli_query($con,"SELECT offering FROM tithe WHERE station =$station_id AND   week LIKE '%$week%' AND paymentdate LIKE '%$value%'");
 $tithe    = 0;
 $offering = 0;
 $thanks   = 0;
 $others   = 0;

    while ($r=mysqli_fetch_array($query)) {
       $offering+=$r['offering'];
       
    }
   ?>
  <td><?php echo bcadd($offering/2, '0',2); ?></td>
  <?php 

 $query = mysqli_query($con,"SELECT others FROM tithe WHERE station =$station_id AND  week LIKE '%$week%' AND paymentdate LIKE '%$value%'");
 
 $others   = 0;


    while ($r=mysqli_fetch_array($query)) {
       $others+=$r['others'];
       
    }
   ?>
  
  <td><?php echo bcadd($others/2, '0',2); ?></td>

   <?php 

 $query = mysqli_query($con,"SELECT thanks FROM tithe WHERE station =$station_id AND  week LIKE '%$week%' AND paymentdate LIKE '%$value%'");
 
 $thanks   = 0;


    while ($r=mysqli_fetch_array($query)) {
       $thanks+=$r['thanks'];
       
    }
   ?>
  <td><?php echo bcadd($thanks/2, '0',2); ?></td>

      <?php 

 $query = mysqli_query($con,"SELECT loose FROM others WHERE station =$station_id AND  week LIKE '%$week%' AND paymentdate LIKE '%$value%'");
 
 $loose   = 0;


    while ($r=mysqli_fetch_array($query)) {
       $loose+=$r['loose'];
       
    }
   ?>
  <td><?php echo bcadd($loose/2, '0',2); ?></td>


      <?php 

 $query = mysqli_query($con,"SELECT mission FROM others WHERE station =$station_id AND  week LIKE '%$week%' AND paymentdate LIKE '%$value%'");
 
 $mission   = 0;


    while ($r=mysqli_fetch_array($query)) {
       $mission+=$r['mission'];
       
    }
   ?>
  <td><?php echo bcadd($mission, '0',2); ?></td>

     <?php 

 $query = mysqli_query($con,"SELECT bdedication FROM others WHERE station =$station_id AND  week LIKE '%$week%' AND paymentdate LIKE '%$value%'");
 
 $bdedication   = 0;


    while ($r=mysqli_fetch_array($query)) {
       $bdedication+=$r['bdedication'];
       
    }
   ?>
  <td><?php echo bcadd($bdedication, '0',2); ?></td>
     <?php 
$wquery = mysqli_query($con,"SELECT * FROM tithe WHERE station =$station_id AND  week LIKE '%$week%' AND paymentdate LIKE '%$value%'");

 $wquery2 = mysqli_query($con,"SELECT * FROM others WHERE station =$station_id AND  week LIKE '%$week%' AND paymentdate LIKE '%$value%'");


$wsum  = 0;
$wsum1 = 0;
$wsum2 = 0;
$wsum3 = 0;

while($row    = mysqli_fetch_array($wquery))
{
  $wsum  +=$row['others'];
  $wsum1 +=$row['tithe'];
  $wsum2 +=$row['offering'];
  $wsum3  +=$row['thanks'];
}


$wosum  = 0;
$wosum1 = 0;
$wosum2 = 0;
$wosum3 = 0;
while ($rowo = mysqli_fetch_array($wquery2)) {
  $wosum+=$rowo['loose'];
  $wosum1+=$rowo['mission'];
  $wosum2+=$rowo['sabbathSc'];
  $wosum3+=$rowo['bdedication'];
}

 

   ?>

  <td><?php echo bcadd($wsum1+$wosum1+$wosum3+($wsum+$wsum2+$wsum3+$wosum)/2, '0',2); ?></td>
</tr>

<?php } ?>
<tr>
   <th>Total</th>
  <td><?php echo bcadd($sum1, '0',2); ?></td>
  <td><?php echo bcadd($sum2/2, '0',2); ?></td>
  <td><?php echo bcadd($sum/2, '0',2); ?></td>
  <td><?php echo bcadd($sum3/2, '0',2); ?></td>
  <td><?php echo bcadd($osum/2, '0',2); ?></td>
  <td><?php echo bcadd($osum1, '0',2); ?></td>
  <td><?php echo bcadd($osum3, '0',2); ?></td>
  <td><?php echo bcadd($sum1+$osum1+$osum3+($sum2+$sum+$sum3+$osum)/2, '0',2); ?></td>
</tr>

<tr style="border: 1px solid gray;">
  <th style="border: 1px solid gray;">LOCAL</th>
 <th style="border: 1px solid gray;">----</th>
  <th style="border: 1px solid gray;">Systematics(GHC) 50%</th>
  <th style="border: 1px solid gray;">Others(GHC) 50%</th>
  <th style="border: 1px solid gray;">Thanks(GHC) 50%</th>
  <th style="border: 1px solid gray;">Loose Offering(GHC) 50%</th>
  <th style="border: 1px solid gray;">Sabbath School(GHC)</th>
  <th style="border: 1px solid gray;">----</th>
   <th style="border: 1px solid gray;">Total(GHC)</th>
</tr>
<?php 
$get_payers = mysqli_query($con,"SELECT DISTINCT week from tithe WHERE station = $station_id AND paymentdate LIKE '%$value%' ORDER BY id ASC"); 
$tithe=0;
while ($week = mysqli_fetch_array($get_payers)) {
  $week = $week['week'];
?>

<tr>
  <th>Week <?php echo $week; ?></th>

  <td>----</td>

  <?php 

 $query = mysqli_query($con,"SELECT offering FROM tithe WHERE station =$station_id AND   week LIKE '%$week%' AND paymentdate LIKE '%$value%'");
 $tithe    = 0;
 $offering = 0;
 $thanks   = 0;
 $others   = 0;

    while ($r=mysqli_fetch_array($query)) {
       $offering+=$r['offering'];
       
    }
   ?>
  <td><?php echo bcadd($offering/2,'0',2); ?></td>
  <?php 

 $query = mysqli_query($con,"SELECT others FROM tithe WHERE station =$station_id AND  week LIKE '%$week%' AND paymentdate LIKE '%$value%'");
 
 $others   = 0;


    while ($r=mysqli_fetch_array($query)) {
       $others+=$r['others'];
       
    }
   ?>
  
  <td><?php echo bcadd($others/2,'0',2); ?></td>

   <?php 

 $query = mysqli_query($con,"SELECT thanks FROM tithe WHERE station =$station_id AND  week LIKE '%$week%' AND paymentdate LIKE '%$value%'");
 
 $thanks   = 0;


    while ($r=mysqli_fetch_array($query)) {
       $thanks+=$r['thanks'];
       
    }
   ?>
  <td><?php echo bcadd($thanks/2,'0',2); ?></td>

      <?php 

 $query = mysqli_query($con,"SELECT loose FROM others WHERE station =$station_id AND  week LIKE '%$week%' AND paymentdate LIKE '%$value%'");
 
 $loose   = 0;


    while ($r=mysqli_fetch_array($query)) {
       $loose+=$r['loose'];
       
    }
   ?>
  <td><?php echo bcadd($loose/2,'0',2); ?></td>


      <?php 

 $query = mysqli_query($con,"SELECT sabbathSc FROM others WHERE station =$station_id AND  week LIKE '%$week%' AND paymentdate LIKE '%$value%'");
 
 $sabbathSc   = 0;


    while ($r=mysqli_fetch_array($query)) {
       $sabbathSc+=$r['sabbathSc'];
       
    }
   ?>
  <td><?php echo bcadd($sabbathSc/2,'0',2); ?></td>

     <?php 

 $query = mysqli_query($con,"SELECT bdedication FROM others WHERE station =$station_id AND  week LIKE '%$week%' AND paymentdate LIKE '%$value%'");
 
 $bdedication   = 0;


    while ($r=mysqli_fetch_array($query)) {
       $bdedication+=$r['bdedication'];
       
    }
   ?>
  <td>----</td>
     <?php 
$wquery = mysqli_query($con,"SELECT * FROM tithe WHERE station =$station_id AND  week LIKE '%$week%' AND paymentdate LIKE '%$value%'");

 $wquery2 = mysqli_query($con,"SELECT * FROM others WHERE station =$station_id AND  week LIKE '%$week%' AND paymentdate LIKE '%$value%'");


$wsum  = 0;
$wsum1 = 0;
$wsum2 = 0;
$wsum3 = 0;

while($row    = mysqli_fetch_array($wquery))
{
  $wsum  +=$row['others'];
  $wsum1 +=$row['tithe'];
  $wsum2 +=$row['offering'];
  $wsum3  +=$row['thanks'];
}


$wosum  = 0;
$wosum1 = 0;
$wosum2 = 0;
$wosum3 = 0;
while ($rowo = mysqli_fetch_array($wquery2)) {
  $wosum+=$rowo['loose'];
  $wosum1+=$rowo['mission'];
  $wosum2+=$rowo['sabbathSc'];
  $wosum3+=$rowo['bdedication'];
}

 

   ?>

  <td><?php echo bcadd($wosum2+($wsum+$wsum2+$wsum3+$wosum)/2,'0',2); ?></td>
</tr>

<?php } ?>
<tr>
   <th>Total</th>
  <td>----</td>
  <td><?php echo bcadd($sum2/2,'0',2); ?></td>
  <td><?php echo bcadd($sum/2,'0',2); ?></td>
  <td><?php echo bcadd($sum3/2,'0',2); ?></td>
  <td><?php echo bcadd($osum/2,'0',2); ?></td>
  <td><?php echo bcadd($osum2,'0',2); ?></td>
  <td>----</td>

<!-- $sum  +=$row['others'];
  $sum1 +=$row['tithe'];
  $sum2 +=$row['offering'];
  $sum3  +=$row['thanks'];
  $year  = $row['year'];
  $month  = $row['month'];
  $osum+=$rowo['loose'];
  $osum1+=$rowo['mission'];
  $osum2+=$rowo['sabbathSc'];
  $osum3+=$rowo['bdedication'];
  $week  =  $rowo['week'];
 -->




  <td><?php echo bcadd($osum2+($sum2+$sum+$sum3+$osum)/2,'0',2); ?></td>
</tr>

<?php } ?>



</tbody><!-- tbody Ends -->

</table><!-- table table-bordered table-hover table-striped Ends -->



</div><!-- table-responsive Ends -->

</div><!-- panel-body Ends -->


</div><!-- panel panel-default Ends -->


</div><!-- col-lg-12 Ends -->



</div><!-- 2 row Ends -->



<?php }  ?>