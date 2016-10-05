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
     
     <link rel='stylesheet' type='text/css' href="<?php echo base_url("assets/css/popup_style.css");?>" />
        <!-- Floating Button -->
    <link rel='stylesheet' type='text/css' href="<?php echo base_url("assets/css/font-awesome.min.css");?>" />
    <script type='text/javascript' src="<?php echo base_url(); ?>assets/js/materialize.js"></script> 
    <link rel='stylesheet' type='text/css' href="<?php echo base_url("assets/css/materialize.css");?>" />
    <!-- Date Picker Plugins -->
    <link rel='stylesheet' type='text/css' href="<?php echo base_url("assets/css/jquery-ui.css");?>" />
    <!-- tax popup form -->
     <link rel='stylesheet' type='text/css' href="<?php echo base_url("assets/css/po_pop_form.css");?>" />
    <script type='text/javascript' src="<?php echo base_url(); ?>assets/js/format.20110630-1100.min.js"></script>
    <!--Currency formater javascript file -->
    <script type='text/javascript' src="<?php echo base_url(); ?>assets/js/format.20110630-1100.min.js"></script>
      <!-- Material Design libraries-->
    <script>
        $(function() {
            $( "#datepicker" ).datepicker({ dateFormat: 'dd-mm-yy' });
            $( "#datepicker1" ).datepicker({ dateFormat: 'dd-mm-yy' });
            $( "#datepicker2" ).datepicker({ dateFormat: 'dd-mm-yy' });
        });
        $(document).ready(function () {
            $("#supplier").autocomplete({
                source: function (request, response) {
                $.ajax({
                    url: "<?php echo base_url(); ?>index.php/users/cust_name",
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
                 
                    }
                });
            });
            
             $(document).ready(function () {
            
                autocomplete();
                work_order(); 
           
           
             });
            function autocomplete() {
            $(".parts").autocomplete({
                source: function (request, response) {
                $.ajax({
                    url: "<?php echo base_url(); ?>index.php/users/stock_parts_name",
                    data:{term: request.term},
                    dataType: "json",
                    type: "POST",
                    dataFilter: function (data) { return data; },
                    success: function (data) {
                        
                        response($.map(data, function (item) {
                           
                        return {
                                    label: item.demo,
                                    value: item.description,
                                    id: item.id
                                } 
                            }))
                        },
                    error: function (XMLHttpRequest, textStatus, errorThrown) {
                    alert(textStatus);
                    }
                    });
                    },
                    minLength: 2,
                    select: function (event , ui) {
                    var businessEntityId = ui.item.id;
                    $.ajax({
                        type: "POST",
                        data:{'id': businessEntityId},
                        dataType:"json",
                        url: "<?php echo base_url(); ?>index.php/users/stock_part_detail",//here we are calling our user controller 
                        success: function(data) //we're calling the response json array 'data'
                        {
                            $("#uom").val(data.uom);
                            $("#quantity").val(data.qty_weight);
                            $("#quantity_no").val(data.qty_no);
                            $("#id").val(data.id);
                            $("#length").val(data.desc_detail);
                        
                        }
                    });
                }
            });
        }
        function work_order(){
           var items = [ 'SS5029', 'SS5032' ];
        
            function split( val ) {
            return val.split( /,\s*/ );
        }
    function extractLast( term ) {
      return split( term ).pop();
    }
 
    $( ".work_order" ).autocomplete({
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
          this.value = terms.join( " " );
          return false;
        }
      });
        }
        
       
            $(document).ready(function () {
            $(".name").autocomplete({
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
                });
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
                                       id: item.id
                                    }
                                }))
                            },
                    error: function (XMLHttpRequest, textStatus, errorThrown) {
                        alert(textStatus);
                    }
                    });
                    },
                });
                
            });
            
        </script>
        <style>
            input{ border: 0;}
        </style>
    </head>
    <body>
        <div class="container">
             <div align='right'>QSR 042/1</div>
            <div style="width: 100%;">
                <img  src="<?php echo base_url();?>assets/images/header3.jpg" alt="logo" width='100%' height='125' />
            </div>
            <input type="hidden" id="order_no" name="order_no" value="">
                <hr>
                    <form action="<?= base_url('index.php/users/stock_update') ?>" method ="post">
                         <input type="hidden" class="new_order" name="order_no"/>
                    <div style="width: 100%;">
                        <div style="float:left; width:40%">
                            <table>
                            <input type="text" name='party_name' title="Start Typing Customer Name" id='supplier' tabindex="1" placeholder='Customer Name' Required="required" class ="btn-default form-control" style="font-weight: bold;border:0; background:#F5F5DC"/><br>
                          
                                
                            </table>
                        </div>
                        <div style="float:right;width: 40%">
                            <table class='payment'>
                                <tr><th>Order No.</th><td><input type="text"  class="order_num"  readonly /></td></tr>
                                <tr><th>Date</th><td><input name='issue_date' title="Select Date" type="text" id="datepicker" Required="required" tabindex="2" placeholder="dd-mm-yy" style="background:#F5F5DC"/></td></tr>
                                <tr><th>Work Order</th><td><input type="text"  name = "work_order" tabindex="3" name="w_o" style="background:#F5F5DC" class="work_order"/></td></tr>
                            </table>
                        </div>
                    </div>
                    <div style="clear:both"></div>
                    <hr>  
                    Please Issue Following Materials
                    
                    To Mr. <b><input type="text" name="receiver_name" class="name" style="background:#F5F5DC" placeholder="Employee Name"  size="25" required="true" /></b>
    
                    <hr>
                         
                <div class="table-responsive">
                    <table id="items">
                    <tr>
                        <th>Si.No.</th>
                        <th>Description</th>
                        <th>Quantity(In Stock)</th>
                        <th>Unit</th>
                        <th>Request Quantity</th>
                        <th>Pending Quantity</th>
                       
                    </tr>
                    <tr class="item-row">
                        <td>
                        .
                        </td>
                        <td><input type="hidden" name="id[]" id="id"/><textarea name='description[]' tabindex="8" class="parts" placeholder="Category Moc Grade Thickness" cols="40" style="background:#F5F5DC" title="Start Typing Part Category"></textarea><br><input type="text"  name='size[]' tabindex="9" id='length' class="length"  size="25" style="background:#F0F8FF;"/></td>
                        <td><textarea name='quantity[]' id="quantity_no" class="quantity_no" tabindex="12" cols="1" style="background:#F5F5DC" >1</textarea>
                            <textarea name='weight[]'  id="quantity" cols="10" class="quantity" tabindex="13" style="text-align:center" placeholder="Quantity" ></textarea></td>
                        <td><textarea name='unit[]' cols="6" id="uom" class="uom"></textarea></td>
                        <td><textarea name='quantity_no_req[]' class="quantity_no_req" tabindex="12"  cols="1"></textarea>
                            <textarea name='quantity_req[]'  class="quantity_req" cols="10"  tabindex="13" ></textarea></td>
                        <td><textarea name='quantity_no_pen[]' class="quantity_no_pen" tabindex="12"  cols="1"></textarea>
                            <textarea name='quantity_pen[]'  class="quantity_pen" cols="10"  tabindex="13" ></textarea></td>
                      
                    </tr>
                    <tr>
                        <td colspan="7"><a id="addrow" href="javascript:;" title="Add a row"><i class="glyphicon glyphicon-plus"></a></td>
                    </tr>
                   
                   
                    </table>    
                    <br></br>
                    Issued By :<input type="text" name="receiver_name" class="name" style="background:#F5F5DC" placeholder="Employee Name" size="25" required="true" value='<?php echo $user->emp_f_name;?> <?php echo $user->emp_m_name;?> <?php echo $user->emp_l_name;?>'/>
                </div>
                
            <div style="clear:both"></div>
            <div class="fixed-action-btn vertical" style="bottom: 45px; right: 24px;">
                <a class="btn-floating btn-large red"  href="<?php echo base_url();?>index.php/users" >
                    <i id="pluse_ic" class="glyphicon glyphicon-plus"></i>
                    <i class="glyphicon glyphicon-home"></i>
                </a>
                <ul>
                    <li><a class="btn-floating orange darken-1" data-placement="bottom" title="View Issue List" href="<?php echo base_url();?>index.php/users/view_issue_notes"><i class="glyphicon glyphicon-eye-open"></i></i></a></li>
                    <li><button type="submit" name = "submit" class="btn-floating blue" data-placement="bottom" title="Save"><span class="glyphicon glyphicon-save"></span></button></li>
                    <li><a class="btn-floating grey"  data-placement="bottom" title="Go Back!"  href="javascript:window.history.go(-1);"><i class="glyphicon glyphicon-arrow-left"></i></a></li>    
                </ul>
            </div>
              </form>
                    
                    <script>
                        
                         function total_rec_qty(){
               
            $('.item-row').each(function() {
                    stock_qty_no=$(this).find('.quantity_no').val();
                    stock_qty=$(this).find('.quantity').val();
                    qty_req = $(this).find('.quantity_no_req').val();
                    unit = $(this).find('.uom').val();
                    rate = $(this).find('.rate').val();
                    if(unit=='Kgs.' || unit == 'Mtr.')
            {
                            avg_qty = stock_qty/stock_qty_no;
                            req_qty= avg_qty*qty_req;
                            $(this).find('.quantity_req').val(req_qty);
                            pending = stock_qty_no - qty_req;
                            pending_wt=pending * avg_qty;
                            $(this).find('.quantity_no_pen').val(pending);
                            $(this).find('.quantity_pen').val(pending_wt);
               
               
            }else{
                pending_qty= stock_qty_no - qty_req;
                $(this).find('.quantity_req').val("-");
                $(this).find('.quantity_no_pen').val(pending_qty);
                $(this).find('.quantity_pen').val("-");
            }   
         
            });
             $('.total_amt').val(total_fix);
            }
                        $('.quantity_no_req').keyup(function(){
                                total_rec_qty();                    
                        })
                    </script>
               
               
              
                <script type="text/javascript">
                      
                     
                  
                    // Total Price And Ruppee Conversion
                   
                    $(document).ready(function()
                    {
                        $('input').click(function(){
                        $(this).select();
                        });
                    // Row Numbers
                    $("#addrow").click(function(){
                       
                     var $row = $('<tr class="item-row"><td></td><td><input type="hidden" name="id[]" class="id"/><textarea name="description[]" class="parts" style="background:#F5F5DC" title="Start Typing Part Category" placeholder="Category Moc Grade Thickness" cols="40"></textarea><br><input type="text" name="size[]"  style="background:#F0F8FF" class="length" size="25"/></td><td><textarea class="quantity_no" name="quantity[]" cols="1" style="background:#F5F5DC">1</textarea><input type="hidden" name="density[]" class="density"/><input type="hidden" class="thick" name="thickness[]" /><textarea class="quantity" name="weight[]" cols="10" style="text-align:center"placeholder="Quantity"></textarea></td><td><textarea class="uom" name="unit[]" cols="6"></textarea></td>  <td><textarea name="quantity_no_req[]" class="quantity_no_req" tabindex="12"  cols="1"></textarea><textarea name="quantity_req[]"  class="quantity_req" cols="10"  tabindex="13" ></textarea></td><td><textarea name="quantity_no_pen[]" class="quantity_no_pen" tabindex="12"  cols="1"></textarea> <textarea name="quantity_pen[]" class="quantity_pen" cols="10"  tabindex="13" ></textarea></td></tr>').insertAfter(".item-row:last");
                    
                        bind($row);
                     });
                    function bind($row) { 
                         $row.find('.quantity_no_req').keyup(total_rec_qty);               
                        $row.find('.parts').autocomplete({
                        source: function (request, response) {
                        $.ajax({
                            url: "<?php echo base_url(); ?>index.php/users/stock_parts_name",
                            data:{term: request.term},
                            dataType: "json",
                            type: "POST",
                            dataFilter: function (data) { return data; },
                            success: function (data) {
                            response($.map(data, function (item) {
                            return {
                                   label: item.demo,
                                   value: item.description,
                                   id: item.id
                                }
                            }))
                        },
                    error: function (XMLHttpRequest, textStatus, errorThrown) {
                    alert(textStatus);
                    }
                    });
                    },
                    minLength: 2,
                    select: function (event , ui) {
                    var businessEntityId = ui.item.id;
                    $.ajax({
                        type: "POST",
                        data:{'id': businessEntityId},
                        dataType:"json",
                        url: "<?php echo base_url(); ?>index.php/users/stock_part_detail",//here we are calling our user controller 
                        success: function(data) //we're calling the response json array 'data'
                        {
                             $row.find('.uom').val(data.uom);
                             $row.find('.quantity_no').val(data.qty_no);
                             $row.find('.quantity').val(data.qty_weight);
                             $row.find('.category').val(data.category);
                             $row.find(".moc").val(data.moc);
                             $row.find(".id").val(data.id);
                             $row.find(".length").val(data.desc_detail);
                           
                        }
                    });
                }
                        });
                        }
                    $(".delete").live('click',function(){
                    $(this).parents('.item-row').remove();
                    update_total();
                    if ($(".delete").length < 2) $(".delete").hide();
                    });
                });
            </script>

        </body>
 
    
   
</html>