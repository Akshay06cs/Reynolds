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
                        <th>Part Id</th>
                        <th>Description</th>
                        <th>Quantity</th>
                        <th>Weight</th>
                        <th>Price</th>
                        <th>Unit</th>
                    </tr>
                </thead>
            <tbody>
            <?php 
                foreach($stock->result() as $row){
            ?>
            <tr class="row-item">
                    <td><?= $row->pid ?></td>
                    <td><a href="<?= base_url('index.php/users/stock_detail/'.$row->pid); ?>" title="View Available Stock" ><?= $row->description ?></a></td>
                    <td><?= $row->Qty ?></td>
                    <?php if($row->Weight > 0) { ?>
                    <td><?= $row->Weight ?></td>
                    <?php }else{ ?>
                    <td>-</td>
                    <?php }?>
                    <td><?= $row->price ?></td>
                    <td><?= $row->uom ?></td>
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
        $(document).ready( function () 
        {
            $('#datatable').DataTable();
        });
        </script>        
</html>