<?php

include("connection.php");
$id=$_GET['sid'];
$query="DELETE FROM supplier WHERE sid=$id";
mysqli_query($conn,$query);
header('location:sup.display.php');

?>