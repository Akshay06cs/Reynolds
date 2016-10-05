<html>
    <head>
        <title>
        </title>
                <meta charset="utf-8">
                <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    
    <body style="font-family:Helvetica;">
       
        <div class="container">
            
            <center>
                <img src="<?php echo base_url();?>assets/images/inspection.jpg" alt="Reynolds Chemequip" width="135%" height="100" style="float:right;" />
            </center>
            
            <div style="margin-left:300px;">
            <center><h3><u>INSPECTION CALL</u></h3></center>
            </div>
			<!--<form name="insp" action="<?php //echo base_url("index.php/inspection/saveInspection");?>" method="post">-->
                           
            <label for="ref_no" class="l1">Ref.No. :</label>
                RCPL/BGM/QC/<?= $r->ref_no;?> 
			    	
                <br><label class="l1" style="margin-left:20px;">Date:</label>
                <?= $r->date;?>
            <hr>  
                    
            <div style="width: 100%;" >
                <div style="float:left; width: 30%; margin-left:20px;">
                    <h4 class="to">To,</h4>
                        <div style="margin-left:20px;">
                            <?= $r->customer;?><br>
                            <?= $r->to_addr;?><br>
                            <?= $r->city;?><br>
                            <?= $r->state;?><?= $r->pin;?><br>
                            
                        </div> 
                </div>    
                        
                <div class="table-responsive" style="float:right;width:50%; margin-top:40px;">                    
                    <table>
                        <tbody>
                            <tr><th>Letter of Indent</th><td>RCPL/BGM/QC/<?= $r->ref_no;?></td></tr>
                                    <!--
                                    <tr><th>Description</th><td><?// $r->description; ?></td></tr>
                                    <?php 
                                        //$data2 = $this->db->query("SELECT sel FROM inspection_detail where ref_no='{$r->ref_no}'")->result();
                                       // foreach($data2 as $d){
                                    ?>
                                        <tr><th>RCPL W.O No.</th><td><?// $d->sel; }?></td></tr> -->
                                    
                                    <?php
                                        $engg=$r->engineer_name;
                    
                                        if(!empty($engg))
                                        {
                                    ?>
                                    <tr><th><b>Kind Attention:</b></th><td>Mr.<?= $r->engineer_name;?></td></tr>
                                    <?php
                                        }
                                    ?>
                        </tbody>
                    </table>
                </div> 
            </div>
                <div style="clear:both"></div>
                    
                    <hr>
                    
                    <h4>Inspection Details</h4>
                    
                    <table>
                        <tr style="background-color:#EEEEEE;">
                            <th>Sr No.</th>
                            <th style="width:8%;">W/O No.</th>
                            <th>Item Description</th>
                            <th>Material Description</th>
                            <th>Stage</th>
                        </tr>
                        
                    <?php
                    $sino='1';
                    $data1 = $this->db->query("SELECT * FROM inspection_detail where ref_no='{$r->ref_no}'");
                    foreach($data1->result() as $row){
                    ?>
                    
                    
                    <tr class="item-row">
                         
                        <td align="center">
                         <?php echo $sino;?>
                        </td>
                        <td style="width:8%;"><?= $row->sel;?></td>
                        <td><?= $row->item_desc;?></td>
                        <td><?= $row->mat_desc;?></td>
                        <td><?= $row->remarks;?></td>
                    <?php 
                    $sino++;
                    }?>
                    </tr>
                </table> 
                    
                    
                    <div class="first">
                        <br><label>Proposed Date of Inspection:</label><?= $r->proposed_doi;?>
                    </div>
                    
                    <div class="second">
                        <br><label>Weekly Off:</label><?= $r->weekly_off;?>
                    </div>
                    
                    
                    
                    
                    <!--
                    <br><table class="pdoi" cellspacing="0" cellpadding="0">
                        <tr>
                            <th>Proposed Date of Inspection:</th><td><?= $r->proposed_doi;?></td><td>&nbsp;</td>
                            <th>Weekly Off:</th><td><?= $r->weekly_off;?></td>
                        </tr>
                    </table>-->  
               <div>
                    <br><table>
			<thead class="insp_title2">
                            <tr style="background-color:#EEEEEE;">
                                <th>
                                    Contact Person
                                </th>
                                                            
                                <th>
                                    Telephone.No.
                                </th>
                                
                                <th>
                                    E-mail
                                </th>
                                
                                <th>
                                    Place Of Inspection
                                </th>
                                
                            </tr>
			</thead>
                                                
                        <tbody>
                            <tr>
                                <td>
                                    <?= $r->contact_person;?>
                                </td>
                                                            
                                <td>
                                    <?= $r->phone;?>
                                </td>
                                                            
                                <td>
                                    <?= $r->email;?>
                                </td>
                                                            
                                <td>
                                    <?= $r->poi;?>
                                </td>
                                
                            </tr>
			</tbody>
                    </table>
                    
                </div>
                    
                
                    <div style="float:right;">
                    <div align="right"><br>
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
                        <img id="image" src="<?php echo base_url();?>assets/images/sg1.png" alt="logo" width='200' height='100' />
                    </div>
                </div>
                    <!--end-->
                    
                     <div class="fixed-action-btn vertical" style="bottom: 45px; right: 24px;">
                <a class="btn-floating btn-large red">
                    <i class="glyphicon glyphicon-plus"></i>
                </a>
                <ul>
                    <li><a class="btn-floating red"  href="<?php echo base_url();?>index.php/users"><i class="glyphicon glyphicon-home"></i></a></li>
                    <li><a class="btn-floating yellow darken-1"  href="<?php echo base_url();?>index.php/users/view_po"><i class="glyphicon glyphicon-search"></i></a></li>
                    <li><a class="btn-floating blue"  href="<?= base_url("index.php/inspection/Innvoice_pdf/").$row->ref_no;?>"><i class="glyphicon glyphicon-ok"></i></a></li>
                        
                </ul>
                           
            </div>
                  <div style="clear:both"></div>  
                    
                    
                    
		<h4 style="margin-left:1px;margin-top:10px;"><center>*Kindly organize to depute your Inspection Engineer on the above proposed date with prior intimation.</center></h4>
            </div>
       
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