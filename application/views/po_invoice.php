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
        
             autocomplete();
             work_order(); 
             var x = parseInt(document.getElementById("order_no").value);
             var number= x+1;
             var new_order = number >= 10 ? number : "0"+number.toString()
             var po_num = 'PO/2016-17/REY/'+new_order
             $('.new_order').val(new_order);
             $('.order_num').val(po_num);
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
            <input type="hidden" id="order_no" name="order_no" >
                <hr>
                    <form action="<?= base_url('index.php/users/save_po') ?>" method ="post">
                         <input type="hidden" class="new_order" name="order_no"/>
                    <div style="width: 100%;">
                        <div style="float:left; width: 60%">
                           
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
                                <tr><th>Date</th><td>:<input name='date' title="Select Date" type="text" id="datepicker" Required="required" tabindex="2" placeholder="dd-mm-yy" style="background:#F5F5DC"/> </td></tr>
                                
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
                        <td><textarea name='quantity[]' class="quantity_no" tabindex="12" cols="1" style="background:#F5F5DC" >1</textarea>
                            <textarea name='weight[]'  class="quantity" cols="10"  tabindex="13" style="text-align:center" placeholder="Quantity" ></textarea></td>
                        <td><textarea name='unit[]' cols="6" id="uom" class="uom"></textarea></td>
                        <td><textarea name='work_order[]' class="work_order" tabindex="14" style="background:#F5F5DC text-align:center;background:#F5F5DC" title="Work Order No."></textarea></td>
                        <td><textarea name='rate[]' class="rate" placeholder="Rate/Unit"tabindex="15" style="background:#F5F5DC"></textarea></td>
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
                        <td colspan="7"><textarea cols='150'></textarea><input type='hidden' name='status' value='Pending'/></td>
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
                    <li><a class="btn-floating orange darken-1" data-placement="bottom" title="View Invoice List" href="<?php echo base_url();?>index.php/users/view_purchase_invoice"><i class="glyphicon glyphicon-eye-open"></i></a></li>
                    <li><a class="btn-floating green"  data-placement="bottom" title="Create New Invoice!"><i class="glyphicon glyphicon-file"></i></a></li>
                    <li><button type="submit" name = "submit" class="btn-floating blue" data-placement="bottom" title="Save"><span class="glyphicon glyphicon-floppy-save"></span></button></li>
                    <li><a class="btn-floating grey"  data-placement="bottom" title="Go Back!"  href="javascript:window.history.go(-1);"><i class="glyphicon glyphicon-arrow-left"></i></a></li>    
                </ul>
            </div>
              </form>
                  
                <center>Note:Please Quote the above Purchase Order Number on all your Challens, Bills & Correspondence</center>
               
      </body>    
    <script type="text/javascript">
    $('#grn_no').change(function () {
        var grn_no = $('#grn_no').val();
        window.location.href = "<?php echo base_url('index.php/users/inv/'); ?>/"+grn_no;
    });
    </script>
</html>