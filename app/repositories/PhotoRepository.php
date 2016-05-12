<?php namespace Repositories;

use \Photos;
use \User;
use \Illuminate\Support\Str;

class PhotoRepository {


	/**
	 * @param array $vars
	 */
	public function create_photo(array $vars){

		Photos::create($vars);
	}

	/**
	 * @return mixed
	 */
	
	/**
	 * @param $id
	 */
	public function deleteById($id){

		$photo = Photos::findOrFail($id);
		$photo->delete();
	}

	public static function userPhotos($user_id) {
		
		$photos = array();
		
		$photos['public_photos'] = Photos::where('user_id',$user_id)->where('album','public')->get();
		
		$photos['public_photos_count'] = count($photos['public_photos']);
		
		$photos['private_photos'] = Photos::where('user_id',$user_id)->where('album','private')->get();
		
		$photos['private_photos_count'] = count($photos['private_photos']);

		$photos['friends_photos'] = Photos::where('user_id',$user_id)->where('album','album')->get();
		
		$photos['friends_photos_count'] = count($photos['friends_photos']);

		return $photos;
		
	}
	
	public static function encounterPhotos($user_id) {
		
		$photos = array();
		
		$photos['public_photos'] = Photos::where('user_id',$user_id)->where('album','public')->get();
		
		$photos['count'] = count($photos['public_photos']);
		
		return $photos;
	} 
	
	public static function uploadPic($image,$id,$album) {
		
		$user = User::find($id);
		
		if($image) {

	        $filename = $image->getClientOriginalName();

	        $filename = pathinfo($filename, PATHINFO_FILENAME);

	        $fullname = Str::slug(Str::random(8) . $filename) . '.' .$image->getClientOriginalExtension();

	        $upload = $image->move('uploads/photos', $fullname);

		 } else {
		 	$fullname = "";
		 }
        
        $photo = new Photos;
        $photo->user_id = $id;
        $photo->photo_id = $fullname;
        $photo->album = $album;
        $photo->save();
	}
	
	public static function deletephoto($id,$vars) {
		
		$photo = Photos::find($vars['id']);
		if($photo && $photo->user_id == $id) {
			$photo->delete();
		}
		
	}

}