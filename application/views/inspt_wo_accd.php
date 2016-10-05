<html>
    <head>
        <title>
            Reynolds Chemequip Pvt. Ltd.
        </title>
        <!--for proper rendering and touch zooming-->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <link rel='stylesheet' type='text/css' href="<?php echo base_url("assets/css/bootstrap.min.css");?>" />
        <link rel="stylesheet" href="<?php echo base_url();?>assets/girish/css/insp.css"/>
        <!-- datepicker plugin-->
        <link rel='stylesheet' type='text/css' href="<?php echo base_url("assets/girish/datepicker/jquery-ui.css");?>" />
        <script type='text/javascript' src="<?php echo base_url("assets/girish/datepicker/jquery.js");?>"</script>
        <script type='text/javascript' src="<?php echo base_url("assets/girish/datepicker/jquery-ui.js");?>"></script>
        
        
        
        <script type='text/javascript' src="<?php echo base_url("assets/js/jquery-1.3.2.min.js");?>"></script>
        <script type='text/javascript' src="<?php echo base_url("assets/js/script.js");?>" ></script>
        <script src="<?php echo base_url();?>assets/js/jquery.js"></script>
     
        <script src="<?php echo base_url();?>assets/girish/bootstrap/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url();?>assets/js/jquery-2.1.4.min.js"></script>
        <script src="<?php echo base_url();?>assets/js/jquery-ui.js"></script>
        
        
        <script src="<?php echo base_url();?>assets/js/jquery-1.11.3.min.js"></script>
        <script scr="<?php echo base_url();?>assets/js/jquery-1.4.4.min.js"></script>
      
        <!-- autocomplete-->
        <link href="<?php echo base_url();?>assets/girish/ac/jquery-ui.css" rel="stylesheet">
	<script src="<?php echo base_url();?>assets/girish/ac/jquery.js"></script>
	<script src="<?php echo base_url();?>assets/girish/ac/jquery-ui.js"></script>
        
        <!--form validation-->
        <script src="<?php echo base_url();?>assets/validation/jquery.etformvalidation.js" type="text/javascript"></script>
        
        <!--floating buttons-->
        <link rel='stylesheet' type='text/css' href="<?php echo base_url("assets/css/font-awesome.min.css");?>" />
        <script type='text/javascript' src="<?php echo base_url(); ?>assets/js/materialize.js"></script> 
        <link rel='stylesheet' type='text/css' href="<?php echo base_url("assets/css/materialize.css");?>" />
		
		<!--accordion-->
		<link href="<?php echo base_url("assets/girish/accordion1/css/jquery-ui.css");?>" rel="stylesheet">
        
        <style>
            .DemoBS2
            {
                margin:20px;
            }
            .brdr
            {
                border-color:#dff0d8;
                border-bottom-color:#dff0d8;
            }
            .topbrdr
            {
                border-top-color:#dff0d8;
				
            }
            .pfont
            {
                font-weight:bold;
                color:ea9191;
            }
            .ac_title1,.ac_title2,.ac_title3,.ac_title4,.ac_title5,.ac_title6
            {
                font-weight:bold;
                color:white;
		font-family:Helvetica;
            }
            
            
            .big
            {
                height: auto;
            }
           
        </style>
        
        <script>
            
            $(function()
            {
                $( "#ref_date" ).datepicker({ dateFormat: 'dd-mm-yy' });
                $( "#proposed_doi" ).datepicker({ dateFormat: 'dd-mm-yy' });
            });
            
            
            
           $(document).ready(function(){
               
             var x = parseInt(document.getElementById("ref_num").value);
             
             var new_order = x >= 10 ? x : "0"+x.toString();
             var num = 'RCPL/BGM/QC/'+ new_order;
             $('.ref1').val(num);
             
           }); 
            
            
       $(document).ready(function () {
            $("#rcpl_wo_no").autocomplete({
            source: function (request, response) {
                $.ajax({
                    url: "<?php echo base_url(); ?>index.php/inspection/rcpl_names",
                    data:{term: request.term},
                    dataType: "json",
                    type: "POST",
                    dataFilter: function (data) { return data; },
                    success: function (data) {
                        response($.map(data, function (item) { 
                        return {
                                   label: item.rcpl,
                                   value: item.rcpl,
                               }
                            }))
                        },
                    error: function (XMLHttpRequest, textStatus, errorThrown) {
                        alert(textStatus);
                    }
                    });
                    },
                    minLength: 1,
                });
                
                 $("#engineer_name").autocomplete({
                    source:function(request,response){
                        $.ajax({
                                url:"<?php echo base_url();?>index.php/inspection/engineer_names",
                                data:{term:request.term},
                                dataType:"json",
                                type:"POST",
                                dataFilter:function(data){return data;},
                                success:function(data){
                                response($.map(data,function(item){
                                                        return{
                                                                label:item.engineer,
                                                                value:item.engineer
                                                              }
                                        }))
                                },
                                error:function(XMLHttpRequest,textStatus,errorthrown){
                                alert(textStatus);
                                }
                                });
                                },
                                minLength:1,
                            });
                            });
        
        /*autocomplete for material description*/
        $(document).ready(function () {
            $("#mat_desc").autocomplete({
                source: function (request, response) {
                $.ajax({
                    url: "<?php echo base_url(); ?>index.php/inspection/mat_desc",
                    data:{term: request.term},
                    dataType: "json",
                    type: "POST",
                    dataFilter: function (data) { return data; },
                    success: function (data) {
                            response($.map(data, function (item) {
                            $("#grade").val(item.grade);
                            return {
                                       label: item.mat_desc,
                                       value: item.mat_desc,
                                       id: item.id
                                    }
                                }))
                            },
                    error: function (XMLHttpRequest, textStatus, errorThrown) {
                        alert(textStatus);
                    }
                    });
                    },
                    minLength: 1,
                    select: function (event , ui) {
                    var businessEntityId = ui.item.id;
                    $.ajax({
                        type: "POST",
                        data:{'id': businessEntityId},
                        dataType:"json",
                        url: "<?php echo base_url(); ?>index.php/inspection/grade_desc",//here we are calling our user controller
                        success: function(data) //we're calling the response json array 'data'
                        {
                            $("#grade").val(data.grade);
                            
                        }
                    });
                    }
                });
                
                /*contact person details*/
                $("#contact_person").autocomplete({
                source: function (request, response) {
                $.ajax({
                    url: "<?php echo base_url(); ?>index.php/inspection/contact_detail",
                    data:{term: request.term},
                    dataType: "json",
                    type: "POST",
                    dataFilter: function (data) { return data; },
                    success: function (data) {
                            response($.map(data, function (item) {
                            $("#phone").val(item.phone);
                            $("#email").val(item.email);
                            $("#poi").val(item.poi);
                            return {
                                       label: item.contact_person,
                                       value: item.contact_person,
                                       id: item.id
                                    }
                                }))
                            },
                    error: function (XMLHttpRequest, textStatus, errorThrown) {
                        alert(textStatus);
                    }
                    });
                    },
                    minLength: 1,
                    select: function (event , ui) {
                    var businessEntityId = ui.item.id;
                    $.ajax({
                        type: "POST",
                        data:{'id': businessEntityId},
                        dataType:"json",
                        url: "<?php echo base_url(); ?>index.php/inspection/credentials",//here we are calling our user controller
                        success: function(data) //we're calling the response json array 'data'
                        {
                            $("#phone").val(data.phone);
                            $("#email").val(data.email);
                            $("#poi").val(data.poi);
                            
                        }
                    });
                    }
                });
                
                /*autocomplete for address*/
                
                
                $("#inspt_by").autocomplete({
                source: function (request, response) {
                $.ajax({
                    url: "<?php echo base_url(); ?>index.php/inspection/engg_addr",
                    data:{term: request.term},
                    dataType: "json",
                    type: "POST",
                    dataFilter: function (data) { return data; },
                    success: function (data) {
                            response($.map(data, function (item) {
                            $("#to_addr").val(item.address);
                            $("#loi").val(item.loi);
                            $("#description").val(item.description);
                            $("#drawing_no").val(item.drawing_no);
                            $("#rcpl_wo_no").val(item.rcpl_wo_no);
                            return {
                                       label: item.inspection_by,
                                       value: item.inspection_by,
                                       id: item.id
                                    }
                                }))
                            },
                    error: function (XMLHttpRequest, textStatus, errorThrown) {
                        alert(textStatus);
                    }
                    });
                    },
                    minLength: 1,
                    select: function (event , ui) {
                    var businessEntityId = ui.item.id;
                    $.ajax({
                        type: "POST",
                        data:{'id': businessEntityId},
                        dataType:"json",
                        url: "<?php echo base_url(); ?>index.php/inspection/engg_credentials",//here we are calling our user controller
                        success: function(data) //we're calling the response json array 'data'
                        {
                            $("#loi").val(data.loi);
                            $("#description").val(data.description);
                            $("#drawing_no").val(data.drawing_no);
                            $("#rcpl_wo_no").val(data.rcpl_wo_no);
                            
                           
                        }
                    });
                    }
                });
                
                
                
                /*autocomplete for description*/
                 $("#item_desc").autocomplete({
                    source: function (request, response) {
                    $.ajax({
                    url: "<?php echo base_url(); ?>index.php/inspection/item_description",
                    data:{term: request.term},
                    dataType: "json",
                    type: "POST",
                    dataFilter: function (data) { return data; },
                    success: function (data) {
                        response($.map(data, function (item) { 
                        return {
                                   label: item.job_description,
                                   value: item.job_description,
                               }
                            }))
                        },
                    error: function (XMLHttpRequest, textStatus, errorThrown) {
                        alert(textStatus);
                    }
                    });
                    },
                    minLength: 1,
                });
                
                
                
                
                
                
                
            });
   
        </script>
        
    </head>
    

    <body style="font-family:Helvetica;">
        <form name="inps1" method='post' action="<?php echo base_url("index.php/inspection/saveInspection");?>" >
            
            <?php $refval=$ref_no->ref_no;  $refval++; ?>
            
            <input type="hidden" id="ref_num" name="ref_num" value="<?php  echo $refval;?>"/>   
            
          
            
        <div class="container">
			<div style="margin: 20px 40px 20px 40px" class="wrapper">
				<div class="row">
					<div class="cols-md-6">
						
                                            <img  src="<?php echo base_url();?>assets/images/logo2.png" alt="logo" width='140' height='140' style="margin-left:10px; float:left;" />
						
					</div>
					
					<div class="cols-md-6">
						<div class="form-group" style="font-family:Helvetica;float:left;width: 80%">
							<center>
								<h1>Reynolds Chemequip Pvt. Ltd.</h1>
								<p>Plot No. N 14 & N 17, KSSIDC Industrial Estate,Udyambag, Belgaum - 590008</p>
								<p>Phone: (0831) 2441141; Fax : (0831) 2440887 </p>
								<p>prashant.ghasari@ReynoldsIndia.com</p>
							</center>	
						</div>
					
					</div>	
				</div>	
				
            
        
					<!-- Accordion -->

