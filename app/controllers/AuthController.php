<?php
include(app_path().'/../vendor/abraham/twitteroauth/twitteroauth/twitteroauth.php');

class AuthController extends BaseController{

	public function login(){
		$connection = new TwitterOAuth("***REMOVED***", "***REMOVED***");
		$temporary_credentials = $connection->getRequestToken("http://octogenarian.tk/initial-commit/public/callback");
		$redirect_url = $connection->getAuthorizeURL($temporary_credentials); // Use Sign in with Twitter
		echo $redirect_url;
	}
	public function callback(){
		$connection = new TwitterOAuth("***REMOVED***", "***REMOVED***", $_SESSION['oauth_token'],
			$_SESSION['oauth_token_secret']);
		$token_credentials = $connection->getAccessToken($_REQUEST['oauth_verifier']);
		$connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, $token_credentials['oauth_token'],
			$token_credentials['oauth_token_secret']);
		$status = $connection->post('statuses/update', array('status' => 'testing 1 2 3 is this thing on - @rainshapes');
	}

}