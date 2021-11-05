<?php 

    class Partner extends CI_Controller{
        
        public function view(){
          $session_role = $this->session->userdata('urole');
          $session_email = $this->session->userdata('uemail');
    
          if($session_role == "admin"){
              $data['user_details'] = $this->Admin_model->display_user_details($session_email);
              $data['partner'] = $this->Admin_model->display_partner();

              $this->load->view('partner/view', $data);
          }else{ ?>
            <script>
                window.location.href="https://spiela.co.uk";
            </script>
          <?php }
        }
    
        public function add(){
          $submit_btn = $this->input->post('submit_add');
    
          if(isset($submit_btn)){
            $fullname = $this->input->post('fullname');
            $shuffle = rand(000, 999);
            $slug = strtolower("partner").'-'.$shuffle;
            
            $social = $this->input->post('social');
            $social_url = $this->input->post('social_url');
            
            $bio = $this->input->post('bio');
            $url = $this->input->post('url');

            $date = date('Y-m-d H:i:s');
    
            $files = $_FILES;
            $cpt1 = count($_FILES['fileToUpload']['name']);
    
            for($i=0; $i<$cpt1; $i++){
                $_FILES['fileToUpload']['name']= $files['fileToUpload']['name'][$i];
                $_FILES['fileToUpload']['type']= $files['fileToUpload']['type'][$i];
                $_FILES['fileToUpload']['tmp_name']= $files['fileToUpload']['tmp_name'][$i];
                $_FILES['fileToUpload']['error']= $files['fileToUpload']['error'][$i];
                $_FILES['fileToUpload']['size']= $files['fileToUpload']['size'][$i];
    
                $path = $_FILES['fileToUpload']['name'];
                $newName = time()."Image".".".pathinfo($path, PATHINFO_EXTENSION);
    
                $config1 = array(
                    'upload_path'   => "./uploads/../../uploads/partners/",
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
    
                $var = 1;
    
                $this->upload->do_upload('fileToUpload');
              }
    
              $add_array = array(
                'fullname' => $fullname,
                'slug' => $slug,
                'bio' => $bio,
                'image' => $newName,
                'url' => $url,
                'created_date' => $date
              );
              
              $add_social_array = array(
                'social' => $social,
                'slug' => $slug,
                'url' => $social_url
              );
    
            $add_partners = $this->Admin_model->add_partner($add_array);
            $add_partner_social = $this->Admin_model->add_partner_social($add_social_array);
    
            if($add_partners && $add_partner_social){ ?>
                <script>
                   alert('Partner created successfully');
                   window.location.href="<?php echo site_url('partner/view'); ?>";
                </script>
         <?php }else{ ?>
                <script>
                   alert('Registration Failed');
                   window.location.href="<?php echo site_url('partner/view'); ?>";
                </script>
      <?php }
          }
        }
        
        public function add_social(){
          $submit_btn = $this->input->post('submit_add');
    
          if(isset($submit_btn)){
            $fullname = $this->input->post('fullname');
            $url = $this->input->post('url');
    
              $add_array = array(
                'fullname' => $fullname,
                'slug' => $slug,
                'bio' => $bio,
                'image' => $newName,
                'url' => $url,
                'created_date' => $date
              );
    
            $add_partners = $this->Admin_model->add_partner($add_array);
    
            if($add_partners){ ?>
                <script>
                   alert('Partner created successfully');
                   window.location.href="<?php echo site_url('partner/view'); ?>";
                </script>
         <?php }else{ ?>
                <script>
                   alert('Registration Failed');
                   window.location.href="<?php echo site_url('partner/view'); ?>";
                </script>
      <?php }
          }
        }
    
        public function edit($id){
            $submit = $this->input->post('submit_edit');
    
            $session_status = $this->session->userdata('ustatus');
            $session_email = $this->session->userdata('uemail');
    
            $data['user_details'] = $this->Admin_model->display_user_details($session_email);
            $data['partner'] = $this->Admin_model->display_partner_by_id($id);
    
            $this->load->view('partner/edit', $data);
    
            if(isset($submit)){
              $fullname = $this->input->post('fullname');
              $bio = $this->input->post('bio');
              $url = $this->input->post('url');

              $date = date('Y-m-d H:i:s');
              
              $edit_array = array(
               'fullname' => $fullname,
               'bio' => $bio,
               'url' => $url
             );
             
               $edit_post = $this->Admin_model->update_partner($id, $edit_array);
    
              /*$edit_post_title = $this->Admin_model->update_community_title($id, $str_title);
              $edit_post_body = $this->Admin_model->update_community_body($id, $body);
              $edit_post_meta = $this->Admin_model->update_community_meta($id, $meta);
              $edit_post_category = $this->Admin_model->update_community_category($id, $str_category); */
              //$edit_post_banner = $this->Admin_model->update_community_banner($id, $banner);
    
              if($edit_post){ ?>
                <script>
                  alert('Edited Successfully');
                  window.location.href="<?php echo base_url('partner/view'); ?>";
                </script>
              <?php
              }else{ ?>
                 <script>
                    alert('Failed');
                    window.location.href="<?php echo site_url('partner/view'); ?>";
                 </script>
         <?php }
          }
          /*}else{
            redirect('login');
          }*/
        }
        
        public function edit_image($id){
            $submit = $this->input->post('submit_edit_image');
    
            $session_status = $this->session->userdata('ustatus');
            $session_email = $this->session->userdata('uemail');
    
            $data['user_details'] = $this->Admin_model->display_user_details($session_email);
            $data['community'] = $this->Admin_model->display_community_by_id($id);
    
            $this->load->view('partner/edit', $data);
    
            if(isset($submit)){
              $files = $_FILES;
              $cpt1 = count($_FILES['fileToUpload']['name']);
    
              for($i=0; $i<$cpt1; $i++){
                $_FILES['fileToUpload']['name']= $files['fileToUpload']['name'][$i];
                $_FILES['fileToUpload']['type']= $files['fileToUpload']['type'][$i];
                $_FILES['fileToUpload']['tmp_name']= $files['fileToUpload']['tmp_name'][$i];
                $_FILES['fileToUpload']['error']= $files['fileToUpload']['error'][$i];
                $_FILES['fileToUpload']['size']= $files['fileToUpload']['size'][$i];
    
                $path = $_FILES['fileToUpload']['name'];
                $newName = time()."Image".".".pathinfo($path, PATHINFO_EXTENSION);
    
                $config1 = array(
                    'upload_path'   => "./uploads/../../uploads/partners/",
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
    
                $var = 1;
    
                $this->upload->do_upload('fileToUpload');
              }
              
              $edit_array = array(
               'image' => $newName,
             );
             
               $edit_post = $this->Admin_model->update_partner_image($id, $edit_array);
    
              /*$edit_post_title = $this->Admin_model->update_community_title($id, $str_title);
              $edit_post_body = $this->Admin_model->update_community_body($id, $body);
              $edit_post_meta = $this->Admin_model->update_community_meta($id, $meta);
              $edit_post_category = $this->Admin_model->update_community_category($id, $str_category); */
              //$edit_post_banner = $this->Admin_model->update_community_banner($id, $banner);
    
              if($edit_post){ ?>
                <script>
                  alert('Edited Post');
                  window.location.href="<?php echo base_url('partner/view'); ?>";
                </script>
              <?php
              }else{ ?>
                 <script>
                    alert('Post Failed');
                    window.location.href="<?php echo site_url('partner/view'); ?>";
                 </script>
         <?php }
          }
          /*}else{
            redirect('login');
          }*/
        }
    
        public function delete(){
          $did = $this->input->post('del_id');
          $this->Admin_model->delete_partner($did);
        }
    }
?>