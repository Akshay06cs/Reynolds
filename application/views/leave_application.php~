<html>
    <head>
        <script type='text/javascript' src="<?php echo base_url(); ?>assets/js/jQuery-2.1.4.min.js"></script>  
        <link rel='stylesheet' type='text/css' href="<?php echo base_url("assets/css/bootstrap.min.css");?>" />
        <link rel='stylesheet' type='text/css' href="<?php echo base_url("assets/css/jquery.ptTimeSelect.css");?>" />
        <script type='text/javascript' src="<?php echo base_url(); ?>assets/js/jquery.ptTimeSelect.js"></script>
        <!--Autocomplete -->
        <script type='text/javascript' src="<?php echo base_url(); ?>assets/js/jquery-ui.js"></script>
        <!-- Dropdown Style For Autocomplete -->
        <link rel='stylesheet' type='text/css' href="<?php echo base_url("assets/css/jquery-ui.css");?>" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
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
                            $("#addr").val(item.addr);
                            $("#ph").val(item.ph);
                            $("#email").val(item.email);
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
                        $("#mob").val(data.mob);
                        $("#id").val(data.empid);
                        $("#gate_count").html(data.leave_cnt);
                    }
                });
                }
            });
        });
         $(function() {
            $( "#datepicker" ).datepicker({ dateFormat: 'dd-mm-yy' });
            $( "#datepicker1" ).datepicker({ dateFormat: 'dd-mm-yy' });
            $( "#datepicker2" ).datepicker({ dateFormat: 'dd-mm-yy' });
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
        <div class="container">
            <div class="jumbotron">
                <center><h2>Reynolds Chemequip Pvt. Ltd.</h2><br><h4>Leave Application</h4></center>
                <div class="alert alert-info">
                    <strong id="gate_count">Info!</strong> Leave Balance to His/Her Account !!!
                </div>
                <!--no of gate Pass in Month -->
                    <form class="form-style-4" action="<?= base_url('index.php/users/leave_application_request') ?>" method="post">
                        <label for="field1">
                            <span align="left">Name</span><input type="text" id="name" name="name" required="true" />
                        </label>
                        <label for="field1">
                            <label class="mdl-switch mdl-js-switch " for="day">
                                <input type="checkbox" id="day" class="mdl-switch__input">
                                 <span class="mdl-switch__label">Day/Days</span>
                            </label>
                        </label>
                        <div class="day">
                        <label for="field1">
                            <span align="left">On</span><input type="text" class="date" id="datepicker" name="ttime" required="true" />
                        </label>
                        </div>
                         <div class="days">
                        <label for="field1">
                            <span align="left">From</span><input type="text" class="date1" id="datepicker1" name="ttime"  />
                        </label>
                        <label for="field1">
                            <span align="left">To</span><input type="text" class="date2" name="ttime" id="datepicker2"  />
                        </label>
                        <label for="field1">
                            <span align="left">Number Of Days</span><input type="text" class="number_of_days" name="ttime" />
                        </label>
                        </div>
                        <label for="field2">
                            <span align="left">Reason</span><input type="text" id="reason" name="reason" required="true" />
                        </label>
                        <label for="field2">
                            <span align="left">Mobile No.</span><input type="text" id="mob" name="mob" class="mob" required="true" /><input type="hidden" name="date" value="<?php   echo date("d/m/y"); ?>"/>
                        </label>
                        <!-- status captur --><input type="hidden" name="status" value="Request" />
                        <label>
                            <span>&nbsp;</span><input type="submit" value="Send" />
                        </label> 
                        <!-- Unique Id Of Employee for Gate Pass counting-->  <input type="hidden" id="id" name="id" >
                         <input type="hidden" name="month" value="<?php   echo date("m"); ?>">
                    </form>    
                <b><?php   echo date("d/m/y"); ?></b>
            </div>
        </div>
    </body>
        <div class="fixed-action-btn vertical" style="bottom: 45px; right: 24px;">
            <a class="btn-floating btn-large red"  href="<?php echo base_url();?>index.php/users">
                <i id="pluse_ic" class="glyphicon glyphicon-plus"></i>
                <i class="glyphicon glyphicon-home"></i>
            </a>
            <ul>
                <li><a class="btn-floating yellow darken-1" data-placement="bottom" title="View GatePass List" href="<?php echo base_url();?>index.php/users/show_gate_pass"><i class="glyphicon glyphicon-search"></i></a></li>
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
            $(document).ready(function(){
                 $('.days').hide();
          
            });
            $('#day').change(function()
            {
              $('.days').toggle();
              $('.day').toggle();
            });
            $('.number_of_days').keyup(function(){
            // changin Format from dd-mm-yy to mm-dd-yy
            var x = $('.date1').val().slice(0, 10).split('-');
            var from = (x[1] +'/'+ x[0] +'/'+ x[2]);
            var y = $('.date2').val().slice(0, 10).split('-');
            var to = (y[1] +'/'+ y[0] +'/'+ y[2]);
            var date1 = new Date(from);
            var date2 = new Date(to);
            var timeDiff = Math.abs(date2.getTime() - date1.getTime());
            var diffDays = Math.ceil(timeDiff / (1000 * 3600 * 24)); 
            var total_leave = diffDays + 1; 
            $('.number_of_days').val(total_leave);
              });
        </script>
</html>




















