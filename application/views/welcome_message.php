<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
   <link rel ="stylesheet" href="<?php echo base_url("assets/css/style.css"); ?>" />
<script type="text/javascript" src="<?php echo base_url("assets/js/jquery-1.11.3.min.js");?>"></script>
<script type="text/javascript" src="<?php echo base_url("assets/js/bootstrap.js");?>"></script>
    <title>Mainu</title>
</head>
<body>
    <div class="menuholder">
        <ul class="menu slide">
            
            <li><a href="#" class="orange">Master</a>   
                <div class="subs">
                    <dl>
                       
                        <dd><a href="<?php echo base_url();?>index.php/users/paa">Supplier Detail</a></dd>
                        <dd><a href="<?php echo base_url();?>index.php/users/paa1">Customer Detail</a></dd>
                    </dl>
                    
                </div>
            </li>
			<li><a href ="#">Home</a></td></li>
            <li><a href ="#">Resources</a></li>
            <li><a href ="#">Other</a></li>
            <li><a href ="#">About</a></li>
            <li><a href ="<?php echo base_url(); ?>index.php/home/do_logout">Logout</a></li>
        </ul>
</body>
</html>