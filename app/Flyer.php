<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Flyer extends Model
{
	protected $fillable = [
		'street',
		'city',
		'state',
		'country',
		'zip',
		'price',
		'description'
	];
	

	// public function scopeLocatedAt($query, $zip, $street) {
	// 	$street = str_replace('-', ' ', $street);
	// 	return $query->where(compact('zip', 'street'))->first();
	// }

	public static function locatedAt($zip, $street) {
		$street = str_replace('-', ' ', $street);
		return static::where(compact('zip', 'street'))->first();
	}

	public function getPriceAttribute($price) {
		return '$' . number_format($price);
	}

	public function savePhoto(Photo $photo) {
		return $this->photos()->save($photo);
	}

    public function photos() {
    	return $this->hasMany('App\Photo');
    }

    public function owner() {
    	return $this->belongsTo('App\User', 'user_id');
    }

    public function ownedBy(User $user) {
    	return $this->user_id == $user->id;
    }
}
