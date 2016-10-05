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
    <?php
        //if($level == "1" || $level == "2")
        {
        ?>
        <div class="container">
            <h1>Inspection Call</h1>
            <table class="table table-bordered table-hover table-striped" id="datatable">
                <thead>
                    <tr>
                        <th>Ref.No.</th>
                        <th style="width:10%">OBN No.</th>
                        <th>Customer Name</th>
                        <th style="width:10%">Date</th>
                        <th>Proposed Date of inspection</th>
                        <th>Status</th>
                        <th>View</th>
                        <th>Edit</th>
                        <th>Print</th>
                        <th>Delete</th>
                    </tr>
                </thead>
            <tbody>
            <?php 
                foreach($r->result() as $row){
            ?>
            <tr class="row-item">
                    <td>RCPL/BGM/QC/<?= $row->ref_no ?></td>
                    <td><?= $row->obn_no;?></td>
                    <td><?= $row->customer ?></td>
                    <td><?= $row->date ?></td>
                    <td><?= $row->proposed_doi ?></td>
                    <td><select class="status btn btn-default" style="border:0;">
                            <option><?= $row->status ?></option>
                            <option value="<?= $row->ref_no ?>">Approved</option>
                            <option value="<?= $row->ref_no ?>">Pending</option></select></td>
                    <td><a href="<?= base_url('index.php/inspection/print_ic/'.$row->ref_no); ?>" class="glyphicon glyphicon glyphicon-eye-open"></a></td>
                    <td><a class="glyphicon glyphicon-pencil" title="Edit" href="<?php echo base_url("index.php/inspection/edit_inspt/".$row->ref_no);?>"></a></td>
                    <td><a class="glyphicon glyphicon-print"  href="<?= base_url('index.php/inspection/Innvoice_pdf/'.$row->ref_no);?>"></a></td>
                    <td><a href="<?= base_url('index.php/inspection/delete_ic/'.$row->ref_no); ?>" class="glyphicon glyphicon-remove" ></a></td>
                </tr>
            <?php
            } ?>
            </tbody>
        </table>
        </div>
            <div class="fixed-action-btn vertical" style="bottom: 45px; right: 24px;">
                <a class="btn-floating btn-large red"><i class="glyphicon glyphicon-plus"></i></a>
                <ul>
                    <li><a class="btn-floating blue"  href="<?php echo base_url();?>index.php/users"><i class="glyphicon glyphicon-home"></i></a></li>
                    <li><a class="btn-floating grey"  data-placement="bottom" title="Go Back!"  href="javascript:window.history.go(-1);"><i class="glyphicon glyphicon-arrow-left"></i></a></li>    
                </ul>
            </div>
        </body>
        <script>
        //Status For Purchase Order
        $('.status').change(function(){
            var id=$(this).val();
            var status = $(this).find("option:selected").text();
            $.ajax({
                type: "POST",
                data:{'id': id,'status' : status},
                dataType:"json",
                url: "<?php echo base_url(); ?>index.php/inspection/update_ic_status",//here we are calling our inspection controller 
                });
            });
        $(document).ready( function () 
        {
            $('#datatable').DataTable();
        });
        </script>
        <?php
            }
        ?>
    
</html>