<?php



class PhotoCommentReply extends Eloquent  {


	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'photo_comment_replies';

	public function comment()
	{
		return $this->belongsTo('PhotoComment','comment_id');
	}


}
