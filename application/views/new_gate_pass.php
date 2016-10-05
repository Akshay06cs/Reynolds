<html>
    <head>
        <script type='text/javascript' src="<?php echo base_url(); ?>assets/js/jQuery-2.1.4.min.js"></script>  
        <link rel='stylesheet' type='text/css' href="<?php echo base_url("assets/css/bootstrap.min.css");?>" />
        <!-- Time Picker -->
        <link rel='stylesheet' type='text/css' href="<?php echo base_url("assets/css/jquery.ptTimeSelect.css");?>" />
        <script type='text/javascript' src="<?php echo base_url(); ?>assets/js/jquery.ptTimeSelect.js"></script>
        <!--Autocomplete -->
        <script type='text/javascript' src="<?php echo base_url(); ?>assets/js/jquery-ui.js"></script>
        <!-- Dropdown Style For Autocomplete -->
        <link rel='stylesheet' type='text/css' href="<?php echo base_url("assets/css/jquery-ui.css");?>" />
 	
        <link rel="stylesheet" href="<?php echo base_url("assets/css/style.css");?>">
        <!-- Gate Pass CSS -->
        <link rel="stylesheet" href="<?php echo base_url("assets/css/gate_pass.css");?>">
         <!-- Floating Button -->
        <link rel='stylesheet' type='text/css' href="<?php echo base_url("assets/css/font-awesome.min.css");?>" />
        <script type='text/javascript' src="<?php echo base_url(); ?>assets/js/materialize.js"></script> 
        <link rel='stylesheet' type='text/css' href="<?php echo base_url("assets/css/materialize.css");?>" />
         <!-- Material Design libraries-->
        <script type='text/javascript' src="<?php echo base_url(); ?>assets/js/material.js"></script> 
      <link rel='stylesheet' type='text/css' href="<?php echo base_url("assets/css/material.css");?>" />
      <script>
            $(document).ready(function () {
                $("#name").autocomplete({
                    source: function (request, response) {
                        $.ajax({
                        url: "<?php echo base_url(); ?>index.php/users/employee_names",
                        data:{term: request.term},
                        dataType: "json",
                        type: "POST",
                        dataFilter: function (data) { return data; },
                        success: function (data) {
                            response($.map(data, function (item) {
                            return {
                                       label: item.name,
                                       value: item.name,
                                       id: item.emp_id
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
                    url: "<?php echo base_url(); ?>index.php/users/employee_detail",//here we are calling our user controller
                    success: function(data) //we're calling the response json array 'data'
                    {
                        $("#mob").val(data.mob);
                        $("#id").val(data.empid);
                        $("#gate_count").html(data.c_gate);
                        $("#today_gate_count").val(data.today_gatepass);
                    }
                });
                }
            });
        });
        </script>
    </head>
    <script type="text/javascript">
    //auto expand textarea
    function adjust_textarea(h) 
    {
        h.style.height = "20px";
        h.style.height = (h.scrollHeight)+"px";
    }
    $(function() {
        $( "#accordion" ).accordion();
    });
    </script>          
   <body>
       
        <div ></div>
        <div class="container">
            
            <div class="jumbotron">
                <!--no of gate Pass in Month -->
                <center><h2>Reynolds Chemequip Pvt. Ltd.</h2><br><h4>Gate Pass</h4><center>
                    <div class="alert alert-info">
                        <strong id="gate_count">Info!</strong> Gate Pass Used In This Month!!!
                    </div>
                    <form class="form-style-4" action="<?= base_url('index.php/users/gate_pass_request') ?>" method="post">
                        <label for="field1">
                            <span align="left">Name</span><input type="text" id="name" name="name" required="true" placeholder="Enter Name" />
                        </label><input type="hidden" id="today_gate_count" name="today_gate_count" required="true" />
                        <label for="field1">
                            <span align="left">Please allow me to leave the Factory at</span><input type="text" class="ttime" name="ttime" required="true"  placeholder="Outgoing Time" />
                        </label>
                        
                        <label for="field1">
                            <span align="left">For</span><input type="text" name="purpose" list="purpose" required="true" placeholder="Select Reason"/>
                        <datalist id="purpose">
                            <option>Factory</option>
                            <option>Personal</option>
                        </datalist>
                        </label>
                        <label for="field1">
                            <span align="left">Reason</span><input type="text" class="reason" name="reason" required="true" placeholder="Purpose"/>
                        </label>
                        <label for="field1">
                            <span align="left"> <input type="radio"  name="be_back" id='by' value="true" >I shall be back by</span><input type="text" name="return_time" id = "disa" class = 'ttime' required="true" placeholder="Incoming Time"/>
                        </label><input type="hidden" id="enab" name="return_time" />
                        <label for="field1">
                            <span align="left"> <input type="radio" name="be_back" id='today' value="false" checked>Now I shall not Re-report today.</span><br>
                        </label>
                        <label for="field2">
                            <span align="left">Mobile No.</span><input type="text" id="mob" name="mob" required="true" /><input type="hidden" name="date" value="<?php   echo date("Y-m-d"); ?>"/>
                        </label>
                        <!-- status capture --><input type="hidden" name="status" value="Request" />
                     
                        <!-- Unique Id Of Employee for Gate Pass counting-->  <input type="hidden" id="id" name="id" >
                        <input type="hidden" name="month" value="<?php   echo date("m"); ?>">
                        <input type="hidden" name="day" value="<?php   echo date("d"); ?>">
                   
                </div>
            </div>
    </body>
       
         <div class="fixed-action-btn vertical" style="bottom: 45px; right: 24px;">
                <a class="btn-floating btn-large red"  href="<?php echo base_url();?>index.php/users" >
                    <i id="pluse_ic" class="glyphicon glyphicon-plus"></i>
                    <i class="glyphicon glyphicon-home"></i>
                </a>
                <ul>
                    <li><a class="btn-floating orange darken-1" data-placement="bottom" title="View GatePass List" href="<?php echo base_url();?>index.php/users/show_gate_pass"><i class="glyphicon glyphicon-eye-open"></i></i></a></li>
                    <li><button type="submit" name = "submit" class="btn-floating blue" data-placement="bottom" title="Save"><span class="glyphicon glyphicon-save"></span></button></li>
                    <li><a class="btn-floating grey"  data-placement="bottom" title="Go Back!"  href="javascript:window.history.go(-1);"><i class="glyphicon glyphicon-arrow-left"></i></a></li>    
                </ul>
            </div>
     </form>    
        <script>
            $('.fixed-action-btn').hover(function(){
            $('#pluse_ic').toggle();
        });
        </script>
        <script type="text/javascript">
            $(document).ready(function()
            {
                $('.ttime').ptTimeSelect();
                $('#disa').attr("disabled", "disabled");
                $('#enab').attr("disabled", "disabled");
            });
            $('#by').click(function()
            {
                $('#disa').removeAttr("disabled")
            });
            $('#today').click(function()
            {
                $('#disa').val("");
                $('#disa').attr("disabled", "disabled");
                $('#enab').removeAttr("disabled")
            }); 
        </script>
</html>




















