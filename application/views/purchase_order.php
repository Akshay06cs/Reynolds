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
                                <tr><th>Order No.</th><td>: PO/2016-17/REY/<?= $r->order_no ?></td></tr>
                                <tr><th>Date</th><td>: <?= $r->date ?></td></tr>
                                <tr><th>Your Qtn. Ref.</th><td>: <?= $r->qtn_ref ?></td></tr>
                                <tr><th>Qtn. Date</th><td>: <?= $r->qtn_date ?></td></tr>
                                <tr><th>Delivery Date</th><td>: <?= $r->delivery_date ?></td></tr>
                                <tr><th>P&F</th><td>: <?= $r->pf ?></td></tr>
                                <tr><th>Taxes</th><td>: <?= $r->taxes ?></td></tr>
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
                            $data  = $this->db->query("SELECT * FROM po_detail WHERE order_no='{$r->order_no}'");
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
                         <td colspan="2" class="total-line"><?php if($r->pf_per) {?>Packing Forwarding  <?= $r->pf_per ?>%<?php } ?><br><?php if($r->ite_per) {?>Inspection & Testing <?= $r->ite_per ?>%<?php } ?><br><?php if($r->ot_per) {?> Other <?= $r->ot_per ?>%<?php } ?><br><?php if($r->ed_per) {?> Excise Duty <?= $r->ed_per ?>%<?php } ?><br><?php if($r->cs_per) {?> CST <?= $r->cs_per ?>%<?php } ?><br><?php if($r->vt_per) {?> Vat <?= $r->vt_per ?>%<?php } ?><br></td>
                        <td align="right"><?= $r->packing_forwarding ?><br><?= $r->inspection_testing ?><br><?= $r->other_tax ?><br><?= $r->excise_duty ?><br><?= $r->cst_tax ?><br><?= $r->vat_tax ?> <br></td>
                    </tr>
                    <tr>
                        <td colspan="3" class="blank"> </td>
                        <td colspan="2" class="total-line balance">Grand Total</td>
                        <td class='total-line'><?= $r->grand_total ?></td>
                    </tr>
                    <tr>
                        <td colspan="6"><textarea cols='150' placeholder="Amount In Words"><?= $r->amt_word ?></textarea></td>
                    </tr>
                    </table>    
                </div>    
                <div style="width: 100%;">
                    <div style="float:left; width: 50%">
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
                    <li><a class="btn-floating orange darken-1"  href="<?php echo base_url();?>index.php/users/view_po"><i class="glyphicon glyphicon-eye-open"></i></a></li>
                    <li><a class="btn-floating blue"  href="<?= base_url('index.php/users/Innvoice_pdf/'.$row->order_no); ?>"><i class="glyphicon glyphicon-ok"></i></a></li>
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
                <script type="text/javascript">
                        $('.quantity').keyup(function()
                        {
                            find_weight();
                        });
                        function find_weight()
                        {
                            $('.item-row').each(function() 
                            {
                                length = $(this).find('.length').val();
                                width =$(this).find('.width').val();
                                thickness=$(this).find('.thick').val();
                                density=$(this).find('.density').val();
                                quantity_no=$(this).find('.quantity_no').val();
                                lw=(length*width)/1000000;
                                result = lw*density*thickness;
                                weight= result.toFixed(2);
                                total_weight=weight*quantity_no;
                                $(this).find('.quantity').val(total_weight);
                            });
                        }
                        $('.price').keyup(function()
                        {
                            update_price();
                        });
                        // Total Price And Ruppee Conversion
                        function update_price() 
                        {
                            total=0;
                            $('.item-row').each(function() 
                            {
                                rate = $(this).find('.rate').val();
                                quantity =$(this).find('.quantity').val();
                                sum =rate * quantity;
                                total=total+sum;
                                sum=sum.toString();
                                var afterPoint = '';
                                if(sum.indexOf('.') > 0)
                                afterPoint = sum.substring(sum.indexOf('.'),sum.length);
                                sum = Math.floor(sum);
                                sum=sum.toString();
                                var lastThree = sum.substring(sum.length-3);
                                var otherNumbers = sum.substring(0,sum.length-3);
                                if(otherNumbers != '')
                                lastThree = ',' + lastThree;
                                var res = otherNumbers.replace(/\B(?=(\d{2})+(?!\d))/g, ",") + lastThree + afterPoint;
                                $(this).find('.price').val(res);
                            });
                            total=total.toString();
                            var afterPoint1 = '';
                            if(total.indexOf('.') > 0)
                            afterPoint1 = total.substring(total.indexOf('.'),total.length);
                            total = Math.floor(total);
                            total=total.toString();
                            var lastThree1 = total.substring(sum.length-3);
                            var otherNumbers = total.substring(0,sum.length-3);
                            if(otherNumbers != '')
                            lastThree1 = ',' + lastThree1;
                            var total_amt = otherNumbers.replace(/\B(?=(\d{2})+(?!\d))/g, ",") + lastThree1 + afterPoint1;
                            $('#total').val(total_amt);
                        }
                        $(document).ready(function()
                        {
                            $('input').click(function()
                            {
                                $(this).select();
                            });
                            $("#addrow").click(function()
                            {
                                var i=2 ;
                                var $row = $('<tr class="item-row"><td>'+i+'</td><td><textarea name="description[]" class="parts" placeholder="Category Moc Grade Thickness" cols="30"></textarea><br><input type="text" name="length[]" class="length" placeholder="Length" size="3"/>x &nbsp;&nbsp;&nbsp;<input type="text" name="width[]" class="width" placeholder="width"  size="6"></td><td><textarea class="quantity_no" name="quantity[]" cols="1">1</textarea><input type="hidden" name="density[]" class="density"/><input type="hidden" class="thick" name="thickness[]" /><textarea class="quantity" name="weight[]" cols="10" placeholder="Quantity"></textarea></td><td><textarea class="uom" name="unit[]"></textarea></td><td><textarea class="work_order" name="work_order[]" ></textarea></td><td><textarea class="rate" name="rate[]"></textarea></td><td><textarea class="price" name="price[]"></textarea></td></tr>').insertAfter(".item-row:last");
                                bind($row);
                                i++;
                            });
                            function bind($row) 
                            {
                                $row.find('.price').blur(update_price);
                                $row.find('.quantity').blur(find_weight);
                                $row.find('.work_order').keyup(work_order);
                                $row.find('.parts').autocomplete({
                                source: function (request, response) 
                                {
                                    $.ajax({
                                        url: "<?php echo base_url(); ?>index.php/users/parts_name",
                                        data:{term: request.term},
                                        dataType: "json",
                                        type: "POST",
                                        dataFilter: function (data) { return data; },
                                        success: function (data) {
                                        response($.map(data, function (item) {
                                        return 
                                        {
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
                    select: function (event , ui) 
                    {
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
                            }
                        });
                        }
                        });
                        }
                        $(".delete").live('click',function()
                        {
                            $(this).parents('.item-row').remove();
                            update_total();
                            if ($(".delete").length < 2) $(".delete").hide();
                        });
                    });
            </script>
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
        <style>

.payment th, .payment td {
    border: 0px !important;
    padding:0;
}

    </style>
</html>