

<html>
    <head>
        <title>Employee Attendence</title>
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
          <!-- Date Picker Plugins -->
        <script type='text/javascript' src="<?php echo base_url(); ?>assets/js/jquery-ui.js"></script>
        <link rel='stylesheet' type='text/css' href="<?php echo base_url("assets/css/jquery-ui.css");?>" />
        <script>
        $(function() {
            $( "#datepicker" ).datepicker({ dateFormat: 'dd-mm-yy' });
        });
        </script>
    </head>
    <body>
        
          <div class="container">
    <h1>Employee Daily Attendence</h1>
      <form method = 'post' action='<?php echo $_SERVER['PHP_SELF'] ?>'>
        <input type='text' name='date1' required="required" id="datepicker"><input type='submit' value='Find' name="submit" >    
    </form>
    <a class="btn btn-primary" href="<?php echo base_url();?>index.php/users/employee_daily_attendence" >Staff</a><a class="btn btn-primary" href="<?php echo base_url();?>index.php/users/emp_work_attendence" >Worker</a>
   <div class="staff">
    <table class="table table-bordered table-hover table-striped" id="datatable">
    <thead>
    <tr>
            <th>Emp. ID</th>
            <th>Employee Name</th>
            <th>Morning</th>
            <th>Lunch(Out)</th>
            <th>Lunch(In)</th>
            <th>Evening</th>
           
    </thead>
        <tbody>
       <?php
       if(isset($_POST['submit'])){
           
            $datee= $_POST['date1'];
            $newDate = date("Y-m-d", strtotime($datee));
            echo $datee;
                            $data  = $this->db->query("SELECT tbl_gatepass.emp_id, employee_detail.emp_f_name, employee_detail.emp_m_name, employee_detail.emp_l_name,
MAX(CASE WHEN tbl_gatepass.gp_time < '12:00:00' AND tbl_gatepass.status LIKE '%I%' THEN tbl_gatepass.gp_time ELSE '-' END ) morning,
MAX(CASE WHEN tbl_gatepass.status LIKE '%I%' AND tbl_gatepass.gp_time BETWEEN '12:55:00' AND '13:10:00'  THEN tbl_gatepass.gp_time ELSE '-' END) lunch,
MAX(CASE WHEN tbl_gatepass.status LIKE '%I%' AND tbl_gatepass.gp_time BETWEEN '13:11:00' AND '16:40:00'  THEN tbl_gatepass.gp_time ELSE '-' END) lunch2,
MAX(CASE WHEN tbl_gatepass.status LIKE '%I%' AND tbl_gatepass.gp_time > '16:25:00' THEN tbl_gatepass.gp_time ELSE '-' END) evening
FROM tbl_gatepass INNER JOIN employee_detail ON tbl_gatepass.emp_id = employee_detail.emp_id WHERE tbl_gatepass.gp_date ='$newDate' AND employee_detail.job_category ='WORK'  GROUP BY tbl_gatepass.emp_id");
       }else{
         $datee= date('Y-m-d');
         $newDate = date("d-m-Y", strtotime($datee));
         echo $newDate;
                            $data  = $this->db->query("SELECT tbl_gatepass.emp_id, employee_detail.emp_f_name, employee_detail.emp_m_name, employee_detail.emp_l_name,
MAX(CASE WHEN tbl_gatepass.gp_time < '12:00:00' AND tbl_gatepass.status LIKE '%I%' THEN tbl_gatepass.gp_time ELSE '-' END ) morning,
MAX(CASE WHEN tbl_gatepass.status LIKE '%I%' AND tbl_gatepass.gp_time BETWEEN '12:55:00' AND '13:10:00'  THEN tbl_gatepass.gp_time ELSE '-' END) lunch,
MAX(CASE WHEN tbl_gatepass.status LIKE '%I%' AND tbl_gatepass.gp_time BETWEEN '13:11:00' AND '16:40:00'  THEN tbl_gatepass.gp_time ELSE '-' END) lunch2,
MAX(CASE WHEN tbl_gatepass.status LIKE '%I%' AND tbl_gatepass.gp_time > '16:25:00' THEN tbl_gatepass.gp_time ELSE '-' END) evening
FROM tbl_gatepass INNER JOIN employee_detail ON tbl_gatepass.emp_id = employee_detail.emp_id WHERE tbl_gatepass.gp_date ='$datee' AND employee_detail.job_category ='WORK'  GROUP BY tbl_gatepass.emp_id");
       }
                            foreach($data->result() as $row){ ?>
            <tr>
                <td><?= $row->emp_id ?></td>
                <td><?= $row->emp_f_name ?> <?= $row->emp_m_name ?> <?= $row->emp_l_name ?></td>
                <td><?= $row->morning ?></td>
                <td><?= $row->lunch ?></td>
                <td><?= $row->lunch2 ?></td>
                <td><?= $row->evening ?></td>
               
            </tr>
                            <?php } ?>
             </tbody>
</table>
    <a href="#">Todays Gatepass </a>
    </div>
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