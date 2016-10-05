
<html>
<head>
    <title>RCPL Quotation Detail</title>
    <script type='text/javascript' src="<?php echo base_url(); ?>assets/js/jQuery-2.1.4.min.js"></script>  
    <link rel='stylesheet' type='text/css' href="<?php echo base_url("assets/css/bootstrap.min.css");?>" />
    <link rel='stylesheet' type='text/css' href="<?php echo base_url("assets/css/jquery.ptTimeSelect.css");?>" />
    <script type='text/javascript' src="<?php echo base_url(); ?>assets/js/jquery.ptTimeSelect.js"></script>
    <!--Autocomplete -->
    <script type='text/javascript' src="<?php echo base_url(); ?>assets/js/jquery-ui.js"></script>
    <!-- Jquery Plugin For Ubuntu-->
         <script type='text/javascript' src="<?php echo base_url(); ?>assets/js/jquery-1.12.1.min"></script>
          <!--Currency formater javascript file -->
        <script type='text/javascript' src="<?php echo base_url(); ?>assets/js/format.20110630-1100.min.js"></script>
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
    $( "#accordion" ).accordion();
});
</script>

  <style>
   
   .form-group.required .control-label:after { 
   content:"*";
   color:red;
    }
  </style>
</head>
<body>
   
  <form  action="" method ="post">
    <div id="accordion">
  <h1 style="background:#428bca;color:white" id="acc1">Quotation Detail</h1>
  
  <div>
     <div class="form-style-4" >
                      
                        
                         
    <div class="form-group required">
                        <label for="field1">
                            <span align="left">Customer Name</span>:<?= $r->customer_name ?>
                        </label>
       
                        <label for="field1">
                            <span align="left">Quotation Date</span>:<?php echo date('d-m-Y', strtotime(str_replace('-','/', $r->qt_date))); ?>
                        </label>
                        <label for="field1">
                            <span align="left">Quotation No.</span>:<?= $r->qt_no ?>
                        </label>
                       
                        <label for="field2">
                            <span align="left">Quotation Version</span>:<?= $r->version ?>
                        </label> 
                        <label for="field2">
                            <span align="left">Total Value</span>: <i class="fa fa-inr">&nbsp;</i><b><?php echo $r->total_value;?></b>
                        </label> 
                        <label for="field2">
                            <span align="left">Contact Person</span>:<?= $r->contct_person ?> 
                        </label> 
                        <label for="field2">
                            <span align="left">Mobile</span>:<?= $r->cnt_num ?> 
                        </label> 
          </div>
         </div>
                </div>
    <h3 style="background:#428bca;color:white" id="acc2">Equipment Deatil</h3>
  <div>
  <div class="form-style-4 form-group required">
        <table  class="table test"> 
            <tr class="prospect" style=" background-color:#eeeeee;">
                <th>Si. No.</th>
                <th>Description</th>
                <th>Qty</th>
                <th>Rate</th>
                <th>Total</th>
            </tr>
            <?php 
            $sino='1';
                foreach($q as $key){ ?>
                <tr class = "item-row" style="color:white;">
                    <td><?= $sino ?></td>
                    <td><?= $key->description ?></td>
                    <td><?= $key->qty ?></td>
                    <td><?= $key->rate ?></td>
                    <td><?= $key->total ?></td>
                </tr>
            <?php 
            $sino++;
            } ?>
            </table>
        </div>
    </div>
</div>
<div class="fixed-action-btn vertical" style="bottom: 45px; right: 24px;">
                <a class="btn-floating btn-large red"  href="<?php echo base_url();?>index.php/users">
                    <i id="pluse_ic" class="glyphicon glyphicon-plus"></i>
                    <i class="glyphicon glyphicon-home"></i>
                </a>
                <ul>
                  
                    <li><a class="btn-floating grey"  data-placement="bottom" title="Go Back!"  href="javascript:window.history.go(-1);"><i class="glyphicon glyphicon-arrow-left"></i></a></li>    
                </ul>
            </div>
               </form>    
            <script>
                $('.fixed-action-btn').hover(function(){
                $('#pluse_ic').toggle();
                });
                </script>

</body>
<script>
$(document).ready(function()
    {       
        $('.item-row').each(function() {
        value = $(this).find('.rate').val();
        var sum_fixed=parseFloat(value).toFixed(2);
        var FullData = format( "#,##0.00####", sum_fixed);
        var n=FullData.split(",");
        var part1 ="";
        for(i=0;i<n.length-1;i++)
        part1 +=n[i];    
        var part2 = n[n.length-1];
        if(part1.length>0){
        var sum =format( "##,##.####", part1) + "," + part2
        
    }
    $(this).find('.rate_format').html(sum);
    });
    
    });
    $(document).ready(function()
    {       
        $('.item-row').each(function() {
        value = $(this).find('.total').val();
        var sum_fixed=parseFloat(value).toFixed(2);
        var FullData = format( "#,##0.00####", sum_fixed);
        var n=FullData.split(",");
        var part1 ="";
        for(i=0;i<n.length-1;i++)
        part1 +=n[i];    
        var part2 = n[n.length-1];
        if(part1.length>0){
        var sum =format( "##,##.####", part1) + "," + part2
    }else{
        var sum =format( "##,##.####", part1) + "" + part2
    }
    $(this).find('.total_format').html(sum);
    });
    });
    $(document).ready(function()
    {       
        grand_total = $('.grand_total').val();
        var grand=parseFloat(grand_total).toFixed(2);
        var FullData = format( "#,##0.00####", grand);
        var n=FullData.split(",");
        var part1 ="";
        for(i=0;i<n.length-1;i++)
        part1 +=n[i];    
        var part2 = n[n.length-1];
        if(part1.length>0){
        var gt =format( "##,##.####", part1) + "," + part2
    }else{
        var gt =format( "##,##.####", part1) + "" + part2
    }
        $('.grand').html(gt);
        total = $('.total').val();
       
    });
    
</script>
</html>

