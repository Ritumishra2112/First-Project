
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>payment</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <style>
        td{
            text-align:center;
        }
        </style>
</head>
<body style="background-color:grey;" >
<h1 class="color-white text-center">PURCHASE DETAILS</h1>




    <!-- ---------------------------------------supplier------------------------------------------ -->
    
    
    
    
    
    
    <form action="" method="POST"  enctype="multipart/form-data" autocomplete="off" >
        <section>
    <div class="container py-5">
    
    <div class="row m-auto">
            <div class="col-sm-5">
                <div class="form-group">
                <label for="" class=" text-sm mb-2">Invoice No:</label>
                    <input type="text" placeholder="invoice no" id="invoice" name="invoice" class="form-control mb-2">
                </div>
            </div><br><br>
            <div class="col-sm-5">
                <div class="form-group">
                <label for="" class="mb-2">Invoice Date:</label>
                    <input type="datetime-local" placeholder="invoice date" id="invoicedate"name="invoicedate" class="form-control mb-2">
                </div>
            </div>
            <div class="row m-auto">
            <div class="col-sm-5">
                <div class="form-group">
                    <label class="mb-">Supplier</label>
                    <select class="form-control" id="supplier" name="name">
                        <option value="">Select Name</option>
                     </select>
                </div>
            </div><br><br><br><br><br><br>
            <div class="col-sm-5 mb-5">
                <div class="form-group">
                    <label>Address</label><br>
                    <select class="form-control" id="address" name="address" >
                        <option value=""></option>
                    </select>
                </div>
            </div>
        </div>

    

         </div>  
        
        
    </section>
    <section>
  <div>
  <div class="text-center " id="save">
           <button type="submit" name="draf" id="draf" class="btn btn-secondary" onclick="drafed();">Save as Draf</button>
           </div>
  </div>      
</section>
<!--==================================draf button work================== master===== -->
<?php
 include_once 'connection.php';
if(isset($_POST['draf'])){

$invoice=$_POST['invoice'];
$address=$_POST['address'];
$date=$_POST['invoicedate'];
$name=$_POST['name'];
echo $invoice;
echo $name;
echo $address;
echo $date;


//  $sql= "INSERT INTO pmaster(invoice,name,address,invoicedate) 
//               VALUES ('$invoice','$name', '$address','$date')";
   
//      $result=mysqli_query($conn,$sql);

//      if($result){
//           echo 'DATA SAVED AS DRAF';
//      }else{
//       echo 'Something went wrong';
//     }
  }
 ?>



    <!------------------------------------item table-------------------------------------->
    


    <section>
    <div class="container py-5">
    
    <section>
        
                <div class="row m-auto">
                <div class="form-group">
                    <label calss="mb-">Item name</label>
                    <select class="form-control" id="supp" name="name" style="width:250px" >
                    <option value=""></option>
                    </select>
                <label for="" class="mb-2">Quantity</label>
                <input type="number" style="width: 250px" id="qty" min="0" value="0"  name="qty" onclick="multiply();" class="form-control" >
             <label>Price</label><br>
             <select name="rate" id="rate"  style="width:250px" onclick="multiply();" >
               <option value=""></option>
             </select><br>
                <!-- <output id="rate" name="rate"    class="form-control" onclick="multiply();"></output> -->
            <label>Total</label>
            <input id="total" name="total" style="width:250px" type="text"  class="form-control" readonly >
            <br>
            <input type="submit" id="add"  value="add" name="add" style="width:60px" class="btn btn-primary"><br><br>

            </section>
           </div>
    <!-- <?php
// include "connection.php";
// if(isset($_POST['add'])){

// $name=$_POST['name'];
// $rate=$_POST['rate'];
// $qty=$_POST['qty'];
// $total=$_POST['total'];
// //echo $name;
// //echo $rate;
// //echo $qty;
// //echo $total;     
// $sql = "INSERT INTO cart (name, rate, qty,total) 
//                  VALUES ('$name','$rate', $qty,'$total') ";

// $res=mysqli_query($conn,$sql);
// if($res==true){
// echo "success";
//}
//}
?> -->
       


        <!-----------------------------------temporary table------------------------------------------------>



<div class="col-lg-12">
           
    <table class="table table-striped table-hover table-bordered">
        <tr>
            <thead style="background:blue">
                <th>S.no</th>
                <th>Item name</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total</th>
                <thead>
        </tr>


