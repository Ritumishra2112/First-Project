
    <?php
      include 'connection.php';
     // include 'management.php';
      $id=$_GET['id'];
          // for dispalying the data before update
          
          
      $sql="SELECT pmaster.invoice,pmaster.invoicedate,supplier.id,supplier.name,supplier.address from pmaster
            inner join supplier ON pmaster.name=supplier.id WHERE pmaster.id=$id";
      $result=(mysqli_query($conn,$sql));
     while ($row=mysqli_fetch_assoc($result)){
                    $inv_no=$row['invoice'];
              $inv_date=$row['invoicedate'];
              $id1=$row['id'];
              $sname=$row['name'];
              $sadd=$row['address'];
      
                    if(isset($_POST['receipt'])){
                          $inv_no=$_POST['invoice'];
                          $inv_date=$_POST['invoicedate'];
                          $id1=$_POST['id'];
                          $sname=$_POST['name'];
                          $sadd=$_POST['address'];
                    //  $sql="SELECT pmaster.invoice,pmaster.invoicedate,supplier.id,supplier.name,supplier.address from pmaster
                    //  inner join supplier ON pmaster.name=supplier.id WHERE pmaster.id=$id";
                    //  $result=(mysqli_query($conn,$sql));
                   }
     }  
  
    ?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script
      src="https://code.jquery.com/jquery-3.6.0.min.js"
      integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
      crossorigin="anonymous"
    ></script>
    <link rel="" type="" href="">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style/style_in.css">
    <title>receipt item</title>
</head>
<body>
  
    <section>
          <section style="background-color:#E9AB17 ;">
          <h2 class="text-center"> Sparrow softech pvt ltd</h2>
         </section>
      <form action="" class="form-horizontal" method="post">
      <div class="container">
          
          <div class="move-left" id="move-left">
              <label><b>Invoice no: </b><span name="invoice" id="invoice" value="<?=$inv_no?>"><?=$inv_no?></span></label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;         
              
              <label class="move-right" id="move-right"> <b>Invoice Date:</b><span name="inv_date" id="inv_date" value="<?=$inv_date?>"><?=$inv_date?></span>  </label>         
             
            </div>
          <div class="move-left" id="move-left">

            <label><b>Receipt No: </b> <span name="r_no" id="r_no" value="<?=$id1?><?='-'?><?=$inv_date?>"><?=$id1?><?='-'?><?=$inv_date?></span> </label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;        
             
            <label class="move-right" id="move-right" > <b> Receipt Date: </b><span name="r_date" id="r_date" value="<?=$inv_date?>"><?=$inv_date?></span></label>         
              
          </div>
          <div class="move-left" id="move-left">
            <label> <b> Supplier Name: </b><span name="s_name" id="s_name" value="<?=$sname?>"><?=$sname?></span> </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;         
                     
          
            <label class="move-right" id="move-right"> <b>Supplier Address: </b><span name="s_address" id="s_address" value="<?=$sadd?>"><?=$sadd?></span> </label>         
            
          </div>
        </div>
 <!-- ---------------------------------------------------------list details-------------------------- -->
          <section style="background-color:#CCCCFF  ;">
          
           <h2 class="text-center">ITEM DETAILS</h2>
            
          </section>
          <section style="background-color:#848B79 ;">
              <div class="container mx-5">
                <table class="table">
                  <thead class="thead"style="background:;">
                    <tr>
                      <th scope="col">S.no</th>
                      <th scope="col">Item_name</th>
                      <th scope="col">Price</th>
                      <th scope="col">Quantity</th>
                      <th scope="col">Total</th>
                    </tr>
                  </thead>
                  <tbody>
                     <?php
                      // $sql="SELECT p.invoice,p.s_date,r.u_id,r.u_name,r.u_address from p_master p 
                      // registration r where r.u_id=$id and p.s_name=$id and d.sup_id=$id";
                      $sql="SELECT item.name,orders.rate,orders.qty,orders.total FROM orders INNER JOIN item ON orders.name=item.id where orders.id=$id";
                      $result=(mysqli_query($conn,$sql));
                      if($result==true){
                              $sn=1;
                              $gtotal=0;
                            while($row=mysqli_fetch_assoc($result)){
                                                              

                                 
                                  $name=$row['name'];
                                  $rate=$row['rate'];
                                  $qty=$row['qty'];
                                  $total=$row['total'];
                                                      
                                  echo '<tr>
                                    <th scope="row"> '.$sn.' </th>
                                    <td>'.$name.'</td>
                                    <td>'.$rate.'</td>
                                    <td>'.$qty.'</td>
                                    <td>'.$total.'</td>
                                  
                                  </tr>';
                                  
                              $gtotal+=$total;
                                
                                $sn++;                                 
                          }
                          echo '<thead  class="thead" style="background:cyan;">
                                  <tr>
                                  <th scope="row"> </th>
                                  <td></td>
                                  <td></td>
                                  <td>Total</td>
                                  <td>'.$gtotal.'</td>
                                
                                </tr>
                                
                                </thead>';
                                                
                        }  else{
                          echo 'NO Record Found';
                       }
                                                      
                    ?>
                   
                  </tbody>
                  </table>
                </div>
            
            </section>

      </form>  
      
    </section>
    
    
</body>
</html>