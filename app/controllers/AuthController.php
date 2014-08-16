<?php

class AuthController extends BaseController{

	public function login(){
		$connection = new TwitterOAuth("***REMOVED***", "***REMOVED***");
		$temporary_credentials = $connection->getRequestToken(OAUTH_CALLBACK);
	}

}