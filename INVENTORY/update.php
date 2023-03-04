<?php
include 'connection.php';
$id=$_GET['id'];
// for dispalying the data before update

$sql="SELECT * FROM item  WHERE id=$id";
$res=(mysqli_query($conn,$sql));
$row=mysqli_fetch_assoc($res);
        $name=$row['name'];
        $rate=$row['rate'];
        


if(isset($_POST['save'])){

    $name=$_POST['name'];
    $rate=$_POST['rate'];
  
// UPDATE `student` SET `name` = 'kdkd' WHERE `student`.`id` = 12;
$sql="UPDATE item  SET name = '$name',rate='$rate',
 WHERE id = $id;";


if($res){

    // echo 'updated succefully';
    header('location:display.php');
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
                    <label for="" class="text-uppercase text-sm mb-2"> Item Name</label>
                    <input type="text" placeholder="enter your item  name"value=<?php echo $name ?> name="name" class="form-control mb-4">
                    <label for="" class="text-uppercase text-sm mb-2">Rate</label>
                    <input type="decimal" placeholder=""value=<?php echo $rate ?> name="rate"  class="form-control mb-2">
                    

                    <input type="submit" name="save" class="btn btn-primary btm m-4" value="save" >
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
