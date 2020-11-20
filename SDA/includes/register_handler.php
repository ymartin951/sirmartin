




<?php
//Declaring variables to prevent errors

$password = ""; //password
$password2 = ""; //password 2
$date = ""; //Sign up date 
$user_role ="";
$gender    = "";
$occupation ="";
$name       = "";
$rank       = "";
$error_array = array(); //Holds error messages
$phone = "";
$address = "";
$Station  = "";



if (isset($_SESSION['type'])) {
	$type = $_SESSION['type'];
}

if(isset($_POST['register_button'])){

		//email
	$em = strip_tags($_POST['email']); //Remove html tags
	$em = str_replace(' ', '', $em); //remove spaces
	$em = ucfirst(strtolower($em)); //Uppercase first letter
	$_SESSION['email'] = $em; //Stores email into session variable


	//Password
	// $address  = strip_tags($_POST['add']);
	$_SESSION['add'] = $address;
	$password = strip_tags($_POST['password']); //Remove html tags
	$password2 = strip_tags($_POST['password2']); //Remove html tags

	$user_role = strip_tags($_POST['user_role']);

	$Station = strip_tags($_POST['station']);
	$confQuery = mysqli_query($con,"SELECT * FROM users WHERE station_id=$Station AND '$type' =type");

   $confnum_rows  = mysqli_num_rows($confQuery);

	 if($confnum_rows>0){
	 	array_push($error_array, "<span style='color: red;'>Already Registered<br>");
	 }



    $user_query  = mysqli_query($con,"SELECT * FROM users WHERE station_id= $Station AND '$type' =type");


    $count = mysqli_num_rows($user_query);

    if($count==0 && $user_role=='User'){
    	array_push($error_array, "<span style='color: red;'>First User must be an admin<br>");

    }

    if($count>0&& $user_role=='Admin'){
    	array_push($error_array, "<span style='color: red;'>Contact Admin to add you to users<br>");
    }

    if($count>0&& $user_role=='User'){
    	array_push($error_array, "<span style='color: red;'>Contact Admin to add you to users<br>");
    }


	//$gender = strip_tags($_POST['gender']);

	//$name = strip_tags($_POST['name']);
     //$_SESSION['name']  = $name;

	//$rank = strip_tags($_POST['rank']);

	//$_SESSION['rank']  = $rank;//Storing rank value into a session variable


	//$phone  =  strip_tags($_POST['phone']);

	//$_SESSION['phone'] = $phone;



	$date = date("Y-m-d"); //Current date


    //checking if user role is not empty
	if (empty($user_role)) {
		
		array_push($error_array, "<span style='color: red;'>Select User role<br>");
	}

	 if (empty($Station)) {
      array_push($error_array, "<span style='color: red;'>Select Station<br>");
    }


     //checking to see if user exist for this  Agency

	/*
      $u_query = mysqli_query($con,"SELECT * FROM users WHERE type='$type'");

      $row   = mysqli_fetch_assoc($u_query);

      $rows = mysqli_num_rows($u_query);

      if($rows>0&&$type=='Prison'||$type=='Court'||$type=='Police'){

      	array_push($error_array, "");

      }elseif($rows>0){
      	array_push($error_array, "<span style='color: red;'>You cannot register, contact admin to register you<br>");
      }else{
      	//if user does not exist for this hospital then first user must be an admin
      	if($user_role!='Admin'){
      		array_push($error_array, "<span style='color: red;'>First user must be an Admin<br>");

      	}
      }
*/


if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
 array_push($error_array, "<span style='color: red;'>Only letters and white space are allowed<br>"); 
}

		//Check if email is in valid format 
		if(filter_var($em, FILTER_VALIDATE_EMAIL)) {

			$em = filter_var($em, FILTER_VALIDATE_EMAIL);

			//Check if email already exists 
			$e_check = mysqli_query($con, "SELECT email FROM users WHERE email='$em'");

			//Count the number of rows returned
			$num_rows = mysqli_num_rows($e_check);

			if($num_rows > 0) {
				array_push($error_array, "<span style='color: red;'>Email already in use<br>");
			}

		}
		else {
			array_push($error_array, "<span style='color: red;'>Invalid email format<br>");
		}
      
      // if (empty($address)) {
      // 	array_push($error_array, "<span style='color: red;'>provide address<br>");
      // }
    
	if($password != $password2) {
		array_push($error_array,  "<span style='color: red;'>Your passwords do not match<br>");
	}
     

// if(empty($rank)){
     
//      array_push($error_array, "<span style='color: red;'>Rank cannot be empty<br>");
// }

// if(empty($phone)){
     
//      array_push($error_array, "<span style='color: red;'>Enter mobile number<br>");
// }

// if(strlen($phone)<10){
     
//      array_push($error_array, "<span style='color: red;'>Invalid number<br>");
// }

// if(empty($gender)){
// 	array_push($error_array, "<span style='color: red;'>Select gender<br>");
// }
	
if (isset($_SESSION['type'])) {
			$type = $_SESSION['type'];
		}

	if(empty($error_array)) {

$password = password_hash($password, PASSWORD_DEFAULT);



//Inserting User information

$query = mysqli_query($con, "INSERT INTO users(station_id,password,email,role,date_added,type) VALUES ($Station,'$password','$em','$user_role','$date','$type')");


		echo "<script> alert('Registration successfull,please login')</script>";

		//if The registration is successfull, then login page will open for user to login

		

		echo  "<script>window.open('login.php?type=$type','_self')</script>";

		//Clear session variables 
         
         $_SESSION['email'] = '';
         

 		
		
	}

}
?>