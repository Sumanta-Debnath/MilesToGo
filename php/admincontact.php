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

$query = "select * from contactus";
$result = mysqli_query($con,$query);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Miles To Go!</title>
   <!-- Font Awesome -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css" />
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" 
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/css/style1.css" rel="stylesheet">
    <link href="../assets/css/responsive.css" rel="stylesheet">

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

                      <li><a href="../pages/homepage.html">Home</a></li>                 
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
          color: black;
          position: relative;
          right: 300px;
          bottom: 20px;
        }
      </style>
<br>
    <section id="signup">
    <table class="table table-borderless table-group-divider">
        <tr style="background: #e3e6f3;">
        <th>ID</th>
        <th>Name</th>
        <th>E-mail</th>
        <th>Subject</th>
        <th>Message</th>
        <th></th>
        <tr>
 
    <?php 
            while($rows=mysqli_fetch_assoc($result))
            {
        ?>

             <tr class="tbody">
               <td><?php echo $rows['id']; ?></td>
               <td><?php echo $rows['name']; ?></td>
               <td><?php echo $rows['email']; ?></td>
               <td><?php echo $rows['subject']; ?></td>
               <td><?php echo $rows['message']; ?></td>
               <td><form action="contactus.php" method="post" class="d-inline">
                    <button type="submit" name="delete" value="<?= $rows['id']; ?>" class="btn btn-danger">Delete</a>
          </form></td>
             </tr>
        <?php
            }
        ?>
       
     </table>
     <hr style="background: #e3e6f3; height: 2px;" >
    </section>

    <style>
    #signup{
        position: relative;
        top: 200px;
    }
    .tbody{
        font-size:16px;
    }
    /* Delete button: outlined danger, fills on hover */
    .btn.btn-danger{
        min-height: 38px;
        padding: 6px 16px;
        font-size: 14px;
        font-weight: 600;
        letter-spacing: 0.04em;
        color: #b91c1c;
        background: transparent;
        border: 1px solid #b91c1c;
        border-radius: 10px;
        transition: background-color 0.2s ease, color 0.2s ease, box-shadow 0.2s ease, transform 0.15s ease;
    }
    .btn.btn-danger:hover,
    .btn.btn-danger:focus{
        color: #fff;
        background: #b91c1c;
        box-shadow: 0 6px 16px rgba(185, 28, 28, 0.3);
        transform: translateY(-1px);
    }
    .btn.btn-danger:focus-visible{
        outline: 3px solid rgba(185, 28, 28, 0.4);
        outline-offset: 2px;
    }
    </style>

    <!--Footer-->
    <div class="footer-basic">
      <footer>
          <div class="social"><a href="https://www.facebook.com/profile.php?id=100084496581520"><i class="fa fa-facebook"></i></a><a href="https://www.instagram.com/travel_milestogo/"><i class="fa fa-instagram"></i></a><a href="https://twitter.com/MilesToGo___"><i class="fa fa-twitter"></i></a></div>
          <ul class="list-inline">
              <li class="list-inline-item"><a href="../pages/homepage.html">Home</a></li>
              <li class="list-inline-item"><a href="#service">Services</a></li>
              <li class="list-inline-item"><a href="../pages/aboutus.html">About</a></li>
              <li class="list-inline-item"><a href="contactus.php">Contact</a></li>
              <li class="list-inline-item"><a href="../pages/faqs.html">FAQs</a></li>
          </ul>
          <p class="copyright">Miles To Go! <i class="fa fa-copyright"></i> 2022</p>
      </footer>
  </div>
  
  <style>
        /*footer*/
        .footer-basic {
        padding:60px 0;
        background-color:#000;
        color:#f9fbfc;
        position: relative;
        width: 2200px;
        right: 130px;
        top: 430px;
        }

        .footer-basic ul {
        padding:0;
        list-style:none;
        text-align:center;
        font-size:18px;
        line-height:1.6;
        margin-bottom:0;
        }

        .footer-basic li {
        padding:0 10px;
        }

        .footer-basic ul a {
        color:inherit;
        text-decoration:none;
        opacity:0.8;
        }

        .footer-basic ul a:hover {
        opacity:1;
        }

        .footer-basic .social {
        text-align:center;
        padding-bottom:25px;
        }

        .footer-basic .social > a {
        font-size:24px;
        width:40px;
        height:40px;
        line-height:40px;
        display:inline-block;
        text-align:center;
        border-radius:50%;
        border:1px solid #ccc;
        margin:0 8px;
        color: white;
        opacity:2;
        }

        .footer-basic .social > a:hover {
        opacity:0.9;
        }

        .footer-basic .copyright {
        margin-top:15px;
        text-align:center;
        font-size:13px;
        color:rgb(254, 252, 252);
        margin-bottom:0;
        }
  </style>
  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
</body>
</html>