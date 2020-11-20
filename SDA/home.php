<!DOCTYPE html>
<html>
<head>
	<title>Official Login</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
	<link href="http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

	<link rel="stylesheet" type="text/css" href="official_login.css">

    <style>
       
        
        .bs{
            border: 15px solid black;

        }

        .bg-img {
  /* The image used */
 /* background-image: url("img_nature.jpg");

  min-height: 380px;

  /* Center and scale the image nicely */
/*  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;*/
  
  /* Needed to position the navbar */
  /*position: relative;*/*/
}

/* Position the navbar container inside the image */
.container1 {
  position: absolute;
  margin: auto;
  width: 100%;
}

/* The navbar */
.topnav {
  overflow: hidden;
  background-color: #333;
}

/* Navbar links */
.topnav a {
  float: left;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.topnav a:hover {
  background-color: #ddd;
  color: black;
}

    </style>
</head>
<body>

    <div class="bg-img">
  <div class="container1">
    <div class="topnav">
      <a href="#home">Home</a>
      <a href="#news">News</a>
      <a href="#contact">Contact</a>
      <a href="#about">About</a>
    </div>
  </div>
</div>

 <div class="container">
  <br><br> <br><br> <br><br> <br><br> <br><br>
        <div class="row text-center">

            <div class="col-md-4 col-sm-12 hero-feature col-md-offset-2">
                <div class="thumbnail bs">
                    <div class="caption">
                        <h3>Conference</h3>
                        <p>
                            <a href="login.php?type=Conference" class="btn btn-primary">Login/Register</a>
                        </p>
                    </div>
                </div>
            </div>

             <div class="col-md-4 col-sm-12 hero-feature">
                <div class="thumbnail bs">
                    <div class="caption">
                        <h3>Local Church</h3>
                        <p>
                            <a href="login.php?type=Lchurch" class="btn btn-primary">Login/Rgister</a>
                        </p>
                    </div>
                </div>
            </div>


            <!-- <div class="col-md-3 col-sm-12 hero-feature">
                <div class="thumbnail bs">
                    <div class="caption">
                        <h3>Regular Users</h3>
                        <p>
                            <a href="login.php?type=Regular" class="btn btn-primary">Login/Rgister</a>
                        </p>
                    </div>
                </div>
            </div> -->

        </div>
</div>
 <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.4.js"></script>
 <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>
</html>