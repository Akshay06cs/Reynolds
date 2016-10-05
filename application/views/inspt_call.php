<html>
    <head>
        <title>
            Inspection call
        </title>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link rel="stylesheet" href="<?php echo base_url();?>assets/bootstrap/css/bootstrap.min.css">
            <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/insp_wo_accd.css">
                <!-- date picker plug-in
                <link rel='stylesheet' type='text/css' href="<?php echo base_url("assets/css/jquery-ui.css");?>" />-->
		
            <script src="<?php //echo base_url();?>assets/bootstrap/js/bootstrap.min.js"></script>
            <script src="<?php echo base_url();?>assets/js/jquery-2.1.4.min.js"></script>
            <script src="<?php //echo base_url();?>assets/js/jquery-ui.js"></script>
            <script src="<?php //echo base_url();?>assets/js/jquery-1.11.3.min.js"></script>
            <script scr="<?php //echo base_url();?>assets/js/jquery-1.4.4.min.js"></script>
            <script src="<?php //echo base_url();?>assets/css/jquery-ui.js"></script>
                
                
            <link rel='stylesheet' type='text/css' href="<?php //echo base_url("assets/css/style1.css");?>" />
            <link rel='stylesheet' type='text/css' href="<?php //echo base_url("assets/css/print.css");?>" />
  
    
    
    
     <!--<script type='text/javascript' src="<?php echo base_url(); ?>assets/js/accounting.min.js"></script> 
     
     <link rel="stylesheet" type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/smoothness/jquery-ui.css">
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1/jquery-ui.min.js"></script>--> 
    
    <!-- Floating Button -->
    <link rel='stylesheet' type='text/css' href="<?php echo base_url("assets/css/font-awesome.min.css");?>" />
    <script type='text/javascript' src="<?php echo base_url(); ?>assets/js/materialize.js"></script> 
    <link rel='stylesheet' type='text/css' href="<?php echo base_url("assets/css/materialize.css");?>" />
    
    
    <!-- Date Picker Plugins 
    
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <!--
    <script src="scripts/jquery.mockjax.js"></script> 
    <script src="src/jquery.autocomplete.js"></script> -->
                
                


<style>
    #wrapper{
        overflow: auto;
    }
    #left1
    {
        float:left;
    }
    #right1
    {
        margin-top:10px;
    }
    
    #wrapper2
    {
        overflow:auto;
        
    }
    #left2
    {
        float:left;
    }
    #right2
    {
        margin-top:10px;
    }
    #mainwrap
    {
        overflow:auto;
    }
    #l1
    {
        float:left;
    }
    #r1
    {
        margin-top:50px;
    }
   
    
</style>
</head>
   <body style="font-family:Helvetica;">
    <div class="container">
    
    <div class="row">
    
    <div class="col-sm-2" >
      
    </div>
      
    <div class="col-sm-8" style="font-family:Helvetica;float:left;">
        <div>
            <center>
                <img src="<?php echo base_url();?>assets/images/inspection.jpg" alt="Reynolds Chemequip" width="135%" height="170" style="float:right;" />
            </center>
        </div>   
    </div>
  </div>
