<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model{

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
