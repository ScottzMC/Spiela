<?php 

    class Forgot_password extends CI_Controller{
      
      public function index(){
        $banner = "Login";
        $data['banner'] = $this->Data_model->display_banner($banner);
        
        $session_email = $this->session->userdata('uemail');
        
        $email = $this->input->post('email');
        $submit = $this->input->post('forgot');
        
        $this->load->view('forgot', $data);
        
        $query = $this->db->query("SELECT email FROM users WHERE email = '$email' ")->result();
          foreach($query as $qry){
              $query_email = $qry->email;
          }

      if(isset($submit) && $email == $query_email){
          $code = str_shuffle("ABCDEFXJKZAG");
          $subject = "Reset Password";
          $body = "
            The reset code - $code
            
            Upon clicking the link, put your reset code and new password in the reset page. If you want to reset your password, please click the link to reset the password - https://spiela.co.uk/reset_password/reset";
          $type = "Forgot Password";
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
         //$this->load->library('encrypt');
         $this->email->from('admin@spiela.co.uk', "Spiela Team");
         $this->email->to("$email");
         //$this->email->cc("testcc@domainname.com");
         $this->email->subject("$subject");
         $this->email->message("$body");

          $add_mail_array = array(
            'subject' => $subject,
            'body' => $body,
            'type' => $type,
            'sender' => $email,
            'created_time' => $time,
            'created_date' => $date
          );

          $add_mail = $this->Data_model->send_forgot_mail($add_mail_array);

        if($add_mail && $this->email->send()){ ?>
        <script>
            alert('Mail sent successfully');
            window.location.href="<?php echo base_url('forgot_password/success'); ?>";
          </script>    
        <?php }else{ ?>
            <script>
                alert("Email does not exist ");
                window.location.href="<?php echo site_url('login'); ?>";
            </script>
   <?php }
       }
      }
      
      public function success(){
        $banner = "Login";
        $data['banner'] = $this->Data_model->display_banner($banner);
        
        $this->load->view('forgot_success', $data);
      }
    }

?>