<?php

    class Admin_model extends CI_Model{

    // Community

    public function record_community_count($slug){
      $this->db->from('community');
      $this->db->where('posted_by', $slug);
      $query = $this->db->count_all_results();
      return $query;
    }

    public function fetch_community_data($slug, $limit, $start){
     $this->db->limit($limit, $start);
     $this->db->where('posted_by', $slug);
     $this->db->order_by('created_date', 'DESC');
     $query = $this->db->get("community");

     if ($query->num_rows() > 0) {
         foreach ($query->result() as $row) {
             $data[] = $row;
         }
         return $data;
     }
     return false;
    }

    public function add_community_post($data){
      $query = $this->db->insert('community', $data);
      return $query;
    }

    public function update_community_post($id, $data){
        $this->db->where('id', $id);
        $query = $this->db->update('community', $data);
        return $query;
    }
    
    public function update_community_meta($id, $meta){
        $query = $this->db->query("UPDATE community SET meta = '$meta' WHERE id = '$id' ");
        return $query;
    }

    public function delete_community_post($id){
      $query = $this->db->query("DELETE FROM community WHERE id = '$id' ");
      return $query;
    }

    public function display_post_to_edit($id){
       $this->db->where('id', $id);
       $query = $this->db->get('community')->result();
       return $query;
    }
    
    public function display_meta_to_edit($id){
       $this->db->where('id', $id);
       $query = $this->db->get('community')->result();
       return $query;
    }
    
    public function update_post_view($id, $view){
        $query = $this->db->query("UPDATE community SET viewed = '$view' WHERE id = '$id' ");
        return $query;
    }

    // End of Community
    
    // Media 
    
    public function record_media_count(){
      $this->db->where('type', 'YouTube');
      $this->db->from('media');
      $query = $this->db->count_all_results();
      return $query;
    }

    public function fetch_media_data($limit, $start){
     $this->db->limit($limit, $start);
     $this->db->order_by('created_date', 'DESC');
     $query = $this->db->get("media");

     if ($query->num_rows() > 0) {
         foreach ($query->result() as $row) {
             $data[] = $row;
         }
         return $data;
     }
     return false;
   }
    
    public function create_media($data){
        $query = $this->db->insert('media', $data);
        return $query;
    }
    
    // End of Media 

    // View Users

    public function record_users_count(){
      $this->db->from('users');
      $query = $this->db->count_all_results();
      return $query;
    }

    public function fetch_users_data($limit, $start){
     $this->db->limit($limit, $start);
     $this->db->order_by('slug', 'ASC');
     $query = $this->db->get("users");

     if ($query->num_rows() > 0) {
         foreach ($query->result() as $row) {
             $data[] = $row;
         }
         return $data;
     }
     return false;
    }

    public function block_users($id, $status){
       $query = $this->db->query("UPDATE users SET status = '$status' WHERE id = '$id' ");
       return $query;
    }

    public function unblock_users($id, $status){
       $query = $this->db->query("UPDATE users SET status = '$status' WHERE id = '$id' ");
       return $query;
    }

    public function delete_users($id){
      $query = $this->db->query("DELETE FROM users WHERE id = '$id' ");
      return $query;
    }

    // End of View Users

    // Add Users

    public function add_users($data){
        $escape_data = $this->db->escape_str($data);
        $query = $this->db->insert('users', $escape_data);
        return $query;
    }

    // End of Add Users

    // Profile

    public function display_user_details($email){
        $this->db->where('email', $email);
        $query = $this->db->get("users")->result();
        return $query;
    }

    public function update_user_firstname($email, $first_name){
        $query = $this->db->query("UPDATE users SET firstname = '$first_name' WHERE email = '$email' ");
        return $query;
    }
    
    public function update_user_lastname($email, $last_name){
        $query = $this->db->query("UPDATE users SET lastname = '$last_name' WHERE email = '$email' ");
        return $query;
    }
    
    public function update_user_bio($email, $bio){
        $query = $this->db->query("UPDATE users SET bio = '$bio' WHERE email = '$email' ");
        return $query;
    }
    
    public function update_user_dob($email, $dob){
        $query = $this->db->query("UPDATE users SET dob = '$dob' WHERE email = '$email' ");
        return $query;
    }
    
    public function update_user_company($email, $company){
        $query = $this->db->query("UPDATE users SET company = '$company' WHERE email = '$email' ");
        return $query;
    }
    
    public function update_user_work_email($email, $work_email){
        $query = $this->db->query("UPDATE users SET work_email = '$work_email' WHERE email = '$email' ");
        return $query;
    }
    
    public function update_user_work_url($email, $work_url){
        $query = $this->db->query("UPDATE users SET work_url = '$work_url' WHERE email = '$email' ");
        return $query;
    }
    
    public function update_user_image($email, $image){
        $query = $this->db->query("UPDATE users SET profile_image = '$image' WHERE email = '$email' ");
        return $query;
    }

    // End of Profile

    }

?>