<?php
include("connection.php");
$sql="SELECT item.name,cart.rate,cart.qty,cart.total FROM cart INNER JOIN item ON cart.name=item.id where cart.id=(select max(id) from cart)";
 $query=mysqli_query($conn,$sql);
 $s=1;
 while($res=mysqli_fetch_array($query)){
 ?>
<tr>
    <td><?php echo $s++; ?></td>
    <td><?php echo $res['name']; ?></td>
    <td><?php echo $res['rate']; ?></td>
    <td><?php echo $res['qty']; ?></td>
    <td><?php echo $res['total']; ?></td>

 </tr>
 <?php
  }
 ?>

 </table>
</div>
<div class="purchase" id="purchase">
             <div class="text-center " id="save">
          <button type="submit" name="save" id="save" class="btn btn-primary" onclick="saved()">save</button>
          </div>
            <div class="text-right ">
          <button type="submit" name="purchase" id="purchase" class="btn btn-success">PURCHASE</button>
          </div>"
            </div>


</form>
<script src="js/jquery.js"></script>

</body>
</html>




<!-----------------------------------item ajax--------------------------------------------------------->



  <script>
    $(document).ready(function(){
        function loaddata(type, category){
            $.ajax({
            url: "itemget.php",
            type: "POST",
            data:{
                'type' : type,
                'id' : category
            },
            success:function(data){
            if(type=="statedata"){
                $('#rate').html(data);
            }else{
                    $('#supp').append(data);
            }
            }
            });
            }
            loaddata();

                $("#supp").on("change",function(){
                var supplier = $("#supp").val();
                loaddata("statedata",supplier)
            });

            });

</script>



    <!------------------------------------supplier  ajax    table--------------------------------------------->
    
    
    
    <script>
    $(document).ready(function(){
        function loaddata(type, category_id){
            $.ajax({
            url: "suppget.php",
            type: "POST",
            data:{
                'type' : type,
                'id' : category_id
            },
            success:function(data){
            if(type=="statedata"){
                $('#address').html(data);
            }else{
                    $('#supplier').append(data);
  }
}
            });
        }
            loaddata();

            $("#supplier").on("change",function(){
            var supplier = $("#supplier").val();
            loaddata("statedata",supplier)
       });

    });

</script>


<!-----------------------------------------find total------------------------------------------------>



<script>
    function multiply()
    {
        var rate=document.getElementById("rate").value;
        var qty=document.getElementById("qty").value;
        var total=parseFloat(rate)*parseFloat(qty);
        document.getElementById("total").value=total;
    }
    </script>





<!--------------------------------------- insert into temporary table----------------------------------------->



<?php
 include "connection.php";
  if(isset($_POST['add'])){

 $name=$_POST['name'];
$rate=$_POST['rate'];
$qty=$_POST['qty'];
$total=$_POST['total'];
//echo $name;
//echo $rate;
//echo $qty;
//echo $total;     
$sql = "INSERT INTO cart (name, rate, qty,total) 
               VALUES ('$name','$rate', $qty,'$total') ";
 $res=mysqli_query($conn,$sql);
 if($res){
 echo "success";
 }
 }
?>




<!----------------------------------------hide data ---------------------------------------------------->




<script>
//$(document).ready(function(){
    //$('#save').on("click",function(){
    //$('#hide').hide();
   // });
//});
</script>




<!---------------------------------------insert to purchase table-------------------------------------------->

<?php
 include 'connection.php';
 if(isset($_POST['save'])){
 $sql="INSERT INTO orders( SELECT * FROM cart)";
$res=(mysqli_query($conn,$sql));
 if($res){
        echo"sucessfully inserted";
}
else{
    echo "not inserted";
}
}
?>
<?php


// include 'connection.php';

// if(isset($_POST['save'])){
     
//             $sql="INSERT INTO p_dtls(SELECT * FROM tempdata)";

//             $result=(mysqli_query($conn,$sql));
//             if($result){

//             }
//             else{
//               echo 'Something went wrong';
//             }
              
//           }

 ?>

<script>
    $(document).ready(function()
    {
        $('#save').on("click",function(){


        });
    });

</script>


<!-- ==================================procces to purchase button==============================master===== -->

<?php


include 'connection.php';

if(isset($_POST['purchase'])){

                
  $sql="DELETE FROM cart ";

  $result=mysqli_multi_query($conn,$sql);

  if($result==true){

  }
}
     
        

 ?>
