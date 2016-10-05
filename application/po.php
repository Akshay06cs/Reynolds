<html>
<head>
<title>Reynolds                                                    www.zeelnet.com</title>
<script type="text/javascript" src="<?php echo base_url("assets/js/jquery-1.11.3.min.js");?>"></script>
<script type="text/javascript" src="<?php echo base_url("assets/js/bootstrap.js");?>"></script>

</head>
<body>
<h1>Purchase Order</h1>
<a href = "<?php echo base_url();?>index.php/users/view_po">View Record</a>    
<form method ="post" action = "<?php echo base_url(); ?>index.php/users/insert_purchase_db" >
<?php
extract($part);
?>

   
        Part Id:<select name = "pid">
                    <option><?php echo $part; ?></option>
                    <?php foreach($partid as $part){ ?>
                    <option onclick="part_show('add_order',<?php echo $part->pid; ?>)"><?php echo $part->part; ?></option>    
                    <?php } ?>
                </select>

        Part Name:<input type ="text" name = "pname" size = "20" value = "<?php echo $pname; ?>"/>
      Description:<input type ="text"  name = "des" size = "20" value = "<?php echo $des; ?>" />

      UOM:<input type ="text" name = "uom" size = "20"value = "<?php echo $uom; ?>"/>
       Supplier:<select name = "supp">
                    <?php foreach($supplier as $supp){
                    echo '<option>'.$supp->sname.'</option>';
                    } ?>
                </select>
          
   
  
        Date
           <input type ="date" name = "date" size = "20">


    Site
            <td width = "161"><input type ="text" value = "Belgaum" name = "site" size = "20"></td>
    </tr>
    <tr>
        <th align = "right" scope="row">Type</th>
            <td width = "161"><input type ="text"  name = "type" size = "20" /></td>
    </tr>
    <tr>
        <th align = "right" scope="row">Narration</th>
            <td width = "161"><textarea name = "nar"></textarea></td>
    </tr>
    <tr>
        <th align = "right" scope="row">Due Date</th>
            <td width = "161"><input type ="date" name = "ddate" size = "20" /></td>
    </tr>
    <tr>
        <th align = "right" scope="row">Quantity</th>
            <td width = "161"><input type ="text" name = "qty" size = "20" id="qty" onkeyup="sum();" /></td>
    </tr>
    <tr>
        <th align = "right" scope="row">Price</th>
            <td width = "161"><input type ="text" name = "prz"  id="prz" size = "20" onkeyup="sum();"/></td>
    </tr>
    <tr>
        <th align = "right" scope="row">Amount</th>
            <td width = "161"><input type ="text" name = "amt"size = "20"  id ="amt" /></td>
    </tr>
    <tr>
        <th align = "right" scope="row">Tax</th>
            <td width = "161">
                <select name = "tax" onclick="taxcal();" id = "tax">
                    <option>-</option>
                    <option>5</option>
                    <option>5.5</option>
                    <option>14.5</option>
                </select>
            </td>
    </tr>
    <tr>
        <th align = "right" scope="row">Grand Amount</th>
            <td width = "161"><input type ="text" name = "grand" size = "20"  id="grand" /></td>
    </tr>
    <tr>
        <th align = "right" scope = "row">&nbsp;</th>
            <td><input type = "submit" name = "submit" id="sub" value = "Send" /></td>
    </tr>

</form> 
<script>
    function sum()
    {
        var firstNum = document.getElementById('qty').value;
        var secondNum = document.getElementById('prz').value;
        var result = parseFloat(firstNum) * parseFloat(secondNum);
        if(!isNaN(result))
        {
            document.getElementById('amt').value = result;
        } 
    }
     function taxcal()
     {
        var amt = document.getElementById('amt').value;
        var tax = document.getElementById('tax').value;
        if(tax==5)
        {
            var result = parseFloat(amt)*5/100 + parseFloat(amt);
        }else if(tax==5.5)
        {
            var result = parseFloat(amt)*5.5/100 + parseFloat(amt);
        }else if(tax==14.5)
        {
            var result = parseFloat(amt)*14.5/100 + parseFloat(amt);
        }
        if(!isNaN(result))
        {
            document.getElementById('grand').value = result;
        } 
     }
     function part_show(act,gotoid){
        if(act == "add_order")
          window.location = "<?php echo base_url(); ?>index.php/users/"+act+"/"+gotoid;
     }
    </script>
    

</body>
</html>