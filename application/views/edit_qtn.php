<html>
<head>
    <title>RCPL Quotation Detail</title>
    <script type='text/javascript' src="<?php echo base_url(); ?>assets/js/jQuery-2.1.4.min.js"></script>  
    <link rel='stylesheet' type='text/css' href="<?php echo base_url("assets/css/bootstrap.min.css");?>" />
    <link rel='stylesheet' type='text/css' href="<?php echo base_url("assets/css/jquery.ptTimeSelect.css");?>" />
    <script type='text/javascript' src="<?php echo base_url(); ?>assets/js/jquery.ptTimeSelect.js"></script>
    <!--Autocomplete -->
    <script type='text/javascript' src="<?php echo base_url(); ?>assets/js/jquery-ui.js"></script>
    <!-- Jquery Plugin For Ubuntu-->
         <script type='text/javascript' src="<?php echo base_url(); ?>assets/js/jquery-1.12.1.min"></script>
          <!--Currency formater javascript file -->
        <script type='text/javascript' src="<?php echo base_url(); ?>assets/js/format.20110630-1100.min.js"></script>
    <!-- Dropdown Style For Autocomplete -->
    <link rel='stylesheet' type='text/css' href="<?php echo base_url("assets/css/jquery-ui.css");?>" />
    <!--Accordion -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    <link rel="stylesheet" href="<?php echo base_url("assets/css/insp.css");?>">
    <link rel="stylesheet" href="<?php echo base_url("assets/css/gate_pass.css");?>">
    <!-- Floating Button -->
    <link rel='stylesheet' type='text/css' href="<?php echo base_url("assets/css/font-awesome.min.css");?>" />
    <script type='text/javascript' src="<?php echo base_url(); ?>assets/js/materialize.js"></script> 
    <link rel='stylesheet' type='text/css' href="<?php echo base_url("assets/css/materialize.css");?>" />
<script>
$(function() {
    $( "#accordion" ).accordion();
    $( "#datepicker" ).datepicker({ dateFormat: 'dd-mm-yy' });
    $('#cond').hide();
});
</script>

  <style>
   
   .form-group.required .control-label:after { 
   content:"*";
   color:red;
    }
    input{ border: 0;}
        body
        {
            counter-reset: Serial;           /* Set the Serial counter to 0 */
        }
      
        .prospect_data td:first-child:before
        {
            counter-increment: Serial;      /* Increment the Serial counter */
            content:counter(Serial);        /* Display the counter */
        }
    </style>
    <script>
      $(document).ready(function(){
            not_no();
        });
        function not_no(){
        $(".quantity, .price").keypress(function (e) {
        //if the letter is not digit then display error and don't type anything
        if ((event.which != 46 || $(this).val().indexOf('.') != -1) && (event.which < 48 || event.which > 57)){
        //display error message
        $("#errmsg").html("Digits Only").show().fadeOut("slow");
            return false;
        }
        });
        }
    </script>
