<?php

  class Community extends CI_Controller{

    public function view(){
      $session_role = $this->session->userdata('urole');
      $session_email = $this->session->userdata('uemail');

      if($session_role == "admin"){
          $data['user_details'] = $this->Admin_model->display_user_details($session_email);
          $data['community'] = $this->Admin_model->display_community();
          $data['notice_board'] = $this->Admin_model->display_notice_board();

          $this->load->view('community/view', $data);
      }else{ ?>
        <script>
            window.location.href="http://localhost/spiela";
        </script>
      <?php }
    }

    public function add(){
      $submit_btn = $this->input->post('submit_add');

      if(isset($submit_btn)){
        $title = $this->input->post('title');
        $str_title = str_replace(' ', '-', $title);
        $body = $this->input->post('body');
        $meta = $this->input->post('meta');
        $verified = $this->input->post('verified');

        $category = $this->input->post('category');
        $str_category = str_replace(' ', '-', $category);
        
        $posted_by = $this->input->post('posted_by');

        $time = time();
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
                'upload_path'   => "./uploads/../../uploads/community/",
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

          $add_community_array = array(
            'title' => $str_title,
            'body' => $body,
            'meta' => $meta,
            'category' => $str_category,
            'verified' => $verified,
            'posted_by' => $posted_by,
            'banner' => $newName,
            'created_time' => $time,
            'created_date' => $date
          );

        $add_community = $this->Admin_model->add_community($add_community_array);

        if($add_community){ ?>
            <script>
               alert('Post created successfully');
               window.location.href="<?php echo site_url('community/view'); ?>";
            </script>
     <?php }else{ ?>
            <script>
               alert('Registration Failed');
               window.location.href="<?php echo site_url('community/view'); ?>";
            </script>
  <?php }
      }
    }

    public function edit($id){
        $submit = $this->input->post('submit_edit');

        $session_status = $this->session->userdata('ustatus');
        $session_email = $this->session->userdata('uemail');

        $data['user_details'] = $this->Admin_model->display_user_details($session_email);
        $data['community'] = $this->Admin_model->display_community_by_id($id);

        $this->load->view('community/edit', $data);

        if(isset($submit)){
          $title = $this->input->post('title');
          $str_title = str_replace(' ', '-', $title);
          $body = $this->input->post('body');
          $meta = $this->input->post('meta');
          $applied = $this->input->post('applied');
          $applied_url = $this->input->post('applied_url');
          //$banner = $this->input->post('banner');
          $category = $this->input->post('category');
          $str_category = str_replace(' ', '-', $category);
          $verified = $this->input->post('verified');

          $time = time();
          $date = date('Y-m-d H:i:s');
          
          $edit_array = array(
           'title' => $str_title,
           'body' => $body,
           'meta' => $meta,
           'category' => $str_category,
           'applied' => $applied,
           'verified' => $verified,
           'applied_url' => $applied_url
         );
         
           $edit_post = $this->Admin_model->update_community_post($id, $edit_array);

          /*$edit_post_title = $this->Admin_model->update_community_title($id, $str_title);
          $edit_post_body = $this->Admin_model->update_community_body($id, $body);
          $edit_post_meta = $this->Admin_model->update_community_meta($id, $meta);
          $edit_post_category = $this->Admin_model->update_community_category($id, $str_category); */
          //$edit_post_banner = $this->Admin_model->update_community_banner($id, $banner);

          if($edit_post){ ?>
            <script>
              alert('Edited Post');
              window.location.href="<?php echo base_url('community/view'); ?>";
            </script>
          <?php
          }else{ ?>
             <script>
                alert('Post Failed');
                window.location.href="<?php echo site_url('community/view'); ?>";
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

        $this->load->view('community/edit', $data);

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
                'upload_path'   => "./uploads/../../uploads/community/",
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
           'banner' => $newName,
         );
         
           $edit_post = $this->Admin_model->update_community_image($id, $edit_array);

          /*$edit_post_title = $this->Admin_model->update_community_title($id, $str_title);
          $edit_post_body = $this->Admin_model->update_community_body($id, $body);
          $edit_post_meta = $this->Admin_model->update_community_meta($id, $meta);
          $edit_post_category = $this->Admin_model->update_community_category($id, $str_category); */
          //$edit_post_banner = $this->Admin_model->update_community_banner($id, $banner);

          if($edit_post){ ?>
            <script>
              alert('Edited Post');
              window.location.href="<?php echo base_url('community/view'); ?>";
            </script>
          <?php
          }else{ ?>
             <script>
                alert('Post Failed');
                window.location.href="<?php echo site_url('community/view'); ?>";
             </script>
     <?php }
      }
      /*}else{
        redirect('login');
      }*/
    }

    public function delete(){
      $did = $this->input->post('del_id');
      $this->Admin_model->delete_community($did);
    }
    
    // Comments 
    
    public function view_comment($id){
      $session_role = $this->session->userdata('urole');
      $session_email = $this->session->userdata('uemail');

      if($session_role == "admin"){
          $data['user_details'] = $this->Admin_model->display_user_details($session_email);
          $data['comment'] = $this->Admin_model->display_comment_by_id($id);
          $data['community_id'] = $id;

          $this->load->view('community/view_comment', $data);
      }else{ ?>
        <script>
            window.location.href="http://localhost/spiela";
        </script>
      <?php }
    }
    
    public function add_comment($community_id){
        $submit = $this->input->post('submit_edit');

        $session_status = $this->session->userdata('ustatus');
        $session_email = $this->session->userdata('uemail');

        $data['user_details'] = $this->Admin_model->display_user_details($session_email);

        $this->load->view('community/edit_comment', $data);

        if(isset($submit)){
          $firstname = $this->input->post('firstname');
          $lastname = $this->input->post('lastname');
          $email = $this->input->post('email');
          $message = $this->input->post('message');
          preg_match_all("/<a[^>]*>(.*?)<\/a>/si", $message, $men);
          $message = strip_tags($message);
          
          $files = $_FILES;
          $user_image = '';
          if(!empty($files['user_image']['name'])) {
              $path = $files['user_image']['name'];
              $user_image = "Spiela".time().".".pathinfo($path, PATHINFO_EXTENSION);
              $front_base =  dirname(FCPATH);
              $_FILES['files'] = $files['user_image'];
              $config1 = array(
                  'upload_path'   => $front_base."/uploads/review/",                  
                  'allowed_types' => "gif|jpg|png|jpeg",
                  'overwrite'     => TRUE,
                  'file_name'     => $user_image,
                  'encrypt_name'  => FALSE,
                  'max_size'      => "7000"  // Can be set to particular file size
                  //'max_height'    => "768",
                  //'max_width'     => "1024"
              );

              $this->load->library('upload', $config1);
              
              $this->upload->initialize($config1);
              $this->upload->do_upload('user_image');          
          }
          
          $time = time();
          $code = "ABCDEFGH";
          $unique = rand(000, 999);          
          
          $add_array = array(
           'community_id' => $community_id,
           'unique_id' => $code.$unique,
           'firstname' => $firstname,
           'lastname' => $lastname,
           'email' => $email,
           'user_image' => $user_image,
           'message' => $message,
           'created_time' => $time,
          );
         
           $edit_post = $this->Admin_model->add_comment_post($community_id, $add_array);

          if($edit_post){ ?>
            <script>
              alert('Comment Added');
              window.location.href="<?php echo base_url('community/view_comment/'.$community_id); ?>";
            </script>
          <?php
          }else{ ?>
             <script>
                alert('Post Failed');
                window.location.href="<?php echo site_url('community/view_comment/'.$community_id); ?>";
             </script>
     <?php }
      }
      /*}else{
        redirect('login');
      }*/
    }
    
    public function edit_comment($community_id, $id){
        $submit = $this->input->post('submit_edit');

        $session_status = $this->session->userdata('ustatus');
        $session_email = $this->session->userdata('uemail');

        $data['user_details'] = $this->Admin_model->display_user_details($session_email);
        $data['edit_comment'] = $this->Admin_model->display_edited_comment_by_id($community_id, $id);

        $this->load->view('community/edit_comment', $data);

        if(isset($submit)){
          $firstname = $this->input->post('firstname');
          $lastname = $this->input->post('lastname');
          $email = $this->input->post('email');
          $message = $this->input->post('message');
          
          $edit_array = array(
           'firstname' => $firstname,
           'lastname' => $lastname,
           'email' => $email,
           'message' => $message
         );
         
           $edit_post = $this->Admin_model->update_comment_post($community_id, $id, $edit_array);

          if($edit_post){ ?>
            <script>
              alert('Edited Comment');
              window.location.href="<?php echo base_url('community/view'); ?>";
            </script>
          <?php
          }else{ ?>
             <script>
                alert('Post Failed');
                window.location.href="<?php echo site_url('community/view'); ?>";
             </script>
     <?php }
      }
      /*}else{
        redirect('login');
      }*/
    }
    
    public function delete_comment(){
      $did = $this->input->post('del_id');
      $this->Admin_model->delete_comment($did);
    }
    
    // End of Comments 
    
    // Notice Board 
    
    public function add_notice_board(){
      $session_status = $this->session->userdata('ustatus');
      $session_email = $this->session->userdata('uemail');
      $session_slug = $this->session->userdata('uslug');
      $session_image = $this->session->userdata('uimage');
        
      $submit_btn = $this->input->post('submit_add');

      if(isset($submit_btn)){
        $title = $this->input->post('title');
        $social_url = $this->input->post('social_url');
        $social_type = $this->input->post('social_type');
        $expiry_date = $this->input->post('expiry_date');

        $time = time();
        $date = date('Y-m-d H:i:s');

        $add_notice_array = array(
          'title' => $title,
          'slug' => $session_slug,
          'slug_image' => $session_image,
          'social_url' => $social_url,
          'social_type' => $social_type,
          'expiry_date' => $expiry_date,
          'created_time' => $time,
          'created_date' => $date
        );

        $add_notice = $this->Admin_model->add_notice_board($add_notice_array);

        if($add_notice){ ?>
            <script>
               alert('Event created successfully');
               window.location.href="<?php echo site_url('community/view'); ?>";
            </script>
     <?php }else{ ?>
            <script>
               alert('Registration Failed');
               window.location.href="<?php echo site_url('community/view'); ?>";
            </script>
  <?php }
      }
    }
    
    public function edit_notice_board($id){
        $submit = $this->input->post('submit_edit');

        $session_status = $this->session->userdata('ustatus');
        $session_email = $this->session->userdata('uemail');
        $session_slug = $this->session->userdata('uslug');
        $session_image = $this->session->userdata('uimage');

        $data['user_details'] = $this->Admin_model->display_user_details($session_email);
        $data['edit_notice_board'] = $this->Admin_model->display_notice_board_by_id($id);

        $this->load->view('community/edit_notice_board', $data);

        if(isset($submit)){
          $title = $this->input->post('title');
          $social_url = $this->input->post('social_url');
          $social_type = $this->input->post('social_type');
          //$expiry_date = $this->input->post('expiry_date');

          $time = time();
          $date = date('Y-m-d H:i:s');

        $edit_notice_array = array(
          'title' => $title,
          'slug' => $session_slug,
          'slug_image' => $session_image,
          'social_url' => $social_url,
          'social_type' => $social_type
        );
         
           $edit_post = $this->Admin_model->update_notice_board($id, $edit_notice_array);

          if($edit_post){ ?>
            <script>
              alert('Updated Successfully');
              window.location.href="<?php echo base_url('community/view'); ?>";
            </script>
          <?php
          }else{ ?>
             <script>
                alert('Update Failed');
                window.location.href="<?php echo site_url('community/view'); ?>";
             </script>
     <?php }
      }
      /*}else{
        redirect('login');
      }*/
    }
    
    public function delete_notice_board(){
      $did = $this->input->post('del_id');
      $this->Admin_model->delete_notice_board($did);
    }
    
    // End of Notice Board 

  }



?>
