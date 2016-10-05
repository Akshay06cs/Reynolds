<html>
    <head>
        <link rel='stylesheet' type='text/css' href="<?php echo base_url("assets/css/jquery.ui.css");?>" />
        <script type='text/javascript' src="<?php echo base_url("assets/js/jquery-1.3.2.min.js");?>" ></script>
       
        <script type='text/javascript' src="<?php echo base_url("assets/js/jquery.js");?>" ></script>
         <script type='text/javascript' src="<?php echo base_url("assets/js/jquery.ui.js");?>" ></script>
        
    </head>
    <body>
        <input type="text" id="birds" />
    </body>
    <script>
        $(function(){
        $("#birds").autocomplete({
          source: "<?php echo base_url(); ?>index.php/users/get_birds" // path to the get_birds method
     });
        });
    </script>
</html>
