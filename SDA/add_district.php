<?php

$location          =  ""; 
$crimeT           =  "";
$date              =  ""; 
$desc           =  ""; 
$Station        = "";
$error_messsage       = array(); 
$time               = "";


//if the submit button is clicked

if(isset($_POST['add_district'])){

  if (isset($_SESSION['station_id'])) {
   $id  =  $_SESSION['station_id'];
  }




  $name                    = mysqli_real_escape_string($con,$_POST['district']);
  $_SESSION['district']    = $name;

  if (!preg_match("/^[a-zA-Z- ]*$/",$name)) {
       array_push($error_messsage, "<span style='color: red;'>Only characters are allowed<br>");
    }
   
    if(strlen($name)<4){
      array_push($error_messsage, "<span style='color: red;'>Name too short<br>");
    }
  


  if(empty($error_messsage)) {

  $query = "INSERT INTO districts(station_id,name)
            VALUES($id,'$name')";
    
    $run_query = mysqli_query($con,$query);
    if(!$run_query){
      die("Fail to add church!!".mysqli_error($con));
    } else{

     
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
   $date_added            = date("Y-m-d H:i:s"); //Current date
   //if login, then insert user action into audit      
  $audit_query = "INSERT INTO audit(station_id,username,action,affected,date) VALUES($id,'$log_username','Added a Police Officer','$name','$date_added')";

  mysqli_query($con,$audit_query);


    //************************Audit information ends ***************//




        echo "<script> alert('District Added')</script>"; 
        echo "<script>window.open('index.php?add_districts','_self')</script>";



$_SESSION['district']  = "";

    }


   

  }
    

  
}










?>


<h1 style="text-align: center; margin-bottom: 30px;">Add District</h1>

<form method="post" action="" enctype="multipart/form-data">

	<div class="col-md-6 col-md-offset-3">

    <div class="form-row">
    <div class="form-group col-md-12">
      <label for="inputEmail4" >Name Of District <span><?php if (in_array("<span style='color: red;'>Only characters are allowed<br>", $error_messsage)) {
  echo "<span style='color: red;'>Only characters are allowed<br>";
} ?></span></label>
       <?php if (in_array("<span style='color: red;'>Name too short<br>", $error_messsage)) {
          echo "<span style='color: red;'>name is too short<br>";
        } ?>
      <input type="text" name="district" maxlength="20" class="form-control"  value="<?php if(isset($_SESSION['district'])){
        echo $_SESSION['district'];
      } ?>" required>
    </div>

     

  <div class="form-group col-md-12">
  <input type="submit" name="add_district" class="btn btn-primary form-control">
  </div>
  </div>
</form>




