<?php 
session_start();

    ?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <?php include 'links.php' ?>
  </head>
  <body >
<h2 class="text-center" ><span style="color:blue">LOGIN ACCOUNT</span></h2>
<?php
include 'connection.php';
$email=$_POST['email'];
$password=$_POST['password'];

$email_search="select * from registration where email='$email'";
$query=mysqli_query($conn,$email_search);
 
$email_count=mysqli_num_rows($query);

if($email_count){
    $email_pass=mysqli_fetch_assoc($query);
    $db_pass=$email_pass['password'];
    $_SESSION['username']=$email_pass['username'];
    $pass_decode=password_verify($password,$db_pass);

    if($pass_decode)
    {
        echo "login successful";
        ?>
        <script>
            location.replace("management.php");
            </script>
        <?php
    }}
    else{
        //echo "password incorrect";
    }



?>    


<div class="card bg-light">
        <article class="card -body mx-auto" style="max-width:900px;">
        <p class="text-center">Get started with your free account</p>
        <p>
            <button type="submit"><a href="" class="btn btn-block btn-gmail"><i class="fa fa-google"></i>
            Login via Gmail</a></button>
            <button type="submit"><a href="" class="btn btn-block btn-gmail"><i class="fa fa-google"></i>
            Login via Facebook</a></button>
        </p>
        <p class="divider-text">
        <span class="bg-light text-center">OR</span></p>


  <form action="" method="POST">
  
  <div class="form-group row">
    <label for="" class="col-sm-4 col-form-label">Email</label>
    <div class="col-sm-6">
      <input type="email"  name="email" class="form-control" id="email" value="" placeholder="enter your email-id" required>
    </div>
  </div>
  <div class="form-group row">
    <label for="" class="col-sm-4 col-form-label">Password</label>
    <div class="col-sm-6">
      <input type="password"  name="password" class="form-control" id="password" value="" placeholder="enter password" required>
    </div>
  </div>
 <input type="submit" name="submit" value="login" class="btn btn-primary"><br><br>
 <p class="text-center">Don't Have an account?<a href="registration.php">SIGN UP HERE</a></p>


</form>
</article>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>