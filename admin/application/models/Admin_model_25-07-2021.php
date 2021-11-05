<?php

  class Admin_model extends CI_Model{

    // Profile

    public function display_user_details($email){
        $this->db->where('email', $email);
        $query = $this->db->get("users")->result();
        return $query;
    }

    // End of Profile

    // Users

    public function display_users(){
      $query = $this->db->get("users")->result();
      return $query;
    }

    public function display_users_by_id($id){
      $this->db->where('id', $id);
      $query = $this->db->get("users")->result();
      return $query;
    }

    public function update_user_firstname($id, $first_name){
        $query = $this->db->query("UPDATE users SET firstname = '$first_name' WHERE id = '$id' ");
        return $query;
    }

    public function update_user_lastname($id, $last_name){
        $query = $this->db->query("UPDATE users SET lastname = '$last_name' WHERE id = '$id' ");
        return $query;
    }

    public function update_user_bio($id, $bio){
        $query = $this->db->query("UPDATE users SET bio = '$bio' WHERE id = '$id' ");
        return $query;
    }

    public function update_user_dob($id, $dob){
        $query = $this->db->query("UPDATE users SET dob = '$dob' WHERE id = '$id' ");
        return $query;
    }

    public function update_user_company($id, $company){
        $query = $this->db->query("UPDATE users SET company = '$company' WHERE id = '$id' ");
        return $query;
    }

    public function update_user_role($id, $role){
        $query = $this->db->query("UPDATE users SET role = '$role' WHERE id = '$id' ");
        return $query;
    }

    public function update_user_ethnicity($id, $ethnicity){
        $query = $this->db->query("UPDATE users SET ethnicity = '$ethnicity' WHERE id = '$id' ");
        return $query;
    }

    public function update_user_location($id, $location){
        $query = $this->db->query("UPDATE users SET location = '$location' WHERE id = '$id' ");
        return $query;
    }

    public function update_user_job_industry($id, $job_industry){
        $query = $this->db->query("UPDATE users SET job_industry = '$job_industry' WHERE id = '$id' ");
        return $query;
    }

    public function update_user_user_looking($id, $user_looking){
        $query = $this->db->query("UPDATE users SET user_looking = '$user_looking' WHERE id = '$id' ");
        return $query;
    }

    public function add_users($data){
      $escape_data = $this->db->escape_str($data);
      $query = $this->db->insert('users', $escape_data);
      return $query;
    }

    public function delete_users($id){
      $query = $this->db->query("DELETE FROM users WHERE id = '$id' ");
      return $query;
    }

    // End of Users

    // Community

    public function display_community(){
      $query = $this->db->get("community")->result();
      return $query;
    }

    public function display_community_by_id($id){
      $this->db->where('id', $id);
      $query = $this->db->get("community")->result();
      return $query;
    }

    public function update_community_title($id, $title){
      $query = $this->db->query("UPDATE community SET title = '$title' WHERE id = '$id' ");
      return $query;
    }

    public function update_community_body($id, $body){
      $query = $this->db->query("UPDATE community SET body = '$body' WHERE id = '$id' ");
      return $query;
    }

    public function update_community_meta($id, $meta){
      $query = $this->db->query("UPDATE community SET meta = '$meta' WHERE id = '$id' ");
      return $query;
    }

    public function update_community_category($id, $category){
      $query = $this->db->query("UPDATE community SET category = '$category' WHERE id = '$id' ");
      return $query;
    }

    public function update_community_banner($id, $banner){
      $query = $this->db->query("UPDATE community SET banner = '$banner' WHERE id = '$id' ");
      return $query;
    }
    
    public function update_community_post($id, $data){
        $this->db->where('id', $id);
        $query = $this->db->update('community', $data);
        return $query;
    }
    
    public function update_community_image($id, $data){
        $this->db->where('id', $id);
        $query = $this->db->update('community', $data);
        return $query;
    }

    public function add_community($data){
      $escape_data = $this->db->escape_str($data);
      $query = $this->db->insert('community', $escape_data);
      return $query;
    }

    public function delete_community($id){
      $query = $this->db->query("DELETE FROM community WHERE id = '$id' ");
      return $query;
    }

    // End of Community
    
    // Comments 
    
    public function display_comment_by_id($id){
      $this->db->where('community_id', $id);
      $query = $this->db->get("community_review")->result();
      return $query;
    }
    
    public function display_edited_comment_by_id($community_id, $id){
      $this->db->where('community_id', $community_id);
      $this->db->where('id', $id);
      $query = $this->db->get("community_review")->result();
      return $query;
    }
    
    public function update_comment_post($community_id, $id, $data){
        $this->db->where('community_id', $community_id);
        $this->db->where('id', $id);
        $query = $this->db->update('community_review', $data);
        return $query;
    }
    
    public function delete_comment($id){
      $query = $this->db->query("DELETE FROM community_review WHERE id = '$id' ");
      return $query;
    }
    
    // End of Comments 
    
    // Notice Board 
    
    public function display_notice_board(){
        $query = $this->db->get('event')->result();
        return $query;
    }
    
    public function display_notice_board_by_id($id){
      $this->db->where('id', $id);
      $query = $this->db->get("event")->result();
      return $query;
    }
    
    public function add_notice_board($data){
      $escape_data = $this->db->escape_str($data);
      $query = $this->db->insert('event', $escape_data);
      return $query;
    }
    
    public function update_notice_board($id, $data){
        $this->db->where('id', $id);
        $query = $this->db->update('event', $data);
        return $query;
    }
    
    public function delete_notice_board($id){
      $query = $this->db->query("DELETE FROM event WHERE id = '$id' ");
      return $query;
    }
    
    // End of Notice Board 
    
    // Support Post 
    
    public function display_support_post(){
      $query = $this->db->get("support_post")->result();
      return $query;
    }

    public function display_support_post_by_id($id){
      $this->db->where('id', $id);
      $query = $this->db->get("support_post")->result();
      return $query;
    }
    
    public function update_support_post($id, $data){
        $this->db->where('id', $id);
        $query = $this->db->update('support_post', $data);
        return $query;
    }
    
    public function delete_support_post($id){
      $query = $this->db->query("DELETE FROM support_post WHERE id = '$id' ");
      return $query;
    }
    
    // End of Support Post 

  }

?>
