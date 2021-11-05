<?php 

    class Privacy extends CI_Controller{
        
        public function index(){

            $data['privacy'] = $this->Data_model->display_privacy_policy();
            
            $this->load->view('privacy', $data);
        }    
    }

?>