<h2 class="demoHeaders">Inspection Call</h2>
	
	  <!--accordion 1 title-->
		<font class="ac_title2">
                    Address and Letter of Indent 
                 </font>
          
		
            
            <div class="container-fluid"><!--accordion 1 body-->
               <div class="form-group topbrdr">
                   <div class="row">
                        <div class="distance">
                       
                           <div class="col-md-4">
                               <div class="form-group">
                                    <label for="ref_no" class="l1">Ref.No.:</label><br>
                                    <input type="text" name="ref_no" id="ref_no" class="form-control ref1" style="width:95%" readonly/>
                               </div>
                           </div>
                           
                           <div class="col-md-4">
                               <div class="form-group" id="label">
                                    <label for="ref_date" class="l1">Date:</label><br>
                                        
                                        <input type="text" name="ref_date" id="ref_date"  title="Select Date" class="form-control"  placeholder="dd-mm-yy" style="height:20px;width:95%;background:#F5F5DC"/>
                                </div>
                           </div>    
                        </div>        
                   </div>
                      
                </div>
            </div>   
                
                
            <div class="container-fluid">    
		<div class="row" ><!--accordion 2 body-->
			<div class="distance1">
				<div class="col-md-4 addr" style="padding:1px 1px 1px 1px;">
                                        
                                    <textarea  name="inspt_by" id="inspt_by" placeholder="Inspection By" rows="1" class="form-control" style="width:100%"></textarea><br>
                                    <textarea  name="to_addr" id="to_addr" placeholder="Address" rows="1" cols="10" class="form-control" style="width:100%;height:20%"></textarea>
                                    
				</div> 
                                        
                                    
				<div class="col-md-4 cred">
                                    
                                                    
                                                        <textarea class="form-control" name="loi" id="loi" rows="1" placeholder="Letter Of Indent" style="width:100%" ></textarea><br>
                                                        
                                                        <textarea name="description" id="description" placeholder="Description" rows="1" class="form-control" style="width:100%"></textarea><br>
										
							<textarea name="drawing_no" id="drawing_no"  placeholder="RCPL Drawing No." rows="1" class="form-control" style="width:100%"></textarea><br>
            
							
                                                        <textarea name="rcpl_wo_no" id="rcpl_wo_no"  placeholder="RCPL W.O No. "  rows="1" class="form-control" style="width:100%"></textarea>
                                                        
                                                        <!--<div id="stage" style="width:50%">
                                                          <p>Select the stage</p>
                                                          <center>
                                                                <div class="radio">
                                                                    <label class="opt1"><input type="radio" name="optradio" class="optradio"/>SS</label>
                                                                </div>
                                                            
                                                                <div class="radio">
                                                                    <label class="opt2"><input type="radio" name="optradio" class="optradio"/>PS</label>
                                                                </div>
        
                                                                <div class="radio">
                                                                    <label class="opt3"><input type="radio" name="optradio" class="optradio"/>SF</label>
                                                                </div>
                                                           </center>   
        
                                                        </div> 
                                                        
                                                        <div style="margin-left:150px;margin-top:-100px;">
                                                            <input type="text" name="stg" id="stg" style="width:50%;"  class="form-control stg"/><div class="form-group" style="margin-top:-72px; margin-left:100px;">
                                                                                                                                                                                    <label for="sel1">Select</label>
                                                                                                                                                                                    <select class="form-control" id="sel1">
                                                                                                                                                                                        <option>1</option>
                                                                                                                                                                                        <option>2</option>
                                                                                                                                                                                        <option>3</option>
                                                                                                                                                                                        <option>4</option>
                                                                                                                                                                                        </select>
                                                                                                                                                                                  </div>-->
                               </div>
                                                        
                                                        
                                     
                                                    
                                           
                                                
                                            
					 
				</div>
			</div>			
                </div> 
           
               
	
            	
           
		<font  class="ac_title4"><!--accordion 2 title-->
			Inspection Details
		</font>
               
                    
                        
                            <div class="form-group distance3">
                                <i id="addengg1" class="glyphicon glyphicon-plus add1" title="add engineer name"></i>
                                <i id="removeengg1"class="glyphicon glyphicon-minus remove1" title="remove engineer name"></i>
                                        
                                <div class="check">
                                   <input type="text" name="engineer_name" id="engineer_name" style="width:200px;" placeholder="Engineer Name" class="form-control" />
                                </div>
                            </div>
                             
	
                            
                               
                                    <div class="table-responsive"><!--accordion 4 body-->
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
					
                                            <tr class="insp_detail">
						<td align="center" name="sr_no" id="sr_no">
							1
						</td>
                                                    
						<td align="center">
							<div class="form-group">
								<textarea class="form-control" name="item_desc[]" id="item_desc" class="txtbox" placeholder="Item Description" style="width:120px;"></textarea>
							</div>
						</td>
                                                    
						<td align="center">
							<div class="form-group">	
								<textarea class="form-control" rows="" name="mat_desc[]" id="mat_desc" class="txtbox" placeholder="Material Description" style="width:120px;"></textarea>
							</div>
						</td>
                                                    
						<td align="center">
							<div class="form-group">
								<textarea class="form-control" rows="" name="grade[]" id="grade" class="txtbox" placeholder="Grade" style="width:120px;"></textarea>
							</div>
						</td>
                                                    
						<td align="center">
							<div class="form-group">
								<textarea class="form-control" rows="" name="size[]" id="size" class="txtarea"  style="width:120px;" readonly>As per drawing</textarea>
							</div>
						</td>
                                                    
						<td align="center">
							<div class="form-group">
                                                            <textarea class="form-control" rows="" name="stage[]" id="stage" class="txtbox"  placeholder="Stages" style="width:120px;" ></textarea>
							</div>
						</td>
                                                    
						<td align="center">
                                                    <div class="form-group">
							<select class="form-control" id="qty" name="qty[]" class="select_qty" placeholder="Quantity" style="height:50px;width:100px">
                                                            <option>1</option>
                                                            <option>2</option>
                                                            <option>3</option>
                                                            <option>4</option>
                                                            <option>5</option>
                                                            <option>6</option>
                                                            <option>7</option>
                                                            <option>8</option>
                                                            <option>9</option>
                                                            <option>10</option>
							</select>
                                                    </div>
						</td>
                                            </tr>
                                        </table>
                                
                                    <div>
                                        <a href="javascript:;" title="Add a row" ><span class="glyphicon glyphicon-plus plusbtn"></span></a>
          
                                        <a href="javascript:;" title="Remove the row"><span class="glyphicon glyphicon-minus minusbtn"></span></a>
                            
                                    </div>
                                </div>
                            
                        	
                    
                
             
	
	<!--accordion 6 title-->
		<font  class="ac_title6">
			Contact Person details
		</font>
	
	
        
            <div class="container-fluid">
                <div id="distance2">
                    <div class="row">
                
                    
                        <div class="col-md-4">
                            <label for="proposed_doi" class="pdoi">Proposed date of Inspection:</label><br>
                                <input type="text" name="proposed_doi" id="proposed_doi" placeholder="dd-mm-yy" class="form-control" style="width:100%"/>
                        </div>
                        <div class="col-md-4">
                            <div id="label2">        
                                <label for="weekly_off" class="wo">Weekly Off:</label><br>
                                    <input type="text" name="weekly_off" id="weekly_off" value="Sunday" readonly style="border:none;width:100%;"class="form-control" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>    
            
                    <div id="cp_boundary">
                        <div class="table-responsive">
                            <table border="1px" class="table table-bordered">
                                <thead class="insp_title2">
                                    <tr>
                                        <th>Contact Person</th>
                                        <th>Telephone.No.</th>
                                        <th>E-mail</th>
                                        <th>Place Of Inspection</th>
                                    </tr>
                                </thead>
						
                                <tbody>
                                    <tr>
                                        <td>
                                            <textarea class="form-control" name="contact_person" id="contact_person" placeholder="Contact Person" style="width:200px;" ></textarea>
                                        </td>
                                                            
                                        <td>
                                            <textarea class="form-control" name="phone" id="phone" placeholder="Telephone No." style="width:200px;" ></textarea>
                                        </td>
                                                            
                                        <td>
                                            <textarea class="form-control" name="email" id="email" placeholder="E-mail" style="width:200px;"></textarea>
                                        </td>
                                                            
                                        <td>
                                            <textarea class="form-control" name="poi" id="poi" placeholder="Place of Inspection" style="width:200px;"></textarea>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <input type='hidden' name='status' value='Pending'/>
                        </div>
                    
                
                    </div>    
            
           
		
    </div>

