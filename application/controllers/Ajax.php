<?php 

    class Ajax extends CI_Controller{
        
          private $perPage = 2;


    	/**
    
        * Get All Data from this method.
    
        *
    
        * @return Response
    
       */
    
        public function index(){
          $this->load->database();
          $count = $this->db->get('community')->num_rows();
    
         if(!empty($this->input->get("page"))){
          $start = ceil($this->input->get("page") * $this->perPage);
          $query = $this->db->limit($start, $this->perPage)->get("community");

          $data['community'] = $query->result();
          $result = $this->load->view('site/community/data', $data);
          echo json_encode($result);

         }else{
          $query = $this->db->limit(2, $this->perPage)->get("community");
          $data['community'] = $query->result();
    	  $this->load->view('site/community/ajax', $data);
    
         }
    
       }
    }

?>