<?php
include(app_path().'/../vendor/abraham/twitteroauth/twitteroauth/twitteroauth.php');

session_start(); // bad, but using until db is going

class AuthController extends BaseController{

	public function login(){
		$connection = new TwitterOAuth("T5VEKYSzlobklcmLi32IJbzZK", "XFJWx6H5skSyobTNn5myeR9S3t5SDLn31QPuXQEWJWv4SfaSy7");
		$temporary_credentials = $connection->getRequestToken("http://octogenarian.tk/initial-commit/public/callback");
		$redirect_url = $connection->getAuthorizeURL($temporary_credentials); // Use Sign in with Twitter
		echo $redirect_url;
	}
	public function callback(){
		$token_credentials = $connection->getAccessToken($_REQUEST['oauth_verifier']);
		$connection = new TwitterOAuth("T5VEKYSzlobklcmLi32IJbzZK", "XFJWx6H5skSyobTNn5myeR9S3t5SDLn31QPuXQEWJWv4SfaSy7", $token_credentials['oauth_token'],
			$token_credentials['oauth_token_secret']);
		$status = $connection->post('statuses/update', array('status' => 'testing 1 2 3 is this thing on - @rainshapes'));
	}

}