

<html>
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
    <h1>Employee Daily Attendence</h1>
   
    <table class="table table-bordered table-hover table-striped" id="datatable">
    <thead>
    <tr>
            <th>Emp. ID</th>
            <th>Employee Name</th>
            <th>Gatepass1(Out)</th>
            <th>Gatepass1(In)</th>
            <th>Gatepass2(Out)</th>
            <th>Gatepass2(In)</th>
           
    </thead>
        <tbody>
       
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
               
            </tr>
                          
             </tbody>
</table>
    <a href="#">Todays Gatepass </a>
        </div>
    <div class="fixed-action-btn vertical" style="bottom: 45px; right: 24px;">
                <a class="btn-floating btn-large red"  href="<?php echo base_url();?>index.php/users">
                    <i id="pluse_ic" class="glyphicon glyphicon-plus"></i>
                    <i class="glyphicon glyphicon-home"></i>
                </a>
                <ul>
                    <li><a class="btn-floating green"  data-placement="bottom" title="Create New Gate Pass!"  href="<?php echo base_url();?>index.php/users/new_gate_pass"><i class="glyphicon glyphicon-pencil"></i></a></li>
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