</div>
        
        
            <div class="qc_footer" >    
                <h5>For Reynolds Chemequip Pvt. Ltd.</h5></br>
                 <h5>Authorised signature</h5>
            </div> 
               
             <!--signature pad-->
                <div class="form-group" id="logo" style="margin-right:80px;width:200px">
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
                        <img id="image" src="<?php echo base_url();?>assets/images/sg.jpg" alt="logo" width='200' height='100' />
                        
					<div class="footer">
                        <h4>(QA & QC)</h4>
                    </div>
                        
					<div style="clear:both"></div>
                </div>
                           
       
			<!--floating buttons-->
			<div class="fixed-action-btn vertical" style="bottom: 45px; right: 24px;">
				<a class="btn-floating btn-large red"  href="<?php echo base_url();?>index.php/users">
					<i id="pluse_ic" class="glyphicon glyphicon-plus"></i>
					<i class="glyphicon glyphicon-home"></i>
				</a>
				
                <ul>
                    <li><a class="btn-floating yellow darken-1" data-placement="bottom" title="View Inspection Call List" href="<?php echo base_url();?>index.php/inspection/view_ic_list"><i class="glyphicon glyphicon-search"></i></a></li>
                    <li><a class="btn-floating green"  data-placement="bottom" title="Create New Inspection Call!"><i class="glyphicon glyphicon-pencil"></i></a></li>
                    <li><button type="submit" name = "submit" class="btn-floating blue" data-placement="bottom" title="Save" id="submit"><span class="glyphicon glyphicon-save"></span></button></li>
                </ul>
                           
			</div>
                           
        </form>
                      

	
            
		<h5 style="margin-left:200px;margin-top:140px;"><center>*Kindly organize to depute your Inspection Engineer on the above proposed date with prior intimation.</center></h5>
            
      
