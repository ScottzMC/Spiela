<?php 

    class Support_post extends CI_Controller{
        
        public function view(){
          $session_role = $this->session->userdata('urole');
          $session_email = $this->session->userdata('uemail');
    
          if($session_role == "admin"){
              $data['user_details'] = $this->Admin_model->display_user_details($session_email);
              $data['support_post'] = $this->Admin_model->display_support_post();
        
              $this->load->view('support_post/view', $data);
          }else{ ?>
            <script>
                window.location.href="https://spiela.co.uk";
            </script>
          <?php }
        }
        
        public function edit($id){
            $submit = $this->input->post('submit_edit');
    
            $session_status = $this->session->userdata('ustatus');
            $session_email = $this->session->userdata('uemail');
    
            $data['user_details'] = $this->Admin_model->display_user_details($session_email);
            $data['support_post'] = $this->Admin_model->display_support_post_by_id($id);
    
            $this->load->view('support_post/edit', $data);
    
            if(isset($submit)){
              $title = $this->input->post('title');
              $str_title = str_replace(' ', '-', $title);
              $body = $this->input->post('body');
              $meta = $this->input->post('meta');
              $status = $this->input->post('post_status');
              $category = $this->input->post('category');
              $str_category = str_replace(' ', '-', $category);
    
              $time = time();
              $date = date('Y-m-d H:i:s');
              
              $edit_array = array(
               'title' => $str_title,
               'body' => $body,
               'post_status' => $status,
               'meta' => $meta,
               'category' => $str_category
             );
             
               $edit_post = $this->Admin_model->update_support_post($id, $edit_array);
               
               $query = $this->db->query("SELECT support_post.posted_by, users.slug, users.email, users.firstname, users.lastname FROM support_post INNER JOIN users ON support_post.posted_by = users.slug 
                  WHERE support_post.id = '$id' ")->result();
                  foreach($query as $qry){
                      $user_email = $qry->email;
                      $user_slug = $qry->slug;
                      $user_firstname = $qry->firstname;
                      $user_lastname = $qry->lastname;
                  }
               
               // Notifying user by Email

                  $subject = "Notification from your Post";
                  if($status == "Approved"){
                    $body = "Hello $user_firstname $user_lastname, your support post has been Approved. Please find the link to view your support post - https://spiela.co.uk/support_post/detail/$id";
                  }else if($status == "Rejected"){
                    $body = "Hello $user_firstname $user_lastname, your support post has been Rejected. Please find the link to view your support post - https://spiela.co.uk/support_post/detail/$id";
                  }
                  $type = "Notification of Support Post";
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
    
              if($edit_post && $this->email->send()){ ?>
                <script>
                  alert('Edited Post');
                  window.location.href="<?php echo base_url('support_post/view'); ?>";
                </script>
              <?php
              }else{ ?>
                 <script>
                    alert('Post Failed');
                    window.location.href="<?php echo site_url('support_post/view'); ?>";
                 </script>
         <?php }
          }
          /*}else{
            redirect('login');
          }*/
        }
    
        public function delete(){
          $did = $this->input->post('del_id');
          $this->Admin_model->delete_support_post($did);
        }
    }

?>