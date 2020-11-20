<?php


if (isset($_SESSION['station_id'])) {
   $id  =  $_SESSION['station_id'];
  }

   if (isset($_SESSION['type'])) {
   $type  =  $_SESSION['type'];
  }


if(isset($_GET['payer'])){

    $payer  =  $_GET['payer'];
}

?>
<div>
<form class="form" action="" method="post">
            <div class="form-group" >
                    <div class="col-xs-7" id="select">
   <select name="month" class="form-control" required>
<option value="">Select to view receipts By month........</option>
<?php 
if (isset($_SESSION['station_id'])) {
  $station_id = $_SESSION['station_id'];
}

if (isset($_SESSION['type'])) {
  $type = $_SESSION['type'];
}


$query_id = mysqli_query($con,"SELECT DISTINCT month,year FROM tithe");

while($re = mysqli_fetch_array($query_id)){

?>


 <option value="<?php echo $re['month'];?>"><?php echo $re['month'].','.$re['year']; ?></option>

<?php } ?>                       
    </select>        
                    
                     </div>
                      </div>
      <div class="form-group">
            <div class="col-xs-5" id="sub">
              <input type="submit" name="monthly" value="View Receipts"  class="btn btn-primary form-control">
             </div>
            </div>
    </form>

    <form class="form" action="" method="post">
            <div class="form-group" >
                    <div class="col-xs-7" id="select">
   <select name="year" class="form-control" required>
<option value="">Select to view By Year........</option>
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
              <input type="submit" name="yearly" value="View Receipts"  class="btn btn-primary form-control">
             </div>
            </div>
    </form>
   </div>

       <form class="form" action="" method="post">
            <div class="form-group" >
                    <div class="col-xs-7" id="select">
   <select name="date" class="form-control" required title="View receipts by date of payment">
<option value="">Select to view By date........</option>
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

<!-- SHOW PRINT BUTTON IF SEARCH RESULT FOR MONTHLY ROCORDS FOUND -->
   <?php if (isset($_POST['monthly']) AND !empty($_POST['month'])) {
       $value = mysqli_real_escape_string($con,$_POST['month']);

$get_tithe = mysqli_query($con,"SELECT DISTINCT tithe.payer,payers.name,tithe.tithe,tithe.offering,tithe.others,tithe.thanks,tithe.paymentdate, payers.* FROM tithe INNER JOIN payers ON tithe.payer=payers.payer WHERE tithe.station=$id AND month LIKE '%$value%'");
$num_rows  =  mysqli_num_rows($get_tithe);

 ?>
<?php if($num_rows>=1){ ?>
   <a href="javscript:void(0);" class="btn btn-primary form-control" id="printD">Print Receipt(s)</a>
<div class="printDetails">
<?php }} ?>


<!-- SHOW PRINT BUTTON IF SEARCH RESULT FOR YEARLY ROCORDS FOUND -->
   <?php if (isset($_POST['yearly']) AND !empty($_POST['year'])) {
       $value = mysqli_real_escape_string($con,$_POST['year']);

$get_tithe = mysqli_query($con,"SELECT DISTINCT tithe.payer,payers.name,tithe.tithe,tithe.offering,tithe.others,tithe.thanks,tithe.paymentdate, payers.* FROM tithe INNER JOIN payers ON tithe.payer=payers.payer WHERE tithe.station=$id AND year LIKE '%$value%'");
$num_rows  =  mysqli_num_rows($get_tithe);

 ?>


<?php if (isset($_POST['dates']) AND !empty($_POST['date'])) {
      echo  $value = mysqli_real_escape_string($con,$_POST['date']);

$get_tithe = mysqli_query($con,"SELECT DISTINCT tithe.payer,payers.name,tithe.tithe,tithe.offering,tithe.others,tithe.thanks,tithe.paymentdate, payers.* FROM tithe INNER JOIN payers ON tithe.payer=payers.payer WHERE tithe.station=$id AND paymentdate LIKE '%$value%'");
$num_rows  =  mysqli_num_rows($get_tithe);

 }?>
<?php if($num_rows>=1){ ?>
   <a href="javscript:void(0);" class="btn btn-primary form-control" id="printD">Print Receipt(s)</a>
<div class="printDetails">
<?php }} ?>


