<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />

    </head>
    <body>
       	<div class="container">
           <div align='right'>QSR 064/1</div>
           <div style="width: 100%;">
                <img  src="<?php echo base_url();?>assets/images/header3.jpg" alt="logo" width='100%' height='125' />
            </div>
             
            <hr>
                <p align='center'><b>Purchase Order</b></p>
             <hr>
                <form >
                    <div style="width: 100%;">
                        <div style="float:left; width: 50%">
                            <b><?= $r->supplier_name ?><br></b>
                            <b><?= $r->address ?>:<br></b>
                            <?= $r->address1 ?><br>
                            <?= $r->address2 ?><br>
                            <?= $r->city ?><br>
                            <?= $r->state ?> <?= $r->pin ?><br>
                            <?= $r->phone ?><br>
                            <?= $r->email ?>
                        </div>
                        <div style="float:right;width: 40%">
                            <table class='payment'>
                                <tr><th align='left'>Order No.</th><td>: PO/2016-17/REY/<?= $r->order_no ?></td></tr>
                                <tr><th align='left'>Date</th><td>: <?= $r->date ?></td></tr>
                                <tr><th align='left'>Your Qtn. Ref.</th><td>: <?= $r->qtn_ref ?></td></tr>
                                <tr><th align='left'>Qtn. Date</th><td>: Nil</td></tr>
                                <tr><th align='left'>Delivery Date</th><td>: <?= $r->delivery_date ?></td></tr>
                                <tr><th align='left'>P&F</th><td>: <?= $r->pf ?></td></tr>
                                <tr><th align='left'>Taxes</th><td>: <?= $r->taxes ?></td></tr>
                            </table>
                        </div>
                        
                    </div>
                    <div style="clear:both"></div>
                    <p>Dear Sir's,</p>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; We are pleased to place an order for the following material on terms & condition given
                    above to be delivered at our plant unless otherwise stated.        
                    <table id="items">
                    <tr>
                        <th width="1">Si No.</th>
                        <th >Description</th>
                        <th colspan="2">Quantity</th>
                        <th>Unit</th>
                        <th>Rate</th>
                        <th width="2">Price</th>
                    </tr>
                        <?php
                         $sino='1';
                                $data  = $this->db->query("SELECT * FROM po_detail WHERE order_no='{$r->order_no}'");
                                foreach($data->result() as $row){  ?>
                    <tr>
                         
                        <td align="center">
                         <?php echo $sino; ?>.
                        </td>
                        <td><?= $row->description ?><br><?= $row->length ?> <?= $row->length_uom ?> <?= $row->width ?> <?= $row->width_uom ?><?= $row->length_meter ?> <?= $row->length_mtr_uom ?></td>
                        <?php if($row->weight==$row->quantity) { ?>
                        <td align="center"><?= $row->quantity ?></td><td align="center">-</td>
                        <?php }else{ ?>
                        <td><?= $row->quantity ?> Nos.</td><td><?= $row->weight ?></td>
                        
                        <?php } ?>
                        <td align="center"><?= $row->unit ?></td>
                        <td align="center"><?= $row->rate ?></td>
                        <td align="right"><?= $row->price ?></td>
                    </tr>
                        <?php 
                        $sino++;} 
                        ?> 
                    <tr>
                        <td colspan="2"></td>
                        <td colspan="4" class="total-line">Total</td> 
                        <td class='total-line' ><?= $r->total ?></td> 
                    </tr>
                    <tr>
                        <td colspan="2" class="blank"><?= $r->narration ?></td>
                        <td colspan="4" class="total-line"><?php if($r->pf_per) {?>Packing Forwarding  <?= $r->pf_per ?>%<?php } ?><br><?php if($r->ite_per) {?>Inspection & Testing <?= $r->ite_per ?>%<?php } ?><br><?php if($r->ot_per) {?> Other <?= $r->ot_per ?>%<?php } ?><br><?php if($r->ed_per) {?> Excise Duty <?= $r->ed_per ?>%<?php } ?><br><?php if($r->cs_per) {?> CST <?= $r->cs_per ?>%<?php } ?><br><?php if($r->vt_per) {?> Vat <?= $r->vt_per ?>%<?php } ?><br></td>
                        <td align="right"><?= $r->packing_forwarding ?><br><?= $r->inspection_testing ?><br><?= $r->other_tax ?><br><?= $r->excise_duty ?><br><?= $r->cst_tax ?><br><?= $r->vat_tax ?> <br></td>
                    </tr>
                    <tr>
                        <td colspan="2" class="blank"> </td>
                        <td colspan="4" class="total-line balance">Grand Total</td>
                        <td class='total-line'><?= $r->grand_total ?></td>
                    </tr>
                        <tr>
                        <th  colspan="7" align='left'><?= $r->amt_word ?></th>
                      
                    </tr>
                    
                </table>    
                <div style="width: 100%;">
                    <div style="float:left; width: 60%">
                        <table class='payment'>
                        <tr><th align='left'>Payment Terms </th><td>: <?= $r->payment_term ?></td></tr>
                        <tr><th align='left'>Transporter</th><td>: <?= $r->transporter ?></td></tr>
                        <tr><th align='left'>Range</th><td>: "C" Registration Certificate No. AACCR3096GXM001</td></tr>
                        <tr><th align='left'>Excise No.</th><td>: AACCR3096GXM001</td></tr>
                        <tr><th align='left'>Cst No.</th><td>: 5016086-2 w.e.f. 01/04/1983</td></tr>
                        <tr><th align='left'>Tin No.</th><td>: 29170038961</td></tr>
                        <tr><th align='left'>Cin No.</th><td>: U74210MH2001PTC31466</td></tr>
                        </table>
                    </div>
                <div style="float:right;">
                    <div align="right"><br>
                    For Reynolds Chemequip Pvt. Ltd <br><br>
                    Authorised Signature
                    </div>
                    <!-- Signature PAD -->
                    <div id="logo">
                       <img id="image" src="<?php echo base_url();?>assets/images/sg1.png" alt="logo" width='200' height='100' />
                      <img id="image" src="<?php echo base_url();?>assets/images/seal.png" alt="logo" width='100' height='100' />
                    </div>
                </div>
            </div>
            <div class="fixed-action-btn vertical" style="bottom: 45px; right: 24px;">
                <a class="btn-floating btn-large red">
                    <i class="glyphicon glyphicon-plus"></i>
                </a>
                <ul>
                    <li><a class="btn-floating red"  href="<?php echo base_url();?>index.php/users"><i class="glyphicon glyphicon-home"></i></a></li>
                    <li><a class="btn-floating yellow darken-1"  href="<?php echo base_url();?>index.php/users/view_po"><i class="glyphicon glyphicon-search"></i></a></li>
                    <li><a class="btn-floating blue"  href="<?php echo base_url();?>index.php/users/Innvoice_pdf"><i class="glyphicon glyphicon-ok"></i></a></li>
                        
                </ul>
                           
            </div>
            </form>
            <div style="clear:both"></div>
                <p align='center'>Note:Please qoute the above Purchase Order number on all your Challens, Bills & Correspondence.</p>
            </body>
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

</html>