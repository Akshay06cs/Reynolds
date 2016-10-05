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
    <meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />

    </head>
    <body>
       	<div class="container">
           <div align='right'></div>
           <div style="width: 100%;">
                <img  src="<?php echo base_url();?>assets/images/header3.jpg" alt="logo" width='100%' height='125' />
            </div>
             
            <hr>
             
                 <form action="<?= base_url('index.php/users/updateCondition') ?>" method ="post">
                    <div style="width: 100%;">
                        <div style="float:left; width: 50%">
                            <input type="hidden" name="id" value="<?= $r->qid ?>"> <br>
                                    Date: <?php echo date('d-m-Y', strtotime(str_replace('-','/', $r->qt_date))); ?><br></br>
                                Quotation No. <?= $r->qt_no ?> <input type="hidden" value="<?= $r->qt_no ?>" name="qt_no"> <?= $r->version ?><br>
                            <b>To, <?= $r->customer_name ?><input type="hidden" value="<?= $r->customer_name ?>" name="customer"><br></b>
                                    <?= $r->addr1 ?><input type="hidden" value="<?= $r->version ?>" name="version">
                                    <?= $r->addr2 ?>
                            <?= $r->city ?> - <?= $r->pin ?>
                            <?= $r->state ?>
                          
                        </div>
                        <div style="float:right;width: 40%">
                          
                        </div>
                        
                    </div>
                     <div style="width: 100%;">
                        <div style="float:left; width: 50%">
                            Kind attention : Mr. <?= $r->contct_person ?>(<?= $r->dept ?>)<br><br><br>
                            Sub :<input type="text" size="15" value="<?= $r->sub ?>" name="sub" placeholder="Subject"><br>
                            Ref :<input type="text" size="15" value="<?= $r->ref ?>" name="ref" placeholder="Ref">
                          
                        </div>
                        <div style="float:right;width: 40%">
                          
                        </div>
                        
                    </div>
                    <div style="clear:both"></div>
                    <p>Dear Sir's,</p>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; We thank you for your above enquiry for subject requirement. We are pleased to quote as below:        
                    <table id="items">
                    <tr>
                        <th width="1">Si No.</th>
                        <th>Item Description</th>
                        <th>Quantity</th>
                        <th>Rate</th>
                        <th>Price</th>
                    </tr>
                        <?php
                         $sino='1';
                                $data  = $this->db->query("SELECT * FROM quotation_description_detail WHERE qid='{$r->qid}'");
                                foreach($data->result() as $row){  ?>
                    <tr>
                         
                        <td align="center">
                         <?php echo $sino; ?>.
                        </td>
                        <td><?= $row->description ?></td>
                        <td align="center"><?= $row->qty ?></td>
                        <td align="center"><?= $row->rate ?></td>
                        <td align="right"><?= $row->total ?></td>
                    </tr>
                        <?php 
                        $sino++;} 
                        ?> 
                    <tr>
                        <td colspan="2"></td>
                        <td colspan="2" class="total-line">Total</td> 
                        <td class='total-line' ><?= $r->total_value ?></td> 
                    </tr>
                   
                    
                </table>    
                <div style="width: 100%;">
                    <div style="float:left; width: 100%">
                        <table class='payment'>
                            






                            <b>Terms and conditions:</b> <br>  
                          <textarea rows="10" cols="90" name="conditions"><?= $r->condtions ?></textarea>
                            </br></br>
                       We hope our offer is in line with your requirement. We look forward to receive your valued order. Thanking and assuring you of our best services.
                            
                        </table>
                    </div>
                <div style="float:left;">
                    <div align="left"><br>
                    Yours faithfully<br>
                    For Reynolds Chemequip Pvt. Ltd. <br><br>
                    R.G.Shanbhag
                    </div>
                    <!-- Signature PAD -->
                    <div>
                       <img id="image" src="<?php echo base_url();?>assets/images/sg1.png" alt="logo" width='200' height='100' />
                      <img id="image" src="<?php echo base_url();?>assets/images/seal.png" alt="logo" width='100' height='100' />
                    </div>
                </div>
            </div>
          
                     <div class="fixed-action-btn vertical" style="bottom: 45px; right: 24px;">
                <a class="btn-floating btn-large red"  href="<?php echo base_url();?>index.php/users">
                    <i id="pluse_ic" class="glyphicon glyphicon-plus"></i>
                    <i class="glyphicon glyphicon-home"></i>
                </a>
                <ul>
                    <li><a class="btn-floating orange darken-1"  title="View Prospects" href="<?php echo base_url();?>index.php/users/prospects"><i class="glyphicon glyphicon-eye-open"></i></a></li>
                      <li><button type="submit" name = "submit" class="btn-floating blue" data-placement="bottom" title="Generate Pdf"><span class="glyphicon glyphicon-ok"></span></button></li>
                    <li><a class="btn-floating grey"  data-placement="bottom" title="Go Back!"  href="javascript:window.history.go(-1);"><i class="glyphicon glyphicon-arrow-left"></i></a></li>     
                </ul>
                           
            </div>
            </form>
           
            </body>
     <script>
                $('.fixed-action-btn').hover(function(){
                $('#pluse_ic').toggle();
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

</html>