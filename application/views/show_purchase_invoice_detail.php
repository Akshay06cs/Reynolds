<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
    <title>Purchase Invoice</title>
    <!-- <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">  -->
    <link rel='stylesheet' type='text/css' href="<?php echo base_url("assets/css/style1.css");?>" />
    <link rel='stylesheet' type='text/css' href="<?php echo base_url("assets/css/print.css");?>" />
    <link rel='stylesheet' type='text/css' href="<?php echo base_url("assets/css/bootstrap.min.css");?>" />
    <script type='text/javascript' src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
    <script type='text/javascript' src="<?php echo base_url("assets/js/jquery-1.4.4.min.js");?>"></script>
    <script type='text/javascript' src="<?php echo base_url(); ?>assets/js/jquery-1.11.3.min.js"></script>
    <script type='text/javascript' src="<?php echo base_url(); ?>assets/js/jquery-ui.js"></script>
    <!-- Floating Button -->
    <link rel='stylesheet' type='text/css' href="<?php echo base_url("assets/css/font-awesome.min.css");?>" />
    <script type='text/javascript' src="<?php echo base_url(); ?>assets/js/materialize.js"></script> 
    <link rel='stylesheet' type='text/css' href="<?php echo base_url("assets/css/materialize.css");?>" />
    <!-- Date Picker Plugins -->
    <link rel='stylesheet' type='text/css' href="<?php echo base_url("assets/css/jquery-ui.css");?>" />
    </head>
    <body>
       	<div class="container">
             <div align='right'>QSR 064/1</div>
           <div style="width: 100%;">
                <img  src="<?php echo base_url();?>assets/images/header3.jpg" alt="logo" width='100%' height='125' />
            </div>
                <hr>
                <form >
                    <div style="width: 100%;">
                        <div style="float:left; width: 60%">
                            <b><?= $r->supplier_name ?><br></b>
                            <b><?= $r->address ?>:<br></b>
                            <?= $r->address1 ?><br>
                            <?= $r->address2 ?><br>
                            <?= $r->city ?><br>
                            <?= $r->state ?><br>   
                            <?= $r->pin ?><br>      
                            <?= $r->phone ?><br>
                            <?= $r->email ?>
                        </div>
                        <div style="float:right;width: 40%">
                            <table class='payment'>
                                <tr><th>Order No.</th><td>: PO/2016-17/REY/<?= $r->invoice_no ?></td></tr>
                                <tr><th>Date</th><td>: <?= $r->date ?></td></tr>
                                <tr><th>GRN No.</th><td>: <?= $r->grn_no ?></td></tr>
                                <tr><th>Inv No.</th><td>: <?= $r->inv_no ?></td></tr>
                                <tr><th>Inv Date</th><td>: <?= $r->inv_date ?></td></tr>
                            </table>
                        </div>
                    </div>
                    <div style="clear:both"></div>
                    <hr>  
                    <p>Dear Sir's,</p>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; We are pleased to place an order for the following material on terms & condition given
                    above to be delivered at our plant unless otherwise stated.       
                    <hr>
                    <div class="table-responsive">
                    <table id="items">
                    <tr>
                        <th>Si No.</th>
                        <th>Description</th>
                        <th>Quantity</th>
                        <th>Unit</th>
                        <th>Rate</th>
                        <th>Price</th>
                    </tr>
                        <?php
                            $data  = $this->db->query("SELECT * FROM invoice_detail WHERE invoice_no='{$r->invoice_no}'");
                            foreach($data->result() as $row){ ?>
                    <tr class="item-row">
                         
                        <td align="center">
                         .
                        </td>
                        <td><?= $row->description ?><br><?= $row->length ?> <?= $row->length_uom ?> <?= $row->width ?> <?= $row->width_uom ?><?= $row->length_meter ?> <?= $row->length_mtr_uom ?></td>
                        <?php if($row->weight==$row->quantity){ ?>
                        <td align="center"><?= $row->quantity ?></td>
                        <?php }else{ ?>
                        <td><?= $row->quantity ?>&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?= $row->weight ?></td>
                      
                        <?php } ?>
                        <td  align="center"><?= $row->unit ?></td>
                        <td align="center"><?= $row->rate ?></td>
                        <td align="right"><?= $row->price ?></td>
                    </tr>
                        <?php } ?> 
                    <tr>
                        <td colspan="3"></td>
                        <td colspan="2" class="total-line">Total</td> 
                        <td class='total-line' ><?= $r->total ?></td> 
                    </tr>
                    <tr>
                        <td colspan="3" class="blank"><?= $r->narration ?></td>
                         <td colspan="2" class="total-line"><?php if($r->pf_per) {?>Packing Forwarding  <?= $r->pf_per ?>%<?php } ?><br><?php if($r->ite_per) {?>Inspection & Testing <?= $r->ite_per ?>%<?php } ?><br><?php if($r->ot_per) {?> Other <?= $r->ot_per ?>%<?php } ?><br><?php if($r->ed_per) {?> Excise Duty <?= $r->ed_per ?>%<?php } ?><br><?php if($r->cs_per) {?> CST <?= $r->cs_per ?>%<?php } ?><br><?php if($r->vt_per) {?> Vat <?= $r->vt_per ?>%<?php } ?><br><?php if($r->fright_charge) {?> Fright<?php } ?><br></td>
                        <td align="right"><?= $r->packing_forwarding ?><br><?= $r->inspection_testing ?><br><?= $r->other_tax ?><br><?= $r->excise_duty ?><br><?= $r->cst_tax ?><br><?= $r->vat_tax ?> <br><?= $r->fright_charge ?> <br></td>
                    </tr>
                    <tr>
                        <td colspan="3" class="blank"> </td>
                        <td colspan="2" class="total-line balance">Grand Total</td>
                        <td class='total-line'><?= $r->grand_total ?></td>
                    </tr>
                    <tr>
                        <td colspan="6"><textarea cols='120' placeholder="Amount In Words" style="font-weight: bold" readonly><?= $r->amt_word ?></textarea></td>
                    </tr>
                    </table>    
                </div>    
                <div style="width: 100%;">
                    <div style="float:left; width: 50%">
                        <table class='payment'>
                        <tr><th align='left'>Range</th><td>: "C" Registration Certificate No. AACCR3096GXM001</td></tr>
                        <tr><th align='left'>Excise No.</th><td>: AACCR3096GXM001</td></tr>
                        <tr><th align='left'>Cst No.</th><td>: 5016086-2 w.e.f. 01/04/1983</td></tr>
                        <tr><th align='left'>Tin No.</th><td>: 29170038961</td></tr>
                        <tr><th align='left'>Cin No.</th><td>: U74210MH2001PTC31466</td></tr>
                        </table>
                    </div>
                <div style="float:right;">
                  
                    <br>
                    <div align="right">
                    For Reynolds Chemequip Pvt. Ltd. <br><br>
                    Authorised Signature
                    </div>
                    <!-- Signature PAD -->
                    <div id="logo">
                         
                        <img id="image" src="<?php echo base_url();?>assets/images/sg1.png" alt="logo" width='200' height='100' />
                    </div>
                </div>
            </div>
            <div class="fixed-action-btn vertical" style="bottom: 45px; right: 24px;">
                <a class="btn-floating btn-large red"  href="<?php echo base_url();?>index.php/users">
                    <i id="pluse_ic" class="glyphicon glyphicon-plus"></i>
                    <i class="glyphicon glyphicon-home"></i>
                </a>
                <ul>
                    <li><a class="btn-floating orange darken-1" data-placement="bottom" title="View Invoice List" href="<?php echo base_url();?>index.php/users/view_purchase_invoice"><i class="glyphicon glyphicon-eye-open"></i></a></li>
                     <li><a class="btn-floating grey"  data-placement="bottom" title="Go Back!"  href="javascript:window.history.go(-1);"><i class="glyphicon glyphicon-arrow-left"></i></a></li>    
                </ul>
                           
            </div>
            </form>
            <div style="clear:both"></div>
                <center>Note:Please qoute the above Purchase Order number on all your Challens, Bills & Correspondence.</center>
                <script>
                $('.fixed-action-btn').hover(function(){
                $('#pluse_ic').toggle();
                });
                </script>
             
        <style>

.payment th, .payment td {
    border: 0px !important;
    padding:0;
}

    </style>
</html>