<center><h3><u>Inspection Call</u></h3></center>
			<!--<form name="insp" action="<?php //echo base_url("index.php/inspection/saveInspection");?>" method="post">-->
                           
				<label for="ref_no" class="l1">Ref.No. :</label>
                                    <input type="text" name="ref_no" id="ref_no" class="ref" value="RCPL/BGM/QC/<?= $r->ref_no;?>" readonly /></br>
			    	
                                <label for="ref_date" class="l1" style="margin-left:20px;">Date:</label>
                                    <input type="text" name="ref_date" id="ref_date" value="<?= $r->date;?>" readonly/><br>
                                    <hr>  
                    <div style="width: 100%;" >
                        <div style="float:left; width: 30%; margin-left:20px;">
                            <h4 class="to">To,</h4>
                                <div style="margin-left:20px;">
                                    <textarea  name="customer" id="customer" placeholder="Customer" rows="1" cols="50" readonly><?= $r->customer;?></textarea><br>
                                    <textarea  name="to_addr" id="to_addr" placeholder="Address" rows="3" cols="20" readonly><?= $r->to_addr;?></textarea><br>
                                    <textarea  name="city" id="city" placeholder="city" rows="1" rows="5" cols="20" readonly><?= $r->city;?></textarea><br>
                                    <textarea  name="state" id="state" placeholder="state" rows="1" cols="10" readonly><?= $r->state;?></textarea>
                                    <!--
                                    <textarea  name="country" id="country" placeholder="country" rows="1" cols="20" readonly><?= $r->country;?></textarea>-->
                                    <textarea  name="pin" id="pin" placeholder="pin" rows="1" cols="10" readonly><?= $r->pin;?></textarea><br>
                                    <!--
                                    <textarea  name="c_phone" id="c_phone" placeholder="phone" rows="1" cols="20" readonly><?= $r->c_phone;?></textarea>-->
                                </div> 
                        </div>    
                        
                        <div class="table-responsive" style="float:right;width: 50%; margin-top:40px;">                    
                            <table class="table table-striped">
                                <tbody>
                                    <tr><th>Letter of Indent</th><td>RCPL/BGM/QC/<?= $r->ref_no;?></td></tr>
                                    <tr><th>OBN No. :</th><td><?= $r->obn_no;?></td></tr>
                                    <!--
                                    <tr><th>Description</th><td><?// $r->description; ?></td></tr>
                                    <?php 
                                        //$data2 = $this->db->query("SELECT sel FROM inspection_detail where ref_no='{$r->ref_no}'")->result();
                                       // foreach($data2 as $d){
                                    ?>
                                        <tr><th>RCPL W.O No.</th><td><?// $d->sel; }?></td></tr> --> 
                                </tbody>
                            </table>
                        </div> 
                    </div>
                                    
                    <div style="clear:both;"></div>      
                    
           
                    <?php 
                        $engg=$r->engineer_name;
                        if(!empty($engg)){
                    ?>
                    <div id="engg" style="margin-left:20px; margin-left:40px;">
                        <br><b>Kind Attention:</b> Mr.<input type="text" name="engineer_name" id="engineer_name" style="width:300px;margin-top:1px;margin-left:2px; " value="<?= $r->engineer_name;?>" readonly/>
                    </div>
                        <?php
                            }
                        ?>
                    <div style="clear:both"></div>
                    
                    <hr>
                    <h4>Inspection Details</h4>
                    <table border="1px" class="table table-bordered">
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
                    
                <div id="main_wrap">
                    <div id="l1" style="width:50%">
                        <div id="wrapper">    
                            <div id="left1">
                                <h4>Proposed date of Inspection:&nbsp;</h4>
                            </div>
                    
                            <div id="right1">
                                <input type="text" name="proposed_doi" id="proposed_doi" readonly value="<?= $r->proposed_doi;?>"/>
                            </div>
                    
                        </div>
                    </div>    
                    
                    <div id="r1">
                        <div id="wrapper2">
                            <div id="left2">
                                <h4>Weekly Off:&nbsp;</h4>
                            </div>
                    
                            <div id="right2">
                                <input type="text" name="weekly_off" id="weekly_off" value="<?= $r->weekly_off;?>" readonly/> 
                            </div>
                        </div>
                    </div>
                </div>    
                    
                <div>
                    <br><table border="1px" class="table table-bordered">
			<thead class="insp_title2">
                            <tr>
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
                    
                
                    <div class="qc_footer">    
                        <h4>For Reynolds Chemequip Pvt. Ltd.</h4></br>
                        <h4>(QA & QC)</h4>
                    </div>
                    <!-- sign padlogo
                        <div id="logo">logo
                        <!--
                        <div id="logoctr">
                            <a href="javascript:;" id="change-logo" title="Change logo">Change Sign.</a>
                            <a href="javascript:;" id="save-logo" title="Save changes">Save</a>
                            <a href="javascript:;" id="delete-logo" title="Delete logo">Delete Sign.</a>
                            <a href="javascript:;" id="cancel-logo" title="Cancel changes">Cancel</a>
                        </div>
                        <div id="logohelp">
                            <input id="imageloc" type="text" size="50" value="" /><br />
                            (max width: 540px, max height: 100px)
                        </div>-->
                        <img id="image" src="<?php echo base_url();?>assets/images/sg1.png" alt="logo" width='200' height='100' style="margin-left:850px;"/>
                        <!--</div>
                    end-->
                    
                     <div class="fixed-action-btn vertical" style="bottom: 45px; right: 24px;">
                <a class="btn-floating btn-large red">
                    <i class="glyphicon glyphicon-plus"></i>
                </a>
                <ul>
                    <li><a class="btn-floating green"  data-placement="bottom" title="Edit" href="<?php echo base_url("index.php/inspection/edit_inspt/".$r->ref_no);?>"><i class="glyphicon glyphicon-pencil"></i></a></li>
                    <li><a class="btn-floating red"  href="<?php echo base_url();?>index.php/users"><i class="glyphicon glyphicon-home"></i></a></li>
                    <li><a class="btn-floating yellow darken-1"  href="<?php echo base_url();?>index.php/inspection/view_ic_list"><i class="glyphicon glyphicon-search"></i></a></li>
                    <li><a class="btn-floating blue"  href="<?= base_url('index.php/inspection/Innvoice_pdf/'.$r->ref_no);?>"><i class="glyphicon glyphicon-ok"></i></a></li>
                    <li><a class="btn-floating grey"  data-placement="bottom" title="Go Back!"  href="javascript:window.history.go(-1);"><i class="glyphicon glyphicon-arrow-left"></i></a></li>    
                        
                </ul>
                           
            </div>
                  <div style="clear:both"></div>  
                    
                    
                    
		<h4 style="margin-left:1px;margin-top:40px;"><center>*Kindly organize to depute your Inspection Engineer on the above proposed date with prior intimation.</center></h4>

		   <!--	<h3><u>Inspection Details</u></h3>
				
				<table  class="table table-bordered test"> 
					
						<tr class="insp_title">
                                                    <th align="center">Sr.No.</th>
                                                    <th align="center">Item Description</th>
                                                    <th align="center">Material Description</th>
                                                    <th align="center">Grade</th>
                                                    <th align="center">Size</th>
                                                    <th align="center">Stage to be offered</th>
                                                    <th align="center">Quantity.</th>
                                                </tr>
						
					
                                
					
						<tr>
                                                    <td align="center" name="sr_no" id="sr_no">
                                                        1
                                                    </td>
                                                    
                                                    <td align="center">
                                                        <textarea class="form-control" name="item_desc[]" id="item_desc" class="txtbox" placeholder="Item Description"></textarea>
                                                    </td>
                                                    
                                                    <td align="center">
                                                        <textarea class="form-control" rows="" name="mat_desc[]" id="mat_desc" class="txtbox" placeholder="Material Description"></textarea>
                                                    </td>
                                                    
                                                    <td align="center">
                                                        <textarea class="form-control" rows="" name="grade[]" id="grade" class="txtbox" placeholder="Grade"></textarea>
                                                    </td>
                                                    
                                                    <td align="center">
                                                        <textarea class="form-control" rows="" name="size[]" id="size" class="txtarea" placeholder="Size"></textarea>
                                                    </td>
                                                    
                                                    <td align="center">
                                                        <textarea class="form-control" rows="" name="stage[]" id="stage" class="txtbox" placeholder="Stage"></textarea>
                                                    </td>
                                                    
                                                    <td align="center">
                                                        <textarea class="form-control" rows="" id="qty" name="qty[]" class="txtbox" placeholder="Quantity"></textarea>
                                                    </td>
                                                </tr>
	                    
                                        
                                </table>
                                
                        <div>
                                                       
                        
                    
                        <a href="javascript:;" title="Add a row" ><span class="glyphicon glyphicon-plus plusbtn"></span></a>
          
                        <a href="javascript:;" title="Remove the row"><span class="glyphicon glyphicon-minus minusbtn"></span></a>
                            
                        </div>
                                        

				<h3>Proposed date of Inspection:</h3>
				<input type="text" name="proposed_doi" id="proposed_doi" placeholder="dd-mm-yy"/>
				<h3>Weekly Off:</h3>
				<input type="text" name="weekly_off" id="weekly_off" value="Sunday" readonly style="border:none;"/>
                                
                                <br><br>
				
				<div class="container">
					<table border="1px" class="table table-bordered">
						<thead class="insp_title2">
							<tr>
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
                                                                <textarea class="form-control" name="contact_person" id="contact_person" placeholder="Contact Person" ></textarea>
                                                            </td>
                                                            
                                                            <td>
                                                                <textarea class="form-control" name="phone" id="phone" placeholder="Telephone No." ></textarea>
                                                            </td>
                                                            
                                                            <td>
                                                                <textarea class="form-control" name="email" id="email" placeholder="E-mail" ></textarea>
                                                            </td>
                                                            
                                                            <td>
                                                                <textarea class="form-control" name="poi" id="poi" placeholder="Place of Inspection"></textarea>
                                                            </td>
                                                        </tr>
						</tbody>
					</table>
				</div>	
                                
                                    <h4>*Kindly organize to depute your Inspection Engineer on the above proposed date with prior intimation.</h4><br>
                                <div class="qc_footer">    
                                    <h4>For Reynolds Chemequip Pvt. Ltd.</h4></br>
                                    <h4>(QA & QC)</h4>
                                </div>  
                                    <input type="submit" name="save" value="save"/>
		</form>
        
        <script>
            i=2;
            $('.plusbtn').click(function() {
                
	    $(".test").append('<tr><td align="center">'+i+'</td><td><textarea class="form-control" id="item_desc" name="item_desc[]" class="txtbox" placeholder="Item Description"></textarea></td><td><textarea class="form-control" rows="" name="mat_desc[]" id="mat_desc" class="txtbox" placeholder="Material Description"></textarea></td><td><textarea class="form-control" rows="" name="grade[]" id="grade" class="txtbox" placeholder="Grade"></textarea></td><td><textarea class="form-control" rows="" name="size[]" id="size" class="txtarea" placeholder="Size"></textarea></td><td><textarea class="form-control" rows="" name="stage[]" id="stage" class="txtbox" placeholder="Stage"></textarea></td><td><textarea class="form-control" rows="" name="qty[]" id="qty" class="txtbox" placeholder="Quantity"></textarea></td></tr>');
                i++; 
        });
       
	$('.minusbtn').click(function() {
		if($(".test tr").length != 2)
			{
				$(".test tr:last-child").remove();
                                if(i>=2)
                                {
                                    i--;
                                }
			}
	   else
			{
				alert("You cannot delete first row");
			}
	});
   
                       
     
           
        </script>-->
        </div>
       
       </body>
                        
        <script>
        /*$("#cancel-logo").click(function(){
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
        $("#logo").removeClass('edit');*/
        });
    </script>
</html>