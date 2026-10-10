<?php
session_start();

$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "rrr2";

$con = new mysqli($host, $dbusername, $dbpassword, $dbname);


if(isset($_POST['submit'])){
$email = mysqli_real_escape_string($con, $_POST['email']);
$pswd = mysqli_real_escape_string($con, $_POST['pswd']);

$_SESSION["status"] = false;

if(!empty($email) && !empty($pswd) ){

  $query = "select * from signup where email = '$email' AND pswd = '$pswd'";
  $result = mysqli_query($con, $query);
   
  if($result)
			{
				if($result && mysqli_num_rows($result) > 0)
				{

					$user_data = mysqli_fetch_assoc($result);
					
					if($user_data['pswd'] === $pswd)
					{
            $_SESSION["status"] = true;
						header("Location: ../pages/homepage.html");
						die;
					}
				}
			}
			
      ?>
             <script>
                 alert("Wrong email or Password");
             </script>
          <?php 
			
		}else
		{
      ?>
      <script>
          alert("Wrong email or Password");
      </script>
   <?php 
		}
}


?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Login</title>
    <link rel="stylesheet" href="../assets/css/login1.css" />
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/css/style1.css" rel="stylesheet">
    <link href="../assets/css/responsive.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet"/>

    <!--Favicon-->
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
  </head>
  <body style="overflow: hidden;">

  <header id="masthead" class="site-header">
      <nav id="primary-navigation" class="site-navigation">
          <div class="container">

              <div class="navbar-header">
                 <h2><a href="../pages/homepage.html" style="color: inherit; text-decoration: none"><b>Miles To Go!</b></a></h2>

              </div><!-- /.navbar-header -->

              <div class="collapse navbar-collapse" id="agency-navbar-collapse">

                  <ul class="nav navbar-nav navbar-right" style="position: relative; left: 300px;">

                      <li><a href="../index.html">Home</a></li>                 
                      <li><a href="../pages/aboutus.html">About Us</a></li>
                      <li><a href="contactus.php">Contact Us</a></li>
                  </ul>

              </div>

          </div>   
      </nav>
    </header>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Macondo&display=swap');
        .navbar-header h2{
          font-family: 'Macondo', cursive;
          font-size: 40px;
          color: white;
          position: relative;
          right: 200px;
          bottom: 20px;
        }
      </style>

    <div class="login-box">
      <h1>Login</h1>
      <form class="login" action="login.php" method="post">
        <label> &nbsp;&nbsp;&nbsp;&nbsp;Email</label>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="email" name="email" placeholder="Email" />
        <label>&nbsp;&nbsp;&nbsp;&nbsp;Password</label>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="password" name="pswd" placeholder="Password" />
        <div style="text-align: center;"><button name="submit" id="submit">Login</button></div>
      </form>
    </div>
    <p class="para-3">
      Don't have an account? <a href="signup.php">Sign Up</a>
    </p>
  </body>
</html>