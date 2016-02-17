<? php

namespace App\Http\Utilities;

class Country {

	protected $countries = [
		'United States' 	=> 'us',
		'Canada'			=> 'ca',
		'Europe'			=>	'eu'
	];

	public static function all() {
		return array_keys($countries);
	}

}