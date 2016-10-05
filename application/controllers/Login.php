<?php
if(!defined('BASEPATH')) exit('Hacking Attempt : Keluar dari sistem..!!');
class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_login');
        $this->load->library(array('form_validation','session'));
        $this->load->database();
        $this->load->helper('url');
    }
    public function index()
    {
        $session = $this->session->userdata('isLogin');
        if($session == FALSE)
        {
            redirect('Login/login_form');
        }else
        {
            redirect('Users');
        }
    }
    public function login_form()
    {
        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|md5');
        $this->form_validation->set_error_delimiters('<span class="error">', '</span>');
        if($this->form_validation->run()==FALSE)
        {
            $this->load->view('form_login');
        }else
        {
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $level=$this->db->query("SELECT * FROM employee_detail where username ='$username'")->row();
            $name=$this->db->query("SELECT * FROM employee_detail where username ='$username'")->row();
            $cek = $this->M_login->takeUser($username, $password, 1, $level);
            if($cek <> 0)
            {
                $this->session->set_userdata('isLogin', TRUE);
                $this->session->set_userdata('username',$username);
                $this->session->set_userdata('level',$level);
                $this->session->set_userdata('f_name', $name->emp_f_name);
                $this->session->set_userdata('l_name', $name->emp_l_name);
                $this->track();//jump to track
            }else
            {
                echo " <script>
                alert('Failed Login: Check your username and password!');
                history.go(-1);
                </script>";
            }
        }
    }
    public function track(){
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
            $data = array(
                'ip_address'=>$ip,
                'username'=>$this->session->userdata('username'),
                'f_name'=>$this->session->userdata('f_name'),
                'l_name'=>$this->session->userdata('l_name'),
                'time_stmp'=>date("h:i"),
                'am_pm'=>date("a"),
                'sess_date'=>date("Y-m-d"),
                'user_data'=>$this->session->userdata('username')." Logged In Account"
            );
        $this->db->insert('user_activities',$data); 
        $this->db->insert('user_online',$data); 
        
        redirect('Users');
    }
    public function logout()
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
            // $ip = ip2long($ip);
            $data = array(
                'ip_address'=>$ip,
                'username'=>$this->session->userdata('username'),
                'f_name'=>$this->session->userdata('f_name'),
                'l_name'=>$this->session->userdata('l_name'),
                'time_stmp'=>date("h:i"),
                'am_pm'=>date("a"),
                'sess_date'=>date("Y-m-d"),
                'user_data'=>$this->session->userdata('username')." Logged Out Account"
            );
        $this->db->insert('user_activities',$data); 
        $this->session->sess_destroy();
        $this->db->query("DELETE FROM `user_online` WHERE `username`='{$this->session->userdata('username')}'");
        redirect('Login/login_form');
    }
}
?>
