<?php 
session_start();
if(!isset($_SESSION['username'])){
    header('location:login.php');
}

?>
<html>
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <?php include 'links.php' ?>
  </head>


<body style="background-color:grey;">
          <button type="submit" name="ITEMS" class="btn" id="item">
          <a  href="item.php">ITEM</a></button>
          <button type="submit" name="SUPPLIERS" class="btn" id="supplier">
          <a  href="supp.php">SUPPLIER</a></button>
          <button type="submit" name="PURCHASE" class="btn" id="purchase">
          <a  href="purchase_master.php">PURCHASE</a></button>
          <button type="submit" name="SALES" class="btn" id="sale">
        
          <a  href="sale_master.php">SALE</a></button>
          <button type="submit" name="REPORT" class="btn" id="submit">
          <a  href="#">REPORT</a></button>
        <div class="center_content">
            <h3>Welcome , <?php echo $_SESSION['username']; ?></h3> 
</div>
<button type="submit" name="logout" class="btn btn-warning" id="sale">
        
          <a  href="logout.php">LOG OUT</a></button>

</body>
</html>