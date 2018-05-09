<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Skill extends Model{


	use Searchable;

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'name'
	];

	public function works() {
		return $this->belongsToMany('App\Work', 'work_skill', 'work_id', 'skill_id');
	}
}
