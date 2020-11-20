

<?php 
if (isset($_SESSION['log_email'])) {
	$email    = $_SESSION['log_email'];
}


$user   =  mysqli_query($con,"SELECT * FROM users WHERE email = '$email'");
$get    = mysqli_fetch_array($user);

$id      = $get['id'];

 ?>




<ul class="nav navbar-nav side-nav"><!-- nav navbar-nav side-nav Starts -->

<li><!-- li Starts -->

<a href="index.php?dashboard">

<i class="fa fa-fw fa-dashboard"></i> Dashboard

</a>

</li><!-- li Ends -->

<li><!-- specialist li Starts -->

<!-- <a href="#" data-toggle="collapse" data-target="#hospital">

<i class="fa fa-pencil"></i> Audit
<i class="fa fa-fw fa-caret-down"></i>


</a> -->

<ul id="hospital" class="collapse">

<!-- <li>
<a href="index.php?hospital_info">Update Hospital Info</a>
</li>
 -->
<li>
<a href="#">View</a>
</li>



</ul>

</li><!-- specialist li Ends -->



<li><!-- officers li Starts -->

<a href="#" data-toggle="collapse" data-target="#Specialists">

<i class=" fa fa-fw fa-group"></i> TITHE&OFFERING PAYERS
<i class="fa fa-fw fa-caret-down"></i>


</a>

<ul id="Specialists" class="collapse">

<li>
<a href="index.php?add_payer">Add Payer</a>
</li>

<li>
<a href="index.php?view_payers">View Payers</a>
</li>

<li>
<a href="index.php?receipt">Entire Receipts</a>
</li>


</ul>

</li><!-- officers li Ends -->

<li><!-- officers li Starts -->

<a href="#" data-toggle="collapse" data-target="#otherofferings">

<i class=" fa fa-fw fa-money"></i>Other Offerings
<i class="fa fa-fw fa-caret-down"></i>


</a>

<ul id="otherofferings" class="collapse">

<li>
<a href="index.php?otherofferings">Add</a>
</li>


</ul>

</li><!-- officers li Ends -->
<li><!-- report li Starts -->

<a href="#" data-toggle="collapse" data-target="#report">

<i class=" fa fa-fw fa-book"></i>Reports
<i class="fa fa-fw fa-caret-down"></i>


</a>

<ul id="report" class="collapse">

<li>
<a href="index.php?report">Get Report</a>
</li>


</ul>

</li><!-- report li Ends -->
<li><!-- li Starts -->

<a href="#" data-toggle="collapse" data-target="#users">

<i class="fa fa-fw fa-user"></i> Users

<i class="fa fa-fw fa-caret-down"></i>


</a>

<ul id="users" class="collapse">

<li>
<a href="index.php?add_user"> Add User </a>
</li>

<li>
<a href="index.php?view_users"> View Users </a>
</li>



<li>
<a href="index.php?user_profile=<?php echo $id;?>"> Edit Profile </a>
</li>

</ul>

</li><!-- li Ends -->

<li><!-- li Starts -->

<a href="logout.php">

<i class="fa fa-fw fa-power-off"></i> Log Out

</a>

</li><!-- li Ends -->

</ul><!-- nav navbar-nav side-nav Ends -->