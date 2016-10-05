<html>
    <head>
        <title>
            Advance Details
        </title>
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
    <h1>Advance Payment Details</h1>
    
    <table class="table table-bordered table-hover table-striped" id="datatable">
    <thead>
    <tr>
        <th style="text-align:center">Name</th>
       
        <th style="text-align:center">Payment Sanctioned on</th>
        <th style="text-align:center">Delete</th>
        <th style="text-align:center">View</th>
        <th style="text-align:center">Status</th>
        
    </tr>
    </thead>
        <tbody>
            <?php foreach($adv_details->result() as $row){ ?>
    <tr>    
            <td style="text-align:center"> <a href="<?php echo base_url("index.php/users/show_adv_pmt_details/".$row->adv_emp_id);?>" title="View <?php echo $row->adv_emp_name ?>'s All Advance Payment Details"><?= $row->adv_emp_name ?></a></td>
            <td style="text-align:center"><center title="Amount Sanctioned Date "><?= $row->adv_req_date?></center></td>
            <td style="text-align:center"><a href="#" class="btn btn-warning " onclick="show_confirm(<?php echo $row->adv_id; echo","; echo $row->adv_emp_id;?>)" title="Delete <?php echo $row->adv_emp_name?>'s Detail"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a></td>
            <td style="text-align:center"><a href="<?= base_url('index.php/users/adv_payment_approval/'.$row->adv_id.'/'.$row->adv_emp_id); ?>" title="View <?php echo $row->adv_emp_name ?>'s Advance Approval Detail" class="btn btn-info btn-sm glyphicon glyphicon-list"></a></td>
            <td style="text-align:center"><?= $row->adv_status;?></td>
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
                    <li><a class="btn-floating green"  data-placement="bottom" title="New Advance Payment!"  href="<?php echo base_url();?>index.php/users/new_advance_payment"><i class="glyphicon glyphicon-pencil"></i></a></li>
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
                
                
                    function show_confirm(adv_id,adv_emp_id)
                    {
                        var del=confirm("Are You Sure??");
                        if(del==true)
                        
                            window.location="<?php echo base_url();?>index.php/users/delete_adv/"+adv_id;                  
                    }
               
                
                </script>
<script>
    $(document).ready( function () {
    $('#datatable').DataTable();
    });
</script>
</body>
</html>