<?php namespace Repositories;

use \ReportUser;
use \ReportPhoto;
use \Sentry;
use \User;
use \Photos;

class AbuseReportsRepository {

	public function UnseenUserReports(){

		return ReportUser::where("status","new")->get();
	}

	public function SeenUserReports() {

		return ReportUser::where("status","seen")->get();
	}
	
	public function UnseenPhotoReports(){

		return ReportPhoto::where("status","new")->get();
	}

	public function SeenPhotoReports() {

		return ReportPhoto::where("status","seen")->get();
	}


	public function getReporters($reports){

	  	foreach($reports as $report){

			$report->reportinguser = User::find($report->reporting_user);
			$report->reporteduser = User::find($report->user);
		}
	}
	
	public function getReportersAndPhotos($reports) {
		
		foreach($reports as $report){

			$report->reportinguser = User::find($report->reporting_user);
			$report->reporteduser = User::find($report->user);
			$report->photo_url = Photos::find($report->photo_id)->photo_id;
		}

		
	}

	public function markUserReportSeen($id) {
		
		$report = ReportUser::findOrFail($id);
		if($report) {
			$report->status = "seen";
			$report->save();
		}
		
	}

    public function markUserReportUnseen($id) {
		
		$report = ReportUser::findOrFail($id);
		if($report) {
			$report->status = "new";
			$report->save();
		}
		
	}


    	public function markPhotoReportSeen($id) {
		
		$report = ReportPhoto::findOrFail($id);
		if($report) {
			$report->status = "seen";
			$report->save();
		}
		
	}

    public function markPhotoReportUnseen($id) {
		
		$report = ReportPhoto::findOrFail($id);
		if($report) {
			$report->status = "new";
			$report->save();
		}
		
	}




}