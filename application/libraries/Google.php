<?php  
defined('BASEPATH') OR exit('No direct script access allowed'); 

// Include the autoloader provided in the SDK 
require_once APPPATH .'third_party/google-php-sdk/vendor/autoload.php';  
 

Class Google 
{ 
    private $googleClient;
    
    public function __construct(){ 
        $this->load->config('google'); 
        $this->load->library('session'); 
        
        $this->googleClient = new Google_Client();
        
        $this->googleClient->setClientId($this->config->item('google_client_id')); //Define your ClientID

        $this->googleClient->setClientSecret($this->config->item('google_client_secret')); //Define your Client Secret Key

        $this->googleClient->setRedirectUri(base_url('login')); //Define your Redirect Uri

        $this->googleClient->addScope('email');

        $this->googleClient->addScope('profile');
    }

    public function object(){ 
        return $this->googleClient; 
    }
    
    public function login_url(){ 
        // Login type must be web, else return empty string 
        return $this->googleClient->createAuthUrl();
    } 
    
    public function is_authenticated() {        
        $token = $this->googleClient->fetchAccessTokenWithAuthCode($_GET["code"]);

        if(empty($token["error"]))
        {
            return $token;
        }
        return false;
    }
    
    public function getUser($access_token) {
        $this->googleClient->setAccessToken($access_token);

        $this->session->set_userdata('access_token', $access_token);

        $google_service = new Google_Service_Oauth2($this->googleClient);

        $userData = $google_service->userinfo->get();

        return $userData;
    }
    
    /** 
     * Enables the use of CI super-global without having to define an extra variable. 
     * 
     * @param $var 
     * 
     * @return mixed 
     */ 
    public function __get($var){ 
        return get_instance()->$var; 
    }
}