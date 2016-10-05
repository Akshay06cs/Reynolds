<html>
    <head>
        <title>Advance Payment</title>
        <script type='text/javascript' src="<?php echo base_url(); ?>assets/js/jQuery-2.1.4.min.js"></script>  
        <link rel='stylesheet' type='text/css' href="<?php echo base_url("assets/css/bootstrap.min.css");?>" />
       <!--Autocomplete -->
        <script type='text/javascript' src="<?php echo base_url(); ?>assets/js/jquery-ui.js"></script>
        <!-- Dropdown Style For Autocomplete -->
        <link rel='stylesheet' type='text/css' href="<?php echo base_url("assets/css/jquery-ui.css");?>" />
 	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
        <!-- Accordion -->
        <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
        <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
        <link rel="stylesheet" href="<?php echo base_url("assets/css/style.css");?>">
        <!-- Advance_payment CSS -->
        <link rel="stylesheet" href="<?php echo base_url("assets/css/gate_pass.css");?>">
         <!-- Floating Button -->
        <link rel='stylesheet' type='text/css' href="<?php echo base_url("assets/css/font-awesome.min.css");?>" />
        <script type='text/javascript' src="<?php echo base_url(); ?>assets/js/materialize.js"></script> 
        <link rel='stylesheet' type='text/css' href="<?php echo base_url("assets/css/materialize.css");?>" />
         <!-- Material Design libraries-->
        <script type='text/javascript' src="<?php echo base_url(); ?>assets/js/material.js"></script> 
        
        <script type='text/javascript' src="<?php echo base_url(); ?>assets/js/bb-alert-callback.js"></script> 
        <link rel='stylesheet' type='text/css' href="<?php echo base_url("assets/css/material.css");?>" />
        <!--bootstrap tooltip-->
        <script src="<?php echo base_url("assets/bootstrap/js/bootstrap.min.js")?>"></script>
        <script>
            //function for calculating total amount to be credicted to the employee/worker
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
                // validation for granting amount, should not be more than Rs. 1000/-
                $(".amt_reqd").keypress(function(){
                    var amt_reqd;
                    amt_reqd=$(".amt_reqd").val();
                    amt_reqd=Number(amt_reqd);
                    

                    if(amt_reqd > 100)
                    {
                        $("#errmsg").html("Below Rs 1000/- only").show().fadeOut("slow");
                        return false;
                    }
                    
                    
                });
                
                
            });
            
            
        </script>
        <script>
            // Autocomplete for name of Worker/Employee
            
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
                                       id: item.emp_id,
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
                       $(".id").val(data.empid);//hidden values
                       $(".mob").val(data.mob);
                       $(".job_cat").val(data.job_category);//hidden values
                    }
                });
                
                $.ajax({
                    type:"POST",
                    data:{'id':businessEntityId},
                    dataType:"json",
                    url:"<?php echo base_url(); ?>index.php/users/adv_prev_details",//calling details of employee regarding previous advance payment
                    success:function(data)
                    {   
                        if(data===null) 
                        {
                            $(".pre_date").val('Nil');
                            $(".amt_taken").val('0');
                        }
                        
                        else if(data.ad_balance && data.ad_adv_date)
                        {
                            $(".amt_taken").val(data.ad_balance);
                            $(".pre_date").val(data.ad_adv_date);
                        }
                        
                        
                        if(data.ad_balance)
                        {
                            $(".balpresent").val(data.ad_balance);
                        }
                    }
                });
                
                $.ajax({
                    type:"POST",
                    data:{'id':businessEntityId},
                    dataType:"json",
                    url:"<?php echo base_url();?>index.php/users/adv_get_attnd",//getting total attendance of employee/worker
                    success:function(data)
                    {
                        $(".attd").val(data.att_attend);
                    }
                });
                
                }
                
            });
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
                <center><h2>Advance Payment Against Wages/Salary</h2></center>
                    <form name="advance_request" id="advance_request" class="form-style-4" action="<?= base_url('index.php/users/advance_pay_request') ?>" method="POST" onsubmit="return confirm('Do You Want To Send Request??');">
                        <label>
                            <span align="left">Name</span><input type="text" id="name" class="name" name="name" title="Name of Employee" required tabindex="1" style="background-color:#20374f;" data-toggle="tooltip" autofocus/><input type="hidden" name="job_cat" id="job_cat" class="job_cat"/><input type="hidden" id="id" name="id" class="id">
                        </label>
                       
                        <label>
                            <span align="left">Previous Payment Details</span><input type="text" class="pre_date" name="pre_date" id="pre_date" title="Previous Advance Payment Date" style="width:10%" readonly data-toggle="tooltip"/>&nbsp;&nbsp;<input type="text" class="amt_taken" title="Amount To Be Recovered" name="amt_taken" id="amt_taken" style="width:10%" readonly data-toggle="tooltip" />&nbsp;&nbsp;
                        </label>
                        
                        <label>
                            <span align="left">Attendance(Days)</span><input type="text" class="attd" name="attd" id="attd" title="Total Attendance" readonly required data-toggle="tooltip"/>
                        </label>
                       
                        <label>
                            <span align="left">Amount Needed (Max 1000)</span><input type="text" title="Amount needed" class="amt_reqd" name="amt_reqd" id="amt_reqd" tabindex="2" required style="background-color:#20374f;" data-toggle="tooltip"/><div class="errmsg" id="errmsg" style="background-color: red;width:100px;"></div><input type="hidden" name="balance" id="balance" class="balance"/>
                            
                        </label>
                        
                        <label>
                            <span align="left">For</span><input type="text" name="purpose" title="Purpose" list="purpose" class="purpose" tabindex="3" required style="background-color:#20374f;" data-toggle="tooltip"/>
                                <datalist id="purpose">
                                    <option>Payment Of Fees</option>
                                    <option>Payment Of House Rent</option>
                                    <option>Family Member Not Well</option>
                                    <option>Not Well</option>
                                    <option>Visit to Village</option>
                                    <option>Others</option>
                                </datalist>
                            <div id="errmsg2" style="background-color:#495c70;width:100px;"></div>
                        </label>
                        <label for="field1">
                            <span align="left">Total Amount</span><input type="text" name="tac" id="tac" class="tac" title="Total Amount" required="true"  readonly data-toggle="tooltip"/>
                        </label>
                        <label for="field2">
                            <span align="left">Mobile No.</span><input type="text" id="mob" class="mob" name="mob" title="Cell No." required="true" readonly data-toggle="tooltip"/><input type="hidden" name="balpresent" class="balpresent" id="balpresent"/>
                        </label>
                        
                        <!-- status capture --><input type="hidden" name="status" value="Request" />
                        <label>
                            <span>&nbsp;</span><input type="submit" value="Send" class="btn btn-success" id="popupSuccessBasic" tabindex="4" title="Send Request" data-toggle="tooltip"/>
                            
                        </label> 
                       
                        <input type="hidden" name="req_date" value="<?php   echo date("d/m/y"); ?>"/>
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
        //validations    
        $(document).ready(function(){
             //As soon as page loads following functions run
            not_no();
            not_alphabet();
            
            $('[data-toggle="tooltip"]').tooltip();   
        });
       
        function not_no(){
            $(".amt_reqd").keypress(function (e) {
            //if the letter is not digit then display error and don't type anything
            if ((event.which != 46 || $(this).val().indexOf('.') != -1) && (event.which < 48 || event.which > 57)){
            //display error message
            //$("#errmsg").html("Digits Only").show().fadeOut("slow");
                //return false;
            
            if(true){
                $(".amt_reqd").css("border","1px solid red");
                alert("Please Insert Digits Only")
                return false;
            }
            }
            else
                $(".amt_reqd").css("border","1px green");
            });
        }
        
        function not_alphabet(){
            $(".purpose,.name").keypress(function (e) {
            //if the letter is not alphabet then display error and don't type anything
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

