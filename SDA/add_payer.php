<?php

$location          =  ""; 
$crimeT           =  "";
$date              =  ""; 
$desc           =  ""; 
$Station        = "";
$error_messsage       = array(); 
$time               = "";



 if (isset($_SESSION['station_id'])) {
   $id  =  $_SESSION['station_id'];
  }

   if (isset($_SESSION['type'])) {
   $type  =  $_SESSION['type'];
  }

//if the submit button is clicked

if(isset($_POST['add_payer'])){

  $name                = mysqli_real_escape_string($con,$_POST['Oname']);
  $_SESSION['Oname']    = $name;

  if (!preg_match("/^[a-zA-Z&. ]*$/",$name)) {
       array_push($error_messsage, "<span style='color: red;'>Only characters are allowed<br>");
    }
  
  $gender                = mysqli_real_escape_string($con,$_POST['gender']);
  $_SESSION['gender']    = $gender;

  $date_added                  = date("Y-m-d"); //Current date
 

    if(strlen($name)<4){
      array_push($error_messsage, "<span style='color: red;'>Name too short<br>");
    }
  


  if(empty($error_messsage)) {
   
  $query = "INSERT INTO payers(station_id,name,gender,type)
            VALUES($id,'$name','$gender','$type')";
    $success  = "success";
    $_SESSION['success'] = $success;
    $run_query = mysqli_query($con,$query);
    if(!$run_query){
      die("Fail to add payer!!".mysqli_error($con));
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
   $date_added            = date("Y-m-d H:i:s"); //Current date
   //if login, then insert user action into audit      
  $audit_query = "INSERT INTO audit(station_id,username,action,affected,date) VALUES($id,'$log_username','Added a Police Officer','$name','$date_added')";

  mysqli_query($con,$audit_query);


    //************************Audit information ends ***************//



$_SESSION['Oname']  = "";


    }


   

  }
    

  
}










?>


<h1 style="text-align: center; margin-bottom: 30px;">Payer Details</h1>
<h4 style="text-align: center; margin-bottom: 30px; color: green;"><?php if(isset($_POST['add_payer'])&& isset($_SESSION['success'])){
	echo $_SESSION['success'].', '."Continue to add members OR <a href='index.php?record_tithe=$last_record' style='text-decuration:none;'>Record tithe for this member</a>";
} ?></h4>
<form method="post" action="" enctype="multipart/form-data">

	<div class="col-md-6 col-md-offset-3">

    <div class="form-row">
    <div class="form-group col-md-12">
      <label for="inputEmail4" >Name<span><?php if (in_array("<span style='color: red;'>Only characters are allowed<br>", $error_messsage)) {
  echo "<span style='color: red;'>Only characters are allowed<br>";
} ?></span></label>
       <?php if (in_array("<span style='color: red;'>Name too short<br>", $error_messsage)) {
          echo "<span style='color: red;'>name is too short<br>";
        } ?>
      <input type="text" name="Oname" maxlength="100" class="form-control"  value="<?php if(isset($_SESSION['Oname'])){
        echo $_SESSION['Oname'];
      } ?>" required placeholder='Enter name of church member paying tithe'>
    </div>

     <div class="form-group col-md-12">
      <label for="Gender" >Gender</label>
         
      <select name="gender" id="" required class="form-control">
      	<option value="">Select Gender</option>
      	<option value="Male" <?php if(isset($_SESSION['gender'])&&$_SESSION['gender']=='Male') echo "selected"; ?>>Male</option>
      	<option value="Female" <?php if(isset($_SESSION['gender'])&&$_SESSION['gender']=='Female') echo "selected"; ?>>Female</option>
      	<option value="Other" <?php if(isset($_SESSION['gender'])&&$_SESSION['gender']=='Other') echo "selected"; ?>>other</option>
      </select>

    </div>
  </div>

  <div class="form-group col-md-12">
  <input type="submit" name="add_payer" class="btn btn-primary form-control">
  </div>
  </div>
</form>




