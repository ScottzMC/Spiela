<?php 

    class Profile extends CI_Controller{
        
        public function view(){
            $email = $this->session->userdata('uemail');
            $slug = $this->session->userdata('uslug'); 
            
            $data['profile'] = $this->Data_model->display_user_details($email);
            $data['community'] = $this->Data_model->display_user_community_post($slug);
            $data['comment'] = $this->Data_model->display_user_comments($email);
            $data['count'] = $this->Data_model->display_user_post_count($slug);

            if(!empty($email)){
                $this->load->view('profile/view', $data);   
            }else{
                redirect('community/view');
            }
        }
        
        public function edit_profile(){
            $email = $this->session->userdata('uemail');
            $slug = $this->session->userdata('uslug'); 
            
            $data['profile'] = $this->Data_model->display_user_details($email);
            $data['community'] = $this->Data_model->display_user_community_post($slug);
            $data['count'] = $this->Data_model->display_user_post_count($slug);

            if(!empty($email)){
                $this->load->view('profile/edit_profile', $data);   
            }else{
                redirect('community/view');
            }
        }
        
        public function image(){
            $email = $this->session->userdata('uemail');
            $slug = $this->session->userdata('uslug'); 
            
            $data['profile'] = $this->Data_model->display_user_details($email);
            $data['community'] = $this->Data_model->display_user_community_post($slug);
            $data['count'] = $this->Data_model->display_user_post_count($slug);

            if(!empty($email)){
                $this->load->view('profile/image', $data);   
            }else{
                redirect('community/view');
            }
        }
        
        public function answer(){
            $email = $this->session->userdata('uemail');
            $slug = $this->session->userdata('uslug'); 
            
            $data['count'] = $this->Data_model->display_user_post_count($slug);
            $data['comment'] = $this->Data_model->display_user_comments($email);

            if(!empty($email)){
                $this->load->view('site/profile/answer', $data);   
            }else{
                redirect('community/view');
            }
        }
        
        public function question(){
            $email = $this->session->userdata('uemail');
            $slug = $this->session->userdata('uslug'); 
            
            $data['profile'] = $this->Data_model->display_user_details($email);
            $data['count'] = $this->Data_model->display_user_post_count($slug);
            $data['community'] = $this->Data_model->display_user_community_post($slug);

            if(!empty($email)){
                $this->load->view('site/profile/question', $data);   
            }else{
                redirect('community/view');
            }
        }
        
        public function post(){
            $email = $this->session->userdata('uemail');
            $slug = $this->session->userdata('uslug'); 
            
            $data['profile'] = $this->Data_model->display_user_details($email);
            $data['count'] = $this->Data_model->display_user_post_count($slug);
            $data['community'] = $this->Data_model->display_user_community_post($slug);
            
            if(!empty($email)){
                $this->load->view('site/profile/post', $data);   
            }else{
                redirect('community/view');
            }
        }
        
        
        public function share(){
            $email = $this->session->userdata('uemail');
            $slug = $this->session->userdata('uslug'); 
            
            $data['profile'] = $this->Data_model->display_user_details($email);
            $data['count'] = $this->Data_model->display_user_post_count($slug);
            
            if(!empty($email)){
                $this->load->view('site/profile/share', $data);   
            }else{
                redirect('community/view');
            }
        }
        
        public function update_profile(){
          $session_email = $this->session->userdata('uemail');
          $data['profile_details'] = $this->Data_model->display_user_details($session_email);
    
          $submit = $this->input->post('edit_profile');

      if(!empty($session_email)){
          if(isset($submit)){
           $first_name = $this->input->post('first_name');
           $last_name = $this->input->post('last_name');
           $company = $this->input->post('company');
           $bio = $this->input->post('bio');
           $work_email = $this->input->post('work_email');
           $work_url = $this->input->post('work_url');
           $dob = $this->input->post('dob');
           
           $interest = $this->input->post('interest');
           
           $imp_interest = implode(',', $interest);
           
           $array = array(
                'firstname' => $first_name,
                'lastname' => $last_name,
                'bio' => $bio,
                'dob' => $dob,
                'interest' => $imp_interest,
                'company' => $company,
                'work_email' => $work_email,
                'work_url' => $work_url
           );
           
           $edit_profile = $this->Data_model->update_user_profile($array, $session_email);
           
           /*$edit_firstname = $this->Data_model->update_user_firstname($session_email, $first_name);
           $edit_lastname = $this->Data_model->update_user_lastname($session_email, $last_name);
           $edit_bio = $this->Data_model->update_user_bio($session_email, $bio);
           $edit_dob = $this->Data_model->update_user_dob($session_email, $dob);
           $edit_interest = $this->Data_model->update_user_interest($session_email, $imp_interest);
           $edit_company = $this->Data_model->update_user_company($session_email, $company);
           $edit_work_email = $this->Data_model->update_user_work_email($session_email, $work_email);
           $edit_work_url = $this->Data_model->update_user_work_url($session_email, $work_url);*/

            //if($edit_firstname || $edit_lastname || $edit_bio || $edit_dob || $edit_interest || $edit_company || $edit_work_email || $edit_work_url){ 
            if($edit_profile){ 
            ?>
              <script>
                alert('Updated Successfully');
                window.location.href="<?php echo site_url('profile/view'); ?>";
              </script>
        <?php }else{ ?>
              <script>
                alert('Update Failed');
                window.location.href="<?php echo site_url('profile/view'); ?>";
              </script>
            <?php }

       } 
       
       
      }else{
          redirect('login');
      }
     }
     
     public function update_image(){
        $session_email = $this->session->userdata('uemail');
        $submit_image = $this->input->post('edit_image');

         if(isset($submit_image)){

           $files = $_FILES;
           $cpt1 = count($_FILES['fileToUpload']['name']);

            for($i=0; $i<$cpt1; $i++){
              $_FILES['fileToUpload']['name']= $files['fileToUpload']['name'][$i];
              $_FILES['fileToUpload']['type']= $files['fileToUpload']['type'][$i];
              $_FILES['fileToUpload']['tmp_name']= $files['fileToUpload']['tmp_name'][$i];
              $_FILES['fileToUpload']['error']= $files['fileToUpload']['error'][$i];
              $_FILES['fileToUpload']['size']= $files['fileToUpload']['size'][$i];

              $path = $_FILES['fileToUpload']['name'];
              $newName = "Spiela".time().".".pathinfo($path, PATHINFO_EXTENSION);

              $config1 = array(
                  'upload_path'   => "./uploads/profile/",
                  'allowed_types' => "gif|jpg|png|jpeg",
                  'overwrite'     => TRUE,
                  'file_name'     => $newName,
                  'encrypt_name'  => FALSE,
                  'max_size'      => "7000"  // Can be set to particular file size
                  //'max_height'    => "768",
                  //'max_width'     => "1024"
              );

              $this->load->library('upload', $config1);
              $this->upload->initialize($config1);

              $this->upload->do_upload('fileToUpload');
              //$images[] = $fileName1;
            }
            
            $edit_new_image = $this->Data_model->update_new_user_image($session_email, $newName); 
            
            
            if($edit_new_image){ 
               
            ?>
              <script>
                alert('Updated Successfully');
                window.location.href="<?php echo site_url('profile/view'); ?>";
              </script>
        <?php }else{ ?>
              <script>
                alert('Update Failed');
                window.location.href="<?php echo site_url('profile/view'); ?>";
              </script>
            <?php }

       }
     }
    }

?>