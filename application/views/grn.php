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
    
    <script>
        $(function() {
            $( "#datepicker" ).datepicker({ dateFormat: 'dd-mm-yy' });
            $( "#datepicker1" ).datepicker({ dateFormat: 'dd-mm-yy' });
            $( "#datepicker2" ).datepicker({ dateFormat: 'dd-mm-yy' });
        });
        </script>
    <body>
       	<div class="container">
            <div align='right'>QSR 064/1</div>
            <div style="width: 100%;">
                <img  src="<?php echo base_url();?>assets/images/header3.jpg" alt="logo" width='100%' height='125' />
            </div>
            <hr>
                 Ver <?= $count->po_count ?>
                <form action="<?= base_url('index.php/users/save_grn') ?>" method ="post">
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
                                    <tr><th>Order No.</th><td>:<select name="po_no_year"><option>PO/2015-16/REY/</option></select><input type="hidden" value="<?= $r->order_no ?>" name="po_no">
                                       <input list="browsers"  placeholder="<?= $r->order_no ?>" style="background:#F5F5DC" size="10"  id="po_no"/><a href="<?= base_url('index.php/users/print_po/'.$r->order_no); ?>" class="glyphicon glyphicon glyphicon-eye-open" target="blank" title="View PO"></a>
                                      <datalist id="browsers">
                                        <?php
                                            $data  = $this->db->query("SELECT * FROM purchase_order");
                                                foreach($data->result() as $row){ ?>
                                                <option value="<?= $row->order_no ?>"><?= $row->order_no ?></option>
                                        <?php } ?>
                                      </datalist></td></tr>
                                <tr><th>Date</th><td>:<input type="text"  name='grn_date' id="datepicker1" Required="required" placeholder="dd-mm-yy" style="background:#F5F5DC"/></td></tr>
                                <tr><th>Dc No.</th><td>:<input type="text"  name='dc_no' placeholder="Enter Dc No." style="background:#F5F5DC"/></td></tr>
                                <tr><th>Dc Date</th><td>:<input type="text"  name='dc_date' id="datepicker2" placeholder="dd-mm-yy" style="background:#F5F5DC"/></td></tr>
                                  
                            </table>
                        </div>
                        
                    </div>
                    <div style="clear:both"></div>
                    <hr>  
                    <div class="table-responsive">
                         <?php if($count->po_count=='0')
                            { ?>
                    <table class="table table-condensed">
                    <tr align="center">
                        <th >Si No.</th>
                        <th align="center">Description</th>
                        <th align="center" colspan="2">Quantity</th>
                        <th align="center">Unit</th>
                        <th align="center">Work Order</th>
                        <th align="center"colspan="2">Received Qty.</th>
                        <th align="center" colspan="2">Pending Qty.</th>
                    </tr>
                        <?php
                           
                                $data  = $this->db->query("SELECT * FROM po_detail WHERE order_no='{$r->order_no}'");
                           
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
                        <td align="center"><input type="text" name="qty_rec[]" value="<?= $row->quantity ?>" size="8" style="background:#F5F5DC" class="qty_rec"></td>
                         <td align="center"><input type="hidden" name="wt_rec[]" value="-" class="wt_rec" size="8">-</td>
                        <?php }else{ ?>
                        <td align="center"><input type="text" name="qty_rec[]" value="<?= $row->quantity ?>" class="qty_rec" style="background:#F5F5DC" size="8"></td>
                        <td align="center"><input type="text" name="wt_rec[]" value="<?= $row->weight ?>" class="wt_rec" size="8"></td>
                        <?php } ?>
                        <?php if($row->weight==$row->quantity){ ?>
                        <td align="center"><input type="text" size="8"  name="qty_pen[]" class="qty_pen" value="0"> <input type="hidden" class="value" name="price[]"></td>
                         <td align="center"><input type="hidden" name="wt_pen[]" class="wt_pen" size="8" value="-">-</td>
                        <?php }else{ ?>
                        <td align="center"><input type="text"  name="qty_pen[]" class="qty_pen" value="0" size="8"><input type="hidden" class="value" name="price[]"></td>
                        <td align="center"><input type="text" name="wt_pen[]" class="wt_pen" size="8" value="0"></td>
                        <?php } ?>
                    </tr>
                            <?php }  ?> 
                    </table>    
                            <?php }else { ?>
                        <table class="table table-condensed">
                    <tr align="center">
                        <th >Si No.</th>
                        <th align="center">Description</th>
                        <th align="center" colspan="2">Quantity</th>
                        <th align="center">Unit</th>
                        <th align="center">Work Order</th>
                        <th align="center"colspan="2">Received Qty.</th>
                        <th align="center" colspan="2">Pending Qty.</th>
                    </tr>
                        <?php
                           
                                $data  = $this->db->query("SELECT * FROM grn_detail WHERE grn_id='{$grn->grn_id}' AND qty_pen>='1'");
                                
                        foreach($data->result() as $row){ ?>
                    <tr class="item-row">
                        <td align="center">
                         .
                        </td>
                        <td><input type="hidden" name="des[]" value="<?= $row->description ?>"><input type="hidden" name="rate[]" value="<?= $row->rate ?>" class="rate"><input type="hidden" name="pid[]" value="<?= $row->pid ?>"><input type="hidden" name="category[]" value="<?= $row->category ?>"><input type="hidden" name="grade[]" value="<?= $row->grade ?>"><input type="hidden" name="moc[]" value="<?= $row->moc ?>"><?= $row->description ?><br><?= $row->length ?><input type="hidden" name="length[]" value="<?= $row->length ?>"><input type="hidden" name="length_uom[]" value="<?= $row->length_uom ?>"><?= $row->length_uom ?><?= $row->width ?><input type="hidden" name="width[]" value="<?= $row->width ?>"> <?= $row->width_uom ?><input type="hidden" name="width_uom[]" value="<?= $row->width_uom ?>"><?= $row->length_meter ?><input type="hidden" name="length_meter[]" value="<?= $row->length_meter ?>"><?= $row->length_mtr_uom ?><input type="hidden" name="length_mtr_uom[]" value="<?= $row->length_mtr_uom ?>"><input type="hidden" name="thickness[]" value="<?= $row->thickness ?>"><input type="hidden" name="length_mtr_uom[]" value="<?= $row->length_mtr_uom ?>"></td>
                        <?php if($row->weight==$row->quantity){ ?>
                        <td align="center"><?= $row->qty_pen ?><input type="hidden" name="quantity[]" value="<?= $row->qty_pen ?>" class="qty"></td>
                        <td align="center">-</td>
                        <?php }else{ ?>
                        <td><?= $row->qty_pen ?> Nos.<input type="hidden"  name="quantity[]" value="<?= $row->qty_pen ?>" class="qty"></td>
                        <td><?= $row->wt_pen ?><input type="hidden" name="weight[]" value="<?= $row->wt_pen ?>" class="wt"></td>
                        <?php } ?>
                        <td  align="center"><?= $row->unit ?><input type="hidden" name="unit[]" value="<?= $row->unit ?>" class="uom"></td>
                        <td  align="center"><?= $row->work_order ?><input type="hidden" name="work_order[]" value="<?= $row->work_order ?>"></td>
                         <?php if($row->weight==$row->quantity){ ?>
                        <td align="center"><input type="text" name="qty_rec[]" value="<?= $row->qty_pen ?>" size="8" style="background:#F5F5DC" class="qty_rec"></td>
                         <td align="center">-</td>
                        <?php }else{ ?>
                        <td align="center"><input type="text" name="qty_rec[]" value="<?= $row->qty_pen ?>" class="qty_rec" style="background:#F5F5DC" size="8"></td>
                        <td align="center"><input type="text" name="wt_rec[]" value="<?= $row->wt_pen ?>" class="wt_rec" size="8"></td>
                        <?php } ?>
                        <?php if($row->weight==$row->quantity){ ?>
                        <td align="center"><input type="text" size="8"  name="qty_pen[]" class="qty_pen" value="0"> <input type="hidden" class="value" name="price[]"></td>
                         <td align="center">-</td>
                        <?php }else{ ?>
                        <td align="center"><input type="text"  name="qty_pen[]" class="qty_pen" value="0" size="8"></td>
                        <td align="center"><input type="text" name="wt_pen[]" class="wt_pen" size="8" value="0"><input type="hidden" class="value" name="price[]"></td>
                        <?php } ?>
                    </tr>
                            <?php }  ?> 
                    </table>
                            <?php } ?>
                        <input type='hidden' name='total_amount' class='total_amt' />
                </div>    
                <div class="fixed-action-btn vertical" style="bottom: 45px; right: 24px;">
                <a class="btn-floating btn-large red"  href="<?php echo base_url();?>index.php/users">
                    <i id="pluse_ic" class="glyphicon glyphicon-plus"></i>
                    <i class="glyphicon glyphicon-home"></i>
                </a>
                <ul>
                    
                   <li><a class="btn-floating orange darken-1" data-placement="bottom" title="View GRN List" href="<?php echo base_url();?>index.php/users/view_grn"><i class="glyphicon glyphicon-eye-open"></i></a></li>
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
    
        <style>
            .payment th, .payment td 
            {
                border: 0px !important;
                padding:0;
            }
        </style>
        <script>
            $('.qty_rec').keyup(function(){
                total_rec_qty()
            });
             $(document).ready(function () {
               total_rec_qty()
            });
          function total_rec_qty(){
                total=0;
            $('.item-row').each(function() {
            qty = $(this).find('.qty').val();
            wt = $(this).find('.wt').val();
            unit = $(this).find('.uom').val();
            qty_rec = $(this).find('.qty_rec').val();
            rate = $(this).find('.rate').val();
           if(unit=='Kgs.' || unit == 'Mtr.')
            {
                avg_qty = wt/qty;
                received_qty= (avg_qty*qty_rec).toFixed(3);
                $(this).find('.wt_rec').val(received_qty);
                price = received_qty * rate;
                price_fix = price.toFixed(2);
                $(this).find('.value').val(price_fix);
                pending = qty - qty_rec;
                pending_wt=(pending * avg_qty).toFixed(3);
                $(this).find('.qty_pen').val(pending);
                $(this).find('.wt_pen').val(pending_wt);
            }else{
                pending_qty= (qty - qty_rec);
                $(this).find('.qty_pen').val(pending_qty);
                price = qty_rec * rate;
                price_fix = price.toFixed(2);
                $(this).find('.value').val(price_fix);
            }   
             total=total+price;
             total_fix = total.toFixed(2);
            });
             $('.total_amt').val(total_fix);
        }
    </script>
    <script type="text/javascript">
    $('#po_no').change(function () {
        var po_no = $('#po_no').val();
        window.location.href = "<?php echo base_url('index.php/users/add_order_rec/'); ?>/"+po_no;
        });
  
         
    </script>
</html>