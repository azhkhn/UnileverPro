<?php
// Must pass session data for the library to work (only if not already included in your app)
session_start();

// Facebook app settings
$app_id = '900627506698839';
$app_secret = '292204d319aef7ee7dde693f84a60f6e';
$redirect_uri = 'https://facebook-darapenhchet.c9.io/facebook-sdk-php-v4/index.php/';

// Define the root directoy
define( 'ROOT', dirname( __FILE__ ) . '/' );

// Autoload the required files
require_once( ROOT . 'facebook-php-sdk-v4-4.0-dev/autoload.php' );

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
 
FacebookSession::setDefaultApplication('900627506698839', '292204d319aef7ee7dde693f84a60f6e');
$helper = new FacebookRedirectLoginHelper('https://facebook-darapenhchet.c9.io/facebook-sdk-php-v4/index.php/' );


$permissions = array(
  'manage_pages',
  'publish_actions',
  'publish_pages'
);

try {
  $session = $helper->getSessionFromRedirect();
} catch( FacebookRequestException $ex ) {
  echo $e->getMessage();
} catch( Exception $ex ) {
  echo $e->getMessage();
}
 
if ( $session) {
  print_r($session);
  try {
    //$permissions = $helper->api("/me/permissions");
    $request = new FacebookRequest($session, 'GET', '/me');
    $response = $request -> execute();
    $me = $response-> getGraphObject();
    echo 'My facebook name is : '.$me->getProperty('name');
 
  } catch(FacebookRequestException $e) {
 
    echo "Exception occured, code: " . $e->getCode();
    echo " with message: " . $e->getMessage();
 
  }
} else {
  $auth_url = $helper->getLoginUrl($permissions);
 echo '<a href="' . $auth_url . '">Login</a>';
}

/*if ( $session) {
 try {
 $postrequest = new FacebookRequest($session, 'POST', '/me/feed',array('message' => 'GOOD AFTERNOON EVERYONE...'));
 $postresponse = $postrequest -> execute();
 $postme = $postresponse-> getGraphObject();
 echo $postme->getProperty('id');
 
} catch(FacebookRequestException $e) {
 
echo "Exception occured, code: " . $e->getCode();
 echo " with message: " . $e->getMessage();
 
}
} else {
  $auth_url = $helper->getLoginUrl($permissions);
 echo '<a href="' . $auth_url . '">Login</a>';
}*/



if ( $session) {
  
 try {
/*    $auth_url = $helper->getLoginUrl($permissions);
 echo '<a href="' . $auth_url . '">Login</a>';*/
  
$page_id = '775329102582353';
 // get page access token
$access_token = (new FacebookRequest( $session, 'GET', '/' . $page_id,  array( 'fields' => 'access_token' ) ))
    ->execute()->getGraphObject()->asArray();

// save access token in variable for later use  
$access_token = $access_token['access_token'];
 

 // post to page
$page_post = (new FacebookRequest( $session, 'POST', '/'. $page_id .'/feed', array(
    'access_token' => $access_token,
    'name' => 'Facebook API: Posting As A Page using Graph API v2.x and PHP SDK 4.0.x',
    'link' => 'https://www.webniraj.com/2014/08/23/facebook-api-posting-as-a-page-using-graph-api-v2-x-and-php-sdk-4-0-x/',
    'caption' => 'The Facebook API lets you post to Pages you administrate via the API. This tutorial shows you how to achieve this using the Facebook PHP SDK v4.0.x and Graph API 2.x.',
    'message' => 'Check out my new blog post!',
  ) ))->execute()->getGraphObject()->asArray();

// return post_id
print_r( $page_post );
 
} catch(FacebookRequestException $e) {
 
echo "Exception occured, code: " . $e->getCode();
 echo " with message: " . $e->getMessage();
 
}
} else {
  $auth_url = $helper->getLoginUrl($permissions);
 echo '<a href="' . $auth_url . '">Login</a>';
}
