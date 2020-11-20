<?php

session_start();

include("includes/db.php");

if(!isset($_SESSION['log_email'])){

echo "<script>window.open('login.php','_self')</script>";

}

else {




?>

<?php


?>


<!DOCTYPE html>
<html>

<head>

<title>Admin Panel</title>

<link href="css/bootstrap.min.css" rel="stylesheet">

<link href="css/style.css" rel="stylesheet">
<link rel="stylesheet" href="css/pophome.css">
<link href="css/pop.css" rel="stylesheet">
<link rel="stylesheet" href="css_err/style.css">


<link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" >

</head>

<body>

<div id="wrapper"><!-- wrapper Starts -->

<?php include("includes/sidebar.php");  ?>

<div id="page-wrapper"><!-- page-wrapper Starts -->

<div class="container-fluid"><!-- container-fluid Starts -->



<?php 
if (isset($_SESSION['station_id'])) {
  $station_id = $_SESSION['station_id'];
}

if (isset($_SESSION['type'])) {
  $type = $_SESSION['type'];
}
$query_id = mysqli_query($con,"SELECT* FROM churches WHERE station_id=$station_id");
$dis  = mysqli_fetch_array($query_id);
$count_D  = mysqli_num_rows($query_id);
if($count_D<1){
  $district=0;
}else{
  $district = $dis['district'];
}

$_SESSION['district']  = $district;

$dis_query  =  mysqli_query($con,"SELECT * FROM districts WHERE id = $district");


$ch_dis  = mysqli_fetch_array($dis_query);

$district_name = $ch_dis['name'];

?>



<?php

if(isset($_GET['dashboard'])){

include("dashboard.php");

}







if(isset($_GET['l'])){

include("l_comp.php");

}

if(isset($_GET['church_delete'])){
  include("church_delete.php");
}

if(isset($_GET['district_delete'])){
  include("district_delete.php");
}

if(isset($_GET['report'])){
  include("report.php");
}

if(isset($_GET['add_vic'])){

include("add_victim.php");

}

if(isset($_GET['audit'])){
  include_once('audit.php');
}



// if(isset($_GET['export'])){
//   include('export.php');
// }


if(isset($_GET['view_churches'])){

include("view_churches.php");

}

if(isset($_GET['districts'])){

include("view_districts_reports.php");

}

if(isset($_GET['district'])){

include("dreport.php");

}

if(isset($_GET['view_districts'])){

include("view_districts.php");

}

if(isset($_GET['add_districts'])){

include("add_district.php");

}

if(isset($_GET['tithe_breakdown'])){
  include('tbreakdown.php');
}

if(isset($_GET['others_breakdown'])){
  include('othersbreakdown.php');
}

if(isset($_GET['thanks_breakdown'])){
  include('thanksbreakdown.php');
}

if(isset($_GET['offering_breakdown'])){
  include('obreakdown.php');
}

if(isset($_GET['otherofferings'])){
  include('otheroffering.php');
}

if(isset($_GET['church'])&&isset($_GET['name'])){
include('Lchurch_dash.php');
}
if(isset($_GET['add_payer'])){

include("add_payer.php");

}

if(isset($_GET['totalConBreakdown'])){
  include('totalConBreakdown.php');
}


if(isset($_GET['totalLocalBreakdown'])){
  include("totalLocalBreakdown.php");
}


if(isset($_GET['view_payers'])){

include("view_payers.php");

}

if(isset($_GET['record_tithe'])){
  include("tithe.php");
}

if(isset($_GET['payer'])){
  include("receipt.php");
}

if(isset($_GET['receipt'])){
  include("entire_receipt.php");
}

if (isset($_GET['view_comp'])) {

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
  $audit_query = "INSERT INTO audit(station_id,username,action,affected,date) VALUES($id,'$log_username','Viewed Complaints','Nothing was affected, only viewed Complaint informations','$date_added')";

  mysqli_query($con,$audit_query);


    //************************Audit information ends ***************//
	include_once('view_comp.php');
}

if (isset($_GET['view_sus'])) {
	include_once('view_sus.php');
}

if (isset($_GET['viewComp'])) {



	include('viewComp.php');
}

if (isset($_GET['add_churches'])) {
	include('add_churches.php');
}


if (isset($_GET['erro'])) {
	include_once('error.php');
}

if (isset($_GET['add_witness'])) {
	include_once('add_witness.php');
}

if(isset($_GET['Scheduled_cases']))
{
	include('scheduled_cases.php');
}

if(isset($_GET['add_charges']))
{
	include('add_charges.php');
}

if (isset($_GET['complaint'])) {
	include_once('add_sus.php');
}else{
	if(isset($_GET['a_s'])){
		include_once('add_sus.php');
	}
}


if(isset($_GET['myComplaints'])){

include("mycomp.php");

}





if(isset($_GET['view_users'])){

include("view_users.php");

}

if(isset($_GET['add_user'])){

include("add_user.php");

}

if(isset($_GET['v_s'])){

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
  $audit_query = "INSERT INTO audit(station_id,username,action,affected,date) VALUES($id,'$log_username','Viewed All Suspects','Nothing was affected, only viewed some information','$date_added')";

  mysqli_query($con,$audit_query);


    //************************Audit information ends ***************//
include("view_all_suspects.php");

}

if(isset($_GET['user_delete'])){

include("user_delete.php");

}

if(isset($_GET['officer_delete'])){

include("officer_delete.php");

}

if(isset($_GET['time'])){
	include('schedule.php');
}

if(isset($_GET['judge_update'])){
	include('judge_profile.php');
}



if(isset($_GET['user_profile'])){

include("user_profile.php");

}

if(isset($_GET['schedule_details'])){


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
  $audit_query = "INSERT INTO audit(station_id,username,action,affected,date) VALUES($id,'$log_username','Viewed Court Schedules','Nothing was affected, only viewed Court Schedules','$date_added')";

  mysqli_query($con,$audit_query);


    //************************Audit information ends ***************//
	include('view_sch_details.php');

   }

if(isset($_GET['view_witness'])){
	include('view_wit.php');
}

if(isset($_GET['notguilty'])){
	include('notguilt.php');
}

if(isset($_GET['processed_comp']))
{
	include('casesp.php');
}




?>




</div><!-- container-fluid Ends -->

</div><!-- page-wrapper Ends -->

</div><!-- wrapper Ends -->

<script src="js/jquery.min.js"></script>

<script src="js/jquery.PrintArea.js"></script>

<script src="js/bootstrap.min.js"></script>


<script>
  $(document).ready(function(){
    $("#printD").click(function(){
      var mode = 'iframe';
      var close =mode=="popup";
      var options= {mode:mode,popClose:close};
      $("div.printDetails").printArea(options);
    })
  });


  $(function () {
  $('[data-toggle="popover"]').popover()
});


  $("[data-toggle=popover]").each(function(i, obj) {

$(this).popover({
  html: true,
  content: function() {
    var id = $(this).attr('id')
    return $('#popover-content-' + id).html();
  }
});

});
</script>

</body>


</html>

<?php } ?>