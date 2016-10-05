<html>
    <head>
        <link rel='stylesheet' type='text/css' href="<?php echo base_url("assets/css/bootstrap.min.css");?>" />
        <script type='text/javascript' src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>    
    </head>
    <body>
        <h1><center>Employee Attendence</center></h1>
        <div class="container">
        <table class="table table-condensed table-bordered">
            <tr>
                <th rowspan="2">Emp ID</th>
                <th rowspan="2">Emp Name</th>
                <th rowspan="2">Job Category</th>
                <th rowspan="2">Date</th>
                <th rowspan="2">Morning In Time</th>
                <th colspan="2">Gate Pass</th>
                <th rowspan="2">Evening Out Time</th>
                <th rowspan="2">Workin Hours</th>
            </tr>
            <tr>             
                <th>Out Time</th>
                <th>In Time</th>
            </tr>
             <?php 
            $sino='1';
            foreach($emp_detail->result() as $key){ ?>
            <tr>
                <td><?= $key->emp_id; ?></td>
                <td><?= $key->name; ?></td>
                <td><?= $key->gp_date; ?></td>
                <td><?= $key->gp_time; ?></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
             <?php 
            }
            ?>
        </table>
        </div>
    </body>
</html>