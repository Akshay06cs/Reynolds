<html>
    <head>
                <!-- DataTables CSS -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/jquery.dataTables.css">
    <!-- jQuery -->
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-1.3.2.min.js"></script> 
    <script type='text/javascript' src="<?php echo base_url(); ?>assets/js/jquery-1.11.3.min.js"></script>
    <script type='text/javascript' src="<?php echo base_url(); ?>assets/js/materialize.js"></script>    
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.dataTables.min.js"></script>
    <link rel='stylesheet' type='text/css' href="<?php echo base_url("assets/css/materialize.css");?>" /> 
    </head>
    <body>   
    <h1>Order Booking Detail</h1>
    
    <table class="table table-bordered table-hover table-striped" id="datatable">
    <thead>
    <tr>
            <th>Obn No.</th>
            <th>Customer Name</th>
            <th>PO Date</th>
            <th>Value</th>
            <th>Delete</th>
            <th>View/Edit</th>
    </tr>
    </thead>
        <tbody>
            <?php foreach($obn_data->result() as $row){ ?>
    <tr>    
            <td> <?= $row->obn_no ?></td>
            <td> <?= $row->customer_name ?></td>
            <td> <?= $row->po_dated ?></td>
            <td> <?= $row->total ?></td>
            <td><a href="<?= base_url('index.php/users/delete_obn/'.$row->obn_no); ?>" title="Delete Order Booking Note" class="btn btn-danger btn-sm glyphicon glyphicon-trash"></a></td>
            <td><a href="<?= base_url('index.php/users/edit_obn/'.$row->obn_no); ?>" title="View/Update Order Booking Note" class="btn btn-info btn-sm glyphicon glyphicon-list"></a></td>
    </tr>
            <?php } ?>
    </tbody>
</table>
    <div class="fixed-action-btn vertical" style="bottom: 45px; right: 24px;">
                <a class="btn-floating btn-large red"  href="<?php echo base_url();?>index.php/users">
                    <i id="pluse_ic" class="glyphicon glyphicon-plus"></i>
                    <i class="glyphicon glyphicon-home"></i>
                </a>
                <ul>
                    <li><a class="btn-floating green"  data-placement="bottom" title="Create New Order Booking!"  href="<?php echo base_url();?>index.php/users/order_booking"><i class="glyphicon glyphicon-file"></i></a></li>
                     <li><a class="btn-floating grey"  data-placement="bottom" title="Go Back!"  href="javascript:window.history.go(-1);"><i class="glyphicon glyphicon-arrow-left"></i></a></li>    
                </ul>
                           
        </div>
            <script>
                $('.fixed-action-btn').hover(function(){
                $('#pluse_ic').toggle();
                });
               $(document).ready( function () {
            $('#datatable').dataTable({
            aaSorting: [[0, 'desc']]
        });
    });
            </script>
</body>
</html>