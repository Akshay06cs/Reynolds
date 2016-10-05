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
                <form action="<?= base_url('index.php/users/stock_data') ?>" method ="post">
                    <div style="width: 100%;">
                        <div style="float:left; width: 60%">
                            <table>
                            <input type="text" name='supplier_name' id='supplier' value="<?= $r->supplier_name ?>" size="45" readonly/><br>
                            <input type="text" name='address1' id="address1"  value="<?= $r->address1 ?>" size="45" readonly><br>
                            <input type="text" name='address2' id="address2"  value="<?= $r->address2 ?>" size="45" readonly><br>
                            <input type="text" name='city'id="city"   value="<?= $r->city ?>" size="45" readonly><br>
                            <input type="text" name='state' id="state"   value="<?= $r->state ?>" size="45" readonly ><br>
                            Pin:&nbsp;<input name='pin' id='pin'  size="45" value="<?= $r->pin ?>" readonly><br>
                            <input type="text" name='phone' id='ph'  value="<?= $r->phone ?>" size="45" readonly><br>
                            <input type="text" name='email' id='email'  value="<?= $r->email ?>" size="45" readonly>
                                
                            </table>
                        </div>
                        <div style="float:right;width: 40%">
                            <table class='payment'>
                                    <tr><th>GRN No.</th><td>:<?= $r->grn_id ?></td></tr><input type = 'hidden' name='grn_id' value='<?= $r->grn_id ?>'>
                                    <tr><th>Order No.</th><td>:PO/2015-16/REY/<?= $r->po_no ?></td></tr>
                                    <tr><th>GRN Date</th><td>:<input type=""  name='grn_date' id="datepicker1" Required="required" value="<?= $r->grn_date ?>" readonly/></td></tr>
                                    <tr><th>Dc No.</th><td>:<?= $r->dc_no ?></td></tr>
                                    <tr><th>Dc Date</th><td>:<?= $r->dc_date ?></td></tr> 
                            </table>
                        </div>
                        
                    </div>
                    <div style="clear:both"></div>
                    <hr>    
                    <div class="table-responsive">
                        <table class="table table-condensed">
                    <tr align="center">
                        <th >Si No.</th>
                        <th align="center">Description</th>
                        <th align="center" colspan="2">Quantity</th>
                        <th align="center">Unit</th>
                        <th align="center">Work Order</th>
                        <th align="center" colspan="2">Received Qty.</th>
                        <th align="center" colspan="2">Pending Qty.</th>
                    </tr>
                        <?php
                           
                                $data  = $this->db->query("SELECT * FROM grn_detail WHERE grn_id='{$r->grn_id}'");
                           
                        foreach($data->result() as $row){ ?>
                    <tr class="item-row">
                      
                        <td align="center">
                         .
                        </td>
                        <td><input type="hidden" name="des[]" value="<?= $row->description ?>"><input type="hidden" name="rate[]" value="<?= $row->rate ?>" class="rate" ><input type="hidden" name="pid[]" value="<?= $row->pid ?>"><input type="hidden" name="category[]" value="<?= $row->category ?>"><input type="hidden" name="grade[]" value="<?= $row->grade ?>"><input type="hidden" name="moc[]" value="<?= $row->moc ?>"><?= $row->description ?><br><?= $row->length ?><input type="hidden" name="length[]" value="<?= $row->length ?>"><input type="hidden" name="length_uom[]" value="<?= $row->length_uom ?>"><?= $row->length_uom ?><?= $row->width ?><input type="hidden" name="width[]" value="<?= $row->width ?>"> <?= $row->width_uom ?><input type="hidden" name="width_uom[]" value="<?= $row->width_uom ?>"><?= $row->length_meter ?><input type="hidden" name="length_meter[]" value="<?= $row->length_meter ?>"><?= $row->length_mtr_uom ?><input type="hidden" name="length_mtr_uom[]" value="<?= $row->length_mtr_uom ?>"><input type="hidden" name="thickness[]" value="<?= $row->thickness ?>"><input type="hidden" name="length_mtr_uom[]" value="<?= $row->length_mtr_uom ?>"></td>
                        <?php if($row->weight==$row->quantity){ ?>
                        <td align="center"><?= $row->quantity ?><input type="hidden" name="quantity[]" value="<?= $row->quantity ?>" class="qty"></td>
                        <td align="center"><input type="hidden" name="weight[]" value="-" class="wt">-</td>
                        <?php }else{ ?>
                        <td><?= $row->quantity ?> Nos.<input type="hidden"  name="quantity[]" value="<?= $row->quantity ?>" class="qty"></td>
                        <td><?= $row->weight ?><input type="hidden" name="weight[]" value="<?= $row->weight ?>" class="wt"></td>
                        <?php } ?>
                        <td  align="center"><?= $row->unit ?><input type="hidden" name="unit[]" value="<?= $row->unit ?>" class="uom"></td>
                        <td  align="center"><?= $row->work_order ?><input type="hidden" name="work_order[]" value="<?= $row->work_order ?>"></td>
                         <?php if($row->weight==$row->quantity){ ?>
                        <td align="center"><input type="text" name="qty_rec[]" value="<?= $row->qty_rec ?>" size="8" class="qty_rec"></td>
                         <td align="center"><input type="hidden" name="wt_rec[]" value="-" class="wt_rec" size="8">-</td>
                        <?php }else{ ?>
                        <td align="center"><input type="text" name="qty_rec[]" value="<?= $row->qty_rec ?>" class="qty_rec"  size="8" readonly></td>
                        <td align="center"><input type="text" name="wt_rec[]" value="<?= $row->wt_rec ?>" class="wt_rec" size="8" readonly></td>
                        <?php } ?>
                        <?php if($row->weight==$row->quantity){ ?>
                        <td align="center"><input type="text" size="8"  name="qty_pen[]" class="qty_pen"  value="<?= $row->qty_pen ?>" readonly></td>
                         <td align="center"><input type="hidden" name="wt_pen[]" class="wt_pen" size="8" value=-">-</td>
                        <?php }else{ ?>
                        <td align="center"><input type="text"  name="qty_pen[]" class="qty_pen" value="<?= $row->qty_pen ?>" size="8" readonly></td>
                        <td align="center"><input type="text" name="wt_pen[]" class="wt_pen" size="8" value="<?= $row->wt_pen ?>" readonly></td>
                        <?php } ?>
                    </tr>
                            <?php }  ?> 
                    </table>    
                         <input type='hidden' name='total_amount' class='total_amt' value="<?= $r->total_amount ?>"/>
                     </div>    
                <div class="fixed-action-btn vertical" style="bottom: 45px; right: 24px;">
                <a class="btn-floating btn-large red"  href="<?php echo base_url();?>index.php/users">
                    <i id="pluse_ic" class="glyphicon glyphicon-plus"></i>
                    <i class="glyphicon glyphicon-home"></i>
                </a>
                <ul>
                    <li><button type="submit" name = "submit" class="btn-floating blue" data-placement="bottom" title="Save"><span class="glyphicon glyphicon-save"></span></button></li>
                    <li><a class="btn-floating yellow darken-1"  href="<?php echo base_url();?>index.php/users/view_grn" title=""><i class="glyphicon glyphicon-search"></i></a></li>
                </ul>
                           
                </div>
            </form>
             <script>
                $('.fixed-action-btn').hover(function(){
                $('#pluse_ic').toggle();
                });
                </script>
            </body>
    
        <style>
            .payment th, .payment td 
            {
                border: 0px !important;
                padding:0;
            }
        </style>
       
</html>