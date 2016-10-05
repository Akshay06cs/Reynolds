
<?php
    class Inspection extends CI_Controller
    {
        public function __construct()
        {
            parent::__construct();
            $this->load->model('Insp_model');
            $this->load->helper('url');
        }
        public function index()
        {
            //$data['mat1']=$this->db->query("SELECT des ")->result();
            
            $data['ref_no']=$this->db->query("SELECT ref_no FROM inspection_call ORDER BY ref_no DESC LIMIT 1")->row();
            
            $data['stage']=$this->db->query("SELECT * FROM select_stage")->result();
            //print_r($data);
           $this->load->view('inspt_call_accd11',$data);
        }
        
        //save inspection 
               
        public function saveInspection()
        {
       
        $inputall = $this->input->post(); 
        $data = array
        (
                'ref_no' => $inputall['ref_n'],
                'date' => $inputall['ref_date'],
                'obn_no'=>$inputall['obn_no'],
                'customer'=>$inputall['customer'],
                'to_addr'=>$inputall['to_addr'],
                'city'=>$inputall['city'],
                'state'=>$inputall['state'],
                //'country'=>$inputall['country'],
                'pin'=>$inputall['pin'],
                //'c_phone'=>$inputall['c_phone'],
                //'description'=>$inputall['description'],
                'engineer_name'=>$inputall['engineer_name'],
                //'stage'=>$inputall['stage'],
                'proposed_doi'=>$inputall['proposed_doi'],
                'weekly_off'=>$inputall['weekly_off'],
                'contact_person'=>$inputall['contact_person'],
                'phone'=>$inputall['phone'],
                'email'=>$inputall['email'],
                'poi'=>$inputall['poi'],
                'status'=>$inputall['status']
        );
            $this->db->insert('inspection_call',$data);
            $id2=$this->input->post('ref_n'); 
            for($i = 0;$i<count($inputall['sel']);$i++)
            {
                $data_de=array
                (
                    'ref_no'=>$id2,
                    'sel'=>$inputall['sel'][$i],
                    'item_desc'=>$inputall['item_desc'][$i],
                    'mat_desc'=>$inputall['mat_desc'][$i],
                    'remarks'=>$inputall['remarks'][$i]
                    
                );
                $this->db->insert('inspection_detail',$data_de);
              
            }
        header('location:'.base_url()."index.php/inspection/view_ic_list");
    }
        
        
        
        
        public function inspection_accord()
        {
            $this->load->view('inspt_call_accd');
        }
        
        public function obn_no()
        {
            $term=$this->input->POST('term',TRUE);
            $this->load->model('Insp_model');
            $obn=$this->Insp_model->get_obn_no($term);
            echo json_encode($obn);
            
        }
        
        public function engineer_names()
        {
            $term=$this->input->POST('term',TRUE);
            $this->load->model('insp_model');
            $engineer=$this->Insp_model->get_engineer($term);
            echo json_encode($engineer);
        }
        
        /*public function search()
        {
            $keyword = $this->input->post('term');
 
            $data['response'] = 'false'; //Set default response
 
            $query = $this->insp_model->sw_search($keyword); //Model DB search
 
            if($query->num_rows() > 0)
            {
                $data['response'] = 'true'; //Set response
                $data['message'] = array(); //Create array
                foreach($query->result() as $row)
                {
                    $data['message'][] = array('label'=> $row->friendly_name, 'value'=> $row->friendly_name); //Add a row to array
                }
            }
            echo json_encode($data);
        }
        
        public function search_rcpl()
        {
            $search=$this->input->post('rcpl_wo_no');
            $this->load->model('insp_model');
            $query = $this->insp_model->get_rcpl($search);
            echo json_encode ($query);
        }*/

        
        public function autocomplete()
        {
            $this->load->view('ac');
        }
        
        public function mat_desc()
        {
            $term =$this->input->POST('term',true);
            $mat_desc =$this->Insp_model->get_mat_desc($term);
            echo json_encode($mat_desc);
        }
        
        public function grade_desc()
        {
            $id=$this->input->POST('id');
            $data=$this->Insp_model->get_grade_desc($id);
            echo json_encode($data);
        }
        
        public function contact_detail()
        {
            $term=$this->input->POST('term',true);
            $contact_detail=$this->Insp_model->get_contact_detail($term);
            echo json_encode($contact_detail);
        }
        
        public function credentials()
        {
            $id=$this->input->POST('id');
            $data=$this->Insp_model->get_credentials($id);
        }
        
        public function customer()
        {
            $term=$this->input->POST('term',true);
            $customer=$this->Insp_model->get_customer($term);
            //print_r($customer);   
            echo json_encode($customer);
        }
        
         public function cust_address()
        {
            $cid =$this->input->POST('id');
            //echo $cid;
            $data=$this->Insp_model->get_cust_address($cid);
            //print_r($data); 
            echo json_encode($data);
        }
        
        public function item_description()
        {
            $term=$this->input->POST('term',TRUE);
            $item_desc=$this->Insp_model->get_item_description($term);
            echo json_encode($item_desc);
        }
        
         public function view_ic_list()
         {
            $data['r']=$this->db->query('SELECT * FROM inspection_call');
            $this->load->library('session');
            //$data['level']=$this->session->userdata('level');
            $this->load->view('show_ic1',$data);
        }
        
        public function print_ic($id)
        {
            $data['r']=$this->db->query("SELECT * FROM inspection_call where ref_no ='$id'")->row();
            //$data['s']=$this->db->query("SELECT * FROM inspection_detail where ref_no ='$id'")->row();
            $this->load->view('inspt_call',$data);
        }
        
         public function delete_ic($id)
        {
            $this->db->query("DELETE FROM inspection_call WHERE ref_no='{$id}'");
            $this->db->query("DELETE FROM inspection_detail WHERE ref_no='{$id}'");
            header('location:'.base_url()."index.php/inspection/view_ic_list");
        }
        
         public function update_ic_status()
        {
            $id =$this->input->post('id');
            $status =$this->input->post('status');
            $this->db->query("UPDATE inspection_call SET status = '{$status}' WHERE ref_no='{$id}'"); 
        }
        
        public function current()
        {
            $this->load->view('inspt_call');
        }
        
        public function getMat_desc()
        {
        $id=$this->input->post('id',TRUE); 
        //print_r($id);
        $grade=$this->db->query("SELECT grade from part WHERE category ='{$id}'")->result();    
        //print_r($grade);
       // echo json_encode($grade);
        //foreach($abcd as $ab)
        //echo '<option value="'.$ad->pid.'">'.$ab->grade.'</option>';
        
        //$output = null;  
      //foreach ($grade['abcd'] as $row)  
      //{  
         //here we build a dropdown item line for each query result  
          
        // $output = "<option value='".$row->pid."'>".$row->grade."</option>";  
      //}  
      //echo $output;
       
        
        //working
        ?>
            <link rel='stylesheet' type='text/css' href="<?php echo base_url("assets/css/bootstrap.min.css");?>" />
            <div class="container" style="width:105%">
                <div class="form-group">
            <?php
        
        
            //}
             
           // Using the form_dropdown helper function to get the new dropdown.
           //print form_dropdown('grd',$arrFinal,'class="form-control"');
            ?>
               <select class="form-control" name="grd">
                    <?php
                    foreach ($grade as $gr) {
                 
            
                    //foreach($arrFinal as $arr)
                        //{
                        echo'<option value="'.$arrFinal[$gr->grade].'">'.$gr->grade.'</option>';
                        }
                    
                    ?>
                    
               </select>
                    </div>
            </div>
       
        <?php
         }
            
            
        
        
        
        
        public function stage_selection()
        {
            $term=$this->input->POST('term',true);
            $stage=$this->insp_model->get_stage_selection($term);
            //print_r($stage);
             echo json_encode($stage);
        }
        public function mat_id()
        {
            $term=$this->input->POST('term',TRUE);
            $mat_id=$this->db->query("SELECT pid, CONCAT(category,' ',moc,' ',grade,' ',thickness,thickness_uom,' ',outer_diameter,od_uom,' ',od,' ',bwg,' ',pipe_schedule,' ',casting_pattern,' ',threading,threading_uom) As name FROM part WHERE (CONCAT(category,' ',moc,' ',grade,' ',thickness,thickness_uom,' ',outer_diameter,od_uom,' ',od,' ',bwg,' ',pipe_schedule,' ',casting_pattern,' ',threading,threading_uom) LIKE '%" . $term . "%')")->result();
            echo json_encode($mat_id);
        }
        
        public function cust_details()
        {
            $sid =$this->input->post('id');
            $data=$this->Insp_model->get_cust_details($sid);
            echo json_encode($data);
            
          
        }
        
        public function select()
        {
            $this->load->view('ryt.html');
        }
        
        public function fitup_mat_description()
        {
            $term=$this->input->post('term',true);
            $f_desc=$this->insp_model->get_fitup_mat_description($term);
            echo json_encode($f_desc);
        }
        
        public function de_mat_description()
        {
            $term=$this->input->post('term',true);
            $de_desc=$this->insp_model->get_de_mat_description($term);
            echo json_encode($de_desc);
        }
        
        public function mu_mat_description()
        {
            $term=$this->input->post('term',true);
            $mu_desc=$this->insp_model->get_mu_mat_description($term);
            echo json_encode();
        }
        
        public function wp_mat_description()
        {
            $term=$this->input->post('term',true);
            $wp_desc=$this->insp_model->get_wp_mat_description($term);
            echo json_encode();
        }
        
        public function rcpl_nos()
        {   
            $id=$this->input->POST('id',true);
            $obn=$this->db->query("SELECT w_o_no FROM obn_details WHERE obn_no='$id'")->result();
            echo json_encode($obn);
        }
        
        public function parts_name()
        {
            //$term = $this->input->POST('term', TRUE);
            $names = $this->insp_model->get_parts();
            echo json_encode($names);
            //return $names;
        }
        
        public function items_description()
        {
            $term=$this->input->POST('term',true);
            $item_des=$this->Insp_model->get_items_descripiton($term);
            echo json_encode($item_des);
        }
        
        public function binded_sel()
        {
            $term=$this->input->POST('term',true);
            $bind_sel=$this->insp_model->get_binded_sel($term);
            echo json_encode($bind_sel);
        }
        
        public function Innvoice_pdf($id)
        {   
            $data['r']=$this->db->query("SELECT * FROM inspection_call where ref_no ='$id'")->row();
            $this->load->helper('pdfexport');
            $fileName = "IC-".$id."_".date('YmdHis') ;
            $pdfView  = $this->load->view('inspt_pdf', $data, TRUE); // we need to use a view as PDF content 
            $cssView  = $this->load->view('inspdf.css', NULL, TRUE);
            exportMeAsMPDF($fileName, $pdfView,$cssView,'P'); // then define the content and filename
            //Main Menu Call From View
        }
        
        public function print_stage()
        {
            $id=$this->input->post('id');
            $data=$this->insp_model->get_print_stage($id);
            echo json_encode($data);
          
        }
        
         public function edit_inspt($id)
        {
            $data['r']=$this->db->query("SELECT * FROM inspection_call WHERE ref_no='$id'")->row();
            $this->load->view('edit_inspt_call',$data);
        }
        
        public function updateInspection()
        {
            $inputall = $this->input->post(); 
            $data = array
            (
                'ref_no' => $inputall['ref_no'],
                'date' => $inputall['ref_date'],
                'obn_no'=>$inputall['obn_no'],
                'customer'=>$inputall['customer'],
                'to_addr'=>$inputall['to_addr'],
                'city'=>$inputall['city'],
                'state'=>$inputall['state'],
                'pin'=>$inputall['pin'],
                //'c_phone'=>$inputall['c_phone'],
                'engineer_name'=>$inputall['engineer_name'],
                'proposed_doi'=>$inputall['proposed_doi'],
                'weekly_off'=>$inputall['weekly_off'],
                'contact_person'=>$inputall['contact_person'],
                'phone'=>$inputall['phone'],
                'email'=>$inputall['email'],
                'poi'=>$inputall['poi'],
                'status'=>$inputall['status']
            );
            $id=$inputall['ref_no'];
            $this->db->where('ref_no',$id);
            $this->db->update('inspection_call',$data);
            $this->db->query("DELETE FROM inspection_detail WHERE ref_no='{$id}'");
          
            for($i=0;$i<count($inputall['sel']);$i++)
            {
                $data_de=array
                (
                    'ref_no'=>$id,
                    'sel'=>$inputall['sel'][$i],
                    'item_desc'=>$inputall['item_desc'][$i],
                    'mat_desc'=>$inputall['mat_desc'][$i],
                    'remarks'=>$inputall['remarks'][$i]
                    
                );
                $this->db->insert('inspection_detail',$data_de);
              
            }
        header('location:'.base_url()."index.php/inspection/view_ic_list");
        }
        
    }
    
?>

