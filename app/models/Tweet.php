<?php


class Tweet extends Eloquent{
	protected $table = 'tweets';

	public function user()
	{
		$this->belongsTo('User', 'user_id');
	}

}
