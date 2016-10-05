<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />

    </head>
    <body>
       	<div class="container">
           <div align='right'></div>
           <div style="width: 100%;">
                <img  src="<?php echo base_url();?>assets/images/header3.jpg" alt="logo" width='100%' height='125' />
            </div>
             
            <hr>
             
                <form >
                    <div style="width: 100%;">
                        <div style="float:left; width: 50%">
                             Date: <?php echo date('d-m-Y', strtotime(str_replace('-','/', $r->qt_date))); ?><br><br>
                                Quotation No. <?= $r->qt_no ?> <?= $r->version ?> <br>
                            <b>To, <?= $r->customer_name ?><br></b>
                                    <?= $r->addr1 ?>
                                    <?= $r->addr2 ?>
                            <?= $r->city ?> - <?= $r->pin ?><br>
                            <?= $r->state ?>
                          
                        </div>
                        <div style="float:right;width: 40%">
                          
                        </div>
                        
                    </div>
                     <div style="width: 100%;">
                        <div style="float:left; width: 50%">
                            Kind attention : Mr.<?= $r->contct_person ?><?php if(!empty($r->dept)){ ?>(<?= $r->dept ?>)<?php }?><br><br><br>
                            Sub :<?= $r->sub ?><br>
                            Ref :<?= $r->ref ?>
                          
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
                        <td colspan="2" class="total-line"><b>Total</b></td> 
                        <td class='total-line' ><?= $r->total_value ?></td> 
                    </tr>
                   
                    
                </table>    
                <div style="width: 100%;">
                    <div style="float:left; width: 100%">
                        <table class='payment'>
                            





 <tr><td><br></td></tr>

                            <tr><td><b>Terms and conditions:</b></td></tr>   
                            <tr><td>
                                  <div><?php  
                                  echo nl2br($r->condtions);?></div>
                              </td></tr><br>
                        <tr><td>We hope our offer is in line with your requirement. We look forward to receive your valued order. Thanking and assuring you of our best services</td></tr>
                            
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