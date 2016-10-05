<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>
            Advance Details
        </title>
        <!--bootstrap-->
        <link rel='stylesheet' type='text/css' href="<?php echo base_url("assets/css/bootstrap.min.css");?>" />
        <!--Jquery--> 
        <script type='text/javascript' src="<?php echo base_url(); ?>assets/js/jquery-1.11.3.min.js"></script>
        <!--floating buttons-->
        <script type='text/javascript' src="<?php echo base_url(); ?>assets/js/materialize.js"></script>    
        <link rel='stylesheet' type='text/css' href="<?php echo base_url("assets/css/materialize.css");?>" /> 
        
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
                                <th>Clearing Amount</th>
                                <th>Balance</th>
                            </tr>
                        
                            
                            <?php
                            if(isset($adv_details) && $adv_details !==null)
                            {
                                foreach($adv_details as $row)
                                {   
                            ?>
                            <tr>
                                <td><?php echo $row['ad_adv_date']; ?></td>
                                <td><?php echo $row['ad_sanction']; ?></td>
                                <td><?php echo $row['ad_clear_amt'];?></td>
                                <td><?php echo $row['ad_balance'];?>
                            </tr>
                            <?php
                                }
                                
                            ?>
                    </table>
                            
                </div>
                
                            <?php 
                            }else if($adv_details->ad_adv_date==null ){
                            ?>
                            <h1>Advance Not Sanctioned Yet</h1>
                            <?php 
                            }
                            ?>
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
                        <form name="deposit" action="<?php echo base_url(); ?>index.php/users/clear_amt" method ="post">
                            <div class="modal-body">
                                <input type="text" name="empname" id="empname"  required class="form-control" placeholder="Employee Name"  readonly value="<?php echo $row['ad_emp_name'];?>"><input type="hidden" name="empid" id="empid" class="empid" value="<?php echo $row['ad_emp_id'];?>"/>
                                <input type="text" name="date" id="date" required class="form-control datepicker" placeholder="Date" value="<?php echo date("d/m/y");?>" readonly/>
                                <input type="text" name="clear_amt" id="clear_amt" class="form-control clear_amt" placeholder="Clearing Amount">
                                <div class="errmsg" style="background-color:#f27d7d;width:50%;"></div>
                                <input type="hidden" name="bal" id="bal" class="bal" value="<?php echo $row['ad_balance'];?>"/>
                                <input type="text" name="salary_pay" class="form-control salary_pay" id="salary_pay" title="Salary To Pay" placeholder="Salary To Pay" readonly/>
                                <input type="hidden" name="balance" id="balance" class="balance"/>
                                <input type="hidden" name="attn" id="attn" class="attn" value="<?= $attnd->att_attend;?>"/>
                                <input type="hidden" name="wage" id="wage" class="wage" value="<?= $wage->wage?>"/>
                            </div>

                            <div class="modal-footer">
                                <button type="submit" class="btn btn-success clear" id="change">Clear</button>
                                <button type="button" class="btn btn-default " data-dismiss="modal">Cancel</button>
                            </div>
                            
                        </form>
                    </div>
                </div>
            </div>
    </body>
    <script>
        /*floating button script*/
            $('.fixed-action-btn').hover(function(){
            $('#pluse_ic').toggle();
        });
        
        /*script for calculating balance*/
        $('.clear').focus(function(){
            var bal=$('.bal').val();
            var clear_amt=$('.clear_amt').val();
            
            var balance=parseFloat(bal)-parseFloat(clear_amt);
            
            $('.balance').val(balance);
        });
        
        /*script for salary payment*/
        $('.salary_pay').focus(function(){
        var attn;
        var wage;
        var total_wage;
        var clear_amt;
        var cal_sal;
        
        attn=$('.attn').val();
        wage=$('.wage').val();
        clear_amt=$('.clear_amt').val();
        
        total_wage=attn*parseFloat(wage);
        
        cal_sal=total_wage - clear_amt;
        
        $('.salary_pay').val(cal_sal);
        });
        
        
    </script>
</html>