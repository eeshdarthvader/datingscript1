<?php


class PremiumFeaturesController extends BaseController {
	
	public function getIndex(){

		$vars['superpowerMode'] = Libs::get_settings('superpowerMode');
		$vars['superpowerInvisiblity'] = Libs::get_settings('superpowerInvisiblity');
		$vars['superpower'] = Libs::get_settings('superpower');
		$vars['riseup'] = Libs::get_settings('riseup');
		$vars['spotlight'] = Libs::get_settings('spotlight');
		$vars['spotlightType'] = Libs::get_settings('spotlightType');

		$vars['riseup_credits'] = Libs::get_settings('riseup_credits');
		$vars['spotlight_credits'] = Libs::get_settings('spotlight_credits');
		$vars['superpower_credits'] = Libs::get_settings('superpower_credits');

		return View::make('admin.premiumFeatures.index',$vars);
	}

	public function postSettings() {

		$superpowerMode = Input::get("superpowerMode");
		Libs::set_settings('superpowerMode',$superpowerMode);

		$superpowerInvisiblity = Input::get("superpowerInvisiblity");
		Libs::set_settings('superpowerInvisiblity',$superpowerInvisiblity);

		$superpower = Input::get("superpower");
		Libs::set_settings('superpower',$superpower);

		$riseup = Input::get("riseup");
		Libs::set_settings('riseup',$riseup);

		$spotlight = Input::get("spotlight");
		Libs::set_settings('spotlight',$spotlight);

		$spotlightType = Input::get("spotlightType");
		Libs::set_settings('spotlightType',$spotlightType);

		return Redirect::back()->with('success_setting','Changes saved successfully');

	}

	    


	public function postFeaturecost() {

		$superpower_credits = Input::get("superpower_credits");
		Libs::set_settings('superpower_credits',$superpower_credits);

		$riseup_credits = Input::get("riseup_credits");
		Libs::set_settings('riseup_credits',$riseup_credits);

		$spotlight_credits = Input::get("spotlight_credits");
		Libs::set_settings('spotlight_credits',$spotlight_credits);

		return Redirect::back()->with('success_cost','Changes saved successfully');

	}
}