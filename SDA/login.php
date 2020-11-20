<?php session_start(); ?>
<?php ob_start(); ?>

<?php if(!isset($_GET['type'])){header('Location:home.php');}else{$_SESSION['type']=$_GET['type'];}?>

<?php  
require 'includes/db.php';
require 'includes/register_handler.php';
require 'includes/login_handler.php';
?>

<html>
<head>
<title>SDA T&S</title>
<link rel="stylesheet" type="text/css" href="css/register_style.css">
<script src="js/jquery.min.js"></script>
<script src="js/signup.js"></script>
</head>
<body>

<?php  

if(isset($_POST['register_button'])) {
echo '
<script>

$(document).ready(function() {
$("#first").hide();
$("#second").show();
});

</script>

';
}


?>


<!-- <h1 id="head">E-referral</h1> -->





<div class="wrapper">
<h1 style="text-align: center; margin-top: 25px; font-family: 'Bellota-BoldItalic', sans-serif;"><?php 


if($_GET['type']!='Regular'){echo $_GET['type'].' '.'Officials Login/Register';}else{
	echo $_GET['type'].' '.'Users Login/Register';

} 


?></h1>
<div class="login_box">

<div class="login_header">
<h3>TITHE & OFFERING PAPERLESS</h3>
</div>
<br>
<div id="first">

<form action="" method="POST">
<input type="email" name="log_email" placeholder="Email Address" value="<?php 
if(isset($_SESSION['email'])) {
    echo $_SESSION['email'];} 
?>" required autofocus>
<br>
<input type="password" name="password" placeholder="Password">
<br>
<?php if(in_array("Email or password is incorrect<br>", $error_message)) echo  "<h6 style='color:red'>incorrect Email or Password!!</h6><br>"; ?>
<input type="submit" name="login" value="Login">

<br>
<a href="#" id="signup" class="signup">No account? Register here!</a>

</div>
</form>

<div id="second">

				<form action="" method="POST">



					<?php if (in_array("<span style='color: red;'>Email already in use<br>", $error_array)) {
						echo "<span style='color: red; font-size:12px;'>Email already in use<br>";
					}else{
						if(in_array("<span style='color: red;'>Invalid email format<br>", $error_array)){
							echo "<span style='color: red; font-size:12px;'>Invalid email format<br>";
						}
					} ?>

					<input type="email" name="email" placeholder="Email" value="<?php 
					if(isset($_SESSION['email'])) {
						echo $_SESSION['email'];
					} 
					?>" required> <br>
					<?php if(in_array("<span style='color: red;'>Enter mobile number<br>", $error_array)){
							echo "<span style='color: red; font-size:12px;'>Enter mobile number<br>";
						}else{
						if (in_array("<span style='color: red;'>Invalid number<br>", $error_array)) {
							echo "<span style='color: red; font-size:12px;'>Invalid number<br>";
						}
					} ?>
					
                       <?php if (in_array("<span style='color: red;'>Your passwords do not match<br>", $error_array)) {
						echo "<span style='color: red; font-size:12px;'>Passwords do not match<br>";
					} ?>
					<input type="password" name="password" placeholder="Password" required>
					<br>
					<input type="password" name="password2" placeholder="Confirm Password" required>
					<br>

					
        
      
      <?php if (in_array("<span style='color: red;'>Select Station<br>", $error_array)) {
          echo "<span style='color: red;'>Required<br>";
        }else{
        	if (in_array("<span style='color: red;'>Already Registered<br>", $error_array)) {
        		echo "<span style='color: red;'>Already Registered<br>";
        	}}?>
      <select id="station" name="station" class="form-control" required>
        <option value="" >My Station....</option>
        <?php
        if(isset($_GET['type'])){
          $type = $_GET['type'];
        }
         
          if($type=='Conference'){
            $query = "SELECT * FROM conferences";
          }

          if($type=='Lchurch'){
            $query = "SELECT * FROM churches";
          }

         $query  =  mysqli_query($con,$query);
           
           while($row = mysqli_fetch_array($query)){

           	?>

           	<option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>

           	<?php
           }

         ?>
        
        
      </select><br>
  
					


					
                           
                           <?php if (in_array("<span style='color: red;'>Select User role<br>", $error_array)) {
                           	echo "<span style='color: red; font-size:12px;'>Select User role<br>";
                           }else{

                           	if(in_array("<span style='color: red;'>First User must be an admin<br>", $error_array)){
                           		echo "<span style='color: red; font-size:12px;'>First user Must be an admin</span><br>";

                           	}else{
                              if(in_array("<span style='color: red;'>Contact Admin to add you to users<br>", $error_array)){
                              echo "<span style='color: red;'>Contact Admin to add you to users<br>";

                            }else{
                              if(in_array("<span style='color: red;'>Contact Admin to add you to users<br>", $error_array)){
                              echo "<span style='color: red;'>Contact Admin to add you to users<br>";

                            }
                            }
                            
                            }
                           } ?>

                           <select name="user_role" id="role" class="form-control">
                           <option value="">Select User Role</option>

                          
                             <option value="Admin">Admin</option>
                             <option value="User">User</option>
                         
                             
                      
                           </select>
                      <br>
                      

                      


					<input type="submit" name="register_button" value="Register">
					<br>

			
					<a href="#" id="signin" class="signin">Already have an account? Sign in here!</a>
				</form>
			</div>

</div>

</div>


</body>
</html>