<html>
    <head>
        <title>Reynolds Chemequip Pvt. Ltd</title>
        <link rel='stylesheet' type='text/css' href="<?php echo base_url("assets/css/bootstrap.min.css");?>" /> 
        <script type='text/javascript' src="<?php echo base_url("assets/js/jquery-1.3.2.min.js");?>" ></script>
    <script language="javascript" src="<?php echo base_url("assets/js/jquery-1.4.4.min.js");?>"></script>
    </head>
    <body>
        <div class="container">
            <h1>Order Booking Note</h1>
                <div class="row">
                    <div class="col-md-6">
                        <form>
                            <b>Order Booking No.:</b><input type="text" name="obn" class="form-control"/>
                           
                            <b>Customer Name:</b><input type="text" name="cname" class="form-control"/>
                           
                    </div>
                <div class="col-md-6">
                     <b>Purchase Order No.:</b><input type="text" name="po" class="form-control"/>
                     <b>Date:</b><input type="date" name="odate" class="form-control"/><br>
            </div>
        </div>
             <hr>
            
          
               
            <h3>Work Description</h3>
            <table class="table table-condensed table-bordered">
                <thead>
                <tr>
                    <th>Si No.</th>
                    <th>Description</th>
                    <th>Quantity</th>
                    <th>W/O No.</th>
                    <th>Rate</th>
                    <th>Price</th>
                    <th>Delivery Date</th>
                    <th><input type="button" class="addrow" value="AddRow" ></th>
                </tr>
                </thead>
                <tbody id="body">
                <tr class="item-row">
                    <th>1</th>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="date" class="form-control"></td>
                </tr>
                 </tbody>
                <tr>
                    <th colspan="5" style="text-align:right;">Total Cost</th>
                    <td colspan="2" style="text-align:right;"><input type="text" class="form-control"></td>
                </tr>   
            </table><hr>
            <div class="row">
                <div class="col-md-12">
                    <b>Inspection By Nature:</b><input type="text" name="insp"  class="form-control">
                    <b>Payment Terms:</b><input type="text" name="payment"  class="form-control">
                    <b>Advanced Received:</b><input type="text" name="advanced"  class="form-control">
                </div>
            </div><hr>
            <h3>Dispatch Instructions</h3>
                <div class="row">
                    <div class="col-md-6">
                        <b>Destination:</b><input type="text" name="dest"  class="form-control">
                        <b>Transporter:</b><input type="text" name="trans"  class="form-control">
                        <b>Consigner (Party/Self/Third Party):</b><input type="text" name="cons"  class="form-control">
                        <b>Address of Party:</b><textarea name="paddr" class="form-control"></textarea>
                        <b>Any Road Permit Required:</b><input type="text" name="permit"  class="form-control">
                        
                    </div>
                    <div class="col-md-6">
                        <b>Basis(Door/Godown):</b><input type="text" name="basis"  class="form-control">
                        <b>Freight(Paid/To Pay):</b><input type="text" name="fre"  class="form-control">
                    </div>
                </div> <hr>
                <h3>Billing Instruction</h3>
                <div class="row">
                    <div class="col-md-12">
                        <b>P&F Charges:</b><input type="text" name="pf"  class="form-control">
                        <b>Wheather Form C will be Given:</b><input type="text" name="c"  class="form-control">
                        <b>Customer CST/ST/Tin No.:</b><input type="text" name="ccst"  class="form-control">
                        <b>Customer ECC No.:</b><input type="text" name="cess"  class="form-control">
                        <b>Third Part CST/ST/Tin No.:</b><input type="text" name="ttin"  class="form-control">
                        <b>To Whom Should Original Bill Go :</b><input type="text" name="ori"  class="form-control">
                        <b>To Whom Should Bill Copies:</b><input type="text" name="copy"  class="form-control">
                        <b>Note:</b><textarea name="note" class="form-control"></textarea>
                        <b>Drawing No.:</b><input type="text" name="draw"  class="form-control">
                    </div>
                </div>
            </form>
        </div>
    </body>
    <script>
     $(function () {
            
              $('.addrow').click(function(){
               addrow();
              });
              
              $('.delete').live('click',function(){
                 parent.fadeOut('slow', function() {$(this).remove();});
              });
               function addrow(){
                var row = ($('#body tr').length-0)+1;  
                var tr = '<tr class="item-row">' +
                            '<th>'+row+'</th>'+
                            '<td><input type="text" name="pid[]" class="form-control" /></td>' +
                             '<td><input type="text" name="pname[]" class="form-control" /></td>' +
                             '<td><input type="text" name="des[]" class="form-control"/></td>' +
                             '<td><input type="text" name="uom[]" class="form-control"/></td>' +
                             '<td><input type="text" name="cost[]" class="form-control"/></td>' +
                             '<td><input type="date" name="qty[]" class="form-control"/></td>' +
                             '<td><a href="#">X</a> </td>' +
                             '</tr>';
                           
                    $('#body').append(tr);
                     }
        });
        $(".delete").live('click',function(){
            $(this).parents('.item-row').remove();
            update_total();
            if ($(".delete").length < 2) $(".delete").hide();
            });
    </script>
</html>