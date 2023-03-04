<?php 
include_once "connection.php";
?>
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
<h1 class="color-white text-center">SALES DETAILS</h1>




    <!-- ---------------------------------------supplier------------------------------------------ -->
    
    
    
    
    
    
    <form action="" method="POST"  enctype="multipart/form-data" autocomplete="off" >
        <section>
    <div class="container py-5">
    
    <div class="row m-auto">
            <div class="col-sm-5">
                <div class="form-group">
                <label for="" class=" text-sm mb-2">Transfer No:</label>
                    <input type="text" placeholder="transferno" id="transfer" name="transfer" class="form-control mb-2" required>
                </div>
            </div><br><br>
            <div class="col-sm-5">
                <div class="form-group">
                <label for="" class="mb-2">Transfer Date:</label>
                    <input type="datetime-local" placeholder="Transfer date" id="transferdate"name="transferdate" class="form-control mb-2" required>
                </div>
            </div>
            <div class="col-sm-5">
                <div class="form-group">
                <label for="" class="mb-2">Customer Name:</label>
                    <input type="text" placeholder="Customer Name" id="customer" name="customer" class="form-control mb-2" required>
                </div>
            </div>
         </div>
       </div>
     </section>
    <div>
  
  </div>      
</section>

<!--==================================sdet button work================== master===== -->
<?php
//  include_once 'connection.php';
// if(isset($_POST['sdet'])){

// $transfer=$_POST['transfer'];
// $customer=$_POST['customer'];
// $transferdate=$_POST['transferdate'];


// // echo $invoice;
// // echo $s_name;
// // echo $s_address;
// // echo $s_date;


// $sql= "INSERT INTO smaster(transferid,customer,transferdate) 
//              VALUES ('$transfer','$customer', '$transferdate')";
   
//     $result=mysqli_query($conn,$sql);

//     if($result){
//        //  echo 'DATA SAVED AS SDET';
//     }else{
//       echo 'Something went wrong';
//     }
//   }
 ?>



<!--====================================item table============================================-->
 


<section>
    <div class="container py-5">
    
    <section>
        
                <div class="row m-auto">
                <div class="form-group">
                    <label calss="mb-">Item name</label>
                    <select class="form-control" id="item" name="item" style="width:250px"  required>
                    <option value="">SELECT ITEM</option>
                    </select></div>
                    <div class="form-group">
                <label for="" class="mb-2">Quantity</label><br>
                <input type="number" style="width: 250px" id="qty" min="0" value="0"  name="qty" onclick="multiply();" class="form-control" required>
              </div><div class="form-group">
              <label>Price</label><br>
             
             <select name="rate" id="rate"  style="width:250px" onclick="multiply();" required >
               <option value=""></option>
             </select><br></div>
                <!-- <output id="rate" name="rate"    class="form-control" onclick="multiply();"></output> -->
                <div class="form-group"> <label>Total</label>
            <input id="total" name="total" style="width:250px" type="text"  class="form-control" readonly required></div>
            <br>
            <div class="form-group">
            <input type="submit" id="add"  value="add" name="add" style="width:60px" class="btn btn-primary"><br><br>
            </div>
            </section>
           </div>


<!--=========================================item ajax========================================-->
<script src="js/jquery.js"></script>

</body>
</html>
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
                    $('#item').append(data);
            }
            }
            });
            }
            loaddata();

                $("#item").on("change",function(){
                var item= $("#item").val();
                loaddata("statedata",item)
            });

            });

</script>

<!-- ==============================================calculate total====================================-->


<script>
function multiply() {
    var one =  document.getElementById("qty").value;
     var two =  document.getElementById("rate").value;
  var total= one*two;
    document.getElementById("total").value = one*two;
}
</script>



<!--======================================insert data value into table=====================================-->


<?php
 
  if(isset($_POST['add'])){
    
    
    $transfer=$_POST['transfer'];
$customer=$_POST['customer'];
$transferdate=$_POST['transferdate'];


// echo $invoice;
// echo $s_name;
// echo $s_address;
// echo $s_date;


$sql= "INSERT INTO smaster(transferid,customer,transferdate) 
             VALUES ('$transfer','$customer', '$transferdate')";
   
    $result=mysqli_query($conn,$sql);

    if($result){
       //  echo 'DATA SAVED AS SDET';
    }else{
      echo 'Something went wrong';
    }
  

 $name=$_POST['item'];
$rate=$_POST['rate'];
$qty=$_POST['qty'];
$total=$_POST['total'];
//echo $name;
//echo $rate;
//echo $qty;
//echo $total;     
$sql = "INSERT INTO tempsdet(name, rate, qty,total) 
               VALUES ('$name','$rate', $qty,'$total') ";
 $res=mysqli_query($conn,$sql);
 if($res){
    
 }
 $ins = "INSERT INTO sdetails(name, rate, qty,total) 
    VALUES ('$name','$rate', $qty,'$total')";
    $result=mysqli_query($conn,$ins);
    if($result){
        //echo "successfully inserted";
    }
 }
?>

<!--=================================sale details view=======================================--->

<div class="col-lg-12">
           
    <table class="table table-striped table-hover table-bordered">
        <tr>
            <thead style="background:yellow">
                <th>S.no</th>
                <th>Item name</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total</th>
                <thead>
        </tr>


<?php
include("connection.php");
$sql="SELECT item.name,tempsdet.rate,tempsdet.qty,tempsdet.total FROM tempsdet INNER JOIN item ON tempsdet.name=item.id where tempsdet.id=(select max(id) from tempsdet)";
 $query=mysqli_query($conn,$sql);
 $s=1;
 while($res=mysqli_fetch_array($query)){
 ?>
<tr id="hide">
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
<div>
          <button type="submit" name="save" id="save" class="btn btn-primary" >save</button>
          </div>

<?php
// include 'connection.php';

// if(isset($_POST['save'])){
             
//  $sql="DELETE FROM tempsdet";
//  $resut=(mysqli_multi_query($conn,$sql));
//  if($resut==true){
//     echo "deleted record";
//   }
// }
 ?>

<!----------============================delete  data===========================================-->

<script>
$(document).ready(function(){
         $('#save').on("click",function(){
    $('#hide').hide();
    });
});
</script>

<!--=====================================clock========================================----->

<script>
    // window.onload = displayClock();
 
    //  function displayClock(){
    //    var time = new Date().toLocaleTimeString();
    //    document.getElementById("time").innerHTML = time;
    //     setTimeout(displayClock, 1000); 
     //}
</script>

<!--====================================delete code=========================================-->



<?php
//  include 'connection.php';

// if(isset($_POST['save'])){
             
//  $sql="DELETE FROM tempsdet";
//  $result=mysqli_multi_query($conn,$sql);
//  if($result==true){
//     //echo "deleted record";
//   }
// }
 ?>
 </body>
 </html>
 
 
