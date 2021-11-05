<?php

  class Site extends CI_Controller{
    
    public function home(){
      $this->load->view('site/home');
    }
    
    public function about(){
      $this->load->view('site/about');
    }

    public function privacy(){
      $data['privacy'] = $this->Data_model->display_privacy_policy();

      $this->load->view('site/policy/privacy', $data);
    }

    public function community(){
      $data['community'] = $this->Data_model->display_community_policy();

      $this->load->view('site/policy/community', $data);
    }

    public function term(){
      $data['term'] = $this->Data_model->display_term_policy();

      $this->load->view('site/policy/term', $data);
    }
  }

?>
