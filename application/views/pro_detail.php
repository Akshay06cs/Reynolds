<html>
    <head>
        <title>
            Reynolds Chemequip Pvt. Ltd.
            	
        </title>
         <link rel='stylesheet' type='text/css' href="<?php echo base_url("assets/css/bootstrap.min.css");?>" />
        <script type='text/javascript' src="<?php echo base_url("assets/js/jquery-1.3.2.min.js");?>" ></script>
        <script type='text/javascript' src="<?php echo base_url("assets/js/script.js");?>" ></script>
     
        <link rel='stylesheet' type='text/css' href="<?php echo base_url("assets/css/prostyles.css");?>" />
        <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
         <script type='text/javascript' src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
           <!--floating buttons-->
        <link rel='stylesheet' type='text/css' href="<?php echo base_url("assets/css/font-awesome.min.css");?>" />
        <script type='text/javascript' src="<?php echo base_url(); ?>assets/js/materialize.js"></script> 
        <link rel='stylesheet' type='text/css' href="<?php echo base_url("assets/css/materialize.css");?>" />
        <!-- For Autocomplete -->
        <link rel='stylesheet' type='text/css' href="<?php echo base_url("assets/css/jquery-ui.css");?>" />
        <!--autocomplete-->
        <script type='text/javascript' src="<?php echo base_url(); ?>assets/js/jquery-ui.js"></script> 
        <script type='text/javascript' src="<?php echo base_url(); ?>assets/js/jquery-ui.min.js"></script> 
        <style>
            #description,#quantity,#price,#total
            {
                resize:none;
            }
            .ui-autocomplete 
            {
                position: absolute;
                top: 0;
                left: 0;
                z-index: 1510 !important;
                float: left;
                display: none;
                min-width: 160px;
                padding: 4px 0;
                margin: 2px 0 0 0;
                list-style: none;
                background-color: #ffffff;
                border-color: #ccc;
                border-color: rgba(0, 0, 0, 0.2);
                border-style: solid;
                border-width: 1px;
                -webkit-border-radius: 2px;
                -moz-border-radius: 2px;
                border-radius: 2px;
                -webkit-box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
                -moz-box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
                box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
                -webkit-background-clip: padding-box;
                -moz-background-clip: padding;
                background-clip: padding-box;
                *border-right-width: 2px;
                *border-bottom-width: 2px;
            }
        </style>
    </head>
    <body>
       
        <div class="container">
             <h1>RCPL Products</h1>
            <div class="row">
                <div class="col-md-6"  id='cssmenu'>
                    <?php foreach($products->result() as $row){ ?>
                    <ul>
                        <li class='active has-sub'><a href='#'><span><?= $row->equip_cat ?></span></a>
                        <?php
                              $data  = $this->db->query("SELECT * FROM rcpl_products WHERE equip_cat='{$row->equip_cat_id}'");
                            foreach($data->result() as $r){ ?>
                            <ul>
                              
                                <li><a href="#" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-chevron-right">&nbsp;<?= $r->equip_desc ?></span></a> </li>
                              
                            </ul>
                            <?php } ?>
                        </li>
                     
                    </ul>
                    <?php } ?>
                </div>
                <div class="col-md-4" id="detail">
                    <h1>Product Title</h1><br>
                    <ul>
                        <li>Description</li>
                        <li>Requirements</li>
                        <li>Structure</li>
                        <li>Images</li>
                    </ul>
                </div>
            </div>
        </div>
          <div class="fixed-action-btn vertical" style="bottom: 45px; right: 24px;">
                <a class="btn-floating btn-large red"  href="<?php echo base_url();?>index.php/users" >
                    <i id="pluse_ic" class="glyphicon glyphicon-plus"></i>
                    <i class="glyphicon glyphicon-home"></i>
                </a>
                <ul>
                     <li><a data-toggle="modal" data-target="#myModalcategory" class="btn-floating bg-success"  title="Add New Equipment Category"><i class="glyphicon glyphicon-cog"></i></a></li>
                    <li><a data-toggle="modal" data-target="#myModal" class="btn-floating bg-info"  title="Add New Equipment!"><i class="glyphicon glyphicon-grain"></i></a></li>
                    <li><a class="btn-floating grey"  data-placement="bottom" title="Go Back!"  href="javascript:window.history.go(-1);"><i class="glyphicon glyphicon-arrow-left"></i></a></li>    
                </ul>
        </div>
         <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <form name="myProspects" action="<?php echo base_url(); ?>index.php/users/add_rcpl_product" method ="post">
                        <div class="modal-body">
                            <input type="text" name="product_name" id="product_name"  required="required" class="form-control" placeholder="Equipment Name"  >
                            <input type="text" name="product_category" id="equip_category" required="required" class="form-control " placeholder="Type Equipment Category">
                        </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success" id="change"> Save</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div> 
        <div class="modal fade" id="myModalcategory" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <form name="myProspects" action="<?php echo base_url(); ?>index.php/users/add_rcpl_product_category" method ="post">
                        <div class="modal-body">
                            <input type="text" name="product_category" id="equip_category" required="required" class="form-control " placeholder="Enter New Equipment Category">
                            <input type="text" name="product_cat_code" id="product_name"  required="required" class="form-control" placeholder="Category Code"  >
                        </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success" id="change"> Save</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div> 
    </body>
    <script>
        ( function( $ ) {
            $( document ).ready(function() {
            $('#cssmenu li.has-sub>a').on('click', function(){
		$(this).removeAttr('href');
		var element = $(this).parent('li');
		if (element.hasClass('open')) {
			element.removeClass('open');
			element.find('li').removeClass('open');
			element.find('ul').slideUp();
		}
		else {
			element.addClass('open');
			element.children('ul').slideDown();
			element.siblings('li').children('ul').slideUp();
			element.siblings('li').removeClass('open');
			element.siblings('li').find('li').removeClass('open');
			element.siblings('li').find('ul').slideUp();
		}
	});

	$('#cssmenu>ul>li.has-sub>a').append('<span class="holder"></span>');

	(function getColor() {
		var r, g, b;
		var textColor = $('#cssmenu').css('color');
		textColor = textColor.slice(4);
		r = textColor.slice(0, textColor.indexOf(','));
		textColor = textColor.slice(textColor.indexOf(' ') + 1);
		g = textColor.slice(0, textColor.indexOf(','));
		textColor = textColor.slice(textColor.indexOf(' ') + 1);
		b = textColor.slice(0, textColor.indexOf(')'));
		var l = rgbToHsl(r, g, b);
		if (l > 0.7) {
			$('#cssmenu>ul>li>a').css('text-shadow', '0 1px 1px rgba(0, 0, 0, .35)');
			$('#cssmenu>ul>li>a>span').css('border-color', 'rgba(0, 0, 0, .35)');
		}
		else
		{
			$('#cssmenu>ul>li>a').css('text-shadow', '0 1px 0 rgba(255, 255, 255, .35)');
			$('#cssmenu>ul>li>a>span').css('border-color', 'rgba(255, 255, 255, .35)');
		}
	})();

	function rgbToHsl(r, g, b) {
	    r /= 255, g /= 255, b /= 255;
	    var max = Math.max(r, g, b), min = Math.min(r, g, b);
	    var h, s, l = (max + min) / 2;

	    if(max == min){
	        h = s = 0;
	    }
	    else {
	        var d = max - min;
	        s = l > 0.5 ? d / (2 - max - min) : d / (max + min);
	        switch(max){
	            case r: h = (g - b) / d + (g < b ? 6 : 0); break;
	            case g: h = (b - r) / d + 2; break;
	            case b: h = (r - g) / d + 4; break;
	        }
	        h /= 6;
	    }
	    return l;
	}
});
} )( jQuery );
    </script>
   <script>
         $(document).ready(function () {
            $("#equip_category").autocomplete({
            source: function (request, response) {
                $.ajax({
                    url: "<?php echo base_url(); ?>index.php/users/equip_category",
                    data:{term: request.term},
                    dataType: "json",
                    type: "POST",
                    dataFilter: function (data) { return data; },
                    success: function (data) {
                        response($.map(data, function (item) { 
                        return {
                                   label: item.equip_cat,
                                   value: item.equip_cat_id,
                                }
                            }))
                        },
                    error: function (XMLHttpRequest, textStatus, errorThrown) {
                        alert(textStatus);
                    }
                    });
                    },
                    minLength: 1,
                });
            }); 
            
        </script>    
        <script>
        $('.fixed-action-btn').hover(function(){
           $('#pluse_ic').toggle();
           });
</script>
</html>