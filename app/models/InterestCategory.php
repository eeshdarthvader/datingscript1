<?php


class InterestCategory extends Eloquent  {


	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'interest_categories';

	protected $fillable = array('name', 'code');


	public function interests()
	{
		return $this->hasMany('Interests');
	}

	public function events()
	{
		return $this->hasMany('EventD');
	}


	public function all_interests(){

		return Interests::where('category',"=",$this->code)->get();
	}


	public function interests_count(){

		return Interests::where('category','=',$this->code)->count();

	}


	public function delete_all(){

		$interests = Interests::where('category','=',$this->code)->get();


		foreach($interests as $interest){

			$interest->delete();

		}

		$events = EventD::where('interest_category_id',$this->id)->get();

		foreach($events as $event) {

			$event->interest_category_id = -1;
			$event->save();
		
		}

		$this->delete();


	}


}
