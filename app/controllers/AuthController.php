<?php
include(app_path().'/../vendor/abraham/twitteroauth/twitteroauth/twitteroauth.php');

session_start(); // bad, but using until db is going

class AuthController extends BaseController{

	public function login()
	{
		return View::make('Auth.login');
	}
	public function handleLogin(){
		$connection = new TwitterOAuth("T5VEKYSzlobklcmLi32IJbzZK", "XFJWx6H5skSyobTNn5myeR9S3t5SDLn31QPuXQEWJWv4SfaSy7");
		$temporary_credentials = $connection->getRequestToken("http://octogenarian.tk/initial-commit/public/callback");
		$_SESSION['temp_credentials'] = $temporary_credentials;
		$redirect_url = $connection->getAuthorizeURL($temporary_credentials); // Use Sign in with Twitter
		return Redirect::to($redirect_url);
	}
	public function callback(){
		$connection = new TwitterOAuth("T5VEKYSzlobklcmLi32IJbzZK", "XFJWx6H5skSyobTNn5myeR9S3t5SDLn31QPuXQEWJWv4SfaSy7", $_SESSION['temp_credentials']['oauth_token'], $_SESSION['temp_credentials']['oauth_token_secret']);
		$token_credentials = $connection->getAccessToken($_GET['oauth_verifier']);
		$connection = new TwitterOAuth("T5VEKYSzlobklcmLi32IJbzZK", "XFJWx6H5skSyobTNn5myeR9S3t5SDLn31QPuXQEWJWv4SfaSy7", $token_credentials['oauth_token'],
		$token_credentials['oauth_token_secret']);
		$isset_user = TwitterUser::where('oauth_token', '=', $token_credentials['oauth_token'])->first();
		if(is_null($isset_user)){
			$user = new TwitterUser;
			$user->oauth_token = $token_credentials['oauth_token'];
			$user->oauth_token_secret = $token_credentials['oauth_token_secret'];
			$user->save();
		}
		//$connection->host = "https://api.twitter.com/1.1/";
		//$status = $connection->post('statuses/update', array('status' => 'testing 1 2 3 is this thing on - @rainshapes'));
		$json = json_decode(file_get_contents('https://api.twitter.com/1.1/account/verify_credentials.json'));
		dd($json);
		return Redirect::action('DashboardController@index');
	}

}



