<?php 

class DashboardController extends BaseController{
	public function index()
	{
		$user = Auth::user();
		$analyze = AnalyzeFollower::where('user_id', '=', $user->id)->first();
		return View::make('Dashboard.index')
				->with('analyze', $analyze);;
	}
}