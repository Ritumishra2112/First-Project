<?php
include"connection.php";
if(isset($_POST['save']))
{

    $name=$_POST['name'];
    $address=$_POST['address'];
    $mobile=$_POST['mobile'];
    $email=$_POST['email'];
    $status=$_POST['status'];
    $timedate=$_POST['timedate'];


  
    $sql="INSERT INTO supplier(name,status,datetime,mobile,email,address)VALUES('$name','$status','$timedate','$mobile','$email','$address')";
   if(mysqli_query($conn,$sql)){
header('location:sup.display.php');
   }else{
     echo("data cann't insert");
   }
}
?>
<!doctype html>
<html lang="en" class="no-js">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	
	<link rel="stylesheet" href="css/bootstrap.css">
<style>
   
    .btm{
        min-width: 300px;
    }
    .add{
        min-width: 360px;
    }
    </style>
</head>
<h2 class="color-white text-center">SUPPLIER ENTRY</h2>
<body style="background-color:grey;">

	<div class="container py-5">
        <div class="row ">
                           <div class="col-md-4 m-auto">
                        


                           <form action="" class="mt" method="post">
                    <label for="" class="text-uppercase text-sm mb-2">Supplier name</label>
                    <input type="text" placeholder="enter your  name" name="name" class="form-control mb-2" required>
                    <label for="" class="text-uppercase text-sm mb-2">Status</label>
                    <input type="text" placeholder="" name="status" class="form-control mb-2" required>
                    <label for="" class="text-uppercase text-sm mb-2">timedate</label>
                    <input type="datetime-local" placeholder="enter your  name" name="timedate" class="form-control mb-2" required>
                    <label for="" class="text-uppercase text-sm mb-2">Mobile</label>
                    <input type="text" placeholder="enter your contact" name="mobile" class="form-control mb-2" required>
                    <label for="" class="text-uppercase text-sm mb-2">Email</label>
                    <input type="email" placeholder="enter your email" name="email" class="form-control mb-2" required>
                    <label for="" class="text-uppercase text-sm mb-2">address</label>
                <textarea col="10" class="add" name="address" required></textarea>

                 <input type="submit" name="save" class="btn btn-primary btm m-4" value="save" >
                 <p class="text-center">can u want to see supplier list?<a href="sup.display.php">SHOW SUPPLIER LIST</a></p>
                </form>


            </div>
        </div>
    </div>

		
				 
	
</body>

</html>