<?php if(!isset($_POST['monthly'])&& !isset($_POST['yearly'])): ?>

<a href="javscript:void(0);" class="btn btn-primary form-control" id="printD">Print Receipt(s)</a>
<div class="printDetails">
<?php endif; ?>


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

$get_tithe = mysqli_query($con,"SELECT DISTINCT tithe.payer,payers.name,tithe.tithe,tithe.offering,tithe.others,tithe.thanks,tithe.paymentdate, payers.* FROM tithe INNER JOIN payers ON tithe.payer=payers.payer WHERE tithe.station=$id AND month LIKE '%$value%'");

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
                                      <td><?php if(isset($_SESSION['name'])){
                            echo $_SESSION['name'];
                        } ?></td>

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

       $get_tithe = mysqli_query($con,"SELECT DISTINCT tithe.payer,payers.name,tithe.tithe,tithe.offering,tithe.others,tithe.thanks,tithe.paymentdate, payers.* FROM tithe INNER JOIN payers ON tithe.payer=payers.payer WHERE tithe.station=$id AND year LIKE '%$value%'");

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
                                    <td style="font-size: 10px;"><?php echo $name; ?></td>
                                    <td><?php echo $tithe; ?></td>
                                    <td><?php echo $offering; ?></td>
                                    <td><?php echo $others; ?></td>
                                    <td><?php echo $thanks; ?></td>
                                     <td>&#8373;<?php echo $sum = $tithe+$offering+$others+$thanks; ?></td>
                                     <td>&#8373;<?php echo $sum = $tithe+($offering+$others+$thanks)/2; ?></td>
                                      <td>&#8373;<?php echo $sum = ($offering+$others+$thanks)/2; ?></td>
                                      <td><?php if(isset($_SESSION['name'])){
                            echo $_SESSION['name'];
                        } ?></td>

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

<?php }}else{if (isset($_POST['dates']) AND !empty($_POST['date'])) {
       $value = mysqli_real_escape_string($con,$_POST['date']);

$get_tithe = mysqli_query($con,"SELECT DISTINCT tithe.payer,payers.name,tithe.tithe,tithe.offering,tithe.others,tithe.thanks,tithe.paymentdate, payers.* FROM tithe INNER JOIN payers ON tithe.payer=payers.payer WHERE tithe.station=$id AND paymentdate LIKE '%$value%'");

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
                                    <td style="font-size: 10px;"><?php echo $name; ?></td>
                                    <td><?php echo $tithe; ?></td>
                                    <td><?php echo $offering; ?></td>
                                    <td><?php echo $others; ?></td>
                                    <td><?php echo $thanks; ?></td>
                                     <td>&#8373;<?php echo $sum = $tithe+$offering+$others+$thanks; ?></td>
                                     <td>&#8373;<?php echo $sum = $tithe+($offering+$others+$thanks)/2; ?></td>
                                      <td>&#8373;<?php echo $sum = ($offering+$others+$thanks)/2; ?></td>
                                      <td><?php if(isset($_SESSION['name'])){
                            echo $_SESSION['name'];
                        } ?></td>

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

       $get_tithe = mysqli_query($con,"SELECT DISTINCT tithe.payer,payers.name,tithe.tithe,tithe.offering,tithe.others,tithe.thanks,tithe.paymentdate, payers.* FROM tithe INNER JOIN payers ON tithe.payer=payers.payer WHERE tithe.station=$id");

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
                                      <td><?php if(isset($_SESSION['name'])){
                            echo $_SESSION['name'];
                        } ?></td>

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
