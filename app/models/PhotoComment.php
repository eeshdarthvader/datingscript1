<?php



class PhotoComment extends Eloquent  {


	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'photo_comments';
	
	public function replies()
	{
		return $this->hasMany('PhotoCommentReply');
	}


}
