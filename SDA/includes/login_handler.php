

<?php 

/*GET THE CURRENT DATE Start*/
 $dateNow  = date('Y-m-d H:i:s');
 $dayMonth = date('d M Y', strtotime($dateNow));
 $day      = date('d',strtotime($dateNow));

 switch ($day) {
  case $day<=7:
    $_SESSION['week'] = 1;
    break;
    case $day<=14:
    $_SESSION['week'] = 2;
    break;
    case $day<=21:
    $_SESSION['week'] = 3;
    break;
  case $day<=28:
    $_SESSION['week'] = 4;
    break;
  default:
    $_SESSION['week'] = 5;
    break;
}

if (isset($_SESSION['type'])) {
			$type = $_SESSION['type'];
		}

$error_message = array(); 

if(isset($_POST['login'])){

$user_email = mysqli_real_escape_string($con,$_POST['log_email']);
$_SESSION['log_email']=$user_email;
$user_pass  = mysqli_real_escape_string($con,$_POST['password']);


$get_user = "SELECT * FROM users WHERE email='$user_email' AND type='$type'";

$run_user = mysqli_query($con,$get_user);

$getPass  =mysqli_fetch_array($run_user);

$count    = mysqli_num_rows($run_user);
$password_hash = $getPass['password'];


if($count==1&&password_verify($user_pass, $password_hash)){
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
  $audit_query = "INSERT INTO audit(station_id,username,action,affected,date) VALUES($id,'$log_username','Login','Only Login','$date_added')";

  mysqli_query($con,$audit_query);

 //if login, then go to dashboard
echo "<script>alert('Welcome to Your Dashboard')</script>";

echo "<script>window.open('index.php?dashboard&type=$type','_self')</script>";

}
else {
 
 array_push($error_message, "Email or password is incorrect<br>");
// echo "<script>alert('Email or Password is Wrong')</script>";

}

}

?>