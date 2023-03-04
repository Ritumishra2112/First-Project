<?php

include"config.php";
if($_POST['type']==""){
    $sql="select * from item";
    $query=mysqli_query($conn,$sql)or die('failed');
    $str="";
    while($res=mysqli_fetch_assoc($query)){
        $str.="<option value='{$res['id']}'>{$res['name']}</option>";
    }
}{
    if($_POST['type']=="statedata"){
        $sql="select * from item where id={$_POST['id']}";
        $query=mysqli_query($conn,$sql)or die('failed');
        $str="";
        while($res=mysqli_fetch_assoc($query)){
            $str.="<option value='{$res['rate']}'>{$res['rate']}</option>";
        }
    }
   
}

echo $str;
?>