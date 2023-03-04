<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>purchase form</title>
    	
	<link rel="stylesheet" href="css/bootstrap.css">
	<style>
        .btm{
            min-width: 300px;
        }
        </style>
</head>
<body onload="multiply()"  onload="bill();" >
<div class="container py-5">
<form action="" method="POST">
    <div class="row m-auto">
            <div class="col-sm-4">
                <div class="form-group">
                <label for="" class=" text-sm mb-2">Transfer no</label>
                    <input type="text" placeholder="transfer_no" name="transfer_no" class="form-control mb-2"required autocomplete="off">
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                <label for="" class="mb-2">Transfer  Date</label>
                    <input type="datetime-local" placeholder="transfer_date" name="invoice date" class="form-control mb-2"required autocomplete="off">
                </div>
            </div>

            <div class="col-sm-4">
                <div class="form-group">
                    <label class="mb-2">Supplier name</label>
                    <input type="text" placeholder="supplier_name" name="name" class="form-control mb-2"required autocomplete="off">
                    
                </div>
            </div>
         
               
</div>
  </div>
    </div>
    <div class="container">
    <div class="row m-auto">
           <div class="col-md-3">
           <div class="form-group">
                <label for="" class=" text-sm mb-2">Item name</label>
                <select class="form-control" id="item" name="fname" onclick="multiply()">
                        <option value="">Select Item</option>
                     </select>
                </div>
           </div>
           <div class="col-md-3">
           <div class="form-group">
                <label for="" class=" text-sm mb-2">Rate</label>
                <select class="form-control" id="rate" name="rate" onclick="multiply()" onclick="bill();">
                        <option value=""></option>
                     </select>
                </div>
           </div>
         
           <div class="col-md-3">
           <div class="form-group">
                <label for="" class=" text-sm mb-2">Quantity</label>
                    <input type="number" placeholder="Quantity"  id="equ"  name="qty" onclick="multiply();"  onclick="bill();"class="form-control mb-2"required autocomplete="off">
                </div>
           </div>
           <div class="col-md-3">
           <div class="form-group">
                <label for="" class=" text-sm mb-2">total</label>
                <input class="form-control" type="text" name="total" id="total"  onclick="bill();" value="0" readonly>
                </div>
           </div>
        </div>
        <input type="submit" name="save" class="btn btn-primary btm m-4" value="Add" id="add"
        onclick="return show();" >
<div>







</form>
    </div>
</body>
<script src="js/jquery.js"></script>
<script>
    $(document).ready(function(){
        function loaddata(type, category_id){
            $.ajax({
url: "load.php",
type: "POST",
data:{
    type : type,
   " id" : category_id,
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
     var supplier = $("#item").val();
       loaddata("statedata",supplier)
       })
    });
    </script>
        <script>
function multiply() {
    var one =  document.getElementById("equ").value;
     var two =  document.getElementById("rate").value;
  var total= one*two;
    document.getElementById("total").value = one*two;
}
           
</script>
</html>