<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Scout\Searchable;

class User extends Authenticatable{
	use Notifiable, Searchable;

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'firstname',
		'lastname',
		'email',
		'password',
		'promo',
		'is_confirmed',
		'phone',
		'email',
		'is_admin',
		'email_token'
	];

	/**
	 * The attributes that should be hidden for arrays.
	 *
	 * @var array
	 */
	protected $hidden = [
		'password',
		'remember_token',
	];


	/**
	 * Get the indexable data array for the model.
	 *
	 * @return array
	 */
	public function toSearchableArray() {
		$array           = $this->toArray();
		$array['is_confirmed'] = $array['is_confirmed'] === 0 ? 0 : 1;

		return $array;
	}

	public function worksOwner() {
		return $this->hasMany('App\Work', 'user_id', 'id');
	}

	public function worksParticipations() {
		return $this->belongsToMany('App\Work', 'work_user');
	}
	
	public function routeNotificationForSlack() {
    return env('SLACK_WEBHOOK_URL');
	}
}
