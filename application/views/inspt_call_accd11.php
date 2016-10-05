<html>
    <head>
        <title>
            Reynolds Chemequip Pvt. Ltd.
        </title>
        <link rel='stylesheet' type='text/css' href="<?php echo base_url("assets/css/bootstrap.min.css");?>" />
        <link rel="stylesheet" href="<?php echo base_url();?>assets/girish/css/insp.css"/>
       
        <!-- datepicker plugin-->
        <link rel='stylesheet' type='text/css' href="<?php echo base_url("assets/girish/datepicker/jquery-ui.css");?>" />
        <script type='text/javascript' src="<?php echo base_url("assets/girish/datepicker/jquery.js");?>"</script>
        <script type='text/javascript' src="<?php echo base_url("assets/girish/datepicker/jquery-ui.js");?>"></script>
        
        <script type='text/javascript' src="<?php echo base_url("assets/js/script.js");?>" ></script>
        <script src="<?php echo base_url();?>assets/js/jquery.js"></script>
     
        <script src="<?php echo base_url();?>assets/girish/bootstrap/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url();?>assets/js/jquery-2.1.4.min.js"></script>
        <script src="<?php echo base_url();?>assets/js/jquery-ui.js"></script>
        
        
        <script src="<?php echo base_url();?>assets/js/jquery-1.11.3.min.js"></script>
        <script scr="<?php echo base_url();?>assets/js/jquery-1.4.4.min.js"></script>
              
        <!--floating buttons-->
        <link rel='stylesheet' type='text/css' href="<?php echo base_url("assets/css/font-awesome.min.css");?>" />
        <script type='text/javascript' src="<?php echo base_url(); ?>assets/js/materialize.js"></script> 
        <link rel='stylesheet' type='text/css' href="<?php echo base_url("assets/css/materialize.css");?>" />
		
	<!--accordion-->
	<link href="<?php echo base_url("assets/girish/accordion1/css/jquery-ui.css");?>" rel="stylesheet">
	<!--background css from gatepass-->
        
        <link rel="stylesheet" href="<?php echo base_url("assets/css/gate_pass.css");?>">
        
        <style>
            .ui-autocomplete { height: 200px; overflow-x: hidden;width:200px;}
            #stalign
            {
                width: 200px; float: left; margin: 0 20px 0 0; 
            }
            #state,#pin
            {
                display:inline;
            }
            #obn_div
            {
                
            }
            #f
            {
              float:left;  
            }
            
            div.first
            {
                width: 60px;
                float: left;
            }

            div.second
            {
                margin-left: 375px;
                
            }
        </style>        
        <script>
            /*system date function*/
            $(document).ready(function(){
               var d= new Date();
               var month=d.getMonth()+1;
               var day=d.getDate();
               var output=((''+day).length<2?'0':'')+day+'-'+((''+month).length<2?'0':'')+month+'-'+d.getFullYear();
               document.getElementById("ref_date").value= output;
            }); 
           
            /*datepicker function for reference_date and proposed date of inspection*/
            $(function()
            {
                var weekday=new Array(7);
                weekday[0]="Sunday";
                weekday[1]="Monday";
                weekday[2]="Tuesday";
                weekday[3]="Wednesday";
                weekday[4]="Thursday";
                weekday[5]="Friday";
                weekday[6]="Saturday";

                //$( "#ref_date" ).datepicker({ dateFormat: 'dd-mm-yy' });
                $( "#proposed_doi" ).datepicker({
                    dateFormat: 'DD,dd-mm-yy',
                    changeYear:true,
                    changeMonth:true,
                    onSelect: function(dateText, inst) {
                    var day = dateText.split(",");            
                    
                    }
                });
                
            });
            
            /*reference num autogeneration*/
            $(document).ready(function()
            {
                var x = parseInt(document.getElementById("ref_no").value);
                var number= x+1;
                var new_ref = number >= 10 ? number : "0"+number.toString();
                var ref_num = 'RCPL/BGM/QC/'+new_ref;
                $('.ref1').val(ref_num);
                $('.ref_n').val(new_ref);
                var url="<?php echo base_url()?>index.php/inspection/print_ic/"+number;
                $("#url").val(url);
                $("#cal_ref").val(number);
            }); 
            /* autocomplete for obn_no*/     
            $(document).ready(function () 
            {
                $("#obn_num").autocomplete({
                    source: function (request, response) {
                        $.ajax({
                        url: "<?php echo base_url(); ?>index.php/inspection/obn_no",
                        data:{term: request.term},
                        dataType: "json",
                        type: "POST",
                        dataFilter: function (data) { return data; },
                        success: function (data) {
                            response($.map(data, function (item) {
                            return {
                                        label: item.obn_no,
                                        value: item.obn_no,
                                        id:item.id
                                    }
                                }))
                            },
                            error: function (XMLHttpRequest, textStatus, errorThrown) {
                            alert(textStatus);
                        }
                    });
                },
                minlength:1,
                select: function (event , ui) {
                    var businessEntityLabel = ui.item.id;
                      $.ajax({
                    type: "POST",
                    data:{'id': businessEntityLabel},
                    dataType:"json",
                    url: "<?php echo base_url(); ?>index.php/inspection/cust_details",//here we are calling our user controller
                    success: function(data) //we're calling the response json array 'data'
                    {
                        $('#customer_name').val(data.customer_name);
                        $('#address').val(data.address);
                        $('#address1').val(data.customer_address1);
                        $('#address2').val(data.customer_address2);
                        $('#city').val(data.city);
                        $('#state').val(data.state);
                        $('#pin').val(data.pin);
                        $('#po_dated').val(data.po_dated);
                        $('#po_no').val(data.po_no);
                        var obn_no = data.obn_no;
                         $.ajax({
                               type:"POST",
                               dataType:"json",
                               data:{'id':obn_no},
                               url:"<?php echo base_url();?>index.php/inspection/rcpl_nos",
                               success:function(item)
                               {
                                    for(i=0;i<=10;i++)
                                    {
                                        $("#sel").append('<option value=' + item[i].w_o_no + '>' + item[i].w_o_no+ '</option>');
                                        
                                    }
                                     
                               }
                            });
                    }
                });
                
                    
                }
            });
            
           
           
            $("#").autocomplete({
            source: function (request, response) {
                $.ajax({
                    url: "<?php echo base_url(); ?>index.php/inspection/obn_no",
                    data:{term: request.term},
                    dataType: "json",
                    type: "POST",
                   
                    success: function (data) {
                        response($.map(data, function (item) { 
                        return {
                                   label: item.obn_no,
                                   value: item.obn_no,
                                   id:item.id
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
                        url: "<?php echo base_url(); ?>index.php/inspection/cust_details",//here we are calling our user controller
                        success: function(data) //we're calling the response json array 'data'
                        {   
                           alert();
                            //alert(data.customer_name);
                           //$("#description").val(data.Description);
                            
                            var num=data.obn_no;
                            var i;
                            $.ajax({
                               type:"POST",
                               dataType:"json",
                               data:{'id':num},
                               url:"<?php echo base_url();?>index.php/inspection/rcpl_nos",
                               success:function(item)
                               {
                                    for(i=0;i<=10;i++)
                                    {
                                        $("#sel").append('<option value=' + item[i].w_o_no + '>' + item[i].w_o_no+ '</option>');
                                        
                                    }
                                     
                               }
                            });
                            
                        }
                    }); 
                    }
                });
                
                /*autocomplete for QC engineer name*/
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
                                }
                            });
                            });
        
        /*autocomplete for material description*/
        $(document).ready(function () {
           
                
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
                
                
                $("#change1").hide();
                $("#change2").hide();
                $("#change3").hide();
                
                /*autocomplete for stage selection*/
                
                
                $(function() {
    var availableTags = [
      "Material Identification",
      "Fitup",
      "Dishend",
      "Mockup",
      "WPS/PQR",
      "NDT(Die Penetrant Test)",
      "NDT(Magnetic Partical Test)",
      "NDT(Radiography)",
      "NDT(Ultrasonic)",
      "NDT(Hydrotest)",
      "NDT(Pneumatic)",
      "Dimension",
      "Painting",
      "Documentation/Final"
    ];
    function split( val ) {
      return val.split( /,\s*/ );
    }
    function extractLast( term ) {
      return split( term ).pop();
    }
 
    $( "#remarks" )
      // don't navigate away from the field on tab when selecting an item
      .bind( "keydown", function( event ) {
        if ( event.keyCode === $.ui.keyCode.TAB &&
            $( this ).autocomplete( "instance" ).menu.active ) {
          event.preventDefault();
        }
      })
      .autocomplete({
        minLength: 0,
        source: function( request, response ) {
          // delegate back to autocomplete, but extract the last term
          response( $.ui.autocomplete.filter(
            availableTags, extractLast( request.term ) ) );
        },
        focus: function() {
          // prevent value inserted on focus
          return false;
        },
        select: function( event, ui ) {
          var terms = split( this.value );
          // remove the current input
          terms.pop();
          // add the selected item
          terms.push( ui.item.value );
          // add placeholder to get the comma-and-space at the end
          terms.push( "" );
          this.value = terms.join( ", " );
          return false;
          
          
        }
      });
  });
             
                
                
               
                });
              
                /*auto complete for material identification*/
           $(function() {
    var availableTags = [
      "Plate",
      "Pipe",
      "Forgings",
      "Tubes",
      "Pipe Fittings",
      "Gasket",
      "Fasteners"
    ];
    function split( val ) {
      return val.split( /,\s*/ );
    }
    function extractLast( term ) {
      return split( term ).pop();
    }
 
    $( "#mat_desc" )
      // don't navigate away from the field on tab when selecting an item
      .bind( "keydown", function( event ) {
        if ( event.keyCode === $.ui.keyCode.TAB &&
            $( this ).autocomplete( "instance" ).menu.active ) {
          event.preventDefault();
        }
      })
      .autocomplete({
        minLength: 0,
        source: function( request, response ) {
          // delegate back to autocomplete, but extract the last term
          response( $.ui.autocomplete.filter(
            availableTags, extractLast( request.term ) ) );
        },
        focus: function() {
          // prevent value inserted on focus
          return false;
        },
        select: function( event, ui ) {
          var terms = split( this.value );
          // remove the current input
          terms.pop();
          // add the selected item
          terms.push( ui.item.value );
          // add placeholder to get the comma-and-space at the end
          terms.push( "" );
          this.value = terms.join( ", " );
          return false;
        }
      });
  });
            

        
        
        
        
        </script>
		
		<style>
            #ref1,#doi,#label2
            { 
                width:55%;
                height:10%;
            }
            #sidebar,#label_doi,#wo
            {
                width:40%;
                height: 100%;
                float: left;
            }
            #page-wrap,#input_doi,#wov
            {
                width: 50%;
                height: 100%;
                margin-left: 40%;
            }
            
            
        </style>
    </head>
    

    <body>
        <form name="inps1" method='post' action="<?php echo base_url("index.php/inspection/saveInspection");?>" >
            <?php //$refval=$ref_no->ref_no;  $refval++; ?>
            <input type="hidden" id="ref_no" name="ref_no"  value="<?= $ref_no->ref_no;?>"/>   
            
          
            
            <div class="container">
		<div class="row">
                    <div class="cols-md-6">
			<div style="font-family:Helvetica;float:left;width: 80%">
                            <center>
                                <img src="<?php echo base_url();?>assets/images/inspection.jpg" alt="Reynolds Chemequip" width="100%" height="150" style="float:right;" />
                            </center>	
			</div>
                    </div>	
		</div>	
                            <!-- Accordion -->

    <h2 class="demoHeaders"><center>Inspection Call</center></h2>
	<div id="accordion">
            
            
            <h1 style="background:#428bca;color:white" id="acc1">Supplier/Customer Detail</h1>
    <div>
        <div class="form-style-4" >
            <div class="form-group required">
                <label for="field1">
                    <span align="left" class='control-label'>Ref.No.</span> <input type="text" name="ref_num" class="ref1" title="Reference Number" readonly >
                </label>
                <label for="field1">
                    <span align="left" class='control-label'>OBN NO.</span>: <input type="text" name="obn_no" id="obn_num" required="required" placeholder="Enter OBN NO."/>
                </label>
                <label for="field1">
                    <span align="left" class='control-label'>Customer Name</span>: <input type="text" name="customer_name" class="name" id="customer_name" required="required" />
                </label>
                <label for="field1">
                    <span align="left">Address</span>: <input type="text" name="address" id="address"/>
                </label>
                <label for="field2">
                    <span align="left">&nbsp;</span>: <input type="text" name="address1" id="address1"  />
                </label> 
                 <label for="field2">
                    <span align="left">&nbsp;</span>: <input type="text" name="address2" id="address2"  />
                </label> 
                <label for="field2">
                    <span align="left">City</span>: <input type="text" name="city" id="city"/> 
                </label> 
                <label for="field2">
                    <span align="left">PIN</span>: <input type="text" name="pin_cose" id="pin"/> 
                </label> 
                <label for="field2">
                    <span align="left">State</span>: <input type="text" name="state" id="state" /> 
                </label> 
                 <label for="field2">
                    <span align="left">PO No.</span>: <input type="text" name="po_no" id="po_no" /> 
                </label> 
                 <label for="field2">
                    <span align="left">PO Dated</span>: <input type="text" name="po_dated" id="po_dated"/> 
                </label> 
                
            </div>
        </div>
    </div>
            
            <div id="acc1"><!--accordion 1 title-->
                <font class="ac_title2">
                        Address and Letter of Indent 
                </font>
		<span style="float:right;color: #FFFFFF;"><b><?php   echo date("d-m-y"); ?></b></span>
            </div>
	    <div>
		<div class="form-style-4">
                    <div class="container-fluid"><!--accordion 1 body-->
			<div class="topbrdr">
                            <div class="row">
				<div class="distance" >
                                    <div class="col-md-4" id="ref1">
					<div id="sidebar" style="width:15%;"><label class="l1 ref">Ref.No.:</label></div>
                                            <div id="page-wrap" style="margin-left: 18%"><input type="text" name="ref_num" class="ref1" title="Reference Number" readonly style="width:65%"></div>
						<input type="hidden" name="ref_n" class="ref_n"/>
                                    </div>
                                    <div class="col-md-4" id="lab">
					<div id="label" style="margin-left:20px;margin-top:-7%;">
                                            <label for="ref_date" class="l1"></label><br>
						<input type="hidden" name="ref_date" id="ref_date"/><br><br>
					</div>
                                    </div>    
				</div>        
                            </div>
			</div>
                    </div>   
                    <div class="container-fluid" style="margin-left:20px;">    
			<div class="row">
                            <div class="distance1">
				<div class="col-md-4 addr" style="padding:1px 1px 1px 1px;margin-left:-10px;width:80%;">
                                    <div class="first">
					<textarea name="obn_no" id="obn_no" placeholder="OBN Number" title="Type the OBN NO."rows="1" ></textarea>
                                    </div>
                                    <div class="second">
					<textarea name="loi" id="loi" rows="1" Placeholder="Letter of Indent/P.O.No." title="Letter Of Indent/P.O. No." readonly style="width:80%;height:5%"></textarea>
                                        <br><textarea name="dated" id="dated" rows="1" placeholder="P.O date" title="Date of P.O. No." readonly style="width:50%;height:6%;border:none;"></textarea>
                                    </div>
					<br><textarea  name="customer" id="customer" rows="1" class="customer" style="width:40%;" title="Customer Name"readonly></textarea><br>
                                        <textarea  name="to_addr" id="to_addr" rows="1" cols="8" class="to_addr" title="Address" style="width:50%;height:12%" readonly></textarea><br>
                                        <textarea  name="city" id="city"  rows="1" cols="1" class="city" title="City" style="width:20%;" readonly></textarea><br>
					<textarea  name="state" id="state"  rows="1" cols="1" class="state" title="State"style="width:13%;" readonly></textarea>
					<!--
					<textarea  name="country" id="country" rows="1" cols="1" class="country" style="width:95%;" readonly></textarea><br>-->
					<textarea  name="pin" id="pin" rows="1" cols="1" class="pin" title="PIN Code" style="width:30%;" readonly></textarea><br>
					<!--
					<textarea  name="c_phone" id="c_phone" rows="1" cols="10" class="c_phone" style="width:95%;" readonly></textarea>-->
				</div> 
				<div class="col-md-4 cred">
                                    <!--<textarea name="dloi" id="dloi" placeholder="Letter of Indent" rows="1" class="form-control" style="width:100%"></textarea><br>-->
                                    <!--<br><textarea name="description" id="description" placeholder="Description" rows="3" class="description" style="width:95%" readonly></textarea><br>
                                    <!--<textarea name="drawing_no" id="drawing_no"  placeholder="RCPL Drawing No." rows="1" class="form-control" style="width:100%"></textarea><br>-->
				</div>
                            </div>
			</div>			
                    </div> 
		</div>
            </div>        
	    <div id="acc2">
                <font  class="ac_title4"><!--accordion 2 title-->
                    Inspection Details
                </font>
            </div>    
            <div>
		<div class="form-style-4">
                    <div class="distance3">
			<i id="addengg1" class="glyphicon glyphicon-plus add1" title="Add Engineer Name"></i>
			<i id="removeengg1"class="glyphicon glyphicon-minus remove1" title="Remove Engineer Name"></i>
                        <div class="check">
                            <input type="text" name="engineer_name" id="engineer_name" style="width:30%;" placeholder="Engineer Name" title="Type Engineer Name"/>
                        </div>
                    </div>
                    <div style="clear:both"></div>
                        <div id="change">
			<div class="table-responsive"><!--accordion 2 body-->
                            <br> 
                            <table  class="table table-bordered test"> 
                                <tr class="insp_mat" style=" background-color: #eeeeee;">
                                    <th align="center">Sr.No.</th>
                                    <th align="center">W/O No.</th>
                                    <th align="center">Item Description</th>
                                    <th align="center">Material</th>
                                    <th align="center">Stage</th>
                                </tr>
                                <tr class="insp_mat_detail">
                                    <td align="center" name="sr_no[]" id="sr_no" style="width:6%">
                                	1
                                    </td>
                                    <td style="width:15%;">   
                                        <select id="sel" name="sel[]" style="width:80%; height:90%; border:none;" title="Select the work order number">
                                            <option>select</option>
                                        </select>
                                    </td>
                                    <td align="center" style="width:30%">
                                        <textarea name="item_desc[]" id="item_desc" class="txtbox" placeholder="Item Description" style="width:100%;" title="Description of all items used" readonly></textarea>
                                    </td>
                                    <td align="center" style="width:20%">
                                        <textarea rows="" name="mat_desc[]" id="mat_desc" class="txtbox" placeholder="Material used" title="Different Materials used in making the item" style="width:70%;"></textarea>
                                    </td>
                                    <td align="center" style="width:20%;" >
                                        <textarea name="remarks[]" id="remarks" class="txtbox" placeholder="Stage" style="width:80%;border:none;" title="Select the stage"></textarea>
                                    </td>
                                </tr>
                            </table>
                            <div>
                                <a href="javascript:;" title="Add a row" ><span class="glyphicon glyphicon-plus plusbtn1"></span></a>
                                <a href="javascript:;" title="Remove the row"><span class="glyphicon glyphicon-minus minusbtn1"></span></a>
                            
					</div>
                </div>
				</div>
                            
                            
            </div>         
                   
        </div>
                
             
	
	<div id="acc3"><!--accordion 6 title-->
		<font  class="ac_title6">
			Contact Person details
		</font>
	</div>
	
        <div>
            <div class="form-style-4">
                <div class="container-fluid">
                    <div id="distance2">
                        <div class="row">
                            <div class="col-md-4" id="doi" style="margin-left:-15%;">
                            	<div id="label_doi" style="width:55%;margin-left:-9%;"><label for="proposed_doi" class="pdoi">Proposed date of Inspection:</label></div>
                                <div id="input_doi"><input type="text" name="proposed_doi" id="proposed_doi" placeholder="dd-mm-yy"  style="width:80%;margin-left: 2%;" title="Enter Proposed Date Of Inspsection"/></div>
                            </div>
                            
                            <div class="col-md-4">
				<div id="label2" style="width:100%">        
                                    <div id="wo"><label for="weekly_off" class="wo">Weekly Off:</label></div>
                                    <div id="wov"><input type="text" name="weekly_off" id="weekly_off" value="Sunday" readonly style="border:none;width:100%;"/></div>
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
                                        <td style="width:20%;">
                                            <textarea  name="contact_person" id="contact_person" placeholder="Contact Person" style="width:80%;" title="Enter Contact Person Name"></textarea>
                                        </td>
                                                            
                                        <td style="width:15%;">
                                            <textarea  name="phone" id="phone" placeholder="Telephone No." title="Contact Person's Telephone Number" style="width:100%;" readonly ></textarea>
                                        </td>
                                                            
                                        <td>
                                            <textarea  name="email" id="email" placeholder="E-mail" style="width:100%;" title="Contact Person's E-mail Id" readonly></textarea>
                                        </td>
                                                            
                                        <td>
                                            <textarea name="poi" id="poi" placeholder="Place of Inspection" style="width:100%;" title="Location of Inspection" readonly></textarea>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <input type='hidden' name='status' value='Pending'/>
                            <input type="hidden" name="trim_doi" id="trim_doi"/>
                            <input type="hidden" name="url" id="url"/>
                            <input type="hidden" name="dept" value="QC_Inspection"/>
                            <input type="hidden" name="cal_insp_ref" id="cal_ref"/>
                        </div>
                    </div>   
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
                    <li><a class="btn-floating orange darken-1" data-placement="bottom" title="View Inspection Call List" href="<?php echo base_url();?>index.php/inspection/view_ic_list"><i class="glyphicon glyphicon-eye-open"></i></a></li>
                    <li><a class="btn-floating green"  data-placement="bottom" title="Create New Inspection Call!" href="<?php echo base_url();?>index.php/inspection"><i class="glyphicon glyphicon-file"></i></a></li>
                    <li><button type="submit" name = "submit" class="btn-floating blue" data-placement="bottom" title="Save" id="submit"><span class="glyphicon glyphicon-floppy-save"></span></button></li>
                    <li><a class="btn-floating grey"  data-placement="bottom" title="Go Back!"  href="javascript:window.history.go(-1);"><i class="glyphicon glyphicon-arrow-left"></i></a></li>    
                </ul>
                           
			</div>
                           
        
            <h5 style="margin-left:200px;margin-top:140px;"><center>*Kindly organize to depute your Inspection Engineer on the above proposed date with prior intimation.</center></h5>
       </form>     
      
<script>
    /* */
    $(document).ready(function(){
        desc()
        });
       function desc(){
           $row.find("#sel").change(function()
                    var i;
                    var got=$row.find("#sel option:selected").text();
                    
                    $.ajax({
                            type: "POST",
                            url: "<?php echo base_url(); ?>index.php/inspection/items_description",
                            dataType: 'json',
                            data: {term: got},
                            success: function(res){
                                for(i=0;i<=10;i++)
                                {
                                       $row.find("#item_desc").val(res[i].description);
                                    
                                }
                            } 
                 
            
                    });
    });
        }

    
    
   /*get fields on stage selection */
    $(document).ready(function(){
        
       $("#stage").change(function(){
           
       })
    });
    
    
          
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
                
                
                /* binding for material identification*/    
                
          
           $(document).ready(function(){
                i=2; 
                $('.plusbtn1').click(function() {
               
                var $row = $('<tr class="insp_mat_detail"><td align="center">'+i+'</td><td id="sel1"><select name="sel[]" id="sel" style="width:80%; height:90%; border:none;"><option>select</option></select></td><td align="center"><textarea name="item_desc[]" id="item_desc" class="txtbox" placeholder="Item Description" style="width:100%;"></textarea></td><td align="center"><textarea  rows="" name="mat_desc[]" id="mat_desc" class="txtbox" placeholder="Material used" style="width:70%;"></textarea></td><td align="center"><textarea rows="" name="remarks[]" id="remarks" class="txtbox" placeholder="Stage" style="width:80%;border:none;"></textarea></td></tr>').insertAfter(".insp_mat_detail:last");
                
                bind($row);
                i++;
                });
                
                  function bind($row) {
                      
                      /*autocomplete for item description*/
                      
                $(function() {
    var availableTags = [
      "Plate",
      "Pipe",
      "Forgings",
      "Tubes",
      "Pipe Fittings",
      "Gasket",
      "Fasteners"
    ];
    function split( val ) {
      return val.split( /,\s*/ );
    }
    function extractLast( term ) {
      return split( term ).pop();
    }
 
    $row.find( "#mat_desc" )
      // don't navigate away from the field on tab when selecting an item
      .bind( "keydown", function( event ) {
        if ( event.keyCode === $.ui.keyCode.TAB &&
            $( this ).autocomplete( "instance" ).menu.active ) {
          event.preventDefault();
        }
      })
      .autocomplete({
        minLength: 0,
        source: function( request, response ) {
          // delegate back to autocomplete, but extract the last term
          response( $.ui.autocomplete.filter(
            availableTags, extractLast( request.term ) ) );
        },
        focus: function() {
          // prevent value inserted on focus
          return false;
        },
        select: function( event, ui ) {
          var terms = split( this.value );
          // remove the current input
          terms.pop();
          // add the selected item
          terms.push( ui.item.value );
          // add placeholder to get the comma-and-space at the end
          terms.push( "" );
          this.value = terms.join( ", " );
          return false;
        }
      });
  });
            
            $row.find("#sel1").bind("click",function(){
            $(this).unbind("click");
            var i;
            var obn_no=$("#obn_no").val();
            $.ajax({
                    type: "POST",
                    url: "<?php echo base_url(); ?>index.php/inspection/binded_sel",
                    dataType: 'json',
                    data: {term: obn_no},
                    success: function(item){
                        for(i=0;i<=10;i++)
                            {
                                $row.find("#sel").append('<option value=' + item[i].w_o_no + '>' + item[i].w_o_no+ '</option></br>');
                            }
                        
                    } 
            });
            
            
            
            });
            
            
                 $row.find("#sel").change(function(){
                    var i;
                    var got=$row.find("#sel option:selected").text();
                    $.ajax({
                            type: "POST",
                            url: "<?php echo base_url(); ?>index.php/inspection/items_description",
                            dataType: 'json',
                            data: {term: got},
                            success: function(res){
                                for(i=0;i<=10;i++)
                                {
                                    $row.find("#item_desc").val(res[i].description);
                                    
                                }
                            } 
                 
            
                    });
    });
            
            
            
            $(function() {
    var availableTags = [
      "Material Identification",
      "Fitup",
      "Dishend",
      "Mockup",
      "WPS/PQR",
      "NDT(Die Penetrant Test)",
      "NDT(Magnetic Partical Test)",
      "NDT(Radiography)",
      "NDT(Ultrasonic)",
      "NDT(Hydrotest)",
      "NDT(Pneumatic)",
      "Dimension",
      "Painting",
      "Documentation/Final"
    ];
    function split( val ) {
      return val.split( /,\s*/ );
    }
    function extractLast( term ) {
      return split( term ).pop();
    }
 
    $row.find( "#remarks" )
      // don't navigate away from the field on tab when selecting an item
      .bind( "keydown", function( event ) {
        if ( event.keyCode === $.ui.keyCode.TAB &&
            $( this ).autocomplete( "instance" ).menu.active ) {
          event.preventDefault();
        }
      })
      .autocomplete({
        minLength: 0,
        source: function( request, response ) {
          // delegate back to autocomplete, but extract the last term
          response( $.ui.autocomplete.filter(
            availableTags, extractLast( request.term ) ) );
        },
        focus: function() {
          // prevent value inserted on focus
          return false;
        },
        select: function( event, ui ) {
          var terms = split( this.value );
          // remove the current input
          terms.pop();
          // add the selected item
          terms.push( ui.item.value );
          // add placeholder to get the comma-and-space at the end
          terms.push( "" );
          this.value = terms.join( ", " );
          return false;
          
          
        }
      });
  });
            
            
            
            
           }
                });
        
       
       
	$('.minusbtn1').click(function() {
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
                
          /*binding for fitup*/
           $(document).ready(function(){
               i=2; 
               
                $('.plusbtn2').click(function() {
                   
                   var $row = $('<tr class="insp_fitup_detail"><td align="center">'+i+'</td><td align="center"><textarea class="form-control" name="fit_item_desc[]" id="fit_item_desc" class="txtbox" placeholder="Item Description" style="width:90%;"></textarea></td><td align="center"><textarea class="form-control"  name="fit_mat_desc[]" id="fit_mat_desc" class="txtbox" placeholder="fitup" style="width:90%;"></textarea></td><td align="center"><textarea class="form-control"  name="fit_remarks[]" id="fit_remarks" class="txtbox" placeholder="remarks" style="width:80%;"></textarea></td></tr>').insertAfter(".insp_fitup_detail:last");

                   bind($row);
                   i++;
                });
                
                function bind($row) {
                    
                $row.find("#fit_mat_desc").autocomplete({
                    source: function (request, response) {
                    $.ajax({
                    url: "<?php echo base_url(); ?>index.php/inspection/fitup_mat_description",
                    data:{term: request.term},
                    dataType: "json",
                    type: "POST",
                    success: function (data) {
                        response($.map(data, function (item) { 
                        return {
                                   label: item.fitup_des,
                                   value: item.fitup_des
                               }
                            }))
                        },
                    error: function (XMLHttpRequest, textStatus, errorThrown) {
                        alert(textStatus);
                    }
                    });
                    },
                    minLength: 1
                });    
                
               
            }
                
                
                });
                
                
                $('.minusbtn2').click(function() {
		if($(".fit_test tr").length != 2)
			{
				$(".fit_test tr:last-child").remove();
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
        
          /*binding for dish-end*/      
         $(document).ready(function(){
               i=2; 
               
                $('.plusbtn3').click(function() {
                   
                   var $row = $('<tr class="insp_de_detail"><td align="center">'+i+'</td><td align="center"><textarea class="form-control" name="de_item_desc[]" id="de_item_desc" class="txtbox" placeholder="Item Description" style="width:90%;"></textarea></td><td align="center"><textarea class="form-control"  name="de_mat_desc[]" id="de_mat_desc" class="txtbox" placeholder="Dish-end" style="width:90%;"></textarea></td><td align="center"><textarea class="form-control"  name="de_remarks[]" id="de_remarks" class="txtbox" placeholder="remarks" style="width:80%;"></textarea></td></tr>').insertAfter(".insp_de_detail:last");

                   bind($row);
                   i++;
                });
                
                function bind($row) {
                    
                $row.find("#de_mat_desc").autocomplete({
                    source: function (request, response) {
                    $.ajax({
                    url: "<?php echo base_url(); ?>index.php/inspection/de_mat_description",
                    data:{term: request.term},
                    dataType: "json",
                    type: "POST",
                    success: function (data) {
                        response($.map(data, function (item) { 
                        return {
                                   label: item.de_des,
                                   value: item.de_des
                               }
                            }))
                        },
                    error: function (XMLHttpRequest, textStatus, errorThrown) {
                        alert(textStatus);
                    }
                    });
                    },
                    minLength: 1
                });    
                
               
            }
             });
               
            $('.minusbtn3').click(function() {
		if($(".de_test tr").length != 2)
			{
				$(".de_test tr:last-child").remove();
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
             
             /* binding for Mockup inspection*/
             
             $(document).ready(function(){
               i=2; 
               
                $('.plusbtn4').click(function() {
                   
                   var $row = $('<tr class="insp_mu_detail"><td align="center">'+i+'</td><td align="center"><textarea class="form-control" name="mu_item_desc[]" id="mu_item_desc" class="txtbox" placeholder="Item Description" style="width:90%;"></textarea></td><td align="center"><textarea class="form-control"  name="mu_mat_desc[]" id="mu_mat_desc" class="txtbox" placeholder="Mockup" style="width:90%;"></textarea></td><td align="center"><textarea class="form-control"  name="mu_remarks[]" id="mu_remarks" class="txtbox" placeholder="remarks" style="width:80%;"></textarea></td></tr>').insertAfter(".insp_mu_detail:last");

                   bind($row);
                   i++;
                });
                
                function bind($row) {
                    
                $row.find("#mu_mat_desc").autocomplete({
                    source: function (request, response) {
                    $.ajax({
                    url: "<?php echo base_url(); ?>index.php/inspection/mu_mat_description",
                    data:{term: request.term},
                    dataType: "json",
                    type: "POST",
                    success: function (data) {
                        response($.map(data, function (item) { 
                        return {
                                   label: item.de_des,
                                   value: item.de_des
                               }
                            }))
                        },
                    error: function (XMLHttpRequest, textStatus, errorThrown) {
                        alert(textStatus);
                    }
                    });
                    },
                    minLength: 1
                });    
                
               
            }
             });
               
            $('.minusbtn4').click(function() {
		if($(".mu_test tr").length != 2)
			{
				$(".mu_test tr:last-child").remove();
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
        
        
        
        /* binding for WPS/PQR inspection*/
             
             $(document).ready(function(){
               i=2; 
               
                $('.plusbtn5').click(function() {
                   
                   var $row = $('<tr class="insp_wp_detail"><td align="center">'+i+'</td><td align="center"><textarea class="form-control" name="wp_item_desc[]" id="wp_item_desc" class="txtbox" placeholder="Item Description" style="width:90%;"></textarea></td><td align="center"><textarea class="form-control"  name="mu_mat_desc[]" id="mu_mat_desc" class="txtbox" placeholder="Mockup" style="width:90%;"></textarea></td><td align="center"><textarea class="form-control"  name="wp_remarks[]" id="wp_remarks" class="txtbox" placeholder="remarks" style="width:80%;"></textarea></td></tr>').insertAfter(".insp_wp_detail:last");

                   bind($row);
                   i++;
                });
                
                function bind($row) {
                    
                $row.find("#wp_mat_desc").autocomplete({
                    source: function (request, response) {
                    $.ajax({
                    url: "<?php echo base_url(); ?>index.php/inspection/wp_mat_description",
                    data:{term: request.term},
                    dataType: "json",
                    type: "POST",
                    success: function (data) {
                        response($.map(data, function (item) { 
                        return {
                                   label: item.wp_des,
                                   value: item.wp_des
                               }
                            }))
                        },
                    error: function (XMLHttpRequest, textStatus, errorThrown) {
                        alert(textStatus);
                    }
                    });
                    },
                    minLength: 1
                });    
                
               
            }
             });
               
            $('.minusbtn5').click(function() {
		if($(".wp_test tr").length != 2)
			{
				$(".wp_test tr:last-child").remove();
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
        
        
        
        
             
            /*function for validation*/
                            $("#submit").click(function(){
                            var obn_no=$("#obn_no").val();
                            var sel=$("#sel").val()
                            var mat_desc=$("#mat_desc").val();
                            var remarks=$("#remarks").val();
                            var proposed_doi=$("#proposed_doi").val();
                            var contact_person=$("#contact_person").val();
                            
                            if(obn_no=='')
                            {
                                
                                $("#acc1").css("background-color","#f7c5c5");
                                $("<p class=pfont>fill the fields</p>").appendTo("#acc1");
                                
                                
                                $("#obn_no").css("background-color","#f7c5c5");
                                $("#obn_no").click(function(){
                                   
                                   
                                   $("#acc1").css("background-color",'#428bca');
                                   $(".pfont").remove();
                                   $("#obn_no").css("background-color","f5f5dc");
                                   
                                });
                                return false;
                            }
                            
                            else if(sel==''||mat_desc==''||remarks=='')
                            {
                             
                                $("#acc2").css("background-color","#f7c5c5");
                                $("<p class=pfont>fill the fields</p>").appendTo("#acc2");
                                
                                
                                
                                if(mat_desc=='')
                                  {
                                    $("#mat_desc").css("background-color","#f7c5c5");
                                    $("#mat_desc").click(function(){
                                    
                                        $("#acc2").css("background-color","#428bca");
                                        $(".pfont").remove();
                                        $("#mat_desc").css("background-color","f5f5dc");
                                    }); 
                                  }
                                  if(remarks=='')
                                  {
                                    $("#remarks").css("background-color","#f7c5c5");
                                    $("#remarks").click(function(){
                                    
                                        $("#acc2").css("background-color","#428bca");
                                        $(".pfont").remove();
                                        $("#remarks").css("background-color","f5f5dc");
                                    }); 
                                  }
                                 return false;
                            }
                            
                            else if(proposed_doi==''||contact_person=='')
                            {
                                $("#acc3").css("background-color","#f7c5c5");
                                $("<p class=pfont>fill the fields</p>").appendTo("#acc3");
                                
                                  if(proposed_doi=='')
                                {
                                    $("#proposed_doi").css("background-color","#f7c5c5");
                                    $("#proposed_doi").click(function(){
                                    
                                        $("#acc3").css("background-color","#428bca");
                                        $(".pfont").remove();
                                        $("#proposed_doi").css("background-color","f5f5dc");
                                        
                                    });
                                    
                                }
                                
                                if(contact_person=='')
                                {
                                  $("#contact_person").css("background-color","#f7c5c5");
                                  $("#contact_person").click(function(){
                                    
                                  $("#acc3").css("background-color","#428bca");
                                  $(".pfont").remove();
                                  $("#contact_person").css("background-color","f5f5dc");
                                    }); 
                                }
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
        
                 /*trim the proposed date of inspection*/
               
               
               $("#contact_person").click(function(){
                   var str=$("#proposed_doi").val();
                   var trim_doi=str.split(',').pop();
                   var first=trim_doi.substr(0,trim_doi.indexOf('-'));
                   var second=trim_doi.substr(3,trim_doi.indexOf('-'));
                   var last=str.substr(str.length - 4);
                   var cal_date=last+"-"+second+"-"+first;
                   $("#trim_doi").val(cal_date);
               });
        
	    </script>
        </body>
      
</html>