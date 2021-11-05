<?php 

    class Reset_password extends CI_Controller{
      
      public function reset(){
      $banner = "Login";
      $data['banner'] = $this->Data_model->display_banner($banner);
      
      $submit_code = $this->input->post('code');
      $email = $this->input->post('email');
      $submit = $this->input->post('reset');
      
      $query = $this->db->query("SELECT email FROM users WHERE email = '$email' ")->result();
      foreach($query as $qry){
          $query_email = $qry->email;
      }
      
      $this->load->view('reset', $data);
      
      if(isset($submit)){
        if(!empty($query_email) && $query_email == $email){
        $password = $this->input->post('password');
        $hashed_password = $this->bcrypt->hash_password($password);
        
        $update_detail = $this->Data_model->update_user_password($query_email, $hashed_password);

        if($update_detail){
          $statusMsg = '<div class="alert alert-success>Reset Password Worked</div>';
          $this->session->set_flashdata('msg', $statusMsg);
          $this->load->view('reset', $data);
          redirect('reset_password/success');
        }else{
          $statusMsg = '<div class="alert alert-danger>Reset Password Failed</div>';
          $this->session->set_flashdata('msgError', $statusMsg);
          $this->load->view('reset', $data);
        }
       }else{ ?>
          <script>
            alert("Email does not exist");
            window.location.href="<?php echo site_url('login'); ?>";
          </script>
       <?php }
      }
     }
    
     public function success(){
       $banner = "Login";
       $data['banner'] = $this->Data_model->display_banner($banner);
        
       $this->load->view('reset_success', $data);
     }
    }

?>