<?php

  class Data_model extends CI_Model{

    // Login

    public function validate($email, $password){
    	$escape_email = $this->db->escape_str($email);
        $escape_password = $this->db->escape_str($password);

	  	$this->db->where('email', $escape_email);
    	$query = $this->db->get('users');

    	if($query->num_rows() > 0){
      	$result = $query->row_array();
      	if($this->bcrypt->check_password($escape_password, $result['password'])){
		    	return $query->result();
      	}else{
    		return array();
      	}
	    }else{
      	return NULL;
    	}
  	}

    // End of Login

    // Forgot Password

    public function send_forgot_mail($data){
        $query = $this->db->insert('email', $data);
        return $query;
    }

    // End of Forgot Password

    // Reset Password

    public function update_user_password($email, $password){
        $query = $this->db->query("UPDATE users SET password = '$password' WHERE email = '$email' ");
        return $query;
    }

    // End of Reset Password

    // Register

    public function create_user($data){
      $escape_data = $this->db->escape_str($data);
      $query = $this->db->insert('users', $escape_data);
      return $query;
    }

    // End of Register

    // Community
    
    public function community_count() {
      $query = $this->db->count_all("community");
      return $query;
    }
    
    public function community_guidelines($category){
        $this->db->where('category', $category);
        $query = $this->db->get('community_guideline')->result();
        return $query;
    }
    
    public function search_data_count($query) {
        $c_count = $this->db->select('count(id) as total_count');
        if (!empty($query)) {
            $c_count = $c_count->like('title', $query, 'both');
        }
        $c_count = $c_count->from('community')->get()->row_array();
        
        $u_count = $this->db->select('count(id) as total_count');
        if (!empty($query)) {
            $u_count = $u_count->where('CONCAT(firstname," ",lastname) LIKE "%'.$query.'%"');
        }
        $u_count = $u_count->from('users')->get()->row_array();
        
        return $c_count['total_count'] + $u_count['total_count'];
    }
    
    public function search_data($limit, $page, $query){
        
    $total_limit = (($limit !== 0 ? $limit : 1) * $page);
    $mainLimit = ($page - 1);
    $db_query = "SELECT new_tbl.id AS id,
           new_tbl.text,
           new_tbl.d_type AS d_type,
           new_tbl.extra_data
        FROM (
            (SELECT CONCAT(community.id,'_','community') AS id,
                    title AS text,
                    'community' AS d_type,
                    'slug' as extra_data
             FROM community WHERE title LIKE '%$query%' LIMIT $total_limit)
          UNION ALL
            (SELECT CONCAT(users.id,'_','users') AS id,
                    CONCAT(firstname, ' ', lastname) AS text,
                    'users' AS d_type,
                    slug as extra_data
             FROM users WHERE CONCAT(firstname,' ',lastname) LIKE '%$query%' LIMIT $total_limit)) AS new_tbl
        ORDER BY text LIMIT $mainLimit,$limit";
        
     $rquery = $this->db->query($db_query);
     $data = $rquery->result_array();
     return $data;
    }
    
    public function display_community_post_profile_image($id){
        $query = $this->db->query("SELECT users.slug, users.profile_image, community.posted_by, community.id FROM community INNER JOIN users ON community.posted_by = users.slug
        WHERE community.id = '$id' ")->result();
        return $query;
    }
    
    public function display_community_category_profile_image($id, $category){
        $query = $this->db->query("SELECT users.slug, users.profile_image, community.category, community.posted_by, community.id FROM community INNER JOIN users ON community.posted_by = users.slug
        WHERE community.id = '$id' AND community.category = '$category' ")->result();
        return $query;
    }

    public function display_community_review_profile_image($id, $email){
        $query = $this->db->query("SELECT users.email, users.profile_image, community_review.email, community_review.community_id FROM community_review INNER JOIN users ON community_review.email = users.email
        WHERE community_review.community_id = '$id' AND community_review.email = '$email' ")->result();
        return $query;
    }

    public function display_community_reply_profile_image($id, $email){
        $query = $this->db->query("SELECT users.email, users.profile_image, community_reply.reply_email, community_reply.community_id FROM users INNER JOIN community_reply ON community_reply.reply_email = users.email
        WHERE community_reply.review_id = '$id' AND users.email = '$email' ")->result();
        return $query;
    }

    public function record_community_count(){
      $this->db->from('community');
      $query = $this->db->count_all_results();
      return $query;
    }

    public function record_community_partner_count(){
      $this->db->from('community');
      $this->db->where('type', 'Partner');
      $query = $this->db->count_all_results();
      return $query;
    }
   
   public function fetch_community_data($limit, $start){
     $this->db->limit($limit, $start);
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
   
   public function fetch_popular_community_data($limit, $start){
     $this->db->limit($limit, $start);
     $this->db->order_by('viewed', 'DESC');
     $query = $this->db->get("community");

     if ($query->num_rows() > 0) {
         foreach ($query->result() as $row) {
             $data[] = $row;
         }
         return $data;
     }
     return false;
   }
   
   public function fetch_verified_community_data($limit, $start){
     $this->db->limit($limit, $start);
     $this->db->where('verified', 'Yes');
     $query = $this->db->get("community");

     if ($query->num_rows() > 0) {
         foreach ($query->result() as $row) {
             $data[] = $row;
         }
         return $data;
     }
     return false;
   }

   public function fetch_community_partner_data($limit, $start){
    $this->db->limit($limit, $start);
    $this->db->order_by('created_date', 'DESC');
    $this->db->where('type', 'Partner');
    $query = $this->db->get("community");

    if ($query->num_rows() > 0) {
        foreach ($query->result() as $row) {
            $data[] = $row;
        }
        return $data;
    }
    return false;
  }

    public function display_community_by_id($id){
      $this->db->where('id', $id);
      $query = $this->db->get('community')->result();
      return $query;
    }

    public function display_post_to_edit($id){
       $this->db->where('id', $id);
       $query = $this->db->get('community')->result();
       return $query;
    }
    
    public function display_popular_post(){
     $query = $this->db->query("SELECT * FROM community ORDER BY RAND() LIMIT 3")->result();
     return $query;
    }

    public function display_uploaded_post($slug){
        //$this->db->where('posted_by', '$slug');
        $query = $this->db->query("SELECT * FROM community WHERE posted_by = '$slug' ")->result();
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
    
    public function update_community_category($id, $category){
      $query = $this->db->query("UPDATE community SET category = '$category' WHERE id = '$id' ");
      return $query;
    }
    
    public function update_community_profile_image($id, $profile_image){
      $query = $this->db->query("UPDATE community SET profile_image = '$profile_image' WHERE id = '$id' ");
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

    public function delete_community_post($id){
      $query = $this->db->query("DELETE FROM community WHERE id = '$id' ");
      return $query;
    }
    
    public function display_community_review($id){
      $this->db->where('community_id', $id);
      $query = $this->db->get('community_review')->result();
      return $query;
    }
    
    public function display_community_reply($unique_id){
      $this->db->where('unique_id', $unique_id);
      $query = $this->db->get('community_reply')->result();
      return $query;
    }

    public function add_community_review($data){
      $query = $this->db->insert('community_review', $data);
      return $query;
    }
    
    public function add_community_reply($data){
        $query = $this->db->insert('community_reply', $data);
        return $query;
    }
    
    public function add_community_post($data){
      $query = $this->db->insert('community', $data);
      return $query;
    }

    public function record_search_count() {
      $query = $this->db->count_all("community");
      return $query;
    }

   public function fetch_search_data($limit, $start, $title){
     $this->db->limit($limit, $start);
     $query = $this->db->query("SELECT * FROM community WHERE title LIKE '%$title%' ORDER BY title ASC ")->result();
     return $query;
   }

   public function record_profile_community_count($slug){
      $this->db->where('posted_by', $slug);
      $this->db->from('community');
      $query = $this->db->count_all_results();
      return $query;
    }

    public function fetch_profile_community_data($slug, $limit, $start){
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
    
    public function record_community_popular_count(){
      $this->db->from('community');
      $query = $this->db->count_all_results();
      return $query;
    }

    public function fetch_community_popular_data($limit, $start){
     $this->db->limit($limit, $start);
     $this->db->order_by('voting', 'DESC');
     $query = $this->db->get("community");

     if ($query->num_rows() > 0) {
         foreach ($query->result() as $row) {
             $data[] = $row;
         }
         return $data;
     }
       return false;
     }

    public function record_community_category_count($category){
      $this->db->from('community');
      $this->db->where('category', $category);
      $query = $this->db->count_all_results();
      return $query;
    }

    public function fetch_community_category_data($category, $limit, $start){
     $this->db->limit($limit, $start);
     $this->db->order_by('created_date', 'DESC');
     $this->db->where('category', $category);
     $query = $this->db->get("community");

     if ($query->num_rows() > 0) {
         foreach ($query->result() as $row) {
             $data[] = $row;
         }
         return $data;
     }
       return false;
     }
     
     public function upVote($id){
       $query = $this->db->query("UPDATE community SET voting = voting + 1 WHERE id = '$id' ");
       $this->db->query("UPDATE voting SET vote = 1 WHERE community_id = '$id' ");
       return $query;
     }

     public function downVote($id){
       $query = $this->db->query("UPDATE community SET voting = voting - 1 WHERE id = '$id' ");
       return $query;
     }
     
     public function addVote($data){
         $query = $this->db->insert('voting', $data);
         return $query;
     }
     
     public function viewVote(){
         $query = $this->db->get('voting')->result();
         return $query;
     }
     
     public function addBadge($id,$badge){
       $query = $this->db->query("UPDATE community SET ".$badge." = ".$badge." + 1 WHERE id = '$id' ");
       return $query;
     }
     
     public function sharePost($id){
       $query = $this->db->query("UPDATE community SET shared = shared + 1 WHERE id = '$id' ");
       return $query;
     }
     
     public function add_event($data){
         $query = $this->db->insert('event', $data);
         return $query;
     }
     
     public function display_event(){
         //$this->db->limit('8');
         //$this->db->order_by('created_date', 'DESC');
         //$this->db->where("(expiry_date >= " . now() . ")");
         //$query = $this->db->get("event")->result();
         $query = $this->db->query("SELECT * FROM event WHERE expiry_date >= NOW() ORDER BY created_date DESC LIMIT 8")->result();
         return $query;
     }

    // End of Community
    
    // Support Post 
    
    public function display_support_post(){
        $this->db->where('post_status', 'Approved');
        $query = $this->db->get("support_post")->result();
        return $query;
    }
    
    public function display_support_post_profile_image($id){
        $query = $this->db->query("SELECT users.slug, users.profile_image, support_post.posted_by, support_post.id FROM support_post INNER JOIN users ON support_post.posted_by = users.slug
        WHERE support_post.id = '$id' ")->result();
        return $query;
    }
    
    public function display_support_post_by_id($id){
      $this->db->where('id', $id);
      $query = $this->db->get('support_post')->result();
      return $query;
    }
    
    public function display_support_post_review($id){
      $this->db->where('id', $id);
      $query = $this->db->get('support_post_review')->result();
      return $query;
    }
    
    public function display_support_post_reply($id, $unique_id){
      $this->db->where('unique_id', $unique_id);
      $this->db->where('id', $id);
      $query = $this->db->get('support_post_reply')->result();
      return $query;
    }
    
    public function display_popular_support_post(){
     $query = $this->db->query("SELECT * FROM support_post ORDER BY RAND() LIMIT 3")->result();
     return $query;
    }
    
    public function add_support_post($data){
      $query = $this->db->insert('support_post', $data);
      return $query;
    }
    
    public function delete_support_post($id){
      $query = $this->db->query("DELETE FROM support_post WHERE id = '$id' ");
      return $query;
    }
    
    // End of Support Post 

    // Partners

    public function record_partner_count(){
      $this->db->from('partners');
      $query = $this->db->count_all_results();
      return $query;
    }

    public function fetch_partner_data($limit, $start){
     $this->db->limit($limit, $start);
     $this->db->order_by('fullname', 'ASC');
     $query = $this->db->get("partners");

     if ($query->num_rows() > 0) {
         foreach ($query->result() as $row) {
             $data[] = $row;
         }
         return $data;
     }
     return false;
   }

     public function record_search_partner_count() {
       $query = $this->db->count_all("partners");
       return $query;
     }

    public function fetch_search_partner_data($limit, $start, $fullname){
      $this->db->limit($limit, $start);
      $query = $this->db->query("SELECT * FROM partners WHERE fullname LIKE '%$fullname%' ORDER BY fullname ASC ")->result();
      return $query;
    }

    public function display_partner_by_id($id){
      $this->db->where('id', $id);
      $query = $this->db->get('partners')->result();
      return $query;
    }
    
    public function display_partner_by_advert($slug){
        $this->db->where('id', $slug);
        $query = $this->db->get('advert')->result();
        return $query;
    }
    
    public function display_partner_by_event($slug){
        $this->db->where('id', $slug);
        $query = $this->db->get('event')->result();
        return $query;
    }
    
    public function display_partner_by_social($slug){
        $this->db->where('id', $slug);
        $query = $this->db->get('partner_social')->result();
        return $query;
    }

    public function follow_user($data){
      $query = $this->db->insert('follower', $data);
      return $query;
    }

    public function unfollow_user($id){
      $query = $this->db->query("DELETE FROM follower WHERE partner_id = '$id' ");
      return $query;
    }

    // End of Partners
    
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
   
   public function display_media_by_id($id){
      $this->db->where('id', $id);
      $query = $this->db->get('media')->result();
      return $query;
   }
    
    // End of Media 

    // Policy

    public function display_privacy_policy(){
      $this->db->where('type', 'Privacy');
      $query = $this->db->get("policy")->result();
      return $query;
    }

    public function display_community_policy(){
      $this->db->where('type', 'Community');
      $query = $this->db->get("policy")->result();
      return $query;
    }

    public function display_term_policy(){
      $this->db->where('type', 'Terms');
      $query = $this->db->get("policy")->result();
      return $query;
    }

    // End of Policy

    // Banners

    public function display_banner($title){
      $this->db->where('title', $title);
      $query = $this->db->get('pages_banner')->result();
      return $query;
    }

    // End of Banners

    // Users

    public function display_user_details($email){
        $this->db->where('email', $email);
        $query = $this->db->get("users")->result();
        return $query;
    }
    
    public function display_user_community_post($slug){
        $this->db->where('posted_by', $slug);
        $query = $this->db->get("community")->result();
        return $query;
    }
    
    public function display_user_post_count($slug){
        $query = $this->db->query("SELECT COUNT(*) AS total FROM community WHERE posted_by = '$slug' ")->result();
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
    
    public function update_user_interest($email, $imp_interest){
        $query = $this->db->query("UPDATE users SET interest = '$imp_interest' WHERE email = '$email' ");
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
    
    public function update_new_user_image($email, $image){
        $query = $this->db->query("UPDATE users SET profile_image = '$image' WHERE email = '$email' ");
        return $query;
    }
    
    public function display_user_comments($email){
        $this->db->where('email', $email);
        $query = $this->db->get('community_review')->result();
        return $query;
    }

    // End of Users
    
    // Link Profile
    
    public function display_user_profile($slug){
        $this->db->where('slug', $slug);
        $query = $this->db->get('users')->result();
        return $query;
    }
    
    // End of Link Profile 

  }

?>
