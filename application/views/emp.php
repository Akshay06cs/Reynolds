<html>
    <head>
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
                                
    </head>
    <body>   
    <h1>Employee Detail</h1>
    <table class="table table-bordered table-hover table-striped" id="datatable">
    <thead>
    <tr>
            <th>Emp_Id</th>
            <th>Name</th>
            <th>Address</th>
            <th>Email</th>
            <th>Mobile</th>
            <th>Department</th>
            <th>Edit</th>
            <th>Delete</th>
            <th>View</th>
    </tr>
    </thead>
        <tbody>
            <?php foreach($emp->result() as $row){ ?>
    <tr>    
            <td> RCPL/<?= $row->id ?></td>
            <td> <?= $row->emp_f_name ?> <?= $row->emp_m_name ?> <?= $row->emp_l_name ?></td>
            <td> <?= $row->emp_address1 ?> <?= $row->emp_address2 ?> <?= $row->emp_city ?> <?= $row->emp_state ?></td>
            <td> <?= $row->emp_work_email ?></td>
            <td> <?= $row->emp_mob ?></td>
            <td> <?= $row->emp_dept ?></td>
           
            
            <td><a href="<?= base_url('index.php/users/edit_emp/'.$row->id); ?>"  class="btn btn-warning btn-sm glyphicon glyphicon-edit"></a></td>
            <td><a href="<?= base_url('index.php/users/delete_emp/'.$row->id); ?>" class="btn btn-danger btn-sm glyphicon glyphicon-trash"></a></td>
            <td><a href="<?= base_url('index.php/users/view_emp/'.$row->id); ?>" class="btn btn-success btn-sm glyphicon glyphicon-eye-open"></a></td>
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
                   <li><a class="btn-floating green"  data-placement="bottom" title="Create New Employee"  href="<?php echo base_url();?>index.php/users/insert_emp"><i class="glyphicon glyphicon-file"></i></a></li>
                    <li><a class="btn-floating grey"  data-placement="bottom" title="Go Back!"  href="javascript:window.history.go(-1);"><i class="glyphicon glyphicon-arrow-left"></i></a></li>    
                        
                </ul>
                           
        </div>
            <script>
                $('.fixed-action-btn').hover(function(){
                $('#pluse_ic').toggle();
                });
                </script>
<script>
    $(document).ready( function () {
    $('#datatable').DataTable();
    });
</script>
</body>
</html>
