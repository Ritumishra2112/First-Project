<?php 
   include_once "connection.php";
    
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
      <div class="col-md-7  mt-4" style="background-color:#f5f5f5;">
               <div class="p-4">
                  <div class="text-center">
                     <h4>SALE TABLE</h4>
                  </div>

                  <div style="text-light">
                  <button type="submit" name="" id="" class="btn" ><a href="sale.php">ADD</a></button>  
      </div>
      <span class="mt-4"> Time : </span><span  class="mt-4" id="time"></span>
                  <div class="row">
                     <div class="col-xs-6 col-sm-6 col-md-6 ">
                        <span id="day"></span> DATE: <span id="year"></span>
                     </div>
                     
                  </div>
                  <div class="row">
                     </span>
                     <table  class="table">
                        <thead>
                           <tr>
                              <th scope="col"> No.</th>
                              <th scope="col">Transfer no.</th>
                              <th scope="col"> Customer name</th>
                              <th scope="col">Transfer date</th>
                              <th scope="col"></th>
                              <!-- <th scope="col">Product Name</th>
                              <th scope="col">Quantity</th>
                              <th scope="col">Price</th>
                              <th scope="col">Total</th> -->
                           </tr>
                        </thead>
                        <?php

$sql="SELECT *FROM  smaster ";
$query=mysqli_query($conn,$sql);
$s=1;
while($res=mysqli_fetch_array($query)){
?>
                        <tr>
                           <td><?php echo $s++; ?> </td>
                           <td><?php echo $res['transferid']; ?> </td>
                           <td><?php echo $res['customer']; ?> </td>
                           <td><?php echo $res['transferdate']; ?> </td>
                           <td><button class="btn btn-primary" name="receipt1" id="receipt1"><a href="receipt1.php?id=<?php echo $res['id'];?>" class="text-light">view</a></button></td>
                           <?php 
                             }
                           ?>
                           <?php

// $sql="SELECT item.name,sdetails.rate,sdetails.qty,sdetails.total FROM sdetails INNER JOIN item ON sdetails.name=item.id where sdetails.id=(select max(id) from sdetails)";
// $query=mysqli_query($conn,$sql);
// while($res=mysqli_fetch_array($query)){
// ?>
<!--                            <td><?php echo $res['name']; ?> </td>
//                            <td><?php echo $res['rate']; ?> </td>
//                            <td><?php echo $res['qty']; ?> </td>
//                            <td><?php echo $res['total']; ?></td> -->
                        </tr>
                         <?php
//                         }
//                          ?>
                     </table>
                  </div>
               </div>
            </div>
         </div>
      </section>
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
<?php


 
if(isset($_POST['save'])){
             
 $sql="DELETE FROM  ";
 $result=mysqli_multi_query($conn,$sql);
 if($result==true){
    echo "deleted record";
  }
}
     
        

 ?>
   </body>
</html>