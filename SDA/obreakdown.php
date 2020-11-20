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

<i class="fa fa-dashboard" ></i> Dashboard / Offerings Breakdown

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
<option value="">Select to view monthly Details........</option>
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

    <form class="form" action="" method="post">
            <div class="form-group" >
                    <div class="col-xs-7" id="select">
   <select name="year" class="form-control" required>
<option value="">Select to view Yearly Details........</option>
<?php 

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
    <a href="javscript:void(0);" class="btn btn-primary form-control" id="printD">Print Receipt(s)</a>
<div class="printDetails">
<table class="table table-bordered table-hover table-striped" ><!-- table table-bordered table-hover table-striped Starts -->

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
   
   $st_query   = mysqli_query($con,"SELECT * FROM conferences WHERE id =  $id");
   $st_result     = mysqli_fetch_array($st_query);
   $st_name      = $st_result['name'];

//if the submit button is clicked

 if (isset($_POST['monthly']) AND !empty($_POST['month'])) {
       $value = mysqli_real_escape_string($con,$_POST['month']);

       $get_payers = mysqli_query($con,"SELECT * FROM tithe WHERE station = $station_id AND paymentdate LIKE '%$value%'");

 }elseif(isset($_POST['yearly']) AND !empty($_POST['year'])){
 	$value = mysqli_real_escape_string($con,$_POST['year']);

       $get_payers = mysqli_query($con,"SELECT * FROM tithe WHERE station = $station_id AND year LIKE '%$value%'");
 	
 }elseif(isset($_POST['dates']) AND !empty($_POST['date'])){
  $value = mysqli_real_escape_string($con,$_POST['date']);

       $get_payers = mysqli_query($con,"SELECT * FROM tithe WHERE station = $station_id AND paymentdate LIKE '%$value%'");
        $otherqueries   = mysqli_query($con,"SELECT*FROM others WHERE station=$station_id AND paymentdate LIKE '%$value%'");
  $num_rows = mysqli_num_rows($get_payers);
 }else{

 	$get_payers = mysqli_query($con,"SELECT * FROM tithe WHERE station = $station_id AND type='$type'");
 }

$sum = 0;
while($row    = mysqli_fetch_array($get_payers)) {
	$sum +=$row['offering'];
}
?>
<h3 style="text-align: center;"><?php if(isset($_POST['monthly']) AND !empty($_POST['month'])) {
       echo $value = $cname.' '.mysqli_real_escape_string($con,$_POST['month']).", Systematic offering Income Breakdown";}else{
        if(isset($_POST['yearly']) AND !empty($_POST['year'])) {
       echo $value = $cname.' '.mysqli_real_escape_string($con,$_POST['year']).", Systematic offering Income Breakdown";
       }else{
        if(isset($_POST['dates']) AND !empty($_POST['date'])) {
       echo $value = $cname.' '.mysqli_real_escape_string($con,$_POST['date']).", Income Breakdown";
       }else{echo $cname.', '."Systematic offering Total Income Breakdown";} }}?></h3>
<tr>

<th><?php if (isset($_POST['monthly']) AND !empty($_POST['month'])) {
       echo $value = mysqli_real_escape_string($con,$_POST['month']);
 }else{if (isset($_POST['yearly']) AND !empty($_POST['year'])) {
       echo $value = mysqli_real_escape_string($con,$_POST['year']);}} ?></th>
<th>Total Systematics</th>
<td style="text-align: center;">&#8373;<?php echo $sum; ?></td>

</tr>


<tr>

<th><?php if (isset($_POST['monthly']) AND !empty($_POST['month'])) {
       echo $value = mysqli_real_escape_string($con,$_POST['month']);
 }else{if (isset($_POST['yearly']) AND !empty($_POST['year'])) {
       echo $value = mysqli_real_escape_string($con,$_POST['year']);}} ?></th>
