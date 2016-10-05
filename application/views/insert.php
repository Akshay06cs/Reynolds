<html>
<head>
    <script type='text/javascript' src="<?php echo base_url(); ?>assets/js/jQuery-2.1.4.min.js"></script>  
    <link rel='stylesheet' type='text/css' href="<?php echo base_url("assets/css/bootstrap.min.css");?>" />
    <link rel='stylesheet' type='text/css' href="<?php echo base_url("assets/css/jquery.ptTimeSelect.css");?>" />
    <script type='text/javascript' src="<?php echo base_url(); ?>assets/js/jquery.ptTimeSelect.js"></script>
    <!--Valdation For PAN MOBILE NO IFSC  -->
     <script type='text/javascript' src="<?php echo base_url(); ?>assets/js/validation.js"></script>
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
    <h1>New Supplier/Customer</h1>
<form  action="<?= base_url('index.php/users/insert_user_db') ?>" method ="post">
    <div id="accordion">
    <h1 style="background:#428bca;color:white" id="acc1">Supplier/Customer Detail</h1>
    <div>
        <div class="form-style-4" >
            <div class="form-group required">
                <label for="field1">
                    <span align="left" class='control-label'>Supplier/Customer</span> <input type="radio" value="SUPP" name="code" checked /> Supplier <input type="radio" name="code" value="CUST" /> Customer <input type="radio" name="code" value="CUSU" /> Both
                </label>
                <label for="field1">
                    <span align="left" class='control-label'>Name</span>: <input type="text" name="sname" class="name" required="required" placeholder="Enter Name"/>
                </label>
                <label for="field1">
                    <span align="left">Nick Name</span>: <input type="text" name="nick_name" placeholder='Enter Nick Name'/>
                </label>
                <label for="field2">
                    <span align="left">Mobile No.</span>: <input type="text" name="mob" maxlength="13" class="mobile" onkeypress="return isNumberKey(event)" value="+91"  />
                </label> 
                <label for="field2">
                    <span align="left">Tel. No.</span>: <input type="text" name="ph" placeholder="Enter Telephone No." /> 
                </label> 
                <label for="field2">
                    <span align="left">Email</span>: <input type="email" name="email" size="10" placeholder="abc@xyz.com" /> 
                </label> 
                <label for="field2">
                    <span align="left">Fax</span>: <input type="text" name="fax" /> 
                </label> 
            </div>
        </div>
    </div>
    <h3 style="background:#428bca;color:white" id="acc2">Address Detail</h3>
    <div>
        <div class="form-style-4 form-group required">
            <table  class="table test"> 
                <tr class="prospect" style=" background-color:#eeeeee;">
                    <th align="center" class='control-label'>Address</th>
                    <th align="center" class='control-label'>Address1</th>
                    <th align="center">Address2</th>
                    <th align="center" class='control-label'>City</th>
                    <th align="center" class='control-label'>PIN</th>
                    <th align="center" class='control-label'>State</th>
                    <th align="center" class='control-label'>Country</th>
		</tr>
		<tr class="prospect_data">
                    <td style="width:12%">
                        <input type="text" name="address[]"  title="Address" list="packing" placeholder="Address" style="width:100%" rows="2" required="reqired" ></textarea>
                        <datalist id="packing">
                            <option>Office</option>
                            <option>Registered Office</option>
                            <option>Works</option>
                            <option>Warehouse</option>
                            <option>Project Site</option>
                        </datalist>
                    </td>
                    <td style="width:22%">
                        <textarea name="address1[]"  title="Address1" placeholder="Address1" style="width:100%" rows="2" class="address" required="reqired"  ></textarea>
                    </td>
                    <td style="width:22%">
                        <textarea name="address2[]"  title="Address2" placeholder="Address2" style="width:100%" title="Address2" rows="2" ></textarea>
                    </td>
                    <td style="width:10%">
                        <textarea name="city[]" class="city" style="width:100%" rows="2" placeholder="City" title="City" required="reqired"  ></textarea>
                    </td>
                    <td style="width:8%">
                        <textarea name="pin[]"  class="pin_code" style="width:100%" rows="2" onkeypress="return isNumberKey(event)" placeholder="000 000" maxlength="6" title="PIN" required="reqired"  ></textarea>
                    </td>
                    <td style="width:12%">
                        <textarea name="state[]" class='states' style="width:100%" rows="2" placeholder="State" title="State" required="reqired" ></textarea>
                    </td>
                    <td style="width:12%">
                        <textarea name="country[]" class="country" style="width:100%" rows="2" placeholder="Country" title="Country" required="reqired"  ></textarea>
                    </td>
		</tr>
            </table>
            <div>
                <a href="javascript:;" title="Add a row" ><span class="glyphicon glyphicon-plus plusbtn1"></span></a>
                <a href="javascript:;" title="Remove the row"><span class="glyphicon glyphicon-minus minusbtn1"></span></a>
            </div>
        </div>
    </div>
    <h3 style="background:#428bca;color:white">Account Detail</h3>
    <div>
        <div class="form-style-4">
            <label for="field1">
                <span align="left">PAN No.</span>: <input type="text" name="pan" class="pan"  MaxLength="10" onblur="ValidatePAN(this);" placeholder="XXXXX0000X"/> 
            </label>
            <label for="field1">
                <span align="left">Service Tax No.</span>: <input type="text" name="sertaxnum"  /> 
            </label>
            <label for="field1">
                <span align="left">Excise No.</span>:<input type="text" name="exnum"  maxlength="15" class='exnum' onblur="ValidateEX(this);" placeholder="XXXXX0000XXX000"   /> 
            </label>
            <label for="field1">
                <span align="left">TIN No.</span>:<input type="text" name="tin" class=""  maxlength="11" placeholder='Enter 11 Digits TIN No.' onkeypress="return isNumberKey(event)" /> 
            </label>
            <label for="field1">
                <span align="left">CIN No.</span>:<input type="text" name="cin_no" maxlength='21' placeholder="Enter 21 AlphaNumeric CIN No."  /> 
            </label>
            <label for="field1">
                <span align="left">Bank Name</span>: <input type="text" name="ven_bank" class="bank_name" placeholder="Enter Bank Name" /> 
            </label>
            <label for="field1">
                <span align="left">Bank Branch</span>: <input type="text" name="bank_branch"  /> 
            </label>
            <label for="field1">
                <span align="left">Bank City</span>: <input type="text" name="bank_city"  /> 
            </label>
            <label for="field1">
                <span align="left">Account No.</span>: <input type="text" name="acc_num" class='banck_acc'  maxlength="18" onkeypress="return isNumberKey(event)" placeholder="Enter Account No."/> 
            </label>
            <label for="field1">
                <span align="left">IFSC No.</span>: <input type="text" name="ifsc_code"  maxlength="11" class='ifsc' onblur="ValidateIFSC(this);" placeholder="Enter IFSC NO." /> <br><br>
            </label>
        </div>
    </div>
