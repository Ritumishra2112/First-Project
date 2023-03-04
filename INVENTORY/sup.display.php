<html>
<body style="background-color:grey;">
    <div class="container py-5">
        <button class="btn btn-primary"><a href="supp.php" class="text-light">Add supplier</a></button>
        <div class="col-lg-12">
            <h1 class="color-white text-center">SUPPLIER DETAILS</h1>
            <table class="table table-striped table-hover table-bordered">
            <tr>
            <thead style="background:blue">
  <th>S.no</th>
    <th>supplier name</th>
    <th>status</th>
    <th>time and date</th>
    <th>address</th>
    <th>contact</th>
    <th>email</th>
    <th>action</th>
    <th>action</th>
    <th>action</th>
</thead>  
</tr>

 
<?php
include('connection.php');
$sql="SELECT * FROM  supplier";
$query=mysqli_query($conn,$sql);
$s=1;
while($res=mysqli_fetch_array($query)){
?>
<tr>
    <td><?php echo $s++; ?></td><
    <td><?php echo $res['name'];?></td>
    <td><?php echo $res['status'];?></td>
    <td><?php echo $res['datetime'];?></td>
    <td><?php echo $res['address'];?></td>
    <td><?php echo $res['mobile'];?></td>
    <td><?php echo $res['email'];?></td>
    <td><button class="btn btn-primary"><a href="sview.php?id=<?php echo $res['id'];?>" class="text-light">view</a></button></td>
    <td><button class="btn btn-danger" ><a href="sdelete.php?id=<?php echo $res['id'];?>" class="text-light">delete</a> </button></td>


    <td><button class="btn btn-success"><a href="supdate.php?id=<?php echo $res['id'];?>" class="text-light">update</a></button></td>
</tr>
<?php
}
?>

</table>
        </div>
    </div>

    <script src="js/jquery.js.js"></script>
   

</body>
</html>





