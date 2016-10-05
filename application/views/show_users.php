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
    <h1>Supplier Records</h1>
    <table class="table table-bordered table-hover table-striped" id="datatable">
    <thead>
    <tr>
            <th>Si. No.</th>
            <th>Vendor</th>
            <th>Phone</th>
            <th>Email</th>
            <th>Update</th>
            <th>Delete</th>
            <th>View</th>
    </tr>
    </thead>
        <tbody>
            <?php 
            $sino='1';
            foreach($user_list as $u_key){ ?>
    <tr>  
        <td><?php echo $sino; ?></td>
        <td><?php echo $u_key->name; ?></td>
        <td><?php echo $u_key->ph; ?></td>
        <td><?php echo $u_key->email; ?></td>
        <td><a href="#" class="btn btn-warning " onclick="show_confirm('edit',<?php echo $u_key->cust_supp_id; ?>)"><span class="glyphicon glyphicon-edit" aria-hidden="true" title="Update Supplier Detail"></span></a></td>
        <td><a href="#" class="btn btn-danger " onclick="show_confirm('del_sup',<?php echo $u_key->cust_supp_id; ?>)"><span class="glyphicon glyphicon-trash" aria-hidden="true" title="Delete Supplier"></span></a></td>
        <td><a href="#" class="btn btn-success" onclick="show_confirm('view',<?php echo $u_key->cust_supp_id; ?>)"><span class="glyphicon glyphicon-eye-open" aria-hidden="true" title="View More Detail"></span></a></td>
    </tr>
            <?php 
            $sino++;
            } ?>
    <tbody>
</table>
    <div class="fixed-action-btn vertical" style="bottom: 45px; right: 24px;">
                <a class="btn-floating btn-large red"  href="<?php echo base_url();?>index.php/users">
                    <i id="pluse_ic" class="glyphicon glyphicon-plus"></i>
                    <i class="glyphicon glyphicon-home"></i>
                </a>
                <ul>
                    <li><a class="btn-floating green"  data-placement="bottom" title="Create New Supplier!" href="<?php echo base_url(); ?>index.php/users/add_form"><i class="glyphicon glyphicon-file"></i></a></li>
                    <li><a class="btn-floating grey"  data-placement="bottom" title="Go Back!"  href="javascript:window.history.go(-1);"><i class="glyphicon glyphicon-arrow-left"></i></a></li>    
                </ul>
    </div>
</body>
<script type ="text/javascript">
    function show_confirm(act,gotoid)
    {
        if(act=="edit")
        var r = confirm("Do you really want to EDIT?");
        else if(act=="del_sup")
        var r = confirm("Do you Really want to DELETE ?");
        else
        window.location = "<?php echo base_url(); ?>index.php/users/"+act+"/"+gotoid;
        if(r == true)
        {
            window.location = "<?php echo base_url(); ?>index.php/users/"+act+"/"+gotoid;
       	}
    }
</script>
<script>
    $(document).ready( function () {
    $('#datatable').DataTable();
    });
    $('.fixed-action-btn').hover(function(){
        $('#pluse_ic').toggle();
    });
</script>
</html>