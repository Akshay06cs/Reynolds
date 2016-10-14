<?php
class User_model extends CI_Model
{
    private $file = 'files'; 
    function __construct()
    {
        parent:: __construct();
        $this->load->database();
        $this->load->helper('url');
    }
    //supplier deatil
    public function get_all_users()
    {
      	$query = $this->db->query('select * from cust_supp WHERE code="SUPP" OR code="CUSU" order by name');
        return $query->result();
    }
    public function update_info($data,$id)
    {
	$this->db->where('cust_supp.id',$id);
	return $this->db->update('cust_supp',$data);
    }
    public function delete_user($sid)
    {
	$this->db->where('cust_supp.cust_supp_id',$sid);
	return $this->db->delete('cust_supp');
    }
    public function get_country_name($name) {
        $this->db->order_by('country_name',"ASC");
        $this->db->like('country_name',$name);
        return $this->db->get('country_code')->result_array();
    }
    public function get_country_code($id)
    {
        $this->db->where('id',$id);
        return $this->db->get('country_code')->row();  
                
    }
    public function get_states_name($name) {
        $this->db->order_by('state_name',"ASC");
        $this->db->like('state_name',$name);
        return $this->db->get('states_name')->result_array();
    }
     //RCPL Dept
    public function get_rcpl_dept($name) {
        $this->db->order_by('rcpl_dept',"ASC");
        $this->db->like('rcpl_dept',$name);
        return $this->db->get('rcpl_dept')->result_array();
    }
    public function get_bank_name($name) {
        $this->db->order_by('bank_name',"ASC");
        $this->db->like('bank_name',$name);
        return $this->db->get('bank_name')->result_array();
    }
    //customer Details
    public function get_all_customers()
    {
	$query = $this->db->query('select * from cust_supp WHERE code="CUST" OR code="CUSU" order by name');
        return $query->result();
    }
    public function getById1($cid)
    {
	$query = $this->db->get_where('cust_supp',array('id'=>$cid));
	return $query->row_array();
    }
    public function update_info1($data,$cid)
    {
        $this->db->where('cust_supp.id',$cid);
	return $this->db->update('cust_supp',$data);
    }
    public function delete_cust($cid)
    {
	$this->db->where('cust_supp.cust_supp_id',$cid);
        return $this->db->delete('cust_supp');
    }
    //part details
    public function get_all_parts()
    {
        $query = $this->db->get('part');
        return $query->result();
    }
    public function get_part_category($term)
    {
        $this->db->order_by('id','ASC');
        $this->db->like("part_cat",$term);
        return $this->db->get('part_category')->result_array();
    }
    
    public function get_moc($id)
    {
        return $this->db->query("SELECT DISTINCT `part_moc` FROM `part_moc` WHERE `part_category`='$id'")->result_array();
    }   
    public function get_grade($id)
    {
        return $this->db->query("SELECT DISTINCT `part_grade` FROM `part_grade` WHERE `part_category`='$id'")->result_array();
    }
    public function getById3($pid)
    {
   	$query = $this->db->get_where('part',array('pid'=>$pid));
   	return $query->row_array();
    }
    public function delete_part($pid)
    {
	$this->db->where('part.pid',$pid);
	return $this->db->delete('part');
    }
    public function update_part($data,$pid)
    {
	$this->db->where('part.pid',$pid);
	return $this->db->update('part',$data);
    }
    public function getpart($id)
    {
        $this->db->where('pid',$id);
        return $this->db->get('part')->row();  
    }
    //purchase_order
    public function get_supplier()
    {
        $query = $this->db->query('select sname from cust_supp');
        return $query->result();
    }
    public function get_partid()
    {
        $query = $this->db->query('select * from part');
        return $query->result();
    }
    public function getById4($did)
    {
        $query = $this->db->get_where('pur_order',array('did'=>$did));
   	return $query->row_array();
    }
    public function delete_po($did)
    {
        $this->db->where('pur_order.did',$did);
	return $this->db->delete('pur_order');
    }
    //OBN Update Query //
    public function updateOrder_booking($id,$data)
    {
	$this->db->where('obn.obn_no',$id);
	return $this->db->update('obn',$data);
    }
    //PURCHASE ORDERES AUTOCOMPLETE //
    public function purchase()
    {
        $this->db->select('*');
        $this->db->where('status', 'Pending');
        $query = $this->db->get('purchase_order');
        return $query->row();
    }
    function get_supplier_name($term)
    {
        $where = "code='SUPP' OR code='CUSU'";
        $this->db->order_by('name', 'ASC');       
        $this->db->like("name", $term,'both');
        $this->db->where($where);
        return $this->db->get('cust_supp')->result_array();
    }
    function get_supplier_detail($id)
    {
        $this->db->where('cust_supp_id',$id);
        return $this->db->get('cust_supp')->row();  
    }
    public function get_stock_parts($term)
    {
        $query = $this->db->query("SELECT *,CONCAT(description,' ',length,'',length_uom,' ',width,'',width_uom,' ',length_meter,'',length_mtr_uom) As demo FROM stock WHERE description LIKE '%" . $term . "%' AND qty_no>0 limit 8");
        return $query->result_array();
    }
    public function get_parts($term)
    {
        $this->db->order_by('pid', 'ASC');
        $this->db->like("des", $term);
        return $this->db->get('part')->result_array();
    }
    public function get_part_detail($id)
    {
        $this->db->where('pid',$id);
        return $this->db->get('part')->row();  
    }
    public function get_stock_part_detail($id)
    {
         return $this->db->query("SELECT *,CONCAT(length,'',length_uom,' ',width,'',width_uom,' ',length_meter,'',length_mtr_uom) As desc_detail FROM stock WHERE `id`='{$id}'")->row();
       
     
    }
    public function get_work_order($term)
    {
        $this->db->order_by('id', 'ASC');
        $this->db->like("work_order", $term);
        return $this->db->get('extra')->result_array();
    }
    public function get_payment_term($term)
    {
        $this->db->order_by('id', 'ASC');
        $this->db->like("payment_term", $term);
        return $this->db->get('payment_terms')->result_array();
    }
   
