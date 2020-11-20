<?php

function update_user(){
    if(isset($_POST['submit'])){
    	 

      if(isset($_GET['user_profile'])){
        $user_id =  $_GET['user_profile'];
      }
global $con;
if (isset($_SESSION['log_email'])) {
                        $u_email = $_SESSION['log_email'];
                      } 
                      
                      $q = mysqli_query($con,"SELECT* FROM users WHERE email='$u_email'");

                      $r = mysqli_fetch_array($q);

                      $u_r = $r['user_role'];
                      $g   = $r['gender'];
                      $u_id= $r['id'];
$user_name = $_POST['user_name'];
$full_name = $_POST['full_name'];

$user_email = $_POST['e_mail'];

$user_role  = $_POST['user_role'];

$password = $_POST['password'];

$user_location = $_POST['location'];

$user_occupation = $_POST['occupation'];

$user_contact = $_POST['contact'];

$address = $_POST['address'];
$gender   = $_POST['gender'];
$hospital = $_POST['hospital'];


$user_image = $_FILES['user_image']['name'];

$temp_user_image = $_FILES['user_image']['tmp_name'];


if(empty($user_image)){

$user_image = $new_user_image;
    
}

if ($u_r=='User' && $user_role=='Admin') {

	echo "<script>alert('Only Admin can change your role to Admin')</script>";
    
    echo "<script>window.open('index.php?user_profile=$u_id','_self')</script>";
	
}else{
    
move_uploaded_file($temp_user_image,"admin_images/$user_image");



$update_user = "UPDATE users SET full_name='$full_name',gender='$gender',user_role='$user_role',user_name='$user_name',email='$user_email',contact='$user_contact',occupation= '$user_occupation',address='$address',location='$user_location',password='$password',profile='$user_image' WHERE id = $user_id";

$run_user = mysqli_query($con,$update_user);
    
    
    if($run_user){
    
echo "<script>alert('User Has Been Updated successfully please login again')</script>";
    
    echo "<script>window.open('login.php','_self')</script>";

session_destroy();

}
}
    
}

}

function users_online(){
  global $con;

$session = session_id();
$time =    time();
$timeOutInSeconds = 60;
$timeOut = $time - $timeOutInSeconds;
$query = "SELECT * FROM usersonline WHERE session = '$session'";
$send_query =mysqli_query($con,$query);
$count = mysqli_num_rows($send_query);
if($count==NULL){
    mysqli_query($con,"INSERT INTO usersonline(session,time_in) VALUES('$session','$time')");
}else{
    mysqli_query($con, "UPDATE usersonline SET time_in = '$timeOut' WHERE session = '$session'");
}

$usersOnline =mysqli_query($con,"SELECT * FROM usersOnline WHERE time_in> '$timeOut'");
return $count_usersOnline = mysqli_num_rows($usersOnline);


}





 ?>