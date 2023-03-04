<?php
include "connection.php";
$id=$_GET['id'];
// for dispalying the data before update

$sql="SELECT * FROM supplier  WHERE id=$id";
$res=(mysqli_query($conn,$sql));
$row=mysqli_fetch_array($res);
        $name=$row['name'];
        // $status=$row['status'];
        $timedate=$row['datetime'];
        $address=$row['address'];
        $mobile=$row['mobile'];
        $email=$row['email'];
        


if(isset($_POST['save'])){

    $name=$_POST['name'];
    // $status=$_POST['status'];
    $timedate=$_POST['datetime'];
    $mobile=$_POST['mobile'];
    $email=$_POST['email'];
    $address=$_POST['address'];
    
// UPDATE `student` SET `name` = 'kdkd' WHERE `student`.`id` = 12;
$sql="UPDATE supplier  SET `id`=$id,`name` = '$name',`datetime` = '$timedate',`address` = '$address',`mobile` = '$mobile',`email` = '$email' WHERE `supplier`.`id` = $id";



if($result){

    echo 'updated succefully';
    // header('location:sub.display.php');
}
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>welcome to sparrow softech pvt. Ltd. ></title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="style1.css">


</head>
<body>
    
    <div class="container"  >
        <div class="head">
        
        </div>
         <?php

         ?>
       
       <div class="container py-5">
        <div class="row ">
                           <div class="col-md-4 m-auto">
                        


                           <form action="" class="mt" method="post">
                    <label for="" class="text-uppercase text-sm mb-2"> Supplier Name</label>
                    <input type="text" placeholder="enter your item  name" name="name"  readonly value="<?php echo $name ?>" class="form-control mb-4">
                    <!-- <label for="" class="text-uppercase text-sm mb-2">Status</label>
                    <input type="text" placeholder="" name="status"value=<?php echo $status ?> readonly  class="form-control mb-2"> -->
                    <label for="" class="text-uppercase text-sm mb-2">DATE AND TIME</label>
                    <input type="datetime-local" placeholder="" name="timedate"value="<?php echo $timedate ?>" readonly  class="form-control mb-2">
                     <label for="" class="text-uppercase text-sm mb-2">Address</label>
                    <input type="decimal" placeholder="" name="address"value="<?php echo $address ?>" readonly  class="form-control mb-2">
                    <label for="" class="text-uppercase text-sm mb-2"> Contact</label>
                    <input type="text" placeholder="enter supplier contact" name="mobile"  readonly value="<?php echo $mobile ?>" class="form-control mb-4">
                    <label for="" class="text-uppercase text-sm mb-2">email</label>
                    <input type="text" placeholder="enter supplier email" name="email"  readonly value="<?php echo $email ?>" class="form-control mb-4">
                    <!-- <input type="submit" name="save" class="btn btn-primary btm m-4" value="view" > -->
                    <button type="submit" name="submit" class="btn btn-primary btm m-4" ><a href="sup.display.php" class="text-light">view</a></button>
                    
                </form>


            </div>
        </div>
    </div>

		
    </div>
<!-- <script src="index.js"></script> -->
<script >
   $('#form1').on('submit',function(e){
    alert('Are you sure want to Update than click "OK"')
    e.preventdefault();
   });
</script>

</body>
</html>
