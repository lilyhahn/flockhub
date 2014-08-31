<?php
include(app_path().'/../vendor/abraham/twitteroauth/twitteroauth/twitteroauth.php');

session_start(); // bad, but using until db is going

class AuthController extends BaseController{

	public function login()
	{
		return View::make('Auth.login');
	}
	public function handleLogin(){
		$connection = new TwitterOAuth("***REMOVED***", "***REMOVED***");
		$temporary_credentials = $connection->getRequestToken("http://octogenarian.tk/initial-commit/public/callback");
		$redirect_url = $connection->getAuthorizeURL($temporary_credentials); // Use Sign in with Twitter
		echo $redirect_url;
	}
	public function callback(){
		$connection = new TwitterOAuth("***REMOVED***", "***REMOVED***", $_GET["oauth_token"], "");
		$token_credentials = $connection->getAccessToken($_GET['oauth_verifier']);
		$connection = new TwitterOAuth("***REMOVED***", "***REMOVED***", $token_credentials['oauth_token'],
			$token_credentials['oauth_token_secret']);
		$status = $connection->post('statuses/update', array('status' => 'testing 1 2 3 is this thing on - @rainshapes'));
	}

}