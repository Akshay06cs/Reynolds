<html>
<head>
    <title>Employee Detail</title>
    <!--Valdation For PAN MOBILE NO IFSC  -->
     <script type='text/javascript' src="<?php echo base_url(); ?>assets/js/validation.js"></script>
     <script type='text/javascript' src="<?php echo base_url(); ?>assets/js/jQuery-2.1.4.min.js"></script>  
    <link rel='stylesheet' type='text/css' href="<?php echo base_url("assets/css/bootstrap.min.css");?>" />
    <link rel='stylesheet' type='text/css' href="<?php echo base_url("assets/css/jquery.ptTimeSelect.css");?>" />
    <script type='text/javascript' src="<?php echo base_url(); ?>assets/js/jquery.ptTimeSelect.js"></script>
    <!--Autocomplete -->
    <script type='text/javascript' src="<?php echo base_url(); ?>assets/js/jquery-ui.js"></script>
    <!-- Jquery Plugin For Ubuntu-->
         <script type='text/javascript' src="<?php echo base_url(); ?>assets/js/jquery-1.12.1.min"></script>
    <!-- Dropdown Style For Autocomplete -->
    <link rel='stylesheet' type='text/css' href="<?php echo base_url("assets/css/jquery-ui.css");?>" />
    <!--Accordion -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    <link rel="stylesheet" href="<?php echo base_url("assets/css/insp.css");?>">
    <link rel="stylesheet" href="<?php echo base_url("assets/css/gate_pass.css");?>">
    <!-- Floating Button -->
    <link rel='stylesheet' type='text/css' href="<?php echo base_url("assets/css/font-awesome.min.css");?>" />
    <script type='text/javascript' src="<?php echo base_url(); ?>assets/js/materialize.js"></script> 
    <link rel='stylesheet' type='text/css' href="<?php echo base_url("assets/css/materialize.css");?>" />
    <script>
        $(function() {
            $( ".dl_date" ).datepicker({ dateFormat: 'dd-mm-yy' });
        });
        $(function() {
            $( "#accordion" ).accordion();
        });
     
        
    </script>
