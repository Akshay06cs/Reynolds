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
    </script>          

<script>
  $(function() {
    $( "#accordion" ).accordion();
  });
  </script>
<body>
    <center><h2>Reynolds Chemequip Pvt. Ltd.</h2><br><h4>Gate Pass</h4></center>
        <div class="container">
            <div id="accordion">
                <h3 style="background:#428bca;color:white">Employee Detail <span style="float:right;color: #495C70;"><b><?php   echo date("d-m-Y", strtotime($approval_detail->date)); ?></b></span></h3>
                    <div>
                        <form class="form-style-4" action="" method="post">
                            <label for="field1">
                                <span align="left">Name</span><input type="text" id="name" name="field1" required="true" value="<?= $approval_detail->name ?>"/>
                            </label><input type="hidden" id="name" name="field1" required="true" value="<?= $approval_detail->date ?>"/><input type="hidden" id="name" name="field1" required="true" value="<?= $approval_detail->emp_id ?>"/>
                            <label for="field1">
                                <span align="left">Please allow me to leave the Factory at</span><input type="text"  name="field1" value="<?= $approval_detail->ttime ?>" />
                            </label>
                            <label for="field1">
                                <span align="left">For</span><input type="text" name="field1" value="<?= $approval_detail->purpose ?>" />
                            </label>
                            <label for="field1">
                                <span align="left">Reason</span><input type="text" name="reas" value="<?= $approval_detail->reason ?>" />
                            </label>
                                <?php if($approval_detail->be_back=='true'){ ?>
                            <label for="field1">
                                <span align="left"> I shall be back by</span><input type="text" name="field1" value= "<?= $approval_detail->return_time ?>" />
                            </label>
                            <?php }else{ ?>
                            <label for="field1">
                                <span align="left">Now I shall not Re-report today.</span><br>
                            </label>
                            <?php } ?>
                            <label for="field2">
                                <span align="left">Mobile No.</span><input type="text"  name="field2" value="<?= $approval_detail->mob ?>" />
                            </label>
                        </form>    
                    </div>
                <h3 style="background:#428bca;color:white">Approval Detail</h3>
                <div>
                    <form class="form-style-4" action="<?= base_url('index.php/users/gate_pass_approval_succees') ?>" method="post">
                        <label for="field1">
                            <span align="left">Please Allow Mr.</span><input type="text" id="emp_name" name="field1" required="true" value="<?= $approval_detail->name ?>" />
                        </label>
                        <label for="field1">
                            <span align="left">To leave the Factory.</span><br>
                        </label>
                        <label for="field1">
                            <span align="left">Signature & Date</span><img id="image" src="<?php echo base_url();?>assets/images/rs.png" alt="logo" width='200' height='100' /><?php  if($approval_detail->status=='Request'){ echo date("d/m/y"); }else{ echo date("d-m-Y", strtotime($approval_detail->date)); } ?>
                        </label>
                        <label>
                            <span>&nbsp;</span><?php if($approval_detail->status=='Approved'){ ?><input type="submit" value="Approved" disabled="disabled"/><?php }else{ ?><input type="submit" value="Approve"/><?php } ?><input type="hidden" value="<?= $approval_detail->gate_pass_id ?>" name="id"/>
                        </label>
                        </form>    
                       
                </div>
                <?php 
                if($approval_detail->status=='Approved'){ ?>
                <h3 style="background:#428bca;color:white">Security In Charge</h3>
                <div>
                    <form class="form-style-4" action="" method="post">
                        <label for="field1">
                            <span align="left">Employee Name</span><input type="text" id="e_name" value="<?= $approval_detail->name ?>" name="field1" required="true" />
                        </label>
                        <?php if($approval_detail->today_gate_count=='1'){
                            $count_out ='0';
                            $count_in='1';
                        }else if($approval_detail->today_gate_count=='2'){
                            $count_out ='2';
                            $count_in='3';
                        }else if($approval_detail->today_gate_count=='3'){
                            $count_out ='4';
                            $count_in='5';
                        }else if($approval_detail->today_gate_count=='4'){
                            $count_out ='6';
                            $count_in='7';
                        }else if($approval_detail->today_gate_count=='2'){
                            $count_out ='8';
                            $count_in='9';
                        } ?>
                        <?php  $out_time  = $this->db->query("SELECT * FROM tbl_gatepass WHERE emp_id LIKE '{$approval_detail->emp_id}%' AND gp_date='{$approval_detail->date}' AND status LIKE '%O%' ORDER BY `id` LIMIT $count_out,1" )->row(); 
                        if(!empty($out_time)){
                        ?>
                        <label for="field1">
                             <span align="left">Time Out</span><input type="text" id="time_out" name="field1" required="true" value="<?php  echo date("g:i A", strtotime($out_time->gp_time)) ?>" />
                        </label>
                        <?php } $in_time  = $this->db->query("SELECT * FROM tbl_gatepass WHERE emp_id LIKE '{$approval_detail->emp_id}%' AND gp_date='{$approval_detail->date}' AND status LIKE '%O%' ORDER BY `id` LIMIT $count_in,1" )->row();
                        if(!empty($in_time)){ ?>
                        <label for="field1">
                            <span align="left">Time In</span><input type="text" name="field1" value="<?php  echo date("g:i A", strtotime($in_time->gp_time)) ?>" />
                        </label>
                         <?php } ?>
                        <label for="field1">
                            <span align="left">Name Of Security In-charge</span><input type="text" name="field1" required="true" />
                        </label>
                        <label for="field1">
                            <span align="left">Sign</span><input type="text" name="field1" required="true" />
                        </label>
                        
                        </form>    
                    </div>
                <?php } ?>
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
                    <li><a class="btn-floating green"  data-placement="bottom" title="Create New Gate Pass!"  href="<?php echo base_url();?>index.php/users/new_gate_pass"><i class="glyphicon glyphicon-pencil"></i></a></li>
                    <li><a class="btn-floating grey"  data-placement="bottom" title="Go Back!"  href="javascript:window.history.go(-1);"><i class="glyphicon glyphicon-arrow-left"></i></a></li>    
                </ul>
            </div>
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

























