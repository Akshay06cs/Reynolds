<html>
    <head>
        <title>
            Inspection call
        </title>
        
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <link rel='stylesheet' type='text/css' href="<?php echo base_url("assets/css/bootstrap.min.css");?>" />
        <link rel="stylesheet" href="<?php echo base_url();?>assets/girish/css/insp.css"/>
        <!-- datepicker plugin
        <link rel='stylesheet' type='text/css' href="<?php echo base_url("assets/girish/datepicker/jquery-ui.css");?>" />
        <script type='text/javascript' src="<?php echo base_url("assets/girish/datepicker/jquery.js");?>"</script>
        <script type='text/javascript' src="<?php echo base_url("assets/girish/datepicker/jquery-ui.js");?>"></script>-->
        
        <link rel='stylesheet' type='text/css' href="<?php echo base_url("assets/css/jquery-ui.css");?>" />
        <!--
        <script type='text/javascript' src="<?php //echo base_url("assets/js/jquery-1.3.2.min.js");?>"></script>-->
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
        
        <script src="<?php echo base_url();?>assets/validation/jquery.etformvalidation.js" type="text/javascript"></script>
        
                
        <!--floating buttons-->
        <link rel='stylesheet' type='text/css' href="<?php echo base_url("assets/css/font-awesome.min.css");?>" />
        <script type='text/javascript' src="<?php echo base_url(); ?>assets/js/materialize.js"></script> 
        <link rel='stylesheet' type='text/css' href="<?php echo base_url("assets/css/materialize.css");?>" />
        
        <style>
            .ui-autocomplete { height: 200px; overflow-y: scroll; overflow-x: hidden;}
            #stalign
            {
                width: 200px; float: left; margin: 0 20px 0 0; 
            }
            #state,#pin
            {
                display:inline;
            }
        </style>        
        <script>
        $(document).ready(function(){
            $(function(){
                $("#proposed_doi" ).datepicker({dateFormat:'dd-mm-yy'});
            });
            
            
            $("#obn_no").autocomplete({
            source: function (request, response){
                $.ajax({
                   url: "<?php echo base_url(); ?>index.php/inspection/obn_no",
                   data:{term: request.term},
                   dataType: "json",
                   type: "POST",
                   success: function (data){
                                response($.map(data, function (item) { 
                                return {
                                        label: item.obn_no,
                                        value: item.obn_no,
                                        id:item.id
                                        };
                            }));
                        },
                    error:function (XMLHttpRequest, textStatus, errorThrown) {
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
                            $("#customer").val(data.customer_name);
                            $("#to_addr").val(data.customer_addr);
                            $("#city").val(data.city);
                            $("#state").val(data.state);
                            $("#country").val(data.country);
                            $("#pin").val(data.pin);
                            $("#c_phone").val(data.phone);
                            $("#dloi").val(data.po_no);
                            $("#appsel").empty();
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
                                  
                                  $('#appsel').append('<center><select id="sel" name="sel[]" style="border:none;"><option value="" selected>Select</option></select><center>');
                                                for(var i=0;i<10;i+=1)
                                                    {
                                                        $('#sel').append('<option value="'+item[i].w_o_no+'">'+item[i].w_o_no+'</option>');
                                                    }
                                      
                               }
                            });
                            
                        }
                    }); 
                    }
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
                                }
                            });
                            
                            
                            
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
                
               $("body").on('change', "#sel", function(){
                    var i;
                    var got=$("#sel option:selected").text();
                    $.ajax({
                            type: "POST",
                            url: "<?php echo base_url(); ?>index.php/inspection/items_description",
                            dataType: 'json',
                            data: {term: got},
                            success: function(res){
                                for(i=0;i<=10;i++)
                                {
                                    $("#item_desc").val(res[i].description);
                                    
                                }
                            } 
                        });
                });
                });
                
    
        $(function(){
            var availableTags = [
            "Plate",
            "Pipe",
            "Forgings",
            "Tubes",
            "Pipe Fittings",
            "Gasket",
            "Fasteners",
            "Casting",
            "Flanges",
            "Profiles",
            "Dishend",
            "Baffels",
            "Electrodes",
            "Elbow"
        ];
        function split( val ) {
            return val.split( /,\s*/ );
        }
        
        function extractLast( term ) {
            return split( term ).pop();
        }
 
    $("#mat_desc")
      // don't navigate away from the field on tab when selecting an item
      .bind( "keydown", function( event ) {
        if ( event.keyCode === $.ui.keyCode.TAB &&
            $(this).autocomplete( "instance" ).menu.active ) {
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
         
      
        </script>

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
    div.one
    {
        width: 60px;
        float: left;
    }

    div.two
    {
        margin-left: 60px;
        margin-top:-9px;
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
            
            <center>
                <h3>
                    <u>
                        Inspection Call
                    </u>
                </h3>
            </center>
		<form action="<?= base_url("index.php/inspection/updateInspection");?>" method="post" name="insp">
                    
                    <input type="hidden" name="ref_no" id="ref_no" value="<?php echo $ref=$r->ref_no; ?>"/>
                    
                    <label for="ref_n">Ref.No. :</label>
                        <input type="text" name="ref_n" id="ref_n" class="ref" value="RCPL/BGM/QC/<?= $r->ref_no;?>" readonly style="border:none;"/></br>
                    
                        <div class="one">
                            <label for="ref_date"  style="margin-left:20px;">Date:</label>
                        </div>    
                        
                        <div class="two">
                            <input type="text" name="ref_date" id="ref_date" value="<?= $r->date;?>" readonly/><br>
                        </div>
                        
                        <hr> 
                                    
                                    <div style="width: 100%;" >
                                        <div style="float:left; width: 30%; margin-left:20px;">
                                            <h4 class="to">
                                                To,
                                            </h4>
                                                <div style="margin-left:20px;">
                                                    <textarea  name="customer" id="customer" placeholder="Customer" rows="1" cols="50" style="border:none;" readonly><?= $r->customer;?></textarea><br>
                                                    <textarea  name="to_addr" id="to_addr" placeholder="Address" rows="3" cols="20" readonly><?= $r->to_addr;?></textarea><br>
                                                    <textarea  name="city" id="city" placeholder="city" rows="1" rows="5" cols="20" readonly style="border:none;"><?= $r->city;?></textarea><br>
                                                    <textarea  name="state" id="state" placeholder="state" rows="1" cols="10" style="border:none;" readonly><?= $r->state;?></textarea>
                                                    <textarea  name="pin" id="pin" placeholder="pin" rows="1" cols="10" style="border:none;" readonly><?= $r->pin;?></textarea><br>
                                                </div> 
                                        </div>    
                        
                        <div class="table-responsive" style="float:right;width: 50%; margin-top:40px;">                    
                            <table class="table table-striped">
                                <tbody>
                                    <tr><th>Letter of Indent</th><td>RCPL/BGM/QC/<?= $r->ref_no;?></td></tr>
                                    <tr><th>OBN No. :</th><td><textarea name="obn_no" id="obn_no" placeholder="OBN Number" title="Type the OBN NO."rows="1" style="width:95%;border:none;"><?= $r->obn_no;?></textarea></td></tr>
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
                        <br><b>Kind Attention:</b> Mr.<input type="text" name="engineer_name" id="engineer_name" style="width:300px;margin-top:1px;margin-left:2px; " value="<?= $r->engineer_name;?>" />
                    </div>
                        <?php
                            }
                        ?>
                    <div style="clear:both"></div>
                    
                    <hr>
                    <h4>Inspection Details</h4>
                    <table border="1px" class="table table-bordered test">
                    <tr style="background-color:#EEEEEE;">
                        <th align="center">Sr No.</th>
                        <th style="text-align:center;">W/O No.</th>
                        <th style="text-align:center;">Item Description</th>
                        <th style="text-align:center;width:20%;">Material Description</th>
                        <th style="text-align:center;width:50%;">Stage</th>
                       
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
                        <td id="appsel" align="center"><textarea name="sel[]" id="sel" readonly style="border:none;"><?= $row->sel;?></textarea></td>
                        <td style="width:60%" align="center"><textarea name="item_desc[]" id="item_desc" class="txtbox" placeholder="Item Description" readonly style="width:90%;"><?= $row->item_desc;?></textarea></td>
                        <td align="center"><textarea rows="" name="mat_desc[]" id="mat_desc" class="txtbox" placeholder="Material used" style="width:100%;"><?= $row->mat_desc;?></textarea></td>
                        <td align="center"><textarea name="remarks[]" id="remarks" class="txtbox" placeholder="Stage" style="width:100%;border:none;"><?= $row->remarks;?>  </textarea></td>
                        
                   <?php 
                    $sino++;
                    }?>
                    </tr>
                </table>
                    
                    
                <div>
                    <a href="javascript:;" title="Add a row" ><span class="glyphicon glyphicon-plus plusbtn1"></span></a>
                    <a href="javascript:;" title="Remove the row"><span class="glyphicon glyphicon-minus minusbtn1"></span></a>
                </div>
                    
                <div id="main_wrap">
                    <div id="l1" style="width:50%">
                        <div id="wrapper">    
                            <div id="left1">
                                <h4>Proposed date of Inspection:&nbsp;</h4>
                            </div>
                    
                            <div id="right1">
                                <input type="text" name="proposed_doi" id="proposed_doi" value="<?= $r->proposed_doi;?>"/>
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
                                    <textarea  name="contact_person" id="contact_person" placeholder="Contact Person" style="width:200px;" ><?= $r->contact_person;?></textarea>
                                </td>
                                                            
                                <td>
                                    <textarea  name="phone" id="phone" placeholder="Telephone No." style="width:200px;" readonly><?= $r->phone;?></textarea>
                                </td>
                                                            
                                <td>
                                    <textarea  name="email" id="email" placeholder="E-mail" style="width:200px;" readonly><?= $r->email;?></textarea>
                                </td>
                                                            
                                <td>
                                    <textarea name="poi" id="poi" placeholder="Place of Inspection" style="width:200px;" readonly><?= $r->poi;?></textarea>
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
                    <img id="image" src="<?php echo base_url();?>assets/images/sg1.png" alt="logo" width='200' height='100' style="margin-left:900px;"/>
                        <!--</div>
                    end-->
                    
                    <div class="fixed-action-btn vertical" style="bottom: 45px; right: 24px;">
                        <a class="btn-floating btn-large red">
                            <i class="glyphicon glyphicon-plus"></i>
                        </a>
                    
                        <ul>
                            <li><a class="btn-floating red"  href="<?php echo base_url();?>index.php/users"><i class="glyphicon glyphicon-home"></i></a></li>
                            <li><a class="btn-floating yellow darken-1" data-placement="bottom" title="View Inspection Call List" href="<?php echo base_url();?>index.php/inspection/view_ic_list"><i class="glyphicon glyphicon-search"></i></a></li>
                            <li><button type="submit" name="submit" class="btn-floating blue" data-placement="bottom" title="Save" id="submit"><span class="glyphicon glyphicon-save"></span></button></li>    
                            <li><a class="btn-floating grey"  data-placement="bottom" title="Go Back!"  href="javascript:window.history.go(-1);"><i class="glyphicon glyphicon-arrow-left"></i></a></li>    
                        </ul>
                           
                    </div>
                </form>        
                        
                    <div style="clear:both"></div>  
                        <h4 style="margin-left:1px;margin-top:40px;"><center>*Kindly organize to depute your Inspection Engineer on the above proposed date with prior intimation.</center></h4>
                    </div>
       
                </body>
                        
                <script>
                    
                i=2; 
                $('.plusbtn1').click(function() {
               
                var $row = $('<tr class="item-row"><td align="center">'+i+'</td><td style="text-align:center;"><select name="sel[]" id="sel" style="width:80%; height:50%;border:none;"><option>select</option></select></td><td align="center;"><textarea name="item_desc[]" id="item_desc" class="txtbox" placeholder="Item Description" style="width:100%;"></textarea></td><td style="text-align:center;"><textarea  name="mat_desc[]" id="mat_desc" class="txtbox" placeholder="Material used" style="width:70%;"></textarea></td><td style="text-align:center;"><textarea name="remarks[]" id="remarks" class="txtbox" placeholder="Stage" style="width:80%;border:none;"></textarea></td></tr>').insertAfter(".item-row:last");

                bind($row);
                i++;
                });
                
                function bind($row) {
                      
                      /*autocomplete for item description*/
                      
                $(function(){
            var availableTags = [
            "Plate",
            "Pipe",
            "Forgings",
            "Tubes",
            "Pipe Fittings",
            "Gasket",
            "Fasteners",
            "Casting",
            "Flanges",
            "Profiles",
            "Dishend",
            "Baffels",
            "Electrodes",
            "Elbow"
        ];
        function split( val ) {
            return val.split( /,\s*/ );
        }
        
        function extractLast( term ) {
            return split( term ).pop();
        }
 
    $row.find("#mat_desc")
      // don't navigate away from the field on tab when selecting an item
      .bind( "keydown", function( event ) {
        if ( event.keyCode === $.ui.keyCode.TAB &&
            $(this).autocomplete( "instance" ).menu.active ) {
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
            
            $row.find("#sel").bind("click",function(){
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
                                $row.find("#sel").append('<option value=' + item[i].w_o_no + '>' + item[i].w_o_no+ '</option>');
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
            
        
       
       
        </script>
</html>