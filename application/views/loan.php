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
 	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
        <!-- Accordion -->
        <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
        <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
        <link rel="stylesheet" href="<?php echo base_url("assets/css/style.css");?>">
        <!-- Gate Pass CSS -->
        <link rel="stylesheet" href="<?php echo base_url("assets/css/gate_pass.css");?>">
         <!-- Floating Button -->
        <link rel='stylesheet' type='text/css' href="<?php echo base_url("assets/css/font-awesome.min.css");?>" />
        <script type='text/javascript' src="<?php echo base_url(); ?>assets/js/materialize.js"></script> 
        <link rel='stylesheet' type='text/css' href="<?php echo base_url("assets/css/materialize.css");?>" />
         <!-- Material Design libraries-->
        <script type='text/javascript' src="<?php echo base_url(); ?>assets/js/material.js"></script> 
        
        <script type='text/javascript' src="<?php echo base_url(); ?>assets/js/bb-alert-callback.js"></script> 
        <link rel='stylesheet' type='text/css' href="<?php echo base_url("assets/css/material.css");?>" />
        
        <!--alert box-->
        <script src="<?php echo base_url();?>assets/girish/alert/sweetalert-dev.js"></script>
        <link rel="stylesheet" href="<?php echo base_url();?>assets/girish/alert/sweetalert.css">
         <script>
            function amt()
            {
                var amt_reqd=$(".amt_reqd").val();
                var amt_taken=$(".amt_taken").val();
                var total_recover;
                if(amt_taken && amt_reqd)
                {
                    total_recover=parseFloat(amt_reqd) + parseFloat(amt_taken);
                    $(".tac").val(total_recover);
                }

                else if(amt_taken)
                {
                    $(".tac").val(amt_taken);
                }
            }
        
            $(document).ready(function(){
                $(".amt_reqd").keyup(function(){
                    amt();
                });
            });
            
        </script>
        <script>
            $(document).ready(function () {
               
                $("#name").autocomplete({
                    source: function (request, response){
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
                    url: "<?php echo base_url(); ?>index.php/users/employee_detail",//here we are calling our user controller
                    success: function(data) //we're calling the response json array 'data'
                    {   
                       $(".id").val(data.empid);
                       $(".mob").val(data.mob);
                       $(".job_cat").val(data.job_category);
                    }
                });
                
                $.ajax({
                    type:"POST",
                    data:{'id':businessEntityId},
                    dataType:"json",
                    url:"<?php echo base_url(); ?>index.php/users/prev_details",
                    success:function(data)
                    {   
                        if(data===null) 
                        {
                            $(".pre_date").val('Nil');
                            $(".amt_taken").val('0');
                            $(".deposit_date").val('Nil');
                        }
                        
                        else if(data.balance)
                        {
                            $(".amt_taken").val(data.balance);
                            
                            if(data.ld_activity=="deposit" && data.ld_date)
                            {   
                                $(".pre_date").hide('slow');
                                $(".deposit_date").show("slow");
                                $(".deposit_date").val(data.ld_date);
                            }
                            else if(data.ld_activity=="sanction" && data.ld_date)
                            {
                                $(".deposit_date").hide('slow');
                                $(".pre_date").show('slow');
                                $(".pre_date").val(data.ld_date);
                            }
                        }
                        
                        
                        if(data.balance)
                        {
                            $(".balpresent").val(data.balance);
                        }
                        
                    }
                });
                
                
                }
                
            });
        });
        
        
        
        //validation
        $(document).ready(function(){
             
        });
       

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
       
    </head>
            
    <body>
        <div class="container">
            <div class="jumbotron">
            <!--no of gate Pass in Month -->
            <center><h2>Loan Sanction Request</h2></center>
                    <!--
                    <div class="alert alert-info">
                        <strong id="gate_count">Info!</strong> Gate Pass Used In This Month!!!
                    </div>
                    -->
                   
                    <form name="advance_request" id="advance_request" class="form-style-4" action="<?= base_url('index.php/users/loan_pay_request') ?>" method="POST" onsubmit="return confirm('Do You Want To Send Request??');">
                       
                        <label>
                            <span align="left">Name</span><input type="text" id="name" name="name" title="Name of Employee" required tabindex="1" style="background-color:#20374f;"/><input type="hidden" name="job_cat" id="job_cat" class="job_cat"/><input type="hidden" id="id" name="id" class="id">
                        </label>
                       
                        <label>
                            <span align="left">Previous Payment Details</span><input type="text" class="pre_date" name="pre_date" id="pre_date" title="Previous Loan Date" style="width:10%" readonly/>&nbsp;&nbsp;<input type="text" class="amt_taken" title="Amount To Be Recovered" name="amt_taken" id="amt_taken" style="width:10%" readonly />&nbsp;&nbsp;<input type="text" name="deposit_date" title="Deposit_date" class="deposit_date" id="deposit_date" style="width:10%" readonly />
                        </label>
                       
                        <label>
                            <span align="left">Amount Needed</span><input type="text" title="Amount needed" class="amt_reqd" name="amt_reqd" id="amt_reqd" tabindex="2" required style="background-color:#20374f;"/><div class="errmsg" id="errmsg" style="background-color: red;width:100px;"></div><input type="hidden" name="balance" id="balance" class="balance"/>
                            
                        </label>
                        
                        <label>
                            <span align="left">For</span><input type="text" name="purpose" title="Purpose" list="purpose" class="purpose" tabindex="3" required style="background-color:#20374f;"/>
                                <datalist id="purpose">
                                    <option>Personal</option>
                                    <option></option>
                                </datalist>
                            <div id="errmsg2" style="background-color: red;width:100px;"></div>
                        </label>
                        
                        <label for="field1">
                            <span align="left">Total Amount</span><input type="text" name="tac" id="tac" class="tac" title="Total Amount" required="true"  readonly/>
                        </label>
                        <label for="field2">
                            <span align="left">Cell No.</span><input type="text" id="mob" class="mob" name="mob" title="Cell No." required="true" readonly/><input type="hidden" name="balpresent" class="balpresent" id="balpresent"/>
                        </label>
                        
                        <!-- status capture --><input type="hidden" name="status" value="Request" />
                        <label>
                            <span>&nbsp;</span><input type="submit" value="Send" class="btn btn-success" id="popupSuccessBasic" tabindex="4" title="Send Request"/>
                            
                        </label> 
                        <!-- Unique Id Of Employee for Gate Pass counting-->
                         <input type="hidden" name="month" value="<?php   echo date("m"); ?>"><input type="hidden" name="date" value="<?php   echo date("d/m/y"); ?>"/>
                    </form>    
                    <b><center><?php   echo date("d/m/y"); ?></center></b>
            </div>
        </div>
    </body>
        <div class="fixed-action-btn vertical" style="bottom: 45px; right: 24px;">
            <a class="btn-floating btn-large red"  href="<?php echo base_url();?>index.php/users" title="Home">
                <i id="pluse_ic" class="glyphicon glyphicon-plus"></i>
                <i class="glyphicon glyphicon-home"></i>
            </a>
            <ul>
                <li>
                    <?php if($level->level=="1"||$level->level=="6")
                    {
                    ?>
                        <a class="btn-floating yellow darken-1" data-placement="bottom" title="View Loan List" href="<?php echo base_url();?>index.php/users/show_loan"><i class="glyphicon glyphicon-search"></i></a></li>
                    <?php
                    }
                    ?>
                <li><a class="btn-floating green"  data-placement="bottom" title="Create New Loan Request!"  href="<?php echo base_url();?>index.php/users/new_loan"><i class="glyphicon glyphicon-pencil"></i></a></li>
                <li><a class="btn-floating grey"  data-placement="bottom" title="Go Back!"  href="javascript:window.history.go(-1);"><i class="glyphicon glyphicon-arrow-left"></i></a></li>    
            </ul>
        </div>
        <script>
         $(document).ready(function(){
            not_no();
            not_alphabet();
        });
       
        function not_no(){
            $(".amt_reqd").keypress(function (e) {
            //if the letter is not digit then display error and don't type anything
            if ((event.which != 46 || $(this).val().indexOf('.') != -1) && (event.which < 48 || event.which > 57)){
            //display error message
            $("#errmsg").html("Digits Only").show().fadeOut("slow");
                return false;
            }
            });
        }
        
        function not_alphabet(){
            $(".purpose").keypress(function (e) {
            //if the letter is not digit then display error and don't type anything
            if ((event.which < 65 || event.which > 90) && (event.which < 97 || event.which > 122)){
            //display error message
            $("#errmsg2").html("Alphabets Only").show().fadeOut("slow");
                return false;
            }
            });
            
        }
            
            
        $('.fixed-action-btn').hover(function(){
            $('#pluse_ic').toggle();
        });
        
        $(document).ready(function(){
            
            
            $(".mob").keyup(function(){
                var pre_date=$(".pre_date").val();
                var amt_taken=$(".amt_taken").val();
                var amt_reqd=$(".amt_reqd").val(); 
                
                if(pre_date=="nil" && amt_taken=="nil")
                {
                    $(".balance").val(amt_reqd);
                }
                else if(amt_taken)
                {
                    var bal=parseFloat(amt_reqd) + parseFloat(amt_taken);
                    $(".balance").val(bal);
                    
                }
            });
                
            
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
                $('#disa').removeAttr("disabled");
            });
            $('#today').click(function()
            {
                $('#disa').val("");
                $('#disa').attr("disabled", "disabled");
                $('#enab').removeAttr("disabled");
            });
        </script>
        
        
       
</html>
