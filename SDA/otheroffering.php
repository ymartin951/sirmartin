
<div class="row" ><!-- 3 row Starts -->

<?php


$location          =  ""; 
$crimeT           =  "";
$date              =  ""; 
$desc           =  ""; 
$Station        = "";
$error_messsage       = array(); 
$time               = "";
/*GET THE CURRENT DATE Start*/
 $dateNow =date('Y-m-d H:i:s');
$dayMonth =date('d M Y', strtotime($dateNow));
$month    =date('M', strtotime($dateNow));
$year     =date('Y', strtotime($dateNow)); 
/*GET THE CURRENT DATE Ends*/

 if (isset($_SESSION['station_id'])) {
   $id  =  $_SESSION['station_id'];
  }

   if (isset($_SESSION['type'])) {
   $type  =  $_SESSION['type'];
  }



if(isset($_POST['others'])){
  $loose                = mysqli_real_escape_string($con,$_POST['loose']);
 
  $_SESSION['loose']    = $loose;

if(isset($_SESSION['week'])){
    $week  = $_SESSION['week'];
   }

  if (preg_match("/^[a-zA-Z ]*$/",$loose)) {
       array_push($error_messsage, "<span style='color: red;'>Only numbers are allowed in loos offering field<br>");
    }

     $loose = floatval($loose);

    $mission                = mysqli_real_escape_string($con,$_POST['mission']);
      
  $_SESSION['mission']    = $mission;



   if (preg_match("/^[a-zA-Z ]*$/",$mission)) {
       array_push($error_messsage, "<span style='color: red;'>Only numbers are allowed in mission field<br>");
    }

    $mission = floatval($mission);

    $sabbath                = mysqli_real_escape_string($con,$_POST['sabbath']);
      
    $_SESSION['sabbath']    = $sabbath;

     if (preg_match("/^[a-zA-Z ]*$/",$sabbath)) {
       array_push($error_messsage, "<span style='color: red;'>Only numbers are allowed in Sabbath School field<br>");
    }

    $sabbath = floatval($sabbath);

    $baby                = mysqli_real_escape_string($con,$_POST['baby']);
      
    $_SESSION['baby']    = $baby;

     if (preg_match("/^[a-zA-Z ]*$/",$baby)) {
       array_push($error_messsage, "<span style='color: red;'>Only numbers are allowed in baby dedication field<br>");
    }

    $baby = floatval($baby);
  $date_added                  = date("Y-m-d"); //Current date


  if(empty($error_messsage)) {
  $_SESSION['message']  = "Success";
  $query = "INSERT INTO others(station,loose,mission,sabbathSc,bdedication,paymentdate,month,year,week)
            VALUES($id,$loose,$mission,$sabbath,$baby,'$dayMonth','$month','$year',$week)";
    
    $run_query = mysqli_query($con,$query);
    if(!$run_query){
      die("Fail to add tithe!!".mysqli_error($con));
    } else{
       

    $last_record = mysqli_insert_id($con);
     $_SESSION['last_record'] = $last_record;
     
    //*******************Audit infomartion******************//

  //Adding User activity to audit
 if(isset($_SESSION['log_email'])){
          $email  = $_SESSION['log_email'];

         $log_query  = mysqli_query($con,"SELECT * FROM users WHERE email = '$email'");
         $u_email = mysqli_fetch_array($log_query);
         $log_username = $u_email['name'];
         if(empty($log_username)){
          $log_username = $email;
         }
         $id  = $u_email['station_id'];

}
  //  $date_added            = date("Y-m-d H:i:s"); //Current date
  //  //if login, then insert user action into audit      
  // $audit_query = "INSERT INTO audit(station_id,username,action,affected,date) VALUES($id,'$log_username','Added a Police Officer','$name','$date_added')";

  // mysqli_query($con,$audit_query);


    //************************Audit information ends ***************//


 
  //echo "<script>window.open('index.php?add_payer','_self')</script>";



$_SESSION['loose']  = "";
$_SESSION['mission']  = "";
$_SESSION['baby']  = "";
$_SESSION['sabbath']  = "";

    }


   

  }else{
    echo "no";
  }
    

  
}




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