    public function get_transporter($term)
    {
        $this->db->order_by('id', 'ASC');
        $this->db->like("transporter", $term);
        return $this->db->get('transporter')->result_array();
    }
    public function get_tpi_name($term)
    {
        $this->db->order_by('tpi_id', 'ASC');
        $this->db->like("tpi_tradename", $term);
        return $this->db->get('tpi_table')->result_array();
    }
    //PURCHASE ORDERES AUTOCOMPLETE //
    //GatePass: AutoComplete //
    function get_employee_name($term)
    {
        $query = $this->db->query("SELECT emp_id, CONCAT(emp_f_name,' ',emp_m_name,' ',emp_l_name) As name FROM employee_detail WHERE (CONCAT(emp_f_name,' ',emp_m_name,' ',emp_l_name) LIKE '%" . $term . "%') limit 5");
        return $query->result_array();
    }
    function get_employee_detail($id,$month,$today)
    {
         $query = $this->db->query("SELECT (SELECT emp_mob FROM employee_detail WHERE emp_id=$id) as mob, (SELECT COUNT(*) FROM gate_pass WHERE emp_id=$id AND month=$month) as c_gate,  (SELECT emp_id FROM employee_detail WHERE emp_id=$id) as empid, (SELECT total_leave_in_year FROM employee_detail WHERE emp_id=$id) as leave_cnt, ((SELECT COUNT(*) FROM gate_pass WHERE emp_id='$id' AND date='$today')+1) as today_gatepass");
    return $query->row();
    }
    
    //AUTOCOMPLETE: Extra work Reasons
    function get_work_reason($term)
    {
        $this->db->like("reasons", $term);
        return $this->db->get('extra_work_reason')->result_array();
    }
    function get_worker_name($term)
    {
        $query = $this->db->query("SELECT id, CONCAT(emp_f_name,' ',emp_m_name,' ',emp_l_name) As name FROM employee_detail WHERE (CONCAT(emp_f_name,' ',emp_m_name,' ',emp_l_name) LIKE '%" . $term . "%' AND job_category='Worker') limit 8");
        return $query->result_array();
    }

    //goods Recipt Note
    public function get_pur_ord($id)
    {
        $this->db->where('order_no',$id);
        return $this->db->get('purchase_order')->row();  
    }
    //Prospects Detail
    public function get_prospects_detail()
    {
        $query = $this->db->query('select * from quotation_detail');
        return $query->result();
    }
    function updateProspects($id,$data)
    {
        $this->db->where('qid', $id);
        $this->db->update('quotation_detail', $data);
    }
    //Check Version if Version matches Update Contets If Version Is Not Matching It will Upgrade The Version
    public function check_version($version,$id)
    {
        $where = "version='$version' AND qid='$id'";
        $this->db->select('version');
        $this->db->from('quotation_detail');
        $this->db->where($where);
        $query = $this->db->get();
        return $query->num_rows();
    }
    public function get_qt_desc($id)
    {
        $this->db->where('qid',$id);
        return $this->db->get('quotation_description_detail')->row();
    }
    function get_cust_name($name)//get the customer name
    {
      $where = "code='CUST' OR code='CUSU'";
      $this->db->order_by('cust_supp_id',"ASC");
      $this->db->like('name',$name);
      $this->db->where($where);
      return $this->db->get('cust_supp')->result_array();
    }
    function get_supp_credentials($id)//get the supplier credentials
    {
        return $this->db->query("SELECT `fname`,`lastname`,`mob`,'cust_supp_id' FROM `supp_cust_contact_persons` WHERE `cust_supp_id`='{$id}'")->result_array();
    }
    function get_cust_credentials($id){
        $this->db->where('cust_supp_id',$id);
        return $this->db->get('cust_supp_address')->row();
    }
    function get_supp_mobile($term)//get the mobile number for selected supplier
    {
         return $this->db->query("SELECT `mob`,dept FROM `supp_cust_contact_persons` WHERE CONCAT(fname,' ',lastname) LIKE '%" . $term . "%'")->row();
       
    }
    function get_supp_address($id)
    {
          return $this->db->query("SELECT * FROM `cust_supp_address` WHERE `cust_supp_id`='{$id}'")->result_array();
    }
    function get_supp_address_detail($id)//get the mobile number for selected supplier
    {
        $this->db->where('id',$id);
        return $this->db->get('cust_supp_address')->row();  
    }
    public function get_all_grn()
    {
        $query = $this->db->get('goods_reciept');
	return $query->result();
    }
    public function getById5($gid)
    {
        $query = $this->db->get_where('grn',array('gid'=>$gid));
   	return $query->row_array();
    }
    public function delete_grn($gid)
    {
	$this->db->where('grn.gid',$gid);
	return $this->db->delete('grn');
    }
    //Insert Data Into part Table with Image 
    function add_image($data)
    {
        $this->db->insert('part',$data);
    }
    //Insert Data Into emp Table with Image 
    function add_emp($data)
    {
        $this->db->insert('employee_detail',$data);
    }
    
