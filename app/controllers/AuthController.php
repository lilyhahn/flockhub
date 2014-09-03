<?php
include(app_path().'/../vendor/abraham/twitteroauth/twitteroauth/twitteroauth.php');
<<<<<<< HEAD
=======
require_once(app_path() . '/config/oauth.php');
>>>>>>> f39e9063c3d2fd7be4ba57d0982289f56d20cb6e

session_start(); // bad, but using until db is going

class AuthController extends BaseController{

	public function login()
	{
		return View::make('Auth.login');
	}
	public function handleLogin(){
<<<<<<< HEAD
		$connection = new TwitterOAuth("T5VEKYSzlobklcmLi32IJbzZK", "XFJWx6H5skSyobTNn5myeR9S3t5SDLn31QPuXQEWJWv4SfaSy7");
		$temporary_credentials = $connection->getRequestToken("http://octogenarian.tk/initial-commit/public/callback");
=======
		$connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET);
		$temporary_credentials = $connection->getRequestToken(OAUTH_CALLBACK);
>>>>>>> f39e9063c3d2fd7be4ba57d0982289f56d20cb6e
		$_SESSION['temp_credentials'] = $temporary_credentials;
		$redirect_url = $connection->getAuthorizeURL($temporary_credentials); // Use Sign in with Twitter
		return Redirect::to($redirect_url);
	}
	public function callback(){
<<<<<<< HEAD
		$connection = new TwitterOAuth("T5VEKYSzlobklcmLi32IJbzZK", "XFJWx6H5skSyobTNn5myeR9S3t5SDLn31QPuXQEWJWv4SfaSy7", $_SESSION['temp_credentials']['oauth_token'], $_SESSION['temp_credentials']['oauth_token_secret']);
		$token_credentials = $connection->getAccessToken($_GET['oauth_verifier']);
		$connection = new TwitterOAuth("T5VEKYSzlobklcmLi32IJbzZK", "XFJWx6H5skSyobTNn5myeR9S3t5SDLn31QPuXQEWJWv4SfaSy7", $token_credentials['oauth_token'],
=======
		$connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, $_SESSION['temp_credentials']['oauth_token'], $_SESSION['temp_credentials']['oauth_token_secret']);
		$token_credentials = $connection->getAccessToken($_GET['oauth_verifier']);
		$connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, $token_credentials['oauth_token'],
>>>>>>> f39e9063c3d2fd7be4ba57d0982289f56d20cb6e
		$token_credentials['oauth_token_secret']);
		$isset_user = TwitterUser::where('oauth_token', '=', $token_credentials['oauth_token'])->first();
		if(is_null($isset_user)){
			$user = new TwitterUser;
			$user->oauth_token = $token_credentials['oauth_token'];
			$user->oauth_token_secret = $token_credentials['oauth_token_secret'];
			$user->save();
		} else {
			$user = $isset_user;
		}
		$connection->host = "https://api.twitter.com/1.1/";
		$account_info = $connection->get('account/verify_credentials');
		$user->followers = $account_info->followers_count;
		$user->following = $account_info->friends_count;
		$user->twitter_id = $account_info->id;
		$user->handle = $account_info->screen_name;
		$user->name = $account_info->name;
		$user->save();
<<<<<<< HEAD
=======
		$analyze = AnalyzeFollower::where('user_id', '=', $user->id)->first();
		if(is_null($analyze)){
			$analyze = new AnalyzeFollower;
			$analyze->user_id = $user->id;
			$analyze->followers = $user->followers;
		}
		$analyze->numerical_change = $user->followers - $analyze->followers;
		$analyze->percent_change = '%'. ($analyze->numerical_change % $user->followers) * $user->followers;
		$analyze->followers = $user->followers;
		$analyze->save();
		dd($analyze);
>>>>>>> f39e9063c3d2fd7be4ba57d0982289f56d20cb6e
		return Redirect::action('DashboardController@index');
	}

}



