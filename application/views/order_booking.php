<html>
<head>
     <title>Order Booking Note</title>
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
            $(function() 
            {
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
            <form  action="<?= base_url('index.php/users/newOrderbooking') ?>" method ="post" >
            <div id="accordion" class="form-group required">
            <h1 style="background:#428bca;color:white" id="acc1">Order Booking Detail</h1>
            <div>
                <div class="form-style-4">
                    <label for="field1">
                        <span align="left" class='control-label'>Order Booking No.</span>: <input type="text"  name="obn_no" required="required"  class="obn_no" /> 
                        </label>
                        <label for="field1">
                            <span align="left" class='control-label'>Customer Name</span>: <input type="text" name="customer_name" required="required" class='cname' placeholder="Enter Customer Name"/>
                        </label>
                        <label for="field1">    
                             <span align="left" class='control-label'><span align="left">Customer Address</span>:</span>:
                        <select class="person" id='address_data' name="person">
                            <option value="0">Select Customer Address</option>
                        </select>
                        </label> 
                        <label for="field1"> <input type="hidden" name='address' class="address" >
                            <span align="left">&nbsp;</span>: <input type="text" name="customer_address1"  class='address1' readonly/>
                        </label>
                        <label for="field1">
                            <span align="left">&nbsp;</span>: <input type="text" name="customer_address2"class='address2' readonly/>
                        </label>
                        <label for="field1">
                            <span align="left">&nbsp;</span>: <input type="text" name="city" class='city' readonly/>
                        </label>
                        <label for="field1">
                            <span align="left">&nbsp;</span>: <input type="text" name="state"  class='state' readonly/>
                        </label>
                        <label for="field1">
                            <span align="left">&nbsp;</span>: <input type="text" name="pin"  class='pin' readonly/>
                        </label>
                        <label for="field1">
                            <span align="left" class='control-label'>Purchase Order No.</span>: <input type="text" name="po_no" class="po_no" required="required"  placeholder="Enter Purchase Order No."/>  
                        </label>
                        <label for="field1">
                            <span align="left" class='control-label'>PO Dated</span>: <input type="text" name="po_dated" class="datepicker po_dated" required="required" placeholder="Purchase Order Date"/> 
                        </label>
                        <label for="field1">
                            <span align="left" class='control-label'>OBN Date</span>: <input type="text" name="obn_date" class="datepicker obn_date" required="required" placeholder="OBN Date"/> 
                        </label>
                        <label for="field1">
                            <span align="left">Order Copy Attached </span>: <input type="radio" name="order_copy" class='order_yes' value="yes" checked /> Yes &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="order_copy" class='order_no' value="no"/> NO
                        </label>
                        <div class="order_no_pages">
                        <label for="field1">
                            <span align="left">No. of Pages</span>: <input type="text" name="no_pages" class="pages"  placeholder="If Yes, Enter No. of Pages"/> 
                        </label>
                        </div>
    </div>
        </div>
    <h3 style="background:#428bca;color:white" id='acc2'>Work Description</h3>
    <div>
   <div class="form-style-4">
        <table class="table table-condensed table-borderd test">
                <tr  class="obn" style="background-color:#eeeeee;">
                    <th>Si.No.</th>
                    <th class='control-label'>Description</th>
                    <th class='control-label'>Quantity</th>
                    <th class='control-label'>W.O. No.</th>
                    <th class='control-label'>Rate</th>
                    <th class='control-label'>Price</th>
                    <th>Delivery Date</th>
                </tr>
                <tr class="item-row">
                    <td></td>
                    <td><textarea style="width:250px;" class="equip_name" name="desc[]" rows="2" resize="none" placeholder="Description" required="required" ></textarea></td>
                    <td><textarea style="width:100%" name="qty[]" placeholder="Quantity" class="qty" required="required"></textarea></td>
                    <td><textarea style="width:100%" name="order_no[]" placeholder="Work Order" class='work_order' required="required"></textarea></td>
                    <td><textarea style="width:100%" name="rate[]" placeholder="Rate" class="rate" required="required"></textarea></td>
                    <td><textarea style="width:100%" name="price[]" placeholder="Price" class="price" required="required"></textarea></td>
                    <td><input type="text" style="width:100%" name="delivery_date[]" placeholder="Delivery Date" class="datepicker ddate"></td>
                </tr>
                <tr><td colspan="5" align="right"><b align="right">Total</b></td><td><textarea style="width:100%" name="total" id="value"></textarea></td></tr>
            </table>    
        <a href="#" class="plusbtn1 glyphicon glyphicon-plus" title="Add New Row"></a>
                <a href="#" class="minusbtn1 glyphicon glyphicon-minus" title="Remove Last Row"></a>
               </div>  
    </div>
   <h3 style="background:#428bca;color:white" id='acc3'>Terms</h3>
    <div>
        <div class="form-style-4">
            <label for="field1">
                <span align="left">Inspection by Nature</span>: <input type="radio" name="inspe_nature" class='tpi_dckeck' value="internal" checked /> Internal &nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="inspe_nature" class='tpi_ckeck' value="tpi"  /> TPI 
            </label>
            <div class="tpi_div">
                <label for="field1">
                    <span align="left">TPI</span>: <input type="text" class="tpi" id="tpi" name="tpi" />
                </label>
            </div>
            <label for="field1">
                <span align="left" class='control-label'>Payment Terms</span>: <input type="text" name="pay_term"  class='payment_term' id='payment_term' required="required" placeholder="Select Payment Term"/> 
            </label>
            <label for="field1">
                <span align="left">Advance Received</span>: <input type="text" name="advance_receive"  placeholder="Enter Amount Recieved" /> 
            </label>
        </div>
    </div>
    <h3 style="background:#428bca;color:white">Dispatch Instruction</h3>
    <div>
        <div class="form-style-4">
            <label for="field1">
                <span align="left">Destination</span>: <input type="text" name="destination"   placeholder="Enter Destination"/> 
            </label>
            <label for="field1">
                <span align="left">Transporter</span>: <input type="text" name="transporter" id='transporter'  placeholder="Enter Transporter"/> 
            </label>
            <label for="field1">
                <span align="left">Consigner</span>: <input type="radio" name="consigner" class='party' checked value='party' /> Party &nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="consigner" class='self' value='self' /> Self &nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="consigner" class='third_party' value='third_party'/> Third Party
            </label>
            <div class="third_party_div">
                <label for="field1">
                    <span align="left">Address of Third Party</span>: <input type="text" name="addr_third_party"  placeholder="Enter Third Part Address" /> 
                </label>
            </div>
            <label for="field1">
                <span align="left">Any Road permit required</span>: <input type="radio" name="road_perm" class='yes' value="yes" checked /> Yes &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="road_perm" class='no' value="no"/> NO
            </label>
            <label for="field1">
                <span align="left">Whether enclosed</span>: <input type="radio" name="enclosed" class='enclose_yes' value="yes" checked /> Yes &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="enclosed" class='enclose_no' value="no"/> NO
            </label>
            <div class="enclosed_no">
                <label for="field1">
                    <span align="left">Give No.</span>: <input type="text" name="give_no"  placeholder="if Yes,Enter Encolsed No."/> 
                </label>
            </div>
            <label for="field1">
                <span align="left">Basis</span>: <input type="radio" name="basis" class='door' value ="door" checked /> Door &nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="basis" class='godown' value ="godown" /> Godown
            </label>
            <label for="field1">
                <span align="left">Freight</span>: <input type="radio" name="freight" class='paid' value ="paid" checked /> Paid &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="freight" class='to_pay' value ="to pay" /> To Pay
            </label>
        </div>
    </div>
    <h3 style="background:#428bca;color:white">Billing Instruction</h3>
    <div>
        <div class="form-style-4">
            <label for="field1">
                <span align="left">P&F Charges</span>: <input type="text" name="p_f" placeholder="Enter P&F Charge"/> 
            </label>
            <label for="field1">
                <span align="left">Whether Form C will be given</span>: <input type="radio" name="form_c" class='yes' checked /> Yes &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="form_c" class='no'  /> NO 
            </label>
            <label for="field1">
                <span align="left">Customer CST/ST/TIN No.</span>:<input type="text" name="cust_cst" class='cst'   /> 
            </label>
            <label for="field1">
                <span align="left">Customer Exices</span>:<input type="text" name="cust_exnum"  class='exnum'/> 
            </label>
            <label for="field1">
                <span align="left">3rd Party's CST/ST/TIN No.</span>:<input type="text" name="third_party_tin"  class='party_tin' /> 
            </label>
            <label for="field1">
                <span align="left">To whom should Original Bill go</span>:<input type="text" name="original_bill" /> 
            </label>
            <label for="field1">
                <span align="left">To whom should Bill Copies</span>:<input type="text" name="copies"  /> 
            </label>
            <label for="field1">
                <span align="left">Note</span>:<input type="text" name="note"placeholder="Enter Note"/> 
            </label>
            <label for="field1">
                <span align="left">Drawing No.</span>:<input type="text" name="drw_no"  placeholder="Enter Drawing No."/> 
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
                <li><a class="btn-floating orange darken-1" data-placement="bottom" title="View Order Booking List" href="<?php echo base_url();?>index.php/users/obn"><i class="glyphicon glyphicon-eye-open"></i></a></li>
                <li><button type="submit" name = "submit" class="btn-floating blue" data-placement="bottom" id = 'submit' title="Save"><span class="glyphicon glyphicon-floppy-save"></span></button></li>
                <li><a class="btn-floating grey"  data-placement="bottom" title="Go Back!"  href="javascript:window.history.go(-1);"><i class="glyphicon glyphicon-arrow-left"></i></a></li>    
            </ul>
        </div>
        </form>    
    </body>
        <script>
               
        </script>
        <script>
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
        $(document).ready(function () {
             $('.fixed-action-btn').hover(function(){
                $('#pluse_ic').toggle();
                });
        $('.plusbtn1').click(function() {
            var $row = $('<tr class="item-row"><td></td><td><textarea name="desc[]" class="equip_name" style="width:250px" rows="2" resize="none" placeholder="Description" required="required"></textarea></td><td><textarea name="qty[]" class="qty" style="width:100%" rows="2" placeholder="Quantity" required="required"></textarea></td><td><textarea name="order_no[]" class="work_order" style="width:100%" rows="2" placeholder="Work Order" required="required"></textarea></td><td><textarea name="rate[]" class="rate" style="width:100%" rows="2" placeholder="Rate" required="required"></textarea></td><td><textarea name="price[]" class="price" style="width:100%" rows="2" placeholder="Price" required="required"></textarea></td><td><input type="text" name="delivery_date[]" class="datepicker ddate" style="width:100%" rows="2" placeholder="Delivery Date"></td></tr>').insertAfter(".item-row:last");
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
                                label: item.tpi_tradename,
                                value: item.tpi_tradename,
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
         $('.order_yes').click(function()
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
    

</script>
<script>
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
    //Only digits Validation
     $(document).ready(function(){
            not_no();
        });
        function not_no(){
        $(".quantity, .price").keypress(function (e) {
        //if the letter is not digit then display error and don't type anything
        if ((event.which != 46 || $(this).val().indexOf('.') != -1) && (event.which < 48 || event.which > 57)){
        //display error message
        $("#errmsg").html("Digits Only").show().fadeOut(3000);
            return false;
        }
        });
        }
         
                    $("#submit").click(function(){
                            var obn_no=$(".obn_no").val();
                            var cname=$(".cname").val();
                            var address=$(".address").val();
                            var po_dated=$(".po_dated").val();
                            var obn_date=$(".obn_date").val();
                            var work_order=$(".work_order").val();
                            var equip_name=$(".equip_name").val();
                            var qty=$(".qty").val();
                            var rate=$(".rate").val();
                            var price=$(".price").val();
                            var ddate=$(".ddate").val();
                            var payment_term=$(".payment_term").val();
                            if(obn_no==''||cname==''||address=='' ||po_dated=='' ||obn_date=='')
                            {
                                alert('Please Check Order Booking Detail');
                               document.getElementById('acc1').style.backgroundColor = '#e06262';
                              
                               
                            } else{
                                document.getElementById('acc1').style.backgroundColor = '#428bca';
                            }
                            if(work_order==''||equip_name==''||qty==''||rate==''||price==''||ddate==''){
                                 alert('Please Check Work Description');
                               document.getElementById('acc2').style.backgroundColor = '#e06262';
                            }else{
                                document.getElementById('acc2').style.backgroundColor = '#428bca';
                            }
                             if(payment_term==''){
                                 alert('Please Check Terms');
                               document.getElementById('acc3').style.backgroundColor = '#e06262';
                            }else{
                                document.getElementById('acc3').style.backgroundColor = '#428bca';
                            }
                            });  
</script>
</html>
