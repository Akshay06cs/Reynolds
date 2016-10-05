<html>
<head>
    <title>Update OBN Detail</title>
        <link rel='stylesheet' type='text/css' href="<?php echo base_url("assets/css/style1.css");?>" />
        <link rel='stylesheet' type='text/css' href="<?php echo base_url("assets/css/bootstrap.min.css");?>" />
        <link rel='stylesheet' type='text/css' href="<?php echo base_url("assets/css/jquery.ptTimeSelect.css");?>" />
        <script type='text/javascript' src="<?php echo base_url(); ?>assets/js/jquery.ptTimeSelect.js"></script>
        <!--Autocomplete -->
        <script type='text/javascript' src="<?php echo base_url(); ?>assets/js/jquery-ui.js"></script>
	 <script type='text/javascript' src="<?php echo base_url(); ?>assets/js/jQuery-2.1.4.min.js"></script>      
	<!-- Dropdown Style For Autocomplete -->
        <link rel='stylesheet' type='text/css' href="<?php echo base_url("assets/css/jquery-ui.css");?>" />
         <!--Accordion -->
        <link rel="stylesheet" href="<?php echo base_url("assets/css/jquery-ui.js");?>" >
        <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
        <link rel="stylesheet" href="<?php echo base_url("assets/css/insp.css");?>">
        <link rel="stylesheet" href="<?php echo base_url("assets/css/gate_pass.css");?>">
        <!-- Floating Button -->
        <link rel='stylesheet' type='text/css' href="<?php echo base_url("assets/css/font-awesome.min.css");?>" />
        <script type='text/javascript' src="<?php echo base_url(); ?>assets/js/materialize.js"></script> 
        <link rel='stylesheet' type='text/css' href="<?php echo base_url("assets/css/materialize.css");?>" />
        
         <!-- Date Picker Plugins -->
    <script type='text/javascript' src="<?php echo base_url(); ?>assets/js/jquery-ui.js"></script>
    <link rel='stylesheet' type='text/css' href="<?php echo base_url("assets/css/jquery-ui.css");?>" />
      <!--Currency formater javascript file -->
    <script type='text/javascript' src="<?php echo base_url(); ?>assets/js/format.20110630-1100.min.js"></script>
  <script>
  $(function() {
    $( "#accordion" ).accordion();
  });

  </script>
   <style>
                .form-group.required .control-label:after { 
                content:"*";
                color:red;
                }
            </style>

