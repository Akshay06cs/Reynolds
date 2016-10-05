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
                <form >
                    <div style="width: 100%;">
                        <div style="float:left; width: 60%">
                           
                        </div>
                        <div style="float:right;width: 40%">
                            <table class='payment'>
                                <tr><th>GRN No.</th><td>: GRN/2015-16/REY/</td></tr>
                                <tr><th>Order No.</th><td>:<select name="po_no"><option>PO/2015-16/REY/</option></select>
                                      <input list="browsers" name="myBrowser"  placeholder="Order No."  style="background:#F5F5DC" size="10" id="po_no"/>
                                      <datalist id="browsers">
                                        <?php
                                            $data  = $this->db->query("SELECT * FROM purchase_order");
                                                foreach($data->result() as $row){ ?>
                                                <option value="<?= $row->order_no ?>"><?= $row->order_no ?></option>
                                        <?php } ?>
                                      </datalist></td></tr>
                                <tr><th>Date</th><td>: </td></tr>
                                
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
                        <th align="center"colspan="2">Received Qty.</th>
                        <th align="center" colspan="2">Pending Qty.</th>
                    </tr>
                      
                    <tr class="item-row">
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        
                    </tr>
                           
                    </table>    
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
     
    <script type="text/javascript">
    $('#po_no').change(function () {
        var po_no = $('#po_no').val();
        window.location.href = "<?php echo base_url('index.php/users/add_order_rec/'); ?>/"+po_no;
    });
    </script>
</html>