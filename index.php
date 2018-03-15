<?php
   session_start();
?>

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> <!-- Fits the page to every device -->
    <meta name="description" content="A Website which will allow you to monitor your stress">
    <meta name="author" content="INSE Group6TeamB"> <!-- INSE team and group name -->

    <title>StressMonitor</title> <!-- Title of page -->

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link rel="stylesheet" href="vendor/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="vendor/simple-line-icons/css/simple-line-icons.css">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Muli" rel="stylesheet">

    <!-- Plugin CSS -->
    <link rel="stylesheet" href="device-mockups/device-mockups.min.css">

    <!-- Custom styles for this template -->
    <link href="css/new-age.min.css" rel="stylesheet">

  </head>

  <body id="page-top">

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" style="color:black;" href="#page-top">StressMonitor</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fa fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#Login">Login</a> <!-- Add login to Nav and creates link back -->
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#Signup">Signup</a> <!-- Add signup to Nav and creates link back -->
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <header class="masthead">
      <div class="container h-100">
        <div class="row h-100">
          <div class="col-lg-7 my-auto">
            <div class="header-content mx-auto">
              <h1 class="mb-5">Welcome to StressMonitor! Here you will be able to monitor and track your wellbeing...</h1>
              <a href="#Login" class="btn btn-outline btn-xl js-scroll-trigger">Login!</a> <!-- Creates login button and links to login page -->
              <a href="#Signup" class="btn btn-outline btn-xl js-scroll-trigger">Signup!</a> <!-- Creates signup button and links to signup page -->
            </div>
          </div>
          <div class="col-lg-5 my-auto">
            <div class="device-container">

                    <img src="img/Logo.png" class="img-fluid" alt=""> <!-- Adds Logo to right hand side of the page -->
                  </div>

              </div>
            </div>
          </div>
        </div>
      </div>
    </header>

    <section class="download bg-primary text-center" id="Login"> <!-- Creates Login page and sets up formatting from css -->
      <div class="container">
        <div class="row">
          <div class="col-md-8 mx-auto">
            <h2 class="section-heading">Use The Form Below To Login!</h2>
            <div class="badges">
              <form method="post" name="loginSubmit" id="loginSubmit" class="form-signin" action="login.php"> <!-- Creates Login form -->
        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="email" id="inputEmail1" name="inputEmail1" class="form-control" placeholder="Email address" required autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword1" name="inputPassword1" class="form-control" placeholder="Password" required>
        <div class="checkbox">
          <label>
            <input type="checkbox" value="remember-me"> Remember me
          </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
      </form>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class=" text-center" id="Signup"> <!-- Creates Signup page and formats it from css -->
    <div class="container">
        <div class="row">
          <div class="col-md-8 mx-auto">
            <h2 class="section-heading">Use The Form Below To Signup!</h2>
            <div class="badges">
          <form method="post" name="registerSubmit" id="registerSubmit" class="form-signin" action="register.php"> <!-- Creates Signup form -->
        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="email" id="inputEmail" name="inputEmail" class="form-control" placeholder="Email address" required autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" name="inputPassword" class="form-control" placeholder="Password" required>
        <button class="btn btn-lg btn-primary btn-block" name="submit" type="submit">Register</button>
      </form>
          </div>
    </section>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for this template -->
    <script src="js/new-age.min.js"></script>
	<?php
		if(isset($_SESSION['valid'])){
			echo "Logged in as: ";
			echo $_SESSION['username'];
		}
	?>
  </body>

</html>
