<?php

use Repositories\RewardRepository;

class RewardManagmentController extends \BaseController {

	protected $rewardRepo;

	public function __construct(RewardRepository $rewardRepo){

		$this->rewardRepo = $rewardRepo;
	}

	public function getIndex(){

		$vars['rewards'] = $this->rewardRepo->getAll();
		$vars['isrewards'] = Libs::get_settings('isrewards');

		return View::make('admin.reward.index',$vars);
	}

	public function postUpdaterewardsettings(){

		$isrewards = Input::get('isrewards');

		Libs::set_settings('isrewards',$isrewards);

		if($isrewards == '0'){
			$topupsetting = Libs::get_settings('istopup');
			if(!isset($topupsetting->value) or $topupsetting->value != 1) {
				Libs::set_settings('isspotlight',0);
				Libs::set_settings('issuperpower',0);
				Session::flash("disabled","Rewards are disabled as all reward packages are disabled");
			}
		}else {

			Session::flash("enabled","Rewards are enabled");
		}
		return Redirect::back();
	}



	public function postUpdaterewards(){

		$rewards =  $this->rewardRepo->getAll();

		foreach($rewards as $reward) {
			$reward->credits = Input::get("credits$reward->id");
			$reward->status = Input::get("isenable$reward->id");
			$reward->save();
		}

		$activerewards = $this->rewardRepo->getActive();

		if($activerewards == null) {
			Libs::set_settings("isrewards",0);

			$topupsetting = Libs::get_settings('istopup');

			if(!isset($topupsetting->value) or $topupsetting->value != 1) {
				Libs::set_settings('isspotlight',0);
				Libs::set_settings('issuperpower',0);

				Session::flash("rewards_topup_disabled","Rewards are disabled as all reward packages are disabled");
			} else {
				Session::flash("rewards_disabled","Rewards are disabled as all reward packages are disabled");
			}

		}

		return Redirect::back();

	}














}