</head>
<body>
   
  <form  action="<?= base_url('index.php/users/updateProspects') ?>" method ="post">
    <div id="accordion">
  <h1 style="background:#428bca;color:white" id="acc1">Quotation Detail</h1>
  
    <div>
   <div class="form-style-4" >
                      
                        
                         
    <div class="form-group required">
                        <label for="field1"><input type="hidden" name="cust_supp_id" value="<?= $r->cust_supp_id ?>" class="cust_supp_id">
                            <span align="left" >Customer Name</span>:<?= $r->customer_name ?><input type="hidden" name="customer" value="<?= $r->customer_name ?>"><input type="hidden" name="addr1" value="<?= $r->addr1 ?>"><input type="hidden" name="addr2" value="<?= $r->addr2 ?>"><input type="hidden" name="city" value="<?= $r->city ?>"><input type="hidden" name="state" value="<?= $r->state ?>"><input type="hidden" name="pin" value="<?= $r->pin ?>"><input type="hidden" name="sub"  value="<?= $r->sub ?>"><input type="hidden" name="ref" value="<?= $r->ref ?>">
                        </label>
       
                        <label for="field1">
                            <span align="left" >Quotation Date</span>:<input type="text" name="date" value="<?php echo date('d-m-Y', strtotime(str_replace('-','/', $r->qt_date))); ?>" id="datepicker">
                        </label>
                        <label for="field1">
                            <span align="left">Quotation No.</span>:<?= $r->qt_no ?><input type="hidden" name="number" value="<?= $r->qt_no ?>">
                        </label>
                       
                        <label for="field2">
                            <span align="left"  class='control-label'>Quotation Version</span>:<input type="text" name="version" value="<?= $r->version ?>" class="version">
                        </label> 
                        <label for="field2">
                            <span align="left">Total Value</span>: <i class="fa fa-inr"></i>&nbsp;<b><input type="text" name="value" id="value" value = "<?php echo $r->total_value;?>" readonly title="Total Sum" name="value" class="total_value"><input type="hidden" value="<?php echo $r->qid;?>" name="id"></b>
                        </label>
                        <label for="field1">    
                             <span align="left">Contact Person</span>: 
                        <select class="person" id='person' name="person">
                            <option><?= $r->contct_person ?></option>
                        </select>
                        </label> 
                        <label for="field1">    
                             <span align="left">Mobile</span>:
                            <input type="text" name="mobile" id="mobile" title="Mobile Phone Number" placeholder="Mobile Phone Number" value="<?= $r->cnt_num ?> "><input type="hidden" name="dept" value="<?= $r->dept ?>" >
                        </label>  
        <textarea name="conditions" id="cond"><?= $r->condtions ?></textarea>
        
                       
          </div>
         </div>
                </div>
    <h3 style="background:#428bca;color:white" id="acc2">Equipment Deatil</h3>
  <div>
  <div class="form-style-4 form-group required">
       
        <table  class="table test "> 
            <tr class="prospect" style=" background-color:#eeeeee;">
                <th align="center" style="width:10%">Si. No.</th>
                <th align="center" >Description</th>
                <th align="center" style="width:10%">Quantity</th>
                <th align="center" style="width:10%">Price</th>
                <th align="center" style="width:10%">Total</th>
            </tr>
            <?php 
                foreach($q as $key){ ?>
		<tr class="prospect_data">
                    <td style="width:5%">.</td>
                    <td>   
                        <textarea name="description[]" id="description" title="Description Of Material" style="width:100%;color:black;" rows="2" resize="none"  class="equip_name"  ><?= $key->description ?></textarea>	
                    </td>
                    <td style="width:10%">
                        <textarea name="quantity[]" class="quantity" title="Quantity" style="width:100%" rows="2"  ><?= $key->qty ?></textarea>
                    </td>
                    <td style="width:20%">
                        <textarea name="price[]" class="price" title="Price" style="width:100%" title="Price" rows="2" ><?= $key->rate ?></textarea>
                    </td>
                    <td style="width:20%">
                        <textarea name="total[]" class="total" style="width:100%" rows="2" title="Total" ><?= $key->total ?></textarea>
                    </td>
		</tr>
                <?php 
                } ?>
	</table>
      <span id="errmsg" style="align:center;color:red;"></span>
        <div>
            <a href="javascript:;" title="Add a row" ><span class="glyphicon glyphicon-plus plusbtn1"></span></a>
            <a href="javascript:;" title="Remove the row"><span class="glyphicon glyphicon-minus minusbtn1"></span></a>
        </div>
      
    </div>
  </div>
</div>
<div class="fixed-action-btn vertical" style="bottom: 45px; right: 24px;">
                <a class="btn-floating btn-large red"  href="<?php echo base_url();?>index.php/users">
                    <i id="pluse_ic" class="glyphicon glyphicon-plus"></i>
                    <i class="glyphicon glyphicon-home"></i>
                </a>
                <ul>
                     <li><button type="submit" name = "submit" class="btn-floating blue" data-placement="bottom" title="Save"><span class="glyphicon glyphicon-floppy-save"></span></button></li>
                    <li><a class="btn-floating grey"  data-placement="bottom" title="Go Back!"  href="javascript:window.history.go(-1);"><i class="glyphicon glyphicon-arrow-left"></i></a></li>    
                </ul>
            </div>
               </form>    
            <script>
                $('.fixed-action-btn').hover(function(){
                $('#pluse_ic').toggle();
                });
                </script>