 // advance payment against salary/wages
    function get_previous_loan($name)
    {
        return $this->db->query("SELECT `ld_date`,`ld_loan_taken` FROM `loan_detail` WHERE ld_emp_name='$name' ")->row();
    }
    function get_emp_detail($id)
    {
        //return $this->db->query("SELECT `emp_mob`,`emp_id` FROM `employee_detail` WHERE CONCAT(emp_f_name,' ',emp_m_name,' ',emp_l_name)LIKE '%".$name."%' UNION ALL SELECT `ld_date`,`ld_loan_taken` AS ld_detail FROM `loan_detail` WHERE CONCAT(ld_emp_fname,' ',ld_emp_mname,' ',ld_emp_lname) LIKE '%" . $name . "%'")->result_array();
        //return $this->db->query("SELECT `emp_mob` AS `mob` FROM `employee_detail` WHERE id='.$name.' UNION ALL SELECT `ld_date` AS `date` FROM `loan_detail` WHERE id='.$name.'")->result();
        //id=$id;
        //return $this->db->query("SELECT l.ld_date, l.ld_loan_taken, e1.emp_mob, e1.job_category FROM loan_detail l CROSS JOIN employee_detail e1 WHERE l.id='$id' AND e1.id='$id'")->result_array();
        
        return $this->db->query("SELECT ld_date,ld_loan_taken as source FROM loan_detail WHERE id='$id'
        UNION ALL
        SELECT emp_mob,job_category as source FROM employee_detail WHERE id='$id'")->result_array();   
         
    }
    
    //get the recent ld_id of the employee
    
    public function get_check_id($id)
    {
        return $this->db->query("SELECT `id` FROM `loan_detail` WHERE id=$id")->row();
    }


    public function get_max_id($id)
    {
        return $this->db->query("SELECT MAX(`ld_id`) AS max_id FROM `loan_detail` WHERE `id`=$id")->row();
    }
    
    public function get_prev_details($id)
    {
        
        return $this->db->query("SELECT `ld_activity`,`balance`,`ld_deposit_amt`,`ld_date`,`ld_deposit_date` FROM `loan_detail` WHERE `id`={$id} ORDER BY `ld_id` DESC LIMIT 1")->row();
               
    }
    
    public function get_loan_details($id)
    {
        return $this->db->query("SELECT * FROM `loan_detail` WHERE `id`='$id'")->result_array();
    }
    
    public function get_employee_balance($id,$max_id)
    {
        return $this->db->query("SELECT `balance` FROM `loan_detail` WHERE `id`=$id AND ld_id={$max_id->max_id}")->row();
    }
    public function get_adv_prev_details($id)
    {
        return $this->db->query("SELECT `ad_adv_date`,`ad_balance` FROM `adv_pmt_details` WHERE `ad_emp_id`='$id' ORDER BY `ad_id` DESC LIMIT 1")->row();
        
    }
    public function get_attnd($id)
    {
        return $this->db->query("SELECT `att_attend` FROM `att_dummy` WHERE `att_emp_id`=$id")->row();
    }
    public function get_adv_pmt_details($id)
    {
        return $this->db->query("SELECT * FROM `adv_pmt_details` WHERE `ad_emp_id`='$id'")->result_array();
    }
    function quip_cate($name)
    {
        $this->db->order_by('id',"ASC");
        $this->db->like('equip_cat',$name);
        return $this->db->get('rcpl_products_category')->result_array();
    }
    function quip_name($name)
    {
        $this->db->order_by('equip_id',"ASC");
        $this->db->like('equip_desc',$name);
        return $this->db->get('rcpl_products')->result_array();
    }
}
?>