<script>
    
    /*function for stage selection*/
    $(document).ready(function(){
        
       $(".optradio").click(function(){
          
                 if($(".opt1")==1)
                     {
                         $(".stg").val("SS");
                     }
              
            
            
        });
    });
    
    
    /*function for addin and removing engineer*/
            $(document).ready(function(){
                $(".check").hide();
                $("#removeengg1").hide();
                    $("#addengg1").click(function(){
                        $(".check").show("slow");
                        $("#addengg1").hide("slow");
                        $("#removeengg1").show("slow");
                        $("#removeengg1").click(function(){
                                $(".check").hide("slow");
                                $("#removeengg1").hide("slow");
                                $(".add1").show("slow");
                                
                           });
                      });
                });
               
            

        
/*floating buttons*/
        $('.fixed-action-btn').hover(function(){
                $('#pluse_ic').toggle();
                });
          
           $(document).ready(function(){
                i=2; 
                $('.plusbtn').click(function() {
               
                var $row = $('<tr class="insp_detail"><td align="center">'+i+'</td><td><textarea class="form-control" id="item_desc" name="item_desc[]" class="txtbox" placeholder="Item Description" style="width:120px;"></textarea></td><td><textarea class="form-control" rows="" name="mat_desc[]" id="mat_desc" class="txtbox" placeholder="Material Description" style="width:120px;"></textarea></td><td><textarea class="form-control" rows="" name="grade[]" id="grade" class="txtbox" placeholder="Grade" style="width:120px;"></textarea></td><td><textarea class="form-control" rows="" name="size[]" id="size" class="txtarea" readonly  style="width:120px;">As per drawing</textarea></td><td><textarea class="form-control" rows="" name="stage[]" id="stage" class="txtbox" placeholder="Stage"  style="width:120px;"></textarea></td><td><select class="form-control" rows="" name="qty[]" id="qty" class="select_qty" placeholder="Quantity" style="height:50px;width:100px"><option>1</option><option>2</option><option>3</option><option>4</option><option>5</option><option>6</option><option>7</option><option>8</option><option>9</option><option>10</option></select></td></tr>').insertAfter(".insp_detail:last");
                
                bind($row);
                i++;
                });
                
                  function bind($row) {
                      
                      /*autocomplete for item description*/
                      
                    $row.find("#item_desc").autocomplete({
                    source: function (request, response) {
                    $.ajax({
                    url: "<?php echo base_url(); ?>index.php/inspection/item_description",
                    data:{term: request.term},
                    dataType: "json",
                    type: "POST",
                    dataFilter: function (data) { return data; },
                    success: function (data) {
                        response($.map(data, function (item) { 
                        return {
                                   label: item.job_description,
                                   value: item.job_description,
                               }
                            }))
                        },
                    error: function (XMLHttpRequest, textStatus, errorThrown) {
                        alert(textStatus);
                    }
                    });
                    },
                    minLength: 1,
                });
                      
                    
                    /*autocomplete for material description*/
                       $row.find("#mat_desc").autocomplete({
                        source: function (request, response) {
                        $.ajax({
                            url: "<?php echo base_url(); ?>index.php/inspection/mat_desc",
                            data:{term: request.term},
                            dataType: "json",
                            type: "POST",
                            dataFilter: function (data) { return data; },
                            success: function (data) {
                            response($.map(data, function (item) {
                            $row.find("#grade").val(item.grade);
                            return {
                                       label: item.mat_desc,
                                       value: item.mat_desc,
                                       id: item.id
                                    }
                                }))
                            },
                    error: function (XMLHttpRequest, textStatus, errorThrown) {
                        alert(textStatus);
                    }
                    });
                    },
                    minLength: 1,
                    select: function (event , ui) {
                    var businessEntityId = ui.item.id;
                    $.ajax({
                        type: "POST",
                        data:{'id': businessEntityId},
                        dataType:"json",
                        url: "<?php echo base_url(); ?>index.php/inspection/grade_desc",//here we are calling our user controller
                        success: function(data) //we're calling the response json array 'data'
                        {
                            $row.find("#grade").val(data.grade);
                            
                        }
                    });
                    }
                });
                        }
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
        
       /*$(document).ready(function() {
                    
                    $("#ref_date").click(function(){
                    $( "#ref_date" ).datepicker();
                    });  
                    
                    $("#proposed_doi").click(function(){    
                    $( "#proposed_doi" ).datepicker();
                    
                    });
                    
                    }); */

                        /*function for validation*/
                            $("#submit").click(function(){
                            var ref_date = $("#ref_date").val();
                            var to_addr = $("#to_addr").val();
                            var loi = $("#loi").val();
                            var description=$("#description").val();
                            var drawing_no=$("#drawing_no").val();
                            var item_desc=$("#item_desc").val();
                            var size=$("#size").val();
                            var stage=$("#stage").val();
                            var proposed_doi=$("#proposed_doi").val();
                            
                            if(ref_date=='')
                            {
                                
                                $("#acc1").css("background-color","#f7c5c5");
                                $("<p class=pfont>fill the fields</p>").appendTo("#acc1");
                                
                                $("#ref_date").css("background-color","#f7c5c5");
                                $("#ref_date").click(function(){
                                   
                                   
                                   $("#acc1").css("background-color",'#9cc7fc');
                                   $(".pfont").remove();
                                   $("#ref_date").css("background-color","f5f5dc");
                                   
                                });
                                return false;
                            }
                            
                            else if(to_addr==''||loi==''||description==''||drawing_no=='')
                            {
                             
                                $("#acc2").css("background-color","#f7c5c5");
                                $("<p class=pfont>fill the fields</p>").appendTo("#acc2");
                                
                                
                                if(to_addr=='')
                                {
                                    $("#to_addr").css("background-color","#f7c5c5");
                                    $("#to_addr").click(function(){
                                    
                                        $("#acc2").css("background-color","#9cc7fc");
                                        $(".pfont").remove();
                                        $("#to_addr").css("background-color","f5f5dc");
                                        
                                    });
                                    
                                }
                                if(loi=='')
                                  {
                                    $("#loi").css("background-color","#f7c5c5");
                                    $("#loi").click(function(){
                                    
                                        $("#acc2").css("background-color","#9cc7fc");
                                        $(".pfont").remove();
                                        $("#loi").css("background-color","f5f5dc");
                                    }); 
                                  }
                                  if(description=='')
                                  {
                                    $("#description").css("background-color","#f7c5c5");
                                    $("#description").click(function(){
                                    
                                        $("#acc2").css("background-color","#9cc7fc");
                                        $(".pfont").remove();
                                        $("#description").css("background-color","f5f5dc");
                                    }); 
                                  }
                                  
                                  if(drawing_no=='')
                                  {
                                    $("#drawing_no").css("background-color","#f7c5c5");
                                    $("#drawing_no").click(function(){
                                    
                                        $("#acc2").css("background-color","#9cc7fc");
                                        $(".pfont").remove();
                                        $("#drawing_no").css("background-color","f5f5dc");
                                    }); 
                                  }
                                  
                                 return false;//$("#accordionTwo").removeClass();
                            }
                            
                            else if(item_desc==''||size==''||stage=='')
                            {
                                $("#acc2").css("background-color","#f7c5c5");
                                $("<p class=pfont>fill the fields</p>").appendTo("#acc2");
                                
                                  if(item_desc=='')
                                {
                                    $("#item_desc").css("background-color","#f7c5c5");
                                    $("#item_desc").click(function(){
                                    
                                        $("#acc2").css("background-color","#9cc7fc");
                                        $(".pfont").remove();
                                        $("#item_desc").css("background-color","f5f5dc");
                                        
                                    });
                                    
                                }
                                
                                 if(size=='')
                                {
                                    $("#size").css("background-color","#f7c5c5");
                                    $("#size").click(function(){
                                    
                                        $("#acc2").css("background-color","#9cc7fc");
                                        $(".pfont").remove();
                                        $("#size").css("background-color","f5f5dc");
                                        
                                    });
                                 }
                                 
                                if(stage=='')
                                {
                                    $("#stage").css("background-color","#f7c5c5");
                                    $("#stage").click(function(){
                                    
                                        $("#acc2").css("background-color","#9cc7fc");
                                        $(".pfont").remove();
                                        $("#stage").css("background-color","f5f5dc");
                                        
                                    });
                                 }
                                
                                return false;
                            }
                            
                            else if(proposed_doi=='')
                            {
                                $("#acc3").css("background-color","#f7c5c5");
                                $("<p class=pfont>fill the fields</p>").appendTo("#acc3");
                                $("#proposed_doi").click(function(){
                                $("#acc3").css("background-color","#9cc7fc");
                                $(".pfont").remove();
                                $("#proposed_doi").css("background-color","f5f5dc");
                                });
                                
                                
                                return false;
                            }
                            
                            else
                            {
                                return true;
                            }
                                
                            });
                            
                            
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
		<!--accordion-->
		<script src="<?php echo base_url();?>assets/girish/accordion1/external/jquery/jquery.js"></script>
		<script src="<?php echo base_url();?>assets/js/jquery-ui.js"></script>
		
		<script>

		$( "#accordion" ).accordion();
	
		// Hover states on the static widgets
		$( "#dialog-link, #icons li" ).hover(
			function() {
				$( this ).addClass( "ui-state-hover" );
			},
			function() {
				$( this ).removeClass( "ui-state-hover" );
			}
		);
	    </script>
    </body>
      
</html>