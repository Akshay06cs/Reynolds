<html>
    <head>
        <title>RCPL Prospects</title>
      
        <script type='text/javascript' src="<?php echo base_url("assets/js/jquery-1.4.4.min.js");?>"></script>
        <script type='text/javascript' src="<?php echo base_url(); ?>assets/js/jquery-1.11.3.min.js"></script>
          <!-- DataTables CSS -->
         <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/jquery.dataTables.css">
        <!--floating buttons-->
        <link rel='stylesheet' type='text/css' href="<?php echo base_url("assets/css/font-awesome.min.css");?>" />
        <script type='text/javascript' src="<?php echo base_url(); ?>assets/js/materialize.js"></script> 
        <link rel='stylesheet' type='text/css' href="<?php echo base_url("assets/css/materialize.css");?>" />
        <!--Currency formater javascript file -->
        <script type='text/javascript' src="<?php echo base_url(); ?>assets/js/format.20110630-1100.min.js"></script>
        <link rel='stylesheet' type='text/css' href="<?php echo base_url("assets/css/bootstrap.min.css");?>" />
        <script type='text/javascript' src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
        <!-- jQuery 2.1.4 -->
        <script type='text/javascript' src="<?php echo base_url(); ?>assets/js/jQuery-2.1.4.min.js"></script>   
       
        <link rel='stylesheet' type='text/css' href="<?php echo base_url("assets/css/material.css");?>" />
        <!-- Gatepass -->
        <link rel="stylesheet" href="<?php echo base_url("assets/css/gate_pass.css");?>">
        <!--autocomplete-->
        <script type='text/javascript' src="<?php echo base_url(); ?>assets/js/jquery-ui.js"></script> 
        <script type='text/javascript' src="<?php echo base_url(); ?>assets/js/jquery-ui.min.js"></script> 
         <script type='text/javascript' src="<?php echo base_url(); ?>assets/js/jquery-ui.min.js"></script> 
          <script type='text/javascript' src="<?php echo base_url(); ?>assets/js/jquery-ui.min.js"></script> 
         <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.dataTables.min.js"></script>
        <!--date-picker-->
        <link rel='stylesheet' type='text/css' href="<?php echo base_url("assets/css/jquery-ui.css");?>" />
        <!--css-->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/css/prospects.css");?>"/>
        <script>
          $(function() {
            $( "#datepicker" ).datepicker({ dateFormat: 'dd-mm-yy' });
            $( "#datepicker1" ).datepicker({ dateFormat: 'dd-mm-yy' });
            $( "#datepicker2" ).datepicker({ dateFormat: 'dd-mm-yy' });
        });
        </script>
        <style>
            #description,#quantity,#price,#total
            {
                resize:none;
            }
            .ui-autocomplete 
            {
                position: absolute;
                top: 0;
                left: 0;
                z-index: 1510 !important;
                float: left;
                display: none;
                min-width: 160px;
                padding: 4px 0;
                margin: 2px 0 0 0;
                list-style: none;
                background-color: #ffffff;
                border-color: #ccc;
                border-color: rgba(0, 0, 0, 0.2);
                border-style: solid;
                border-width: 1px;
                -webkit-border-radius: 2px;
                -moz-border-radius: 2px;
                border-radius: 2px;
                -webkit-box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
                -moz-box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
                box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
                -webkit-background-clip: padding-box;
                -moz-background-clip: padding;
                background-clip: padding-box;
                *border-right-width: 2px;
                *border-bottom-width: 2px;
            }
            
            .quantity,.price,.total
            {
                resize:none;
            }
            .customer,.person
            {
                text-align: left;
            }
            
        </style>
        <script>
            $(document).ready(function () {
            $("#customer").autocomplete({
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
                        url: "<?php echo base_url(); ?>index.php/users/supp_credentials",
                        success: function(data) 
                        {   
                            $('.cust_supp_id').val(businessEntityId);
                            for(i=0;i<=10;i++)
                                {
                                    //$("#person").append('<option value=' + data[i].fname+" "+data[i].lastname + '>' + data[i].fname+" "+data[i].lastname+ '</option>');
                                    $("#person").append('<option>' + data[i].fname+" "+data[i].lastname+ '</option>');
                                }
                        }
                    });
                     $.ajax({
                        type: "POST",
                        data:{'id': businessEntityId},
                        dataType:"json",
                        url: "<?php echo base_url(); ?>index.php/users/cust_cred",
                        success: function(data) 
                        {   
                           $("#addr1").val(data.address1);
                            $("#addr2").val(data.address2);
                             $("#city").val(data.city);
                              $("#state").val(data.state);
                              $("#pin").val(data.pin);
                        }
                    });
                    }
                });

            $(function() {
            $( ".datepicker" ).datepicker({ dateFormat: 'dd-mm-yy' });
            });
        });
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
        </script>
    </head>
