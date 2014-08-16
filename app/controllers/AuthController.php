<?php

class AuthController extends BaseController{

	public function login(){
		$connection = new TwitterOAuth("T5VEKYSzlobklcmLi32IJbzZK", "XFJWx6H5skSyobTNn5myeR9S3t5SDLn31QPuXQEWJWv4SfaSy7");
		$temporary_credentials = $connection->getRequestToken("http://octogenarian.tk/initial-commit/public/login");
		$redirect_url = $connection->getAuthorizeURL($temporary_credentials); // Use Sign in with Twitter
		echo $redirect_url;
	}

}