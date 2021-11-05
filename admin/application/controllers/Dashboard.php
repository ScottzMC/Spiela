<?php

  class Dashboard extends CI_Controller{

    public function index(){
      $session_role = $this->session->userdata('urole');
      $session_email = $this->session->userdata('uemail');

      if($session_role == "admin"){
        $data['user_details'] = $this->Admin_model->display_user_details($session_email);

        $this->load->view('dashboard', $data);
      }else{ ?>
        <script>
            window.location.href="https://spiela.co.uk";
        </script>
      <?php }
    }
  }

?>
