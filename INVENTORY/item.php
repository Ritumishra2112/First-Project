<?php
include"connection.php";
if(isset($_POST['save']))
{

$fname=$_POST['name'];
$pass=$_POST['rate'];

//     echo "Firstname:- .$fname"."<br>";
//     echo "Lastname:- .$lname"."<br>";
//     echo "Email:-  .$email"."<br>";
//     echo "Password:-  .$pass"."<br>";
//     echo "Contact:-  .$contact"."<br>";
//     echo "Age:-  .$age"."<br>";
  
    $sql="INSERT INTO item(name,rate)VALUES('$fname','$pass')";
   if(mysqli_query($conn,$sql)){
header('location:display.php');
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
    </style>
</head>
<h2 class="color-white text-center">ITEM ENTRY</h2>
<body style="background-color:grey;">
	<div class="container py-5">
        <div class="row ">
                           <div class="col-md-4 m-auto">
                        


                           <form action="" class="mt" method="post">
                    <label for="" class="text-uppercase text-sm mb-2"> Item Name</label>
                    <input type="text" placeholder="enter your item  name" name="name" class="form-control mb-4" required>
                    <label for="" class="text-uppercase text-sm mb-2">Rate</label>
                    <input type="decimal" placeholder="" name="rate" class="form-control mb-2" required>
                    

                    <input type="submit" name="save" class="btn btn-primary btm m-4" value="save" >
                    <p class="text-center">can u want to see item list?<a href="display.php">SHOW ITEM LIST</a></p>
                </form>


            </div>
        </div>
    </div>

		
				 
	
</body>

</html>
