    <html>
    <head>
    <Title>View Part</Title>
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
            // Edit Part Detail
          
            
        </script>
    </head>
    <script type="text/javascript">
    //auto expand textarea
    function adjust_textarea(h) 
    {
        h.style.height = "20px";
        h.style.height = (h.scrollHeight)+"px";
    }
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
   <body>
       
        <div class="container">
              <form action="<?= base_url('index.php/users/update_part') ?>" method="post">
            <div class="jumbotron">
                <!--no of gate Pass in Month -->
                <center><h2>Reynolds Chemequip Pvt. Ltd.</h2><br><h4>Part Details</h4></center>
                        <div class='form-style-4'>
                            <input type="hidden" name="pid" value="<?= $r->pid; ?>">
                        <label for="field1" class="part_cat">
                            <span align="left" class='control-label'>Part Category</span>: <?= $r->category ?><input type="hidden" name="category" required="true" id="category" value="<?= $r->category ?>" readonly/>
                        </label>
                        <label for="field1" class="part_mo">
                            <span align="left">Moc</span>: <?= $r->moc ?>
                        </label>
                        <label for="field1" class="part_sub">
                            <span align="left">Sub Moc</span>: <?= $r->sub_moc ?>
                        </label>
                            
                        <label for="field1" class="part_gr">
                            <span align="left" >Grade</span>: <?= $r->grade ?>
                        </label>
                        <label for="field1" class="part_type">
                            <span align="left">Type</span>: <?= $r->type ?>
                        </label>
                        <label for="field1" class="part_thickness">
                            <span align="left">Thickness </span>: <?= $r->thickness ?><?= $r->thickness_uom ?>
                        </label>
                        <label for="field1" class="part_size">
                            <span align="left">Size </span>: <?= $r->size ?><?= $r->size_uom ?>
                        </label>
                        <label for="field1" class="part_length">
                            <span align="left">Length </span>: <?= $r->length ?><?= $r->length_uom ?>
                        </label>
                        <label for="field1" class="part_pass">
                            <span align="left" >Pass</span>:<?= $r->pass ?>
                        </label>
                        <label for="field1" class="part_holes">
                            <span align="left" >Holes</span>: <?= $r->holes ?>
                        </label>
                        <label for="field1" class="part_cuts">
                            <span align="left" >Cuts</span>: <?= $r->cuts ?>
                        </label>
                        <label for="field1" class="part_density">
                            <span align="left" class='control-label'>Density</span>: <?= $r->density ?>
                        </label>
                        <label for="field1" class="part_ot_dia">
                            <span align="left" class='control-label'>Outer Diameter </span>: <?= $r->outer_diameter ?><?= $r->od_uom ?>
                        </label>
                        <label for="field1" class="part_bwg">
                            <span align="left">BWG </span>: <?= $r->bwg ?><?= $r->bwg_uom ?>
                        </label>
                        <label for="field1" class="part_sch">
                            <span align="left">Schedule</span>: <?= $r->schedule ?>
                        </label>
                        <label for="field1" class="part_radius">
                            <span align="left" >Radius</span>: <?= $r->radius ?>
                        </label>
                        <label for="field1" class="part_degree">
                            <span align="left">Degree</span>: <?= $r->degree ?>
                        </label>
                        <label for="field1" class="part_pattern">
                            <span align="left">Pattern No.</span>: <?= $r->pattern_no ?>
                        </label>
                        <label for="field1" class="part_rating">
                            <span align="left" >Rating</span>: <?= $r->rating ?>
                        </label> 
                        <label for="field1" class="part_threading">
                            <span align="left">Threading </span>: <?= $r->threading ?><?= $r->threading_uom ?>
                        </label>
                        <label for="field2" >
                            <span align="left" class='control-label'>UOM</span>: <?= $r->uom ?>
                        </label>
                    </div>
                    <div class="fixed-action-btn vertical" style="bottom: 45px; right: 24px;">
                        <a class="btn-floating btn-large red"  href="<?php echo base_url();?>index.php/users">
                            <i id="pluse_ic" class="glyphicon glyphicon-plus"></i>
                            <i class="glyphicon glyphicon-home"></i>
                        </a>
                        <ul>
                            <li><a class="btn-floating grey"  data-placement="bottom" title="Go Back!"  href="javascript:window.history.go(-1);"><i class="glyphicon glyphicon-arrow-left"></i></a></li>    
                              <li><button type="submit" name = "submit" class="btn-floating blue" data-placement="bottom" title="Save" id="submit" ><span class="glyphicon glyphicon-floppy-save"></span></button></li>
                        </ul>
                    </div>
                </div>
        </form>
    </div>
        </body>
        <script>
            $('.fixed-action-btn').hover(function(){
            $('#pluse_ic').toggle();
        });
        </script>
        <script>
            $(document).ready(function(){
              var category =$('#category').val();
                    
                  if(category == 'Plate'){
                        $('.part_mo').show();
                        $('.part_gr').show();
                        $('.part_sub').hide();
                        $('.part_type').hide();
                        $('.part_size').hide();
                        $('.part_length').hide();
                        $('.part_pass').hide();
                        $('.part_holes').hide();
                        $('.part_cuts').hide();
                        $('.part_density').show();
                        $('.part_ot_dia').hide();
                        $('#outer_diameter').val('NA');
                        $('.part_bwg').hide();
                        $('.part_sch').hide(); 
                        $('.part_thickness').show(); 
                        $('.part_radius').hide();
                        $('.part_degree').hide();
                        $('.part_pattern').hide();
                        $('.part_rating').hide();
                        $('.part_threading').hide(); 
                    }else if(category == 'Tube'){
                        $('.part_mo').show();
                        $('.part_gr').show();
                        $('.part_sub').hide();
                        $('.part_type').hide();
                        $('.part_size').hide();
                        $('.part_length').hide();
                        $('.part_pass').hide();
                        $('.part_holes').hide();
                        $('.part_cuts').hide();
                        $('.part_density').show();
                        $('.part_ot_dia').show();
                        $('.part_bwg').show();
                        $('.part_sch').hide(); 
                        $('.part_thickness').show(); 
                        $('.part_radius').hide();
                        $('.part_degree').hide();
                        $('.part_pattern').hide();
                        $('.part_rating').hide();
                        $('.part_threading').hide(); 
                    }else if(category == 'Pipe'){
                        $('.part_mo').show();
                        $('.part_gr').show();
                        $('.part_sub').hide();
                        $('.part_type').hide();
                        $('.part_size').hide();
                        $('.part_length').hide();
                        $('.part_pass').hide();
                        $('.part_holes').hide();
                        $('.part_cuts').hide();
                        $('.part_density').hide();
                        $('#density').val('NA');
                        $('.part_ot_dia').hide();
                        $('#outer_diameter').val('NA');
                        $('.part_bwg').hide();
                        $('.part_sch').show(); 
                        $('.part_thickness').show(); 
                        $('.part_radius').hide();
                        $('.part_degree').hide();
                        $('.part_pattern').hide();
                        $('.part_rating').hide();
                        $('.part_threading').hide(); 
                    }else if(category == 'Casting'){
                        $('.part_mo').hide();
                        $('.part_gr').show();
                        $('.part_sub').hide();
                        $('.part_type').hide();
                        $('.part_size').hide();
                        $('.part_length').hide();
                        $('.part_pass').hide();
                        $('.part_holes').hide();
                        $('.part_cuts').hide();
                        $('.part_density').hide();
                        $('#density').val('NA');
                        $('.part_ot_dia').hide();
                        $('#outer_diameter').val('NA');
                        $('.part_bwg').hide();
                        $('.part_sch').hide(); 
                        $('.part_thickness').hide(); 
                        $('.part_radius').hide();
                        $('.part_degree').hide();
                        $('.part_pattern').show();
                        $('.part_rating').hide();
                        $('.part_threading').show(); 
                    }
                    else if(category == 'Forged'){
                        $('.part_mo').show();
                        $('.part_gr').show();
                        $('.part_sub').hide();
                        $('.part_type').show();
                        $('.part_size').show();
                        $('.part_length').hide();
                        $('.part_pass').hide();
                        $('.part_holes').hide();
                        $('.part_cuts').hide();
                        $('.part_density').hide();
                        $('#density').val('NA');
                        $('.part_ot_dia').hide();
                        $('#outer_diameter').val('NA');
                        $('.part_bwg').hide();
                        $('.part_sch').show(); 
                        $('.part_thickness').hide(); 
                        $('.part_radius').hide();
                        $('.part_degree').hide();
                        $('.part_pattern').hide();
                        $('.part_rating').show();
                        $('.part_threading').hide(); 
                    } else if(category == 'Profiles'){
                        $('.part_mo').show();
                        $('.part_gr').show();
                        $('.part_sub').hide();
                        $('.part_type').hide();
                        $('.part_size').hide();
                        $('.part_length').hide();
                        $('.part_pass').hide();
                        $('.part_holes').hide();
                        $('.part_cuts').hide();
                        $('.part_density').show();
                        $('.part_ot_dia').hide();
                        $('#outer_diameter').val('NA');
                        $('.part_bwg').hide();
                        $('.part_sch').hide(); 
                        $('.part_thickness').show(); 
                        $('.part_radius').hide();
                        $('.part_degree').hide();
                        $('.part_pattern').hide();
                        $('.part_rating').hide();
                        $('.part_threading').hide(); 
                    }else if(category == 'Dish Ends'){
                        $('.part_mo').show();
                        $('.part_gr').show();
                        $('.part_sub').hide();
                        $('.part_type').hide();
                        $('.part_size').show();
                        $('.part_length').hide();
                        $('.part_pass').hide();
                        $('.part_holes').hide();
                        $('.part_cuts').hide();
                        $('.part_density').hide();
                        $('#density').val('NA');
                        $('.part_ot_dia').hide();
                        $('#outer_diameter').val('NA');
                        $('.part_bwg').hide();
                        $('.part_sch').show(); 
                        $('.part_thickness').hide(); 
                        $('.part_radius').hide();
                        $('.part_degree').hide();
                        $('.part_pattern').hide();
                        $('.part_rating').hide();
                        $('.part_threading').hide(); 
                    }else if(category == 'Baffles'){
                        $('.part_mo').show();
                        $('.part_gr').show();
                        $('.part_sub').hide();
                        $('.part_type').hide();
                        $('.part_size').show();
                        $('.part_length').hide();
                        $('.part_pass').show();
                        $('.part_holes').show();
                        $('.part_cuts').show();
                        $('.part_density').hide();
                        $('#density').val('NA');
                        $('.part_ot_dia').hide();
                        $('#outer_diameter').val('NA');
                        $('.part_bwg').hide();
                        $('.part_sch').show(); 
                        $('.part_thickness').hide(); 
                        $('.part_radius').hide();
                        $('.part_degree').hide();
                        $('.part_pattern').hide();
                        $('.part_rating').hide();
                        $('.part_threading').hide(); 
                    }
                    else if(category == 'Electrodes'){
                        $('.part_mo').show();
                        $('.part_gr').show();
                        $('.part_sub').show();
                        $('.part_type').hide();
                        $('.part_size').show();
                        $('.part_length').hide();
                        $('.part_pass').hide();
                        $('.part_holes').hide();
                        $('.part_cuts').hide();
                        $('.part_density').hide();
                        $('#density').val('NA');
                        $('.part_ot_dia').hide();
                        $('#outer_diameter').val('NA');
                        $('.part_bwg').hide();
                        $('.part_sch').hide(); 
                        $('.part_thickness').hide(); 
                        $('.part_radius').hide();
                        $('.part_degree').hide();
                        $('.part_pattern').hide();
                        $('.part_rating').hide();
                        $('.part_threading').hide(); 
                    }
                    else if(category == 'Elbow'||category == 'Equal Tee'||category == 'Reducing Tee'){
                        $('.part_mo').show();
                        $('.part_gr').show();
                        $('.part_sub').hide();
                        $('.part_type').hide();
                        $('.part_size').show();
                        $('.part_length').hide();
                        $('.part_pass').hide();
                        $('.part_holes').hide();
                        $('.part_cuts').hide();
                        $('.part_density').hide();
                        $('#density').val('NA');
                        $('.part_ot_dia').hide();
                        $('#outer_diameter').val('NA');
                        $('.part_bwg').hide();
                        $('.part_sch').show(); 
                        $('.part_thickness').hide(); 
                        $('.part_radius').show();
                        $('.part_degree').show();
                        $('.part_pattern').hide();
                        $('.part_rating').hide();
                        $('.part_threading').hide(); 
                    }
                    else if(category == 'Gasket'){
                        $('.part_mo').show();
                        $('.part_gr').hide();
                        $('.part_sub').hide();
                        $('.part_type').hide();
                        $('.part_size').show();
                        $('.part_length').hide();
                        $('.part_pass').hide();
                        $('.part_holes').hide();
                        $('.part_cuts').hide();
                        $('.part_density').hide();
                        $('#density').val('NA');
                        $('.part_ot_dia').hide();
                        $('#outer_diameter').val('NA');
                        $('.part_bwg').hide();
                        $('.part_sch').show(); 
                        $('.part_thickness').hide(); 
                        $('.part_radius').hide();
                        $('.part_degree').hide();
                        $('.part_pattern').hide();
                        $('.part_rating').hide();
                        $('.part_threading').hide(); 
                    }
                    else if(category == 'Coupling'|| category == 'Plug'){
                        $('.part_mo').show();
                        $('.part_gr').show();
                        $('.part_sub').show();
                        $('.part_type').hide();
                        $('.part_size').show();
                        $('.part_length').hide();
                        $('.part_pass').hide();
                        $('.part_holes').hide();
                        $('.part_cuts').hide();
                        $('.part_density').hide();
                        $('#density').val('NA');
                        $('.part_ot_dia').hide();
                        $('#outer_diameter').val('NA');
                        $('.part_bwg').hide();
                        $('.part_sch').hide(); 
                        $('.part_thickness').hide(); 
                        $('.part_radius').hide();
                        $('.part_degree').hide();
                        $('.part_pattern').hide();
                        $('.part_rating').show();
                        $('.part_threading').hide(); 
                    }
                    else if(category == 'Round Rods'){
                        $('.part_mo').show();
                        $('.part_gr').show();
                        $('.part_sub').hide();
                        $('.part_type').hide();
                        $('.part_size').show();
                        $('.part_length').hide();
                        $('.part_pass').hide();
                        $('.part_holes').hide();
                        $('.part_cuts').hide();
                        $('.part_density').hide();
                        $('#density').val('NA');
                        $('.part_ot_dia').hide();
                        $('#outer_diameter').val('NA');
                        $('.part_bwg').hide();
                        $('.part_sch').hide(); 
                        $('.part_thickness').hide(); 
                        $('.part_radius').hide();
                        $('.part_degree').hide();
                        $('.part_pattern').hide();
                        $('.part_rating').hide();
                        $('.part_threading').hide(); 
                    }
                    else if(category == 'Bolts'|| category == 'Cap Screw'||category == 'Washers'||category=='Stud with 2 nuts'){
                        $('.part_mo').show();
                        $('.part_gr').show();
                        $('.part_sub').show();
                        $('.part_type').hide();
                        $('.part_size').show();
                        $('.part_length').show();
                        $('.part_pass').hide();
                        $('.part_holes').hide();
                        $('.part_cuts').hide();
                        $('.part_density').hide();
                        $('#density').val('NA');
                        $('.part_ot_dia').hide();
                        $('#outer_diameter').val('NA');
                        $('.part_bwg').hide();
                        $('.part_sch').hide(); 
                        $('.part_thickness').hide(); 
                        $('.part_radius').hide();
                        $('.part_degree').hide();
                        $('.part_pattern').hide();
                        $('.part_rating').hide();
                        $('.part_threading').hide(); 
                    }
                    
                  
                });
          
        </script>
        <script>
                function description(){
                var category =$('#category').val();
                var moc=$('#moc_list option:selected').text();
                var grade= $('#grade_list option:selected').text();
                var thickness= $('#thickness').val();
                var thickness_uom= $('#thickness_uom option:selected').text();
                var bwg= $('#bwg').val();
                var bwg_uom= $('#bwg_uom option:selected').text();
                var outer_diameter= $('#outer_diameter').val();
                var outer_diameter_uom= $('#outer_diameter_uom option:selected').text();
                var sub_moc= $('#sub_moc').val();
                var schedule= $('#schedule').val();
                var rating= $('#rating').val();
                var pattern_no= $('#pattern_no').val();
                var threading= $('#threading').val();
                var threading_uom= $('#threading_uom option:selected').text();
                var type= $('#type').val();
                var size= $('#sizee').val();
                var size_uom= $('#size_uom option:selected').text();
                var length= $('#length').val();
                var length_uom= $('#length_uom option:selected').text();
                var pass= $('#pass').val();
                var holes= $('#holes').val();
                var cuts= $('#cuts').val();
                var radius= $('#radius').val();
                var degree= $('#degree').val();
                var uom=$('#uom option:selected').text();
                var od='OD';
                //var tubemoc= $('#tubemoc').val();
                //var tubegrade= $('#tubegrade').val();
                //var tubediameter= $('#tubediameter').val();
                //var tubebwg= $('#tubebwg').val();
                //var tubethick= $('#tubethick').val();
                if(category=='Plate'){
                    var string=category+' '+moc+' '+grade+' '+thickness+''+thickness_uom;
                }else if(category=='Tube' && !thickness==''){
                    var string=category+' '+moc+' '+grade+' '+outer_diameter+''+outer_diameter_uom+' '+od+' '+thickness+''+thickness_uom;
                }else if(category=='Tube' && !bwg==''){
                    var string=category+' '+moc+' '+grade+' '+outer_diameter+''+outer_diameter_uom+' '+od+' '+bwg+' '+bwg_uom;
                }else if(category=='Pipe'){
                    var string=category+' '+moc+' '+grade+' '+thickness+''+thickness_uom+' '+schedule;
                }
                else if(category=='Casting' && !threading==''){
                    var string=category+' '+grade+' '+pattern_no+' '+threading+''+threading_uom;
                } else if(category=='Casting' && threading==''){
                    var string=category+' '+grade+' '+pattern_no;
                }
                else if(category=='Forged'){
                    var string=category+' '+moc+' '+grade+' '+type+' '+size+''+size_uom+' '+schedule+' '+rating;
                }
                else if(category=='Profiles'||category=='Round Rods'){
                    var string=category+' '+moc+' '+grade+' '+size+''+size_uom;
                }
                else if(category=='Dish Ends'){
                    var string=category+' '+moc+' '+grade+' '+size+''+size_uom+' '+schedule;
                }
                else if(category=='Baffles'){
                    var string=category+' '+moc+' '+grade+' '+size+''+size_uom+' '+pass+' '+holes+' '+cuts+' '+schedule;
                }
                else if(category=='Electrodes'){
                    var string=category+' '+moc+' '+sub_moc+' '+grade+' '+size+''+size_uom;
                }
                 else if(category=='Equal Tee'||category=='Reducing Tee'||category=='Elbow'){
                    var string=category+' '+moc+' '+grade+' '+size+''+size_uom+' '+schedule+' '+radius+' '+degree;
                }
                else if(category=='Gasket'){
                    var string=category+' '+moc+' '+size+''+size_uom+' '+schedule;
                }
                else if(category=='Coupling' ||category=='Plug' ){
                    var string=category+' '+moc+' '+grade+' '+sub_moc+' '+size+''+size_uom+' '+rating;
                }
                else if(category=='Bolts' ||category=='Cape Screw'|| category=='Washers' ){
                    var string=category+' '+moc+' '+grade+' '+sub_moc+' '+size+''+size_uom+' '+length+''+length_uom;
                }
                $('#des').val(string);
            }
          
             
           </script>
        
</html>




















