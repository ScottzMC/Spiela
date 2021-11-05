<?php 

    class Partner extends CI_Controller{
        
        function __construct() { 
            parent::__construct(); 
             
            // Load facebook oauth library 
            $this->load->library('facebook'); 
            $this->load->library('google'); 
             
            // Load user models 
            $this->load->model('facebook_model');
            $this->load->model('google_login_model'); 
        }
        
        // Partner
        
        public function index(){
            $config['base_url'] = base_url()."partner";
          $total_row = $this->Data_model->record_partner_count();
          $config['total_rows'] = $total_row;
          $config['per_page'] = 100;
          $config['uri_segment'] = 3;
          $choice = $config['total_rows']/$config['per_page'];
          $config['num_links'] = round($choice);
    
          $config['full_tag_open'] = '<ul style="margin-left: 100px;" class="pagination">';
          $config['full_tag_close'] = '</ul>';
    
          $config['first_tag_open'] = '<li>';
          $config['last_tag_open'] = '<li>';
    
          $config['next_tag_open'] = '<li>';
          $config['prev_tag_open'] = '<li>';
    
          $config['num_tag_open'] = '<li>';
          $config['num_tag_close'] = '</li>';
    
          $config['first_tag_close'] = '</li>';
          $config['last_tag_close'] = '</li>';
    
          $config['next_tag_close'] = '</li>';
          $config['prev_tag_close'] = '</li>';
    
          $config['cur_tag_open'] = '<li class="active" style="background: #366e63;"><span style="background: #366e63; border: #366e63;"><b>';
          $config['cur_tag_close'] = '</b></span></li>';
    
          $this->pagination->initialize($config);
    
          $page = ($this->uri->segment(3))? $this->uri->segment(3) : 0;
          
          $data['event'] = $this->Data_model->display_event();
          $data["partner"] = $this->Data_model->fetch_partner_data($config["per_page"], $page);
          
          $data['fbAuthUrl'] =  $this->facebook->login_url();
          $data['googleAuthUrl'] = $this->google->login_url();
    
          $this->load->view('partner/view', $data);   
        }
        
        public function profile($id){
            $query = $this->db->query("SELECT slug FROM partners WHERE id = '$id' ")->result();
            foreach($query as $qry){
                $slug = $qry->slug;
            }
            
            $data['profile'] = $this->Data_model->display_partner_by_id($id);
            $data['advert'] = $this->Data_model->display_partner_by_advert($slug);
            //$data['event'] = $this->Data_model->display_partner_by_event($slug);
            //$data['social'] = $this->Data_model->display_partner_by_social($slug);
            
            $this->load->view('partner/test', $data);
        }
        
        // End of Partner 
    }

?>