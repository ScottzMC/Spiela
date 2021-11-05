<?php 

    class Register extends CI_Controller{
        
        function __construct() { 
            parent::__construct(); 
             
            // Load facebook oauth library 
            $this->load->library('facebook'); 
            $this->load->library('google'); 
             
            // Load user models 
            $this->load->model('facebook_model');
            $this->load->model('google_login_model'); 
        }
        
       public function index(){
           $banner = "Register";
           $data['banner'] = $this->Data_model->display_banner($banner);            
           $role = $this->input->post('role');
    
           $this->form_validation->set_rules('firstname', 'First Name', 'trim|required');
           $this->form_validation->set_rules('lastname', 'Last Name', 'trim|required');
           $this->form_validation->set_rules('email', 'Email Address', 'trim|required|valid_email|is_unique[users.email]');

           if(isset($role) && $role == "user"){
             $this->form_validation->set_rules('ethnicity', 'Ethnicity', 'trim');
             $this->form_validation->set_rules('job_industry', 'Job Industry', 'trim');
             $this->form_validation->set_rules('marital', 'Marital Status', 'trim');
             $this->form_validation->set_rules('user_looking', 'What are you looking for', 'trim');
           }else if(isset($role) && $role == "partner"){
             $this->form_validation->set_rules('part_ethnicity', 'Ethnicity', 'trim');
             $this->form_validation->set_rules('part_job_industry', 'Job Industry', 'trim');
             $this->form_validation->set_rules('part_marital', 'Marital Status', 'trim');
             $this->form_validation->set_rules('part_user_looking', 'What are you looking for', 'trim');
           }
           
           $this->form_validation->set_rules('hear_us', 'How did you hear about us', 'trim|required');
           $this->form_validation->set_rules('password', 'Password', 'trim|required');
           $this->form_validation->set_rules('cpassword', 'Confirm Password', 'trim|required|matches[password]');
    
           $form_valid = $this->form_validation->run();
           $submit_register = $this->input->post('register');
          
            // // Signup/Signin with Facebook 
          if($this->facebook->is_authenticated()){
                // Get user info from facebook 
                $fbUser = $this->facebook->request('get', '/me?fields=id,first_name,last_name,email,link,gender,picture'); 
                    
                // Preparing data for database insertion 
                $userData['oauth_provider'] = 'facebook'; 
                $userData['oauth_uid']    = !empty($fbUser['id'])?$fbUser['id']:'';; 
                $userData['firstname']    = !empty($fbUser['first_name'])?$fbUser['first_name']:''; 
                $userData['lastname']    = !empty($fbUser['last_name'])?$fbUser['last_name']:''; 
                $userData['email']        = !empty($fbUser['email'])?$fbUser['email']:''; 
                //$userData['gender']        = !empty($fbUser['gender'])?$fbUser['gender']:''; 
                //$userData['profile_image']    = !empty($fbUser['picture']['data']['url'])?$fbUser['picture']['data']['url']:''; 
                $userData['slug'] = strtolower($userData['firstname'].'-'.$userData['lastname']);
                $userData['status'] = 'Active';
                $userData['role'] = "user";
                //$userData['link']        = !empty($fbUser['link'])?$fbUser['link']:'https://www.facebook.com/'; 
                if(!empty($fbUser['picture']['data']['url'])) {                    
                    $profile_image = time().'.jpg';
                    copy($fbUser['picture']['data']['url'],FCPATH.'uploads/profile/'.$profile_image);
                    $userData['profile_image'] = $profile_image;
                }
                // Insert or update user data to the database 
                $userID = $this->facebook_model->checkUser($userData);                
                
                // Check user data insert or update status 
                if(!empty($userID)){ 
                    $data['userData'] = $userData; 
                     
                    // Store the user profile info into session 
                    $this->session->set_userdata('userData', $userData); 
                }else{ 
                   $data['userData'] = array(); 
                } 
                 
                // Facebook logout URL 
                $data['fbLogoutUrl'] = $this->facebook->logout_url(); 
                
                $sess_data = array(
                  'login' => TRUE,
                  'oauth_provider' => 'facebook',
                  'uid' => $userID,
                  'uemail' => $userData['email'],
                  'ufirstname' => $userData['firstname'],
                  'ulastname' => $userData['lastname'],
                  'uslug' => $userData['slug'],
                  'uimage' => $userData['profile_image'],
                  'urole' => $userData['role'],
                  'ustatus' => $userData['status']
                 );
    
             
              $this->session->set_userdata($sess_data);
              $status = $this->session->userdata('ustatus'); ?>
              <script>
                  alert('Login successfully');
                  window.location.href="<?php echo site_url('community/view'); ?>";
              </script> 
              <?php
            }else{ 
                // Facebook authentication url 
                $data['fbAuthUrl'] =  $this->facebook->login_url(); 
            } 
            
            // Signup/Signin with Google
            if(!empty($_GET["code"]))
            {
               if($token = $this->google->is_authenticated()){ 
                   $googleUser = (array)$this->google->getUser($token['access_token']);                   
                   
                   // Preparing data for database insertion 
                    $userData['oauth_provider'] = 'google'; 
                    $userData['oauth_uid']    = !empty($googleUser['id'])?$googleUser['id']:'';; 
                    $userData['firstname']    = !empty($googleUser['givenName'])?$googleUser['givenName']:''; 
                    $userData['lastname']    = !empty($googleUser['familyName'])?$googleUser['familyName']:''; 
                    $userData['email']        = !empty($googleUser['email'])?$googleUser['email']:''; 
                    //$userData['gender']        = !empty($fbUser['gender'])?$fbUser['gender']:''; 
                    //$userData['profile_image']    = !empty($fbUser['picture']['data']['url'])?$fbUser['picture']['data']['url']:''; 
                    $userData['slug'] = strtolower($userData['firstname'].'-'.$userData['lastname']);
                    $userData['status'] = 'Active';
                    $userData['role'] = "user";
                    //$userData['link']        = !empty($fbUser['link'])?$fbUser['link']:'https://www.facebook.com/'; 
                    if(!empty($googleUser['picture'])) {                    
                        $profile_image = time().'.jpg';
                        //copy($googleUser['picture'],FCPATH.'uploads/profile/'.$profile_image);
                        $fb_picture = "https://graph.facebook.com/".$userData['oauth_uid']."/picture?height=350&width=350";
                        copy($fb_picture,FCPATH.'uploads/profile/'.$profile_image);
                        $userData['profile_image'] = $profile_image;
                    }
                    // Insert or update user data to the database 
                    $userID = $this->google_login_model->checkUser($userData);                
                    
                    // Check user data insert or update status 
                    if(!empty($userID)){ 
                        $data['userData'] = $userData; 
                         
                        // Store the user profile info into session 
                        $this->session->set_userdata('userData', $userData); 
                        $sess_data = array(
                          'login' => TRUE,
                          'oauth_provider' => 'google',
                          'uid' => $userID,
                          'uemail' => $userData['email'],
                          'ufirstname' => $userData['firstname'],
                          'ulastname' => $userData['lastname'],
                          'uslug' => $userData['slug'],
                          'uimage' => $userData['profile_image'],
                          'urole' => $userData['role'],
                          'ustatus' => $userData['status']
                         );
            
                     
                      $this->session->set_userdata($sess_data);
                      $status = $this->session->userdata('ustatus'); ?>
                      <script>
                          alert('Login successfully');
                          window.location.href="<?php echo site_url('community/view'); ?>";
                      </script> 
                      <?php
                    }else{ 
                       $data['userData'] = array();
                       $data['googleAuthUrl'] = $this->google->login_url(); 
                    }                                         
               }
               else {
                   $data['googleAuthUrl'] = $this->google->login_url();
               }
            }
            else {
                $data['googleAuthUrl'] = $this->google->login_url();
            }
            
           //if($form_valid == FALSE){
            $this->load->view('register', $data);
          /*}else*/ if(isset($submit_register)){
            $firstname = $this->input->post('firstname');
            $lastname = $this->input->post('lastname');
            $gender = $this->input->post('gender');
            $role = $this->input->post('role');
            $company = $this->input->post('company');
            $work_email = $this->input->post('work_email');
            $work_url = $this->input->post('work_url');
            $dob = $this->input->post('date_of_birth');
            
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            $hashed_password = $this->bcrypt->hash_password($password);

            $location = $this->input->post('location');
            
            $ethnicity = $this->input->post('ethnicity');
            $part_ethnicity = $this->input->post('part_ethnicity');
            
            $job_industry = $this->input->post('job_industry');
            $part_job_industry = $this->input->post('part_job_industry');
            
            $employment = $this->input->post('employment');
            $part_marital = $this->input->post('part_marital');
            
            $user_looking = $this->input->post('user_looking');
            $part_user_looking = $this->input->post('part_user_looking');
            
            $hear_us = $this->input->post('hear_us');
            
            $profile_image = "Community.jpg";
            $shuffle = rand(00, 99);
            $slug = strtolower($firstname).$shuffle;
            $time = time();
            $date = date('Y-m-d H:i:s');
            
            if(isset($role) && $role == "user"){
              $role = "user";
              $job_industry = $this->input->post('job_industry');
              $user_looking = $this->input->post('user_looking');
              $employment = $this->input->post('employment');
              $ethnicity = $this->input->post('ethnicity');
            }else if(isset($role) && $role == "partner"){
              $role = "partner";
              $job_industry = $part_job_industry;
              $user_looking = $part_user_looking;
              $marital = $part_marital;
              $ethnicity = $part_ethnicity;
            }
            
            $subject = "Welcome to Spiela Community";
            $body = "Hi there,
            Thanks for registering and welcome to Spiela. We are a community that helps our members connect and network for the purposes of sharing ideas, providing access to learning, 
            and collaborating on current topics to find real solutions. 
            ";
              $type = "Register";
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
             $this->email->to("$email");
             //$this->email->cc("testcc@domainname.com");
             $this->email->subject("$subject");
             $this->email->message("$body");
            
            $add_user_array = array(
              'firstname' => $firstname,
              'lastname' => $lastname,
              'slug' => $slug,
              'email' => $email,
              'password' => $hashed_password,
              'role' => "user",
              'gender' => $gender,
              'status' => "Active",
              'company' => $company,
              'location' => $location,
              'ethnicity' => $ethnicity,
              'employment' => $employment,
              'job_industry' => $job_industry,
              'user_looking' => $user_looking,
              'hear_us' => $hear_us,
              'work_email' => $work_email,
              'work_url' => $work_url,
              'dob' => $dob,
              'profile_image' => $profile_image,
              'created_time' => $time,
              'created_date' => $date
            );
            
            $add_mail_array = array(
            'subject' => $subject,
            'body' => $body,
            'type' => $type,
            'sender' => $email,
            'created_time' => $time,
            'created_date' => $date
          );

            $add_user = $this->Data_model->create_user($add_user_array);
            
            if($add_user && $this->email->send()){ ?>
            <script>
                alert('Congratulations! You have now registered to Spiela. You can now login and join the community. Please check your email');
                window.location.href="<?php echo site_url('login'); ?>";
            </script>
            <?php
            }else{ ?>
              <script>
                alert('Registered failed');
                window.location.href="<?php echo site_url('register'); ?>";
              </script>
            <?php
            }          
         }
       }
       
       // Test 
       
       public function test_register(){
           $banner = "Register";
           $data['banner'] = $this->Data_model->display_banner($banner);            
           $role = $this->input->post('role');
    
           $this->form_validation->set_rules('firstname', 'First Name', 'trim|required');
           $this->form_validation->set_rules('lastname', 'Last Name', 'trim|required');
           $this->form_validation->set_rules('email', 'Email Address', 'trim|required|valid_email|is_unique[users.email]');

           if(isset($role) && $role == "user"){
             $this->form_validation->set_rules('ethnicity', 'Ethnicity', 'trim');
             $this->form_validation->set_rules('job_industry', 'Job Industry', 'trim');
             $this->form_validation->set_rules('marital', 'Marital Status', 'trim');
             $this->form_validation->set_rules('user_looking', 'What are you looking for', 'trim');
           }else if(isset($role) && $role == "partner"){
             $this->form_validation->set_rules('part_ethnicity', 'Ethnicity', 'trim');
             $this->form_validation->set_rules('part_job_industry', 'Job Industry', 'trim');
             $this->form_validation->set_rules('part_marital', 'Marital Status', 'trim');
             $this->form_validation->set_rules('part_user_looking', 'What are you looking for', 'trim');
           }
           
           $this->form_validation->set_rules('hear_us', 'How did you hear about us', 'trim|required');
           $this->form_validation->set_rules('password', 'Password', 'trim|required');
           $this->form_validation->set_rules('cpassword', 'Confirm Password', 'trim|required|matches[password]');
    
           $form_valid = $this->form_validation->run();
           $submit_register = $this->input->post('register');
          
            // // Signup/Signin with Facebook 
          if($this->facebook->is_authenticated()){
                // Get user info from facebook 
                $fbUser = $this->facebook->request('get', '/me?fields=id,first_name,last_name,email,link,gender,picture'); 
                    
                // Preparing data for database insertion 
                $userData['oauth_provider'] = 'facebook'; 
                $userData['oauth_uid']    = !empty($fbUser['id'])?$fbUser['id']:'';; 
                $userData['firstname']    = !empty($fbUser['first_name'])?$fbUser['first_name']:''; 
                $userData['lastname']    = !empty($fbUser['last_name'])?$fbUser['last_name']:''; 
                $userData['email']        = !empty($fbUser['email'])?$fbUser['email']:''; 
                //$userData['gender']        = !empty($fbUser['gender'])?$fbUser['gender']:''; 
                //$userData['profile_image']    = !empty($fbUser['picture']['data']['url'])?$fbUser['picture']['data']['url']:''; 
                $userData['slug'] = strtolower($userData['firstname'].'-'.$userData['lastname']);
                $userData['status'] = 'Active';
                $userData['role'] = "user";
                //$userData['link']        = !empty($fbUser['link'])?$fbUser['link']:'https://www.facebook.com/'; 
                if(!empty($fbUser['picture']['data']['url'])) {                    
                    $profile_image = time().'.jpg';
                    copy($fbUser['picture']['data']['url'],FCPATH.'uploads/profile/'.$profile_image);
                    $userData['profile_image'] = $profile_image;
                }
                // Insert or update user data to the database 
                $userID = $this->facebook_model->checkUser($userData);                
                
                // Check user data insert or update status 
                if(!empty($userID)){ 
                    $data['userData'] = $userData; 
                     
                    // Store the user profile info into session 
                    $this->session->set_userdata('userData', $userData); 
                }else{ 
                   $data['userData'] = array(); 
                } 
                 
                // Facebook logout URL 
                $data['fbLogoutUrl'] = $this->facebook->logout_url(); 
                
                $sess_data = array(
                  'login' => TRUE,
                  'oauth_provider' => 'facebook',
                  'uid' => $userID,
                  'uemail' => $userData['email'],
                  'ufirstname' => $userData['firstname'],
                  'ulastname' => $userData['lastname'],
                  'uslug' => $userData['slug'],
                  'uimage' => $userData['profile_image'],
                  'urole' => $userData['role'],
                  'ustatus' => $userData['status']
                 );
    
             
              $this->session->set_userdata($sess_data);
              $status = $this->session->userdata('ustatus'); ?>
              <script>
                  alert('Login successfully');
                  window.location.href="<?php echo site_url('community/view'); ?>";
              </script> 
              <?php
            }else{ 
                // Facebook authentication url 
                $data['fbAuthUrl'] =  $this->facebook->login_url(); 
            } 
            
            // Signup/Signin with Google
            if(!empty($_GET["code"]))
            {
               if($token = $this->google->is_authenticated()){ 
                   $googleUser = (array)$this->google->getUser($token['access_token']);                   
                   
                   // Preparing data for database insertion 
                    $userData['oauth_provider'] = 'google'; 
                    $userData['oauth_uid']    = !empty($googleUser['id'])?$googleUser['id']:'';; 
                    $userData['firstname']    = !empty($googleUser['givenName'])?$googleUser['givenName']:''; 
                    $userData['lastname']    = !empty($googleUser['familyName'])?$googleUser['familyName']:''; 
                    $userData['email']        = !empty($googleUser['email'])?$googleUser['email']:''; 
                    //$userData['gender']        = !empty($fbUser['gender'])?$fbUser['gender']:''; 
                    //$userData['profile_image']    = !empty($fbUser['picture']['data']['url'])?$fbUser['picture']['data']['url']:''; 
                    $userData['slug'] = strtolower($userData['firstname'].'-'.$userData['lastname']);
                    $userData['status'] = 'Active';
                    $userData['role'] = "user";
                    //$userData['link']        = !empty($fbUser['link'])?$fbUser['link']:'https://www.facebook.com/'; 
                    if(!empty($googleUser['picture'])) {                    
                        $profile_image = time().'.jpg';
                        //copy($googleUser['picture'],FCPATH.'uploads/profile/'.$profile_image);
                        $fb_picture = "https://graph.facebook.com/".$userData['oauth_uid']."/picture?height=350&width=350";
                        copy($fb_picture,FCPATH.'uploads/profile/'.$profile_image);
                        $userData['profile_image'] = $profile_image;
                    }
                    // Insert or update user data to the database 
                    $userID = $this->google_login_model->checkUser($userData);                
                    
                    // Check user data insert or update status 
                    if(!empty($userID)){ 
                        $data['userData'] = $userData; 
                         
                        // Store the user profile info into session 
                        $this->session->set_userdata('userData', $userData); 
                        $sess_data = array(
                          'login' => TRUE,
                          'oauth_provider' => 'google',
                          'uid' => $userID,
                          'uemail' => $userData['email'],
                          'ufirstname' => $userData['firstname'],
                          'ulastname' => $userData['lastname'],
                          'uslug' => $userData['slug'],
                          'uimage' => $userData['profile_image'],
                          'urole' => $userData['role'],
                          'ustatus' => $userData['status']
                         );
            
                     
                      $this->session->set_userdata($sess_data);
                      $status = $this->session->userdata('ustatus'); ?>
                      <script>
                          alert('Login successfully');
                          window.location.href="<?php echo site_url('community/test_view'); ?>";
                      </script> 
                      <?php
                    }else{ 
                       $data['userData'] = array();
                       $data['googleAuthUrl'] = $this->google->login_url(); 
                    }                                         
               }
               else {
                   $data['googleAuthUrl'] = $this->google->login_url();
               }
            }
            else {
                $data['googleAuthUrl'] = $this->google->login_url();
            }
            
           //if($form_valid == FALSE){
            $this->load->view('test_register', $data);
          /*}else*/ if(isset($submit_register)){
            $firstname = $this->input->post('firstname');
            $lastname = $this->input->post('lastname');
            $gender = $this->input->post('gender');
            $role = $this->input->post('role');
            $company = $this->input->post('company');
            $work_email = $this->input->post('work_email');
            $work_url = $this->input->post('work_url');
            $dob = $this->input->post('date_of_birth');
            
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            $hashed_password = $this->bcrypt->hash_password($password);

            $location = $this->input->post('location');
            
            $ethnicity = $this->input->post('ethnicity');
            $part_ethnicity = $this->input->post('part_ethnicity');
            
            $job_industry = $this->input->post('job_industry');
            $part_job_industry = $this->input->post('part_job_industry');
            
            $employment = $this->input->post('employment');
            $part_marital = $this->input->post('part_marital');
            
            $user_looking = $this->input->post('user_looking');
            $part_user_looking = $this->input->post('part_user_looking');
            
            $hear_us = $this->input->post('hear_us');
            
            $profile_image = "Community.jpg";
            $shuffle = rand(00, 99);
            $slug = strtolower($firstname).$shuffle;
            $time = time();
            $date = date('Y-m-d H:i:s');
            
            if(isset($role) && $role == "user"){
              $role = "user";
              $job_industry = $this->input->post('job_industry');
              $user_looking = $this->input->post('user_looking');
              $employment = $this->input->post('employment');
              $ethnicity = $this->input->post('ethnicity');
            }else if(isset($role) && $role == "partner"){
              $role = "partner";
              $job_industry = $part_job_industry;
              $user_looking = $part_user_looking;
              $marital = $part_marital;
              $ethnicity = $part_ethnicity;
            }
            
            $subject = "Welcome to Spiela Community";
            $body = "Hi there,
            Thanks for registering and welcome to Spiela. We are a community that helps our members connect and network for the purposes of sharing ideas, providing access to learning, 
            and collaborating on current topics to find real solutions. 
            ";
              $type = "Register";
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
             $this->email->to("$email");
             //$this->email->cc("testcc@domainname.com");
             $this->email->subject("$subject");
             $this->email->message("$body");
            
            $add_user_array = array(
              'firstname' => $firstname,
              'lastname' => $lastname,
              'slug' => $slug,
              'email' => $email,
              'password' => $hashed_password,
              'role' => $role,
              'gender' => $gender,
              'status' => "Active",
              'company' => $company,
              'location' => $location,
              'ethnicity' => $ethnicity,
              'employment' => $employment,
              'job_industry' => $job_industry,
              'user_looking' => $user_looking,
              'hear_us' => $hear_us,
              'work_email' => $work_email,
              'work_url' => $work_url,
              'dob' => $dob,
              'profile_image' => $profile_image,
              'created_time' => $time,
              'created_date' => $date
            );
            
            $add_mail_array = array(
            'subject' => $subject,
            'body' => $body,
            'type' => $type,
            'sender' => $email,
            'created_time' => $time,
            'created_date' => $date
          );

            $add_user = $this->Data_model->create_user($add_user_array);
            
            if($add_user && $this->email->send()){ ?>
            <script>
                alert('Congratulations! You have now registered to Spiela. You can now login and join the community. Please check your email');
                window.location.href="<?php echo site_url('login/test_login'); ?>";
            </script>
            <?php
            }else{ ?>
              <script>
                alert('Registered failed');
                window.location.href="<?php echo site_url('register/test_register'); ?>";
              </script>
            <?php
            }          
         }
       }
       
       // End of Test 
       
    }

?>