</head>
<body> 
        <div class="container">
            <div class="row">
                <div class="col-md-2">
                     <img src="<?php echo base_url(); ?>uploads/<?= $q->emp_image ?>" style="border-radius:9px" alt="Employee Photo"  width="100 " height="130" >
                </div>
                <div class="col-md-6">
                  
                </div>
            </div>
        </div>
        <div id="accordion" class="form-group required">
            <h1 style="background:#428bca;color:white">Personal Detail</h1>
                <div><input type="hidden" name="id" value="<?= $q->id ?>">
                    <div class="form-style-4" >
                        <label for="field1">
                            <span align="left" class='control-label'>Emp.Id</span>: <?= $q->emp_id ?>
                        </label>
                        <label for="field1">
                            <span align="left" class='control-label'>Emp Category</span>: <?php if($q->job_category=='STAF'){ ?>Staff<?php }else{ ?>Worker <?php } ?>
                      
                        </label>
                        <label for="field1">
                            <span align="left" class='control-label'>First Name</span>: <?= $q->emp_f_name ?>
                        </label>
                        <label for="field1">
                            <span align="left">Middle Name</span>: <?= $q->emp_m_name ?>
                        </label>
                        <label for="field1">
                            <span align="left" class='control-label'>Last Name</span>: <?= $q->emp_l_name ?>
                        </label>
                        <label for="field1">
                            <span align="left">Driving Licence No.</span>: <?= $q->emp_dl_no ?>
                        </label>
                        <label for="field1">
                            <span align="left">Driving Licence Expiry Date </span>: <?= $q->emp_dl_exp_date ?>
                        </label>
                        <label for="field1">
                            <span align="left" class='control-label'>Gender</span>: <?= $q->emp_gender ?>
                        </label>
                        <label for="field2">
                            <span align="left" class='control-label'>Marital Status</span>: <?= $q->emp_marital_status ?>
                        </label>
                        <label for="field1">
                            <span align="left" class='control-label'>Nationality</span>: <?= $q->emp_nationality ?>
                        </label>
                        <label for="field2">
                            <span align="left" class='control-label'>Date Of Birth</span>: <?= $q->emp_dob ?>
                        </label>    
                    </div>
                </div>
            <h3 style="background:#428bca;color:white">Contact Detail</h3>
                <div>               
                    <div class="form-style-4" >
                        <label for="field1">
                            <span align="left" class='control-label'>Address1</span>: <?= $q->emp_address1 ?>
                        </label>
                        <label for="field1">
                            <span align="left">Address2</span>: <?= $q->emp_address2 ?> 
                        </label>
                        <label for="field1">
                            <span align="left" class='control-label'>City</span>: <?= $q->emp_city ?> 
                        </label>
                        <label for="field1">
                            <span align="left" class='control-label'>State</span>: <?= $q->emp_state ?> 
                        </label>
                        <label for="field1">
                            <span align="left" class='control-label'>PIN Code</span>: <?= $q->emp_postal_code ?>
                        </label>
                        <label for="field1">
                            <span align="left" class='control-label'>Country</span>: <?= $q->emp_country ?> 
                        </label>
                        <label for="field2">
                            <span align="left">Home Telephone</span>: <?= $q->emp_home_tel ?> 
                        </label>
                        <label for="field1">
                            <span align="left">Work Telephone</span>: <?= $q->emp_work_tel ?>
                        </label>
                        <label for="field1">
                            <span align="left">Mobile</span>: <?= $q->emp_mob ?>
                        </label>
                        <label for="field2">
                            <span align="left">Other Phone</span>: <?= $q->emp_other_phone ?>
                        </label>    
                        <label for="field1">
                            <span align="left">Work Email</span>: <?= $q->emp_work_email ?>
                        </label>
                        <label for="field2">
                            <span align="left">Other Email</span>: <?= $q->emp_other_email ?>
                        </label>    
                    </div>    
                </div>
            <h3 style="background:#428bca;color:white">Job Detail</h3>
                <div>
                    <div class="form-style-4" >
                        <?php if($q->job_category=='STAF'){ ?>
                        <label for="field1" id="designation">
                            <span align="left" class='control-label'>Designation</span>: <?= $q->emp_title ?>
                        </label>
                        <?php } ?>
                        <label for="field1">
                            <span align="left" class='control-label'>Employment Status</span>: <?= $q->emp_employment_status ?>
                        </label>
                        <label for="field1">
                            <span align="left">Job Category</span>: <?= $q->emp_job_category ?>
                        </label>
                        <label for="field1">
                            <span align="left" class='control-label'>Department</span>: <?= $q->emp_dept ?>
                        </label>
                        <label for="field1">
                            <span align="left">Employee Joined Date</span>: <?= $q->emp_joined_date ?>
                        </label>
                        <label for="field2">
                            <span align="left" class='control-label'>Job Location</span>: <?= $q->emp_location ?>
                        </label>
                        <label for="field1">
                            <span align="left">Termination Date</span>: <?= $q->emp_termination_date ?>
                        </label>
                        <label for="field1">
                            <span align="left">Assigned Supervisor</span>: <?= $q->emp_assigned_super ?>
                        </label>
                        <?php if($q->job_category=='STAF'){ ?>
                        <div class="subordinate">
                        <label for="field2">
                            <span align="left">Assigned Subordinate</span><?php if (!empty($q->emp_assigned_sub1)) { ?> 1. <?= $q->emp_assigned_sub1 ?>
                                                        <?php } ?>
                        </label>   
                        <label>
                            <span>&nbsp;</span><?php if (!empty($q->emp_assigned_sub2)) { ?>
                            2. <?= $q->emp_assigned_sub2 ?>
                            <?php } ?>
                        </label>
                        <label>
                            <span>&nbsp;</span> <?php if (!empty($q->emp_assigned_sub3)) { ?>
                            3. <?= $q->emp_assigned_sub3 ?>
                            <?php } ?>
                        </label>
                        <label for="field1">
                            <span>&nbsp;</span><?php if (!empty($q->emp_assigned_sub4)) { ?>
                            4. <?= $q->emp_assigned_sub4 ?>
                            <?php } ?>
                        </label>
                        </div>
                        <?php } ?>
                        <?php if($q->job_category=='WORK'){ ?>
                        <div class="worker_da">
                        <label for="field1">
                            <span align="left">Skills</span>: <?= $q->skill ?>
                        </label>
                        <label for="field1">
                            <span align="left">Skill Category</span>: <?= $q->ability ?>
                        </label>
                        <label for="field1">
                            <span align="left">Wage</span>: <?= $q->wage ?>
                            </label>    
                        </div>
                        <?php } ?>
                    </div> 
                </div>
            <h3 style="background:#428bca;color:white">Emergency Contact Deatil</h3>
                <div>
                    <div class="form-style-4" >
                        <label for="field1">
                            <span align="left">Contact Person</span>: <?= $q->emp_emer_name ?>
                        </label>
                        <label for="field1">
                            <span align="left">Relationship</span>: <?= $q->emp_emer_relationship ?>
                        </label>
                        <label for="field1">
                            <span align="left">Home Telephone</span>: <?= $q->emp_emer_home_tel ?>
                        </label>
                        <label for="field1">
                            <span align="left">Work Telephone</span>: <?= $q->emp_emer_work_tel ?>
                        </label>
                        <label for="field1">
                            <span align="left">Work email</span>: <?= $q->emp_emer_work_email ?>
                        </label>
                        <label for="field2">
                            <span align="left">Other Email</span>: <?= $q->emp_other_work_email ?>
                        </label>
                        <label for="field1">
                            <span align="left">Mobile</span>: <?= $q->emp_emer_mob ?>
                        </label>
                    </div>    
                </div>
            <h3 style="background:#428bca;color:white">Bank Deatil</h3>
                <div>
                    <div class="form-style-4" >
                        <label for="field1">
                            <span align="left">Bank Name</span>: <?= $bank->emp_bank ?>
                        </label>
                        <label for="field1">
                            <span align="left">Bank Account Name</span>: <?= $bank->emp_bank_account_name ?>
                        </label>
                        <label for="field1">
                            <span align="left">Account Type</span>: <?= $bank->emp_bank_account_type ?>
                        </label>
                        <label for="field1">
                            <span align="left">Bank Account No.</span>: <?= $bank->emp_bank_account_no ?>
                        </label>
                        <label for="field1">
                            <span align="left">Bank Account IFSC.</span>: <?= $bank->emp_bank_account_ifsc ?><br><br><br><br><br><br><br><br><br>
                        </label>
                        
                    </div>    
                </div>
  
        </div>
        <div class="fixed-action-btn vertical" style="bottom: 45px; right: 24px;">
            <a class="btn-floating btn-large red"  href="<?php echo base_url();?>index.php/users">
                <i id="pluse_ic" class="glyphicon glyphicon-plus"></i>
                <i class="glyphicon glyphicon-home"></i>
            </a>
            <ul>
                <li><a class="btn-floating yellow darken-1" data-placement="bottom" title="View Employee List" href="<?php echo base_url();?>index.php/users/emp_detail"><i class="glyphicon glyphicon-search"></i></a></li>
                <li><a class="btn-floating grey"  data-placement="bottom" title="Go Back!"  href="javascript:window.history.go(-1);"><i class="glyphicon glyphicon-arrow-left"></i></a></li>    
            </ul>
        </div>
    </body>
    
    

</html>
