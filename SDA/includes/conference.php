

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



<li><!-- church li Starts -->

<a href="#" data-toggle="collapse" data-target="#Specialists">

<i class=" fa fa-fw fa-home"></i>Churches
<i class="fa fa-fw fa-caret-down"></i>


</a>

<ul id="Specialists" class="collapse">

<li>
<a href="index.php?add_churches"> Add Churches</a>
</li>

<li>
<a href="index.php?view_churches">View Churches</a>
</li>


</ul>

</li><!-- church li Ends -->



<li><!-- district li Starts -->

<a href="#" data-toggle="collapse" data-target="#districts">

<i class=" fa fa-fw fa-home"></i>Districts
<i class="fa fa-fw fa-caret-down"></i>


</a>

<ul id="districts" class="collapse">

<li>
<a href="index.php?add_districts">Add Districts</a>
</li>

<li>
<a href="index.php?view_districts">View Districts</a>
</li>


</ul>

</li><!-- district li Ends -->


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