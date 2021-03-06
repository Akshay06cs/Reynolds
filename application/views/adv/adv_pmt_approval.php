<html>
    <head>
        <title>Gate Pass</title>
        <script type='text/javascript' src="<?php echo base_url(); ?>assets/js/jQuery-2.1.4.min.js"></script>  
        <link rel='stylesheet' type='text/css' href="<?php echo base_url("assets/css/bootstrap.min.css");?>" />
        <link rel='stylesheet' type='text/css' href="<?php echo base_url("assets/css/jquery.ptTimeSelect.css");?>" />
        <script type='text/javascript' src="<?php echo base_url(); ?>assets/js/jquery.ptTimeSelect.js"></script>
        <!--Autocomplete -->
        <script type='text/javascript' src="<?php echo base_url(); ?>assets/js/jquery-ui.js"></script>
	<!-- Jquery Plugin For Ubuntu-->
         <script type='text/javascript' src="<?php echo base_url(); ?>assets/js/jquery-1.12.1.min"></script>
        <!-- Accordeon -->
        <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
        <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
        <link rel="stylesheet" href="<?php echo base_url("assets/css/style.css");?>">
        <!-- Gate Pass CSS -->
        <link rel="stylesheet" href="<?php echo base_url("assets/css/gate_pass.css");?>">
         <!-- Floating Button -->
        <link rel='stylesheet' type='text/css' href="<?php echo base_url("assets/css/font-awesome.min.css");?>" />
        <script type='text/javascript' src="<?php echo base_url(); ?>assets/js/materialize.js"></script> 
        <link rel='stylesheet' type='text/css' href="<?php echo base_url("assets/css/materialize.css");?>" />
        <!-- Date Picker Plugins -->
        <link rel='stylesheet' type='text/css' href="<?php echo base_url("assets/css/jquery-ui.css");?>" />
   
      
    </head>
    <script type="text/javascript">
        //auto expand textarea
        function adjust_textarea(h) 
        {
            h.style.height = "20px";
            h.style.height = (h.scrollHeight)+"px";
        }
        
        function amt()
        {
           
            var amt_sanct=$(".amt_sanct").val();
            var balance=$(".balance").val();
            var total_recover;
            if(balance && amt_sanct)
            {
                total_recover=parseFloat(amt_sanct)+parseFloat(balance);
                $(".recover").val(total_recover);
            }
            
            else if(balance)
            {
                $(".recover").val(balance);
            }
        }
        
        $(document).ready(function(){
            $(".amt_sanct").keyup(function(){
                amt();
            });
        });
        
        $(document).ready(function(){
            //function for calculating total earnings
            var attn;
            var wage;
            var earning;
            attn=$('.attn').val();
            wage=$('.wage').val();
            
            if(attn && wage)
            {
                earning=parseInt(attn) * parseFloat(wage);
                $(".earn").val(earning);
            }
            
            else if(attn)
            {
                $(".earn").val('nil');
                $(".earn").attr('title',("Cannot calculate total earning as wage data is not available "));
            }
            
            else if(wage)
            {
                $(".earn").val('nil');
                $(".earn").attr('title',"Cannot calculate total earning as attendance data is not available");
                
            }
            
            
        });      
        
    </script>          

