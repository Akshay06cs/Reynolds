<?php

if(!defined('BASEPATH')) exit('Hacking Attempt : Get Out of the system ..!');
class M_login extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    public function takeUser($username, $password, $status, $level)
    {
        $this->db->select('*');
        $this->db->from('employee_detail');
        $this->db->where('username', $username);
        $this->db->where('password', $password);
        $query = $this->db->get();
        return $query->num_rows();
    }
    public function change_pwd($id,$newpassword,$oldpassword)
    {
        $this->db->set('password', md5($newpassword));
        $this->db->where('id', $id);
        $this->db->where('password', md5($oldpassword));
        $this->db->update('employee_detail');
    }
    public function userData($username)
    {
        $this->db->select('*');
        $this->db->where('username', $username);
        $query = $this->db->get('employee_detail');
        return $query->row();
    }
}
