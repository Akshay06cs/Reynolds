<html>
    <title>stock</title>
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
            <h1>Material Stock</h1>
            <table class="table table-bordered table-hover table-striped" id="datatable">
                <thead>
                    <tr>
                        <th>Grn.No.</th>
                        <th>Supplier Name</th>
                        <th>Date</th>
                        <th>Description</th>
                        <th>Length</th>
                        <th>Width</th>
                        <th>Quantity(No.)</th>
                        <th>Quantity(Kgs./Mtr.)</th>
                           <th>Rate</th>
                        <th>Uom</th>
                        <th>Work Order</th>
                       
                        <th>Price</th>
                    </tr>
                </thead>
            <tbody>
            <?php 
                foreach($item_detail->result() as $row){
            ?>
            <tr class="row-item">
                    <td><?= $row->grn_id ?></td>
                    <td><?= $row->supplier_name ?></td>
                    <td><?= $row->grn_date ?></td>
                    <td><?= $row->description ?></td>
                    <td><?= $row->length ?><?= $row->length_uom ?><?= $row->length_meter ?><?= $row->length_mtr_uom ?></td>
                    <td><?= $row->width ?><?= $row->width_uom ?></td>
                    <td><?= $row->qty_noo ?></td>
                    <td><?= $row->qty_weightt ?></td>
                    <td><?= $row->rate ?></td>
                    <td><?= $row->uom ?></td>
                    <td><?= $row->work_order ?></td>
                    <td><?= $row->price ?></td>
                    
            </tr>
            <?php
            } 
            ?>
            </tbody>
        </table>
        </div>
            <div class="fixed-action-btn vertical" style="bottom: 45px; right: 24px;">
                <a class="btn-floating btn-large red"  href="<?php echo base_url();?>index.php/users">
                    <i id="pluse_ic" class="glyphicon glyphicon-plus"></i>
                    <i class="glyphicon glyphicon-home"></i>
                </a>
            </div>
        </body>
        <script>
        $('.fixed-action-btn').hover(function(){
        $('#pluse_ic').toggle();
        });
        </script>
        <script>
        //Status For Purchase Order
        $('.status').change(function(){
            var id=$(this).val();
            var status = $(this).find("option:selected").text();
            $.ajax({
                type: "POST",
                data:{'id': id,'status' : status},
                dataType:"json",
                url: "<?php echo base_url(); ?>index.php/users/update_po_stauts",//here we are calling our user controller 
                });
            });
        $(document).ready(function () 
        {
            $('#datatable').DataTable();
        });
        </script>        
</html>