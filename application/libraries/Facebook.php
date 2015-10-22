<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
if ( session_status() == PHP_SESSION_NONE ) {
  session_start();
}
// Define the root directoy
define( 'ROOT', dirname( __FILE__ ) . '/' );

// Autoload the required files
require_once( ROOT . 'facebook/facebook-php-sdk-v4-4.0-dev/autoload.php' );

use Facebook\FacebookSession;
use Facebook\FacebookRedirectLoginHelper;
use Facebook\FacebookRequest;
use Facebook\GraphObject;
use Facebook\FacebookSDKException;
use Facebook\FacebookRequestException;
use Facebook\FacebookResponse;
use Facebook\FacebookPermissionException;
use Facebook\GraphUser;
use Facebook\FacebookAuthorizationException;

class Facebook {
  var $ci;
  var $helper;
  var $session;
  var $permissions;
  public function __construct() {
      
    $this->ci =& get_instance();
    $this->permissions = $this->ci->config->item('permissions', 'facebook');
    // Initialize the SDK
    FacebookSession::setDefaultApplication( $this->ci->config->item('api_id', 'facebook'), $this->ci->config->item('app_secret', 'facebook') );
    // Create the login helper and replace REDIRECT_URI with your URL
    // Use the same domain you set for the apps 'App Domains'
    // e.g. $helper = new FacebookRedirectLoginHelper( 'http://mydomain.com/redirect' );
    $this->helper = new FacebookRedirectLoginHelper( $this->ci->config->item('redirect_url', 'facebook') );
    if ( $this->ci->session->userdata('fb_token') ) {
      $this->session = new FacebookSession( $this->ci->session->userdata('fb_token') );
      // Validate the access_token to make sure it's still valid
      try {
        if ( ! $this->session->validate() ) {
          $this->session = null;
        }
      } catch ( Exception $e ) {
        // Catch any exceptions
        $this->session = null;
      }
    } else {
      // No session exists
      try {
        $this->session = $this->helper->getSessionFromRedirect();
      } catch( FacebookRequestException $ex ) {
        // When Facebook returns an error
      } catch( Exception $ex ) {
        // When validation fails or other local issues
      }
    }
    if ( $this->session ) {
      $this->ci->session->set_userdata( 'fb_token', $this->session->getToken() );
      $this->session = new FacebookSession( $this->session->getToken() );
    }
  }
  /**
   * Returns the login URL.
   */
  public function login_url() {
    return $this->helper->getLoginUrl( $this->permissions );
  }
  /**
   * Returns the current user's info as an array.
   */
  public function get_user() {
    if ( $this->session ) {
      /**
       * Retrieve User’s Profile Information
       */
      // Graph API to request user data
      $request = ( new FacebookRequest( $this->session, 'GET', '/me' ) )->execute();
      // Get response as an array
      $user = $request->getGraphObject()->asArray();
      return $user;
    }
    return false;
  }
  
  public function post($data){
    if ( $this->session) {
      
      try {
        $page_id = $this->ci->config->item('redirect_url', 'facebook');
        // get page access token
        $access_token = (new FacebookRequest( $this->session, 'GET', '/' . $page_id,  array( 'fields' => 'access_token' ) ))
                          ->execute()->getGraphObject()->asArray();
    
        // save access token in variable for later use  
        $access_token = $access_token['access_token'];
        //var_dump($data);

        // post to page
        $page_post = (new FacebookRequest( $this->session, 'POST', '/'. $page_id .'/feed', array(
          'access_token'  => $access_token,
          'name'          => $data["name"],
          'link'          => $data["link"],
          'caption'       => $data["caption"],
          'message'       => $data["message"],
          'picture'       => $data["picture"]
        ) ))->execute()->getGraphObject()->asArray();
    
        // return post_id
        //print_r( $page_post );
        //var_dump($page_post);

     
        } catch(FacebookRequestException $e) {
     
        echo "Exception occured, code: " . $e->getCode();
        echo " with message: " . $e->getMessage();
     
        }
      } else {
        $this->login_url();
      }
   }
}