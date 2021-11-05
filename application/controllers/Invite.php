<?php 

    class Invite extends CI_Controller{
        
        function __construct() { 
            parent::__construct(); 
             
             
        }
        
        public function index(){

          session_start();

          $banner = "Invite";
          $data['banner'] = $this->Data_model->display_banner($banner);
          
          $email = $this->session->userdata('uemail');          
          $data['profile'] = $this->Data_model->display_user_details($email);

          $username = '';
          foreach ($data['profile'] as $profile) {
            $username = $profile->firstname;
          }

          $submit_invite = $this->input->post('invite');

          $data = array();
          $data['google_client_id'] = '189422909466-mnfpbeod7vfeefacr8kqnppvc6bbmv99.apps.googleusercontent.com';
          $data['google_client_secret'] = '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';
          $data['redirect_uri'] = 'https://spiela.co.uk/invite';
          $data['maxresults'] = 500;
            
            
          $subject = "Here is your exclusive invite link to join the spiela community :)";
          $body = "Hello \r\n\r\nYou’re receiving this invite because $username has invited you to use spiela.\r\n\r\nSpiela is an on-line platform created by individuals from diverse and under-represented backgrounds who will connect you with job opportunities, other likeminded members in similar industries of interest to you and you will get exclusive access to live conferences from industry experts such as Penny James, CEO of direct line, Lord Michael Hastings OBE and Jermaine Jackman, winner of the voice 2014.\r\n\r\nJoin with us - https://spiela.co.uk/register";

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

            
          $data['contacts'] = array();

          $sendEmailFlag = false;

          $ajaxSubmit =  $this->input->post('ajaxSubmit');
          
          if($ajaxSubmit){

            $emailval = $this->input->post('gemail');
            $gkey = $this->input->post('gkey');

            $this->email->from('admin@spiela.co.uk', "Spiela Team");
            $this->email->to("$emailval");
            $this->email->subject("$subject");
            $this->email->message("$body");

            if($this->email->send()){
              $sendEmailFlag = true; 
            } else {
              $sendEmailFlag = false; 
            }

            if($sendEmailFlag){ 
              echo json_encode(array('success'=>'1','key'=> $gkey));
            } else {
              echo json_encode('fail => 1');
            }

          } else if(isset($submit_invite)){
            $email = $this->input->post('email');
            

            $emailArray = explode(',', $email);
            foreach ($emailArray as $ekey => $emailval) {
              // $this->load->library('email', $config);
              //$this->load->library('encrypt');
              $this->email->from('admin@spiela.co.uk', "Spiela Team");
              $this->email->to("$emailval");
              $this->email->subject("$subject");
              $this->email->message("$body");

              if($this->email->send()){
                $sendEmailFlag = true; 
              } else {
                $sendEmailFlag = false; 
              }
            }

            if($sendEmailFlag){ ?>
            <script>
                alert('Mail sent successfully');
                window.location.href="<?php echo base_url('invite/success'); ?>";
              </script>    
            <?php }else{ ?>
                <script>
                    alert("Email does not exist ");
                    window.location.href="<?php echo site_url('invite'); ?>";
                </script>
       <?php }

          } else {

            $authcode   = $_GET["code"];

            if($authcode != ''){

                $fields=array(
                  'code'=>  urlencode($authcode),
                  'client_id'=>  urlencode($data['google_client_id']),
                  'client_secret'=>  urlencode($data['google_client_secret']),
                  'redirect_uri'=>  urlencode($data['redirect_uri']),
                  'grant_type'=>  urlencode('authorization_code') 
                );

                // print_r($fields);

                //url-ify the data for the POST

                $fields_string = '';

                foreach($fields as $key=>$value){ $fields_string .= $key.'='.$value.'&'; }

                $fields_string  = rtrim($fields_string,'&');

                //open connection
                $ch = curl_init();

                curl_setopt($ch,CURLOPT_URL,'https://accounts.google.com/o/oauth2/token'); //set the url, number of POST vars, POST data

                curl_setopt($ch,CURLOPT_POST,5);

                curl_setopt($ch,CURLOPT_POSTFIELDS,$fields_string);

                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // Set so curl_exec returns the result instead of outputting it.

                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); //to trust any ssl certificates

                $result = curl_exec($ch); //execute post

                curl_close($ch); //close connection

                // print_r($result);
                // die;

                //extracting access_token from response string

                $response   =  json_decode($result);

                $accesstoken = $response->access_token;
                // echo $accesstoken;
                // die;


                if( $accesstoken!='')

                $_SESSION['token']= $accesstoken;

                //passing accesstoken to obtain contact details
                $maxresults = $data['maxresults'];
                
                 //echo 'https://www.google.com/m8/feeds/contacts/default/full?max-results='.$maxresults.'&oauth_token='. $_SESSION['token'];
                 //die;
                
                
                $xmlresponse=  file_get_contents('https://www.google.com/m8/feeds/contacts/default/full?max-results='.$maxresults.'&oauth_token='. $_SESSION['token']);

                //reading xml using SimpleXML

                //$xml=  new SimpleXMLElement($xmlresponse);

                $xml =  simplexml_load_string($xmlresponse);

                //$xml->registerXPathNamespace('gd', 'http://schemas.google.com/g/2005');

                // echo '<pre>';
                // print_r($xml->entry);

                if ($xml === false) { ?>
                    <script>
                        //alert("Cannot fetch contacts from google account! Please reload page");
                    //window.location.href="<?php //echo site_url('invite'); ?>";
                    location.reload(true);
                    </script>
                <?php } else {
                  $data['contacts'] = array ();
                  foreach($xml->entry as $entry){

                      $ary = array ();
                      $ary['name'] = (string) $entry->title;
                      $data['contacts'][] = $ary;
                  }

                  $result = $xml->xpath('//gd:email');
                }
                
                $count = 0;
                foreach ($result as $key => $title) {
                  $count++;                  
                  //echo $count.". ".$title->attributes()->address . "<br><br>";
                  $data['contacts'][$key]['email'] = (string) $title->attributes()->address;
                }

                // print_r($data);
                // die;
                             
            }

            $this->load->view('invite', $data);

          }

        }

        public function success(){
          $banner = "Invite";
          $data['banner'] = $this->Data_model->display_banner($banner);
          
          $this->load->view('invite_success', $data);
        }
        
    }

?>