</div>
    <div class="fixed-action-btn vertical" style="bottom: 45px; right: 24px;">
        <a class="btn-floating btn-large red"  href="<?php echo base_url();?>index.php/users">
            <i id="pluse_ic" class="glyphicon glyphicon-plus"></i>
            <i class="glyphicon glyphicon-home"></i>
        </a>
        <ul>
            <li><button type="submit" id="submit" name = "submit" class="btn-floating blue" data-placement="bottom" title="Save"><span class="glyphicon glyphicon-floppy-save"></span></button></li>
            <li><a class="btn-floating grey"  data-placement="bottom" title="Go Back!"  href="javascript:window.history.go(-1);"><i class="glyphicon glyphicon-arrow-left"></i></a></li>    
        </ul>
    </div>
</form>    
<script>
    $('.fixed-action-btn').hover(function(){
    $('#pluse_ic').toggle();
    });
</script>
</body>
<script>
   
   
    //PIN CODE FORMAT
    $('.pin_code').keyup(function(){
           pin_code();
    });
    function pin_code(){
        $('.prospect_data').each(function() {
        pin = $(this).find('.pin_code').val().replace(/\s/g, '').replace(/(\d{3})(\d{3})/g, '$1 $2');
        $(this).find('.pin_code').val(pin);
    });
    }
    //PIN CODE FORMAT
   
    //Mobile No. Format
    $('.mobile').keyup(function(){
        mobile = $('.mobile').val().replace(/\s/g, '').replace(/(\+)(\d{2})(\d{2})(\d{3})(\d{5})/g, '$1$2 $3 $4 $5');
        $('.mobile').val(mobile)
    });
  //Bank Account Format
    $('.banck_acc').keyup(function(){
        banck_acc = $('.banck_acc').val().replace(/\s/g, '').replace(/(\d{3})/g, '$1 ');
        $('.banck_acc').val(banck_acc)
    });
  //Bank IFSC Format  
    $('.ifsc').keyup(function(){
        ifsc = $('.ifsc').val().replace(/\s/g, '').replace(/([a-zA-Z]{4})(\d{1})(\d{3})(\d{3})/g, '$1 $2 $3 $4');
        $('.ifsc').val(ifsc.toUpperCase())
    });
     $('.pan').keyup(function(){
        pan = $('.pan').val().toUpperCase();
        $('.pan').val(pan)
    });
     $('.exnum').keyup(function(){
        exnum = $('.exnum').val().toUpperCase();
        $('.exnum').val(exnum)
    });
       
     function country(){
            $(".country").autocomplete({
                source: function (request, response) {
                $.ajax({
                    url: "<?php echo base_url(); ?>index.php/users/country_name",
                    data:{term: request.term},
                    dataType: "json",
                    type: "POST",
                    dataFilter: function (data) { return data; },
                    success: function (data) {
                            response($.map(data, function (item) {
                            $(".country").val(item.country_name);
                            $(".mobile").val(item.country_code);
                            return {
                                       label: item.country_name,
                                       value: item.country_name,
                                       id: item.id
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
            }
            function states(){
            $(".states").autocomplete({
            source: function (request, response) {
                $.ajax({
                    url: "<?php echo base_url(); ?>index.php/users/states_name",
                    data:{term: request.term},
                    dataType: "json",
                    type: "POST",
                    dataFilter: function (data) { return data; },
                    success: function (data) {
                    response($.map(data, function (item) { 
                    return {
                                label: item.state_name,
                                value: item.state_name,
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
                }
                  $(".bank_name").autocomplete({
                    source: function (request, response) {
                        $.ajax({
                            url: "<?php echo base_url(); ?>index.php/users/bank_name",
                            data:{term: request.term},
                            dataType: "json",
                            type: "POST",
                            dataFilter: function (data) { return data; },
                            success: function (data) {
                            response($.map(data, function (item) { 
                            return {
                                label: item.bank_name,
                                value: item.bank_name,
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
      $(document).ready(function(){
        $('.plusbtn1').click(function() {
       var $row = $('<tr class="prospect_data"><td style="width:10%"><input type="text" name="address[]" id="address" list="packing" class="address" style="width:100%" rows="2" resize="none" title="Address" placeholder="Address" required="required"></td><td style="width:25%"><textarea name="address1[]" class="address1" style="width:100%" rows="2" title="Address1" placeholder="Address1" required="required"></textarea></td><td style="width:25%"><textarea name="address2[]" class="address2" style="width:100%" rows="2" title="Address2" placeholder="Address2"></textarea></td><td style="width:10%"><textarea name="city[]" class="city" style="width:100%" rows="2" title="City" placeholder="City" required="required"></textarea></td><td style="width:10%"><textarea name="pin[]" class="pin_code" maxlength="6" style="width:100%" rows="2" title="PIN" placeholder="000 000" required="required"></textarea></td><td style="width:10%"><textarea name="state[]" class="states" style="width:100%" rows="2" title="State" placeholder="State" required="required"></textarea></td><td style="width:10%"><textarea name="country[]" class="country" style="width:100%" rows="2" title="Country" placeholder="Country" required="reqired"  ></textarea></td></tr>').insertAfter(".prospect_data:last");
        bind($row);
        });
        function bind($row)
        {
            $row.find('.pin_code').keyup(pin_code);
            $row.find('.states').keyup(states);
            $row.find('.country').keyup(country);
        }
        $('.minusbtn1').click(function() {
	if($(".test tr").length != 2)
        {
            $(".test tr:last-child").remove();
        }
        else
        {
            alert("You cannot delete first row");
        }
    }); 
    });
 $(document).ready(function () {
 states();
 country()
 });
 //validation Accordion
    $("#submit").click(function(){
        var name=$(".name").val();
        var address=$(".address").val();
        var address1=$(".address1").val();
        var address2=$(".address2").val();
        var pin_code=$(".pin_code").val();
        var state=$(".state").val();
        var country=$(".country").val();
        if(name=='')
        {
            alert('Please Check Supplier Detail');
            document.getElementById('acc1').style.backgroundColor = '#e06262';
        } 
        else
        {
            document.getElementById('acc1').style.backgroundColor = '#428bca';
        }
        if(address==''||address1==''||address2==''||pin_code==''||state==''||country==''){
            alert('Please Check Address Detail');
            document.getElementById('acc2').style.backgroundColor = '#e06262';
            }
            else
            {
                document.getElementById('acc2').style.backgroundColor = '#428bca';
            }
        });
</script>
</html>

