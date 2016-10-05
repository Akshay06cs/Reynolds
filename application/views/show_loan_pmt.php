<html>
    <head>
    <!-- DataTables CSS -->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/jquery.dataTables.css">
    <!-- jQuery -->
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-1.3.2.min.js"></script> 
    <script type='text/javascript' src="<?php echo base_url(); ?>assets/js/jquery-1.11.3.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.dataTables.min.js"></script>
    
    <!--floating buttons-->
    <script type='text/javascript' src="<?php echo base_url(); ?>assets/js/materialize.js"></script>    
    <link rel='stylesheet' type='text/css' href="<?php echo base_url("assets/css/materialize.css");?>" /> 
    
    </head>
    <body>   
    <h1>Loan Details</h1>
    
    <table class="table table-bordered table-hover table-striped" id="datatable">
    <thead>
    <tr>
        <th>Name</th>
        <th>Balance</th>
        <th>Sanctioned on</th>
        <th>Delete</th>
        <th>View</th>
        <th>Status</th>
        
    </tr>
    </thead>
        <tbody>
            <?php foreach($emp->result() as $row){ ?>
    <tr>    
            <td> <a href="<?php echo base_url("index.php/users/loan_details/".$row->id);?>" title="View <?php echo $row->l_emp_name ?>'s All Loan Details"><?= $row->l_emp_name ?></a></td>
            <td> <center title="Total Amount Sanctioned"><?= $row->l_tac ?></center></td>
            <?php 
                $l_date=$this->db->query('SELECT `ld_date` FROM `loan_detail` WHERE `id`='.$row->id.' ORDER BY `ld_id` ASC LIMIT 1');
                    foreach($l_date->result() as $ldate)
            ?>
            <td> <center title="Amount Sanctioned Date "><?= $ldate->ld_date?></center></td>
            <td><a href="#" class="btn btn-warning " onclick="show_confirm(<?php echo $row->loan_id; ?>)" title="Delete <?php echo $row->l_emp_name?>'s Detail"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a></td>
            <td><a href="<?= base_url('index.php/users/payment_approval/'.$row->loan_id); ?>" title="View <?php echo $row->l_emp_name ?>'s Loan Approval Detail" class="btn btn-info btn-sm glyphicon glyphicon-list"></a></td>
            <td><?= $row->l_status;?></td>
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
                    <li><a class="btn-floating green"  data-placement="bottom" title="New Loan!"  href="<?php echo base_url();?>index.php/users/new_loan"><i class="glyphicon glyphicon-pencil"></i></a></li>
                     <li><a class="btn-floating grey"  data-placement="bottom" title="Go Back!"  href="javascript:window.history.go(-1);"><i class="glyphicon glyphicon-arrow-left"></i></a></li>    
                </ul>
                           
        </div>
            <script>
                $('.fixed-action-btn').hover(function(){
                $('#pluse_ic').toggle();
                });
                
                $(document).ready(function(){
                    $('.glyphicon-minus').alert("Are You Sure Delete ");
                });
                
                
                    function show_confirm(loan_id)
                    {
                        var del=confirm("Are You Sure??");
                        if(del==true)
                        
                            window.location="<?php echo base_url();?>index.php/users/delete_loan/"+loan_id;
                        
                    }
               
                
                </script>
<script>
    $(document).ready( function () {
    $('#datatable').DataTable();
    });
</script>
</body>
</html>