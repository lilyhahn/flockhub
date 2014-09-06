<?php


class AnalyzeFollower extends Eloquent{
	protected $table = 'analyzefollower';

	public function user()
	{
		$this->belongsTo('User');
	}

}