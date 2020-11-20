

<a href="javscript:void(0);" class="btn btn-primary form-control" id="printD">Print Audit Sheet</a>
<div class="printDetails">


<div class="panel-body" ><!-- panel-body Starts -->

<div class="table-responsive" ><!-- table-responsive Starts -->

<table class="table table-bordered table-hover table-striped" ><!-- table table-bordered table-hover table-striped Starts -->

<thead>

<tr>
<th class="text-center">UserName</th>
<th class="text-center">Action Performed</th>
<th class="text-center">Affected</th>
<th class="text-center">Date/Time of Performed Action</th>

</tr>

</thead>

<tbody>

<?php


//Get user login
if(isset($_SESSION['station_id'])){

$id = $_SESSION['station_id'];
}

if(isset($_SESSION['log_email'])){
  $user_email = $_SESSION['log_email'];
}


//Get user login Complaint based on id

if(isset($_GET['audit'])){
    $au  = $_GET['audit'];

    if($au =="all"){
      $audit = mysqli_query($con,"SELECT * FROM audit WHERE station_id=$id AND username='$user_email'");
    }else{
      $audit = mysqli_query($con,"SELECT * FROM audit WHERE station_id=$id AND username='$user_email' LIMIT 0,15");
    }
}



while($row=mysqli_fetch_array($audit)){
    $id       = $row['id'];
    $username = $row['username'];
    $action   = $row['action'];
    $affected = $row['affected'];
    $date     = $row['date'];
    
?>

<tr>
<td><?php echo $username; ?></td>
<td><?php echo $action; ?></td>
<td><?php echo $affected; ?></td>
<td><?php echo $date; ?></td>




<!-- <td>

<a href="index.php?delete_com=<?php //echo $com_id; ?>" onClick=" Javascript:return confirm('Are you sure you want to delete this complaint?');">

<i class="fa fa-trash-o"> </i>

</a>

</td> -->




<!-- <td>

<a href="index.php?view_detail=<?php //echo $specialist_id; ?>">

<i class="fa fa-eye"> </i>Details

</a>

</td> 

</tr>




</tbody>
-->
<?php } ?>

</table> 

<!-- table table-bordered table-hover table-striped Ends -->

</div><!-- table-responsive Ends -->

</div><!-- panel-body Ends -->
</div>

<?php

if(isset($_GET['audit'])){
    $au  = $_GET['audit'];

    if($au =="all"){
     
     ?>
     

     <?php
    }else{
      ?>

      <a href="index.php?audit=all" class="btn btn-primary form-control" id="printD" >View All</a>


      <?php
      
    }
} 

 ?>



