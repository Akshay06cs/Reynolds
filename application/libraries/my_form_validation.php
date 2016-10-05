<?php if (!defined('BASEPATH'))exit('No direct script access allowed');
class my_form_validation extends CI_Form_validation{
    function alpha_extra($str){
        $this->CI->form_validation->set_message('alpha_extra','The %s may only contain alpha_numericcharacters spaces,periods,underscores &dashes.');
        return(!preg_match("/^([\.\s-a-z0-9_-])+$/i",$str))?FALSE:TRUE;
    }
}