<body>
        <h1>Prospects</h1>
        <div class="container">
            <table class="table table-bordered table-hover table-striped" id="datatable">
                    <thead>
                        <tr>
                            <th>Si. No.</th>
                            <th>Customer</th>
                            <th>Quotation Date</th>
                            <th>Quotation No</th>
                            <th>Quotation Ver</th>
                            <th class="tbl_val">Value in (<i class="fa fa-inr"></i>)</th>
                            <th>Contact Person</th>
                            <th>Mob. No</th>
                            <th>Status</th>
                            <th>Update</th>
                            <th>Pdf</th>
                            <th>Delete</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $sino='1';
                            foreach($quotation as $key){
                        ?>
                        <tr class="item-row">
                            <td><?php echo $sino ?></td>
                            <td class="customer"><a href="<?= base_url('index.php/users/quotation_detail/'.$key->qid); ?>" title="View Quatation Detail" ><?php echo $key->customer_name ?></a></td>
                            <td style="width:13%"><?php echo date('d-m-Y', strtotime(str_replace('-','/', $key->qt_date))); ?></td>
                            <td><?php echo $key->qt_no ?></td>
                            <td><?php echo $key->version  ?></td>
                            <td><?php echo $key->total_value; ?></td>
                            <td><?php echo $key->contct_person ?></td>
                            <td><?php echo $key->cnt_num ?></td>
                            <td><?php echo $key->status ?></td>
                            <td><a href="<?= base_url('index.php/users/edit_qtn/'.$key->qid); ?>" class="glyphicon glyphicon glyphicon-edit" title="Edit Record"></a></td>
                            <td><a href="<?= base_url('index.php/users/prospects_condtion/'.$key->qid); ?>" class="glyphicon glyphicon glyphicon-ok" title="Pdf"></a></td>
                            <td><a href="<?= base_url('index.php/users/delete_qtn/'.$key->qid); ?>" class="glyphicon glyphicon glyphicon-trash" title="Delete Record"></a></td>
                        </tr>
                        <?php 
                        $sino++;
                        }
                        ?>
                    </tbody>
                </table>
                <div class="fixed-action-btn vertical" style="bottom: 45px; right: 24px;">
                    <a class="btn-floating btn-large red"  href="<?php echo base_url();?>index.php/users">
                        <i id="pluse_ic" class="glyphicon glyphicon-plus"></i>
                        <i class="glyphicon glyphicon-home"></i>
                    </a>
                    <ul>
                        <li><a data-toggle="modal" data-target="#myModal" class="btn-floating green"  title="Create New Prospects!"><i class="glyphicon glyphicon-file"></i></a></li>
                        <li><a class="btn-floating grey"  data-placement="bottom" title="Go Back!"  href="javascript:window.history.go(-1);"><i class="glyphicon glyphicon-arrow-left"></i></a></li>    
                    </ul>
                </div>
        </div>
        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <form class="form-style-4" name="myProspects" action="<?php echo base_url(); ?>index.php/users/newProspects" method ="post">
                        <div class="modal-body">
                            <label for="field1"><input type="hidden" name="cust_supp_id" class="cust_supp_id">
                                <input type="text" name="customer" id="customer"  title="Customer Name" required="required" placeholder="Customer Name"  ><input type="hidden" name="addr1" id="addr1"><input type="hidden" name="addr2" id="addr2"><input type="hidden" name="city" id="city"><input type="hidden" name="state" id="state"><input type="hidden" name="pin" id="pin">
                            </label>
                            <label for="field1">
                               <input type="text" name="date" id="date" title="Date" required class="datepicker" placeholder="Date">
                            </label>
                            <label for="field1">
                               <input type="text" name="number" id="number" title="Order Number" placeholder="Order Number" required>
                            </label>
                            <label for="field1">
                               <input type="text" name="version" id="version" title="Version"  placeholder="Version" required>
                            </label>
                            <label for="field1">
                               <input type="text" name="sub" id="sub" title="Sub"  placeholder="Sub" >
                            </label>
                             <label for="field1">
                               <input type="text" name="ref" id="ref" title="Ref."  placeholder="Ref" >
                            </label>
                        <div class="table-responsive">
			<table  class="table test "> 
			<tr class="prospect" style=" background-color:#eeeeee;">
                            <th align="center" >Description</th>
                            <th align="center" style="width:10%">Quantity</th>
                            <th align="center" style="width:10%">Price</th>
                            <th align="center" style="width:10%">Total</th>
			</tr>
			<tr class="prospect_data">
                            <td>   
                                <textarea name="description[]" id="description" title="Description Of Material" style="width:100%" rows="2" resize="none"  class="equip_name"  placeholder="Material Description" required></textarea>	
                            </td>
                            <td style="width:10%">
                                <textarea name="quantity[]" class="quantity" title="Quantity" placeholder="Quantity" style="width:100%" rows="2" required ></textarea>
                            </td>
                            <td style="width:20%">
                                <textarea name="price[]" class="price" title="Price" placeholder="Price" style="width:100%" title="Price" rows="2" required></textarea>
                            </td>
                            <td style="width:20%">
                                <textarea name="total[]" class="total" style="width:100%" rows="2" placeholder="Total" title="Total" readonly></textarea>
                            </td>
			</tr>
			</table>
                            
                            <span id="errmsg" style="color:red"></span>
			<div>
                            <a href="javascript:;" title="Add a row" ><span class="glyphicon glyphicon-plus plusbtn1"></span></a>
                            <a href="javascript:;" title="Remove the row"><span class="glyphicon glyphicon-minus minusbtn1"></span></a>
                        </div>
			</div>
                        <label for="field1">    
                            <input type="text" name="value" id="value" placeholder="Value" readonly title="Total Sum">
                        </label>
                        <label for="field1">    
                        <select class="person" id='person' name="person">
                            <option>Select Contact Person</option>
                        </select>
                        </label> 
                        <label for="field1">    
                            <input type="text" name="mobile" id="mobile" title="Mobile Phone Number" placeholder="Mobile Phone Number" readonly><input type="hidden" id="dept" name="dept">
                        </label>    
                             <label for="field1">    
                            <textarea name="condition" style="display:none;">1)Packing and forwarding charges: If packed 4% extra and Nil for unpacked.
