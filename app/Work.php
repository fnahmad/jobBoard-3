<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Work extends Model{

	use Searchable;

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'id',
		'title',
		'working_time',
		'content',
		'skill_level',
		'contact_name',
		'contact_email',
		'contact_phone',
		'budget',
		'avatar',
		'is_over',
		'start_at',
		'people',
		'end_at',
		'slug',
		'user_id'
	];

	public function skills() {
		return $this->belongsToMany('App\Skill', 'work_skill', 'work_id', 'skill_id');
	}

	public function user() {
		return $this->belongsTo('App\User');
	}


	public function usersParticipants() {
		return $this->belongsToMany('App\User', 'work_user');
	}

	/**
	 * Get the indexable data array for the model.
	 *
	 * @return array
	 */
	public function toSearchableArray() {
		$array           = $this->toArray();
		$array['skills'] = $this->skills()->get()->pluck('name');
		$array['user'] = $this->user()->first();

		return $array;
	}
}
