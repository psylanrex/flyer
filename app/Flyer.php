<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
}
