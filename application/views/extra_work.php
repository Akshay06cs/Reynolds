<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
    <title>Invoice</title>
    <!-- <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">  -->
    <link rel='stylesheet' type='text/css' href="<?php echo base_url("assets/css/style1.css");?>" />
    <link rel='stylesheet' type='text/css' href="<?php echo base_url("assets/css/print.css");?>" />
    <link rel='stylesheet' type='text/css' href="<?php echo base_url("assets/css/bootstrap.min.css");?>" />
    <script type='text/javascript' src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
    <script type='text/javascript' src="<?php echo base_url("assets/js/jquery-1.4.4.min.js");?>"></script>
    <script type='text/javascript' src="<?php echo base_url(); ?>assets/js/jquery-1.11.3.min.js"></script>
    <script type='text/javascript' src="<?php echo base_url(); ?>assets/js/jquery-ui.js"></script>
    <script type='text/javascript' src="<?php echo base_url(); ?>assets/js/accounting.min.js"></script>     
    <!-- Time Picker -->
        <link rel='stylesheet' type='text/css' href="<?php echo base_url("assets/css/jquery.ptTimeSelect.css");?>" />
        <script type='text/javascript' src="<?php echo base_url(); ?>assets/js/jquery.ptTimeSelect.js"></script>
    <!-- Floating Button -->
    <link rel='stylesheet' type='text/css' href="<?php echo base_url("assets/css/font-awesome.min.css");?>" />
    <script type='text/javascript' src="<?php echo base_url(); ?>assets/js/materialize.js"></script> 
    <link rel='stylesheet' type='text/css' href="<?php echo base_url("assets/css/materialize.css");?>" />
    <!-- Date Picker Plugins -->
    <link rel='stylesheet' type='text/css' href="<?php echo base_url("assets/css/jquery-ui.css");?>" />
    <!--
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css"> -->
   
  
      </style>
        <script>
        $(function() {
            $( "#datepicker" ).datepicker({ dateFormat: 'dd-mm-yy' });
            $( "#datepicker1" ).datepicker({ dateFormat: 'dd-mm-yy' });
            $( "#datepicker2" ).datepicker({ dateFormat: 'dd-mm-yy' });
        });
        function autocomplete() {
                  $(".worker_name").autocomplete({
                    source: function (request, response) {
                        $.ajax({
                        url: "<?php echo base_url(); ?>index.php/users/worker_names",
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
                        $("#mob").val(data.mob);
                        $("#id").val(data.empid);
                        $("#gate_count").html(data.c_gate);
                    }
                });
                }
            });
        }
        function work_order(){
            $(".work_order").autocomplete({
                source: function (request, response) {
                $.ajax({
                    url: "<?php echo base_url(); ?>index.php/users/work_order",
                    data:{term: request.term},
                    dataType: "json",
                    type: "POST",
                    dataFilter: function (data) { return data; },
                    success: function (data) {
                        response($.map(data, function (item) { 
                        return {
                                    label: item.work_order,
                                    value: item.work_order,
                                    id: item.pid
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
            }
        function work_reason()
                    {
                         $(".work_reason").autocomplete({
                            source: function (request, response) {
                            $.ajax({
                            url: "<?php echo base_url(); ?>index.php/users/work_reason",
                            data:{term: request.term},
                            dataType: "json",
                            type: "POST",
                            dataFilter: function (data) { return data; },
                            success: function (data) {
                            response($.map(data, function (item) { 
                            return {
                                    label: item.reasons,
                                    value: item.reasons,
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
            }            
      $(document).ready(function () {
             autocomplete();
             work_order(); 
             work_reason();
             $('.from_time').ptTimeSelect();
             $('.to_time').ptTimeSelect();
            });
            
        </script>
    <style>
            input{ border: 0;}
        </style>
    </head>
    <body>
      
<div class="modal-overlay"></div>
    <div class="container">
            <div style="width: 100%;">
                <div style="float:left; width: 20%">
                    <img  src="<?php echo base_url();?>assets/images/logo2.png" alt="logo" width='100' height='100' />
                </div>
                <div style="float:left;width: 65%">
                    <center><h1>Reynolds Chemequip Pvt. Ltd.</h1>
                    <p>Plot No. N 14 & N 17, KSSIDC Industrial Estate,UdyamBag, Belgaum - 590008</p>
                    <p>Phone: (0831) 2441141; Fax : (0831) 2440887 </p>
                    <h2>Extra Work </h2>
                    </center>
                </div>
                </div>
            
                  
                    <form action="<?= base_url('index.php/users/extra_work_request') ?>" method ="post">
                        
                    <div style="clear:both"></div>
                  Date: <input type="text" name="date" id="datepicker" Placeholder="dd/mm/yy" style="background:#F5F5DC" title="Extra Work Date" /><br/>
                    <center style="color:#428bca">Following Workman are assigned extra work</center>
                    <div class="table-responsive"> 
                        <table id="items" class="table table-condensed">
                        
                        <thead>
                    <tr>
                        <th>S. No.</th>
                        <th>Name</th>
                        <th>From</th>
                        <th>To</th>
                        <th>Hrs.</th>
                        <th>W.O.</th>
                        <th>Purpose</th>
                        <th>T</th>
                        <th>S</th>
                        <th>D</th>
                        <th>L</th>
                        
                    </tr>
                        </thead>
                        <tbody>
                            <tr class="item-row">
                                <td>.</td>
                                <td><input type="text" name='worker_name[]' class="worker_name" placeholder="Worker Name" size="25" style="background:#F5F5DC" title="Start Typing Worker Name" /></td>
                                <td><input name='from[]' title="Select Date" type="text"  class="from_time" placeholder="Start Time" style="background:#F5F5DC"/></td>
                                <td><input name='to[]' class="to_time" placeholder="End Time" style="background:#F5F5DC"/></td>
                                <td><input name='hrs[]' style="background:#F5F5DC;text-align:center;background:#F5F5DC" class="total_hrs" /></td>
                                <td><input name='work_order[]' class="work_order" placeholder="Work Order" style="background:#F5F5DC"  title="Work Order No."/></td>
                                <td><input name='purpose[]' class="work_reason" placeholder="Reason" style="background:#F5F5DC" title="Reason"/></td>
                                <td><input name='tea[]'type="checkbox" class="tea" value="Tea"/></td>
                                <td><input name='snacks[]'type="checkbox" class="snacks" value="Snacks"/></td>
                                <td><input name='dinner[]'type="checkbox" class="dinner" value="Dinner"/></td>
                                <td><input name='lunch[]'type="checkbox" class="lunch" value="Lunch"/></td>
                            </tr>
                        </tbody>
                    
                    <tr>
                        <td colspan="11"><a id="addrow" href="javascript:;" title="Add a row"><i class="glyphicon glyphicon-plus"></a></td>
                    </tr>
                   
                    </table>    
                </div>
                <div style="width: 100%;">
                   
                <div style="float:right;">
                  
                    <br>
                    <div align="right">
                    For Reynolds Chemequip Pvt. Ltd <br><br>
                    Authorised Signature
                    </div>
                    <!-- Signature PAD -->
                    <div id="logo">
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
                    </div>
                </div>
            </div>
            <div style="clear:both"></div>
            <div class="fixed-action-btn vertical" style="bottom: 45px; right: 24px;">
                <a class="btn-floating btn-large red"  href="<?php echo base_url();?>index.php/users">
                    <i id="pluse_ic" class="glyphicon glyphicon-plus"></i>
                    <i class="glyphicon glyphicon-home"></i>
                </a>
                <ul>
                    <li><a class="btn-floating yellow darken-1" data-placement="bottom" title="View PO List" href="#"><i class="glyphicon glyphicon-search"></i></a></li>
                    <li><a class="btn-floating green"  data-placement="bottom" title="Create New PO!"><i class="glyphicon glyphicon-pencil"></i></a></li>
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
                        $('input').click(function(){
                        $(this).select();
                        });
                    // Row Numbers
                    $("#addrow").click(function(){
                       
                     var $row = $('<tr class="item-row"><td>.</td><td><input type="text" name="worker_name[]" class="worker_name" placeholder="Worker Name" size="25" style="background:#F5F5DC" title="Start Typing Worker Name"></td><td><input name="from[]" title="Select Date" type="text" class="from_time" placeholder="Start Time" style="background:#F5F5DC"/></td><td><input name="to[]"  class="to_time" placeholder="End Time" style="background:#F5F5DC"/></td><td><input name="hrs[]" style="background:#F5F5DC;text-align:center;background:#F5F5DC" title="Total Hrs." class="total_hrs"/></td><td><input name="work_order[]" class="work_order" placeholder="Work Order" style="background:#F5F5DC"  title="Work Order No."/></td><td><input name="purpose[]" class="work_reason" placeholder="Reason" style="background:#F5F5DC" title="Reason"/></td><td><input name="tea[]" type="checkbox" value="Tea"  class="tea"/></td><td><input name="snacks[]" type="checkbox"  class="snacks" value="Snacks"/></td> <td><input name="dinner[]" type="checkbox"  class="dinner" value="Dinner"/></td><td><input name="lunch[]" class="lunch" type="checkbox" value="Lunch"/></tr>').insertAfter(".item-row:last");
                    
                        bind($row);
                     });
                    function bind($row)
                    { 
                        $row.find('.work_order').keyup(work_order);
                        $row.find('.worker_name').keyup(autocomplete);
                        $('.from_time').ptTimeSelect();
                        $('.to_time').ptTimeSelect();
                        $row.find('.work_reason').keyup(work_reason);
                        $row.find('.total_hrs').keyup(total_work_time);
                    }
                    $(".delete").live('click',function(){
                    $(this).parents('.item-row').remove();
                    update_total();
                    if ($(".delete").length < 2) $(".delete").hide();
                    });
                });
                
                document.getElementById('total').innerHTML = number.toLocaleString('en-IN', {
                maximumFractionDigits: 2,
                style: 'currency',
                currency: 'INR'
                });
            </script>
        </body>

    <script>
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
    <script type="text/javascript">
        $('.total_hrs').keyup(function(){
             total_work_time();
                });
            function total_work_time()
            {
                $('.item-row').each(function() 
                {
                    var time =  $(this).find('.from_time').val();
                    var hrs = Number(time.match(/^(\d+)/)[1]);
                    var mnts = Number(time.match(/:(\d+)/)[1]);
                    var format = time.match(/\s(.*)$/)[1];
                    if (format == "PM" && hrs < 12) hrs = hrs + 12;
                    if (format == "AM" && hrs == 12) hrs = hrs - 12;
                    var hours = hrs.toString();
                    var minutes = mnts.toString();
                    if (hrs < 10) hours = "0" + hours;
                    if (mnts < 10) minutes = "0" + minutes;
                    var start_time=hours + ":" + minutes;
                    var start = start_time.split(":");
                    var start_hrs = start[0];
                    var start_min = start[1];
                    var time1 = $(this).find('.to_time').val();
                    var hrs1 = Number(time1.match(/^(\d+)/)[1]);
                    var mnts1 = Number(time1.match(/:(\d+)/)[1]);
                    var format1 = time1.match(/\s(.*)$/)[1];
                    if (format1 == "PM" && hrs1 < 12) hrs1 = hrs1 + 12;
                    if (format1 == "AM" && hrs1 == 12) hrs1 = hrs1 - 12;
                    var hours1 = hrs1.toString();   
                    var minutes1 = mnts1.toString();
                    if (hrs1 < 10) hours1 = "0" + hours1;
                    if (mnts1 < 10) minutes1 = "0" + minutes1;
                    var end_time=hours1 + ":" + minutes1;   
                    var end = end_time.split(":");
                    var end_hrs = end[0];
                    var end_min = end[1];
                    var total_hours=end_hrs-start_hrs;
                    if(total_hours<0)
                    {
                        total_hours=total_hours+24;
                    }
                    var total_minutes=end_min-start_min;
                    if(total_minutes<0)
                    {
                        total_minutes=total_minutes+60;
                        total_hours=total_hours-1;
                    }   
                    if(total_minutes<10)
                    {
                        total_minutes="0"+total_minutes;
                    }
                    var timing=total_hours+':'+total_minutes;
                    $(this).find('.total_hrs').val(timing);
                    if(total_hours>0 && total_hours<5)
                    {
                        $(this).find('.tea').prop("checked", true);
                        $(this).find('.snacks').prop("checked", true);
                        $(this).find('.dinner').prop('disabled', true);
                        $(this).find('.lunch').prop('disabled', true);
                    }
                    else if(total_hours=>4 && total_hours<=8 )
                    {
                        $(this).find('.tea').prop("checked", true);
                        $(this).find('.snacks').prop("checked", true);
                        $(this).find('.dinner').prop('checked', true);
                        $(this).find('.lunch').prop('disabled', true);
                    }else if(total_hours>8)
                    { 
                        $(this).find('.tea').prop("checked", true);
                        $(this).find('.snacks').prop("checked", true);
                        $(this).find('.dinner').prop('checked', true);
                        $(this).find('.lunch').prop('checked', true);
                    }
                });
            }
        </script>
    </html>