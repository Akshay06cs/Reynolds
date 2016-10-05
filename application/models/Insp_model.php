<?php
    class Insp_model extends CI_Model
    {
        public function insp_get_ref()
        {
            $data=$this->db->query("SELECT ref_no FROM inspection_call ORDER BY ref_no DESC LIMIT 1")->row();
            return $data;
        }
        
        public function get_obn_no($term)
        {
            $this->db->order_by('id','ASC');
            $this->db->like("obn_no",$term);
            return $this->db->get('obn')->result_array();
        }
        
        public function get_engineer($term)
        {
            $this->db->order_by('id','ASC');
            $this->db->like("engineer",$term);
            return $this->db->get('rcpl')->result_array();
        }
        
        public function sw_search($keyword)
        {
            $this->db->order_by('id','ASC');
            $this->db->like("rcpl",$term,'both');
            $query=$this->db->get('rcpl');
            foreach($query->result_array() as $row)
            {
            //$data[$row['friendly_name']];
                $data[] = $row;
            }
        //return $data;
            return $query;
        }
        
        function get_rcpl($search){
		$this->db->select("rcpl");
		$whereCondition = array('rcpl' =>$search);
		$this->db->where($whereCondition);
		$this->db->from('rcpl');
		$query = $this->db->get();
		return $query->result();
	}
        
        public function get_mat_desc($term)
        {   
            //$this->db->order_by('pid','ASC');
           //$this->db->like("category",$term);
            //return $this->db->get('part')->result_array();
            
            return $this->db->query("SELECT MIN(pid) AS pid,category FROM part GROUP BY category")->result_array();
             
            
        }
        
        public function get_grade_desc($id)
        {
         $this->db->where("pid",$id);
         return $this->db->get('part')->row();
        }
        
        public function get_contact_detail($term)
        {
            $this->db->order_by('id','ASC');
            $this->db->like('contact_person',$term);
            return $this->db->get('contact_person_detail')->result_array();
        }
        
        public function get_credentials($id)
        {
            $this->db->where('id',$id);
            return $this->db->get('contact_person_detail')->row();
        }
        
        
         public function get_customer($term)
        {
            $this->db->order_by('cid','ASC');
            $this->db->like("cname",$term);
            return $this->db->get('cust')->result_array();
        }
        
        public function get_cust_address($cid)
        {
            $this->db->where('cid',$cid);
            return $this->db->get('cust')->row();
            
        }
        
        public function get_item_description($term)
        {
           $this->db->order_by('id','ASC');
           $this->db->like('job_description',$term);
           return $this->db->get('obn_projects')->result_array();
        }
        
        public function get_stage_selection($term)
        {
            $this->db->order_by('sid',"ASC");
            $this->db->like('stage',$term);
            return $this->db->get('select_stage')->result_array();
        }
        
        public function get_cust_details($sid)
        {
            $this->db->where('id',$sid);
            return $this->db->get('obn')->row();  
        }
        
        public function get_fitup_mat_description($term)
        {
            $this->db->order_by('fid',"ASC");
            $this->db->like('fitup_des',$term);
            return $this->db->get('fitup_details')->result_array();
        }
        
        public function get_de_mat_description($term)
        {
            $this->db->order_by('deid',"ASC");
            $this->db->like('de_des',$term);
            return $this->db->get('de_details')->result_array();
        }
        
        public function get_mu_mat_description($term)
        {
            $this->db->order_by('muid',"ASC");
            $this->db->like('mu_des',$term);
            return $this->db->get('mu_details')->result_array();
        }
        
        public function get_wp_mat_description($term)
        {
            $this->db->order_by('wpid',"ASC");
            $this->db->like('wp_des',$term);
            return $this->db->get('wp_details')->result_array();
        }
        
        public function get_parts()
        {
            return $this->db->query("SELECT DISTINCT category FROM part")->result();
            
            
        }
        
        public function get_items_descripiton($term)
        {
            $this->db->like('w_o_no',$term);
            return $this->db->get('obn_details')->result_array();
            
        }
        
        public function get_binded_sel($term)
        {
            return $this->db->query("SELECT w_o_no FROM obn_details WHERE obn_no='{$term}'")->result();
        }
        
        public function get_print_stage($id)
        {
            $this->db->where('sid',$id);
            return $this->db->get('select_stage')->row();
            
        }
        
    }
?>