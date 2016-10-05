<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
    <title>Invoice</title>
    <!-- <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">  -->
    <link rel='stylesheet' type='text/css' href="<?php echo base_url("assets/css/style1.css");?>" />
    <link rel='stylesheet' type='text/css' href="<?php echo base_url("assets/css/print.css");?>" />
    <link rel='stylesheet' type='text/css' href="<?php echo base_url("assets/css/bootstrap.min.css");?>" />
    <script type='text/javascript' src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
    <script type='text/javascript' src="<?php echo base_url("assets/js/jquery-1.4.4.min.js");?>"></script>
    <script type='text/javascript' src="<?php echo base_url(); ?>assets/js/jquery-1.11.3.min.js"></script>
    <script type='text/javascript' src="<?php echo base_url(); ?>assets/js/jquery-ui.js"></script>
    <script type='text/javascript' src="<?php echo base_url(); ?>assets/js/accounting.min.js"></script>                  
    <!-- Floating Button -->
    <link rel='stylesheet' type='text/css' href="<?php echo base_url("assets/css/font-awesome.min.css");?>" />
    <script type='text/javascript' src="<?php echo base_url(); ?>assets/js/materialize.js"></script> 
    <link rel='stylesheet' type='text/css' href="<?php echo base_url("assets/css/materialize.css");?>" />
    <!-- Date Picker Plugins -->
    <link rel='stylesheet' type='text/css' href="<?php echo base_url("assets/css/jquery-ui.css");?>" />
    <!-- tax popup form -->
     <link rel='stylesheet' type='text/css' href="<?php echo base_url("assets/css/po_pop_form.css");?>" />
    <!--Currency Formatter -->
    <script type='text/javascript' src="<?php echo base_url(); ?>assets/js/format.20110630-1100.min.js"></script>
   
    <script>
        $(function() {
            $( "#datepicker" ).datepicker({ dateFormat: 'dd-mm-yy' });
            $( "#datepicker1" ).datepicker({ dateFormat: 'dd-mm-yy' });
            $( "#datepicker2" ).datepicker({ dateFormat: 'dd-mm-yy' });
        });
        
          

        </script>
       
    </head>
    <body>
      	<div class="container">
             <div align='right'>QSR 064/1</div>
            <div style="width: 100%;">
                <img  src="<?php echo base_url();?>assets/images/header3.jpg" alt="logo" width='100%' height='125' />
            </div>
            <hr>
                <form action="<?= base_url('index.php/users/save_invoice') ?>" method ="post" name="MyForm">
                    <div style="width: 100%;">
                        <div style="float:left; width: 60%">
                            <table>
                            <b><input type="text" name='supplier_name' id='supplier' value="<?= $r->supplier_name ?>" size="45" readonly/></b><br>
                            <input type="text" name='address' value="<?= $r->address ?>" size="45" readonly><br>
                            <input type="text" name='address1' value="<?= $r->address1 ?>" size="45" readonly><br>
                            <input type="text" name='address2' value="<?= $r->address2 ?>" size="45" readonly><br>
                            <input type="text" name='city' value="<?= $r->city ?>" size="45" readonly><br>
                            <input type="text" name='state'  value="<?= $r->state ?>" size="45" readonly ><br>
                            Pin:&nbsp;<input name='pin' id='pin' size="45" value="<?= $r->pin ?>" readonly><br>
                            <input type="text" name='phone' value="<?= $r->phone ?>" size="45" readonly><br>
                            <input type="text" name='email'  value="<?= $r->email ?>" size="45" readonly>
                                
                            </table>
                        </div>
                    <div style="float:right;width: 40%">
                            <table class='payment'>
                                <tr><th>GRN No.</th><td>:<select name="grn_no"><option>GRN/2016-17/REY/</option></select>
                                      <input list="browsers" name="myBrowser"  placeholder="Order No."  style="background:#F5F5DC" size="10" id="grn_no"/>
                                      <datalist id="browsers">
                                        <?php
                                            $data  =   $data  = $this->db->query("SELECT * FROM goods_reciept WHERE status ='Pending'");
                                                foreach($data->result() as $row){ ?>
                                                <option value="<?= $row->grn_id ?>"><?= $row->grn_id ?></option>
                                        <?php } ?>
                                      </datalist></td></tr> 
                                <tr><th>Date</th><td>:<input name='date' title="Select Date" onclick="demo4()" type="text" id="datepicker" Required="required" tabindex="2" placeholder="dd-mm-yy" style="background:#F5F5DC"/> </td></tr>
                                 <tr><th>Inv. No.</th><td>:<input name='inv_no' title="Enter Invoice No." type="text" tabindex="3" placeholder="Enter Invoice No." style="background:#F5F5DC"/> </td></tr>
                                 <tr><th>Inv. Date</th><td>:<input name='inv_date' title="Select Date" type="text" id="datepicker1"  tabindex="4" placeholder="dd-mm-yy" style="background:#F5F5DC"/> </td></tr> 
                            </table>
                             
                        </div>
                    </div>
                    <div style="clear:both"></div>
                    <hr> 
                        <input type="hidden" class="total">
                    <p>Dear Sir's,</p>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; We Are Pleased To Place An Order For The Following Material On Terms & Condition Given
                    Above To Be Delivered At Our Plant Unless Otherwise Stated.        
                    <hr>
                    <table id="items">
                    <tr>
                        <th>Si.No.</th>
                        <th>Description</th>
                        <th>Quantity</th>
                        <th>Unit</th>
                        <th>W/O.</th>
                        <th>Rate</th>
                        <th>Price</th>
                    </tr>
                    <?php
                        $data  = $this->db->query("SELECT * FROM grn_detail WHERE grn_id='{$r->grn_id}'");
                        foreach($data->result() as $row){ ?>
                    <tr class="item-row">
                        <td align="center">
                            .
                        </td>
                        <td><input type="hidden" name="category[]" class="category" value="<?= $row->category ?>"><input type="hidden" name="pid[]" class="pid" value="<?= $row->pid ?>"><input type="hidden" class="moc" value="<?= $row->moc ?>" name="moc[]"><input type="hidden" class="grade" id="grade" value="<?= $row->grade ?>" name="grade[]"><input type="hidden" name='id[]' class="thick" value="<?= $row->grn_id ?>" /><textarea name='description[]' class="parts"  cols="30" readonly ><?= $row->description ?></textarea><br><input type="text"  name='length[]' class="length"  size="3"  value="<?= $row->length ?>"/><?= $row->length_uom ?><input type="hidden" name="length_uom[]" value="<?= $row->length_uom ?>"> &nbsp;<input type="text" name="width[]" class="width"  name='width[]' size="4"  value="<?= $row->width ?>"><?= $row->width_uom ?><input type="hidden" name="width_uom[]" value="<?= $row->width_uom ?>"><input type="text" size="4" name="length_meter[]" class="length_meter" value="<?= $row->length_meter ?>"><?= $row->length_mtr_uom ?><input type="hidden" name="length_mtr_uom[]"  class="length_mtr_uom" value="<?= $row->length_mtr_uom ?>"></td>
                       
                            <?php if($row->wt_rec=='-'){ ?>
                                 <td><textarea name='quantity[]' class="quantity_no" cols="1" ><?= $row->qty_rec ?></textarea>
                                 <textarea name='weight[]' class="quantity" cols="10" placeholder="Quantity" ><?= $row->qty_rec ?></textarea></td>
                            <?php } else { ?>
                            <td><textarea name='quantity[]' class="quantity_no" cols="1" ><?= $row->qty_rec ?></textarea>
                            <textarea name='weight[]' class="quantity" cols="10" placeholder="Quantity" ><?= $row->wt_rec ?></textarea></td>
                            <?php } ?>
                        <td><textarea name='unit[]' id="uom" class="uom"><?= $row->unit ?></textarea><input type="hidden" name="grnId[]" value="<?= $row->id ?>"></td>
                        <td><textarea name='work_order[]' class="work_order"><?= $row->work_order ?></textarea></td>
                        <td><textarea name='rate[]' class="rate"><?= $row->rate ?></textarea><input type="hidden" class="land_per" ><input type="hidden" name="landing_rate[]" class="landing_rate"></td>
                        <td><textarea name='price[]' class="price" readonly><?= $row->price ?></textarea><input type="hidden" name="landing_price[]" class="landing_price"></td>
                    </tr>
                    <?php } ?> 
                    <tr>
                        <td colspan="7"></td>
                    </tr>
                   <tr>
                        <td colspan='4' class="blank"><textarea  name="narration" cols='80' rows='4'Placeholder="Special Note"></textarea></td>
                        <td colspan="2" class="total-line">Total</td>
                        <td align="center"><textarea id="total" name="total" ></textarea></td>
                    </tr>
                         <?php
                        $data  = $this->db->query("SELECT * FROM purchase_order WHERE order_no='{$r->po_no}'");
                        foreach($data->result() as $tax){ ?>
                    <tr>
                        <td colspan="4" class="blank"> </td> 
                        <td colspan="2" class="total-line"><?php if($tax->pf_per) {?><lable id="packing">Packing Forwarding(%)</lable> <?php } ?>&nbsp;&nbsp;<input type="text" name="pf_per" id="pf_per" size="2" value="<?= $tax->pf_per ?>" readonly><br><?php if($tax->ite_per) {?><lable id="inspection">Inspection & Testing(%)</lable><?php } ?>&nbsp;&nbsp;<input type="text" name="ite_per" id="ite_per" size="2" value="<?= $tax->ite_per ?>" readonly><br><?php if($tax->ot_per) {?><lable id="other">Other(%)</lable><?php } ?>&nbsp;&nbsp;<input type="text" name="ot_per" id="ot_per" size="2" value="<?= $tax->ot_per ?>" readonly><br><?php if($tax->ed_per) {?><lable id="excise">Excise Duty(%)</lable><?php } ?>&nbsp;&nbsp;<input type="text" name="ed_per" id="ed_per" size="2" value="<?= $tax->ed_per ?>" readonly><input type="button" onclick="demo()" value="x"><br><?php if($tax->cs_per) {?><lable id="cst">CST(%)</lable><?php } ?>&nbsp;&nbsp;<input type="text" name="cs_per" id="cs_per" size="2" value="<?= $tax->cs_per ?>" readonly><br><?php if($tax->vt_per) {?><lable id="vat">Vat(%)</lable><?php } ?>&nbsp;&nbsp;<input type="text" name="vt_per" id="vt_per" size="2" value="<?= $tax->vt_per ?>" readonly><input type="button" onclick="demo1()" value="x"><br><lable id="fc"> Fright Charge </lable> <input type="button" onclick="demo2()" value="+"></td>
                                                                                         <td align="center"><input type="text" name="packing_forwarding" id="pf" value="<?= $tax->packing_forwarding ?>" readonly><br><input type="text" name="ite" id="ite" value="<?= $tax->inspection_testing ?>" readonly><br><input type="text" name="ot" id="ot" value="<?= $tax->other_tax ?>" readonly><br><input type="text" name="ed" id="ed" value="<?= $tax->excise_duty ?>" readonly><br><input type="text" name="cs" id="cs" value="<?= $tax->cst_tax ?>" readonly><br><input type="text" name="vt" id="vt" value="<?= $tax->vat_tax ?>" readonly><br><input type="text" name="fright_charge" id="charge" value="0" onfocusout="demo3()"></td>
                    </tr>
                         <?php } ?> 
                        <input type="hidden" id="total_tax"> <!-- Including Tax Total For amount Calculation -->
                    <tr>
                        <td colspan="4" class="blank"> </td>
                        <td colspan="2" class="total-line balance">Grand Total</td>
                        <td ><textarea class="due" name="grand_total" id="grand" ><?= $r->grand_total ?></textarea></td>
                    </tr>
                    <tr>
                        <td colspan="7"><textarea cols='120' name="amount_words" placeholder="Amount In Words" id="words" style="font-weight: bold" readonly></textarea></td>
                    </tr>
                    </table> <input type='hidden' name='status' value='Pending'/>
                    <div style="width: 100%;">
                        
                        <div style="float:left; width: 50%">
                           
                            <tr><th align='left'>Range</th><td>: "C" Registration Certificate No. AACCR3096GXM001</td></tr><br>
                            <tr><th align='left'>Excise No.</th><td>: AACCR3096GXM001</td></tr><br>
                            <tr><th align='left'>Cst No.</th><td>: 5016086-2 w.e.f. 01/04/1983</td></tr><br>
                            <tr><th align='left'>Tin No.</th><td>: 29170038961</td></tr><br>
                            <tr><th align='left'>Cin No.</th><td>: U74210MH2001PTC31466</td></tr>
                        </table>
                        </div>
                    <div style="float:right;">
                    <br>
                    <div align="right">
                    For Reynolds Chemequip Pvt. Ltd <br><br>
                    Authorised Signature
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
                    <li><a class="btn-floating orange darken-1" data-placement="bottom" title="View Invoice List" href="<?php echo base_url();?>index.php/users/view_purchase_invoice"><i class="glyphicon glyphicon-eye-open"></i></a></li>
                    <li><a class="btn-floating green"  data-placement="bottom" title="Create New Invoice!"><i class="glyphicon glyphicon-file"></i></a></li>
                    <li><button type="submit" name = "submit" class="btn-floating blue" data-placement="bottom" title="Save"><span class="glyphicon glyphicon-floppy-save"></span></button></li>
                    <li><a class="btn-floating grey"  data-placement="bottom" title="Go Back!"  href="javascript:window.history.go(-1);"><i class="glyphicon glyphicon-arrow-left"></i></a></li>    
                </ul>
            </div>
              </form>
            <center>Note:Please qoute the above Purchase Order Number on all your Challens, Bills & Correspondence</center>
        </div>
        
                <script type="text/javascript">
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
    
                    $(document).ready(function(){
                        $('#charge').hide();
                        $('#fc').hide();
                       
                        
                    })
                     $('.quantity_no').keyup(function(){
                        find_weight();
                        });
                        function demo(){
                            $('#ed_per').hide();
                            $('#excise').hide();
                            excise_duty = $('#ed').val().replace(/\,/g,"");
                            total = $('#grand').val().replace(/\,/g,"");
                            total_value=total - excise_duty;
                            
                            $('#ed').val('');
                            $('#ed').hide()
                            var total_fixed=parseFloat(total_value).toFixed(2);
                            var FullData = format( "#,##0.00####", total_fixed);
                            var n=FullData.split(",");
                            var part1 ="";
                            for(i=0;i<n.length-1;i++)
                            part1 +=n[i];    
                            var part2 = n[n.length-1];
                            if(part1.length>0){
                            var total_value =format( "##,##.####", part1) + "," + part2
                            }else{
                            var total_value =format( "##,##.####", part1) + "" + part2
                            }
                            $('#grand').val(total_value);
                            convertNumberToWords(total_value);
                            
                            demo4();
                        }
                        function demo1(){
                            $('#vt_per').hide();
                            $('#vat').hide();
                            cst = $('#vt').val().replace(/\,/g,"");
                            total = $('#grand').val().replace(/\,/g,"");
                            total_value=total - cst;
                           
                            $('#vt').val('');
                            $('#vt').hide()
                             var total_fixed=parseFloat(total_value).toFixed(2);
                            var FullData = format( "#,##0.00####", total_fixed);
                            var n=FullData.split(",");
                            var part1 ="";
                            for(i=0;i<n.length-1;i++)
                            part1 +=n[i];    
                            var part2 = n[n.length-1];
                            if(part1.length>0){
                            var total_value =format( "##,##.####", part1) + "," + part2
                            }else{
                            var total_value =format( "##,##.####", part1) + "" + part2
                            }
                             $('#grand').val(total_value);
                             convertNumberToWords(total_value);
                             demo4();
                        }
                        function demo2(){
                           $('#charge').toggle();
                           $('#fc').toggle();
                        }
                       
                         function demo3(){
                            charge = $('#charge').val().replace(/\,/g,"");
                            total = $('#grand').val().replace(/\,/g,"");
                            total_value=parseFloat(total) + parseFloat(charge);
                           
                            var total_fixed=parseFloat(total_value).toFixed(2);
                            var FullData = format( "#,##0.00####", total_fixed);
                            var n=FullData.split(",");
                            var part1 ="";
                            for(i=0;i<n.length-1;i++)
                            part1 +=n[i];    
                            var part2 = n[n.length-1];
                            if(part1.length>0){
                            var total_value =format( "##,##.####", part1) + "," + part2
                            }else{
                            var total_value =format( "##,##.####", part1) + "" + part2
                            }
                            $('#grand').val(total_value);
                             convertNumberToWords(total_value);
                                                       
                            demo4();
                          
                        }
                        function demo4(){
                                pf = $('#pf').val().replace(/\,/g,"");
                                ite = $('#ite').val().replace(/\,/g,"");
                                ot = $('#ot').val().replace(/\,/g,"");
                                ed = $('#ed').val().replace(/\,/g,""); 
                                cs = $('#cs').val().replace(/\,/g,""); 
                                vt = $('#vt').val().replace(/\,/g,"");
                                charge = $('#charge').val().replace(/\,/g,"");
                                if(pf==''){
                                    pf='0'
                                }
                                if(ite==''){
                                    ite='0'
                                }
                                if(ot==''){
                                    ot='0'
                                }
                                if(ed==''){
                                    ed='0'
                                }
                                if(cs==''){
                                    cs='0'
                                }
                                if(vt==''){
                                    vt='0'
                                }
                                if(charge==''){
                                    charge='0'
                                }
                                total = parseFloat(pf)+parseFloat(ite)+parseFloat(ot)+parseFloat(ed)+parseFloat(cs)+parseFloat(vt)+parseFloat(charge);
                               $('.total').val(total);
                               total_cost = $('#total').val().replace(/\,/g,"");
                               landing_cost_per =((total*100)/total_cost).toFixed(2);
                              
                                  $('.land_per').val(landing_cost_per);
                                  demo5()
                               
                        }
                    function demo5(){
                        $('.item-row').each(function() {
                            var rate = $(this).find('.rate').val().replace(/\,/g,"");
                            var per = $(this).find('.land_per').val().replace(/\,/g,"");
                            var quantity = $(this).find('.quantity').val().replace(/\,/g,"");
                            total_cost = (rate * per )/100;
                            rate_plus_landing = (parseFloat(total_cost)+parseFloat(rate)).toFixed(2); 
                            var packing=parseFloat(rate_plus_landing).toFixed(2);
                        var FullData = format( "#,##0.00####", packing);
                        var n=FullData.split(",");
                        var part1 ="";
                        for(i=0;i<n.length-1;i++)
                        part1 +=n[i];    
                        var part2 = n[n.length-1];
                        if(part1.length>0){
                        var rate_plus_landing_fix =format( "##,##.####", part1) + "," + part2
                        }else{
                        var rate_plus_landing_fix =format( "##,##.####", part1) + "" + part2
                        }
                            $(this).find('.landing_rate').val(rate_plus_landing_fix);
                            
                            landing_price =(rate_plus_landing * quantity).toFixed(2);
                             var packing=parseFloat(landing_price).toFixed(2);
                        var FullData = format( "#,##0.00####", packing);
                        var n=FullData.split(",");
                        var part1 ="";
                        for(i=0;i<n.length-1;i++)
                        part1 +=n[i];    
                        var part2 = n[n.length-1];
                        if(part1.length>0){
                        var landing_price =format( "##,##.####", part1) + "," + part2
                        }else{
                        var landing_price =format( "##,##.####", part1) + "" + part2
                        }
                            $(this).find('.landing_price').val(landing_price);
                      
                        });
                    }
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
                                $(this).find('.width_mm').text('mm');
                                $(this).find('.width').show();
                                $(this).find('.length').show();
                                $(this).find('.width_uom').val('mm');
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
                            else if(category=='Casting' ||category=='Forged' ||category=='Dish Ends' ||category=='Baffles'||category=='Electrode' ||category=='Elbow' )
                            {
                                $(this).find('.length').hide();
                                $(this).find('.width').hide();
                                $(this).find('.length_meter').hide();
                                $(this).find('.quantity').hide();
                            }
                            
                            });
                        }
                    $(document).ready(function(){
                       update_price();
                       tax_cal();
                    });
                    // Total Price And Ruppee Conversion
                    function update_price() {
                     
                        total_cal=0;
                        $('.item-row').each(function() {
                        rate = $(this).find('.rate').val();
                        quantity =$(this).find('.quantity').val();
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
                        $('#total').val(total);
                          convertNumberToWords(total);
                    }
                   
                 
            </script>
        </body>
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
        });
        $('#vat').click(function(){
            $('#vat_input').toggle();
            $('#vt_lable').toggle();
            $('#vt').toggle();
            $('#vt_per').toggle();
        });
        $('.price').keyup(function(){
        tax_cal();
        })
        
        function tax_cal(){
        var total_amt = $('#total_tax').val();
        var pf_per = $('#pf_per').val();
        var ite_per = $('#ite_per').val();
        var ot_per = $('#ot_per').val();
        var ed_per = $('#ed_per').val();
        var cs_per = $('#cs_per').val();
        var vt_per = $('#vt_per').val();
        if (pf_per == null || pf_per == "")
            {
               Total = total_amt;
            }
            else
            {
                var Total = [parseFloat(total_amt) * parseFloat(pf_per)]/100 + parseFloat(total_amt) ;
                var packing_forwarding = Total - total_amt;
                 var packing=parseFloat(packing_forwarding).toFixed(2);
                        var FullData = format( "#,##0.00####", packing);
                        var n=FullData.split(",");
                        var part1 ="";
                        for(i=0;i<n.length-1;i++)
                        part1 +=n[i];    
                        var part2 = n[n.length-1];
                        if(part1.length>0){
                        var packing =format( "##,##.####", part1) + "," + part2
                        }else{
                        var packing =format( "##,##.####", part1) + "" + part2
                        }
                $('#pf').val(packing);
            }
            if (ite_per == null || ite_per == "")
            {
                Total1 = Total;
            }   
            else
            {
                var Total1 = [parseFloat(Total)* parseFloat(ite_per)]/100+parseFloat(Total);
                var inspection_testing = Total1 - Total;
                 var inspection=parseFloat(inspection_testing).toFixed(2);
                        var FullData = format( "#,##0.00####", inspection);
                        var n=FullData.split(",");
                        var part1 ="";
                        for(i=0;i<n.length-1;i++)
                        part1 +=n[i];    
                        var part2 = n[n.length-1];
                        if(part1.length>0){
                        var inspection =format( "##,##.####", part1) + "," + part2
                        }else{
                        var inspection =format( "##,##.####", part1) + "" + part2
                        }
                $('#ite').val(inspection);
            }
            if (ot_per == null || ot_per == "")
            {
               Total2 = Total1;
            }   
            else
            {
                var Total2 = [parseFloat(Total1) * parseFloat(ot_per)]/100 + parseFloat(Total1);
                var other = Total2 - Total1;
                var other_fixed=parseFloat(other).toFixed(2);
                        var FullData = format( "#,##0.00####", other_fixed);
                        var n=FullData.split(",");
                        var part1 ="";
                        for(i=0;i<n.length-1;i++)
                        part1 +=n[i];    
                        var part2 = n[n.length-1];
                        if(part1.length>0){
                        var other_fixed =format( "##,##.####", part1) + "," + part2
                        }else{
                        var other_fixed =format( "##,##.####", part1) + "" + part2
                        }
                $('#ot').val(other_fixed);
            }
            if (ed_per == null ||ed_per == "")
            {
                Total3 = Total2;
            }
            else
            {
                var Total3= [parseFloat(Total2) * parseFloat(ed_per)]/100  + parseFloat(Total2);
                var excise = Total3 - Total2;
                  var excise_fixed=parseFloat(excise).toFixed(2);
                        var FullData = format( "#,##0.00####", excise_fixed);
                        var n=FullData.split(",");
                        var part1 ="";
                        for(i=0;i<n.length-1;i++)
                        part1 +=n[i];    
                        var part2 = n[n.length-1];
                        if(part1.length>0){
                        var excise_fixed =format( "##,##.####", part1) + "," + part2
                        }else{
                        var excise_fixed =format( "##,##.####", part1) + "" + part2
                        }
                $('#ed').val(excise_fixed);
            }
            if (cs_per == null ||cs_per == "")
            {
               Total4 = Total3;
            }
            else
            {
                var Total4= [parseFloat(Total3) * parseFloat(cs_per)]/100  + parseFloat(Total3);
                var cst = Total4 - Total3;
                var cst_fixed=parseFloat(cst).toFixed(2);
                        var FullData = format( "#,##0.00####", cst_fixed);
                        var n=FullData.split(",");
                        var part1 ="";
                        for(i=0;i<n.length-1;i++)
                        part1 +=n[i];    
                        var part2 = n[n.length-1];
                        if(part1.length>0){
                        var cst_fixed =format( "##,##.####", part1) + "," + part2
                        }else{
                        var cst_fixed =format( "##,##.####", part1) + "" + part2
                        }
                $('#cs').val(cst_fixed);
            }
            if (vt_per == null ||vt_per == "")
            {
                Total5 = Total4;
            }
            else
            {
                var Total5= [parseFloat(Total4) * parseFloat(vt_per)]/100  + parseFloat(Total4);
                var vat = Total5 - Total4;
                var vt_fixed=parseFloat(vat).toFixed(2);
                        var FullData = format( "#,##0.00####", vt_fixed);
                        var n=FullData.split(",");
                        var part1 ="";
                        for(i=0;i<n.length-1;i++)
                        part1 +=n[i];    
                        var part2 = n[n.length-1];
                        if(part1.length>0){
                        var vt_fixed =format( "##,##.####", part1) + "," + part2
                        }else{
                        var vt_fixed =format( "##,##.####", part1) + "" + part2
                        }
                $('#vt').val(vt_fixed);
            }
            
            var total_fixed=parseFloat(Total5).toFixed(2);
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
                       
                        $('#grand').val(total);
                         convertNumberToWords(total);
        }
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
    <script>
        $('#tax_btn').on('click', function(){
        $('.wrap, a').toggleClass('active');
        return false;
        });
    </script>
    <script type="text/javascript">
    $('#grn_no').change(function () {
        var grn_no = $('#grn_no').val();
        window.location.href = "<?php echo base_url('index.php/users/inv/'); ?>/"+grn_no;
    });
    </script>
</html>