<th>CONFERENCE (50%)</th>
<td style="text-align: center;">&#8373;<?php echo $sum/2; ?></td>

</tr>

<tr>

<th><?php if (isset($_POST['monthly']) AND !empty($_POST['month'])) {
       echo $value = mysqli_real_escape_string($con,$_POST['month']);
 }else{if (isset($_POST['yearly']) AND !empty($_POST['year'])) {
       echo $value = mysqli_real_escape_string($con,$_POST['year']);}} ?></th>
<th>LOCAL (50%)</th>
<td style="text-align: center;">&#8373;<?php echo $sum/2; ?></td>

</tr>

</tbody><!-- tbody Ends -->



</table><!-- table table-bordered table-hover table-striped Ends -->



<?php

// SELECT A.CustomerName AS CustomerName1, B.CustomerName AS CustomerName2, A.City
// FROM Customers A, Customers B
// WHERE A.CustomerID <> B.CustomerID
// AND A.City = B.City
// ORDER BY A.City;

// "SELECT DISTINCT `referrals`.`referr_to`,`referrals`.`referred_from`,`hospitals`.*  FROM `referrals`
//  INNER JOIN `hospitals` ON `referrals`.`referr_to`=`hospitals`.`id` WHERE `referrals`.`referred_from` = $hospital_id" ;
/*Get payers' tithe query start*/

 if (isset($_POST['monthly']) AND !empty($_POST['month'])) {
       $value = mysqli_real_escape_string($con,$_POST['month']);

$get_tithe = mysqli_query($con,"SELECT DISTINCT tithe.payer,payers.name,tithe.tithe,tithe.offering,tithe.others,tithe.thanks,tithe.paymentdate, payers.* FROM tithe INNER JOIN payers ON tithe.payer=payers.payer WHERE tithe.station=$station_id AND paymentdate LIKE '%$value%'");

/*Get payers' tithe query ends*/

/*Check if no records found
if(mysqli_num_rows($get_tithe)<1){
    echo "<h1 style='text-align:center;margin-top:150px; color:brown'>No records yet</h1>";
}
*/
while($row    = mysqli_fetch_array($get_tithe)) {
    $payer_id = $row['payer'];
    $tithe    = $row['tithe'];
    $offering = $row['offering'];
    $thanks   = $row['thanks'];
    $others   = $row['others'];
    $name     = $row['name'];
    $paymentdate = $row['paymentdate'];
    

    //SELECT Orders.OrderID, Customers.CustomerName, Orders.OrderDate
//FROM Orders
//INNER JOIN Customers ON Orders.CustomerID=Customers.CustomerID;
    /*Get payers' name start*/
//$get_payer = mysqli_query($con,"SELECT * FROM payers WHERE station_id = $id AND id=$payer_id AND type='$type'");


/*Get payers' name ends*/
?>
<div  style="margin-top: 25px;" class="container">
    <div class="d-flex justify-content-center row">
        <div class="col-md-8">
            <div class="p-3 bg-white rounded">
                <div class="mt-3">
                    <div class="table-responsive">
                        <table width="100%" class="table table-bordered"> 
                            <thead style="height: 10px;">
                                <tr>
                                    <th style="text-align: center; width: 15%;">Name</th>
                                    <th style="text-align: center;">Tithe</th>
                                    <th style="text-align: center;">Offering</th>
                                    <th style="text-align: center;">Others</th>
                                    <th style="text-align: center;">Thanks</th>
                                    <th style="text-align: center;">Total funds</th>
                                    <th style="text-align: center; width: 15%;">Total CONF funds</th>
                                    <th style="text-align: center;width: 15%;">Total LOC funds</th>
                                    <th style="text-align: center; width: 15%;">Church:</th>
                                    <th style="text-align: center; width: 15%;">Districts:</th>
                                    <th style="text-align: center;">Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><?php echo $name; ?></td>
                                    <td><?php echo $tithe; ?></td>
                                    <td><?php echo $offering; ?></td>
                                    <td><?php echo $others; ?></td>
                                    <td><?php echo $thanks; ?></td>
                                     <td>&#8373;<?php echo $sum = $tithe+$offering+$others+$thanks; ?></td>
                                     <td>&#8373;<?php echo $sum = $tithe+($offering+$others+$thanks)/2; ?></td>
                                      <td>&#8373;<?php echo $sum = ($offering+$others+$thanks)/2; ?></td>
                                      <td><?php echo $cname; ?></td>
                                       <td><?php echo $district_name; ?></td>
                        <td><?php echo $paymentdate; ?></td>
                                </tr>

                              
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
  <hr style="border: 0.1px dashed gray; height: 0px; margin-top: 1px; margin-bottom: 1px;">

<?php }}else{
 if (isset($_POST['yearly']) AND !empty($_POST['year'])) {
       $value = mysqli_real_escape_string($con,$_POST['year']);

       $get_tithe = mysqli_query($con,"SELECT DISTINCT tithe.payer,payers.name,tithe.tithe,tithe.offering,tithe.others,tithe.thanks,tithe.paymentdate, payers.* FROM tithe INNER JOIN payers ON tithe.payer=payers.payer WHERE tithe.station=$station_id AND year LIKE '%$value%'");

/*Get payers' tithe query ends*/

/*Check if no records found
if(mysqli_num_rows($get_tithe)<1){
    echo "<h1 style='text-align:center;margin-top:150px; color:brown'>No records yet</h1>";
}
*/
while($row    = mysqli_fetch_array($get_tithe)) {
    $payer_id = $row['payer'];
    $tithe    = $row['tithe'];
    $offering = $row['offering'];
    $thanks   = $row['thanks'];
    $others   = $row['others'];
    $name     = $row['name'];
    $paymentdate = $row['paymentdate'];
    

    //SELECT Orders.OrderID, Customers.CustomerName, Orders.OrderDate
//FROM Orders
//INNER JOIN Customers ON Orders.CustomerID=Customers.CustomerID;
    /*Get payers' name start*/
//$get_payer = mysqli_query($con,"SELECT * FROM payers WHERE station_id = $id AND id=$payer_id AND type='$type'");


/*Get payers' name ends*/
?>
<div  style="margin-top: 25px;" class="container">
    <div class="d-flex justify-content-center row">
        <div class="col-md-8">
            <div class="p-3 bg-white rounded">
                <div class="mt-3">
                    <div class="table-responsive">
                        <table width="100%" class="table table-bordered"> 
                            <thead style="height: 10px;">
                                <tr>
                                    <th style="text-align: center; width: 15%;">Name</th>
                                    <th style="text-align: center;">Tithe</th>
                                    <th style="text-align: center;">Offering</th>
                                    <th style="text-align: center;">Others</th>
                                    <th style="text-align: center;">Thanks</th>
                                    <th style="text-align: center;">Total funds</th>
                                    <th style="text-align: center; width: 15%;">Total CONF funds</th>
                                    <th style="text-align: center;width: 15%;">Total LOC funds</th>
                                    <th style="text-align: center; width: 15%;">Church:</th>
                                    <th style="text-align: center; width: 15%;">District:</th>
                                    <th style="text-align: center;">Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><?php echo $name; ?></td>
                                    <td><?php echo $tithe; ?></td>
                                    <td><?php echo $offering; ?></td>
                                    <td><?php echo $others; ?></td>
                                    <td><?php echo $thanks; ?></td>
                                     <td>&#8373;<?php echo $sum = $tithe+$offering+$others+$thanks; ?></td>
                                     <td>&#8373;<?php echo $sum = $tithe+($offering+$others+$thanks)/2; ?></td>
                                      <td>&#8373;<?php echo $sum = ($offering+$others+$thanks)/2; ?></td>
                                      <td><?php echo $cname; ?></td>
                                      <td><?php echo $district_name; ?></td>
                        <td><?php echo $paymentdate; ?></td>
                                </tr>

                              
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
  <hr style="border: 0.1px dashed gray; height: 0px; margin-top: 1px; margin-bottom: 1px;">
</div>

<?php }}else{
 if (isset($_POST['dates']) AND !empty($_POST['date'])) {
       $value = mysqli_real_escape_string($con,$_POST['date']);

       $get_tithe = mysqli_query($con,"SELECT DISTINCT tithe.payer,payers.name,tithe.tithe,tithe.offering,tithe.others,tithe.thanks,tithe.paymentdate, payers.* FROM tithe INNER JOIN payers ON tithe.payer=payers.payer WHERE tithe.station=$station_id AND paymentdate LIKE '%$value%'");

/*Get payers' tithe query ends*/

/*Check if no records found
if(mysqli_num_rows($get_tithe)<1){
    echo "<h1 style='text-align:center;margin-top:150px; color:brown'>No records yet</h1>";
}
*/
while($row    = mysqli_fetch_array($get_tithe)) {
    $payer_id = $row['payer'];
    $tithe    = $row['tithe'];
    $offering = $row['offering'];
    $thanks   = $row['thanks'];
    $others   = $row['others'];
    $name     = $row['name'];
    $paymentdate = $row['paymentdate'];
    

    //SELECT Orders.OrderID, Customers.CustomerName, Orders.OrderDate
//FROM Orders
//INNER JOIN Customers ON Orders.CustomerID=Customers.CustomerID;
    /*Get payers' name start*/
//$get_payer = mysqli_query($con,"SELECT * FROM payers WHERE station_id = $id AND id=$payer_id AND type='$type'");


/*Get payers' name ends*/
?>
<div  style="margin-top: 25px;" class="container">
    <div class="d-flex justify-content-center row">
        <div class="col-md-8">
            <div class="p-3 bg-white rounded">
                <div class="mt-3">
                    <div class="table-responsive">
                        <table width="100%" class="table table-bordered"> 
                            <thead style="height: 10px;">
                                <tr>
                                    <th style="text-align: center; width: 15%;">Name</th>
                                    <th style="text-align: center;">Tithe</th>
                                    <th style="text-align: center;">Offering</th>
                                    <th style="text-align: center;">Others</th>
                                    <th style="text-align: center;">Thanks</th>
                                    <th style="text-align: center;">Total funds</th>
                                    <th style="text-align: center; width: 15%;">Total CONF funds</th>
                                    <th style="text-align: center;width: 15%;">Total LOC funds</th>
                                    <th style="text-align: center; width: 15%;">Church:</th>
                                    <th style="text-align: center; width: 15%;">District:</th>
                                    <th style="text-align: center;">Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><?php echo $name; ?></td>
                                    <td><?php echo $tithe; ?></td>
                                    <td><?php echo $offering; ?></td>
                                    <td><?php echo $others; ?></td>
                                    <td><?php echo $thanks; ?></td>
                                     <td>&#8373;<?php echo $sum = $tithe+$offering+$others+$thanks; ?></td>
                                     <td>&#8373;<?php echo $sum = $tithe+($offering+$others+$thanks)/2; ?></td>
                                      <td>&#8373;<?php echo $sum = ($offering+$others+$thanks)/2; ?></td>
                                      <td><?php echo $cname; ?></td>
                                      <td><?php echo $district_name; ?></td>

                        <td><?php echo $paymentdate; ?></td>
                                </tr>

                              
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
  <hr style="border: 0.1px dashed gray; height: 0px; margin-top: 1px; margin-bottom: 1px;">

<?php }}}} ?>




</div><!-- table-responsive Ends -->


</div><!-- panel-body Ends -->


</div><!-- panel panel-default Ends -->


</div><!-- col-lg-12 Ends -->




</div><!-- 2 row Ends -->




<?php }  ?>