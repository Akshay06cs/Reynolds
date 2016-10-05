<?php
if(!defined('BASEPATH'))
exit('No direct access Allowed');
class Users extends CI_Controller
    {
	function __construct()
        {
            parent::__construct();
           
            $this->load->helper('url','form');
            $this->load->model('User_model','file');
            $this->load->model('User_model');	
            $this->load->model('M_login');
            $this->load->library(array('form_validation','session'));
            $this->load->library('Datatables');
            $this->load->library('table');
            if($this->session->userdata('isLogin') == FALSE)
            {
                redirect('Login/login_form');
            }
	}
        public function onlineUsers()
        {
            //This Code is Use For online User //
            $today = date("Y-m-d");
            $data['onlineUser']=$this->db->query("select username ,f_name,l_name,max(time_stmp) as time from user_online Where sess_date='$today' group by username")->result();
            $this->load->view('onlineUser',$data);
        }
        public function change_pwd(){
        
            $id = $this->input->post('id');  
            $newpassword = $this->input->post('npassword'); 
            $oldpassword = $this->input->post('opassword'); 
            $cek = $this->M_login->change_pwd($id,  $newpassword, $oldpassword);
            $user = $this->session->userdata('username');
            $data['level'] = $this->session->userdata('level');
            $data['user'] = $this->M_login->userData($user);
            $data['r']=$this->db->query("SELECT *FROM purchase_order WHERE status='Pending'");
            $data['request']=$this->db->query("SELECT *FROM gate_pass WHERE status='Request'");
            $data['grn_request']=$this->db->query("SELECT *FROM gate_pass WHERE status='Request'");
            if($user == 'admin')
            {
                $data['activity']=$this->db->query("SELECT *FROM user_activities ORDER BY session_id DESC");
            }
            else
            {
                $data['activity']=$this->db->query("SELECT *FROM user_activities WHERE username = '$user' ORDER BY session_id DESC");
            }
            $data['advpaypend']=$this->db->query("SELECT * FROM `adv_pmt` WHERE `adv_status`='Request'");
            $data['count_po']=$data['r']->num_rows();
            $data['count_gp']=$data['request']->num_rows();
            $data['advpend']=$this->db->query("SELECT * FROM `loan` WHERE `l_status`='Request'");
            $data['count_adv']=$data['advpend']->num_rows();
            $user_da = $this->session->userdata('username')." Changed Password";
            $this->activity($user_da);
            $this->load->view('menu', $data);
        }
        public function Innvoice_pdf($id)
        {   
            $data['r']=$this->db->query("SELECT * FROM purchase_order where order_no ='$id'")->row();
            $this->load->helper('pdfexport');
            $this->db->query("UPDATE purchase_order SET status = 'Approved' WHERE order_no='{$id}'"); 
            $fileName = "PO-".$id."_".date('YmdHis') ;
            $pdfView  = $this->load->view('po_pdf', $data, TRUE); // we need to use a view as PDF content 
            $cssView  = $this->load->view('style1.css', NULL, TRUE);
            exportMeAsMPDF($fileName, $pdfView,$cssView,'P'); // then define the content and filename
            //Main Menu Call From View
        }      
        public function prospects_pdf($id,$qt_no,$customer,$version)
        {   
            $data['r']=$this->db->query("SELECT * FROM quotation_detail where qid ='$id'")->row();
             $this->load->helper('pdfexport');
            $fileName = "Offer No-".$qt_no."_".$customer."_".$version;
            $pdfView  = $this->load->view('prospects_pdf', $data, TRUE); // we need to use a view as PDF content 
            $cssView  = $this->load->view('style1.css', NULL, TRUE);
            exportMeAsMPDF($fileName, $pdfView,$cssView,'P'); // then define the content and filename
            $this->update_prospects_stauts($id);
          
          
            //Main Menu Call From View
        }
        public function prospects_condtion($id)
        {   
            $data['r']=$this->db->query("SELECT * FROM quotation_detail where qid ='$id'")->row();
            $this->load->view('prospects_offer', $data); // we need to use a view as PDF content 
            $this->load->view('style1.css', NULL, TRUE);
            //Main Menu Call From View
        }
        public function update_prospects_stauts($id)
        {
            $status ="Offered";
            $this->db->query("UPDATE quotation_detail SET status = '{$status}' WHERE qid='{$id}'"); 
        }
        function activity($user_da)
        {
            $this->load->helper('date');
            date_default_timezone_set('Asia/Calcutta');
            if (!empty($_SERVER['HTTP_CLIENT_IP'])){
            $ip=$_SERVER['HTTP_CLIENT_IP'];
            //Is it a proxy address
            }elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
            $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
            }else{
            $ip=$_SERVER['REMOTE_ADDR'];
            }
            //The value of $ip at this point would look something like: "192.0.34.166"
            //$ip = ip2long($ip);
            $data_activity = array(
                'ip_address'=>$ip,
                'username'=>$this->session->userdata('username'),
                'f_name'=>$this->session->userdata('f_name'),
                'l_name'=>$this->session->userdata('l_name'),
                'time_stmp'=>date("h:i"),
                'am_pm'=>date("a"),
                'sess_date'=>date("Y-m-d"),
                'user_data'=>$user_da
            );
            $this->db->insert('user_activities',$data_activity);        
        }
	public function index()
        {
            //This Code is Use For online User Detection
            $today = date("Y-m-d");
            $data['onlineUser']=$this->db->query("select username ,f_name,l_name,max(time_stmp) as time from user_online Where sess_date='$today' group by username")->result();
            $user = $this->session->userdata('username');
            $data['level'] = $this->session->userdata('level');
            $data['user'] = $this->M_login->userData($user);
            $data['r']=$this->db->query("SELECT *FROM purchase_order WHERE status='Pending'");
            $data['request']=$this->db->query("SELECT *FROM gate_pass WHERE status='Request'");
            if($user == 'admin'){
                $data['activity']=$this->db->query("SELECT *FROM user_activities ORDER BY session_id DESC");
            }
            else
            {
                $data['activity']=$this->db->query("SELECT *FROM user_activities WHERE username = '$user' ORDER BY session_id DESC");
            }
            $data['advpaypend']=$this->db->query("SELECT * FROM `adv_pmt` WHERE `adv_status`='Request'");
            $data['count_advpay']=$data['advpaypend']->num_rows();
            $data['count_po']=$data['r']->num_rows();
            $data['count_gp']=$data['request']->num_rows();
            $data['advpend']=$this->db->query("SELECT * FROM `loan` WHERE `l_status`='Request'");
            $data['count_adv']=$data['advpend']->num_rows();
            $this->load->view('menu', $data);
        }
        //Supplier Detail
	public function sup_detail()
        {
	    $data['user_list'] = $this->User_model->get_all_users();
            $this->load->view('header');
	    $this->load->view('show_users',$data);
        }
        //Add New Supplier Detail To Database
        public function add_form()
	{
	    $this->load->view('header');
            $this->load->view('insert');
            $this->load->view('footer');
	}
        //Country Name Autocomplete
        public function country_name()
        {
            $term = $this->input->POST('term', TRUE);
            $supplier_names = $this->User_model->get_country_name($term);
            echo json_encode($supplier_names);
        }
        public function states_name()
        {
            $term = $this->input->POST('term', TRUE);
            $supplier_names = $this->User_model->get_states_name($term);
            echo json_encode($supplier_names);
        }
        //RCPL Department Names
        public function rcpl_dept()
        {
            $term = $this->input->POST('term', TRUE);
            $rcpl_dept = $this->User_model->get_rcpl_dept($term);
            echo json_encode($rcpl_dept);
        }
        public function bank_name()
        {
            $term = $this->input->POST('term', TRUE);
            $bank_name = $this->User_model->get_bank_name($term);
            echo json_encode($bank_name);
        }
        public function get_country_code()
        {
        $id =$this->input->post('id');
        $data=$this->User_model->get_country_code($id);
        echo json_encode($data);
        }
        //Edit Supplire Detail
        public function edit()
        {
            $id = $this->uri->segment(3);
            $data['r']=$this->db->query("SELECT * FROM cust_supp where cust_supp_id ='$id'")->row();
            $data['bank']=$this->db->query("SELECT * FROM bank_detail where cust_supp_id ='$id'")->row();
            $this->load->view('edit',$data);
	}
        //Store Data From View to Database
	public function insert_user_db()
	{  
            $inputall = $this->input->post(); 
            $data = array
            (
                'code' =>$inputall['code'],
                'name' =>$inputall['sname'],
                'nick_name' =>$inputall['nick_name'],
                'mob'=>$inputall['mob'],
                'ph' =>$inputall['ph'],
                'fax' =>$inputall['fax'],
                'email' =>$inputall['email'],
                'pan' =>$inputall['pan'],
                'tin' =>$inputall['tin'],
                'sertaxnum' =>$inputall['sertaxnum'],
                'exnum' =>$inputall['exnum'],
                'cin' =>$inputall['cin_no']                
            );
            $this->db->insert('cust_supp',$data);
            $id = $this->db->insert_id();
            
            for($i = 0;$i<count($inputall['address']);$i++)
            {
                $data_address=array
                (
                   'cust_supp_id'=>$id,
                    'address' =>$inputall['address'][$i],
                    'address1' =>$inputall['address1'][$i],
                    'address2' =>$inputall['address2'][$i],
                    'city' =>$inputall['city'][$i],
                    'state' =>$inputall['state'][$i],
                    'country' =>$inputall['country'][$i],
                    'pin' =>$inputall['pin'][$i]
                );
                $this->db->insert('cust_supp_address',$data_address);
              
            }
            $data_bank = array
            (
                'cust_supp_id'=>$id,
                'code' =>$inputall['code'],
                'bank_name' =>$inputall['ven_bank'],
                'acc_num' =>$inputall['acc_num'],
                'ifsc_code' =>$inputall['ifsc_code'],
                'bank_branch' =>$inputall['bank_branch'],
                'bank_city' =>$inputall['bank_city']
            );
            $this->db->insert('bank_detail',$data_bank);
            
            
            if($inputall['code']=='SUPP'||$inputall['code']=='CUSU'){
            $user_da = $this->session->userdata('username')." Added New Supplier";
            $this->activity($user_da);
            header('location:'.base_url()."index.php/users/sup_detail");
            }else{
            $user_da = $this->session->userdata('username')." Added New Customer";  
            $this->activity($user_da);
            header('location:'.base_url()."index.php/users/cust_detail");
            }
	}
        public function update()
	{
	    $id =$this->input->post('id'); 
            $inputall = $this->input->post(); 
            $data = array
            (
                'code' =>$inputall['code'],
                'name' =>$inputall['sname'],
                'nick_name' =>$inputall['nick_name'],
                'ph' =>$inputall['ph'],
                'mob'=>$inputall['mob'],
                'fax' =>$inputall['fax'],
                'email' =>$inputall['email'],
                'pan' =>$inputall['pan'],
                'tin' =>$inputall['tin'],
                'sertaxnum' =>$inputall['sertaxnum'],
                'exnum' =>$inputall['exnum'],
                'cin' =>$inputall['cin_no']                
            );
            $this->db->where('cust_supp_id',$id);
            $this->db->update('cust_supp',$data);
            $this->db->query("DELETE FROM cust_supp_address WHERE cust_supp_id='{$id}'");
            for($i = 0;$i<count($inputall['address']);$i++)
            {
                $data_address=array
                (
                   'cust_supp_id'=>$id,
                    'address' =>$inputall['address'][$i],
                    'address1' =>$inputall['address1'][$i],
                    'address2' =>$inputall['address2'][$i],
                    'city' =>$inputall['city'][$i],
                    'state' =>$inputall['state'][$i],
                    'country' =>$inputall['country'][$i],
                    'pin' =>$inputall['pin'][$i]
                );
            $this->db->insert('cust_supp_address',$data_address);
            }
            $data_bank = array
            (
                'cust_supp_id'=>$id,
                'code' =>$inputall['code'],
                'bank_name' =>$inputall['ven_bank'],
                'acc_num' =>$inputall['acc_num'],
                'ifsc_code' =>$inputall['ifsc_code'],
                'bank_branch' =>$inputall['bank_branch'],
                'bank_city' =>$inputall['bank_city']
            );
          
            $this->db->where('id',$id);
            $this->db->update('bank_detail',$data_bank);
             
            if($inputall['code']=='SUPP'||$inputall['code']=='CUSU'){
            $user_da = $this->session->userdata('username')." Updated Supplier";
            $this->activity($user_da);
            header('location:'.base_url()."index.php/users/sup_detail");
            }else{
            $user_da = $this->session->userdata('username')." Updated Customer";   
            $this->activity($user_da);
            header('location:'.base_url()."index.php/users/cust_detail");
            }
        }
        public function view()
        {
            $id = $this->uri->segment(3);
            $data['r']=$this->db->query("SELECT * FROM cust_supp where cust_supp_id ='$id'")->row();
            $data['bank']=$this->db->query("SELECT * FROM bank_detail where cust_supp_id ='$id'")->row();
            $this->load->view('header');
            $this->load->view('sup_detail',$data);
            $this->load->view('footer');
        }
        //Delete Supplier Record From Database
        public function del_sup($sid)
        {
            $this->User_model->delete_user($sid);
            header('location:'.base_url()."index.php/users/sup_detail");
            $user_da = $this->session->userdata('username')." Deletetd Supplier";
            $this->activity($user_da);
        }
    //add Supplier contact person detail
        public function add_supp_contcts()
        {
            $sid = $this->input->post('sid'); 
            $inputall = $this->input->post(); 
            $data = array
            (
                'cust_supp_id' =>$sid,
                'code' =>$inputall['code'],
                'fname' =>$inputall['fname'],
                'lastname' =>$inputall['lastname'],
                'dept' =>$inputall['dept'],
                'mob' =>$inputall['mob'],
                'supp_mail' =>$inputall['supp_mail']
            );
        $this->db->insert('supp_cust_contact_persons',$data);
        $user_da = $this->session->userdata('username')." Added Supplier Contact";
        $this->activity($user_da);
        header('location:'.base_url()."index.php/users/view/$sid");
    }
    //delete Contact person from db
    public function delete_cnt($id)
    {
        $this->db->query("DELETE FROM supp_cust_contact_persons WHERE id='{$id}'");
        $user_da = $this->session->userdata('username')." Deleted Supplier Contact";
        $this->activity($user_da);
        header('location:'.base_url()."index.php/users/sup_detail");
    }
    //Display Customer Records
    public function cust_detail()
    {
	$data['user_list'] = $this->User_model->get_all_customers();
        $this->load->view('header');
	$this->load->view('cus_show',$data);
        $this->load->view('footer');	
    }
    //Add New Customer To Database
    public function edit1()
    {
            $id = $this->uri->segment(3);
            $data['r']=$this->db->query("SELECT * FROM cust_supp where cust_supp_id ='$id'")->row();
            $data['bank']=$this->db->query("SELECT * FROM bank_detail where cust_supp_id ='$id'")->row();
            $this->load->view('edit_cust',$data);
    }
    //View More Information About Customer
    public function view1()
    {
        $id = $this->uri->segment(3);
        $data['r']=$this->db->query("SELECT * FROM cust_supp where cust_supp_id ='$id'")->row();
        $data['bank']=$this->db->query("SELECT * FROM bank_detail where cust_supp_id ='$id'")->row();
        $this->load->view('header');
        $this->load->view('cust_detail',$data);
        $this->load->view('footer');
    }
    public function del_cust($cid)
    {
        $this->User_model->delete_cust($cid);
        $user_da = $this->session->userdata('username')." Deleted Customer";
        $this->activity($user_da);
        header('location:'.base_url()."index.php/users/cust_detail");
    }
    //customer contact person detail
    public function add_cust_contcts()
    {
        $sid = $this->input->post('sid'); 
        $inputall = $this->input->post(); 
        $data = array
        (
            'sid' =>$sid,
            'code' =>$inputall['code'],
            'fname' =>$inputall['fname'],
            'lastname' =>$inputall['lastname'],
            'dept' =>$inputall['dept'],
            'mob' =>$inputall['mob'],
            'supp_mail' =>$inputall['supp_mail']
        );
        $this->db->insert('supplier_contacts',$data);
        $user_da = $this->session->userdata('username')." Added Customer Contact";
        $this->activity($user_da);
        header('location:'.base_url()."index.php/users/view1/$sid");
    }
    public function delete_cnt_cust($id)
    {
        $this->db->query("DELETE FROM supp_cust_contact_persons WHERE id='{$id}'");
        $user_da = $this->session->userdata('username')." Deleted Customer Contact";
        $this->activity($user_da);
        header('location:'.base_url()."index.php/users/cust_detail");
    }
    //Part Details
    public function add_part()
    {
        $this->load->view('header');
        $this->load->view('part/insert_part');
        $this->load->view('footer');
    }
     //Insert Part Into Database With Drawing
    function insert_part_db()
    {
            $id =$this->input->post('id'); 
            $inputall=$this->input->POST();
            $data=array(  
            'category'=>$inputall['category'],
            'moc'=>$inputall['moc'],
            'sub_moc'=>$inputall['sub_moc'],
            'grade'=>$inputall['grade'],
            'type'=>$inputall['type'],
            'thickness'=>$inputall['thickness'],
            'thickness_uom'=>$inputall['thickness_uom'],
            'size'=>$inputall['size'],
            'size_uom'=>$inputall['size_uom'],
            'length'=>$inputall['length'],
            'length_uom'=>$inputall['length_uom'],
            'pass'=>$inputall['pass'],
            'cuts'=>$inputall['cuts'],
            'holes'=>$inputall['holes'],
            'density'=>$inputall['density'],
            'outer_diameter'=>$inputall['outer_diameter'],
            'od_uom'=>$inputall['od_uom'],
            'bwg'=>$inputall['bwg'],
            'bwg_uom'=>$inputall['bwg_uom'],
            'schedule'=>$inputall['schedule'],
            'radius'=>$inputall['radius'],
            'degree'=>$inputall['degree'],
            'pattern_no'=>$inputall['pattern_no'],
            'rating'=>$inputall['rating'],
            'threading'=>$inputall['threading'],
            'threading_uom'=>$inputall['threading_uom'],
            'uom'=>$inputall['uom'],
            'des'=>$inputall['des'],
            );
            $this->db->insert('part',$data);
            $user_da = $this->session->userdata('username')." Added New Part";
            $this->activity($user_da);
            header('location:'.base_url()."index.php/users/part_detail");
    }
    // Edit Part Detail
    public function edit_part($id)
    {
        $data['r']=$this->db->query("SELECT * FROM part where pid ='$id'")->row();
      	$this->load->view('edit_part',$data);
    }
    public function update_part()
    {
            $id =$this->input->post('pid'); 
            $inputall=$this->input->POST();
            $data=array(  
            'category'=>$inputall['category'],
            'moc'=>$inputall['moc'],
            'sub_moc'=>$inputall['sub_moc'],
            'grade'=>$inputall['grade'],
            'type'=>$inputall['type'],
            'thickness'=>$inputall['thickness'],
            'thickness_uom'=>$inputall['thickness_uom'],
            'size'=>$inputall['size'],
            'size_uom'=>$inputall['size_uom'],
            'length'=>$inputall['length'],
            'length_uom'=>$inputall['length_uom'],
            'pass'=>$inputall['pass'],
            'cuts'=>$inputall['cuts'],
            'holes'=>$inputall['holes'],
            'density'=>$inputall['density'],
            'outer_diameter'=>$inputall['outer_diameter'],
            'od_uom'=>$inputall['od_uom'],
            'bwg'=>$inputall['bwg'],
            'bwg_uom'=>$inputall['bwg_uom'],
            'schedule'=>$inputall['schedule'],
            'radius'=>$inputall['radius'],
            'degree'=>$inputall['degree'],
            'pattern_no'=>$inputall['pattern_no'],
            'rating'=>$inputall['rating'],
            'threading'=>$inputall['threading'],
            'threading_uom'=>$inputall['threading_uom'],
            'uom'=>$inputall['uom'],
            'des'=>$inputall['des'],
            );
            $this->db->where('pid',$id);
            $this->db->update('part',$data);
            $user_da = $this->session->userdata('username')." Updated Part";
            $this->activity($user_da);
            header('location:'.base_url()."index.php/users/part_detail");
    }
    public function part_detail()
    {
       	$data['part_list'] = $this->User_model->get_all_parts();
        $this->load->view('header');
	$this->load->view('part_show',$data);
        $this->load->view('footer');
    }
    public function view_part($id)
    {
        $data['r']=$this->db->query("SELECT * FROM part where pid ='$id'")->row();
      	$this->load->view('part_detail',$data);
    }
    public function del_part($pid)
    {
        $this->User_model->delete_part($pid);
        header('location:'.base_url()."index.php/users/part_detail");
    }
    public function part_category()
    {
        $term=$this->input->POST('term',true);
        $part_cat=$this->User_model->get_part_category($term);
        echo json_encode($part_cat);
    }
    
    public function moc()
    {
        $id=$this->input->POST('id',true);
        $data=$this->User_model->get_moc($id);
        echo json_encode($data);
    }
    
    public function grade()
    {
        $id=$this->input->POST('id',true);
        $data=$this->User_model->get_grade($id);
        echo json_encode($data);
    }
    //RCPL Employee Detail
    public function emp_detail()
    {
        $data['emp']=$this->db->query('SELECT *FROM employee_detail');
        $this->load->view('header');
	$this->load->view('emp',$data);
        $this->load->view('footer');
    }
    public function edit_emp($id)
    {
        $data['q']=$this->db->query("SELECT * FROM employee_detail where id ='$id'")->row();
        $data['bank']=$this->db->query("SELECT * FROM emp_bank_detail where id ='$id'")->row();
        $this->load->view('edit_emp',$data);
    }
    public function insert_emp()
    {
        $this->load->view('insert_emp');
    }
    //Insert: Employee Detail
    public function insert_emp_db()
    {
        if($this->input->post('upload'))
        {
            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'gif|jpg|png';
            $this->load->library('upload', $config);
            $field_name = "userfile";
            $this->upload->do_upload($field_name);
            $data=$this->upload->data();
            $file=array(  
            'emp_id'=>$this->input->post('emp_id'),
            'job_category'=>$this->input->post('emp_category'),
            'emp_f_name'=>$this->input->post('emp_f_name'),
            'emp_m_name'=>$this->input->post('emp_m_name'),
            'emp_l_name'=>$this->input->post('emp_l_name'),
            'emp_dl_no'=>$this->input->post('emp_dl_no'),
            'emp_dl_exp_date'=>$this->input->post('emp_dl_exp_date'),
            'emp_gender'=>$this->input->post('emp_gender'),
            'emp_marital_status'=>$this->input->post('emp_marital_status'),
            'emp_nationality'=>$this->input->post('emp_nationality'),
            'emp_dob'=>$this->input->post('emp_dob'),
            'emp_address1'=>$this->input->post('emp_address1'),
            'emp_address2'=>$this->input->post('emp_address2'),
            'emp_city'=>$this->input->post('emp_city'),
            'emp_state'=>$this->input->post('emp_state'),
            'emp_postal_code'=>$this->input->post('emp_postal_code'),
            'emp_country' => $this->input->post('emp_country'),
            'emp_home_tel'=>$this->input->post('emp_home_tel'),
            'emp_work_tel'=>$this->input->post('emp_work_tel'),
            'emp_mob'=>$this->input->post('emp_mob'),
            'emp_other_phone'=>$this->input->post('emp_other_phone'),
            'emp_work_email'=>$this->input->post('emp_work_email'),
            'emp_other_email'=>$this->input->post('emp_other_email'),
            'emp_title'=>$this->input->post('emp_title'),
            'emp_employment_status'=>$this->input->post('emp_employment_status'),
            'emp_job_category'=>$this->input->post('emp_job_category'),
            'emp_dept'=>$this->input->post('emp_dept'),
            'emp_joined_date' =>$this->input->post('emp_joined_date'),
            'emp_location'=>$this->input->post('emp_location'),
            'emp_termination_date'=>$this->input->post('emp_termination_date'),
            'emp_assigned_super'=>$this->input->post('emp_assigned_super'),
            'emp_assigned_sub1'=>$this->input->post('emp_assigned_sub1'),
            'emp_assigned_sub1'=>$this->input->post('emp_assigned_sub2'),
            'emp_assigned_sub1'=>$this->input->post('emp_assigned_sub3'),
            'emp_assigned_sub1'=>$this->input->post('emp_assigned_sub4'),
            'emp_assigned_sub1'=>$this->input->post('emp_assigned_sub5'),
            'skill'=>$this->input->post('skill'),
            'ability'=>$this->input->post('skill_category'),
            'wage'=>$this->input->post('wage'),
            'emp_emer_name'=>$this->input->post('emp_emer_name'),
            'emp_emer_relationship'=>$this->input->post('emp_emer_relationship'),
            'emp_emer_home_tel'=>$this->input->post('emp_emer_home_tel'),
            'emp_emer_work_tel'=>$this->input->post('emp_emer_work_tel'),
            'emp_emer_work_email'=>$this->input->post('emp_emer_work_email'),
            'emp_other_work_email'=>$this->input->post('emp_other_work_email'),
            'emp_image' => $data['file_name'] 
            );
            $this->User_model->add_emp($file);
            $data = array
            (
                'emp_id'=>$this->input->post('emp_id'),
                'emp_bank'=>$this->input->post('emp_bank'),
                'emp_bank_account_name'=>$this->input->post('emp_bank_account_name'),
                'emp_bank_account_type'=>$this->input->post('emp_bank_account_type'),
                'emp_bank_account_no'=>$this->input->post('emp_bank_account_no'),
                'emp_bank_account_ifsc'=>$this->input->post('emp_bank_account_ifsc'),
                
            );
            $this->db->insert('emp_bank_detail',$data);
            $user_da = $this->session->userdata('username')." Added New Employee";
            $this->activity($user_da);
            header('location:'.base_url()."index.php/users/emp_detail");
        }
        else
        {
            redirect(site_url('Users/insert_emp'));
        }
    }
    
    //update:Employee Details
    public function update_emp()
    {
        if($this->input->post('upload'))
        {
            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'gif|jpg|png';
            $this->load->library('upload', $config);
            $field_name = "userfile";
            $this->upload->do_upload($field_name);
            $data=$this->upload->data();
            $file=array(  
            'emp_id'=>$this->input->post('emp_id'),
            'emp_f_name'=>$this->input->post('emp_f_name'),
            'emp_m_name'=>$this->input->post('emp_m_name'),
            'emp_l_name'=>$this->input->post('emp_l_name'),
            'emp_dl_no'=>$this->input->post('emp_dl_no'),
            'emp_dl_exp_date'=>$this->input->post('emp_dl_exp_date'),
            'emp_gender'=>$this->input->post('emp_gender'),
            'emp_marital_status'=>$this->input->post('emp_marital_status'),
            'emp_nationality'=>$this->input->post('emp_nationality'),
            'emp_dob'=>$this->input->post('emp_dob'),
            'emp_address1'=>$this->input->post('emp_address1'),
            'emp_address2'=>$this->input->post('emp_address2'),
            'emp_city'=>$this->input->post('emp_city'),
            'emp_state'=>$this->input->post('emp_state'),
            'emp_postal_code'=>$this->input->post('emp_postal_code'),
            'emp_country' => $this->input->post('emp_country'),
            'emp_home_tel'=>$this->input->post('emp_home_tel'),
            'emp_work_tel'=>$this->input->post('emp_work_tel'),
            'emp_mob'=>$this->input->post('emp_mob'),
            'emp_other_phone'=>$this->input->post('emp_other_phone'),
            'emp_work_email'=>$this->input->post('emp_work_email'),
            'emp_other_email'=>$this->input->post('emp_other_email'),
            'emp_title'=>$this->input->post('emp_title'),
            'emp_employment_status'=>$this->input->post('emp_employment_status'),
            'emp_job_category'=>$this->input->post('emp_job_category'),
            'emp_dept'=>$this->input->post('emp_dept'),
            'emp_joined_date' =>$this->input->post('emp_joined_date'),
            'emp_location'=>$this->input->post('emp_location'),
            'emp_termination_date'=>$this->input->post('emp_termination_date'),
            'emp_assigned_super'=>$this->input->post('emp_assigned_super'),
            'emp_assigned_sub1'=>$this->input->post('emp_assigned_sub1'),
            'emp_assigned_sub2'=>$this->input->post('emp_assigned_sub2'),
            'emp_assigned_sub3'=>$this->input->post('emp_assigned_sub3'),
            'emp_assigned_sub4'=>$this->input->post('emp_assigned_sub4'),
            'emp_assigned_sub5'=>$this->input->post('emp_assigned_sub5'),
            'emp_emer_name'=>$this->input->post('emp_emer_name'),
            'emp_emer_relationship'=>$this->input->post('emp_emer_relationship'),
            'emp_emer_home_tel'=>$this->input->post('emp_emer_home_tel'),
            'emp_emer_work_tel'=>$this->input->post('emp_emer_work_tel'),
            'emp_emer_work_email'=>$this->input->post('emp_emer_work_email'),
            'emp_other_work_email'=>$this->input->post('emp_other_work_email'),
            'emp_bank'=>$this->input->post('emp_bank'),
            'emp_bank_account_name'=>$this->input->post('emp_bank_account_name'),
            'emp_bank_account_type'=>$this->input->post('emp_bank_account_type'),
            'emp_bank_account_no'=>$this->input->post('emp_bank_account_no'),
            'emp_bank_account_ifsc'=>$this->input->post('emp_bank_account_ifsc'),
            'emp_image' => $data['file_name']                 
            );
            $id =$_POST['id'];
            $this->db->where('emp_id',$id);
            $this->db->update('employee_detail',$file);
            $data = array
            (
                'emp_id'=>$this->input->post('emp_id'),
                'emp_bank'=>$this->input->post('emp_bank'),
                'emp_bank_account_name'=>$this->input->post('emp_bank_account_name'),
                'emp_bank_account_type'=>$this->input->post('emp_bank_account_type'),
                'emp_bank_account_no'=>$this->input->post('emp_bank_account_no'),
                'emp_bank_account_ifsc'=>$this->input->post('emp_bank_account_ifsc'),
                
            );
            $this->db->where('emp_id',$id);
            $this->db->update('emp_bank_detail',$data);
            $user_da = $this->session->userdata('username')." Updated Employee";
            $this->activity($user_da);
            header('location:'.base_url()."index.php/users/emp_detail");
        }   
        else
        {
            redirect(site_url('insert_emp'));
        }
    }
    public function delete_emp($id)
    {
        $this->db->query("DELETE FROM employee_detail WHERE id='{$id}'");
        $user_da = $this->session->userdata('username')." Deleted Employee";
        $this->activity($user_da);
        header('location:'.base_url()."index.php/users/emp_detail");
    }
    public function view_emp($id)
    {   
        $data['q']=$this->db->query("SELECT * FROM employee_detail where id ='$id'")->row();
        $data['bank']=$this->db->query("SELECT * FROM emp_bank_detail where id ='$id'")->row();
        $this->load->view('emp_detail',$data);
    }
    //GatePass: Autocomplete
    function employee_names(){
    $term = $this->input->POST('term', TRUE);
    $emp_names = $this->User_model->get_employee_name($term);
    echo json_encode($emp_names);
    }
    
    function employee_detail()
    {
        $sid =$this->input->POST('id');
        $month =date('m');
        $today =date('Y-m-d');
        $data=$this->User_model->get_employee_detail($sid,$month,$today);
        echo json_encode($data);
    }
    //RCPL Products Detail
    public function pro_detail()
    {
        $data['products']=$this->db->query('SELECT * FROM rcpl_products_category');
        $this->load->view('pro_detail',$data);
    }
    public function equip_category()
    {
        $name=$this->input->post('term',true);
        $data=$this->User_model->quip_cate($name);
        echo json_encode($data);
    }
    public function equip_name()
    {
        $name=$this->input->post('term',true);
        $data=$this->User_model->quip_name($name);
        echo json_encode($data);
    }
    public function add_rcpl_product()
    {
        $inputall=$this->input->POST();
        $data=array(
            'equip_desc'=>$inputall['product_name'],
            'equip_cat'=>$inputall['product_category']
        );
        $this->db->insert('rcpl_products',$data);
        $user_da = $this->session->userdata('username')." Added New Equipment";
        $this->activity($user_da);
        header('location:'.base_url()."index.php/users/pro_detail");
    }
    public function add_rcpl_product_category()
    {
        $inputall=$this->input->POST();
        $data=array(
            'equip_cat_id'=>$inputall['product_cat_code'],
            'equip_cat'=>$inputall['product_category']
        );
        $this->db->insert('rcpl_products_category',$data);
        $user_da = $this->session->userdata('username')." Added New Equip. Category";
        $this->activity($user_da);
        header('location:'.base_url()."index.php/users/pro_detail");
    }
    //Display:Order Booking Note
    public function obn()
    {
        $data['obn_data']=$this->db->query('SELECT *FROM obn');
        $this->load->view('header');
	$this->load->view('show_obn',$data);    
    }
    public function order_booking()
    {
        $this->load->view('order_booking');
    }
    public function newOrderbooking()//save the Order Booking
    {
        $inputall=$this->input->POST();
        $data=array(
            'obn_no'=>$inputall['obn_no'],
            'obn_date'=>$inputall['obn_date'],
            'po_dated'=>$inputall['po_dated'],
            'customer_name'=>$inputall['customer_name'],
            'address'=>$inputall['address'],
            'customer_address1'=>$inputall['customer_address1'],
            'customer_address2'=>$inputall['customer_address2'],
            'city'=>$inputall['city'],
            'state'=>$inputall['state'],
            'pin'=>$inputall['pin'],
            'po_no'=>$inputall['po_no'],
            'order_copy'=>$inputall['order_copy'],
            'no_pages'=>$inputall['no_pages'],
            'total'=>$inputall['total'],
            'inspe_nature'=>$inputall['inspe_nature'],
            'tpi'=>$inputall['tpi'],
            'pay_term'=>$inputall['pay_term'],
            'advance_receive'=>$inputall['advance_receive'],
            'destination'=>$inputall['destination'],
            'transporter'=>$inputall['transporter'],
            'consigner'=>$inputall['consigner'],
            'addr_third_party'=>$inputall['addr_third_party'],
            'road_perm'=>$inputall['road_perm'],
            'enclosed'=>$inputall['enclosed'],
            'give_no'=>$inputall['give_no'],
            'basis'=>$inputall['basis'],
            'freight'=>$inputall['freight'],
            'p_f'=>$inputall['p_f'],
            'form_c'=>$inputall['form_c'],
            'cust_cst'=>$inputall['cust_cst'],
            'cust_exnum'=>$inputall['cust_exnum'],
            'third_party_tin'=>$inputall['third_party_tin'],
            'original_bill'=>$inputall['original_bill'],
            'copies'=>$inputall['copies'],
            'note'=>$inputall['note'],
            'drw_no'=>$inputall['drw_no']
        );
        $this->db->insert('obn',$data);
        $id = $this->db->insert_id();
        for($i = 0;$i<count($inputall['desc']);$i++)
        {
                $data_de=array
                (
                    'obn_no'=>$inputall['obn_no'],
                    'description'=>$inputall['desc'][$i],
                    'qty'=>$inputall['qty'][$i],
                    'w_o_no'=>$inputall['order_no'][$i],
                    'rate'=>$inputall['rate'][$i],
                    'price'=>$inputall['price'][$i],
                    'delivery_date'=>$inputall['delivery_date'][$i],
                );
                $this->db->insert('obn_details',$data_de);
              
        }
        $user_da = $this->session->userdata('username')." Created OBN";
        $this->activity($user_da);
        header('location:'.base_url()."index.php/users/obn");
    }
    public function edit_obn($id)
    {
        $data['obn']=$this->db->query("SELECT * FROM obn where obn_no ='$id'")->row();
        $this->load->view('edit_obn',$data);
    }  
    public function updateOrderbooking()
    {
        $inputall=$this->input->POST();
        $id= $inputall['obn_no'];
        $data=array(
            'obn_no'=>$id,
            'obn_date'=>$inputall['obn_date'],
            'po_dated'=>$inputall['po_dated'],
            'customer_name'=>$inputall['customer_name'],
            'address'=>$inputall['address'],
            'customer_address1'=>$inputall['customer_address1'],
            'customer_address2'=>$inputall['customer_address2'],
            'city'=>$inputall['city'],
            'state'=>$inputall['state'],
            'pin'=>$inputall['pin'],
            'po_no'=>$inputall['po_no'],
            'order_copy'=>$inputall['order_copy'],
            'no_pages'=>$inputall['no_pages'],
            'total'=>$inputall['total'],
            'inspe_nature'=>$inputall['inspe_nature'],
            'tpi'=>$inputall['tpi'],
            'pay_term'=>$inputall['pay_term'],
            'advance_receive'=>$inputall['advance_receive'],
            'destination'=>$inputall['destination'],
            'transporter'=>$inputall['transporter'],
            'consigner'=>$inputall['consigner'],
            'addr_third_party'=>$inputall['addr_third_party'],
            'road_perm'=>$inputall['road_perm'],
            'enclosed'=>$inputall['enclosed'],
            'give_no'=>$inputall['give_no'],
            'basis'=>$inputall['basis'],
            'freight'=>$inputall['freight'],
            'p_f'=>$inputall['p_f'],
            'form_c'=>$inputall['form_c'],
            'cust_cst'=>$inputall['cust_cst'],
            'cust_exnum'=>$inputall['cust_exnum'],
            'third_party_tin'=>$inputall['third_party_tin'],
            'original_bill'=>$inputall['original_bill'],
            'copies'=>$inputall['copies'],
            'note'=>$inputall['note'],
            'drw_no'=>$inputall['drw_no']
        );
        $this->User_model->updateOrder_booking($id,$data);
        $this->db->query("DELETE FROM obn_details WHERE obn_no='{$id}'");
        for($i = 0;$i<count($inputall['desc']);$i++)
        {
                $data_de=array
                (
                    'obn_no'=>$inputall['obn_no'],
                    'description'=>$inputall['desc'][$i],
                    'qty'=>$inputall['qty'][$i],
                    'w_o_no'=>$inputall['order_no'][$i],
                    'rate'=>$inputall['rate'][$i],
                    'price'=>$inputall['price'][$i],
                    'delivery_date'=>$inputall['delivery_date'][$i],
                );
                $this->db->insert('obn_details',$data_de);
        }
        $user_da = $this->session->userdata('username')." Updated OBN";
        $this->activity($user_da);
        header('location:'.base_url()."index.php/users/obn");
    }
    public function delete_obn($id)
    {
        $this->db->query("DELETE FROM obn WHERE obn_no='{$id}'");
        $this->db->query("DELETE FROM obn_details WHERE obn_no='{$id}'");
        header('location:'.base_url()."index.php/users/obn");
        $user_da = $this->session->userdata('username')." Deletetd Obn Order";
        $this->activity($user_da);
    }
    //TPI Autocomplete
    public function tpi_name()
    {
        $name=$this->input->post('term',true);
        $data=$this->User_model->get_tpi_name($name);
        echo json_encode($data);
    }
    //RCPL Prospects
    public function prospects()
    {
        $data['quotation'] = $this->User_model->get_prospects_detail();
        $this->load->view('header');
        $data['message'] = "";
        $data['value']=$this->db->query("SELECT sum(total_value) As grnd_values FROM `quotation_detail`")->row();
	$this->load->view('prospects',$data);
    }
    public function quotation_detail($id)
    {
        $data['r']=$this->db->query("SELECT * FROM quotation_detail where qid ='$id'")->row();
        $data['q']=$this->db->query("SELECT * FROM quotation_description_detail where qid ='$id'")->result();
        $this->load->view('qt_description',$data);  
    }
    public function edit_qtn($id)
    {
        $data['r']=$this->db->query("SELECT * FROM quotation_detail where qid ='$id'")->row();
        $data['q']=$this->db->query("SELECT * FROM quotation_description_detail where qid ='$id'")->result();
        $this->load->view('edit_qtn',$data);  
    }
    public function delete_qtn($id)
    {
        $this->db->query("DELETE FROM quotation_detail WHERE qid='{$id}'");
        $this->db->query("DELETE FROM quotation_description_detail WHERE qid='{$id}'");
        header('location:'.base_url()."index.php/users/prospects");
        $user_da = $this->session->userdata('username')." Deletetd Quotation Detail";
        $this->activity($user_da);
    }
    public function filtered_prospects()
    {
    $from_date = date("Y-m-d", strtotime($this->input->post('from_date')));
    $to_date =  date("Y-m-d", strtotime($this->input->post('to_date')));
    $data['quotation']=$this->db->query("SELECT * FROM `quotation_detail` WHERE qt_date BETWEEN '$from_date' AND '$to_date' ")->result();
    $data['value']=$this->db->query("SELECT sum(total_value) As grnd_values FROM `quotation_detail` WHERE qt_date BETWEEN '$from_date' AND '$to_date' ")->row();
    $data['message'] = "<b style='color:green'>From $from_date To $to_date !</b>";
    $this->load->view('prospects',$data);
    }
    public function newProspects()//save the prospects
    {
        $inputall=$this->input->POST();
        $data=array(
            'cust_supp_id'=>$inputall['cust_supp_id'],
            'customer_name'=>$inputall['customer'],
            'condtions'=>$inputall['condition'],
            'addr1'=>$inputall['addr1'],
            'addr2'=>$inputall['addr2'],
            'city'=>$inputall['city'],
            'state'=>$inputall['state'],
            'pin'=>$inputall['pin'],
            'qt_date'=>date("Y-m-d", strtotime($inputall['date'])),
            'qt_no'=>$inputall['number'],
            'version'=>$inputall['version'],
            'ref'=>$inputall['ref'],
            'sub'=>$inputall['sub'],
            'total_value'=>$inputall['value'],
            'contct_person'=>$inputall['person'],
            'cnt_num'=>$inputall['mobile'],
            'status'=>'Pending',
            'dept'=>$inputall['dept']
        );
        $this->db->insert('quotation_detail',$data);
        $id = $this->db->insert_id();
        for($i = 0;$i<count($inputall['description']);$i++)
        {
                $data_de=array
                (
                    'qid'=>$id,
                    'description'=>$inputall['description'][$i],
                    'qty'=>$inputall['quantity'][$i],
                    'rate'=>$inputall['price'][$i],
                    'total'=>$inputall['total'][$i],
                    
                    
                );
                $this->db->insert('quotation_description_detail',$data_de);
              
        }
        $user_da = $this->session->userdata('username')." Created Quotation";
        $this->activity($user_da);
        header('location:'.base_url()."index.php/users/prospects");
    }
    public function updateProspects(){
        $id=$this->input->POST('id');
        $version=$this->input->POST('version');
        $ver = $this->User_model->check_version($version,$id);
         if($ver=='1'){
             
        
        $inputall=$this->input->POST();
        $data=array(
            'version'=>$version,
            'qt_date'=>date("Y-m-d", strtotime($inputall['date'])),
            'ref'=>$inputall['ref'],
            'sub'=>$inputall['sub'],
            'total_value'=>$inputall['value'],
            'contct_person'=>$inputall['person'],
            'cnt_num'=>$inputall['mobile'],
            'dept'=>$inputall['dept'],
           
        );
        $this->User_model->updateProspects($id,$data);
        $this->db->query("DELETE FROM quotation_description_detail WHERE qid='{$id}'");
        for($i = 0;$i<count($inputall['description']);$i++)
        {
                $data_de=array
                (
                    'qid'=>$id,
                    'description'=>$inputall['description'][$i],
                    'qty'=>$inputall['quantity'][$i],
                    'rate'=>$inputall['price'][$i],
                    'total'=>$inputall['total'][$i],
                );
                $this->db->insert('quotation_description_detail',$data_de);               
        }
         }else{
             $inputall=$this->input->POST();
        $data=array(
            'cust_supp_id'=>$inputall['cust_supp_id'],
            'customer_name'=>$inputall['customer'],
            'addr1'=>$inputall['addr1'],
            'addr2'=>$inputall['addr2'],
            'city'=>$inputall['city'],
            'state'=>$inputall['state'],
            'pin'=>$inputall['pin'],
            'qt_date'=>date("Y-m-d", strtotime($inputall['date'])),
            'qt_no'=>$inputall['number'],
            'version'=>$inputall['version'],
            'ref'=>$inputall['ref'],
            'sub'=>$inputall['sub'],
            'total_value'=>$inputall['value'],
            'contct_person'=>$inputall['person'],
            'cnt_num'=>$inputall['mobile'],
            'status'=>'Pending',
            'dept'=>$inputall['dept'],
            'condtions'=>$inputall['conditions']
        );
        $this->db->insert('quotation_detail',$data);
        $id = $this->db->insert_id();
        for($i = 0;$i<count($inputall['description']);$i++)
        {
                $data_de=array
                (
                    'qid'=>$id,
                    'description'=>$inputall['description'][$i],
                    'qty'=>$inputall['quantity'][$i],
                    'rate'=>$inputall['price'][$i],
                    'total'=>$inputall['total'][$i],
                    
                    
                );
                $this->db->insert('quotation_description_detail',$data_de);
              
        }
         }
        header('location:'.base_url()."index.php/users/prospects");
        $user_da = $this->session->userdata('username')." Updated Quotation";
        $this->activity($user_da);
    }
    public function updateCondition(){
        $id=$this->input->POST('id');
        $qt_no =$this->input->POST('qt_no');
        $customer =$this->input->POST('customer');
        $version =$this->input->POST('version');
         
                    $inputall=$this->input->POST();
        $data=array(
            'condtions'=>$inputall['conditions'],
            'ref'=>$inputall['ref'],
            'sub'=>$inputall['sub']
           
        );
        $this->db->where('qid',$id);
        $this->db->update('quotation_detail',$data);
         $this->prospects_pdf($id,$qt_no,$customer,$version);
    }
    public function cust_name()
    {
        $name=$this->input->post('term',true);
        $data=$this->User_model->get_cust_name($name);
        echo json_encode($data);
    }
    public function cust_cred()
    {
        $id=$this->input->post('id',true);
        $data=$this->User_model->get_cust_credentials($id);
        echo json_encode($data);
    }
    public function supp_credentials()
    {
        $id=$this->input->post('id',true);
        $data=$this->User_model->get_supp_credentials($id);
        echo json_encode($data);
    }
    public function supp_mobile()
    {
        $term=$this->input->post('sel',true);
        $data=$this->User_model->get_supp_mobile($term);
        echo json_encode($data);
    }
    // PURCHASE ORDER SAVE EDIT AND DELETE
    public function save_po()
    {
       
        $inputall = $this->input->post(); 
        $oidVal1 = explode("%", $this->input->post('pf_per'));
        $oidVal2=  explode("%", $this->input->post('ite_per'));
        $oidVal3 = explode("%", $this->input->post('ot_per'));
        $oidVal4 = explode("%", $this->input->post('ed_per'));
        $oidVal5 = explode("%", $this->input->post('cs_per'));
        $oidVal6  = explode("%", $this->input->post('vt_per'));
        $data = array
        (
            'order_no' =>$inputall['order_no'],
            'supplier_name' =>$inputall['supplier_name'],
            'address' =>$inputall['address'],
            'address1' =>$inputall['address1'],
            'address2' =>$inputall['address2'],
            'city' =>$inputall['city'],
            'state' =>$inputall['state'],
            'phone' =>$inputall['phone'],
            'pin' =>$inputall['pin'],
            'email' =>$inputall['email'],
            'date' =>$inputall['date'],
            'qtn_ref' =>$inputall['qtn_ref'],
            'qtn_date' =>$inputall['qtn_date'],
            'delivery_date' =>$inputall['delivery_date'],
            'pf' =>$inputall['pf'],
            'taxes' =>$inputall['taxes'],
            'status' =>$inputall['status'],
            'payment_term' =>$inputall['payment_term'],
            'transporter' =>$inputall['transporter'],
            'total' =>$inputall['total'],
            'packing_forwarding' =>$inputall['packing_forwarding'],
            'inspection_testing'=>$inputall['ite'],
            'other_tax' =>$inputall['ot'],
            'excise_duty' =>$inputall['ed'],
            'cst_tax' =>$inputall['cs'],
            'vat_tax' =>$inputall['vt'],
            'pf_per' =>$oidVal1[0],
            'ite_per'=>$oidVal2[0],
            'ot_per' =>$oidVal3[0],
            'ed_per' =>$oidVal4[0],
            'cs_per' =>$oidVal5[0],
            'vt_per' =>$oidVal6[0],
            'grand_total' =>$inputall['grand_total'],
            'amt_word' =>$inputall['amount_words'],
            'narration' =>$inputall['narration']
        );
            $this->db->insert('purchase_order',$data);
            $id = $this->db->insert_id();
            for($i = 0;$i<count($inputall['description']);$i++)
            {
                $data_de=array
                (
                    'order_no'=>$id,
                    'pid'=>$inputall['pid'][$i],
                    'description'=>$inputall['description'][$i],
                    'category'=>$inputall['category'][$i],
                    'moc'=>$inputall['moc'][$i],
                    'grade'=>$inputall['grade'][$i],
                    'length'=>$inputall['length'][$i],
                    'length_uom'=>$inputall['length_uom'][$i],
                    'length_meter'=>$inputall['length_meter'][$i],
                    'length_mtr_uom'=>$inputall['length_mtr_uom'][$i],
                    'width'=>$inputall['width'][$i],
                    'width_uom'=>$inputall['width_uom'][$i],
                    'thickness'=>$inputall['thickness'][$i],
                    'quantity'=>$inputall['quantity'][$i],
                    'weight'=>$inputall['weight'][$i],
                    'density'=>$inputall['density'][$i],
                    'unit'=>$inputall['unit'][$i],
                    'work_order'=>$inputall['work_order'][$i],
                    'rate'=>$inputall['rate'][$i],
                    'price'=>$inputall['price'][$i]
                );
                $this->db->insert('po_detail',$data_de);
              
            }
        $user_da = $this->session->userdata('username')." Created Purchase Order";
        $this->activity($user_da);
        header('location:'.base_url()."index.php/users/view_po");
    }  
    public function edit_po($id)
    {
        $data['r']=$this->db->query("SELECT * FROM purchase_order where order_no ='$id'")->row();
        $this->load->view('edit_po',$data);
    }
    
    public function update_po_detail()
    {
       
        $inputall = $this->input->post(); 
        $data = array
        (
            'supplier_name' =>$inputall['supplier_name'],
            'address' =>$inputall['address'],
            'address1' =>$inputall['address1'],
            'address2' =>$inputall['address2'],
            'city' =>$inputall['city'],
            'state' =>$inputall['state'],
            'pin' =>$inputall['pin'],
            'phone' =>$inputall['phone'],
            'email' =>$inputall['email'],
            'date' =>$inputall['date'],
            'qtn_ref' =>$inputall['qtn_ref'],
            'qtn_date' =>$inputall['qtn_date'],
            'delivery_date' =>$inputall['delivery_date'],
            'pf' =>$inputall['pf'],
            'taxes' =>$inputall['taxes'],
            'status' =>$inputall['status'],
            'payment_term' =>$inputall['payment_term'],
            'transporter' =>$inputall['transporter'],
            'total' =>$inputall['total'],
            'packing_forwarding' =>$inputall['packing_forwarding'],
            'inspection_testing'=>$inputall['ite'],
            'other_tax' =>$inputall['ot'],
            'excise_duty' =>$inputall['ed'],
            'cst_tax' =>$inputall['cs'],
            'vat_tax' =>$inputall['vt'],
            'pf_per' =>$inputall['pf_per'],
            'ite_per'=>$inputall['ite_per'],
            'ot_per' =>$inputall['ot_per'],
            'ed_per' =>$inputall['ed_per'],
            'cs_per' =>$inputall['cs_per'],
            'vt_per' =>$inputall['vt_per'],
            'grand_total' =>$inputall['grand_total'],
            'amt_word' =>$inputall['amount_words'],
            'narration' =>$inputall['narration']
        );
        $id =$inputall['order_no'];
        $this->db->where('order_no',$id);
        $this->db->update('purchase_order',$data);
        $this->db->query("DELETE FROM po_detail WHERE order_no='{$id}'");
        for($i = 0;$i<count($inputall['description']);$i++)
        {
           $data_de=array
                (
                    'order_no'=>$id,
                    'description'=>$inputall['description'][$i],
                    'category'=>$inputall['category'][$i],
                    'pid'=>$inputall['pid'][$i],
                    'moc'=>$inputall['moc'][$i],
                    'grade'=>$inputall['grade'][$i],
                    'length'=>$inputall['length'][$i],
                    'length_uom'=>$inputall['length_uom'][$i],
                    'length_meter'=>$inputall['length_meter'][$i],
                    'length_mtr_uom'=>$inputall['length_mtr_uom'][$i],
                    'width'=>$inputall['width'][$i],
                    'width_uom'=>$inputall['width_uom'][$i],
                    'thickness'=>$inputall['thickness'][$i],
                    'quantity'=>$inputall['quantity'][$i],
                    'weight'=>$inputall['weight'][$i],
                    'density'=>$inputall['density'][$i],
                    'unit'=>$inputall['unit'][$i],
                    'work_order'=>$inputall['work_order'][$i],
                    'rate'=>$inputall['rate'][$i],
                    'price'=>$inputall['price'][$i]
                );
            $this->db->insert('po_detail',$data_de);
              
        }
        $user_da = $this->session->userdata('username')." Updated Purchase Order";
        $this->activity($user_da);
        header('location:'.base_url()."index.php/users/view_po");
    }     
    public function delete_po($id)
    {
        $this->db->query("DELETE FROM purchase_order WHERE order_no='{$id}'");
        $this->db->query("DELETE FROM po_detail WHERE order_no='{$id}'");
        header('location:'.base_url()."index.php/users/view_po");
        $user_da = $this->session->userdata('username')." Deletetd Purchase Order";
        $this->activity($user_da);
    }
    public function pur_order()
    {
        $data['tax']  = $this->db->query("SELECT * FROM tax_table ");
        $data['order_num']=$this->db->query("SELECT order_no FROM purchase_order ORDER BY order_no DESC LIMIT 1")->row();
        $this->load->view('po',$data);
    }
    public function print_po($id)
    {
        
        $data['r']=$this->db->query("SELECT * FROM purchase_order where order_no ='$id'")->row();
        $this->load->view('purchase_order',$data);
        
    }
    //extra stuff
    public function add_order()
    {
        $sid =$this->input->post('id');
        $data=$this->User_model->getpart($sid);
        echo json_encode($data);
    }
    function supplier_names(){
    $term = $this->input->POST('term', TRUE);
    $supplier_names = $this->User_model->get_supplier_name($term);
    echo json_encode($supplier_names);
    }
    //Fetching Supplier Detail for PO
    public function supplier_detail()
    {
        $id=$this->input->post('id',true);
        $data=$this->User_model->get_supp_address_detail($id);
        echo json_encode($data);
    }
    function supplier_detail_de()
    {
        $sid =$this->input->post('id');
        $data=$this->User_model->get_supplier_detail($sid);
        echo json_encode($data);
    }
    function address_detail()
    {
        $id=$this->input->post('id',true);
        $data=$this->User_model->get_supp_address($id);
        echo json_encode($data);
    }
    public function stock_parts_name(){
        $term = $this->input->POST('term', TRUE);
        $names = $this->User_model->get_stock_parts($term);
        echo json_encode($names);
    }
    public function parts_name()
    {
    $term = $this->input->POST('term', TRUE);
    $names = $this->User_model->get_parts($term);
    echo json_encode($names);
    }
    public function part_detail_db()
    {
        $pid =$this->input->post('id');
        $data=$this->User_model->get_part_detail($pid);
        echo json_encode($data);
    }
    public function work_order() {
        $term = $this->input->POST('term', TRUE);
        $work_order = $this->User_model->get_work_order($term);
        echo json_encode($work_order);
    }
    public function payment_term() {
        $term = $this->input->POST('term', TRUE);
        $payment_term = $this->User_model->get_payment_term($term);
        echo json_encode($payment_term);
    }
     public function transporter() {
        $term = $this->input->POST('term', TRUE);
        $transporter = $this->User_model->get_transporter($term);
        echo json_encode($transporter);
    }
    public function view_po()
    {
        $data['r']=$this->db->query('SELECT *FROM purchase_order');
        $data['level'] = $this->session->userdata('level');
	$this->load->view('show_po',$data);
    }
    //Status For Purchase order
    public function update_po_stauts()
    {
        $id =$this->input->post('id');
        $status =$this->input->post('status');
        $this->db->query("UPDATE purchase_order SET status = '{$status}' WHERE order_no='{$id}'"); 
    }
    //Goods Reciept Note
    public function grn()
    {      
        $this->load->view('goods_note');             
    }
    public function add_order_rec($id)    
    {
        $data['r']=$this->db->query("SELECT * FROM purchase_order where order_no ='$id'")->row();
        $data['count']=$this->db->query("SELECT count(po_no)as po_count FROM goods_reciept where po_no ='$id'")->row();
        $data['grn']=$this->db->query("SELECT * FROM goods_reciept where po_no ='$id' ORDER BY grn_id DESC LIMIT 1")->row();
        $this->load->view('grn',$data);  
    }
    public function save_grn()
    {
        $inputall = $this->input->post(); 
        $data = array
        (
            'status' => 'Pending',
            'po_no_year' =>$inputall['po_no_year'],
            'po_no' =>$inputall['po_no'],
            'dc_no' =>$inputall['dc_no'],
            'dc_date' =>$inputall['dc_date'],
            'supplier_name' =>$inputall['supplier_name'],
            'address1' =>$inputall['address1'],
            'address2' =>$inputall['address2'],
            'city' =>$inputall['city'],
            'state' =>$inputall['state'],
            'phone' =>$inputall['phone'],
            'pin' =>$inputall['pin'],
            'email' =>$inputall['email'],
            'grn_date' =>$inputall['grn_date'],
            'total_amount' =>$inputall['total_amount'],
        );
        $this->db->insert('goods_reciept',$data);
        $id = $this->db->insert_id();
        for($i = 0;$i<count($inputall['des']);$i++)
        {
            $data_de=array(
                'grn_id'=>$id,
                'order_no'=>$inputall['po_no'],
                'pid'=>$inputall['pid'][$i],
                'description'=>$inputall['des'][$i],
                'category'=>$inputall['category'][$i],
                'moc'=>$inputall['moc'][$i],
                'grade'=>$inputall['grade'][$i],
                'length'=>$inputall['length'][$i],
                'length_uom'=>$inputall['length_uom'][$i],
                'length_meter'=>$inputall['length_meter'][$i],
                'length_mtr_uom'=>$inputall['length_mtr_uom'][$i],
                'width'=>$inputall['width'][$i],
                'width_uom'=>$inputall['width_uom'][$i],
                'thickness'=>$inputall['thickness'][$i],
                'quantity'=>$inputall['quantity'][$i],
                'weight'=>$inputall['weight'][$i],
                'unit'=>$inputall['unit'][$i],
                'work_order'=>$inputall['work_order'][$i],
                'rate'=>$inputall['rate'][$i],
                'qty_rec'=>$inputall['qty_rec'][$i],
                'wt_rec'=>$inputall['wt_rec'][$i],
                'qty_pen'=>$inputall['qty_pen'][$i],
                'wt_pen'=>$inputall['wt_pen'][$i],
                'price'=>$inputall['price'][$i]
                    
            );
                $this->db->insert('grn_detail',$data_de);
        }
        header('location:'.base_url()."index.php/users/view_grn");
    }  
    public function view_grn()
    {
        $data['r']=$this->db->query('SELECT *FROM goods_reciept');
        $this->load->view('show_grn',$data);
    }
    public function update_grn()
    {
        $inputall = $this->input->post(); 
        $data = array
        (
          
            'address1' =>$inputall['address1'],
            'address2' =>$inputall['address2'],
            'city' =>$inputall['city'],
            'state' =>$inputall['state'],
            'phone' =>$inputall['phone'],
            'pin' =>$inputall['pin'],
            'email' =>$inputall['email'],
            'grn_date' =>$inputall['grn_date'],
            'dc_no' =>$inputall['dc_no'],
            'dc_date' =>$inputall['dc_date'],
            'total_amount' =>$inputall['total_amount']
        );
        $id =$inputall['grn_id'];
        $this->db->where('grn_id',$id);
        $this->db->update('goods_reciept',$data);
        $this->db->query("DELETE FROM grn_detail WHERE grn_id='{$id}'");
        for($i = 0;$i<count($inputall['pid']);$i++)
        {
            $data_de=array
            (
                'grn_id'=>$id,
                'order_no'=>$inputall['po_no'],
                'pid'=>$inputall['pid'][$i],
                'description'=>$inputall['des'][$i],
                'category'=>$inputall['category'][$i],
                'moc'=>$inputall['moc'][$i],
                'grade'=>$inputall['grade'][$i],
                'length'=>$inputall['length'][$i],
                'length_uom'=>$inputall['length_uom'][$i],
                'length_meter'=>$inputall['length_meter'][$i],
                'length_mtr_uom'=>$inputall['length_mtr_uom'][$i],
                'width'=>$inputall['width'][$i],
                'width_uom'=>$inputall['width_uom'][$i],
                'thickness'=>$inputall['thickness'][$i],
                'quantity'=>$inputall['quantity'][$i],
                'weight'=>$inputall['weight'][$i],
                'unit'=>$inputall['unit'][$i],
                'work_order'=>$inputall['work_order'][$i],
                'rate'=>$inputall['rate'][$i],
                'qty_rec'=>$inputall['qty_rec'][$i],
                'wt_rec'=>$inputall['wt_rec'][$i],
                'qty_pen'=>$inputall['qty_pen'][$i],
                'wt_pen'=>$inputall['wt_pen'][$i],
                'price'=>$inputall['price'][$i]
            );
            $this->db->insert('grn_detail',$data_de);
        }
        header('location:'.base_url()."index.php/users/edit_grn/$id");
    }    
    public function edit_grn($id)
    {
        $data['r']=$this->db->query("SELECT * FROM goods_reciept where grn_id ='$id'")->row();
        $this->load->view('edit_grn',$data);
    }
    public function grn_approval($id)
    {
        $data['r']=$this->db->query("SELECT * FROM goods_reciept where grn_id ='$id'")->row();
        $this->load->view('grn_approval',$data);
    }
    public function stock_data()
    {
        $inputall = $this->input->post(); 
       
        for($i = 0;$i<count($inputall['des']);$i++)
        {
            $data_de=array(
                'grn_id'=>$inputall['grn_id'],
                'supplier_name' =>$inputall['supplier_name'],
                'grn_date' =>$inputall['grn_date'],
                'pid'=>$inputall['pid'][$i],
                'part_category'=>$inputall['category'][$i],
                'description'=>$inputall['des'][$i],
                'uom'=>$inputall['unit'][$i],
                'length'=>$inputall['length'][$i],
                'length_uom'=>$inputall['length_uom'][$i],
                'length_meter'=>$inputall['length_meter'][$i],
                'length_mtr_uom'=>$inputall['length_mtr_uom'][$i],
                'width'=>$inputall['width'][$i],
                'width_uom'=>$inputall['width_uom'][$i],
                'work_order'=>$inputall['work_order'][$i],
                'qty_no'=>$inputall['qty_rec'][$i],
                'qty_weight'=>$inputall['wt_rec'][$i]
            );
                $this->db->insert('stock',$data_de);
        }
        header('location:'.base_url()."index.php/users/view_grn");
    }
    public function view_stock()
    {
        $data['stock']=$this->db->query('select * ,SUM(qty_no) as Qty,SUM(qty_weight) as Weight,SUM(price) as price from stock where qty_no>0 group by pid');
        $data['level'] = $this->session->userdata('level');
	$this->load->view('show_stock',$data);
    }
    public function stock_detail($id)
    {
        $data['item_detail']=$this->db->query("SELECT *,SUM(qty_no) as qty_noo,SUM(qty_weight) as qty_weightt FROM stock where pid ='$id' AND qty_no>0 group by length,width,work_order,grn_id,supplier_name" );
        $this->load->view('stock_detail',$data);  
    }
    public function delete_grn($id)
    {
        $this->db->query("DELETE FROM goods_reciept WHERE grn_id='{$id}'");
        $this->db->query("DELETE FROM grn_detail WHERE grn_id='{$id}'");
        header('location:'.base_url()."index.php/users/view_grn");
    }
    public function search_grn()
    {
        $data['grn'] = $this->User_model->get_grn();
        $this->load->view('header');
	$this->load->view('show_grn',$data);
        $this->load->view('footer');
    } 
    //Purchase Invoice
    public function pur_invoice()
    {
        $this->load->view('po_invoice');
    }
    public function inv($id)
    {
        $data['grn']=$this->User_model->get_all_grn();
        $data['r']=$this->db->query("SELECT * FROM goods_reciept where grn_id ='$id'")->row();
        $this->load->view('purchase_invoice',$data);
    }
    public function save_invoice()
    {
        $inputall = $this->input->post(); 
        $oidVal1 = 
        $grn_id=  $this->input->post('grn_no');
        $data = array
        (
            'grn_no' =>$grn_id,
            'inv_no' =>$inputall['inv_no'],
            'inv_date' =>$inputall['inv_date'],
            'supplier_name' =>$inputall['supplier_name'],
            'address' =>$inputall['address'],
            'address1' =>$inputall['address1'],
            'address2' =>$inputall['address2'],
            'city' =>$inputall['city'],
            'state' =>$inputall['state'],
            'phone' =>$inputall['phone'],
            'pin' =>$inputall['pin'],
            'email' =>$inputall['email'],
            'date' =>$inputall['date'],
            'status' =>$inputall['status'],
            'total' =>$inputall['total'],
            'packing_forwarding' =>$inputall['packing_forwarding'],
            'inspection_testing'=>$inputall['ite'],
            'other_tax' =>$inputall['ot'],
            'excise_duty' =>$inputall['ed'],
            'cst_tax' =>$inputall['cs'],
            'vat_tax' =>$inputall['vt'],
            'pf_per' =>$inputall['pf_per'],
            'ite_per'=>$inputall['ite_per'],
            'ot_per' =>$inputall['ot_per'],
            'ed_per' =>$inputall['ed_per'],
            'cs_per' =>$inputall['cs_per'],
            'vt_per' =>$inputall['vt_per'],
            'fright_charge' =>$inputall['fright_charge'],
            'grand_total' =>$inputall['grand_total'],
            'amt_word' =>$inputall['amount_words'],
            'narration' =>$inputall['narration']
        );
        $this->db->insert('purchase_invoice',$data);
        $id = $this->db->insert_id();
        for($i = 0;$i<count($inputall['description']);$i++)
        {
            $data_de=array
            (
                'invoice_no'=>$id,
                'pid'=>$inputall['pid'][$i],
                'description'=>$inputall['description'][$i],
                'category'=>$inputall['category'][$i],
                'moc'=>$inputall['moc'][$i],
                'grade'=>$inputall['grade'][$i],
                'length'=>$inputall['length'][$i],
                'length_uom'=>$inputall['length_uom'][$i],
                'length_meter'=>$inputall['length_meter'][$i],
                'length_mtr_uom'=>$inputall['length_mtr_uom'][$i],
                'width'=>$inputall['width'][$i],
                'width_uom'=>$inputall['width_uom'][$i],
                'quantity'=>$inputall['quantity'][$i],
                'weight'=>$inputall['weight'][$i],
                'unit'=>$inputall['unit'][$i],
                'work_order'=>$inputall['work_order'][$i],
                'rate'=>$inputall['rate'][$i],
                'price'=>$inputall['price'][$i]
            );
                $this->db->insert('invoice_detail',$data_de);
        }
       for($i = 0;$i<count($inputall['description']);$i++)
            {
                $data_de=array
                (
                    'rate'=>$inputall['landing_rate'][$i],
                    'price'=>$inputall['landing_price'][$i]
                ); 
                $id = $inputall['grnId'][$i];
                $pid = $inputall['pid'][$i];
                $this->db->where('id',$id);
                $this->db->update('grn_detail', $data_de); 
                $where = "grn_id='$grn_id' OR pid='$pid'";
                $this->db->where($where);
                $this->db->update('stock', $data_de); 
            }
            $this->db->query("UPDATE goods_reciept SET status = 'Done' WHERE grn_id='{$grn_id}'"); 
            $user_da = $this->session->userdata('username')." Created Purchase invoice";
            $this->activity($user_da);
            header('location:'.base_url()."index.php/users/view_purchase_invoice");
        } 
    public function view_purchase_invoice()
    {
        $data['r']=$this->db->query('SELECT *FROM purchase_invoice');
        $this->load->view('show_purchase_invoice',$data);
    }
    public function view_purchase_invoice_detail($id)
    {
        $data['r']=$this->db->query("SELECT *FROM purchase_invoice WHERE invoice_no='{$id}'")->row();
        $this->load->view('show_purchase_invoice_detail',$data);
    }
    public function delete_invoice($id)
    {
        $this->db->query("DELETE FROM purchase_invoice WHERE invoice_no='{$id}'");
	$this->db->query("DELETE FROM invoice_detail WHERE invoice_no='{$id}'");
        $user_da = $this->session->userdata('username')." Deleted Purchase Invoice";
        $this->activity($user_da);
        header('location:'.base_url()."index.php/users/view_purchase_invoice");
        
    }        
    //Material Issued For Production
    public function issue_note()
    {
        $user = $this->session->userdata('username');
        $data['user'] = $this->M_login->userData($user);
        $this->load->view('issue_note',$data);
    }
    public function stock_part_detail()
    {
        $pid =$this->input->post('id');
        $data=$this->User_model->get_stock_part_detail($pid);
        echo json_encode($data);
    }
    public function stock_update()
    {
        $inputall = $this->input->post();
         $data = array
        (
            'party_name' =>$inputall['party_name'],
            'work_order' =>$inputall['work_order'],
            'issue_date' =>$inputall['issue_date'],
            'receiver_name' =>$inputall['receiver_name'],
            
        );
        $this->db->insert('issue_note',$data);
        $id = $this->db->insert_id();
        for($i = 0;$i<count($inputall['id']);$i++)
        {
            $data_de=array
            (
                'issue_no'=>$id,
                'description'=>$inputall['description'][$i],
                'size'=>$inputall['size'][$i],
                'qty_no'=>$inputall['quantity_no_req'][$i],
                'qty_wt'=>$inputall['quantity_req'][$i],
                'uom'=>$inputall['unit'][$i],
            );
            $this->db->insert('issue_detail',$data_de);
        }
        for($i = 0;$i<count($inputall['id']);$i++)
            {
            $data_de=array
            (
                 
                'qty_no'=>$inputall['quantity_no_pen'][$i],
                'qty_weight'=>$inputall['quantity_pen'][$i]
            ); 
            $id = $inputall['id'][$i];
            $this->db->where('id',$id);
            $this->db->update('stock', $data_de); 
            
        }
         header('location:'.base_url()."index.php/users/view_stock");
    }
    public function view_issue_notes()
    {
        $data['r']=$this->db->query('SELECT *FROM issue_note');
        $this->load->view('show_issue',$data);
    }
    public function view_issue($id)
    {
        $data['r']=$this->db->query("SELECT * FROM issue_note where issue_no ='$id'")->row();
        $this->load->view('issue_note_detail',$data);
    }
    public function delete_issue($id)
    {
        $this->db->query("DELETE FROM issue_note WHERE issue_no='{$id}'");
	$this->db->query("DELETE FROM issue_detail WHERE issue_no='{$id}'");
        $user_da = $this->session->userdata('username')." Deleted Issue Note";
        $this->activity($user_da);
        header('location:'.base_url()."index.php/users/view_issue_notes");
    }
    public function add_issue()
    {
        $sid =$this->input->post('id');
        $data=$this->User_model->getpart($sid);
        echo json_encode($data);
    } 
    //Extra Work Form
    public function extra_work()
    {
         $this->load->view('extra_work');
    }
    //Extraa Work Reason 
    public function work_reason() {
        $term = $this->input->POST('term', TRUE);
        $work_reason = $this->User_model->get_work_reason($term);
        echo json_encode($work_reason);
    }
    public function worker_names()
    {
        $term = $this->input->POST('term', TRUE);
        $worker_name = $this->User_model->get_worker_name($term);
        echo json_encode($worker_name);
    }
     //GATE PASS
    public function new_gate_pass()
    {
        $this->load->view('new_gate_pass');
    }
    public function gate_pass()
    {
         $data['level'] = $this->session->userdata('level');
         $this->load->view('gate_pass',$data);
    } 
    public function gate_pass_request()
    {
        $inputall = $this->input->post(); 
        $data = array
        (
            'emp_id' =>$inputall['id'],
            'name' =>$inputall['name'],
            'mob' =>$inputall['mob'],
            'ttime' =>$inputall['ttime'],
            'purpose' =>$inputall['purpose'],
            'reason' =>$inputall['reason'],
            'be_back' =>$inputall['be_back'],
            'return_time' =>$inputall['return_time'],
            'date' =>$inputall['date'],
            'month' =>$inputall['month'],
            'day' =>$inputall['day'],
            'today_gate_count' =>$inputall['today_gate_count'],
            'status' =>$inputall['status']
        );
        $this->db->insert('gate_pass',$data);
        header('location:'.base_url()."index.php/users/new_gate_pass");
        $user_da = $this->session->userdata('username')." Requested for Gate Pass";
        $this->activity($user_da);
    }
    public function gate_pass_approval($id)
    {
        $data['level'] = $this->session->userdata('level');
        $data['approval_detail']=$this->db->query("SELECT * FROM gate_pass where gate_pass_id ='$id'")->row();
        $this->load->view('gate_pass',$data);
    }
    public function gate_pass_approval_succees($id)
    {
        $id= $this->input->post('id');
        $this->db->query("UPDATE gate_pass SET status = 'Approved' WHERE gate_pass_id='{$id}'"); 
        header('location:'.base_url()."index.php/users/gate_pass_approval/". $id);
        $user_da = $this->session->userdata('username')." Approved for Gate Pass";
        $this->activity($user_da);
    }
    public function delete_gate_pass($id)
    {
        $this->db->query("DELETE FROM gate_pass WHERE gate_pass_id='{$id}'");
	header('location:'.base_url()."index.php/users/show_gate_pass");
        $user_da = $this->session->userdata('username')." Deleted Gate Pass";
        $this->activity($user_da);
    }
    public function leave_application()
    {
        $this->load->view('leave_application');
    }
    public function show_gate_pass()
    {
        $data['emp']=$this->db->query('SELECT *FROM gate_pass');
        $this->load->view('header');
	$this->load->view('show_gate',$data);
    }
    public function security_view()
    {
        $this->load->view('security_display');
    }
    public function emp_attendence()
    {
        $data['emp_detail']=$this->db->query('SELECT tbl_gatepass.emp_id, gate_pass.name, tbl_gatepass.gp_date, tbl_gatepass.gp_time FROM gate_pass LEFT JOIN tbl_gatepass ON gate_pass.gate_pass_id = tbl_gatepass.emp_id');
        
        $this->load->view('emp_attendence',$data);
    }
    public function employee_daily_attendence()
    {             
        $this->load->view('emp_daily_attendence');
    }
    public function emp_work_attendence()
    {
        $this->load->view('emp_work_attendence');
    }
    public function daily_gatepass()
    {
        $this->load->view('daily_gatepass');
    }
   //Loan Details
    public function show_loan()
    {
        $data['emp']=$this->db->query('SELECT * FROM `loan`');
        $this->load->view('header');
	$this->load->view('show_loan_pmt',$data);
    }
    public function new_loan()
    {  
       $data['level'] = $this->session->userdata('level');
       $this->load->view('loan',$data);
    }
    public function loan_pay_request()
    {
        $inputall = $this->input->post(); 
        $data = array
        (   
            'id'=>$inputall['id'],
            'l_job_category' =>$inputall['job_cat'],
            'l_emp_name' =>$inputall['name'],
            'l_pre_date' =>$inputall['pre_date'],
            'l_amt_taken' =>$inputall['amt_taken'],
            'l_amt_reqd' =>$inputall['amt_reqd'],
            'l_purpose' =>$inputall['purpose'],
            'l_tac' =>$inputall['tac'],
            'l_mobile' =>$inputall['mob'],
            'l_date' =>$inputall['date'],
            'l_month' =>$inputall['month'],
            'l_status' =>$inputall['status'],
            'balance'=>$inputall['balance']
        );
        $this->db->insert('loan',$data);
        header('location:'.base_url()."index.php/users/index");
    }
    
    public function previous_loan()
    {   
        $name=$this->input->post('name',true);
        $data=$this->User_model->get_previous_loan($name); 
        echo json_encode($data);
    }
    
    public function ep_detail()
    {
        $id=$this->input->post('id',true);
        $data=$this->User_model->get_emp_detail($id);
        echo json_encode($data);
    }
    public function payment_approval($id)
    {
        $data['level'] = $this->session->userdata('level');
        $data['approval_detail']=$this->db->query("SELECT * FROM loan where loan_id='$id'")->row();
        $this->load->view('loan_approval',$data);
    }
    
    public function loan_approval_succees()
    {
        $inputall = $this->input->post(); 
        $data=array
        (   
            'id'=>$inputall['empid'],
            'ld_job_category'=>$inputall['job_cat'],
            'ld_emp_name' =>$inputall['name'],
            'ld_date'=>$inputall['date'],
            'ld_activity'=>$inputall['activity'],
            'ld_loan_taken'=>$inputall['amt_sanct'],
            'balance'=>$inputall['recover']
        );
        
        $this->db->insert('loan_detail',$data);
        
        $id= $this->input->post('id');
        $recover=$this->input->post('recover');
        $this->db->query("UPDATE loan SET l_status = 'Approved',l_tac ='{$recover}' WHERE loan_id='{$id}'");
        header('location:'.base_url()."index.php/users/show_loan/".$id);
    }
    
    public function delete_loan($id)
    {
        $this->db->query("DELETE FROM loan WHERE loan_id='{$id}'");
	header('location:'.base_url()."index.php/users/show_loan");
    }
    
    public function prev_details()
    {
        $id=$this->input->POST('id',true);
        $data=$this->User_model->get_prev_details($id);
        echo json_encode($data);
    }
    
    public function loan_details($id)
    {
        $data['item']=$this->User_model->get_loan_details($id);
        $this->load->view('loan_details',$data);
    }
    
    public function deposit_amt()
    {
        $inputall=$this->input->POST();
        $data=array(
            'id'=>$inputall['empid'],
            'ld_job_category'=>$inputall['job_category'],
            'ld_emp_name'=>$inputall['empname'],
            'ld_date'=>$inputall['date'],
            'ld_deposit_amt'=>$inputall['amtdeposit'],
            'balance'=>$inputall['balance'],
            'ld_activity'=>$inputall['activity']
        );
        $this->db->insert('loan_detail',$data);
        header('location:'.base_url()."index.php/users/loan_details/".$inputall['empid']);
    }
    
    public function employee_balance()
    {
        $id=$this->input->POST('id',true);
        $max_id=$this->User_model->get_max_id($id);
        $data=$this->User_model->get_employee_balance($id,$max_id);
        echo json_encode($data);
    }
    
    public function update_reject()
    {
        
        $loan_id=$this->input->POST('loan_id',true);
        $this->db->query("UPDATE `loan` SET `l_status` = 'Rejected' WHERE `loan_id`='{$loan_id}'");
        echo"done";
        
    }
    //Advance Payment
    
    public function new_advance_payment()
    {
        $data['level']=$this->session->userdata('level');
        $this->load->view('adv/advance_payment',$data);
    }
    
    public function adv_prev_details()
    {
        $id=$this->input->POST('id',true);
        $data=$this->User_model->get_adv_prev_details($id);
        echo json_encode($data);
    }
    public function adv_get_attnd()
    {
        $id=$this->input->POST('id',true);
        $data=$this->User_model->get_attnd($id);
        echo json_encode($data);
    }
    
    public function show_adv_pmt()
    {
        $data['adv_details']=$this->db->query("SELECT * FROM `adv_pmt`");
        $this->load->view('header');
        $this->load->view('adv/show_adv_pmt',$data);
    }
    
    public function advance_pay_request()
    {
        $inputall=$this->input->POST();
        $data=array(
            'adv_emp_name'=>$inputall['name'],
            'adv_job_category'=>$inputall['job_cat'],
            'adv_emp_id'=>$inputall['id'],
            'adv_pre_date'=>$inputall['pre_date'],
            'adv_amt_taken'=>$inputall['amt_taken'],
            'adv_emp_attd'=>$inputall['attd'],
            'adv_amt_reqd'=>$inputall['amt_reqd'],
            'adv_purpose'=>$inputall['purpose'],
            'adv_tac'=>$inputall['tac'],
            'adv_emp_mobile'=>$inputall['mob'],
            'adv_status'=>$inputall['status'],
            'adv_req_date'=>$inputall['req_date']
        );
        $this->db->insert('adv_pmt',$data);
        header('location:'.base_url()."index.php/users/show_adv_pmt");
        
    }
    
    public function show_adv_pmt_details($id)
    {
        $data['adv_details']=$this->User_model->get_adv_pmt_details($id);
        $data['attnd']=$this->db->query("SELECT `att_attend` FROM`att_dummy` WHERE `emp_id`='$id'")->row();
        $data['wage']=$this->db->query("SELECT `wage` FROM `employee_detail` WHERE `emp_id`='$id'")->row();
        $this->load->view('adv/adv_pmt_details',$data);
    }
    
    public function adv_payment_approval($id,$empid)
    {
        $data['level'] = $this->session->userdata('level');
        $data['approval_detail']=$this->db->query("SELECT * FROM `adv_pmt` WHERE`adv_id`='$id'")->row();
        $data['wage']=$this->db->query("SELECT `wage` FROM `employee_detail` WHERE `emp_id`='$empid'")->row();
        $this->load->view('adv/adv_pmt_approval',$data);
    }
    
    public function delete_adv($id)
    {
        $this->db->query("DELETE FROM `adv_pmt` WHERE `adv_id`='{$id}'");
        header('location:'.base_url()."index.php/users/show_adv_pmt");
    }
    
    public function adv_pmt_approval_succees()
    {
        $inputall=$this->input->POST();
        $data=array(
            'ad_emp_id'=>$inputall['empid'],
            'ad_emp_name'=>$inputall['name'],
            'ad_pre_adv_date'=>$inputall['lastpaid'],
            'ad_adv_date'=>$inputall['date'],
            'ad_emp_attend'=>$inputall['attn'],
            'ad_amt_reqd'=>$inputall['amt_reqd'],
            'ad_sanction'=>$inputall['amt_sanct'],
            'ad_balance'=>$inputall['recover']
        );
        
        $this->db->insert('adv_pmt_details',$data);
        $this->db->query("UPDATE `adv_pmt` SET `adv_status`='Approved' WHERE `adv_id`='{$inputall['id']}'");
        header('location:'.base_url()."index.php/users/show_adv_pmt");
    }
    public function clear_amt()
    {
        $inputall=$this->input->POST();
        $data=array(
            'ad_emp_id'=>$inputall['empid'],
            'ad_emp_name'=>$inputall['empname'],
            'ad_adv_date'=>$inputall['date'],
            'ad_clear_amt'=>$inputall['clear_amt'],
            'ad_balance'=>$inputall['balance']
        );
        $this->db->insert('adv_pmt_details',$data);
        header('location:'.base_url()."index.php/users/show_adv_pmt_details/{$inputall['empid']}");
    }
}
