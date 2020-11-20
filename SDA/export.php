<?php


session_start();

include("includes/db.php");

if(!isset($_SESSION['log_email'])){

echo "<script>window.open('login.php','_self')</script>";

}

else {

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


if(isset($_GET['export'])){
  if(isset($_SESSION['monthly'])){
    $value  = $_SESSION['monthly'];
    $get_payers = mysqli_query($con,"SELECT * FROM tithe WHERE station = $station_id AND paymentdate LIKE '%$value%' ");
    $otherqueries = mysqli_query($con,"SELECT * FROM others WHERE station = $station_id AND paymentdate LIKE '%$value%' ");
  }elseif(isset($_SESSION['dates'])){

    $value  = $_SESSION['dates'];
    $get_payers = mysqli_query($con,"SELECT * FROM tithe WHERE station = $station_id AND paymentdate LIKE '%$value%' ");
    $otherqueries = mysqli_query($con,"SELECT * FROM others WHERE station = $station_id AND paymentdate LIKE '%$value%' ");
  }elseif(isset($_SESSION['yearly'])){
    $value  = $_SESSION['yearly'];
    $get_payers = mysqli_query($con,"SELECT * FROM tithe WHERE station = $station_id AND paymentdate LIKE '%$value%' ");
    $otherqueries = mysqli_query($con,"SELECT * FROM others WHERE station = $station_id AND paymentdate LIKE '%$value%' ");
  }else{

    $get_payers = mysqli_query($con,"SELECT * FROM tithe WHERE station = $station_id");
 //getting results from other offerings table
       $otherqueries   = mysqli_query($con,"SELECT*FROM others WHERE station=$station_id");
  }
 

    $delimeter  = ",";
    $filename = "fiapre".date('Ymd').".csv"; //create the file name

    //create a file pointer
    $f = fopen("php://memory", "w");
    //set Column headers
    $fields = array("Church","Month/Year","Total(GHC)","Tithe(GHC)","Systematics(GHC) 50%" ,"Sabbath School(GHC)","Loose(GHC) 50%","Thanks(GHC) 50%","Harvest(GHC)","Baby Ded.(GHC)","Others(GHC) 50%");
    fputcsv($f, $fields,$delimeter);

$sum  = 0;
$sum1 = 0;
$sum2 = 0;
$sum3 = 0;
$Harvest=0;

while($row    = mysqli_fetch_array($get_payers)) {
  $sum  +=$row['others'];
  $sum1 +=$row['tithe'];
  $sum2 +=$row['offering'];
  $sum3  +=$row['thanks'];
  $year  = $row['year'];
  $month = $row['month'];
      
    }

$osum  = 0;
$osum1 = 0;
$osum2 = 0;
$osum3 = 0;

$monthYear  = $month." / ".$year;

while($row    = mysqli_fetch_array($otherqueries)) {
  $osum  +=$row['mission'];
  $osum1 +=$row['sabbathSc'];
  $osum2 +=$row['loose'];
  $osum3  +=$row['bdedication'];
  $year  = $row['year'];
  $month = $row['month'];
      
    }

//Getting the Total income for the month
    $totalSum = $sum1+$osum+$osum3+($sum2+$sum3+$sum+$osum2)/2;

  $lineData = array($cname,$monthYear,$totalSum,$sum1,$sum2/2,$osum,$osum2/2,$sum3/2,$Harvest,$osum3,$sum/2);
      fputcsv($f, $lineData,$delimeter);

    //move back to begining of the file
    fseek($f, 0);

    //Set headers to download file rather displayed
    header("Content-type: text/csv");
    header('Content-disposition:attachment; filename="'.$filename.'";');
    //Output all remaining data on a file pointer
    fpassthru($f);
  }

}
 ?>