<html>
<head>
    <title>Insert Employee Detail</title>
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
        $(".bank_name").keyup(function(){
                bank_name();
                });
        $(document).ready(function () {
            $('.worker_da').hide();
            skills();
        });
        function skills(){
           var items = ['Blasting','Cutter','Driller','Electrician','Fitter','Gardner','Gas Cutter','Grinder','Maintenance','Marking','Press','Rolling','Sweeper','Testing','Testing','Turner','Welder' ];
        
            function split( val ) {
            return val.split( /,\s*/ );
        }
            function extractLast( term ) {
            return split( term ).pop();
        }
        $( ".skill" ).autocomplete({
            minLength: 0,
            source: function( request, response ) {
            response( $.ui.autocomplete.filter(
            items, extractLast( request.term ) ) );
        },
        focus: function() {
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
    }        
    </script>
    <style>
        .form-group.required .control-label:after { 
        content:"*";
        color:red;
        }
    </style>
</head>
<body> 
    <?php echo form_open_multipart('users/insert_emp_db');?>
    
        <div class="container">
            <div class="row">
                <div class="col-md-2">
                    <img src="<?php echo base_url(); ?>assets/images/staff_ pics/" style="border-radius:9px" alt="Employee Photo"  width="100 " height="130" >
                    <input type="file" name="userfile" class="btn-default form-control" id="image"/><br>
                </div>
                <div class="col-md-6">
                  
                </div>
            </div>
        </div>
        <div id="accordion" class="form-group required">
            <h1 style="background:#428bca;color:white" id="acc1">Personal Detail</h1>
                <div>
                    <div class="form-style-4" >
                        <label for="field1">
                            <span align="left" class='control-label'>Emp.Id</span>: <input type="text" name="emp_id" required='required' placeholder='Enter New Employee ID' class="emp_id"/>
                        </label>
                        <label for="field1">
                            <span align="left" class='control-label'>Emp Category</span>:  <select class="person" name="emp_categry" id="emp_cat" style="font-family: Georgia;">
                                <option value="STAF">Staff</option>
                                <option value="WORK">Worker</option>
                        </select>
                        </label>
                        <label for="field1">
                            <span align="left" class='control-label'>First Name</span>: <input type="text" name="emp_f_name" required='required' placeholder='Enter First Name' class="emp_f_name" />
                        </label>
                        <label for="field1">
                            <span align="left">Middle Name</span>: <input type="text" name="emp_m_name" placeholder='Enter Middle Name' class="emp_m_name" />
                        </label>
                        <label for="field1">
                            <span align="left" class='control-label'>Last Name</span>: <input type="text" name="emp_l_name" placeholder="Enter Last Name" required='required' class="emp_l_name"/>
                        </label>
                        <label for="field1">
                            <span align="left">Driving Licence No.</span>: <input type="text" name="emp_dl_no"   maxlength="15" placeholder="XX00 00000000000" onblur="ValidateDl(this);"  class="dl_no"/>
                        </label>
                        <label for="field1">
                            <span align="left">Driving Licence Expiry Date </span>: <input type="text" name="emp_dl_exp_date" placeholder="Enter Licence Expiry Date" class="dl_date" />
                        </label>
                        <label for="field1">
                            <span align="left" class='control-label'>Gender</span>: <select class="person" name="emp_gender" style="font-family: Georgia;">
                            <option value="0">Male</option>
                            <option value="1">Female</option>
                        </select>
                        </label>
                        <label for="field2">
                            <span align="left" class='control-label'>Marital Status</span>: <select class="person" name="emp_marital_status" style="font-family: Georgia;">
                            <option value="0">Married</option>
                            <option value="1">Single</option>
                        </select>
                        </label>
                        <label for="field1">
                            <span align="left" class='control-label'>Nationality</span>: <input type="text" name="emp_nationality" value="Indian" required="required"/>
                        </label>
                        <label for="field2">
                            <span align="left" class='control-label'>Date Of Birth</span>: <input type="text" name="emp_dob" class="dl_date" placeholder="dd-mm-yyyy" id="emp_dob" />
                        </label>    
                    </div>
                </div>
            <h3 style="background:#428bca;color:white" id="acc2">Contact Detail</h3>
                <div>               
                    <div class="form-style-4" >
                        <label for="field1">
                            <span align="left" class='control-label'>Address1</span>: <input type="text" name="emp_address1" placeholder="Enter Address" required="required" class="address1"/> 
                        </label>
                        <label for="field1">
                            <span align="left">Address2</span>: <input type="text" name="emp_address2" /> 
                        </label>
                        <label for="field1">
                            <span align="left" class='control-label'>City</span>: <input type="text" name="emp_city" class="emp_city" placeholder="Enter City" required="required"/> 
                        </label>
                        <label for="field1">
                            <span align="left" class='control-label'>State</span>: <input type="text" name="emp_state" class="emp_state" placeholder="Select State" required="required"/> 
                        </label>
                        <label for="field1">
                            <span align="left" class='control-label'>PIN Code</span>: <input type="text" name="emp_postal_code" class="pin_code"  onkeypress="return isNumberKey(event)" placeholder="000 000" maxlength="6" title="PIN" required="required"/> 
                        </label>
                        <label for="field1">
                            <span align="left" class='control-label'>Country</span>:<input type="text" name="emp_country" class="country" placeholder="Select Country" required="required"/> 
                        </label>
                        <label for="field2">
                            <span align="left">Home Telephone</span>: <input type="text" name="emp_home_tel" value="+91" /> 
                        </label>
                        <label for="field1">
                            <span align="left">Work Telephone</span>: <input type="text" name="emp_work_tel" value="+91"/>
                        </label>
                        <label for="field1">
                            <span align="left">Mobile</span>: <input type="text" name="emp_mob" class="mobile" value="+91" maxlength="13"/>
                        </label>
                        <label for="field2">
                            <span align="left">Other Phone</span>: <input type="text" name="emp_other_phone" value="+91" />
                        </label>    
                        <label for="field1">
                            <span align="left">Work Email</span>: <input type="email" name="emp_work_email" placeholder="abc@xyz.com" />
                        </label>
                        <label for="field2">
                            <span align="left">Other Email</span>: <input type="email" name="emp_other_email"  placeholder="abc@xyz.com" />
                        </label>    
                    </div>    
                </div>
            <h3 style="background:#428bca;color:white" id="acc3">Job Detail</h3>
                <div>
                    <div class="form-style-4" >
                        <label for="field1" id="designation">
                            <span align="left" class='control-label'>Designation</span>:  <select class="person" name="emp_title" style="font-family: Georgia;">
                            <option>Director</option>
                            <option>Head</option>
                            <option>Supervisor</option>
                        </select>
                        </label>
                        <label for="field1">
                            <span align="left" class='control-label'>Employment Status</span>: <select class="person" name="emp_employment_status" style="font-family: Georgia;">
                            <option>Active</option>
                            <option></option>
                        </select>
                        </label>
                        <label for="field1">
                            <span align="left">Job Category</span>: <select class="person" name="emp_job_category" style="font-family: Georgia;">
                            <option>Permanent</option>
                            <option>Temporary</option>
                        </select>
                        </label>
                        <label for="field1">
                            <span align="left" class='control-label'>Department</span>: <input type="text" name="emp_dept" class="emp_dept" placeholder="Select Department"/>
                        </label>
                        <label for="field1">
                            <span align="left">Employee Joined Date</span>: <input type="text" name="emp_joined_date" class="dl_date" placeholder="dd-mm-yyyyy" id="emp_joined"/>
                        </label>
                        <label for="field2">
                            <span align="left" class='control-label'>Job Location</span>: <input type="text" name="emp_location" placeholder="Enter Job Location" class="emp_location" />
                        </label>
                        <label for="field1">
                            <span align="left">Termination Date</span>: <input type="text" name="emp_termination_date" class="dl_date" placeholder="dd-mm-yyyyy" id="emp_termination"/>
                        </label>
                        <label for="field1">
                            <span align="left">Assigned Supervisor</span>: <input type="text" name="emp_assigned_super" class="emp_name" placeholder="Select Employee Name"/>
                        </label>
                        <div class="subordinate">
                        <label for="field2">
                            <span align="left">Assigned Subordinate</span><br>
                        </label> 
                        <label for="field2">
                            <span align="left">1.</span>: <input type="text" name="emp_assigned_sub1" class="emp_name" placeholder="Select Employee Name"/>
                        </label>  
                        <label for="field2">
                            <span align="left">2.</span>: <input type="text" name="emp_assigned_sub2" class="emp_name" />
                        </label>  
                        <label for="field2">
                            <span align="left">3.</span>: <input type="text" name="emp_assigned_sub3" class="emp_name"/>
                        </label>  
                        <label for="field2">
                            <span align="left">4.</span>: <input type="text" name="emp_assigned_sub4" class="emp_name" />
                        </label>  
                        <label for="field2">
                            <span align="left">5.</span>: <input type="text" name="emp_assigned_sub5" class="emp_name"/>
                        </label>  
                        </div>
                        <div class="worker_da">
                        <label for="field1">
                            <span align="left">Skills</span>: <input type="text" name="skill" class='skill' placeholder="Enter Worker Skills"/>
                        </label>
                        <label for="field1">
                            <span align="left">Skill Category</span>: <select class="person" name="skill_category" style="font-family: Georgia;">
                                <option>Select Skill Category</option>
                                <option>High Skilled</option>
                                <option>Skilled</option>
                                <option>Unskilled</option>
                             </select>
                        </label>
                        <label for="field1">
                            <span align="left">Wage</span>: <input type="text" name="wage" placeholder="Enter Employee Wage" />
                            </label>    
                        </div>
                    </div> 
                </div>
            <h3 style="background:#428bca;color:white">Emergency Contact Deatil</h3>
                <div>
                    <div class="form-style-4" >
                        <label for="field1">
                            <span align="left">Contact Person</span>: <input type="text" name="emp_emer_name" placeholder="Enter Person Name"/>
                        </label>
                        <label for="field1">
                            <span align="left">Relationship</span>: <select class="person" name="emp_emer_relationship" style="font-family: Georgia;">
                            <option>Select Relationship</option>
                            <option>Father</option>
                            <option>Mother</option>
                            <option>Wife</option>
                            <option>Son</option>
                            <option>Daughter</option>
                            <option>Brother</option>
                            <option>Sister</option>
                            <option>Friend</option>
                            <option>Other</option>
                        </select>
                        </label>
                        <label for="field1">
                            <span align="left">Home Telephone</span>: <input type="text" name="emp_emer_home_tel" value="+91"/>
                        </label>
                        <label for="field1">
                            <span align="left">Work Telephone</span>: <input type="text" name="emp_emer_work_tel" value="+91"/>
                        </label>
                        <label for="field1">
                            <span align="left">Work email</span>: <input type="email" name="emp_emer_work_email"  placeholder="abc@xyz.com" />
                        </label>
                        <label for="field2">
                            <span align="left">Other Email</span>: <input type="email" name="emp_other_work_email"  placeholder="abc@xyz.com" />
                        </label>
                        <label for="field1">
                            <span align="left">Mobile</span>: <input type="text" name="emp_emer_mob" class="emer_mobile" value="+91" maxlength="13" />
                        </label>
                    </div>    
                </div>
            <h3 style="background:#428bca;color:white">Bank Deatil</h3>
                <div>
                    <div class="form-style-4" >
                        <label for="field1">
                            <span align="left">Bank Name</span>: <input type="text" name="emp_bank" placeholder="Enter Bank Name" class="bank_name" />
                        </label>
                        <label for="field1">
                            <span align="left">Bank Account Name</span>: <input type="text" name="emp_bank_account_name" placeholder="Enter Bank Account Name" />
                        </label>
                        <label for="field1">
                            <span align="left">Account Type</span>: <input type="text" name="emp_bank_account_type" placeholder="Enter Account Type" />
                        </label>
                        <label for="field1">
                            <span align="left">Bank Account No.</span>: <input type="text" name="emp_bank_account_no" class='banck_acc'  maxlength="18" onkeypress="return isNumberKey(event)" placeholder="Enter Account No."/> 
                        </label>
                        <label for="field1">
                            <span align="left">Bank Account IFSC.</span>:  <input type="text" name="emp_bank_account_ifsc"  maxlength="11" class='ifsc' onblur="ValidateIFSC(this);" placeholder="Enter IFSC NO." /><br><br><br><br><br><br><br><br><br>
                        </label>
                        
                    </div>    
                </div>
  
        </div> <input type="hidden" value="Save" name="upload" />
        <div class="fixed-action-btn vertical" style="bottom: 45px; right: 24px;">
                <a class="btn-floating btn-large red"  href="<?php echo base_url();?>index.php/users">
                    <i id="pluse_ic" class="glyphicon glyphicon-plus"></i>
                    <i class="glyphicon glyphicon-home"></i>
                </a>
            
                <ul>
                    <li><a class="btn-floating yellow darken-1" data-placement="bottom" title="View Employee List" href="<?php echo base_url();?>index.php/users/emp_detail"><i class="glyphicon glyphicon-search"></i></a></li>
                   <li><button type="submit" id="submit" name = "submit" class="btn-floating blue" data-placement="bottom" title="Save"><span class="glyphicon glyphicon-floppy-save"></span></button></li>
                    <li><a class="btn-floating grey"  data-placement="bottom" title="Go Back!"  href="javascript:window.history.go(-1);"><i class="glyphicon glyphicon-arrow-left"></i></a></li>    
                </ul>
                           
        </div>
    <?php echo form_close(); ?>
</body>
    
    <script>
        $('.pin_code').keyup(function(){
            pin = $('.pin_code').val().replace(/\s/g, '').replace(/(\d{3})(\d{3})/g, '$1 $2');
            $('.pin_code').val(pin)
            });
            $(document).ready(function () {
            $(".emp_state").autocomplete({
                source: function (request, response) {
                    $.ajax({
                        url: "<?php echo base_url(); ?>index.php/users/states_name",
                        data:{term: request.term},
                        dataType: "json",
                        type: "POST",
                        dataFilter: function (data) { return data; },
                        success: function (data) {
                        response($.map(data, function (item) { 
                        return {
                            label: item.state_name,
                            value: item.state_name,
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
        $(".country").autocomplete({
            source: function (request, response) {
                $.ajax({
                    url: "<?php echo base_url(); ?>index.php/users/country_name",
                    data:{term: request.term},
                    dataType: "json",
                    type: "POST",
                    dataFilter: function (data) { return data; },
                    success: function (data) {
                            response($.map(data, function (item) {
                            $(".country").val(item.country_name);
                            $(".mobile").val(item.country_code);
                            return {
                                       label: item.country_name,
                                       value: item.country_name,
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
                });
                $(document).ready(function () {
                $(".emp_name").autocomplete({
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
            
            });
        });
         $(".emp_dept").autocomplete({
                    source: function (request, response) {
                        $.ajax({
                            url: "<?php echo base_url(); ?>index.php/users/rcpl_dept",
                            data:{term: request.term},
                            dataType: "json",
                            type: "POST",
                            dataFilter: function (data) { return data; },
                            success: function (data) {
                            response($.map(data, function (item) { 
                            return {
                                label: item.rcpl_dept,
                                value: item.rcpl_dept,
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
                    $(".bank_name").autocomplete({
                    source: function (request, response) {
                        $.ajax({
                            url: "<?php echo base_url(); ?>index.php/users/bank_name",
                            data:{term: request.term},
                            dataType: "json",
                            type: "POST",
                            dataFilter: function (data) { return data; },
                            success: function (data) {
                            response($.map(data, function (item) { 
                            return {
                                label: item.bank_name,
                                value: item.bank_name,
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
                $('.fixed-action-btn').hover(function(){
                $('#pluse_ic').toggle();
                });
                // Driving Licence No. Format
                $('.dl_no').keyup(function(){
                    ifsc = $('.dl_no').val().replace(/\s/g, '').replace(/([A-Z]{2})(\d{2})(\d{11})/g, '$1$2 $3');
                    $('.dl_no').val(ifsc.toUpperCase());
                });
                //Employee First Name Auto Capitalization
                 $('.emp_f_name ').keyup(function(){
                    emp_f_name = $('.emp_f_name').val();
                    $('.emp_f_name').val(emp_f_name.substring(0, 1).toUpperCase() + emp_f_name.substring(1).toLowerCase())
                    });
                    //Employee Middle Name Auto Capitalization    
                    $('.emp_m_name').keyup(function(){
                    emp_m_name = $('.emp_m_name').val();
                    $('.emp_m_name').val(emp_m_name.substring(0, 1).toUpperCase() + emp_m_name.substring(1).toLowerCase())
                    });
                    //Employee Last Name Auto Capitalization
                    $('.emp_l_name').keyup(function(){
                    emp_l_name = $('.emp_l_name').val();
                    $('.emp_l_name').val(emp_l_name.substring(0, 1).toUpperCase() + emp_l_name.substring(1).toLowerCase())
                    });
                    //Mobile No. Format 
                    $('.mobile').keyup(function(){
                    mobile = $('.mobile').val().replace(/\s/g, '').replace(/(\+)(\d{2})(\d{2})(\d{3})(\d{5})/g, '$1$2 $3 $4 $5');
                    $('.mobile').val(mobile)
                    });    
                    //Emergency Mobile No. Format 
                    $('.emer_mobile').keyup(function(){
                    emer_mobile = $('.emer_mobile').val().replace(/\s/g, '').replace(/(\+)(\d{2})(\d{2})(\d{3})(\d{5})/g, '$1$2 $3 $4 $5');
                    $('.emer_mobile').val(emer_mobile)
                    });    
                    //Bank Account Format
                    $('.banck_acc').keyup(function(){
                        banck_acc = $('.banck_acc').val().replace(/\s/g, '').replace(/(\d{3})/g, '$1 ');
                         $('.banck_acc').val(banck_acc)
                        });
                    //Bank IFSC Format  
                    $('.ifsc').keyup(function(){
                     ifsc = $('.ifsc').val().replace(/\s/g, '').replace(/([a-zA-Z]{4})(\d{1})(\d{3})(\d{3})/g, '$1 $2 $3 $4');
                        $('.ifsc').val(ifsc.toUpperCase())
                        });
                    $('#emp_cat').change(function(){
                        emp_cat= $('#emp_cat').val();
                        if(emp_cat=='STAF'){
                            alert('Add Staff Detail');
                            $('.subordinate').show();
                            $('.worker_da').hide();
                            $('#designation').show();
                        }else
                        {
                            alert('Add Worker Detail');
                            $('.subordinate').hide();
                            $('.worker_da').show();
                            $('#designation').hide();
                            
                        }
                    });
                     //validation Accordion
    $("#submit").click(function(){
        var image=$("#image").val();
        var emp_id=$(".emp_id").val();
        var emp_f_name=$(".emp_f_name").val();
        var emp_l_name=$(".emp_l_name").val();
        var emp_dob=$("#emp_dob").val();
        var address1=$(".address1").val();
        var emp_city=$(".emp_city").val();
        var emp_state=$(".emp_state").val();
        var pin_code=$(".pin_code").val();
        var country=$(".country").val();
        var emp_dept=$(".emp_dept").val();
        var emp_location=$(".emp_location").val();
        if(emp_id=='' || emp_f_name==''||emp_l_name==''||emp_dob=='')
        {
            alert('Please Check Personal Detail');
            document.getElementById('acc1').style.backgroundColor = '#e06262';
        } 
        else
        {
            document.getElementById('acc1').style.backgroundColor = '#428bca';
        }
        if(address1==''||emp_city==''||emp_state==''||pin_code==''||state==''||country==''){
            alert('Please Check Contact Detail');
            document.getElementById('acc2').style.backgroundColor = '#e06262';
            }
            else
            {
                document.getElementById('acc2').style.backgroundColor = '#428bca';
            }
        if(emp_dept==''||emp_location==''){
            alert('Please Check Job Detail');
            document.getElementById('acc3').style.backgroundColor = '#e06262';
            }
            else
            {
                document.getElementById('acc3').style.backgroundColor = '#428bca';
            }
        });
    </script>

</html>
