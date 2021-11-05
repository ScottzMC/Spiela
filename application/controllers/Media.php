<?php 
    
    class Media extends CI_Controller{
        
        /*public function view(){
          $config['base_url'] = base_url()."media/view";
          $total_row = $this->Data_model->record_media_count();
          $config['total_rows'] = $total_row;
          $config['per_page'] = 8;
          $config['uri_segment'] = 3;
          $choice = $config['total_rows']/$config['per_page'];
          $config['num_links'] = round($choice);
    
          $config['full_tag_open'] = '<ul style="margin-left: 100px;" class="pagination">';
          $config['full_tag_close'] = '</ul>';
    
          $config['first_tag_open'] = '<li>';
          $config['last_tag_open'] = '<li>';
    
          $config['next_tag_open'] = '<li>';
          $config['prev_tag_open'] = '<li>';
    
          $config['num_tag_open'] = '<li>';
          $config['num_tag_close'] = '</li>';
    
          $config['first_tag_close'] = '</li>';
          $config['last_tag_close'] = '</li>';
    
          $config['next_tag_close'] = '</li>';
          $config['prev_tag_close'] = '</li>';
    
          $config['cur_tag_open'] = '<li class="active" style="background: #366e63;"><span style="background: #366e63; border: #366e63;"><b>';
          $config['cur_tag_close'] = '</b></span></li>';
    
          $this->pagination->initialize($config);
    
          $page = ($this->uri->segment(3))? $this->uri->segment(3) : 0;
    
          $data["media"] = $this->Data_model->fetch_media_data($config["per_page"], $page);

          $this->load->view('media/index', $data);
        } */
        
        public function detail($id){
          $data['detail'] = $this->Data_model->display_media_by_id($id);
          
          $this->load->view('site/media/youtube/detail', $data); 
        }
        
        // Add YouTube 
        
        function create() {
            $data['youtube_videos'] = $this->Data_model->display_videos();
            
            $this->form_validation->set_rules('vi_url', $this->lang->line('vi_url'), 'trim|required|htmlspecialchars');
        
            if ($this->form_validation->run() == false) {
                $this->load->view('site/media/youtube/add_media', $data);
            } else {
                $url = $this->input->post('vi_url');
                parse_str(parse_url($url, PHP_URL_QUERY), $my_array_of_vars);
                // parse youtube url to get id
                $video_id = $my_array_of_vars['v'];
                // Output: AyLY1CYtB_8
                $video_title =  $this->get_youtube_title($video_id);
                // send id and video title to database table
                $this->Data_model->create_videos($video_id,$video_title);
            }
        }
    
        function get_youtube_title($video_id){
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, 'https://www.youtube.com/oembed?url=http://www.youtube.com/watch?v='.$video_id.'&format=json');
            curl_setopt($ch, CURLOPT_HEADER, 0);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        
            $response = curl_exec($ch);
            curl_close($ch);
        
            if ($response) {
                $result =json_decode($response, true);
                return  $result['title'];
            } else {
                return error_get_last();
            }
        }
        
        // End of Add YouTube 
    }

?>