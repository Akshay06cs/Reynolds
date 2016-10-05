<html>
    <title>Order</title>
    <head>
        <link rel='stylesheet' type='text/css' href="<?php echo base_url("assets/css/bootstrap.min.css");?>" />
        <!-- DataTables CSS -->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/jquery.dataTables.css">
        <!-- jQuery -->
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-1.3.2.min.js"></script> 
        <script type='text/javascript' src="<?php echo base_url(); ?>assets/js/jquery-1.11.3.min.js"></script>
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
        <script type='text/javascript' src="<?php echo base_url(); ?>assets/js/materialize.js"></script> 
        <link rel='stylesheet' type='text/css' href="<?php echo base_url("assets/css/materialize.css");?>" />       
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.dataTables.min.js"></script>
    </head>
<body>
    <div class="container">
            <h1>Purchase Order</h1>
            <table class="table table-bordered table-hover table-striped" id="datatable">
                <thead>
                    <tr>
                        <th>Order Id</th>
                        <th>Supplier Name</th>
                        <th>Order Date</th>
                        <th>Delivery Date</th>
                        <th>Status</th>
                        <th>Edit</th>
                        <th>View</th>
                        <th>Delete</th>
                    </tr>
                </thead>
            <tbody>
            <?php 
                foreach($r->result() as $row){
            ?>
            <tr class="row-item">
                    <td><?= $row->order_no ?></td>
                    <td><?= $row->supplier_name ?></td>
                    <td><?= $row->date ?></td>
                    <td><?= $row->delivery_date ?></td>
                    <td><?= $row->status ?></td>
                    <td><a href="<?= base_url('index.php/users/edit_po/'.$row->order_no); ?>" class="glyphicon glyphicon glyphicon-pencil"></a></td>
                    <td><a href="<?= base_url('index.php/users/print_po/'.$row->order_no); ?>" class="glyphicon glyphicon glyphicon-eye-open"></a></td>
                    <td><a href="<?= base_url('index.php/users/delete_po/'.$row->order_no); ?>" class="glyphicon glyphicon-remove" ></a></td>
                </tr>
            <?php
            } ?>
            </tbody>
        </table>
        </div>
            <div class="fixed-action-btn vertical" style="bottom: 45px; right: 24px;">
                <a class="btn-floating btn-large red"  href="<?php echo base_url();?>index.php/users">
                    <i id="pluse_ic" class="glyphicon glyphicon-plus"></i>
                    <i class="glyphicon glyphicon-home"></i>
                </a>
                 <ul>
                    <li><a class="btn-floating green"  data-placement="bottom" title="Create New PO!" href="<?php echo base_url();?>index.php/users/pur_order"><i class="glyphicon glyphicon-file"></i></a></li>
                    <li><a class="btn-floating grey"  data-placement="bottom" title="Go Back!"  href="javascript:window.history.go(-1);"><i class="glyphicon glyphicon-arrow-left"></i></a></li>    
                </ul>    
            </div>
        </body>
        <script>
        $('.fixed-action-btn').hover(function(){
        $('#pluse_ic').toggle();
        });
        </script>
        <script>
       $(document).ready( function () {
            $('#datatable').dataTable({
            aaSorting: [[0, 'desc']]
        });
    });
        </script>        
</html>