<?php 

    class Community extends CI_Controller{
        
        function __construct() { 
            parent::__construct(); 
             
            // Load facebook oauth library 
            $this->load->library('facebook'); 
            $this->load->library('google'); 
             
            // Load user models 
            $this->load->model('facebook_model');
            $this->load->model('google_login_model'); 
        }
        
        public function view(){
          $config['base_url'] = base_url()."community/view";
          $total_row = $this->Data_model->record_community_count();
          $config['total_rows'] = $total_row;
          $config['per_page'] = 25;
          $config['uri_segment'] = 3;
          $choice = $config['total_rows']/$config['per_page'];
          $config['num_links'] = round($choice);
    
          $config['full_tag_open'] = '<div class="pagination" style="margin-left: 0px;">';
          $config['full_tag_close'] = '</div>';
    
          $config['first_tag_open'] = '<a>';
          $config['last_tag_open'] = '<a>';
    
          $config['next_tag_open'] = '<a>&raquo;';
          $config['prev_tag_open'] = '<a>&laquo;';
    
          //$config['num_tag_open'] = '<a>';
          //$config['num_tag_close'] = '</a>';
    
          $config['first_tag_close'] = '</a>';
          $config['last_tag_close'] = '</a>';
    
          $config['next_tag_close'] = '</a>';
          $config['prev_tag_close'] = '</a>';
    
          $config['cur_tag_open'] = '<a class="active">';
          $config['cur_tag_close'] = '</a>';
    
          $this->pagination->initialize($config);
    
          $page = ($this->uri->segment(3))? $this->uri->segment(3) : 0;
          
          $data['event'] = $this->Data_model->display_event();
          $data["community"] = $this->Data_model->fetch_community_data($config["per_page"], $page);
          $data["popular"] = $this->Data_model->fetch_popular_community_data($config["per_page"], $page);
          $data["verified"] = $this->Data_model->fetch_verified_community_data($config["per_page"], $page);
          
          $data["trending"] = $this->Data_model->display_popular_post();
          
          $data['fbAuthUrl'] =  $this->facebook->login_url();
          $data['googleAuthUrl'] = $this->google->login_url();
    
          $this->load->view('view', $data);
        }
        
        public function view_new(){
          $config['base_url'] = base_url()."community/view_new";
          $total_row = $this->Data_model->record_community_count();
          $config['total_rows'] = $total_row;
          $config['per_page'] = 25;
          $config['uri_segment'] = 3;
          $choice = $config['total_rows']/$config['per_page'];
          $config['num_links'] = round($choice);
    
          $config['full_tag_open'] = '<div class="pagination" style="margin-left: 0px;">';
          $config['full_tag_close'] = '</div>';
    
          $config['first_tag_open'] = '<a>';
          $config['last_tag_open'] = '<a>';
    
          $config['next_tag_open'] = '<a>&raquo;';
          $config['prev_tag_open'] = '<a>&laquo;';
    
          //$config['num_tag_open'] = '<a>';
          //$config['num_tag_close'] = '</a>';
    
          $config['first_tag_close'] = '</a>';
          $config['last_tag_close'] = '</a>';
    
          $config['next_tag_close'] = '</a>';
          $config['prev_tag_close'] = '</a>';
    
          $config['cur_tag_open'] = '<a class="active">';
          $config['cur_tag_close'] = '</a>';
    
          $this->pagination->initialize($config);
    
          $page = ($this->uri->segment(3))? $this->uri->segment(3) : 0;
          
          $data['event'] = $this->Data_model->display_event();
          $data["community"] = $this->Data_model->fetch_community_data($config["per_page"], $page);
          $data["popular"] = $this->Data_model->fetch_popular_community_data($config["per_page"], $page);
          $data["verified"] = $this->Data_model->fetch_verified_community_data($config["per_page"], $page);
          
          $data["trending"] = $this->Data_model->display_popular_post();
          
          $data['fbAuthUrl'] =  $this->facebook->login_url();
          $data['googleAuthUrl'] = $this->google->login_url();
    
          $this->load->view('view_new', $data);
        }
        
        public function category($category){
          $config['base_url'] = base_url()."community/category";
          $total_row = $this->Data_model->record_community_category_count($category);      
          $config['total_rows'] = $total_row;
          $config['per_page'] = 12;
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
    
          $page = ($this->uri->segment(3))? $this->uri->segment(4) : 0;
    
          $data['event'] = $this->Data_model->display_event();
          $data["category"] = $this->Data_model->fetch_community_category_data($category, $config["per_page"], $page);
          $data['guideline'] = $this->Data_model->community_guidelines($category);
          $data["trending"] = $this->Data_model->display_popular_post();   
          
          $data['fbAuthUrl'] =  $this->facebook->login_url();
          $data['googleAuthUrl'] = $this->google->login_url(); 
          
          $this->load->view('category', $data);
        }
        
        public function getUsersData($r = "") {
            $url = base_url('uploads/profile/');
            $data = $this->db->query("SELECT id, CONCAT(firstname,' ',lastname) as name, email as info, email as href, CONCAT('".$url."', profile_image) as avatar from users")->result_array();
            echo json_encode($data);
        }
        
        // Detail 
        
    public function detail($id){
        
      $query = $this->db->query("SELECT id FROM community WHERE id = '$id' ")->result();
      foreach($query as $qry){
          $q_id = $qry->id;
      }
      
      /*$sequel = $this->db->query("SELECT unique_id FROM community_review WHERE community_id = '$id' ")->result();
      foreach($sequel as $sql){
          $com_id = $sql->community_id;
          $unique_id = $sql->unique_id;
      }*/

      if(!$query){
          show_404(); 
        }else{
            
          $data['detail'] = $this->Data_model->display_community_by_id($id);
          $data['review'] = $this->Data_model->display_community_review($id);
          if(!empty($unique_id)){
         // $data['reply'] = $this->Data_model->display_community_reply($unique_id);
          }else{ echo ''; }
          $data["trending"] = $this->Data_model->display_popular_post();
          $data['profile_image'] = $this->Data_model->display_community_post_profile_image($id);

          $sequel = $this->db->query("SELECT id, community_id, firstname, lastname, email FROM community_review WHERE community_id = '$id' ")->result();
          $data['fbAuthUrl'] =  $this->facebook->login_url();
          $data['googleAuthUrl'] = $this->google->login_url();
          
          foreach($sequel as $sql){
              $review_id = $sql->id;
              $review_community_id = $sql->community_id;
              $review_firstname = $sql->firstname;
              $review_lastname = $sql->lastname;
              $review_email = $sql->email;
          }
         
      
       //$data['reply'] = $this->Data_model->display_community_reply($id, $review_id, $review_unique_id);
      
      //if(!empty($data)){
        $session_slug = $this->session->userdata('uslug');

        $submit = $this->input->post('submit');

          $this->load->view('detail', $data);
        if(isset($submit) && !empty($session_slug)){
            $oMessage = $this->input->post('message');
            preg_match_all("/[\._a-zA-Z0-9-]+@[\._a-zA-Z0-9-]+/i", $oMessage, $matches);
          //$str_shuffle = $this->getRandString();
          $code = "ABCDEFGH";
          $unique = rand(000, 999);
          $unique_id = $code.$unique;
          $firstname = $this->input->post('firstname');
          $lastname = $this->input->post('lastname');
          $email = $this->input->post('email');
          $title = $this->input->post('title');
          
          $message = $this->input->post('message');
          preg_match_all("/<a[^>]*>(.*?)<\/a>/si", $message, $men);
          $message = strip_tags($message);
          if(isset($men) && isset($men[1]) && $men[1]) {
              foreach($men[1] as $mg) {
                  $tt = "<b style='color: green;'>".$mg."</b>";
                  $message = str_replace($mg, $tt, $message);
              }
          }
          
          $profile_image = $this->input->post('profile_image');
          $time = time();
          $date = date('Y-m-d H:i:s');

          $add_array = array(
            'community_id' => $id,
            'unique_id' => $unique_id,
            'firstname' => $firstname,
            'lastname' => $lastname,
            'email' => $email,
            'message' => $message,
            'created_time' => $time,
            'created_date' => $date
          );

          $array = $this->security->xss_clean($add_array);
          $add_review = $this->Data_model->add_community_review($array);
          
          // Retrieving Community comments

          $query = $this->db->query("SELECT community.posted_by, users.slug, users.email, users.firstname, users.lastname FROM community INNER JOIN users ON community.posted_by = users.slug 
          WHERE community.id = '$id' ")->result();
          foreach($query as $qry){
              $user_email = $qry->email;
              $user_slug = $qry->slug;
              $user_firstname = $qry->firstname;
              $user_lastname = $qry->lastname;
          }
          
          $sequel = $this->db->query("SELECT id, community_id, firstname, lastname, email FROM community_review WHERE community_id = '$id' ")->result();
          foreach($sequel as $sql){
              $comment_id = $sql->id;
              $comment_community_id = $sql->community_id;
              $comment_firstname = $sql->firstname;
              $comment_lastname = $sql->lastname;
              $comment_email = $sql->email;
          }
          
          // End of Retrieving Community comments
          
          // Notifying user by Email

          $subject = "Notification from your Post";
          $body = "Hello $user_firstname $user_lastname, user $comment_firstname $comment_lastname has made a comment on your post and you can check the community post. Please find the link - https://spiela.co.uk/community/detail/$id";
          $type = "Notification of Community";
          $time = time();
          $date = date('Y-m-d H:i:s');

          $config = Array(
         'protocol' => 'smtp',
         'smtp_host' => 'smtp.spiela.co.uk',
         'smtp_port' => 25,
         'smtp_user' => 'admin@spiela.co.uk', // change it to account email
         'smtp_pass' => 'Warrior11-', // change it to account email password
         'mailtype' => 'html',
         'charset' => 'iso-8859-1',
         'wordwrap' => TRUE
         );

         $this->load->library('email', $config);
         $this->load->library('encryption');
         $this->email->from('admin@spiela.co.uk', "Spiela Team");
         $this->email->to("$user_email");
         //$this->email->cc("testcc@domainname.com");
         $this->email->subject("$subject");
         $this->email->message("$body"); 
         
         // End of Notifying user by Email 

          if($add_review && $this->email->send()){
              if(isset($matches) && isset($matches[0]) && count($matches[0]) > 0) {
                  $mdata = $this->db->select('id, firstname, lastname, email')->from('users')->where_in('email', $matches[0])->get()->result_array();
                  foreach($mdata as $m) {
                     $body = "Hello ".$m['firstname'] ." ".$m['lastname']."\n$firstname $lastname has tagged you in the post " . base_url('community/detail/'.$id) . " click the link to respond to them.";
                     $this->load->library('email', $config);
                     $this->load->library('encryption');
                     $this->email->from('admin@spiela.co.uk', "Spiela Team");
                     $this->email->to($m['email']);
                     //$this->email->cc("testcc@domainname.com");
                     $this->email->subject("$firstname $lastname tagged you on a comment");
                     $this->email->message($body);
                     $this->email->send();
                  }
              }
          ?>
            <script>
              alert('Message Sent');
              window.location.href="<?php echo base_url('community/detail/'.$id); ?>";
            </script>
          <?php
          }else{ ?>
            <script>
              alert('Message Failed');
              window.location.href="<?php echo base_url('community/detail/'.$id); ?>";
            </script>
          <?php }
        }     
       }
    }
    
    public function reply($id){
        
        $submit_reply = $this->input->post('submit_reply');

        if(isset($submit_reply)){
            
        // Retrieving Author details
            
          $query = $this->db->query("SELECT community.posted_by, users.slug, users.email, users.firstname, users.lastname FROM community INNER JOIN users ON community.posted_by = users.slug 
          WHERE community.id = '$id' ")->result();
          foreach($query as $qry){
              $user_email = $qry->email;
              $user_slug = $qry->slug;
              $user_firstname = $qry->firstname;
              $user_lastname = $qry->lastname;
          }
          
        // End of Retrieving Author details 
          
          $review_id = $this->input->post('review_id');
          $profile_image = $this->input->post('profile_image');
          $reply_firstname = $this->input->post('reply_firstname');
          $reply_lastname = $this->input->post('reply_lastname');
          $reply_email = $this->input->post('reply_email');
          $reply_message = $this->input->post('reply_message');
          $unique_id = $this->input->post('unique_id');
          $time = time();
          $date = date('Y-m-d H:i:s');

          $reply_array = array(
            'community_id' => $id,
            'review_id' => $review_id,
            'unique_id' => $unique_id,
            'reply_firstname' => $reply_firstname,
            'reply_lastname' => $reply_lastname,
            'reply_email' => $reply_email,
            'message' => $reply_message,
            'profile_image' => $profile_image,
            'created_time' => $time,
            'created_date' => $date
          );
            
          $array = $this->security->xss_clean($reply_array);
          $add_review = $this->Data_model->add_community_reply($array);

          $subject = "Notification of user who replied your comment";
          $body = "Hello $user_firstname $user_lastname, the user $reply_firstname $reply_lastname has replied you on this post. Please find the link - https://spiela.co.uk/community/detail/$id";
          $type = "Notification of Community";
          $time = time();
          $date = date('Y-m-d H:i:s');

          $config = Array(
         'protocol' => 'smtp',
         'smtp_host' => 'smtp.spiela.co.uk',
         'smtp_port' => 25,
         'smtp_user' => 'admin@spiela.co.uk', // change it to account email
         'smtp_pass' => 'Warrior11-', // change it to account email password
         'mailtype' => 'html',
         'charset' => 'iso-8859-1',
         'wordwrap' => TRUE
         );

         $this->load->library('email', $config);
         $this->load->library('encryption');
         $this->email->from('admin@spiela.co.uk', "Spiela Team");
         $this->email->to("$user_email");
         //$this->email->cc("testcc@domainname.com");
         $this->email->subject("$subject");
         $this->email->message("$body");

        if($add_review && $this->email->send()){ 
            
        ?>
            <script>
              alert('Message Sent');
              window.location.href="<?php echo base_url('community/detail/'.$id); ?>";
            </script>
          <?php
          }else{ ?>
            <script>
              alert('Message Failed');
              //window.location.href="<?php echo base_url('community/detail/'.$id); ?>";
            </script>
          <?php }
        }    
    }
    
    // Write Post

    public function write_post(){
      $this->form_validation->set_rules('title', 'Post Title', 'trim|required');
      $this->form_validation->set_rules('body', 'Post Body', 'trim|required');
      $session_slug = $this->session->userdata('uslug');
      $session_role = $this->session->userdata('urole');

      $form_valid = $this->form_validation->run();
      $submit = $this->input->post('submit_post');
      
      $query = $this->db->query("SELECT firstname, lastname, slug FROM users WHERE slug = '$session_slug' ")->result();
      foreach($query as $qry){
          $user_firstname = $qry->firstname;
          $user_lastname = $qry->lastname;
          $user_slug = $qry->slug;
      }

      //if($form_valid == FALSE){
        //$this->load->view('site/community/write_post');
      /*}else*/ 
      if(isset($submit) && !empty($session_slug)){
        $title = $this->input->post('title');
        $str_title = str_replace(' ', '-', $title);
        $body = $this->input->post('body');
        $category = $this->input->post('category');
        $str_category = str_replace(' ', '-', $category);
        $profile_image = $this->session->userdata('uimage');
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
          
          $allowedExts = array("jpeg", "jpg", "png", "JPG", "JPEG", "PNG", "mp4", "MP4");
          $extension = pathinfo($_FILES["fileToUpload"]["name"], PATHINFO_EXTENSION);

          $path = $_FILES['fileToUpload']['name'];
          if(!isset($_FILES['fileToUpload'])){
              $newName = "Community.jpg";
          }else{
              $newName = "Spiela".time().".".pathinfo($path, PATHINFO_EXTENSION);
              //$newName =  $_FILES['fileToUpload']['name'];
          }
          
          $config1 = array(
              'upload_path'   => "./uploads/community/",
              'allowed_types' => "jpg|png|jpeg|mp4",
              'overwrite'     => TRUE,
              'file_name'     => $newName,
              'encrypt_name'  => FALSE,
              'max_size'      => "10000",
              'image_library'   => 'gd2',
              'source_image'    =>  isset($image_data['full_path']) ? $image_data['full_path'] : '',
              'maintain_ratio'  =>  TRUE,
              'width'           =>  250,
              'height'          =>  250,
              // Can be set to particular file size
              //'max_height'    => "768",
              //'max_width'     => "1024"
          );

          $this->load->library('upload', $config1);
          $this->load->library('image_lib');
          $this->upload->initialize($config1);
          $this->image_lib->clear();
          $this->image_lib->initialize($config1);
          $this->image_lib->resize();

          $var = 1;
          
          /*if(!in_array($extension, $allowedExts)){ ?>
              <script>
                alert('Invalid Image Format | No Image Selected');
            </script>
    <?php }else if(in_array($extension, $allowedExts)){ 
            $this->upload->do_upload('fileToUpload');
          }*/          
          
          $result = $this->upload->do_upload('fileToUpload');
          if(!$result) $newName='';
        
        }
        
        if(in_array($extension, $allowedExts)){
          if(isset($_FILES['fileToUpload'])){
              $add_array = array(
                'title' => $str_title,
                'body' => $body,
                'posted_by' => $user_slug,
                'category' => $str_category,
                'banner' => $newName,
                'type' => "All",
                'created_time' => $time,
                'created_date' => $date
              );
          }else{
              $add_array = array(
                'title' => $str_title,
                'body' => $body,
                'posted_by' => $user_slug,
                'category' => $str_category,
                'banner' => 'Community.jpg',
                'type' => "All",
                'created_time' => $time,
                'created_date' => $date
              );
          }
        
            $add_post = $this->Data_model->add_community_post($add_array);
            $last_id = $this->db->insert_id();
            
            $config = Array(
             'protocol' => 'smtp',
             'smtp_host' => 'smtp.spiela.co.uk',
             'smtp_port' => 25,
             'smtp_user' => 'admin@spiela.co.uk', // change it to account email
             'smtp_pass' => 'Warrior11-', // change it to account email password
             'mailtype' => 'html',
             'charset' => 'iso-8859-1',
             'wordwrap' => TRUE
             );
             $this->load->library('email', $config);
             $this->load->library('encryption');
            
            $query = $this->db->query("SELECT firstname, lastname, email FROM users")->result();
            foreach($query as $qry){
                $db_firstname = $qry->firstname;
                $db_lastname = $qry->lastname;
                $db_email = $qry->email;
            }
            
            //foreach($query as $qry){
                $db_email = $qry->email;
                $subject = "User has submitted a Post";
                $body = "Hello community member, $session_slug has posted: $title, check it out - https://spiela.co.uk/community/detail/$last_id";
        
                $this->email->from('admin@spiela.co.uk', "Spiela Team");
                $this->email->to($db_email);
                $this->email->subject($subject);
                $this->email->message($body);
                $this->email->send();
                $this->email->clear();
           //}
        }
        
         $session_slug = $this->session->userdata('uslug');
         
         $array = array(
              'community_id' => $last_id,
              'title' => $str_title,
              'ip_address' => $this->input->ip_address()
          );
         
         $this->Data_model->addVote($array);
        
        if($add_post && in_array($extension, $allowedExts)){ 
        ?>
          <script>
            alert('Uploaded Post');
            window.location.href="<?php echo base_url('community/detail/'.$last_id); ?>";
          </script>
  <?php }else{ ?>
          <script>
            alert('Upload Failed');
            window.location.href="<?php echo site_url('community/view'); ?>";
          </script>
       <?php }
      }else{
        show_404();
      }
    }

    // End of Write Post
    
    // Edit Post 

    public function edit_post($id){
        $data['edit_post'] = $this->Data_model->display_post_to_edit($id);
        
        $session_status = $this->session->userdata('urole');
        $session_slug = $this->session->userdata('uslug');

        $submit = $this->input->post('submit_post');
        
        $query = $this->db->query("SELECT posted_by FROM community WHERE id = '$id' ")->result();
        foreach($query as $qry){
            $posted_by = $qry->posted_by;
        }


      if($session_status == "admin" || $session_status == "user"){
          if($session_slug == $posted_by){
            $this->load->view('edit_post', $data);
          }else{
              redirect('community/view');
          }
        if(isset($submit)){
          $title = $this->input->post('title');
          $str_title = str_replace(' ', '-', $title);
          $body = $this->input->post('body');
          $category = $this->input->post('category');
          $str_category = str_replace(' ', '-', $category);
          $banner = $this->input->post('banner');

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
                'upload_path'   => "./uploads/community/",
                'allowed_types' => "gif|jpg|png|jpeg|mp4",
                'overwrite'     => TRUE,
                'file_name'     => $newName,
                'encrypt_name'  => FALSE,
                'max_size'      => "10000"  // Can be set to particular file size
                //'max_height'    => "768",
                //'max_width'     => "1024"
            );

            $this->load->library('upload', $config1);
            $this->load->library('image_lib');
            $this->upload->initialize($config1);
            $this->image_lib->clear();
            $this->image_lib->initialize($config1);
            $this->image_lib->resize();

            $var = 1;

            $result = $this->upload->do_upload('fileToUpload');
            if(!$result) $newName='';
          }
          
          $update_array = array(
            'title' => $str_title,
            'body' => $body,
            'category' => $str_category,
            'banner' => $newName
          );
          
          $update_data = $this->Data_model->update_community_post($id, $update_array);

          //$edit_post_title = $this->Data_model->update_community_title($id, $str_title);
          //$edit_post_body = $this->Data_model->update_community_body($id, $body);
          //$edit_post_category = $this->Data_model->update_community_category($id, $category);
          //$edit_post_banner = $this->Data_model->update_community_banner($id, $banner);

          if($update_data){ ?>
            <script>
              alert('Edited Post');
              window.location.href="<?php echo base_url('community/view'); ?>";
            </script>
          <?php
            /*$statusMsg = '<div class="alert alert-success>Review was Successful</div>';
            $this->session->set_flashdata('msg', $statusMsg);
            $this->load->view('site/community_detail', $data);
            redirect('community/detail/'.$id);*/
          }else{
            $statusMsg = '<div class="alert alert-danger>Review Failed</div>';
            $this->session->set_flashdata('msgError', $statusMsg);
            $this->load->view('edit_post', $data);
          }
        }
      }else{
        redirect('login');
      }
    } 

    // End of Edit Post

    // Delete Post

    public function delete_post(){
      $did = $this->input->post('del_id');
      $this->Data_model->delete_community_post($did);
    }

    // End of Delete Post
        
        // Add Event 
    
    public function add_event(){
        $slug = $this->session->userdata('uslug');
        $profile_image = $this->session->userdata('uimage');
        
        $submit = $this->input->post('btn_submit');
        
        if(isset($submit)){ 
            $title = $this->input->post('title'); 
            $type = $this->input->post('social_type');
            $url = $this->input->post('url');
            $expiry_date = $this->input->post('expiry_date');
            $time = time();
            $date = date('Y-m-d H:i:s');
             
            $add_array = array(
                'title' => $title,
                'slug' => $slug,
                'slug_image' => $profile_image,
                'social_type' => $type,
                'social_url'=> $url,
                'expiry_date' => $expiry_date,
                'created_time' => $time,
                'created_date' => $date
            );
            
            $add_event = $this->Data_model->add_event($add_array);
            
            if($add_event){
        ?>
            <script>
                alert('Added Event Successfully');
                window.location.href="<?php echo site_url('community/view'); ?>";
            </script>
      <?php }else{ ?>
            <script>
                alert('Event Failed');
                window.location.href="<?php echo site_url('community/view'); ?>";
            </script>
     <?php } ?>
  <?php }
    }
    
    // End of Add Event 
    
    public function upVoting(){
      $id = $this->input->post('vot_id');
      $this->Data_model->upVote($id);
    }

    public function downVoting(){
      $id = $this->input->post('vot_id');
      $this->Data_model->downVote($id);
    }
    
    public function addBadge(){
      $id = $this->input->post('vot_id');
      $badge = $this->input->post('badge');
      $this->Data_model->addBadge($id,$badge);
    }
    
    public function sharePost(){
      $id = $this->input->post('post_id');
      $this->Data_model->sharePost($id);
    }
    
    public function getRandString() {
        $seed = str_split('0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ');
        shuffle($seed);
        $rand = '';
        foreach (array_rand($seed, 16) as $k) $rand .= $seed[$k];
        return $rand;
    }
    
    public function searhQuery() {
      $query = $this->input->get('query');
      $data = $this->Data_model->search_data(20, 1, $query);
      $count = $this->Data_model->search_data_count($query);
      $result['total_count'] = $count;
      $result['items'] = $data;
      echo json_encode($result);
    }
    
  }

?>