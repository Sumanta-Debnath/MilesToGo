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
    $query = "DELETE FROM contactus WHERE id='$customer_id'";
    $query_run = mysqli_query($con, $query);
    if($query_run){
             echo '<script>alert("Delete Successfull!")</script>';
             echo '<script>window.location.href="admincontact.php";</script>';  
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
     $subject = mysqli_real_escape_string($con, $_POST['subject']);
     $message = mysqli_real_escape_string($con, $_POST['message']);
    
     $query= "INSERT INTO `contactus`(`name`, `email`, `subject`, `message`) VALUES ('$name','$email','$subject',' $message')";
     $query_run= mysqli_query($con, $query);

        if($query_run){
            echo '<script>alert("Thank You for contacting!")</script>';
            echo '<script>window.location.href="contactus.php";</script>';  
    }
    else 
    {
        ?>
            <script>
                alert("Please try again.");
            </script>
         <?php   
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Contact Us | MIlesToGo!</title>

    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="keywords" content="">
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0">
    <meta name="apple-mobile-web-app-capable" content="yes">

    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,600,700" rel="stylesheet">
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/css/style1.css" rel="stylesheet">
    <link href="../assets/css/responsive.css" rel="stylesheet">

    <!--Favicon-->
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">

    <style>   
        /* Style the Sticky icons on web page */   
        .stickyicon-list {   
        position:fixed;   
        top: 480px;
        left: 80px;
        transform: translateY(-50%);             
        }         
        .stickyicon-list a {   
        display: block;   
        text-align: center;   
        padding: 15px;   
        transition: all 0.5s ease;   
        color: white;   
        font-size: 20px;   
        }         
        /* HOver affect on sticky social media icons */   
        .stickyicon-list a:hover {   
        color: #000;   
        width:50px;   
        }   
           
        /* Now we have to design each icon of social media */         
        .facebook {   
        background: #3b5998;   
        color: white;  
        }         
        .twitter {   
        color: white;   
        background: #00acee;   
        }   
        .instagram {   
        background: #e23c60;   
        color: white;   
        }         
        .youtube {   
        color: white;   
        background: #d6150b;    
        }   
        </style> 

</head>
<body style="overflow: hidden;">
    
    
    <div class="stickyicon-list">  
        <a href="https://www.facebook.com/profile.php?id=100084496581520" class="facebook">   
        <i class="fa fa-facebook"></i>   
        </a>   
        <a href="https://www.instagram.com/travel_milestogo/" class="instagram">   
        <i class="fa fa-instagram"></i>   
        </a>                              
        <a href="https://twitter.com/MilesToGo___" class="twitter">   
        <i class="fa fa-twitter"></i>   
        </a> 
        </div> 

    <header id="masthead" class="site-header site-header-white">
        <nav id="primary-navigation" class="site-navigation">
            <div class="container">

                <div class="navbar-header">
                   
                    <h2><a href="../pages/homepage.html" style="color: inherit; text-decoration: none"><b>Miles To Go!</b></a></h2>

                </div><!-- /.navbar-header -->

                <div class="collapse navbar-collapse" id="agency-navbar-collapse" style="position: relative; left: 300px;">

                    <ul class="nav navbar-nav navbar-right">

                        <li><a href="../pages/homepage.html">Home</a></li></li>
                        <li><a href="../pages/aboutus.html">About Us</a></li>
                     </ul>
                 </div>
            </div>   
        </nav><!-- /.site-navigation -->
    </header><!-- /#mastheaed -->
    
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Macondo&display=swap');
        .navbar-header h2{
          font-family: 'Macondo', cursive;
          font-size: 40px;
          color: white;
          position: relative;
          right: 200px;
          bottom: 25px;
        }
        #submit.btn-green{
          display: inline-flex;
          align-items: center;
          justify-content: center;
          min-width: 180px;
          min-height: 48px;
          padding: 10px 28px;
          font-size: 15px;
          font-weight: 600;
          letter-spacing: 0.04em;
          color: #04211f;
          background: #14b8a6;
          border: 1px solid #14b8a6;
          border-radius: 10px;
          box-shadow: 0 1px 2px rgba(0, 0, 0, 0.2);
          cursor: pointer;
          transition: background-color 0.2s ease, border-color 0.2s ease, box-shadow 0.2s ease, transform 0.15s ease;
        }
        #submit.btn-green:hover,
        #submit.btn-green:focus{
          color: #04211f;
          background: #2dd4bf;
          border-color: #2dd4bf;
          box-shadow: 0 6px 16px rgba(20, 184, 166, 0.35);
          transform: translateY(-1px);
        }
        #submit.btn-green:active{
          background: #0d9488;
          border-color: #0d9488;
          box-shadow: none;
          transform: translateY(0);
        }
        #submit.btn-green:focus-visible{
          outline: 3px solid rgba(20, 184, 166, 0.55);
          outline-offset: 2px;
        }
      </style>

    <div id="hero" class="hero overlay subpage-hero contact-hero">
        <div class="hero-content">
            <div class="hero-text">
                <h1 style="font-size: 50px;">Contact Us</h1>
             </div><!-- /.hero-text -->
        </div><!-- /.hero-content -->
    </div><!-- /.hero -->

    <main id="main" class="site-main"></br>

        <section class="site-section subpage-site-section section-contact-us">

            <div class="container">
                <div class="row">
                    <div class="col-sm-7">
                        <h1>Send a message</h1></br>
                        <form action="contactus.php" method="post">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                      <label>Name:</label>
                                      <input type="text" class="form-control" id="name" name="name"/>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                      <label>E-mail:</label>
                                      <input type="email" class="form-control" id="email" name="email"/>
                                    </div>
                                </div>
                            </div> </br>
                            <div class="form-group">
                              <label>Subject:</label>
                              <input class="form-control" id="subject" name="subject"/>
                            </div></br>
                            <div class="form-group">
                              <label>Message:</label>
                              <textarea class="form-control form-control-comment" id="message" name="message"></textarea>
                            </div></br>
                            <div class="text-center">
                                <button name="submit" id="submit" class="btn btn-green">Contact Us</button>
                            </div>
                        </form>
                    </div>
                    <div class="col-sm-5">
                        <div class="contact-info">
                            <h1>Contact information</h1>
                            <div class="row">
                                <div class="col-sm-12">
                                    <h3>Address</h3>
                                    <ul class="list-unstyled">
                                    <i class="fa fa-map-marker" aria-hidden="true"></i>&nbsp;&nbsp;5th Cross, KS Layout </br>&nbsp;&nbsp;&nbsp;&nbsp;Bengaluru, India
                                    </ul>
                                    <h3>E-mail</h3>
                                    <i class="fa fa-envelope" aria-hidden="true"></i>&nbsp;&nbsp;milestogo@gmail.com
                                    <h3>Phone</h3>
                                    <i class="fa fa-phone" aria-hidden="true"></i>&nbsp;&nbsp;7980459795
                                    <div class="shaan" style="font-size: 25px; position: relative; bottom: 250px; left: 260px;">Locate on Map</div>
                                    <div>
                                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3888.983529588439!2d77.56432671531148!3d12.90878001974517!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bae1535e1d9d6c9%3A0xd8a3a70466411faf!2sDayananda%20Sagar%20Institutions!5e0!3m2!1sen!2sin!4v1656179116602!5m2!1sen!2sin" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                    </div>
                                </div>
                            </div>
                        </div><!-- /.contact-info -->
                    </div>
                </div>
            </div>
        </section><!-- /.section-contact-us -->

        <style>
            iframe{
                width: 80%;
                height: 300px;
                position: relative;
                bottom: 230px;
                left: 260px;
            }
        </style>
       
    </main><!-- /#main -->
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <script src="../assets/js/bootstrap-select.min.js"></script>
    <script src="../assets/js/jquery.slicknav.min.js"></script>
    <script src="../assets/js/jquery.countTo.min.js"></script>
    <script src="../assets/js/jquery.shuffle.min.js"></script>
    <script src="../assets/js/script.js"></script>
  
</body>
</html>