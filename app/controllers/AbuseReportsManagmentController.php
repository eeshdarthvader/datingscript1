<?php

use Repositories\AbuseReportsRepository;

class AbuseReportsManagmentController extends \BaseController {

	protected $abuseReportRepo;

	public function __construct(AbuseReportsRepository $abuseReportRepo){

		$this->abuseReportRepo = $abuseReportRepo;
	}

	public function getUsers(){
		// unseen
		$unseenReports = $this->abuseReportRepo->UnseenUserReports();
		$this->abuseReportRepo->getReporters($unseenReports);
		$vars['unseenreports'] = $unseenReports;
		// seen
		$seenReports = $this->abuseReportRepo->SeenUserReports();
		$this->abuseReportRepo->getReporters($seenReports);
		$vars['seenreports'] = $seenReports;

		return View::make('admin.abuseReport.report_user',$vars);
	}
	
	public function getPhotos(){
		// unseen
		$unseenReports = $this->abuseReportRepo->UnseenPhotoReports();
		$this->abuseReportRepo->getReportersAndPhotos($unseenReports);
		$vars['unseenreports'] = $unseenReports;
		// seen
		$seenReports = $this->abuseReportRepo->SeenPhotoReports();
		$this->abuseReportRepo->getReportersAndPhotos($seenReports);
		$vars['seenreports'] = $seenReports;

		return View::make('admin.abuseReport.report_photo',$vars);
	}

	public function  getMarkUserSeen($id){

		$report = $this->abuseReportRepo->markUserReportSeen($id);
		
		return Redirect::back();
	}

	public function  getMarkUserUnseen($id){

		$report = $this->abuseReportRepo->markUserReportUnseen($id);
		
		return Redirect::back();
	}
	
	public function  getMarkPhotoSeen($id){

		$report = $this->abuseReportRepo->markPhotoReportSeen($id);
		return Redirect::back();
	}

	public function  getMarkPhotoUnseen($id){

		$report = $this->abuseReportRepo->markPhotoReportUnseen($id);
		return Redirect::back();
	}









}