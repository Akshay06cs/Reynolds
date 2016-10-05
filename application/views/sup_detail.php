<html>
<head>
    <script type='text/javascript' src="<?php echo base_url(); ?>assets/js/jQuery-2.1.4.min.js"></script>  
    <link rel='stylesheet' type='text/css' href="<?php echo base_url("assets/css/bootstrap.min.css");?>" />
    <link rel='stylesheet' type='text/css' href="<?php echo base_url("assets/css/jquery.ptTimeSelect.css");?>" />
    <script type='text/javascript' src="<?php echo base_url(); ?>assets/js/jquery.ptTimeSelect.js"></script>
    <!--Autocomplete -->
    <script type='text/javascript' src="<?php echo base_url(); ?>assets/js/jquery-ui.js"></script>
    <!-- Jquery Plugin For Ubuntu-->
         <script type='text/javascript' src="<?php echo base_url(); ?>assets/js/jquery-1.12.1.min"></script>
    <!-- Dropdown Style For Autocomplete -->
    <link rel='stylesheet' type='text/css' href="<?php echo base_url("assets/css/jquery-ui.css");?>" />
    <!--Accordion -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    <link rel="stylesheet" href="<?php echo base_url("assets/css/insp.css");?>">
    <link rel="stylesheet" href="<?php echo base_url("assets/css/gate_pass.css");?>">
    <!-- Floating Button -->
    <link rel='stylesheet' type='text/css' href="<?php echo base_url("assets/css/font-awesome.min.css");?>" />
    <script type='text/javascript' src="<?php echo base_url(); ?>assets/js/materialize.js"></script> 
    <link rel='stylesheet' type='text/css' href="<?php echo base_url("assets/css/materialize.css");?>" />
<script>
$(function() {
    $( "#accordion" ).accordion();
});
</script>
  <style>
   
   .form-group.required .control-label:after { 
   content:"*";
   color:red;
    }
  </style>