</body>
<script>
   $(document).ready(function(){
        $('.plusbtn1').click(function() {
        var $row = $('<tr class="prospect_data"><td>.</td><td><textarea name="description[]" id="description" class="equip_name" style="width:100%;color:black;" rows="2" resize="none" title="Description Of Material" placeholder="Material Description" required="required"></textarea></td><td style="width:10%"><textarea name="quantity[]" class="quantity" style="width:100%" rows="2" title="Quantity" placeholder="Quantity" required="required"></textarea></td><td style="width:10%"><textarea name="price[]" class="price" style="width:100%" rows="2" title="Price" placeholder="Price" required="required"></textarea></td><td style="width:10%"><textarea name="total[]" class="total" style="width:100%" rows="2" placeholder="Total" title="Total"  required="required"></textarea></td></tr>').insertAfter(".prospect_data:last");
        bind($row);
        });
        function bind($row)
        {
            $row.find('.equip_name').keyup(equip_name);
            $row.find('.total').keyup(update_price);
            $row.find('.quantity').focus(not_no);
        }
    });
    $('.minusbtn1').click(function() {
	if($(".test tr").length != 2)
        {
            $(".test tr:last-child").remove();
        }
        else
        {
            alert("You cannot delete first row");
        }
    });  
     $('.total').keyup(function(){
        update_price();
    });
</script>
<script>
 $(document).ready(function () {
        equip_name();
    });
    function equip_name() {
           $(".equip_name").autocomplete({
            source: function (request, response) {
                $.ajax({
                    url: "<?php echo base_url(); ?>index.php/users/equip_name",
                    data:{term: request.term},
                    dataType: "json",
                    type: "POST",
                    dataFilter: function (data) { return data; },
                    success: function (data) {
                    response($.map(data, function (item) { 
                    return {
                                label: item.equip_desc,
                                value: item.equip_desc,
                            }
                    }))
                    },
                    error: function (XMLHttpRequest, textStatus, errorThrown) {
                    alert(textStatus);
                    }
                    });
                    },
                    minLength: 1,
                });
            }
   
   
    // Total Price And Ruppee Conversion
   function update_price() 
    {
            total_cal=0;
            $('.prospect_data').each(function() {
            rate = $(this).find('.price').val().replace(/\,/g,"");
            quantity =$(this).find('.quantity').val().replace(/\,/g,"");
            sum_cal =rate * quantity;
              var sum_fixed=parseFloat(sum_cal).toFixed(2);
                        var FullData = format( "#,##0.00####", sum_fixed);
                        var n=FullData.split(",");
                        var part1 ="";
                        for(i=0;i<n.length-1;i++)
                        part1 +=n[i];    
                        var part2 = n[n.length-1];
                        if(part1.length>0){
                        var sum =format( "##,##.####", part1) + "," + part2
                        }else{
                        var sum =format( "##,##.####", part1) + "" + part2
                        }
                        $(this).find('.total').val(sum);
            // This Is Use to format The Rate
                         var sum_fixed=parseFloat(rate).toFixed(2);
                        var FullData = format( "#,##0.00####", sum_fixed);
                        var n=FullData.split(",");
                        var part1 ="";
                        for(i=0;i<n.length-1;i++)
                        part1 +=n[i];    
                        var part2 = n[n.length-1];
                        if(part1.length>0){
                        var sum1 =format( "##,##.####", part1) + "," + part2
                        }else{
                        var sum1 =format( "##,##.####", part1) + "" + part2
                        }
                        $(this).find('.price').val(sum1);
            total_cal=total_cal+sum_cal;
        });
         var total_fixed=parseFloat(total_cal).toFixed(2);
                        var FullData = format( "#,##0.00####", total_fixed);
                        var n=FullData.split(",");
                        var part1 ="";
                        for(i=0;i<n.length-1;i++)
                        part1 +=n[i];    
                        var part2 = n[n.length-1];
                        if(part1.length>0){
                        var total =format( "##,##.####", part1) + "," + part2
                        }else{
                        var total =format( "##,##.####", part1) + "" + part2
                        }
                        $('#value').val(total);
    }
</script>
    <script>
 $(document).ready(function(){   
        $("#person").change(function(){
        var opt="Select Contact Person";
        var i;
        var got=$("#person option:selected").text();
        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>index.php/users/supp_mobile",
            dataType: 'json',
            data:{'sel': got},
            success: function(res)
            {
                if($("#person option:selected").text()===opt);
                {
                    $("#mobile").val(' ');
                }
                $("#mobile").val(res.mob);
            } 
            });
        });
    });
    
     $(document).ready(function () {
                    var businessEntityId = $('.cust_supp_id').val();
                    $.ajax({
                        type: "POST",
                        data:{'id': businessEntityId},
                        dataType:"json",
                        url: "<?php echo base_url(); ?>index.php/users/supp_credentials",
                        success: function(data) 
                        {   
                            for(i=0;i<=10;i++)
                                {
                                    $("#person").append('<option>' + data[i].fname+" "+data[i].lastname+ '</option>');
                                }
                        }
                    });
                    }
              
        );
</script>
</html>

