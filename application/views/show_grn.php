
        

<html>
<title>Goods Receipt Note</title>
            <head>
                <link rel='stylesheet' type='text/css' href="<?php echo base_url("assets/css/bootstrap.min.css");?>" />
                <!-- DataTables CSS -->
                <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/jquery.dataTables.css">
                <!-- jQuery -->
                <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-1.3.2.min.js"></script> 
                  <script type='text/javascript' src="<?php echo base_url(); ?>assets/js/jquery-1.11.3.min.js"></script>
                <!-- DataTables -->
                <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.dataTables.min.js"></script>
                <!-- Mateerial Scripts -->
                <script type='text/javascript' src="<?php echo base_url(); ?>assets/js/materialize.js"></script>    
                <link rel='stylesheet' type='text/css' href="<?php echo base_url("assets/css/materialize.css");?>" />
                 <!--Currency formater javascript file -->
        <script type='text/javascript' src="<?php echo base_url(); ?>assets/js/format.20110630-1100.min.js"></script>
            </head>
<body>
    <div class="container">
        <h1>GRN Records</h1>
        <table id="datatable" class="table table-bordered table-condensed table-striped table-hover">
            <thead>
                <tr>
                    <th>GRN No.</th>
                    <th>PO No.</th>
                    <th>Supplier Name</th>
                    <th>GRN Date</th>
                    <th>Total Amount</th>
                    <th>Edit</th>
                    <th>View</th>
                    <th>Delete</th>
                </tr>
            </thead>
              <tbody>
        <?php 
            foreach($r->result() as $row){
        ?>
      
            <tr class="item-row">
                <td><?= $row->grn_id ?></td>
                <td><?= $row->po_no ?></td>
                <td><?= $row->supplier_name ?></td>
                <td><?= $row->grn_date ?></td>
                <td class="value_format"><input type="hidden" class="value" value="<?= $row->total_amount ?>"></td>
                <td><a href="<?= base_url('index.php/users/edit_grn/'.$row->grn_id); ?>" class="glyphicon glyphicon-edit"></a></td>
                <td><a href="<?= base_url('index.php/users/grn_approval/'.$row->grn_id); ?>" class="glyphicon glyphicon-eye-open"></a></td>
                <td><a href="<?= base_url('index.php/users/delete_grn/'.$row->grn_id); ?>" class="glyphicon glyphicon-remove"></a></td>
            </tr>
       
        <?php
        } ?>
             </tbody>
        </table>
          <div class="fixed-action-btn vertical" style="bottom: 45px; right: 24px;">
                <a class="btn-floating btn-large red"  href="<?php echo base_url();?>index.php/users">
                    <i id="pluse_ic" class="glyphicon glyphicon-plus"></i>
                    <i class="glyphicon glyphicon-home"></i>
                </a>
                <ul>
                    <li><a class="btn-floating green"  data-placement="bottom" title="Create New GRN!"  href="<?php echo base_url();?>index.php/users/grn"><i class="glyphicon glyphicon-file"></i></a></li>
                     <li><a class="btn-floating grey"  data-placement="bottom" title="Go Back!"  href="javascript:window.history.go(-1);"><i class="glyphicon glyphicon-arrow-left"></i></a></li>    
                </ul>
                           
        </div>
        </div>
           
</body>
 <script>
                $('.fixed-action-btn').hover(function(){
                $('#pluse_ic').toggle();
                });
                $(document).ready( function () {
            $('#datatable').dataTable({
            aaSorting: [[0, 'desc']]
        });
    });
                
    $(document).ready(function()
    {    
        var value;
        $('.item-row').each(function() {
        value = $(this).find('.value').val();
        var sum_fixed= parseFloat(value).toFixed(2);
        var FullData = format( "#,##0.00####", sum_fixed);
        var n=FullData.split(",");
        var part1 ="";
        for(i=0;i<n.length-1;i++)
        part1 +=n[i];    
        var part2 = n[n.length-1];
        if(part1.length>0){
        var sum =format( "##,##.####", part1) + "," + part2
    }
    $(this).find('.value_format').html(sum);
    });
    });
            </script>
</html>