</head>
<body>
    <h1><?= $r->name ?></h1>
  
    <div id="accordion">
  <h1 style="background:#428bca;color:white" id="acc1"><?php if($r->code=='SUPP'){?>Supplier<?php }else if($r->code=='CUST') {?>Customer<?php }else{ ?>Supplier And Customer<?php } ?></h1>
  <div>
     <form class="form-style-4" action="<?= base_url('index.php/users/insert_user_db') ?>" method ="post" >
                      
                       
                        <label for="field1"><input type="hidden" name="id" value="<?= $r->cust_supp_id ?>" />
                            <span align="left" class='control-label'>Supplier Name</span>: <?= $r->name ?>
                        </label>
                        <label for="field1">
                            <span align="left">Nick Name</span>: <?= $r->nick_name ?>
                        </label>
                       
                        <label for="field2">
                            <span align="left">Mobile No.</span>: <?= $r->mob ?>
                        </label> 
                        <label for="field2">
                            <span align="left">Tel. No.</span>: <?= $r->ph ?>
                        </label> 
                        <label for="field2">
                            <span align="left">Email</span>: <?= $r->email ?>
                        </label> 
                        <label for="field2">
                            <span align="left">Fax</span>: <?= $r->fax ?>
                        </label> 
        
         </form>
                </div>
    <h3 style="background:#428bca;color:white" id="acc2">Address Detail</h3>
  <div>
  <div class="form-style-4 form-group required" style="color:white">
        <?php
           $data  = $this->db->query("SELECT * FROM cust_supp_address WHERE cust_supp_id='{$r->cust_supp_id}'");
                $sino='1';
                    foreach($data->result() as $row){ ?>
                    <div>
                        <b style="color:#f7f065;"><?php echo $sino; ?>.<?= $row->address ?></b><br>
                            <?php if(!empty($row->address2)) { ?>
                            <?= $row->address1 ?> <br><?= $row->address2 ?><br> <?= $row->city ?>-<?= $row->pin ?>, <?= $row->state ?>, <?= $row->country ?>
                            <?php }else { ?> 
                              <?= $row->address1 ?> <br><?= $row->city ?>-<?= $row->pin ?>, <?= $row->state ?>, <?= $row->country ?>
                             <?php }?> 
                   </div><br>
        <?php $sino++; } ?><br><br><br><br><br>
  </div>
  </div>
    <h3 style="background:#428bca;color:white">Account Detail</h3>
  <div>
  <div class="form-style-4">
                        <label for="field1">
                            <span align="left">PAN No.</span>: <?= $r->pan ?>
                        </label>
                        <label for="field1">
                            <span align="left">Service Tax No.</span>: <?= $r->sertaxnum ?>
                        </label>
                        <label for="field1">
                            <span align="left">Excise No.</span>: <?= $r->exnum ?>
                        </label>
                        <label for="field1">
                            <span align="left">TIN No.</span>: <?= $r->tin ?> 
                        </label>
                        <label for="field1">
                            <span align="left">CIN No.</span>: <?= $r->cin ?>
                        </label>
                        <label for="field1">
                            <span align="left">Bank Name</span>: <?= $bank->bank_name ?> 
                        </label>
                        <label for="field1">
                            <span align="left">Bank Branch</span>: <?= $bank->bank_branch ?> 
                        </label>
                        <label for="field1">
                            <span align="left">Bank City</span>: <?= $bank->bank_city ?>
                        </label>
                        <label for="field1">
                            <span align="left">Account No.</span>: <?= $bank->acc_num ?> 
                        </label>
                        <label for="field1">
                            <span align="left">IFSC No.</span>: <?= $bank->ifsc_code ?> 
                        </label>
        
        </div>
  </div>
    <h3 style="background:#428bca;color:white">Contact Persons Deatil</h3>
    <div>         
        <form class="form-style-4" action="<?php echo base_url(); ?>index.php/users/add_supp_contcts" method="post" >
            <div class="form-group required">
            <label for="field1">
                <span align="left" class='control-label'>First Name</span>: <input type="text" name ="fname" id="fname" required="required"/><input type="hidden" name ="sid" id="sid" value="<?= $r->cust_supp_id ?>" /> <input type="hidden" name ="code" value="<?= $r->code ?>" />
            </label>
            <label for="field1">
                <span align="left" class='control-label'>Last Name</span>: <input type="text" name= "lastname" id="lastname" required="required" /> 
            </label>
            <label for="field1">
                <span align="left">Department</span>:<input type="text" name="dept" id="dept" /> 
            </label>
            <label for="field1">
                <span align="left" class='control-label'>Mobile</span>:<input type="text" name="mob" id="mob" class="mobile" maxlength="13" required="required" value="+91"/> 
            </label>
            <label for="field1">
                <span align="left">Email</span>:<input type="email" name="supp_mail" id="email_id" placeholder="abc@xyz.com" /> 
            </label>
            <label for="field1">
                 <span align="left"> </span><input type="submit" class="btn btn-success" value="Add" data-dismiss="modal">
            </label>
           
          
        <table class="table table-border  table-hover table-condensed table-striped">
        <tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Department</th>
            <th>Mobile</th>
            <th>Email</th>
            <th>Action</th>
        </tr>
        <?php
        $data  = $this->db->query("select * from supp_cust_contact_persons where cust_supp_id='{$r->cust_supp_id}'");
        foreach($data->result() as $row){
        ?>
        <tr>
            <td><?= $row->fname; ?></td>
            <td><?= $row->lastname; ?></td>
            <td><?= $row->dept; ?></td>
            <td><?= $row->mob; ?></td>
            <td><?= $row->supp_mail; ?></td>
            <td><a href="<?= base_url('index.php/users/delete_cnt/'.$row->id); ?>" class="btn btn-danger glyphicon glyphicon-alert"></a></td>
        </tr>
        <?php } ?>
        </table>
                </div>
    </form> 
    </div>
 
</div>
            <div class="fixed-action-btn vertical" style="bottom: 45px; right: 24px;">
                <a class="btn-floating btn-large red"  href="<?php echo base_url();?>index.php/users" >
                    <i id="pluse_ic" class="glyphicon glyphicon-plus"></i>
                    <i class="glyphicon glyphicon-home"></i>
                </a>
                <ul>
                    <li><a class="btn-floating orange darken-1" data-placement="bottom" title="View Supplier List" href="<?php echo base_url();?>index.php/users/sup_detail"><i class="glyphicon glyphicon-eye-open"></i></a></li>
                    <li><a class="btn-floating grey"  data-placement="bottom" title="Go Back!"  href="javascript:window.history.go(-1);"><i class="glyphicon glyphicon-arrow-left"></i></a></li>    
                </ul>
            </div>
            
            <script>
                $('.fixed-action-btn').hover(function(){
                $('#pluse_ic').toggle();
                });
                </script>

</body>
<script>
     $('.mobile').keyup(function(){
        mobile = $('.mobile').val().replace(/\s/g, '').replace(/(\+)(\d{2})(\d{2})(\d{3})(\d{5})/g, '$1$2 $3 $4 $5');
        $('.mobile').val(mobile)
    });
    </script>
</html>

