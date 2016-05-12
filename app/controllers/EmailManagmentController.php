<?php


class EmailManagmentController extends \BaseController {


	public function getIndex(){

		$vars['host'] = Libs::get_settings("email_host");
		$vars['port'] = Libs::get_settings("email_port");
		$vars['username'] = Libs::get_settings("email_username");
		$vars['password'] = Libs::get_settings("email_password");
		$vars['encryption'] = Libs::get_settings("email_encryption");
		$vars['from_email'] = Libs::get_settings("from_email");

		$vars['profilevisitor'] = Libs::get_settings("email_notification_profile_visitor");
		$vars['wantstomeet'] = Libs::get_settings("email_notification_meetme");
		$vars['mutualattraction'] = Libs::get_settings("email_notification_mutual_attraction");
		$vars['message'] = Libs::get_settings("email_notification_message");
		$vars['addcontact'] = Libs::get_settings("email_notification_add_contact");
		$vars['sendgift'] = Libs::get_settings("email_notification_send_gift");
		$vars['disableuser'] = Libs::get_settings("email_notification_disable_user");
		$vars['deletephoto'] = Libs::get_settings("email_notification_delete_photo");
		$vars['deleteuser'] = Libs::get_settings("email_notification_delete_user");
		$vars['commentphoto'] = Libs::get_settings("email_notification_comment_photo");
		$vars['ratephoto'] = Libs::get_settings("email_notification_rate_photo");
		$vars['profilevisitoremail'] = Libs::get_settings("email_content_profile_visitor");
		$vars['messageemail'] = Libs::get_settings("email_content_message");
		$vars['addcontactemail'] = Libs::get_settings("email_content_add_contact");
		$vars['sendgiftemail'] = Libs::get_settings("email_content_send_gift");
		$vars['meetmeemail'] = Libs::get_settings("email_content_meetme");
		$vars['mutualattractionemail'] = Libs::get_settings("email_content_mutual_attraction");
		$vars['forgotpasswordemail'] = Libs::get_settings("email_content_forgot_password");
		$vars['emailverificationemail'] = Libs::get_settings("email_content_email_verification");
		$vars['disableuseremail'] = Libs::get_settings("email_content_disbale_user");
		$vars['deletephotoemail'] = Libs::get_settings("email_content_delete_photo");
		$vars['deleteuseremail'] = Libs::get_settings("email_content_delete_user");
		$vars['commentphotoemail'] = Libs::get_settings("email_content_comment_photo");
		$vars['ratephotoemail'] = Libs::get_settings("email_content_rate_photo");
		$vars['profilevisitoremailsubject'] = Libs::get_settings("email_subject_profile_visitor");
		$vars['messageemailsubject'] = Libs::get_settings("email_subject_message");
		$vars['addcontactemailsubject'] = Libs::get_settings("email_subject_add_contact");
		$vars['sendgiftemailsubject'] = Libs::get_settings("email_subject_send_gift");
		$vars['meetmeemailsubject'] = Libs::get_settings("email_subject_meetme");
		$vars['mutualattractionsubject'] = Libs::get_settings("email_subject_mutual_attraction");
		$vars['forgotpasswordemailsubject'] = Libs::get_settings("email_subject_forgot_password");
		$vars['emailverificationemailsubject'] = Libs::get_settings("email_subject_email_verification");
		$vars['disableuseremailsubject'] =	Libs::get_settings("email_subject_disbale_user");
		$vars['deletephotoemailsubject'] = Libs::get_settings("email_subject_delete_photo");
		$vars['deleteuseremailsubject'] = Libs::get_settings("email_subject_delete_user");
		$vars['commentphotoemailsubject'] = Libs::get_settings("email_subject_comment_photo");
		$vars['ratephotoemailsubject'] = Libs::get_settings("email_subject_rate_photo");

		return View::make('admin.emails.index',$vars);
	}

	public function postUpdateemailconfig(){

		Libs::set_settings("email_host", Input::get("host"));
		Libs::set_settings("email_port", Input::get("port"));
		Libs::set_settings("email_username", Input::get("username"));
		Libs::set_settings("email_password", Input::get("password"));
		Libs::set_settings("email_encryption", Input::get("encryption"));
		Libs::set_settings("from_email", Input::get("from_email"));

		return Redirect::back()->with('configupdated', "Configurations updated Successfully");
	}

	public function postUpdateemailnotification(){

		Libs::set_settings("email_notification_profile_visitor", Input::get("profilevisitor"));
		Libs::set_settings("email_notification_message", Input::get("message"));
		Libs::set_settings("email_notification_meetme", Input::get("wantstomeet"));
		Libs::set_settings("email_notification_mutual_attraction", Input::get("mutualattraction"));
		Libs::set_settings("email_notification_disable_user", Input::get("disableuser"));
		Libs::set_settings("email_notification_delete_photo", Input::get("deletephoto"));
		Libs::set_settings("email_notification_delete_user", Input::get("deleteuser"));
		Libs::set_settings("email_notification_add_contact", Input::get("addcontact"));
		Libs::set_settings("email_notification_send_gift", Input::get("sendgift"));
		Libs::set_settings("email_notification_comment_photo", Input::get("commentphoto"));
		Libs::set_settings("email_notification_rate_photo", Input::get("ratephoto"));

		return Redirect::back()->with('settingupdated', "Notifications settings updated Successfully");
	}








}