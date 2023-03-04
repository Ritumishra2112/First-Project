<html>
<body style="background-color:grey;">
    <div class="container py-5">
        <button class="btn btn-primary"><a href="item.php" class="text-light">Add item</a></button>
        <div class="col-lg-12">
            <h1 class="color-white text-center">ITEM DETAILS</h1>
            <table class="table table-striped table-hover table-bordered">
            <tr>
                <thead style="background:blue">
  <th>S.no</th>
    <th>Item name</th>
    <th>Price</th>
    <th>View</th>
    <th>Delete</th>
    <th>Update</th>
      <thead>
</tr>

 
<?php
include('connection.php');
$sql="SELECT *FROM  item";
$query=mysqli_query($conn,$sql);
$s=1;
while($res=mysqli_fetch_array($query)){
?>
<tr>
    <td><?php echo $s++; ?></td>
    <td><?php echo $res['name'];?></td>
    <td><?php echo $res['rate'];?></td>
    <td><button class="btn"><a href="view.php?id=<?php echo $res['id'];?>" class="text-light">view</a></button></td>
    <td><button class="btn btn-danger" ><a href="delete.php?id=<?php echo $res['id'];?>" class="text-light">delete</a> </button></td>


    <td><button class="btn"><a href="update.php?id=<?php echo $res['id'];?>" class="text-light">update</a></button></td>
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





