<?php

$location          =  ""; 
$crimeT           =  "";
$date              =  ""; 
$desc           =  ""; 
$Station        = "";
$error_messsage       = array(); 
$time               = "";


//if the submit button is clicked

if(isset($_POST['add_church'])){

  if (isset($_SESSION['station_id'])) {
   $id  =  $_SESSION['station_id'];
  }




  $name                = mysqli_real_escape_string($con,$_POST['Oname']);
  $_SESSION['Oname']    = $name;

  if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
       array_push($error_messsage, "<span style='color: red;'>Only characters are allowed<br>");
    }
   
   
 $location               = mysqli_real_escape_string($con,$_POST['location']);
 $_SESSION['location']   = $location;
  

 $district               = mysqli_real_escape_string($con,$_POST['district']);
 $_SESSION['district']   = $district;


  $date_added                  = date("Y-m-d"); //Current date
 

    if(strlen($name)<4){
      array_push($error_messsage, "<span style='color: red;'>Name too short<br>");
    }

    if (empty($location)) {
      array_push($error_messsage, "<span style='color: red;'>Location required<br>");
    }
  


  if(empty($error_messsage)) {

  $query = "INSERT INTO churches(station_id,name,location,district)
            VALUES($id,'$name','$location','$district')";
    
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




        echo "<script> alert('Church has been added successfully')</script>"; 
        echo "<script>window.open('index.php?view_churches','_self')</script>";



$_SESSION['Oname']  = "";
$_SESSION['rak']   = "";
$_SESSION['date']         = "";
$_SESSION['location']     = "";
$_SESSION['district']         = "";

    }


   

  }
    

  
}










?>


<h1 style="text-align: center; margin-bottom: 30px;">Church Details</h1>

<form method="post" action="" enctype="multipart/form-data">

	<div class="col-md-6 col-md-offset-3">

    <div class="form-row">
    <div class="form-group col-md-12">
      <label for="inputEmail4" >Name Of Church <span><?php if (in_array("<span style='color: red;'>Only characters are allowed<br>", $error_messsage)) {
  echo "<span style='color: red;'>Only characters are allowed<br>";
} ?></span></label>
       <?php if (in_array("<span style='color: red;'>Name too short<br>", $error_messsage)) {
          echo "<span style='color: red;'>name is too short<br>";
        } ?>
      <input type="text" name="Oname" maxlength="20" class="form-control"  value="<?php if(isset($_SESSION['Oname'])){
        echo $_SESSION['Oname'];
      } ?>" required placeholder="Enter name of church" title="You are to enter the name of the church here">
    </div>

     <div class="form-group col-md-12">
      <label for="Gender" >Ditrict</label>
         
      <select name="district" id="" required class="form-control" title="Make sure districts have been added before you can select from here">
      	<option value="">Select Districts.........</option>
        <?php 
        if(isset($_SESSION['station_id'])){
          $id =  $_SESSION['station_id'];
        }
           $dquery   =  mysqli_query($con,"SELECT* FROM districts WHERE station_id= $id");

           while ($row =  mysqli_fetch_array($dquery)) {
             ?>
              <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>

        <?php     
           }


         ?>
      	
      </select>

    </div>

     <div class="form-group col-md-12">
      <label for="inputZip">Location</label>
       <?php if (in_array("<span style='color: red;'>Loction required<br>", $error_messsage)) {
          echo "<span style='color: red;'>Required<br>";
        }?>
      <input type="text" name="location" min="3" class="form-control" id="inputZip" value="<?php if(isset($_SESSION['location'])){
        echo $_SESSION['location'];
      } ?>" required placeholder="Enter location" title="Where can this church be located">
    </div>  
  </div>

  <div class="form-group col-md-12">
  <input type="submit" name="add_church" class="btn btn-primary form-control">
  </div>
  </div>
</form>




