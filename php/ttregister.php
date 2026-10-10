<?php
$connect = mysqli_connect("localhost","root","","registration");
if(isset($_POST['register']))
 {
  $fname=$_POST['fname'];
  $sname=$_POST['sname'];
  $uname=$_POST['uname'];
  $email=$_POST['email'];
  $gender =$_POST['gender'];
  $phonenumber=$_POST['phonenumber'];
  $pass=$_POST['pass'];

$query ="INSERT INTO `users`(fname, sname,uname, email, gender, phonenumber, pass) VALUES ('$fname','$sname','$uname','$email','$gender','$phonenumber','$pass')";
$data = mysqli_query($connect,$query);

if($data)
{
  echo"<script>alert('you have successfully register') </script>";
  header("refresh:0.5;url=training1.html");
}
else
{
  echo"<script>alert('failed to register')</script>";
}
}
?>
<!DOCTYPE html>
<html>
  <head>
    <title>
      REGISTRATION FORM
    </title>
    <link rel="stylesheet" href="SIGNUP1.css">
  </head>
  <body>
    <div class="container">
      <form method="post">
       <h1>REGISTRATION  FORM</h1>
        <p>Please fill this form to create an account</p>
        <hr />
        <tr>
          <td>
        <label>First name</label></td>
        <td><input type="text" name="fname" placeholder="enter firstname"/></td>
        </tr>
        <br />
        <tr>
          <td>
        <label>Last name</label></td>
        <td><input type="text" name="sname" placeholder="enter lastname"/></td>
        </tr>
        <br />
        <tr>
          <td>
        <label>Username</label></td>
        <td><input type="text" name="uname" placeholder="enter  Username"/></td>
        </tr>
        <br />
        <tr>
        <td>
          <label>Email</label></td>
        <td><input type="email" name="email" placeholder="enter email" /></td>
        <br />
        <tr>
          <td>
            <label>Gender</label></td>
            <td><input type="radio" name="gender"value="male">male
              <input type="radio" name="gender" value="female">female</td>
          </td>
        </tr>
        <br>
        <br />
        <tr>
          <td>
        <label>Contact Number</label></td>
        <td><input type="text" name="phonenumber" placeholder="enter Contact Number"/></td>
        </tr>
        <br />
        
        <tr>
          <td>
        <label>Password</label></td>
        <td><input type="password" name="pass" placeholder="enter password" /></td>
        </tr>
        <br/>
        <tr>
      <td>
        <br>
 <td>
   <a href="login1.html">
   <input type="submit" name="register"value="Register"/>
    </a>
  </td>
</tr>
        <div class="login">
        <p>Already have account? <a href="login3.html">Login</a></p>
      </form>
    </div>
</div>
  </body>
</html>