2)Central Excise duty: Extra as applicable at the time of dispatch, Currently 12.5%.
3)Sales tax: Extra as applicable, Currently 2% CST against C Form or 14.5% without concession form.
4)Delivery: 8-10 Weeks from drawing approval.
5)Payment: 40% advance along with LOI/PO, balance against Proforma invoice prior to dispatch.
6)Inspection: By Reynolds internal QC only.
7)Freight, Transit insurance & Octroi if any: To be borne and arranged by you at actual.
8)Validity: 21 days from today subject to our confirmation later.</textarea>   
                                    </label>    
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success" id="change"> Save</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    </div>
                </form>
                     
            </div>
        </div>
    </div> 
</body>
<script type ="text/javascript"> 
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
                $("#dept").val(res.dept);
            } 
            });
        });
    });
    $(document).ready(function(){
        $('.plusbtn1').click(function() {
        var $row = $('<tr class="prospect_data"><td><textarea name="description[]" id="description" class="equip_name" style="width:100%" rows="2" resize="none" title="Description Of Material" placeholder="Material Description" required="required"></textarea></td><td style="width:10%"><textarea name="quantity[]" class="quantity" style="width:100%" rows="2" title="Quantity" placeholder="Quantity" required="required"></textarea></td><td style="width:10%"><textarea name="price[]" class="price" style="width:100%" rows="2" title="Price" placeholder="Price" required="required"></textarea></td><td style="width:10%"><textarea name="total[]" class="total" style="width:100%" rows="2" placeholder="Total" title="Total" readonly required="required"></textarea></td></tr>').insertAfter(".prospect_data:last");
        bind($row);
        });
        function bind($row)
        {
            $row.find('.equip_name').keyup(equip_name);
            $row.find('.total').focus(update_price);
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
</script>
<script>
   
   
    $('.total').focus(function(){
        update_price();
    });
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
        </script>
        <script>
    $(document).ready( function () {
        $('#datatable').dataTable({
        aaSorting: [[0, 'desc']]
        });
    });
    $('.fixed-action-btn').hover(function(){
        $('#pluse_ic').toggle();
    });
    $('#version ').keyup(function(){
                    emp_f_name = $('#version').val();
                    $('#version').val(emp_f_name.substring(0, 1).toUpperCase() + emp_f_name.substring(1).toLowerCase())
                    });
</script>
</html>