</head>
<body>
    <h1>Order Booking Note</h1>
     <form  action="<?= base_url('index.php/users/updateOrderbooking') ?>" method ="post" >
    <div id="accordion" class="form-group required">
  <h1 style="background:#428bca;color:white">Order Booking Detail</h1>
  <div>
    <div class="form-style-4 ">
       
                        <label for="field1">
                            <span align="left" class='control-label'>Order Booking No.</span>: <input type="text"  name="obn_no" value="<?= $obn->obn_no ?>" required="required"/> 
                        </label>
                        <label for="field1">
                            <span align="left" class='control-label'>Customer Name</span>: <input type="text" name="customer_name" required="required" class='cname' value="<?= $obn->customer_name ?>"/>
                        </label>
                        <label for="field1">    
                             <span align="left">&nbsp;</span>:<input type="hidden" name='address' class="address" >
                        <select class="person" id='address_data' name="person">
                            <option value="0"><?= $obn->address ?></option>
                        </select>
                        </label>     
                        <label for="field1">
                            <span align="left">Customer Address</span>: <input type="text" name="customer_address1"  class='address1' value="<?= $obn->customer_address1 ?>"/>
                        </label>
                        <label for="field1">
                            <span align="left">&nbsp;</span>: <input type="text" name="customer_address2"class='address2' value="<?= $obn->customer_address2 ?>"/>
                        </label>
                        <label for="field1">
                            <span align="left">&nbsp;</span>: <input type="text" name="city" class='city' value="<?= $obn->city ?>" />
                        </label>
                        <label for="field1">
                            <span align="left">&nbsp;</span>: <input type="text" name="state"  class='state' value="<?= $obn->state ?>"/>
                        </label>
                        <label for="field1">
                            <span align="left">&nbsp;</span>: <input type="text" name="pin"  class='pin' value="<?= $obn->pin ?>"/>
                        </label>
                        <label for="field1">
                            <span align="left">Purchase Order No.</span>: <input type="text" name="po_no" value="<?= $obn->po_no ?>"/>  
                        </label>
                        <label for="field1">
                            <span align="left">PO Dated</span>: <input type="text" name="po_dated" class="datepicker" value="<?= $obn->po_dated ?>"/> 
                        </label>
                        <label for="field1">
                            <span align="left" class='control-label'>OBN Date</span>: <input type="text" name="obn_date" class="datepicker"  value="<?= $obn->obn_date ?>" required="required"/> 
                        </label>
                        <label for="field1">
                            <span align="left">Order Copy Attached </span>: <input type="radio" name="order_copy" class='order_yes' value="yes"  <?php if ($obn->order_copy == 'yes') echo 'checked'; ?> /> Yes &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="order_copy" class='order_no' value="no" <?php if ($obn->order_copy == 'no') echo 'checked'; ?>/> NO
                        </label>
                        <div class="order_no_pages">
                        <label for="field1">
                            <span align="left">No. of Pages</span>: <input type="text" name="no_pages" class="pages" /> 
                        </label>
                        </div>
                        </div>
      </div>
  <h3 style="background:#428bca;color:white" id='acc2'>Work Description</h3>
  <div>
      <div class="form-style-4">
            
        <table class="test table table-condensed table-borderd">
                <tr style="background-color:#eeeeee;">
                    <th>Si.No.</th>
                    <th>Description</th>
                    <th>Quantity</th>
                    <th class='control-label'>W.O. No.</th>
                    <th>Rate</th>
                    <th>Price</th>
                    <th>Delivery Date</th>
                </tr>
                <?php
                        $data  = $this->db->query("SELECT * FROM obn_details WHERE obn_no='{$obn->obn_no}'");
                        foreach($data->result() as $row){ ?>
                <tr class="item-row">
                    <td></td>
                    <td><textarea style="width:250px" name="desc[]" class="equip_name" rows="2" resize="none"><?= $row->description ?></textarea></td>
                    <td><textarea style="width:100%" name="qty[]" placeholder="Quantity" class="qty" ><?= $row->qty ?></textarea></td>
                    <td><textarea style="width:100%" name="order_no[]" placeholder="Work Order" ><?= $row->w_o_no ?></textarea></td>
                    <td><textarea style="width:100%" name="rate[]" placeholder="Rate" class="rate" ><?= $row->rate ?></textarea></td>
                    <td><textarea style="width:100%" name="price[]" placeholder="Price" class="price" readonly><?= $row->price ?></textarea></td>
                    <td><input type="text" style="width:100%" name="delivery_date[]" class="datepicker" value="<?= $row->delivery_date ?>"></td>
                </tr>
                        <?php } ?>
                </table>    
                <label for="field1">
                    <span align="left">Total</span><textarea  name="total" id="value" readonly><?= $obn->total ?></textarea>  
                </label>
                <a href="#" class="plusbtn1 glyphicon glyphicon-plus" title="Add New Row"></a>
                <a href="#" class="minusbtn1 glyphicon glyphicon-minus" title="Remove Last Row"></a>
                <span id="errmsg" style="color:red"></span>
        </div>
     </div>
   <h3 style="background:#428bca;color:white">Terms</h3>
  <div>
   <div class="form-style-4">
      
                  
                        <label for="field1">
                            <span align="left">Inspection by Nature</span>: <input type="radio" name="inspe_nature" class='tpi_dckeck' value="internal"  <?php if ($obn->inspe_nature == 'internal') echo 'checked'; ?>  /> Internal &nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="inspe_nature" class='tpi_ckeck' value="tpi" <?php if ($obn->inspe_nature == 'tpi') echo 'checked'; ?> /> TPI 
                        </label>
                         <?php if (!empty($obn->tpi)) { ?>  
                        <div>
                        <label for="field1">
                            <span align="left">TPI</span>: <input type="text" class="tpi" id="tpi" name="tpi" value="<?= $obn->tpi ?>"/>
                        </label>
                        </div>
                        <?php } ?>
                        <label for="field1">
                            <span align="left">Payment Terms</span>: <input type="text" name="pay_term"  id='payment_term' value="<?= $obn->pay_term ?>"/> 
                        </label>
                        <label for="field1">
                            <span align="left">Advance Received</span>:<input type="text" name="advance_receive" value="<?= $obn->advance_receive ?>" /> 
                        </label>
                    
        
        </div>
       </div>
   <h3 style="background:#428bca;color:white">Dispatch Instruction</h3>
  <div>
        <div class="form-style-4">
                        <label for="field1">
                            <span align="left">Destination</span>: <input type="text" name="destination" value="<?= $obn->destination ?>"  /> 
                        </label>
                        <label for="field1">
                            <span align="left">Transporter</span>: <input type="text" name="transporter" id='transporter' value="<?= $obn->transporter ?>"   /> 
                        </label>
                        <label for="field1">
                            <span align="left">Consigner</span>:<input type="radio" name="consigner" class='party' checked value='party'  <?php if ($obn->consigner == 'party') echo 'checked'; ?> /> Party &nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="consigner" class='self' value='self' <?php if ($obn->consigner == 'self') echo 'checked'; ?>  /> Self &nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="consigner" class='third_party' value='third_party' <?php if ($obn->consigner == 'third_party') echo 'checked'; ?> /> Third Party
                        </label>
                        <div class="third_party_div">
                        <label for="field1">
                            <span align="left">Address of Third Party</span>:<input type="text" name="addr_third_party" value="<?= $obn->addr_third_party ?>"  /> 
                        </label>
                        </div>
                        <label for="field1">
                            <span align="left">Any Road permit required</span>:<input type="radio" name="road_perm" class='yes' value="yes" <?php if ($obn->road_perm == 'yes') echo 'checked'; ?> /> Yes &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="road_perm" class='no' value="no" <?php if ($obn->road_perm == 'no') echo 'checked'; ?>/> NO
                        </label>
                        <label for="field1">
                            <span align="left">Whether enclosed</span>:<input type="radio" name="enclosed" class='enclose_yes' value="yes" checked <?php if ($obn->enclosed == 'yes') echo 'checked'; ?>/> Yes &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="enclosed" class='enclose_no' value="no" <?php if ($obn->enclosed == 'no') echo 'checked'; ?>/> NO
                        </label>
                        <div class="enclosed_no">
                        <label for="field1">
                            <span align="left">Give No.</span>:<input type="text" name="give_no" value="<?= $obn->give_no ?>"  /> 
                        </label>
                        </div>
                        <label for="field1">
                            <span align="left">Basis</span>:<input type="radio" name="basis" class='door' value ="door" <?php if ($obn->basis == 'door') echo 'checked'; ?> /> Door &nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="basis" class='godown' value ="godown"  <?php if ($obn->basis == 'godown') echo 'checked'; ?> /> Godown
                        </label>
                        <label for="field1">
                            <span align="left">Freight</span>:<input type="radio" name="freight" class='paid' value ="paid" <?php if ($obn->freight == 'paid') echo 'checked'; ?> /> Paid &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="freight" class='to_pay' value ="to_pay"  <?php if ($obn->freight == 'to_pay') echo 'checked'; ?>/> To Pay
                        </label>
        
        </div>
  </div>
    <h3 style="background:#428bca;color:white">Billing Instruction</h3>
  <div>
        <div class="form-style-4">
            <label for="field1"> 
                <span align="left">P&F Charges</span>: <input type="text" name="p_f" value="<?= $obn->p_f ?>" /> 
            </label>
            <label for="field1">
                <span align="left">Whether Form C will be given</span>: <input type="radio" name="form_c" class='yes' value="yes" <?php if ($obn->form_c == 'yes') echo 'checked'; ?>  /> Yes &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="form_c" class='no' value="no" <?php if ($obn->form_c == 'no') echo 'checked'; ?> /> NO 
            </label>
            <label for="field1">
                <span align="left">Customer CST/ST/TIN No.</span>:<input type="text" name="cust_cst" class='cst' value="<?= $obn->cust_cst ?>"  /> 
            </label>
            <label for="field1">
                <span align="left">Customer Exices</span>:<input type="text" name="cust_exnum"  class='exnum' value="<?= $obn->cust_exnum ?>"/> 
            </label>
            <label for="field1">
                <span align="left">3rd Party's CST/ST/TIN No.</span>:<input type="text" name="third_party_tin"  class='party_tin' value="<?= $obn->third_party_tin ?>"/> 
            </label>
            <label for="field1">
                <span align="left">To whom should Original Bill go</span>:<input type="text" name="original_bill" value="<?= $obn->original_bill ?>" /> 
            </label>
            <label for="field1">
                <span align="left">To whom should Bill Copies</span>:<input type="text" name="copies"  value="<?= $obn->copies ?>"/> 
            </label>
            <label for="field1">
                <span align="left">Note</span>:<input type="text" name="note" value="<?= $obn->note ?>" /> 
            </label>
            <label for="field1">
                <span align="left">Drawing No.</span>:<input type="text" name="drw_no" value="<?= $obn->drw_no ?>" /> 
            </label>
        </div>
    </div>
    </div>
        <div class="fixed-action-btn vertical" style="bottom: 45px; right: 24px;">
            <a class="btn-floating btn-large red"  href="<?php echo base_url();?>index.php/users">
                <i id="pluse_ic" class="glyphicon glyphicon-plus"></i>
                <i class="glyphicon glyphicon-home"></i>
            </a>
            <ul>
                <li><a class="btn-floating yellow darken-1" data-placement="bottom" title="View Supplier List" href="<?php echo base_url();?>index.php/users/obn"><i class="glyphicon glyphicon-search"></i></a></li>
                <li><button type="submit" name = "submit" class="btn-floating blue" id = 'submit' data-placement="bottom" title="Save"><span class="glyphicon glyphicon-save"></span></button></li>
                <li><a class="btn-floating grey"  data-placement="bottom" title="Go Back!"  href="javascript:window.history.go(-1);"><i class="glyphicon glyphicon-arrow-left"></i></a></li>    
            </ul>
        </div>
        </form>    
    </body>
        <script>
               
        </script>
        <script>
        $(document).ready(function () {
             $('.fixed-action-btn').hover(function(){
                $('#pluse_ic').toggle();
                });
        $('.plusbtn1').click(function() {
            var $row = $('<tr class="item-row"><td></td><td><textarea name="desc[]" class="equip_name" style="width:250px" rows="2" resize="none" placeholder="Description" required="required"></textarea></td><td><textarea name="qty[]" class="qty" style="width:100%" rows="2" placeholder="Quantity" ></textarea></td><td><textarea name="order_no[]" class="work_order" style="width:100%" rows="2" placeholder="Work Order" required="required"></textarea></td><td><textarea name="rate[]" class="rate" style="width:100%" rows="2" placeholder="Rate" required="required"></textarea></td><td><textarea name="price[]" class="price" style="width:100%" rows="2" placeholder="Price" required="required"></textarea></td><td><input type="text" name="delivery_date[]" class="datepicker ddate" style="width:100%" rows="2" placeholder="Delivery Date" required="required"></td></tr>').insertAfter(".item-row:last");
            bind($row);
        });
        function bind($row)
        {
            $row.find('.equip_name').keyup(equip_name);
            $row.find('.price').blur(update_price);
            $row.find('.rate').blur(update_price);
            $( ".datepicker" ).datepicker({ dateFormat: 'dd-mm-yy' });
        }
       
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
            $(document).ready(function () {
            $(".cname").autocomplete({
            source: function (request, response) {
                $.ajax({
                    url: "<?php echo base_url(); ?>index.php/users/cust_name",
                    data:{term: request.term},
                    dataType: "json",
                    type: "POST",
                    dataFilter: function (data) { return data; },
                    success: function (data) {
                    response($.map(data, function (item) { 
                    return {
                                label: item.name,
                                value: item.name,
                                   id: item.cust_supp_id,
                           }
                    }))
                    },
                    error: function (XMLHttpRequest, textStatus, errorThrown) {
                    alert(textStatus);
                    }
                    });
                    },
                    minLength: 1,
                    select: function (event , ui) {
                    var businessEntityId = ui.item.id;
                   
                     $.ajax({
                    type: "POST",
                    data:{'id': businessEntityId},
                    dataType:"json",
                    url: "<?php echo base_url(); ?>index.php/users/supplier_detail_de",//here we are calling our user controller
                    success: function(data) //we're calling the response json array 'data'
                    {
                        $(".cst").val(data.sertaxnum);
                        $(".exnum").val(data.exnum);
                    }
                });
                 $.ajax({
                        type: "POST",
                        data:{'id': businessEntityId},
                        dataType:"json",
                        url: "<?php echo base_url(); ?>index.php/users/address_detail",
                        success: function(data) 
                        {
                            for(i=0;i<=10;i++)
                                {
                                    $("#address_data").append('<option value=' + data[i].id+'>' + data[i].address+  '</option>');
                                }
                        }
                    });
                    }
                    
                });

        });
         $(document).ready(function(){   
        $("#address_data").change(function(){
         var id=$("#address_data option:selected").val();
         var addr=$("#address_data option:selected").text();
         $('.address').val(addr);
         $.ajax({
            type: "POST",
            data:{'id': id},
            dataType:"json",
            url: "<?php echo base_url(); ?>index.php/users/supplier_detail",//here we are calling our user controller
            success: function(data) //we're calling the response json array 'data'
            {
               
                $(".address1").val(data.address1);
                $(".address2").val(data.address2);
                $(".city").val(data.city);
                $(".state").val(data.state);
                $(".pin").val(data.pin);
            }
            });
       
        });
    });
            
            
            
            $(function() {
            $( ".datepicker" ).datepicker({ dateFormat: 'dd-mm-yy' });
            });
            $("#payment_term").autocomplete({
            source: function (request, response) {
                $.ajax({
                    url: "<?php echo base_url(); ?>index.php/users/payment_term",
                    data:{term: request.term},
                    dataType: "json",
                    type: "POST",
                    dataFilter: function (data) { return data; },
                    success: function (data) {
                    response($.map(data, function (item) { 
                    return {
                                label: item.payment_term,
                                value: item.payment_term,
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
                $("#transporter").autocomplete({
                source: function (request, response) {
                $.ajax({
                    url: "<?php echo base_url(); ?>index.php/users/transporter",
                    data:{term: request.term},
                    dataType: "json",
                    type: "POST",
                    dataFilter: function (data) { return data; },
                    success: function (data) {
                        response($.map(data, function (item) { 
                        return {
                                   label: item.transporter,
                                   value: item.transporter,
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
                 $(".tpi").autocomplete({
            source: function (request, response) {
                $.ajax({
                    url: "<?php echo base_url(); ?>index.php/users/tpi_name",
                    data:{term: request.term},
                    dataType: "json",
                    type: "POST",
                    dataFilter: function (data) { return data; },
                    success: function (data) {
                    response($.map(data, function (item) { 
                    return {
                                label: item.tpi_nickname,
                                value: item.tpi_nickname,
                                   id: item.id
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
            $('.tpi_div').hide();//TPI div hide 
        });
       
        $('.tpi_ckeck').click(function()
        {
            $('.tpi_div').show();
        });
        $('.tpi_dckeck').click(function()
        {
            $('.tpi_div').hide();
        });
         $('.order_yes').select(function()
        {
            $('.order_no_pages').show();
        });
        $('.order_no').click(function()
        {
            $('.order_no_pages').hide();
        });
        $('.enclose_yes').click(function()
        {
            $('.enclosed_no').show();
        });
        $('.enclose_no').click(function()
        {
            $('.enclosed_no').hide();
        });
        $('.price').keyup(function(){
        update_price();
        });
    // Total Price And Ruppee Conversion
    function update_price() 
    {
        
                        $('#tax_btn').show();
                        total_cal=0;
                        $('.item-row').each(function() {
                        rate = $(this).find('.rate').val();
                        quantity =$(this).find('.qty').val();
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
                        $(this).find('.price').val(sum);
                        total_cal=total_cal+sum_cal;
                          $('#total_tax').val(total_cal);
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
             $(document).ready(function(){
            not_no();
        });
        function not_no(){
        $(".rate, .qty").keypress(function (e) {
        //if the letter is not digit then display error and don't type anything
        if ((event.which != 46 || $(this).val().indexOf('.') != -1) && (event.which < 48 || event.which > 57)){
        //display error message
        $("#errmsg").html("Digits Only").show().fadeOut(3000);
            return false;
        }
        });
        }
        
          $("#submit").click(function(){
                            var work_order=$(".work_order").val();
                            var equip_name=$(".equip_name").val();
                            var qty=$(".qty").val();
                            var rate=$(".rate").val();
                            var price=$(".price").val();
                            var ddate=$(".ddate").val();
                          
                            if(work_order==''||equip_name==''||qty==''||rate==''||price==''||ddate==''){
                                 alert('Please Check Work Description');
                               document.getElementById('acc2').style.backgroundColor = '#e06262';
                            }else{
                                document.getElementById('acc2').style.backgroundColor = '#428bca';
                            }
                            
                            });  
     
</script>
</html>
