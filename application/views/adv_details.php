<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>
            Advance Payment Against Wages Details
        </title>
        <!--bootstrap-->
        <link rel='stylesheet' type='text/css' href="<?php echo base_url("assets/css/bootstrap.min.css");?>" />
        <!--Jquery--> 
        <script type='text/javascript' src="<?php echo base_url(); ?>assets/js/jquery-1.11.3.min.js"></script>
        <!--floating buttons-->
        <script type='text/javascript' src="<?php echo base_url(); ?>assets/js/materialize.js"></script>    
        <link rel='stylesheet' type='text/css' href="<?php echo base_url("assets/css/materialize.css");?>" /> 
        <!--google CDN-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        
    </head>
    
    <body>
    <center><h1>Details</h1></center>
            <div class="container">
               <div class="table-responsive">
                    
                    <table class="table table-hover">
                        
                            <tr>
                                <th>Date</th>
                                <th>Amount Taken</th>
                                <th>Amount Deposit</th>
                                <th>Balance</th>
                            </tr>
                        
                            
                            <?php foreach($item as $row)
                                {   
                            ?>
                            <tr>
                                <td><?php echo $row['ld_date']; ?></td>
                                <td><?php echo $row['ld_loan_taken']; ?></td>
                                <td><?php echo $row['ld_deposit_amt'];?></td>
                                <td><?php echo $row['balance'];?>
                            </tr>
                            <?php
                            }   
                            ?>
                           
                        
                    </table>
                </div>
            </div>
    
            <div class="fixed-action-btn vertical" style="bottom: 45px; right: 24px;">
                <a class="btn-floating btn-large red"  href="<?php echo base_url();?>index.php/users">
                    <i id="pluse_ic" class="glyphicon glyphicon-plus"></i>
                    <i class="glyphicon glyphicon-home"></i>
                </a>
                <ul>
                    <li><a class="btn-floating grey"  data-placement="bottom" title="Go Back!"  href="javascript:window.history.go(-1);"><i class="glyphicon glyphicon-arrow-left"></i></a></li>    
                    <li><a data-toggle="modal" data-target="#myModal" class="btn-floating green Deposit"  title="Deposit Amount"><i class="glyphicon glyphicon-pencil"></i></a></li>
                </ul>
                           
            </div>
    
    
            <div class="modal fade" id="myModal" role="dialog">
                <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <form name="deposit" action="<?php echo base_url(); ?>index.php/users/deposit_amt" method ="post">
                            <div class="modal-body">
                                <input type="text" name="empname" id="empname"  required="required" class="form-control" placeholder="Employee Name" value="<?php echo $row['ld_emp_name']; ?>"><input type="hidden" name="empid" id="empid" class="empid" value="<?php echo $row['id'];?>"/><input type="hidden" name="job_category" id="job_category" value="<?php echo $row['ld_job_category']; ?>"/>
                                <input type="text" name="date" id="date" required class="form-control datepicker" placeholder="Date" value="<?php echo date("d/m/y");?>">
                                <input type="text" name="amtdeposit" id="amtdeposit" class="form-control amtdeposit" placeholder="Deposit">
                                <input type="hidden" name="bal" id="bal" class="bal"/> 
                                <input type="hidden" name="balance" id="balance" class="balance"/>
                                <input type="hidden" name="activity" id="activity" class="activity" value="deposit"/>
                            </div>

                            <div class="modal-footer">
                                <button type="submit" class="btn btn-success deposit_btn" id="change">Deposit</button>
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        
    </body>
    <script>
            $('.fixed-action-btn').hover(function(){
            $('#pluse_ic').toggle();
        });
    </script>
    
    <script>
        $(document).ready(function(){
            $(".Deposit").click(function(){
                var empid=$(".empid").val();
               $.ajax({
                   type:"POST",
                   data:{'id':empid},
                   dataType:"json",
                   url:"<?php echo base_url();?>index.php/users/employee_balance",
                   success:function(data){
                       $(".bal").val(data.balance);
                   }
           
               }); 
            });
            
            $(".deposit_btn").click(function(){
                var amtdeposit=$(".amtdeposit").val();
                var bal=$(".bal").val();
                
                var balance=parseFloat(bal) - parseFloat(amtdeposit);
                $(".balance").val(balance);
            });
        });
    </script>
</html>