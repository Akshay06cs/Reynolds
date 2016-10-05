<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="viewport" content="width=1,initial-scale=1,user-scalable=1" />
	<title>Reynolds Chemequip Pvt. Ltd.</title>
	
	<link href="http://fonts.googleapis.com/css?family=Lato:100italic,100,300italic,300,400italic,400,700italic,700,900italic,900" rel="stylesheet" type="text/css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/css/bootstrap.min.css");?>" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/css/styles.css");?>" />
	!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
    
	<div class="container">
            <div class=" row">
                <div class=" col-md-3">
			<section class="login-form">
				<form method="post" action="" role="login">
                                    
					<section>
						<h4>Please Sign In</h4>
						<div class="form-group">
		    				<div class="input-group">
			      				<div class="input-group-addon"><span class="text-primary glyphicon glyphicon-envelope"></span></div>
								<input type="email" name="email" placeholder="Email" required class="form-control" />
							</div>
						</div>
						<div class="form-group">
		    				<div class="input-group">
			      				<div class="input-group-addon"><span class="text-primary glyphicon glyphicon-lock"></span></div>
								<input type="password" name="password" placeholder="Password" required class="form-control" />
							</div>
						</div>
						
						<div class="form-group">
							<input type="checkbox" name="remember" value="1" /> Remember me
						</div>
						
                                               
                                                
					</section>
					<div >
						 <button type="submit" name="go" class="test"  > <h3 style="float:left; padding:5">GO </h3><img src="assets/images/a.png" width="100" height="100"/></button>
					</div>
				</form>
			</section>
                     </div>
                    <div class=" col-md-9">
                        <section class="login-img" style="color:white font-family: Segoe Script">
				<img src="assets/images/run.gif"  class="img-rounded img-responsive"  >
                                   
                                <p>unwavering commitment to <span style="font-family: Segoe Script;font-size: 150%;color:yellow">integrity</span> and <span style="font-family: Segoe Script;font-size: 150%;color:yellow">transparency</span>are  our core principles</p>
                                <p>Every <span style="font-family: Segoe Script;font-size: 150%;color:yellow">employee</span> of Reynolds is a custodian of Reynolds reputation.</p>
                                <p>Reynolds’<span style="font-family: Segoe Script;font-size: 150%;color:yellow">success</span> is reflected in its reputation in the marketplace.</p>
                                <p>Reynolds’ <span style="font-family: Segoe Script;font-size: 150%;color:yellow">relationships</span> are one of its most valuable assets.</p>
                                <p>we promotes a culture of individual <span style="font-family: Segoe Script;font-size: 150%;color:yellow">empowerment</span>, responsibility, accountability and action.</p> 



                                
			</section>
                                        
                    </div>
                </div>
	</div>
	
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<script src="<?php echo base_url("assets/js/bootstrap.min.js");?>"></script>
        <style>
           
}
            </style>
</body>
</html>




<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>Contact Form</title>
	<script  src="<?php echo base_url(); ?>assets/js/jquery-1.3.2.min.js"></script>
	<!--[if IE]><script>
	$(document).ready(function() {

$("#form_wrap").addClass('hide');

})

</script><![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/css/login.css");?>">
</head>
<body>
	<div id="wrap">
		<h1>Reynolds Chemequip Pvt. Ltd.</h1>
		<div id='form_wrap'>
		
             <form action = "<?php echo base_url(); ?>index.php/login/process" method = "post" name = "process">
                    <?php if(!is_null($msg)) echo $msg; ?>
                          <p>
                               <label for="username" class="uname" data-icon="u" > Your Username </label>
                               <input type ='text' name = "username" required = "required" value = "<?php echo set_value('username'); ?>" /><?php echo form_error('username'); ?><br/>
                          </p>
                          <p>
                               <label for="password" class="youpasswd" data-icon="p"> Your Password </label>
                               <input type ='password' name = "password" required = "required"  value = "<?php echo set_value('password'); ?>" /><?php echo form_error('password'); ?><br/>
                          </p>
                          <p>
                               <input type="submit" value="Login" /> 
                          </p>
                </form>
		</div>
	</div>
</body>
</html>