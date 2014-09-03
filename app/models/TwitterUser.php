<?php


class TwitterUser extends Eloquent{
	protected $table = 'users';

<<<<<<< HEAD
=======
	public function analyzeFollower()
	{
		$this->hasOne('AnalyzeFollower');
	}
>>>>>>> f39e9063c3d2fd7be4ba57d0982289f56d20cb6e
}