<i class="fa fa-dashboard" ></i> Dashboard / View Tithe payers

</li>

</ol><!-- breadcrumb Ends -->


</div><!-- col-lg-12 Ends -->

</div><!-- 1 row Ends -->



<div class="row" ><!-- 2 row Starts -->

<div class="col-lg-12" ><!-- col-lg-12 Starts -->

<div class="panel panel-default" ><!-- panel panel-default Starts -->

<div class="panel-heading" ><!-- panel-heading Starts -->

<h3 class="panel-title" ><!-- panel-title Starts -->

<i class="fa fa-money fa-fw" ></i> Other Offerings

</h3><!-- panel-title Ends -->


</div><!-- panel-heading Ends -->

<div class="panel-body" ><!-- panel-body Starts -->
<?php if(isset($_POST['others'])&&isset($_SESSION['message'])){echo "<h4 style='color:green'>".$_SESSION['message']."</h4>";} $_SESSION['message']  = "";  ?>
<div class="table-responsive" ><!-- table-responsive Starts -->
<table class="table table-bordered table-hover table-striped" ><!-- table table-bordered table-hover table-striped Starts -->

<thead><!-- thead Starts -->

<tr>
<th width="15%" style="text-align: center;">Loose Offering</th>
<th width="15%" style="text-align: center;">Mission Offering</th>
<th width="15%" style="text-align: center;">Sabbath School Offering</th>
<th width="15%" style="text-align: center;">Baby Dedication</th>
<th width="15%" style="text-align: center;">Add</th>
</tr>

</thead><!-- thead Ends -->

<tbody><!-- tbody Starts -->
<form action="" method="post">
<tr>

<td style="text-align: center;">

    
      <label for="inputEmail4" ><span><?php if (in_array("<span style='color: red;'>Only numbers are allowed in loos offering field<br>", $error_messsage)) {
  echo "<span style='color: red;'>Only numbers are allowed<br>";
} ?></span></label>
      <input width="25" type="text" name="loose" class="form-control"  value="<?php if(isset($_SESSION['loose'])){
        echo $_SESSION['loose'];
      } ?>" placeholder='0.00.....Optional'>
 


</td>
<td style="text-align: center;">

      <label for="inputEmail4" ><span><?php if (in_array("<span style='color: red;'>Only numbers are allowed in mission field<br>", $error_messsage)) {
     echo "<span style='color: red;'>Only numbers are allowed<br>";
     } ?></span></label>
      <input type="text" name="mission" class="form-control"  value="<?php if(isset($_SESSION['mission'])){
        echo $_SESSION['mission'];
      } ?>" placeholder='0.00.....Optional'>

</td>
<td style="text-align: center;">
    <label for="inputEmail4" ><span><?php if (in_array("<span style='color: red;'>Only numbers are allowed in Sabbath School field<br>", $error_messsage)) {
  echo "<span style='color: red;'>Only numbers are allowed<br>";
} ?></span></label>
      <input type="text" name="sabbath" class="form-control"  value="<?php if(isset($_SESSION['sabbath'])){
        echo $_SESSION['sabbath'];
      } ?>" placeholder='0.00.....Optional'>
</td>

<td>
    <label for="inputEmail4" ><span><?php if (in_array("<span style='color: red;'>Only numbers are allowed in baby dedication field<br>", $error_messsage)) {
  echo "<span style='color: red;'>Only numbers are allowed<br>";
} ?></span></label>
      <input type="text" name="baby" class="form-control"  value="<?php if(isset($_SESSION['baby'])){
        echo $_SESSION['baby'];
      } ?>" placeholder='0.00.....Optional'>
</td>


<td style="text-align: center;">
    <label for="inputEmail4" ><span></span></label>
    <input type="submit" value="Enter" name="others" class="btn btn-primary form-control"></td>
</tr>
</form>

</tbody><!-- tbody Ends -->



</table><!-- table table-bordered table-hover table-striped Ends -->

</div><!-- table-responsive Ends -->


</div><!-- panel-body Ends -->


</div><!-- panel panel-default Ends -->


</div><!-- col-lg-12 Ends -->



</div><!-- 2 row Ends -->





<?php }  ?>