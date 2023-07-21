<?php include 'dbcon.php' ?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.7.0.slim.js" integrity="sha256-7GO+jepT9gJe9LB4XFf8snVOjX3iYNb0FHYr5LI1N5c=" crossorigin="anonymous"></script> 
<style>
  @media screen{

  }
  @media print{
    .btn,.Noprint{
      display:none;
    }
    .form-control{
      border:0px;
    }
    .input-group-text{
      border:0px;
      background-color:white;
    }
  }
</style>
<script>
      function Getprint() {
        window.print();
      }
      function BtnAdd() {
       var v=  $("#TRow").clone().appendTo("#TBody");
         $(v).find("input").val('');
         $(v).removeClass("d-none");
      }
      function BtnDel(v){
        $(v).parent().parent().remove(); 
      }
      function calc(v) {
        var index= $(v).parent().parent().index();
      
        var qty=document.getElementsByName("qty")[index].value;
        var rate=document.getElementsByName("rate")[index].value;
        var total= +qty * rate;
        document.getElementsByName("total")[index].value=total;
        GetTotal(); 
      }
      function GetTotal(){
        var sum=0;
        var totals=document.getElementsByName("total");
        for (let index = 0; index <totals.length; index++) {
                var total = totals[index].value;
                sum= +(sum) + +(total);
        }
        document.getElementById("FTotal").value = sum;

        var rcdamt=document.getElementById("FReceived Amt").value;
        var netamt= +(sum) - +(rcdamt);
        document.getElementById("FNetAmt").value = netamt;
      }
      
     </script>
    <title>invoice</title>
  </head>
  <body>
<div class="container">

<div class="card">
  <div class="card-header text-center">
    <h4>Invoice</h4>
  </div>
  <div class="card-body">
    
  <div class="row">
    <div class="col-8">
    <div class="input-group mb-3">
      <div class="input-group-prepend">
          <span class="input-group-text" id="basic-addon1">customer</span>
    </div>
          <input type="text" class="form-control" placeholder="customer" aria-label="Username" aria-describedby="basic-addon1">
</div>


<div class="input-group mb-3">
  <div class="input-group-prepend">
        <span class="input-group-text" id="basic-addon1">Address</span>
  </div>
        <input type="text" class="form-control" placeholder="Address" aria-label="Username" aria-describedby="basic-addon1">
</div>


<div class="input-group mb-3">
  <div class="input-group-prepend">
          <span class="input-group-text" id="basic-addon1">Phone Numer</span>
  </div>
          <input type="text" class="form-control" placeholder="Phone Number" aria-label="Username" aria-describedby="basic-addon1">
</div>

    </div>
<div class="col-4">
    <div class="input-group mb-3">
  <div class="input-group-prepend">
          <span class="input-group-text" id="basic-addon1">Inv. No</span>
  </div>
          <input type="text" class="form-control" placeholder="Invoice No" aria-label="Username" aria-describedby="basic-addon1">
</div>

<div class="input-group mb-3">
  <div class="input-group-prepend">
          <span class="input-group-text" id="basic-addon1">Inv.Date</span>
  </div>
          <input type="text" class="form-control" placeholder="Invoice date" aria-label="Username" aria-describedby="basic-addon1">
</div>



    </div>
</div>

<table>
    <!-- <input type ="number" value ="number" name ="number"> -->
</table>
<table class="table table bordered">
  <thead class="table-dark">
    <tr>
      <th scope="col">No</th>
      <th scope="col">Description</th>
      <th scope="col"class="text-end">Qty</th>
      <th scope="col" class="text-end">Rate</th>
      <th scope="col"class="text-end">Total</th>
      <th scope="col"class="Noprint">
      <button type="button" class="btn btn-warning" onclick="BtnAdd()"> +</button>
      </th>
      </tr>
  </thead>
  <tbody id="TBody">
    <tr id="TRow" class="d-none">
      <th scope="row"><input type ="number" class="form-control text-end" value ="number" name ="number" >
 </th>
      
       <td> <div>
          <?php
        $sql = "SELECT * FROM bill_info";
$result = $con->query($sql);

// Display the fetched data
if ($result->num_rows > 0) {
    //echo "Description:";
    echo "<select name='description'>";
    while ($row = $result->fetch_assoc()) {
        echo "<option value='" . $row["Rate"] . "'>" . $row["Description"] . "</option>";
       // echo "<td><option value='" . $row["Rate"] . "'>" . $row["Rate"] . "</option></td>";
      // $Rate = $row["Rate"];

      // echo "<td>$Rate</td>";
        //echo '<input type="text" class="form control text-end" name="rate" onchange="calc(this);" value="'.$row["Rate"].'"></td>';

    }
    echo "</select>";
  }
?>
  </div>
        <!-- <select name="description" id="">
        <option value=" 5A light point">5A light point</option>
        <option value="5A plug point"> 5A  plug point</option>
        <option value="15 plug point"> 15 plug point</option>
        <option value="2way point"> 2way point</option>
        <option value="5A plug point"> 5A point</option>  </select>
    </td> -->
</td>

<td><input type="number" class="form control text-end" name="qty" onchange="calc(this);"></td>
<td><input type="text" class="form control text-end" name="rate" onchange="calc(this);"></td>
    <td><input type="number" class="form control text-end" name="total" disabled=''></td>
    <td class="Noprint"><button type="button" class="btn btn-danger" onclick="BtnDel(this)">x</button></td>

   </tr>
  
    

  </tbody>
</table> 


<div class="row">
    <div class="col-8">
    <button type="button" class="btn btn-primary" onclick="Getprint()">Print</button>
    </div>
    <div class="col-4">
    <div class="input-group mb-3">
  <div class="input-group-prepend">
          <span class="input-group-text" id="basic-addon1">Total</span>
  </div>
          <input type="text" class="form-control" id="FTotal" name="FTotal" disabled=''>
</div>

<div class="input-group mb-3">
  <div class="input-group-prepend">
          <span class="input-group-text" id="basic-addon1">Received Amt.</span>
  </div>
          <input type="text" class="form-control" id="FReceived Amt" name="FReceived Amt" onchange="GetTotal()">
</div>

<div class="input-group mb-3">
  <div class="input-group-prepend">
          <span class="input-group-text" id="basic-addon1">Net Amt</span>
  </div>
          <input type="text" class="form-control" id="FNetAmt" disabled='' name="FNetAmt" >
</div>

  </div>
</div>
  </div>
</div>
</div>
</body>
</html>