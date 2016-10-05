<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
    <title>Purchase Order</title>
    <!-- <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">  -->
    <link rel='stylesheet' type='text/css' href="<?php echo base_url("assets/css/style1.css");?>" />
    <link rel='stylesheet' type='text/css' href="<?php echo base_url("assets/css/print.css");?>" />
    <link rel='stylesheet' type='text/css' href="<?php echo base_url("assets/css/bootstrap.min.css");?>" />
    <script type='text/javascript' src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
    <script type='text/javascript' src="<?php echo base_url("assets/js/jquery-1.4.4.min.js");?>"></script>
    <script type='text/javascript' src="<?php echo base_url(); ?>assets/js/jquery-1.11.3.min.js"></script>
    <link rel='stylesheet' type='text/css' href="<?php echo base_url("assets/css/popup_style.css");?>" />
    <!-- Floating Button -->
    <link rel='stylesheet' type='text/css' href="<?php echo base_url("assets/css/font-awesome.min.css");?>" />
    <script type='text/javascript' src="<?php echo base_url(); ?>assets/js/materialize.js"></script> 
    <link rel='stylesheet' type='text/css' href="<?php echo base_url("assets/css/materialize.css");?>" />
    <!-- Date Picker Plugins -->
    <script type='text/javascript' src="<?php echo base_url(); ?>assets/js/jquery-ui.js"></script>
    <link rel='stylesheet' type='text/css' href="<?php echo base_url("assets/css/jquery-ui.css");?>" />
    <!-- tax popup form -->
    <link rel='stylesheet' type='text/css' href="<?php echo base_url("assets/css/po_pop_form.css");?>" />
    <script type='text/javascript' src="<?php echo base_url(); ?>assets/js/format.20110630-1100.min.js"></script>
    <!--Currency formater javascript file -->
    <script type='text/javascript' src="<?php echo base_url(); ?>assets/js/format.20110630-1100.min.js"></script>
    
    <!-- Material Design libraries-->
    <script>
        $(function() {
            $( "#datepicker" ).datepicker({ dateFormat: 'dd-mm-yy' });
            $( "#datepicker1" ).datepicker({ dateFormat: 'dd-mm-yy' });
            $( "#datepicker2" ).datepicker({ dateFormat: 'dd-mm-yy' });
        });
         $(document).ready(function () {
            $("#supplier").autocomplete({
            source: function (request, response) {
                $.ajax({
                    url: "<?php echo base_url(); ?>index.php/users/supplier_names",
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
                        $("#ph").val(data.ph);
                        $("#email").val(data.email);
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

            $(function() {
            $( ".datepicker" ).datepicker({ dateFormat: 'dd-mm-yy' });
            });
        });
         $(document).ready(function () {
             $('#packing_forwarding_input').hide();
              $('#inspection_input').hide();
               $('#other_input').hide();
                $('#excise_input').hide();
                 $('#cst_input').hide();
                 $('#vat_input').hide();
                  $('#tax_btn').hide();
                   $('#pf').hide();
                    $('#pf_lable').hide();
                     $('#ite').hide();
                      $('#ite_lable').hide();
                       $('#ot').hide();
                        $('#ot_lable').hide();
                         $('#ed').hide();
                          $('#ed_lable').hide();
                           $('#cs').hide();
                            $('#cs_lable').hide();
                             $('#vt').hide();
                              $('#vt_lable').hide();
                               $('#pf_per').hide();
                                $('#ite_per').hide(); 
                                $('#ot_per').hide();
                                 $('#ed_per').hide();
                                  $('#cs_per').hide();
                                   $('#vt_per').hide();
                                    $(this).find('.width').hide();
                                    $(this).find('.length').hide();
                                    $(this).find('.length_meter').hide();
                                    $('#tax_icon').hide();
             autocomplete();
             work_order(); 
             var x = parseInt(document.getElementById("order_no").value);
             var number= x+1;
             var new_order = number >= 10 ? number : "0"+number.toString()
             var po_num = 'PO/2016-17/REY/'+new_order
             $('.new_order').val(new_order);
             $('.order_num').val(po_num);
             });
            function autocomplete() {
            $(".parts").autocomplete({
                source: function (request, response) {
                $.ajax({
                    url: "<?php echo base_url(); ?>index.php/users/parts_name",
                    data:{term: request.term},
                    dataType: "json",
                    type: "POST",
                    dataFilter: function (data) { return data; },
                    success: function (data) {
                        response($.map(data, function (item) {
                        return {
                                    label: item.des,
                                    value: item.des,
                                    id: item.pid
                                }
                            }))
                        },
                    error: function (XMLHttpRequest, textStatus, errorThrown) {
                    alert(textStatus);
                    }
                    });
                    },
                    minLength: 2,
                    select: function (event , ui) {
                    var businessEntityId = ui.item.id;
                    $.ajax({
                        type: "POST",
                        data:{'id': businessEntityId},
                        dataType:"json",
                        url: "<?php echo base_url(); ?>index.php/users/part_detail_db",//here we are calling our user controller 
                        success: function(data) //we're calling the response json array 'data'
                        {
                            $("#uom").val(data.uom);
                            $("#density").val(data.density);
                            $("#thick").val(data.thickness);
                            $("#category").val(data.category);
                            $("#moc").val(data.moc);
                            $("#grade").val(data.grade);
                            $("#pid").val(data.pid);
                        }
                    });
                }
            });
        }
        function work_order(){
           var items = [ 'SS5029', 'SS5030' ];
        
            function split( val ) {
            return val.split( /,\s*/ );
        }
    function extractLast( term ) {
      return split( term ).pop();
    }
 
    $( ".work_order" ).autocomplete({
        minLength: 0,
        source: function( request, response ) {
          response( $.ui.autocomplete.filter(
            items, extractLast( request.term ) ) );
        },
        focus: function() {
          return false;
        },
        select: function( event, ui ) {
          var terms = split( this.value );
          // remove the current input
          terms.pop();
          // add the selected item
          terms.push( ui.item.value );
          // add placeholder to get the comma-and-space at the end
          terms.push( "" );
          this.value = terms.join( " " );
          return false;
        }
      });
        }
        $(document).ready(function () {
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
            });
        $(document).ready(function () {
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
               
                $("#address1").val(data.address1);
                $("#address2").val(data.address2);
                $("#city").val(data.city);
                $("#state").val(data.state);
                $("#pin").val(data.pin);
                $("#pin_vis").html('PIN');
            }
            });
       
        });
    });
        </script>
        <style>
            input{ border: 0;}
        </style>
    </head>
    <body>
        <div class="container">
             <div align='right'>QSR 064/1</div>
            <div style="width: 100%;">
                <img  src="<?php echo base_url();?>assets/images/header3.jpg" alt="logo" width='100%' height='125' />
            </div>
            <input type="hidden" id="order_no" name="order_no" value="<?= $order_num->order_no ?>">
                <hr>
                    <form action="<?= base_url('index.php/users/save_po') ?>" method ="post">
                         <input type="hidden" class="new_order" name="order_no"/>
                    <div style="width: 100%;">
                        <div style="float:left; width:40%">
                            <table>
                            <input type="text" name='supplier_name' title="Start Typing Supplier Name" id='supplier' tabindex="1" placeholder='Supplier' Required="required" class ="btn-default form-control" style="font-weight: bold;border:0; background:#F5F5DC "/><br>
                            
                            <select id="address_data"   class ="btn-default form-control" style="font-weight: bold;border:0; background:#F5F5DC; width:50% " placeholder='Select Supplier Address' >
                                <option>Select Supplier Address</option>
                            </select>
                            <input type="hidden" name='address' class="address" >
                            <input type="text" name='address1' id="address1"  size="45" readonly><br>
                            <input type="text" name='address2' id="address2"   size="45" readonly><br>
                            <input type="text" name='city'id="city"   size="45" readonly><br>
                            <lable type="text" id="pin_vis"></lable>&nbsp;<input name='pin' id='pin'  size="45" readonly><br>
                            <input type="text" name='state' id="state"   size="45" readonly ><br>        
                            <input type="text" name='phone' id='ph'  size="45" readonly><br>
                            <input type="text" name='email' id='email'  size="45" readonly>
                                
                            </table>
                        </div>
                        <div style="float:right;width: 40%">
                            <table class='payment'>
                                <tr><th>Order No.</th><td><input type="text"  class="order_num"  readonly /></td></tr>
                                <tr><th>Date</th><td><input name='date' title="Select Date" type="text" id="datepicker" Required="required" tabindex="2" placeholder="dd-mm-yy" style="background:#F5F5DC"/></td></tr>
                                <tr><th>Your Qtn. Ref.</th><td><input type="text"  tabindex="3" name="qtn_ref" style="background:#F5F5DC"/></td></tr>
                                <tr><th>Qtn. Date</th><td><input type="text" tabindex="4" name='qtn_date' id="datepicker1" Required="required" placeholder="dd-mm-yy" style="background:#F5F5DC"/></td></tr>
                                <tr><th>Delivery Date</th><td><input type="text" tabindex="5" name='delivery_date' id="datepicker2" Required="required" placeholder="dd-mm-yy" style="background:#F5F5DC"/></td></tr>
                                <tr><th>P&F</th><td><input type="text"  name="pf" tabindex="6" style="background:#F5F5DC"/></td></tr>
                                <tr><th>Taxes</th><td><input type="text" tabindex="7" name="taxes" style="background:#F5F5DC"/></td></tr>
                            </table>
                        </div>
                    </div>
                    <div style="clear:both"></div>
                    <hr>  
                    <p>Dear Sir's,</p>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; We are Pleased to place an order for the following material on terms & condition given
                    above to be delivered at our plant unless otherwise stated.        
                    <hr>
                         
                <div class="table-responsive">
                    <table id="items">
                    <tr>
                        <th>Si.No.</th>
                        <th>Description</th>
                        <th>Quantity</th>
                        <th>Unit</th>
                        <th>W.O.</th>
                        <th>Rate</th>
                        <th>Price</th>
                    </tr>
                    <tr class="item-row">
                        <td>
                        .
                        </td>
                        <td><input type="hidden" name="pid[]" id="pid"/><input type="hidden" id="category" name="category[]" class="category" /><input type="hidden" id="moc" class="moc" name="moc[]"/><input type="hidden" id="grade" class="grade" name="grade[]"/><input type="hidden" name='thickness[]' id ="thick" class="thick" /><input type="hidden" name='density[]' id= "density" class="density" /><textarea name='description[]' tabindex="8" class="parts" placeholder="Category Moc Grade Thickness" cols="40" style="background:#F5F5DC" title="Start Typing Part Category"></textarea><br><input type="text"  name='length[]' tabindex="9" class="length" placeholder="Length" size="5" style="background:#F0F8FF;"/><label class="length_mm" style="font-weight: normal;"></label><input type="hidden" class="length_uom" name="length_uom[]"/>&nbsp;<input type="text" name="width[]" tabindex="10" class="width" placeholder="Width" size="5" style="background:#F0F8FF"/><label class="width_mm" style="font-weight: normal;" ></label><input type="hidden" class="width_uom" name="width_uom[]"/><input type="text" name="length_meter[]" tabindex="11" class="length_meter" size="5" placeholder="Length" style="background:#F0F8FF"/><label class="mtr_length" ></label><input type="hidden" name="length_mtr_uom[]" class="length_mtr_uom"></td>
                        <td><textarea name='quantity[]' class="quantity_no" tabindex="12" cols="1" style="background:#F5F5DC" onFocus="this.setSelectionRange(0, this.value.length)" >1</textarea>
                            <textarea name='weight[]'  class="quantity" cols="10"  tabindex="13" style="text-align:center" placeholder="Quantity" ></textarea></td>
                        <td><textarea name='unit[]' cols="6" id="uom" class="uom"></textarea></td>
                        <td><textarea name='work_order[]' class="work_order" tabindex="14" style="background:#F5F5DC text-align:center;background:#F5F5DC" title="Work Order No."></textarea></td>
                        <td><textarea name='rate[]' class="rate" placeholder="Rate/Unit"tabindex="15" style="background:#F5F5DC" onFocus="this.setSelectionRange(0, this.value.length)">0.00</textarea></td>
                        <td><textarea name='price[]'class="price"></textarea></td>
                    </tr>
                    <tr>
                        <td colspan="7"><a id="addrow" href="javascript:;" title="Add a row"><i class="glyphicon glyphicon-plus"></a></td>
                    </tr>
                    <tr>
                        <td colspan='4' class="blank"><textarea  name="narration" cols='80' rows='4'Placeholder="Special Note" tabindex="16"></textarea></td>
                        <td colspan="2" class="total-line">Total</td>
                        <td ><textarea id="total" name="total" placeholder='00.00'  readonly ></textarea></td>
                    </tr>
                    <tr>
                        <td colspan="4" class="blank"> </td>
                        <td colspan="2" class="total-line"><input type="text" id="pf_lable" readonly><input type="text" id="pf_per" size="6" name="pf_per" readonly><br><input type="text" id="ite_lable" readonly ><input type="text" id="ite_per" name= "ite_per" size="6" name="ite_per" readonly><br><input type="text" id="ot_lable" readonly><input type="text" id="ot_per" size="6" name="ot_per" readonly><br><input type="text" id="ed_lable" name="ed" class="ed" readonly><input type="text" id="ed_per" size="6" name="ed_per" readonly><br><input type="text" id="cs_lable" readonly><input type="text" id="cs_per" size="6" name="cs_per" readonly><br><input type="text" id="vt_lable" readonly><input type="text" id="vt_per" size="6" name="vt_per" readonly ><br> </td>
                        <td><input type="text" id="pf" name="packing_forwarding"  readonly><br><input type="text" id="ite" name="ite" readonly><br><input type="text" id="ot" name="ot" readonly><br><input type="text" id="ed" name="ed" readonly><br><input type="text" id="cs" name="cs" readonly><br><input type="text" id="vt" name="vt" readonly><br></td>
                    </tr><input type="hidden" id="total_tax"> <!-- Including Tax Total For amount Calculation -->
                    <tr>
                       
                        <td colspan="4" class="blank"> </td>
                        <td colspan="2" class="total-line balance">Grand Total</td>
                        <td ><textarea class="due" name="grand_total" id="grand" placeholder='00.00' readonly></textarea></td>
                    
                    </tr>
                      
                    <tr>
                        <td colspan="7"><textarea cols='120' id="words" style="font-weight: bold" name="amount_words" readonly></textarea><input type='hidden' name='status' value='Pending'/></td>
                    </tr>
                    </table>    
                </div>
                <div style="width: 100%;">
                    <div style="float:left; width: 50%">
                        <table class='payment'>
                        <tr><th>Payment Terms </th><td>: <input type="text" name='payment_term' style="background:#F5F5DC" id="payment_term" tabindex="17" required="required" size="48%" Placeholder="Type Payment Term"></td></tr>
                        <tr><th>Transporter</th><td>: <input type="text" name='transporter' style="background:#F5F5DC" id="transporter" size="48%" required="required" placeholder="Type Transporter" tabindex="18"></td></tr>
                        <tr><th>Range</th><td>: "C" Registration Certificate No. AACCR3096GXM001</td></tr>
                        <tr><th>Excise No.</th><td>: AACCR3096GXM001</td></tr>
                        <tr><th>Cst No.</th><td>: 5016086-2 w.e.f. 01/04/1983</td></tr>
                        <tr><th>Tin No.</th><td>: 29170038961</td></tr>
                        <tr><th>Cin No.</th><td>: U74210MH2001PTC31466</td></tr>
                        </table>
                    </div>
                    <div style="float:right;">
                  <br>
                    <div align="right">
                    For Reynolds Chemequip Pvt. Ltd <br><br>
                    Authorised Signature
                    </div>
                    <!-- Signature PAD -->
                    <div id="logo">
                        <div id="logoctr">
                            <a href="javascript:;" id="change-logo" title="Change logo">Change Sign.</a>
                            <a href="javascript:;" id="save-logo" title="Save changes">Save</a>
                            <a href="javascript:;" id="delete-logo" title="Delete logo">Delete Sign.</a>
                            <a href="javascript:;" id="cancel-logo" title="Cancel changes">Cancel</a>
                        </div>
                        <div id="logohelp">
                            <input id="imageloc" type="text" size="50" value="" /><br />
                            (max width: 540px, max height: 100px)
                        </div>
                        <img id="image" src="<?php echo base_url();?>assets/images/sg.jpg" alt="logo" width='200' height='100' />
                    </div>
                </div>
                </div>
            <div style="clear:both"></div>
            <div class="fixed-action-btn vertical" style="bottom: 45px; right: 24px;">
                <a class="btn-floating btn-large red"  href="<?php echo base_url();?>index.php/users" >
                    <i id="pluse_ic" class="glyphicon glyphicon-plus"></i>
                    <i class="glyphicon glyphicon-home"></i>
                </a>
                <ul>
                    <li><a class="btn-floating orange darken-1" data-placement="bottom" title="View PO List" href="<?php echo base_url();?>index.php/users/view_po"><i class="glyphicon glyphicon-eye-open"></i></a></li>
                    <li><a class="btn-floating green"  data-placement="bottom" title="Create New PO!"><i class="glyphicon glyphicon-file"></i></a></li>
                    <li><button type="submit" name = "submit" class="btn-floating blue" data-placement="bottom" title="Save"><span class="glyphicon glyphicon-floppy-save"></span></button></li>
                    <li><a class="btn-floating grey"  data-placement="bottom" title="Go Back!"  href="javascript:window.history.go(-1);"><i class="glyphicon glyphicon-arrow-left"></i></a></li>    
                </ul>
            </div>
              </form>
                    <a class='button' href='#' id="tax_btn"><div id="tax_visible" style="text-decoration:none">Tariff</div><i id="tax_icon" class="glyphicon glyphicon-plus" id="btn"></i></a>
                <center>Note:Please Quote the above Purchase Order Number on all your Challens, Bills & Correspondence</center>
                <div class='wrap'>
                    <div class='content'align="center">
                     <h2>Tariff Table</h2>
                        <form >
                            <table> 
                              
                                    <tr style="background-color:#428bca;color:white;">   
                                        <th>Other Charges</th><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <th><input type="checkbox" id="packing_forwarding" value="1" reuired="required"/> Packing forwarding </th>
                                        <td><input type="text" name="packing"  id="packing_forwarding_input" list="packing" placeholder="Enter In %"/> 
                                        <datalist id="packing">
                                            <?php
                                                foreach($tax->result() as $row1){ ?>
                                                <option><?= $row1->packing_forwarding ?></option>
                                                <?php } ?>
                                        </datalist></td>
                                    </tr>
                                            
                                
                                    <tr>
                                        <th><input type="checkbox" id="inspection" value="2" reuired="required">Inspection & Testing Expense</th>
                                        <td><input type="text" name="packing" id="inspection_input" list="insp" placeholder="Enter  In %"/>
                                            <datalist id="insp">
                                                <?php
                                                    foreach($tax->result() as $row1){ ?>
                                                        <option><?= $row1->inspection_testing ?></option>
                                                <?php } ?>
                                            </datalist>
                                        </td></tr>
                                    <tr>
                                        <th><input type="checkbox" id="other" value="3" reuired="required"/>Other</th>
                                        <td><input type="text" name="packing"id="other_input" list="oth" placeholder="Enter In %"/>
                                            <datalist id="oth">
                                                <?php
                                                    foreach($tax->result() as $row1){ ?>
                                                        <option><?= $row1->other ?></option>
                                                <?php } ?>
                                            </datalist>
                                        </td></tr>
                                <tr style="background-color:#428bca;color:white;"> <th>Taxes</th><td></td></tr>
                                    <tr>
                                        <th><input type="checkbox" value="4" id="excise" reuired="required"/>Excise Duty</th>
                                        <td><input type="text" name="packing" id="excise_input" list="exc" placeholder="Enter Tax In %"/>
                                            <datalist id="exc">
                                                <?php
                                                    foreach($tax->result() as $row1){ ?>
                                                        <option><?= $row1->excise_duty ?></option>
                                                <?php } ?>
                                            </datalist>
                                        </td></tr>
                                    <tr>
                                        <th><input type="checkbox" value="5" id="cst" reuired="required" />CST</th>
                                        <td><input type="text" name="packing"  id="cst_input" list="ccs" placeholder="Enter Tax In %"/>
                                            <datalist id="ccs">
                                                <?php
                                                    foreach($tax->result() as $row1){ ?>
                                                        <option><?= $row1->cst ?></option>
                                                <?php } ?>
                                            </datalist>
                                        </td></tr>
                                    <tr>
                                        <th><input type="checkbox" value="6" id="vat" reuired="required" />Vat</th>
                                        <td><input type="text" name="packing"  id="vat_input" list="vaat" placeholder="Enter Tax In %"/>
                                            <datalist id="vaat">
                                                <?php
                                                                 foreach($tax->result() as $row1){ ?>
                                                        <option><?= $row1->vat ?></option>
                                                <?php } ?>
                                            </datalist>
                                        </td></tr>
                                    <tr>   
                                        <th colspan="2"  ><input type="button" id="btn" class="btn btn-success" value="Add" onclick="exit()" /></th>
                                    </tr>
                            </table>
                         </form>
                    </div>
                   
                </div>

                <script>
                function exit(){
                    $('#tax_btn').click();
                }
                $('.fixed-action-btn').hover(function(){
                $('#pluse_ic').toggle();
                });
                $('.button').click(function(){
                $('#tax_icon').toggle();
                $('#tax_visible').toggle();
                });
                   function convertNumberToWords(amount) {
    var words = new Array();
    words[0] = '';
    words[1] = 'One';
    words[2] = 'Two';
    words[3] = 'Three';
    words[4] = 'Four';
    words[5] = 'Five';
    words[6] = 'Six';
    words[7] = 'Seven';
    words[8] = 'Eight';
    words[9] = 'Nine';
    words[10] = 'Ten';
    words[11] = 'Eleven';
    words[12] = 'Twelve';
    words[13] = 'Thirteen';
    words[14] = 'Fourteen';
    words[15] = 'Fifteen';
    words[16] = 'Sixteen';
    words[17] = 'Seventeen';
    words[18] = 'Eighteen';
    words[19] = 'Nineteen';
    words[20] = 'Twenty';
    words[30] = 'Thirty';
    words[40] = 'Forty';
    words[50] = 'Fifty';
    words[60] = 'Sixty';
    words[70] = 'Seventy';
    words[80] = 'Eighty';
    words[90] = 'Ninety';
    amount = amount.toString();
    var atemp = amount.split(".");
    var number = atemp[0].split(",").join("");
    var n_length = number.length;
    var words_string = "";
    if (n_length <= 9) {
        var n_array = new Array(0, 0, 0, 0, 0, 0, 0, 0, 0);
        var received_n_array = new Array();
        for (var i = 0; i < n_length; i++) {
            received_n_array[i] = number.substr(i, 1);
        }
        for (var i = 9 - n_length, j = 0; i < 9; i++, j++) {
            n_array[i] = received_n_array[j];
        }
        for (var i = 0, j = 1; i < 9; i++, j++) {
            if (i == 0 || i == 2 || i == 4 || i == 7) {
                if (n_array[i] == 1) {
                    n_array[j] = 10 + parseInt(n_array[j]);
                    n_array[i] = 0;
                }
            }
        }
        value = "";
        for (var i = 0; i < 9; i++) {
            if (i == 0 || i == 2 || i == 4 || i == 7) {
                value = n_array[i] * 10;
            } else {
                value = n_array[i];
            }
            if (value != 0) {
                words_string += words[value] + " ";
            }
            if ((i == 1 && value != 0) || (i == 0 && value != 0 && n_array[i + 1] == 0)) {
                words_string += "Crores ";
            }
            if ((i == 3 && value != 0) || (i == 2 && value != 0 && n_array[i + 1] == 0)) {
                words_string += "Lakhs ";
            }
            if ((i == 5 && value != 0) || (i == 4 && value != 0 && n_array[i + 1] == 0)) {
                words_string += "Thousand ";
            }
            if (i == 6 && value != 0 && (n_array[i + 1] != 0 && n_array[i + 2] != 0)) {
                words_string += "Hundred and ";
            } else if (i == 6 && value != 0) {
                words_string += "Hundred ";
            }
        }
        words_string = words_string.split("  ").join(" ");
    }
    
    
     var decimal = atemp[1];
     var d_length = decimal.length;
    var words_d_string = "";
    if (d_length <= 9) {
        var d_array = new Array(0, 0, 0, 0, 0, 0, 0, 0, 0);
        var received_d_array = new Array();
        for (var i = 0; i < d_length; i++) {
            received_d_array[i] = decimal.substr(i, 1);
        }
        for (var i = 9 - d_length, j = 0; i < 9; i++, j++) {
            d_array[i] = received_d_array[j];
        }
        for (var i = 0, j = 1; i < 9; i++, j++) {
            if (i == 0 || i == 2 || i == 4 || i == 7) {
                if (d_array[i] == 1) {
                    d_array[j] = 10 + parseInt(d_array[j]);
                    d_array[i] = 0;
                }
            }
        }
        value = "";
        for (var i = 0; i < 9; i++) {
            if (i == 0 || i == 2 || i == 4 || i == 7) {
                value = d_array[i] * 10;
            } else {
                value = d_array[i];
            }
            if (value != 0) {
                words_d_string += words[value] + " ";
            }
            if ((i == 1 && value != 0) || (i == 0 && value != 0 && d_array[i + 1] == 0)) {
                words_d_string += "Crores ";
            }
            if ((i == 3 && value != 0) || (i == 2 && value != 0 && d_array[i + 1] == 0)) {
                words_d_string += "Lakhs ";
            }
            if ((i == 5 && value != 0) || (i == 4 && value != 0 && d_array[i + 1] == 0)) {
                words_d_string += "Thousand ";
            }
            if (i == 6 && value != 0 && (n_array[i + 1] != 0 && d_array[i + 2] != 0)) {
                words_d_string += "Hundred and ";
            } else if (i == 6 && value != 0) {
                words_d_string += "Hundred ";
            }
        }
        words_d_string = words_d_string.split("  ").join(" ");
    }
    if(words_d_string==''){
        $('#words').val('Rupees '+words_string + ' ' + words_d_string+ 'Only');
    }else{
          $('#words').val('Rupees '+words_string + '& Paise ' + words_d_string+ 'Only');
    }
    
}
    
                
                </script>
                <script type="text/javascript">
                        $('.quantity_no').keyup(function(){
                        find_weight();
                        });
                        $('.parts').keydown(function(){
                            user_input();
                        });
                        function user_input(){
                           $('.item-row').each(function() {
                            var category = $(this).find('.category').val();
                            var moc = $(this).find('.moc').val();
                            if(category=='Plate')
                            {
                                $(this).find('.length_mm').text('mm');
                                $(this).find('.width_mm').text('mm');
                                $(this).find('.width').show();
                                $(this).find('.length').show();
                                $(this).find('.width_uom').val('mm');
                                $(this).find('.length_uom').val('mm');
                                $(this).find('.length_meter').hide();
                            }
                            else if(moc=='C.S. Seamless' || moc =='S.S. Seamless' || moc == 'S.S. Welded')
                            {
                                $(this).find('.mtr_length').text('Mtr.');
                                $(this).find('.length_mtr_uom').val('Mtr.');
                                $(this).find('.length').hide();
                                $(this).find('.width').hide();
                                $(this).find('.length_meter').show();
                            }
                            else if(category=='Profiles')
                            {
                                $(this).find('.length_mm').text('mm');
                                $(this).find('.width').hide();
                                $(this).find('.length').show();
                                $(this).find('.length_uom').val('mm');
                                $(this).find('.length_meter').hide();
                            }else if(moc=='Copper' || moc =='Al. Brass' || moc == 'Ad. Brass' || moc == 'Cupronickel 70:30' || moc == 'Cupronickel 90:10' || moc == 'Brass')
                            {
                                $(this).find('.mtr_length').text('mm');
                                $(this).find('.length_uom').val('mm');
                                $(this).find('.length').show();
                                $(this).find('.width').hide();
                                $(this).find('.length_meter').hide();
                            }
                            else if(category=='Casting' ||category=='Forged' ||category=='Dish Ends' ||category=='Baffles'||category=='Electrode' ||category=='Elbow')
                            {
                                $(this).find('.length').hide();
                                $(this).find('.width').hide();
                                $(this).find('.length_meter').hide();
                                $(this).find('.quantity').hide();
                            }
                            
                            });
                        }
                        function find_weight(){
                        $('.item-row').each(function() {
                            var category = $(this).find('.category').val();
                            var moc = $(this).find('.moc').val();
                            length = $(this).find('.length').val();
                            length_meter = $(this).find('.length_meter').val();
                            width =$(this).find('.width').val();
                            thickness=$(this).find('.thick').val();
                            density=$(this).find('.density').val();
                            quantity_no=$(this).find('.quantity_no').val();
                            size=[$(this).find('.size').val()]/1000;
                            if(category=='Plate' ){
                            plate=(length*width)/1000000;
                            result = plate*density*thickness;
                            total_weight=result*quantity_no;
                            weight= total_weight.toFixed(3);
                            $(this).find('.quantity').val(weight);
                            }
                            else if(category=='Profiles'){
                            profile=(length*length)/1000000;
                            result = profile*density*25;
                            total_weight=result*quantity_no;
                            weight= total_weight.toFixed(3);
                            $(this).find('.quantity').val(weight);
                            }
                            else if(moc=='C.S. Seamless' || moc =='S.S. Seamless' || moc == 'S.S. Welded')
                            {
                                seamless = length_meter*quantity_no
                                seamles1= seamless.toFixed(3);
                                $(this).find('.quantity').val(seamles1);
                            }
                            else if(moc=='Copper' || moc =='Al. Brass' || moc == 'Ad. Brass' || moc == 'Cupronickel 70:30' || moc == 'Cupronickel 90:10' || moc == 'Brass')
                            {      
                                mtr=length/1000;
                                mtr_density=mtr*density;
                                mtr_len= mtr_density.toFixed(3);
                                total_weight=mtr_len*quantity_no;
                                weight= total_weight.toFixed(3);
                                $(this).find('.quantity').val(weight);
                            }else if(category=='Casting' ||category=='Forged' ||category=='Dish Ends' ||category=='Baffles'||category=='Electrode' ||category=='Elbow')
                            {
                                $(this).find('.quantity').val(quantity_no);
                            }
                            else
                            {
                                   $(this).find('.quantity').val(quantity_no);
                            }
                        });
                    }
                    $('.rate').focusout(function(){
                    update_price();
                    });
                    // Total Price And Ruppee Conversion
                    function update_price() 
                    {
                        $('#tax_btn').show();
                        total_cal=0;
                        $('.item-row').each(function() {
                        rate = $(this).find('.rate').val().replace(/\,/g,"");
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
                        $(this).find('.price').val(sum);
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
                        $(this).find('.rate').val(sum1);
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
                        $('#total').val(total);
                    }
                    $(document).ready(function()
                    {
                        $('input').click(function(){
                        $(this).select();
                        });
                    // Row Numbers
                    $("#addrow").click(function(){
                       
                     var $row = $('<tr class="item-row"><td></td><td><input type="hidden" name="pid[]" class="pid"/><textarea name="description[]" class="parts" style="background:#F5F5DC" title="Start Typing Part Category" placeholder="Category Moc Grade Thickness" cols="40"></textarea><br><input type="text" name="length[]"  style="background:#F0F8FF" class="length" placeholder="Length" size="5"/><lable class = "length_mm"></lable><input type="hidden" name="length_uom[]" class="length_uom">&nbsp<input type="text" name="width[]" class="width" placeholder="Width"  style="background:#F0F8FF" size="5"><lable class = "width_mm"><input type="hidden" name="width_uom[]" class="width_uom"></lable><input type="text" name="length_meter[]" class="length_meter" placeholder="Length" size="5" style="background:#F0F8FF"/><lable class="mtr_length"></lable><input type="hidden" name="length_mtr_uom[]" class="length_mtr_uom"><input type="hidden" name="category[]" class="category" /></textarea><input type="hidden" id="moc" class="moc" name="moc[]"/><input type="hidden" id="grade" class="grade" name="grade[]"/></td><td><textarea class="quantity_no" name="quantity[]" cols="1" style="background:#F5F5DC">1</textarea><input type="hidden" name="density[]" class="density"/><input type="hidden" class="thick" name="thickness[]" /><textarea class="quantity" name="weight[]" cols="10" style="text-align:center"placeholder="Quantity"></textarea></td><td><textarea class="uom" name="unit[]" cols="6"></textarea></td><td><textarea class="work_order" title="Work Order No."  name="work_order[]" style="background:#F5F5DC"></textarea></td><td><textarea class="rate" name="rate[]" placeholder="Rate/Unit" style="background:#F5F5DC">0.00</textarea></td><td><textarea class="price" name="price[]"></textarea></td></tr>').insertAfter(".item-row:last");
                    
                        bind($row);
                     });
                    function bind($row) { 
                        $row.find('.width').hide();
                        $row.find('.length').hide();
                        $row.find('.length_meter').hide();
                        $row.find('.price').blur(update_price);
                        $row.find('.quantity_no').blur(find_weight);
                        $row.find('.work_order').keyup(work_order);
                        $row.find('.parts').keydown(user_input);
                        $row.find('.parts').autocomplete({
                        source: function (request, response) {
                        $.ajax({
                            url: "<?php echo base_url(); ?>index.php/users/parts_name",
                            data:{term: request.term},
                            dataType: "json",
                            type: "POST",
                            dataFilter: function (data) { return data; },
                            success: function (data) {
                            response($.map(data, function (item) {
                            return {
                                   label: item.des,
                                    value: item.des,
                                    id: item.pid
                                }
                            }))
                        },
                    error: function (XMLHttpRequest, textStatus, errorThrown) {
                    alert(textStatus);
                    }
                    });
                    },
                    minLength: 2,
                    select: function (event , ui) {
                    var businessEntityId = ui.item.id;
                    $.ajax({
                        type: "POST",
                        data:{'id': businessEntityId},
                        dataType:"json",
                        url: "<?php echo base_url(); ?>index.php/users/part_detail_db",//here we are calling our user controller 
                        success: function(data) //we're calling the response json array 'data'
                        {
                             $row.find('.uom').val(data.uom);
                             $row.find('.density').val(data.density);
                             $row.find('.thick').val(data.thickness);
                             $row.find('.category').val(data.category);
                             $row.find(".moc").val(data.moc);
                             $row.find(".grade").val(data.grade);
                             $row.find(".pid").val(data.pid);
                           
                        }
                    });
                }
                        });
                        }
                       
                });
            </script>
        <script type="text/javascript">
        $('#packing_forwarding').click(function(){
            $('#packing_forwarding_input').toggle();
            $('#pf_lable').toggle();
            $('#pf').toggle();
            $('#pf_per').toggle();
           });
         $('#inspection').click(function(){
            $('#inspection_input').toggle();
            $('#ite_lable').toggle();
            $('#ite').toggle();
            $('#ite_per').toggle();

          });
         $('#other').click(function(){
            $('#other_input').toggle();
            $('#ot_lable').toggle();
            $('#ot').toggle();
            $('#ot_per').toggle();

        });
         $('#excise').click(function(){
            $('#excise_input').toggle();
            $('#ed_lable').toggle();
            $('#ed').toggle();
            $('#ed_per').toggle();
        });
         $('#cst').click(function(){
            $('#cst_input').toggle();
            $('#cs_lable').toggle();
            $('#cs').toggle();
            $('#cs_per').toggle();
            $("#vat").attr('disabled', this.checked)
        });
        $('#vat').click(function(){
            $('#vat_input').toggle();
            $('#vt_lable').toggle();
            $('#vt').toggle();
            $('#vt_per').toggle();
            $("#cst").attr('disabled', this.checked)
        });
        $('#btn').click(function(){
        var total_amt = $('#total_tax').val();
        
         if($('#packing_forwarding').prop("checked") == true){
               var packing_percent = $('#packing_forwarding_input').val();
               var Total = [parseFloat(total_amt) * parseFloat(packing_percent)]/100;
                $('#pf_lable').val('Packing Forwording');
                var pf_fixed=parseFloat(Total).toFixed(2);
                        var FullData = format( "#,##0.00####", pf_fixed);
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
                        $('#pf').val(total);
                        $('#pf_per').val(packing_percent+'%');
            }else{
               total = '0';
           }
        if($('#inspection').prop("checked") == true){
               var inspection_percent = $('#inspection_input').val();
               var Total1 = [parseFloat(total_amt) * parseFloat(inspection_percent)]/100;
               $('#ite_lable').val('Inspection and Testing');
                var ite_fixed=parseFloat(Total1).toFixed(2);
                        var FullData = format( "#,##0.00####", ite_fixed);
                        var n=FullData.split(",");
                        var part1 ="";
                        for(i=0;i<n.length-1;i++)
                        part1 +=n[i];    
                        var part2 = n[n.length-1];
                        if(part1.length>0){
                        var total1 =format( "##,##.####", part1) + "," + part2
                        }else{
                        var total1 =format( "##,##.####", part1) + "" + part2
                        }
                        $('#ite').val(total1);
                        $('#ite_per').val(inspection_percent+'%');
               
               }else{
               total1 = '0';
          }
           if($('#other').prop("checked") == true){
               var other_percent = $('#other_input').val();
               var Total2 = [parseFloat(total_amt) * parseFloat(other_percent)]/100;
               $('#ot_lable').val('Other');
                var ite_fixed=parseFloat(Total2).toFixed(2);
                        var FullData = format( "#,##0.00####", ite_fixed);
                        var n=FullData.split(",");
                        var part1 ="";
                        for(i=0;i<n.length-1;i++)
                        part1 +=n[i];    
                        var part2 = n[n.length-1];
                        if(part1.length>0){
                        var total2 =format( "##,##.####", part1) + "," + part2
                        }else{
                        var total2 =format( "##,##.####", part1) + "" + part2
                        }
                        $('#ot').val(total2);
                        $('#ot_per').val(other_percent+'%');
               }else{
               total2 = '0';
          }
          var PFO=parseFloat(total)+parseFloat(total1)+parseFloat(total2)+parseFloat(total_amt);
           if($('#excise').prop("checked") == true){
               var excise_percent = $('#excise_input').val();
               if(PFO!=0){
                    var Total3= [parseFloat(PFO) * parseFloat(excise_percent)]/100;
               }else{
                    var Total3= [parseFloat(total_amt) * parseFloat(excise_percent)]/100;
               }
              
               $('#ed_lable').val('Excise Duty');
                var ed_fixed=parseFloat(Total3).toFixed(2);
                        var FullData = format( "#,##0.00####", ed_fixed);
                        var n=FullData.split(",");
                        var part1 ="";
                        for(i=0;i<n.length-1;i++)
                        part1 +=n[i];    
                        var part2 = n[n.length-1];
                        if(part1.length>0){
                        var total3 =format( "##,##.####", part1) + "," + part2
                        }else{
                        var total3 =format( "##,##.####", part1) + "" + part2
                        }
                        $('#ed').val(total3);
                        $('#ed_per').val(excise_percent+'%');
                var excise= [parseFloat(PFO) * parseFloat(excise_percent)]/100 + parseFloat(PFO)  ;
               }else{
               excise = PFO;;
             
          } 
            if($('#cst').prop("checked") == true){
               var cst_percent = $('#cst_input').val();
               if(excise!=0){
                    var Total4 = [parseFloat(excise) * parseFloat(cst_percent)]/100;
               }else{
                    var Total4 = [parseFloat(total_amt) * parseFloat(cst_percent)]/100;
               }
             
               $('#cs_lable').val('CST');
               var cs_fixed=parseFloat(Total4).toFixed(2);
                        var FullData = format( "#,##0.00####", cs_fixed);
                        var n=FullData.split(",");
                        var part1 ="";
                        for(i=0;i<n.length-1;i++)
                        part1 +=n[i];    
                        var part2 = n[n.length-1];
                        if(part1.length>0){
                        var total4 =format( "##,##.####", part1) + "," + part2
                        }else{
                        var total4 =format( "##,##.####", part1) + "" + part2
                        }
                        $('#cs').val(total4);
                        $('#cs_per').val(+cst_percent+'%');
                  var total_cst= [parseFloat(excise) * parseFloat(cst_percent)]/100 + parseFloat(excise) ;
               }else{
               total_cst = excise;
          }  
          if($('#vat').prop("checked") == true){
               var vat_percent = $('#vat_input').val();
               if(excise!=0){
                     var Total5 = [parseFloat(excise) * parseFloat(vat_percent)]/100;
               }else{
                     var Total5 = [parseFloat(total_amt) * parseFloat(vat_percent)]/100;
               }
              
               $('#vt_lable').val('Vat');
               var vt_fixed=parseFloat(Total5).toFixed(2);
                        var FullData = format( "#,##0.00####", vt_fixed);
                        var n=FullData.split(",");
                        var part1 ="";
                        for(i=0;i<n.length-1;i++)
                        part1 +=n[i];    
                        var part2 = n[n.length-1];
                        if(part1.length>0){
                        var total5 =format( "##,##.####", part1) + "," + part2
                        }else{
                        var total5 =format( "##,##.####", part1) + "" + part2
                        }
                        $('#vt').val(total5);
                        $('#vt_per').val(vat_percent+'%');
                        var total_vat = [parseFloat(excise) * parseFloat(vat_percent)]/100+parseFloat(excise);
               }else{
               total_vat = total_cst;
           }
                var Total_fixed=parseFloat(total_vat).toFixed(2);
                        var FullData = format( "#,##0.00####", Total_fixed);
                        var n=FullData.split(",");
                        var part1 ="";
                        for(i=0;i<n.length-1;i++)
                        part1 +=n[i];    
                        var part2 = n[n.length-1];
                        if(part1.length>0){
                        var grand_total =format( "##,##.####", part1) + "," + part2
                        }else{
                        var grand_total =format( "##,##.####", part1) + "" + part2
                        }
             
         $('#grand').val(grand_total);
          convertNumberToWords(grand_total);
        });
        
</script>
                <input type="text" onkeyup="sam_click(this.value)">
                <script type="text/javascript">
function sam_click()
{

	var x="<?php 
   $abc = "<script>document.getElementByID('yourid').value</script>";
        
        money($abc); ?>";
	alert(x);
	return false;
}
</script>
        </body>
    <script>
        $('#tax_btn').on('click', function(){
        $('.wrap, a').toggleClass('active');
        return false;
        });
    </script>
    <script>
        $("#cancel-logo").click(function(){
        $("#logo").removeClass('edit');
        });
        $("#delete-logo").click(function(){
        $("#logo").remove();
        });
        $("#change-logo").click(function(){
        $("#logo").addClass('edit');
        $("#imageloc").val($("#image").attr('src'));
        $("#image").select();
        });
        $("#save-logo").click(function(){
        $("#image").attr('src',$("#imageloc").val());
        $("#logo").removeClass('edit');
        });
    </script>
    <style>
        .payment th, .payment td 
        {
            border: 0px !important;
            padding:0;
        }
    </style>
   
    <?php
  /**
   * Created by PhpStorm.
   * User: sakthikarthi
   * Date: 9/22/14
   * Time: 11:26 AM
   * Converting Currency Numbers to words currency format
   */
    function money($number){

   $no = round($number);
   $point = round($number - $no, 2) * 100;
   $hundred = null;
   $digits_1 = strlen($no);
   $i = 0;
   $str = array();
   $words = array('0' => '', '1' => 'one', '2' => 'two',
    '3' => 'three', '4' => 'four', '5' => 'five', '6' => 'six',
    '7' => 'seven', '8' => 'eight', '9' => 'nine',
    '10' => 'ten', '11' => 'eleven', '12' => 'twelve',
    '13' => 'thirteen', '14' => 'fourteen',
    '15' => 'fifteen', '16' => 'sixteen', '17' => 'seventeen',
    '18' => 'eighteen', '19' =>'nineteen', '20' => 'twenty',
    '30' => 'thirty', '40' => 'forty', '50' => 'fifty',
    '60' => 'sixty', '70' => 'seventy',
    '80' => 'eighty', '90' => 'ninety');
   $digits = array('', 'hundred', 'thousand', 'lakh', 'crore');
   while ($i < $digits_1) {
     $divider = ($i == 2) ? 10 : 100;
     $number = floor($no % $divider);
     $no = floor($no / $divider);
     $i += ($divider == 10) ? 1 : 2;
     if ($number) {
        $plural = (($counter = count($str)) && $number > 9) ? 's' : null;
        $hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
        $str [] = ($number < 21) ? $words[$number] .
            " " . $digits[$counter] . $plural . " " . $hundred
            :
            $words[floor($number / 10) * 10]
            . " " . $words[$number % 10] . " "
            . $digits[$counter] . $plural . " " . $hundred;
     } else $str[] = null;
  }
  $str = array_reverse($str);
  $result = implode('', $str);
  $points = ($point) ?
    "." . $words[$point / 10] . " " . 
          $words[$point = $point % 10] : '';
  echo $result . "Rupees  And" . $points . " Paise";
    }
 ?>

</html>