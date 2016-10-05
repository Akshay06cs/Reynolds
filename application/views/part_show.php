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

        <h1>Parts Detail</h1>
        
        <table id="table_id" class="table table-bordered table-hover table-striped">
       
        <thead>
        <tr>
        <th scope ="col">Category</th>
        <th scope ="col">Moc</th>
        <th scope ="col">Grade</th>
        <th scope ="col">Thickness</th>
        <th scope ="col">Density</th>
        <th scope ="col">Uom</th>
        <th>Update</th>
        <th>Delete</th>
        <th>View</th>
    </tr>
    </thead>
    <tbody>
        <?php foreach($part_list as $u_key){ ?>
    <tr>
        <td><?php echo $u_key->category; ?></td>
        <td><?php echo $u_key->moc; ?></td>
        <td><?php echo $u_key->grade; ?></td>
        <td><?php echo $u_key->thickness; ?><?php echo $u_key->thickness_uom; ?></td>
        <td><?php echo $u_key->density; ?></td>
        <td><?php echo $u_key->uom; ?></td>
        <td width ="40" align="left"><a href="#" class="btn btn-warning" onclick="show_confirm('edit_part',<?php echo $u_key->pid; ?>)"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a></td>
        <td width ="40" align="left"><a href="#" class="btn btn-danger" onclick="show_confirm('del_part',<?php echo $u_key->pid; ?>)"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a></td>
        <td width ="40" align="left"><a href="#" class="btn btn-success" onclick="show_confirm('view_part',<?php echo $u_key->pid; ?>)"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></a></td>
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
                    <li><a class="btn-floating green"  data-placement="bottom" title="Create New Part!" href="<?php echo base_url(); ?>index.php/users/add_part"><i class="glyphicon glyphicon-file"></i></a></li>
                    <li><a class="btn-floating grey"  data-placement="bottom" title="Go Back!"  href="javascript:window.history.go(-1);"><i class="glyphicon glyphicon-arrow-left"></i></a></li>    
                </ul>
    </div>
 </body>
 
    <script type ="text/javascript">
        function show_confirm(act,gotoid)
        {
	    if(act=="edit_part")
	    var r = confirm("Do you really want to EDIT?");
	    else if(act=="del_part")
	    var r = confirm("Do you Really want to DELETE ?");
            else
            window.location = "<?php echo base_url(); ?>index.php/users/"+act+"/"+gotoid;
	    if(r == true)
            {
	        window.location = "<?php echo base_url(); ?>index.php/users/"+act+"/"+gotoid;
            }
        }
    $(document).ready( function () {
    $('#table_id').DataTable();
    });
    </script>
     <script>
                $('.fixed-action-btn').hover(function(){
                $('#pluse_ic').toggle();
                });
                </script>
</html>