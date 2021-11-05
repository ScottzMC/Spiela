<?php

  class User extends CI_Controller{

    public function view(){
      $session_role = $this->session->userdata('urole');
      $session_email = $this->session->userdata('uemail');

      if($session_role == "admin"){
        $data['user_details'] = $this->Admin_model->display_user_details($session_email);
        $data['users'] = $this->Admin_model->display_users();

        $this->load->view('users/view', $data);
      }else{ ?>
        <script>
            window.location.href="https://spiela.co.uk";
        </script>
      <?php }
    }

    public function add(){
      $submit_btn = $this->input->post('submit_add');

      if(isset($submit_btn)){
          $firstname = $this->input->post('firstname');
          $lastname = $this->input->post('lastname');

          $email = $this->input->post('email');
          $password = $this->input->post('password');
          $hashed_password = $this->bcrypt->hash_password($password);
          $slug = strtolower($firstname.'-'.$lastname);

          $role = $this->input->post('role');
          $company = $this->input->post('company');
          $bio = $this->input->post('bio');
          $dob = $this->input->post('dob');
          $ethnicity = $this->input->post('ethnicity');

          $status = "Active";
          $location = $this->input->post('location');
          $job_industry = $this->input->post('job_industry');
          $user_looking = $this->input->post('user_looking');

          $time = time();
          $date = date('Y-m-d H:i:s');

          $add_user_array = array(
            'firstname' => $firstname,
            'lastname' => $lastname,
            'slug' => $slug,
            'email' => $email,
            'password' => $hashed_password,
            'role' => $role,
            'status' => $status,
            'bio' => $bio,
            'company' => $company,
            'location' => $location,
            'ethnicity' => $ethnicity,
            'job_industry' => $job_industry,
            'user_looking' => $user_looking,
            'dob' => $dob,
            'profile_image' => "Community.png",
            'created_time' => $time,
            'created_date' => $date
          );

        $add_user = $this->Admin_model->add_users($add_user_array);

        if($add_user){ ?>
            <script>
               alert('User created successfully');
               window.location.href="<?php echo site_url('user/view'); ?>";
            </script>
     <?php }else{ ?>
            <script>
               alert('Registration Failed');
               window.location.href="<?php echo site_url('user/view'); ?>";
            </script>
  <?php }
      }
    }

    public function edit($id){
      $btn_submit = $this->input->post('submit_edit');

      $session_status = $this->session->userdata('ustatus');
      $session_email = $this->session->userdata('uemail');

      $data['user_details'] = $this->Admin_model->display_user_details($session_email);
      $data['users'] = $this->Admin_model->display_users_by_id($id);

      $this->load->view('users/edit', $data);

      if(isset($btn_submit)){
        $firstname = $this->input->post('firstname');
        $lastname = $this->input->post('lastname');

        $role = $this->input->post('role');
        $company = $this->input->post('company');
        $bio = $this->input->post('bio');
        $dob = $this->input->post('dob');
        $ethnicity = $this->input->post('ethnicity');

        $status = "Active";
        $location = $this->input->post('location');
        $job_industry = $this->input->post('job_industry');
        $user_looking = $this->input->post('user_looking');

        $update_firstname = $this->Admin_model->update_user_firstname($id, $firstname);
        $update_lastname = $this->Admin_model->update_user_lastname($id, $lastname);
        $update_role = $this->Admin_model->update_user_role($id, $role);
        $update_company = $this->Admin_model->update_user_company($id, $company);
        $update_bio = $this->Admin_model->update_user_bio($id, $bio);
        $update_dob = $this->Admin_model->update_user_dob($id, $dob);
        $update_ethnicity = $this->Admin_model->update_user_ethnicity($id, $ethnicity);
        $update_location = $this->Admin_model->update_user_location($id, $location);
        $update_job_industry = $this->Admin_model->update_user_job_industry($id, $job_industry);
        $update_user_looking = $this->Admin_model->update_user_user_looking($id, $user_looking);

        if($update_firstname || $update_lastname || $update_role || $update_company || $update_bio || $update_dob || $update_ethnicity
      || $update_location || $update_job_industry || $update_user_looking){ ?>
          <script>
            alert('Updated Successfully');
            window.location.href="<?php echo site_url('user/view'); ?>";
          </script>
    <?php }else{ ?>
          <script>
            alert('Update Failed');
            window.location.href="<?php echo site_url('user/view'); ?>";
          </script>
  <?php }
      }
      /*}else{
        redirect('login');
      }*/
    }

    public function delete(){
      $did = $this->input->post('del_id');
      $this->Admin_model->delete_users($did);
    }

  }

?>
