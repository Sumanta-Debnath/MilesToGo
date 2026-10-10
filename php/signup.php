<?php
session_start();

$server = "localhost";
$user = "root";
$password = "";
$db = "rrr2";

$con = mysqli_connect($server,$user,$password,$db);
if(!$con) {
    echo "Connection Unsuccessful";
}
if(isset($_POST['delete'])){
    
  $customer_id = mysqli_real_escape_string($con, $_POST['delete']);
  $query = "DELETE FROM signup WHERE id='$customer_id'";
  $query_run = mysqli_query($con, $query);
  if($query_run){
           echo '<script>alert("Delete Successful!")</script>';
           echo '<script>window.location.href="admin.php";</script>';  
   }
   else 
   {
       ?>
           <script>
               alert("Delete Failed. Please try again.");
           </script>
        <?php   
   }
}

if(isset($_POST['submit'])){

     $name = mysqli_real_escape_string($con, $_POST['name']);
     $email = mysqli_real_escape_string($con, $_POST['email']);
     $phone = mysqli_real_escape_string($con, $_POST['phone']);
     $dob = mysqli_real_escape_string($con, $_POST['dob']);
     $addr = mysqli_real_escape_string($con, $_POST['addr']);
     $pswd = mysqli_real_escape_string($con, $_POST['pswd']);
     $cpswd = mysqli_real_escape_string($con, $_POST['cpswd']);

     $emailquery = " select * from signup where email= '$email' ";
     $query = mysqli_query($con, $emailquery);

     $emailcount = mysqli_num_rows($query);

     if($emailcount>0) {
         ?>
         <script>
             alert("Email already exists.");
         </script>
      <?php 
     }
    
     else {
         if($pswd === $cpswd){

             $insertquery = "insert into signup( name, email, phone, dob, gender, addr, pswd, cpswd) 
             values('$name','$email','$phone','$dob','$gender','$addr','$pswd', '$cpswd')";

             $iquery = mysqli_query($con, $insertquery);

             if($iquery){
                    header('location: login.php');  
             }
             else {
                 ?>
                     <script>
                         alert("Sign Up failed. Please try again.");
                     </script>
                  <?php   
          }
         }
         else {
             ?>
             <script>
                 alert("Passwords are not matching");
             </script>
          <?php 
         }
     }    
    
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Sign Up | Miles To Go!</title>
    <link href="../assets/css/login1.css" rel="stylesheet">
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

    <div class="signup-box">
      <h1>Sign Up</h1>
      <form class="signup" action="signup.php" method="post" onsubmit="return validate()">
        <label> &nbsp;&nbsp;&nbsp; Name</label>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="name" id="name" placeholder="Name" />

        <label> &nbsp;&nbsp;&nbsp;&nbsp;Email</label>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="email" name="email" id="email" placeholder="Email" />

        <label> &nbsp;&nbsp;&nbsp;&nbsp;Phone Number</label>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text"  name="phone" id="phone" placeholder="Phone Number" maxlength="10" required />

        <label> &nbsp;&nbsp;&nbsp;&nbsp;Date of Birth</label>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="date" name="dob" min="1980-01-01" max="2001-12-31" id="dob" placeholder="Date of Birth" required />

        <label> &nbsp;&nbsp;&nbsp;&nbsp;Address</label>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" class="textarea" name="addr" id="addr" placeholder="Enter Your Address" required>

        <label> &nbsp;&nbsp;&nbsp;&nbsp;Password</label>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="password" name="pswd" id="pswd" placeholder="Password" />

        <label> &nbsp;&nbsp;&nbsp;&nbsp;Confirm Password</label>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="password" name="cpswd" id="cpswd" placeholder="Confirm Password" />

        <div style="text-align: center;"><button name="submit" id="submit">Sign Up</button></div>
      </form>
    </div>

    <p class="para-2">
      Already have an account? <a href="login.php">Login</a>
    </p>
    <p>asdfghjk</p>
  </body>
</html>