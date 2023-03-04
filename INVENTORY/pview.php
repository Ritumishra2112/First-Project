<?php 
   include("connection.php");
    
   ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <title>Document</title>
      <style>
        .result{
         color:red;
        }
        td
        {
          text-align:center;
        }
      </style>
   </head>
   <body>
   <div class="col-md-7  mt-4">
               <div class="p-4">
   <span class="mt-4"> Time : </span><span  class="mt-4" id="time"></span>
                  <div class="row">
                     <div class="col-xs-6 col-sm-6 col-md-6 ">
                        <span id="day"></span> DATE: <span id="year"></span>
                     </div>
                     <div class="row">
                     </span>
                     <table  class="table">
                        <thead>
                           <tr>
                              <th scope="col"> No.</th>
                              <!-- <th scope="col">Invoice no.</th>
                              <th scope="col">Invoice date</th>
                              <th scope="col">Recieveing no</th>
                              <th scope="col">Recieveing Date</th>
                              <th scope="col"> Supplier name</th>
                              <th scope="col">Supplier Address</th> -->
                              <th scope="col">PRODUCT NAME</th>
                              <th scope="col">RATE</th>
                              <th scope="col">QUANTITY</th>
                              <th scope="col">TOTAL</th> 
                              
                           </tr>
                           </thead>
                           <?php
// include('connection.php');
// $sql="SELECT p.*,s.name FROM pmaster as p JOIN supplier as s ON p.supplier.id ";
// $query=mysqli_query($conn,$sql);
// $s=1;
// while($res=mysqli_fetch_array($query)){
?>
                        <tr>
                           <!-- <td><?php echo $s++; ?> </td>
                           <td><?php echo $res['invoice']; ?> </td>
                           <td><?php echo $res['invoicedate']; ?> </td>
                           <td><?php echo $res['id']; ?><?php echo $res['invoicedate'];?> </td>
                           <td><?php echo $res['invoicedate']; ?> </td>
                           <td><?php echo $res['name']; ?> </td>
                           <td><?php echo $res['address']; ?> </td>
                           <?php // }
                            ?>
                           <?php
include('connection.php');
 $sql="SELECT item.name,orders.rate,orders.qty,orders.total FROM orders INNER JOIN item ON orders.name=item.id ";
$query=mysqli_query($conn,$sql);

 while($res=mysqli_fetch_array($query)){
   $gtotal+=$res['total'];
?>                         
                           <td><?php echo $s++; ?></td>   
                           <td><?php echo $res['name']; ?> </td>
                           <td><?php echo $res['rate']; ?> </td>
                           <td><?php echo $res['qty']; ?> </td>
                           <td><?php echo $res['total']; ?></td> 
                        </tr>
                        <?php
                         }
                         ?> 
                         </table>
                         <script>
          var currentdate = new Date(); 
             var datetime = currentdate.getDate() + "/"
                + (currentdate.getMonth()+1)  + "/"
                + currentdate.getFullYear();
                $('#year').text(datetime);
 
           // Code for extract Weekday     
                function myFunction()
                 {
                    var d = new Date();
                    var weekday = new Array(7);
                    weekday[0] = "Sunday";
                    weekday[1] = "Monday";
                    weekday[2] = "Tuesday";
                    weekday[3] = "Wednesday";
                    weekday[4] = "Thursday";
                    weekday[5] = "Friday";
                    weekday[6] = "Saturday";
 
                    var day = weekday[d.getDay()];
                    return day;
                    }
                var day = myFunction();
                $('#day').text(day);
</script>
 
<!-- // Code for TIME -->
<script>
    window.onload = displayClock();
 
     function displayClock(){
       var time = new Date().toLocaleTimeString();
       document.getElementById("time").innerHTML = time;
        setTimeout(displayClock, 1000); 
     }
</script>