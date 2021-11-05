<?php 

    class Link extends CI_Controller{
        
        public function view($slug){
            $email = $this->session->userdata('uemail');

            $data['profile'] = $this->Data_model->display_user_profile($slug);
            $data['count'] = $this->Data_model->display_user_post_count($slug);
            $data['community'] = $this->Data_model->display_user_community_post($slug);
            $data['comment'] = $this->Data_model->display_user_comments($email);
            
            //if(!empty($email)){
                $this->load->view('profile/link', $data);   
            //}else{
               // redirect('community/view');
            //}
        }
        
        public function view_new($slug){
            $email = $this->session->userdata('uemail');

            $data['profile'] = $this->Data_model->display_user_profile($slug);
            $data['count'] = $this->Data_model->display_user_post_count($slug);
            $data['community'] = $this->Data_model->display_user_community_post($slug);
            $data['comment'] = $this->Data_model->display_user_comments($email);
            
            //if(!empty($email)){
                $this->load->view('profile/link_new', $data);   
            //}else{
               // redirect('community/view');
            //}
        }
        
        public function answer($slug){
            $email = $this->session->userdata('uemail');
            
            $data['profile'] = $this->Data_model->display_user_profile($slug);
            $data['count'] = $this->Data_model->display_user_post_count($slug);
            $data['comment'] = $this->Data_model->display_user_comments($email);

            //if(!empty($email)){
                $this->load->view('site/link/answer', $data);   
            //}else{
                //redirect('community/view');
            //}
        }
        
        public function question($slug){
            $email = $this->session->userdata('uemail');

            $data['profile'] = $this->Data_model->display_user_details($email);
            $data['count'] = $this->Data_model->display_user_post_count($slug);
            $data['community'] = $this->Data_model->display_user_community_post($slug);

            //if(!empty($email)){
                $this->load->view('site/link/question', $data);   
            //}else{
              //  redirect('community/view');
            //}
        }
        
        public function post($slug){
            $email = $this->session->userdata('uemail');

            $data['profile'] = $this->Data_model->display_user_details($email);
            $data['count'] = $this->Data_model->display_user_post_count($slug);
            $data['community'] = $this->Data_model->display_user_community_post($slug);
            
            //if(!empty($email)){
                $this->load->view('site/link/post', $data);   
            //}else{
              //  redirect('community/view');
            //}
        }
        
        public function share($slug){
            $email = $this->session->userdata('uemail');

            $data['profile'] = $this->Data_model->display_user_details($email);
            $data['count'] = $this->Data_model->display_user_post_count($slug);
            
            //if(!empty($email)){
                $this->load->view('site/link/share', $data);   
            //}else{
              //  redirect('community/view');
            //}
        }
    }

?>