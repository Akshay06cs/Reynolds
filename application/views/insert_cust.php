<html>
<head>
        <title>Reynolds:Add Customer</title>
        <script type="text/javascript" src="<?php echo base_url("assets/js/jquery-1.11.3.min.js");?>"></script>
        <script type="text/javascript" src="<?php echo base_url("assets/js/bootstrap.js");?>"></script>
        <script language="javascript" src="<?php echo base_url("assets/js/jquery-1.4.4.min.js");?>"></script>
        <link rel='stylesheet' type='text/css' href="<?php echo base_url("assets/css/bootstrap.min.css");?>" /> 
</head>
<body>
         <div class = "jumbotron">       
            <div class = "container">
            <h2>Enter Customer Details</h2>
            <form>       
                <div class="row">
                    <div class="col-md-3">
                        <b>Customer Name:</b><br><input type="text" name="cname" class="form-control" id="cname"/> <br> 
                        <b>Nick Name:</b><br><input type="text" name="alternate" class="form-control" id="alternate"/> <br> 
                        <b>Office Address:</b><br><textarea  class="form-control" id="addr"></textarea><br>
                        <b>Factory Address:</b><br><textarea  class="form-control" id="faddr"></textarea><br>
                        <b>City:</b><br><input type="text" class="form-control" id="city"/><br>
                        <b>State:</b><br><input type="text"  class="form-control" id="state"/><br>
                        <b>Country:</b><br>
                        <select name = "country" name="country" class="form-control" id="country">
                                <option>India</option>
                                <option>USA</option>
                                <option>Brazil</option>
                        </select><br>
                        <b>Pincode:</b><br><input type="text"  class="form-control" id="pin"/><br>
                        <b>Phone:</b><br><input type="text" name="ph" class="form-control" id="ph"/><br>
                        <b>Fax:</b><br><input type="text" name="fax" class="form-control" id="fax"/><br>
                        <b>Email:</b><br><input type="text" name="email" class="form-control" id="email"/><br>
                        <b>Pan No.:</b><br><input type="text" name="pan" class="form-control" id="pan"/><br>
</div>
<div class="col-md-3">
        <b>Url:</b><br><input type="text"  class="form-control" id="url"/><br>
        <b>Service Tax Registration No.</b><br><input type="text" name="sertaxnum" class="form-control" id="sertaxnum"/><br>
        <b>Central Excise Reg. No.:</b><br><input type="text" name="exnum" class="form-control" id="exnum"/><br>
        <b>Vat Regn. No.(TIN):</b><br><input type="text" name="tin" class="form-control" id="tin"/><br>
        <b>LBT Regn. No.:</b><br><input type="text" name="lbt_no" class="form-control" id="lbt_no"/><br>
        <b>SSI Customer:</b><br><input type="text" name="ssi_cust" class="form-control" id="ssi_cust"/><br> 
        <b>SSI Regn. No.:</b><br><input type="text" name="ssi_no" class="form-control" id="ssi_no"/><br>
        <b>Cin No.:</b><br><input type="text" name="cin" class="form-control" id="cin"/><br>
        <b>Customer Bank Name:</b><br><input type="text" name="cust_bank" class="form-control" id="cust_bank"/><br>
        <b>Bank Address:</b><br><input type="text" name="bank_addr" class="form-control" id="bank_addr"/><br>
        <b>Bank Account No.:</b><br><input type="text" name="acc_num" class="form-control" id="acc_num"/><br>
        <b>IFSC Code:</b><br><input type="text" name="ifsc_code" class="form-control" id="ifsc_code"/></br>
        <input type="button" id="add" value="Save Customer" class="btn btn-success btn-md" />
</div>
     <div class="col-md-4">
         </div>
            </div>
                </form>
                     </div>      
                         </div>  
     
</body>
<script>
     $("#add").click(function(){
         location.reload();
        var cname = $('#cname').val();
        var alternate = $('#alternate').val();
        var addr = $('#addr').val();
        var faddr = $('#faddr').val();
        var city = $('#city').val();
        var state = $('#state').val();
        var country = $('#country').val();
        var pin = $('#pin').val();
        var ph = $('#ph').val();
        var fax = $('#fax').val();
        var email = $('#email').val();
        var pan = $('#pan').val();
        var tin = $('#tin').val();
        var url = $('#url').val();
        var sertaxnum = $('#sertaxnum').val();
        var exnum = $('#exnum').val(); 
        var lbt_no = $('#lbt_no').val();
        var ssi_cust = $('#ssi_cust').val();
        var ssi_no = $('#ssi_no').val();
        var cin = $('#cin').val();
        var cust_bank = $('#cust_bank').val();
        var bank_addr = $('#bank_addr').val();
        var acc_num = $('#acc_num').val();
        var ifsc_code = $('#ifsc_code').val();
           

        $.ajax({
            url: "<?php echo base_url(); ?>index.php/users/insert_cust_db",
            type: 'POST',
           data: { 'cname': cname,'alternate':alternate,'addr': addr,'faddr': faddr, 'city': city, 'state': state, 'country': country, 'pin': pin, 'ph': ph, 'fax':fax,'sertaxnum': sertaxnum, 'email': email,'pan':pan,'tin':tin,'url':url,'exnum': exnum,'lbt_no':lbt_no,'ssi_no': ssi_no, 'ssi_cust': ssi_cust,'cin': cin, 'cust_bank':cust_bank,'acc_num':acc_num, 'ifsc_code':ifsc_code,'bank_addr':bank_addr },
            dataType:"json",
            success: function() {
                window.location.href = "<?php echo base_url(); ?>index.php/users/cust_detail"; 
            },
        });
    });
    
    </script>
</html>