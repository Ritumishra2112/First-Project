<?php
//include 'connection.php';
//<!--if(isset($_REQUEST['id'])){
    //$sql="select * from item WHERE id='".$_REQUEST['id']."'";
    //$query= mysqli_query($conn,$sql);
    //$data = array();
    //$sno=1;
    //while($res = mysqli_fetch_assoc($query)){

        //$data = $res;
       // $sno++;
//}-->
//echo json_encode($data);
//}-->
include "connection.php";
if($_POST['type']=="")
{
    $sql="SELECT * FROM item";
    $query=mysqli_query($conn,$sql) or die("Query Unsuccessful.");
    $str="";
    while($res=mysqli_fetch_assoc($query)){
        $str.="<option value='{$res['id']}'>{$res['name']}</option>";
    }
}
    else 
    {
        if($_POST['type']=="statedata"){
        $sql="SELECT * FROM item WHERE id={$_POST['id']}";
        $query=mysqli_query($conn,$sql) or die("Query Unsuccessful.");
        $str="";
        while($res=mysqli_fetch_assoc($query)){
            $str.="<option value='{$res['rate']}'>{$res['rate']}</option>"; 
    }
}
}
echo $str;
?>