<script>
  $(function() {
    $( "#accordion" ).accordion();
  });
  </script>
  <body>
    <center><h3>Advance Payment Approval</h3></center>
        <form  action="<?= base_url('index.php/users/adv_pmt_approval_succees')?>" onsubmit="return confirm('Do You Want To Approve???');" method="post">
            <div class="container">
                <div id="accordion">
                    <h3 style="background:#428bca;color:white">Employee Detail <span style="float:right;color: #495C70;"><b><?php   echo date("d-m-y"); ?></b></span></h3>
                        <div>
                        <div class="form-style-4">
                            <label for="name">
                                <span align="left">Name</span><input type="text" id="name" name="name" class="name" required="true" value="<?= $approval_detail->adv_emp_name ?>" readonly/><input type="hidden" name="job_cat" id="job_cat" class="job_cat" value="<?= $approval_detail->adv_job_category;?>"/>
                            </label>
                            
                            <label for="attn">
                                <span align="left">Attendance</span><input type="text" id="attn" name="attn" class="attn" required="true" value="<?= $approval_detail->adv_emp_attd ?>" readonly/>
                            </label>
                            
                            <?php
                                if(isset($wage->wage))
                                {
                            ?>
                            <label for="earn">
                                <input type="hidden" name="wage" id="wage" class="wage" value="<?= $wage->wage?>"/>
                            </label>
                            <?php
                                }
                            ?>
                            <label>
                                <span align="left">Total Earning<br>(Till 22<sup>nd</sup> of <?php echo date('M Y'); ?> )</span><input type="text" id="earn" name="earn" class="earn" required="true" readonly/>
                            </label><br>
    
                            <label>
                                <span></span>
                            </label>
                            
                            <label for="field1">
                                <span align="left">Last Transaction on</span><input type="text"  name="lastpaid" class="lastpaid" readonly/>
                            </label>
                         
                            
                            <label for="field1">
                                <span align="left">Purpose</span><input type="text" name="reas" value="<?= $approval_detail->adv_purpose?>" readonly/>
                            </label>
                        
                           
                            <label for="field2">
                                <span align="left">Previous Balance</span><input type="text"  name="balance" class="balance" readonly/>
                            </label>
                            
                            <label for="field2">
                                <span align="left">Amount required</span><input type="text"  name="amt_reqd" value="<?= $approval_detail->adv_amt_reqd?>" readonly />
                            </label>

                            <label>
                                <span align="left">Amount Sanctioned</span><input type="text" name="amt_sanct" class="amt_sanct" id="amt_sanct" tabindex="1" style="background-color:#20374f" autofocus/>
                            </label>
                            
                            <div id="errmsg2" style="background-color: red;width:100px;"></div>

                            <label for="field2">
                                <span align="left">Total(to be recovered)</span><input type="text"  name="recover" class="recover" id="recover" readonly/>
                            </label>
                            
                            <label for="field2">
                                <span align="left">Mobile No.</span><input type="text"  name="field2" value="<?= $approval_detail->adv_emp_mobile ?>" readonly />
                            </label>
                            
                           </div>  
                     </div>
                    <h3 style="background:#428bca;color:white">Approval Detail</h3>
                    <div>
                    <div class="form-style-4" >
                    
                        <label for="field2">
                                    <span align="left">Do You Want To Approve</span>  
                        </label><br><br>    
                        
                        <label for="field2">
                                <label class="mdl-switch mdl-js-switch " for="approval">
                                        <input type="checkbox" id="approval" class="mdl-switch__input">
                                        <span class="mdl-switch__label">Yes/No</span>
                                </label>
                        </label>
                        
                        
                        <div class="approve">
                            <label for="field1">
                                <br><br><span align="left">Head Of the A/c</span><input type="text" id="head" name="head" class="head" required="true" value="Satish L. Gumaste"/><br>
                            </label>
                            <label for="field1">
                                <span align="left">Paid to Mr./Mrs.</span><input type="text" id="emp_name" name="field1" required="true" value="<?= $approval_detail->adv_emp_name ?>" readonly/>
                            </label>
                            <label for="field1">
                                <span align="left">Signature & Date</span><img id="image" src="<?php echo base_url();?>assets/images/rs.png" alt="logo" width='200' height='100' /><input type="text" name="date" id="date" value="<?php echo date("d/m/y");?>" readonly/>
                            </label>

                            <input type="hidden" name="approve" class="req_approve" value="approve"/>

                            <label>
                                <span>&nbsp;</span><input type="submit" value="Approve" class="submit_approve"/><input type="hidden" value="<?= $approval_detail->adv_id ?>" name="id" class="loan_id"/><input type="hidden" name="empid" class="empid" value="<?= $approval_detail->adv_emp_id?>"/>
                            </label>
                        </div> 
                    
                    
                    <div class="reject">
                        <label>
                            <span align="left">Reason:</span><input type="text" name="reason" title="reason" class="reason" list="reason" />
                                <datalist id="reason">
                                    <option>Non-payment of previous loan</option>
                                    <option>Insufficient amount to sanction</option>
                                    <option>Too many Loan taken</option>
                                </datalist>
                          
                                
                            
                        </label>
                        <label>
                            <span>&nbsp;</span><!--<input type="button" value="Reject" id="btn_reject"/>-->
                            <label>
                                <input type="hidden" name="reject" class="req_reject" value="reject" />
                                <span>&nbsp;</span><input type="button" value="Reject" id="btn_reject"/>
                            </label>
                            <div id="errmsg"></div>
                        </label>
                    </div>
                </div>
             </div>
                
                </div>
                </div>
                </form>
            
 </body>
 <div class="fixed-action-btn vertical" style="bottom: 45px; right: 24px;">
                <a class="btn-floating btn-large red"  href="<?php echo base_url();?>index.php/users">
                    <i id="pluse_ic" class="glyphicon glyphicon-plus"></i>
                    <i class="glyphicon glyphicon-home"></i>
                </a>
                <ul>
                    <li><a class="btn-floating yellow darken-1" data-placement="bottom" title="View Advance Payment List"  href="<?php echo base_url();?>index.php/users/show_adv_pmt"><i class="glyphicon glyphicon-search"></i></a></li>
                    <li><a class="btn-floating green"  data-placement="bottom" title="Create New Advance Payment!"  href="<?php echo base_url();?>index.php/users/new_advance_payment"><i class="glyphicon glyphicon-pencil"></i></a></li>
                    <li><a class="btn-floating grey"  data-placement="bottom" title="Go Back!"  href="javascript:window.history.go(-1);"><i class="glyphicon glyphicon-arrow-left"></i></a></li>  
                        
                </ul>
                           
            </div>
            <script>
                $(document).ready(function(){
                    not_alphabet();
                    not_no();
                });
                $('.fixed-action-btn').hover(function(){
                $('#pluse_ic').toggle();
                });
            </script>
            <script type="text/javascript">
    
     $(document).ready(function(){
            var businessEntityId=$(".empid").val();
            
                 $.ajax({
                    type:"POST",
                    data:{'id':businessEntityId},
                    dataType:"json",
                    url:"<?php echo base_url(); ?>index.php/users/adv_prev_details",
                    success:function(data)
                    {   
                        if(data===null)
                        {
                            $(".balance").val("0");
                            $(".lastpaid").val('Never');
                        }
                        
                        else if(data.ad_balance)
                        {
                            $(".balance").val(data.ad_balance);
                            $(".recover").val(data.ad_balance);
                        }
                        
                        if(data.ad_adv_date)
                        $(".lastpaid").val(data.ad_adv_date);
                    }
                });
            
            
           
        });
    
    
    $(document).ready(function(){
    
        $('.reject').hide();
        $('#approval').change(function()
            {
              $('.approve').toggle();
              $('.reject').toggle();
            });
    });
    
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
    $("#btn_reject").click(function(){
        var loan_id=$(".loan_id").val();
        $.ajax({
            type:"POST",
            data:{'loan_id':loan_id},
            dataType:"json",
            url: "<?php echo base_url(); ?>index.php/users/update_reject"
        });
        window.location.href="<?php echo base_url("index.php/users");?>";
        });
        
        //validation for amount sanction
    
        $('.submit_approve').on('click',function(){
           
            var amt_sanct=$('#amt_sanct').val();
            
                if(amt_sanct==='')
                {
                    $('.emp_detail').css("background-color","#fc6a6a");
                    $('#amt_sanct').css("background-color","#4f9dea");
                    $("<p class=pfont>fill the fields</p>").appendTo('#amt_sanct');
                    
                    $('#amt_sanct').click(function(){
                        $('.emp_detail').css("background-color","#428bca");
                        $(".pfont").remove();
                        $('#amt_sanct').css("background-color","#495c70");
                        $('.emp_detail').css("background-color","#428bca");
                    });
                    return false;
                }
                
            
        });
         function not_alphabet(){
            $(".reason").keypress(function (e) {
            //if the letter is not digit then display error and don't type anything
            if ((event.which < 65 || event.which > 90) && (event.which < 97 || event.which > 122)){
            //display error message
            $("#errmsg").html("Alphabets Only").show().fadeOut("slow");
                return false;
            }
            });
            
        }
        
       
        
        function not_no()
        {
            $(".amt_sanct").keypress(function (e) {
                
                var amt_sanct;
                    amt_sanct=$(".amt_sanct").val();
                    amt_sanct=Number(amt_sanct);
                    
            //if the letter is not digit then display error and don't type anything
            if ((event.which != 46 || $(this).val().indexOf('.') != -1) && (event.which < 48 || event.which > 57)){
            //display error message
                $("#errmsg2").html("Digits Only").show().fadeOut("slow");
                return false;
            }
            
            else if(amt_sanct > 100)
            {
                $("#errmsg2").html("Below Rs 1000/- only").show().fadeOut("slow");
                        return false;
            }
            });
        }
        
</script>
</html>