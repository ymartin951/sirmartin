<?php

if(!isset($_SESSION['log_email'])){

echo "<script>window.open('login.php','_self')</script>";

}

else {


?>

<?php

//Only admin can delete a user
      if(isset($_SESSION['log_email'])){
        $log_email =  $_SESSION['log_email'];
      }

  $user_role  =  mysqli_query($con,"SELECT role FROM users WHERE email='$log_email'");
  $res  =  mysqli_fetch_array($user_role);

  $urole =  $res['role'];

if ($urole!='Admin'){
        echo "<script> alert('You are not permitted to delete a user')</script>"; 
        echo "<script>window.open('index.php?view_users','_self')</script>";

    }elseif(isset($_GET['church_delete'])){

$delete_id = $_GET['church_delete'];

$delete_user = "delete from churches where id='$delete_id'";

$run_delete = mysqli_query($con,$delete_user);

if($run_delete){

echo "<script>alert('One church Has Been Deleted')</script>";

echo "<script>window.open('index.php?view_churches','_self')</script>";

}


}


?>

<?php } ?>