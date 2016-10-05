<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="viewport" content="width=1,initial-scale=1,user-scalable=1" />
	<title>Reynolds Chemequip Pvt. Ltd.</title>
	
	
	<link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/css/bootstrap.min.css");?>" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/css/login_styles.css");?>" />
	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
    <div class="fluid ontainer">
            <div class=" row">
                 <div class=" col-md-1">
                     <img src="<?php echo base_url();?>assets/images/logo2.png" width=135" height="110" style="padding: 10px;">
                     </div>
                <div class=" col-md-4">
                    <section class="login-form">
                        <div class="row">
                            <div class="col-md-9" >
                            <form action="<?php echo base_url();?>index.php/login/login_form" method="post" name="login" style="padding: 25px">
                                <section>
                                    <h4>Login</h4>
					<div class="form-group">
                                            <div class="input-group">
                                        	<div class="input-group-addon"><span class="text-primary glyphicon glyphicon-envelope white"></span></div>
                                                	<input type="text" size="40" required="required" name="username" value="<?php echo set_value('username');?>" class="form-control"> 
                                                </div>
					</div>
					<div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-addon"><span class="text-primary glyphicon glyphicon-lock"></span></div>
                                                    <input type="password" size="40" required="required" name="password" value="<?php echo set_value('password');?>" class="form-control">
                                            </div>
					</div>
				</section>
                            </div >
                            <div class="col-md-3">
                                <button type="submit" name="login" class="test"> <img src="<?php echo base_url();?>assets/images/a.png" width="50" height="62" style="padding:5px;margin-top:15px;"/><p style="margin-top:75px;padding:2px;font-weight: bold;font-size:25px">GO</p></button>
                            </div>
                            </div>
                        </form>
                    </section>
                </div>
                    <div class=" col-md-6" style="margin-top: 2cm;">
                       
                     
                            <center >
				<img src="<?php echo base_url();?>assets/images/run.gif"  class="img-rounded img-responsive"   >
                                
                            </center>
                      
                                          
                    </div>
                <div class=" col-md-12">
                     <div id="test">
                         <center>
                             <p><span>unwavering commitment to </span><img src="<?php echo base_url();?>assets/images/integrity.gif" ><span> and</span> <img src="<?php echo base_url();?>assets/images/transparency.gif"><span> are our core principles</span></p>
                                <p><span>every </span><img src="<?php echo base_url();?>assets/images/employee.gif"><span> is an ambassador of quality</span></p>
                                <p><img src="<?php echo base_url();?>assets/images/success.gif"><span> is reflected in our reputation</span></p>
                                <p><img src="<?php echo base_url();?>assets/images/relationships.gif"><span> are one of our most valuable assets</span></p>
                                <p><span>we promote a culture of individual </span> <img src="<?php echo base_url();?>assets/images/empowerment.gif"><span>, responsibility, accountability and action</span></p> 
                            </center>
                           </div>      
                </div>
                </div>
	</div>

	<script src="<?php echo base_url("assets/js/bootstrap.min.js");?>"></script>

</body>

<style>
#test span {
    margin-top: 35px;
    text-align: center;
    font-family:Segoe Print;


    -webkit-animation: fadein 30s; /* Safari, Chrome and Opera > 12.1 */
       -moz-animation: fadein 20s; /* Firefox < 16 */
        -ms-animation: fadein 20s; /* Internet Explorer */
         -o-animation: fadein 20s; /* Opera < 12.1 */
            animation: fadein 20s;
}

@keyframes fadein {
    from { opacity: 0; }
    to   { opacity: 1; }
}

/* Firefox < 16 */
@-moz-keyframes fadein {
    from { opacity: 0; }
    to   { opacity: 1; }
}

/* Safari, Chrome and Opera > 12.1 */
@-webkit-keyframes fadein {
    from { opacity: 0; }
    to   { opacity: 1; }
}

/* Internet Explorer */
@-ms-keyframes fadein {
    from { opacity: 0; }
    to   { opacity: 1; }
}

/* Opera < 12.1 */
@-o-keyframes fadein {
    from { opacity: 0; }
    to   { opacity: 1; }
}
</style>
</html>












