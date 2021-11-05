<?php 

    class Prev_login extends CI_Controller{
        
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
          $banner = "Login";
          $data['banner'] = $this->Data_model->display_banner($banner);
          
          $this->form_validation->set_rules('email', 'Email Address', 'trim|required|valid_email');
          $this->form_validation->set_rules('password', 'Password', 'trim|required');
    
          $form_valid = $this->form_validation->run();
          $submit_login = $this->input->post('login');
          
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
                    //copy($fbUser['picture']['data']['url'],FCPATH.'uploads/profile/'.$profile_image);
                    $fb_picture = "https://graph.facebook.com/".$userData['oauth_uid']."/picture?height=350&width=350";
                    copy($fb_picture,FCPATH.'uploads/profile/'.$profile_image);
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
                  //window.location.href="<?php echo site_url('community/view#createpost'); ?>";
              </script> 
              <?php
              if(isset($_SERVER['HTTP_REFERER'])){
                redirect($_SERVER['HTTP_REFERER']);
              }
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
                        copy($googleUser['picture'],FCPATH.'uploads/profile/'.$profile_image);
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
                          //window.location.href="<?php echo site_url('community/view#createpost'); ?>";
                      </script> 
                      <?php
                      if(isset($_SERVER['HTTP_REFERER'])){
                        redirect($_SERVER['HTTP_REFERER']);
                      }
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
    
            #### Default Login
            if($form_valid == FALSE){
                $this->load->view('site/login', $data);
            }else if(isset($submit_login)){
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            
            $query = $this->db->query("SELECT email, status FROM users WHERE email = '$email' AND oauth_provider=''")->result();
            foreach($query as $qry){
                $query_email = $qry->email;
                $query_status = $qry->status;
            }
    
            $uresult = $this->Data_model->validate($email, $password);
            if(count($uresult) > 0 && $query_status == "Active"){
              $sess_data = array(
              'login' => TRUE,
              'oauth_provider' => '',
              'uid' => $uresult[0]->id,
              'uemail' => $uresult[0]->email,
              'ufirstname' => $uresult[0]->firstname,
              'ulastname' => $uresult[0]->lastname,
              'uslug' => $uresult[0]->slug,
              'uimage' => $uresult[0]->profile_image,
              'urole' => $uresult[0]->role,
              'ustatus' => $uresult[0]->status
             );
    
             
              $this->session->set_userdata($sess_data);
              $status = $this->session->userdata('ustatus'); ?>
              <script>
                  alert('Login successfully');
                  //window.location.href="< ?php echo site_url('community/view#createpost'); ?>";
              </script> 
              <?php
              if(isset($_SERVER['HTTP_REFERER'])){
                redirect($_SERVER['HTTP_REFERER']);
              }
          }else if(empty($query_email) || empty($query_status) || $query_status == "Blocked"){
            $statusMsg = '<span class="text-danger">Email does not exist or account has been blocked!</span>';
            $this->session->set_flashdata('msgError', $statusMsg);
            $this->load->view('site/login', $data);  
          }else{
            $statusMsg = '<span class="text-danger">Wrong Email-ID or Password!</span>';
            $this->session->set_flashdata('msgError', $statusMsg);
            $this->load->view('site/login', $data);
           }
         }
        }
    }

?>