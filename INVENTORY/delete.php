<?php
error_reporting(0);
include("connection.php");
$id=$_GET['id'];
$query="DELETE FROM item WHERE id=$id";
mysqli_query($conn,$query);
header('location:display.php');

?>