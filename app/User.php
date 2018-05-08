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
