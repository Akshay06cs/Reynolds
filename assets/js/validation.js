 
    
    function isNumberKey(evt)
    {        
        var charCode = (evt.which) ? evt.which : evt.keyCode;
        if (charCode != 46 && charCode > 31 
        && (charCode < 48 || charCode > 57))
        return false;
        return true;
    }
    // Validate PAN 
    function ValidatePAN(Obj) {    
            if (Obj.value != "") {
            ObjVal = Obj.value;
            var panPat = /^([a-zA-Z]{5})(\d{4})([a-zA-Z]{1})$/;
            if (ObjVal.search(panPat) == -1) {
                alert("Invalid Pan No.");
                Obj.focus();
                return false;
            }
        }
    }
    //Validate Excise No.
     function ValidateEX(Obj) {    
            if (Obj.value != "") {
            ObjVal = Obj.value;
            var panPat = /^([a-zA-Z]{5})(\d{4})([a-zA-Z]{3})(\d{3})$/;
            if (ObjVal.search(panPat) == -1) {
                alert("Invalid Excise No.");
                Obj.focus();
                return false;
            }
        }
    } 
    //Validate IFSC Code
    function ValidateIFSC(Obj) {    
            if (Obj.value != "") {
            ObjVal = Obj.value;
            var panPat = /^([a-zA-Z]{4}) (\d{1}) (\d{3}) (\d{3})$/;
            if (ObjVal.search(panPat) == -1) {
                alert("Invalid IFSC No.");
                Obj.focus();
                return false;
            }
        }
    } 
    //Validate DL No
     function ValidateDl(Obj) {    
            if (Obj.value != "") {
            ObjVal = Obj.value;
            var panPat = /^([a-zA-Z]{2})(\d{2}) (\d{11})$/;
            if (ObjVal.search(panPat) == -1) {
                alert("Invalid Driving Licence");
                Obj.focus();
                return false;
            }
        }
    } 
    
                
               
   
    