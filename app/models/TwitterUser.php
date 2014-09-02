<?php


class TwitterUser extends Eloquent{
	protected $table = 'users';

	public function analyzeFollower()
	{
		$this->hasOne('AnalyzeFollower');
	}
}