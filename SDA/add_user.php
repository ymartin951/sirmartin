<?php




$location          =  ""; 
$crimeT           =  "";
$date              =  ""; 
$desc           =  ""; 
$Station        = "";
$error_messsage       = array(); 
$time               = "";


//get current user login id
// if (isset($_SESSION['log_email'])) {
// 	$email=$_SESSION['log_email'];

// 	$query = mysqli_query($con,"SELECT * FROM users WHERE email = '$email'");
// 	$result = mysqli_fetch_array($query);
// 	$id  =  $result['id'];
// }


//if the submit button is clicked


//Only admin can add a new user
      if(isset($_SESSION['log_email'])){
        $log_email =  $_SESSION['log_email'];
      }

  $user_role  =  mysqli_query($con,"SELECT role FROM users WHERE email='$log_email'");
  $res  =  mysqli_fetch_array($user_role);

  $urole =  $res['role'];

if ($urole!='Admin'){
        echo "<script> alert('You are not permitted to add user')</script>"; 
        echo "<script>window.open('index.php?view_users','_self')</script>";

    }elseif(isset($_POST['add_user'])){

  if (isset($_SESSION['station_id'])) {
   $id  =  $_SESSION['station_id'];
  }

  if (isset($_SESSION['type'])) {
   $type  =  $_SESSION['type'];
  }

  /*
$admin_name = $_POST['admin_name'];

 if (!preg_match("/^[a-zA-Z ]*$/",$admin_name)) {
       array_push($error_messsage, "<span style='color: red;'>Only characters are allowed<br>");
    }
<?php if (in_array("<span style='color: red;'>Only characters are allowed<br>", $error_messsage)) {
  echo "<span style='color: red;'>Only characters are allowed<br>";
} ?>
*/

 


  // $location                = mysqli_real_escape_string($con,$_POST['location']);
  // $_SESSION['location']    = $location;

  $name                = mysqli_real_escape_string($con,$_POST['uname']);
  $_SESSION['uname']    = $name;

  if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
       array_push($error_messsage, "<span style='color: red;'>Only characters are allowed<br>");
    }
   
   //$Station                = mysqli_real_escape_string($con,$_POST['station']);

  // $crimeT             = mysqli_real_escape_string($con,$_POST['crimeT']);
  // $_SESSION['crimeT'] = $crimeT;

  $email               = mysqli_real_escape_string($con,$_POST['email']);
  $_SESSION['email']   = $email;
  
 $password               = mysqli_real_escape_string($con,$_POST['password']);
 $_SESSION['password']   = $password;
  

  $date_added                  = date("Y-m-d"); //Current date
 

    
    // if (empty($location)) {
    //   array_push($error_messsage, "<span style='color: red;'>Location Require<br>");
    // }

  $e_check = mysqli_query($con, "SELECT email FROM users WHERE email='$email'");

			//Count the number of rows returned
			$num_rows = mysqli_num_rows($e_check);

			if($num_rows > 0) {
				array_push($error_messsage, "<span style='color: red;'>Email already in use<br>");
			}

    if(strlen($name)<4){
      array_push($error_messsage, "<span style='color: red;'>Name too short<br>");
    }

    if (empty($password)) {
       array_push($error_messsage, "<span style='color: red;'>Password required<br>");
    }

    if (empty($email)) {
      array_push($error_messsage, "<span style='color: red;'>Email required<br>");
    }

    // if(empty($crimeT)){

    //   array_push($error_messsage,"<span style='color: red;'>Crime type Required<br>");
    // 


    // if (empty($desc)) {
    //   array_push($error_messsage, "<span style='color: red;'>Statement<br>");
    // }




if(empty($error_messsage)) {
    $password = password_hash($password, PASSWORD_DEFAULT);

  $query = "INSERT INTO users(station_id,name,email,password,type)
            VALUES($id,'$name','$email','$password','$type')";
    
    $run_query = mysqli_query($con,$query);
    if(!$run_query){
      die("Fail to lordge complaint!!".mysqli_error($con));
    }else{


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
  $audit_query = "INSERT INTO audit(station_id,username,action,affected,date) VALUES($id,'$log_username','Added a User','$name','$date_added')";

  mysqli_query($con,$audit_query);


    //************************Audit information ends ***************//

        echo "<script> alert('User has been added successfully')</script>"; 
        echo "<script>window.open('index.php?view_users','_self')</script>";



$_SESSION['uname']  = "";
$_SESSION['email']   = "";
$_SESSION['date']         = "";
$_SESSION['location']     = "";
$_SESSION['sname']         = "";

    }


   

  }
    

  
}










?>


<h1 style="text-align: center; margin-bottom: 30px;">Add User Details</h1>

<form method="post" action="" enctype="multipart/form-data">

	<div class="col-md-6 col-md-offset-3">

    <div class="form-row">
    <div class="form-group col-md-12">
      <label for="inputEmail4" >Name Of user <span><?php if (in_array("<span style='color: red;'>Only characters are allowed<br>", $error_messsage)) {
  echo "<span style='color: red;'>Only characters are allowed<br>";
} ?></span></label>
       <?php if (in_array("<span style='color: red;'>Name too short<br>", $error_messsage)) {
          echo "<span style='color: red;'>name is too short<br>";
        } ?>
      <input type="text" name="uname" min="4" max="8" class="form-control"  value="<?php if(isset($_SESSION['uname'])){
        echo $_SESSION['uname'];
      } ?>" required>
    </div>

     <div class="form-group col-md-12">
      <label for="inputZip">Email</label>
       <?php if (in_array("<span style='color: red;'>Email required<br>", $error_messsage)) {
          echo "<span style='color: red;'>Required<br>";
        }else{
          if(in_array("<span style='color: red;'>Email already in use<br>",$error_messsage)){
            echo "<span style='color: red;'>Email already in use<br>";
          }
        } ?>
      <input type="text" name="email" class="form-control" id="inputZip" value="<?php if(isset($_SESSION['email'])){
        echo $_SESSION['email'];
      } ?>" required>
    </div>
     <div class="form-group col-md-12">
      <label for="inputZip">Password</label>
       <?php if (in_array("<span style='color: red;'>Password required<br>", $error_messsage)) {
          echo "<span style='color: red;'>Required<br>";
        } ?>
      <input type="text" name="password" class="form-control" id="inputZip" required>
    </div>
   
  </div>


 <!--  <div class="form-row">
    <div class="form-group col-md-12">
      <label for="inputEmail4" >Location of Crime</label>
       <?php //if (in_array("<span style='color: red;'>Location Require<br>", $error_messsage)) {
          //echo "<span style='color: red;'>Required<br>";
        //} ?>
      <input type="text" name="location" class="form-control" id="inputEmail4" value="<?php //if(isset($_SESSION['location'])){
        //echo $_SESSION['location'];
      //} ?>">
    </div>
   
  </div> -->
  <div class="form-group col-md-12">
  <input type="submit" name="add_user" class="btn btn-primary form-control">
  </div>
  </div>
</form>




