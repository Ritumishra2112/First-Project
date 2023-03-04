 <!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report</title>
	<link rel="stylesheet" href="css/bootstrap.css">
 </head>
 <body>
     <div class="container py-5">
        <div class="row">
            <h1 class="text-center">STOCK REPORT</h1>
            <div class="col-md-12 py-5">
                <table class="table table-bordered table-hover table-striped">
                    <tr class="text-center">
                        <th>S.no</th>
                        <th>item_name</th>
                        <th>Purchase Qty</th>
                        <th>Sale Qty</th>
                        <th>Available Qty</th>
</tr>
<tr>
<?php

include "connection.php";
// $sql="SELECT  distinct i.name, count(t.item_name)as total from item as i INNER JOIN temp t on i.id=t.item_name GROUP BY i.id";
$sql="SELECT DISTINCT i.name, sum(ps.qty)as total,sum(sd.qty)as sub FROM item as i
  INNER JOIN orders as ps ON i.id=ps.name 
INNER JOIN sdetails as sd ON i.id=sd.name GROUP BY i.id";

$query=mysqli_query($conn,$sql);
$S=1;
while($res=mysqli_fetch_array($query)){
    $avqty=$res['total']-$res['sub'];
?>
<tr class="text-center">
<td><?php  echo $S++; ?></td>
    <td><?php echo $res['name'];?></td>   
    <td>
    <?php echo $res['total'];?>
    </td>
    <td>
        <?php echo $res['sub'];?>
    </td>
    <td><?php echo $avqty; ?></td>
</tr>
<?php
}
?>
</tr>





</table>
            </div>
        </div>
     </div>
 </body>
 </html>