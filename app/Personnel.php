<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Personnel.
 *
 * @author  The scaffold-interface created at 2019-12-27 12:47:30pm
 * @link  https://github.com/maxolex/scaffold-interface
 */
class Personnel extends Model
{
	const RULES = [

	];

	const RULES_UPDATE = [

	];
	
	
	
    protected $table = 'personnels';

	
	public function structure()
	{
		return $this->belongsTo('App\Structure','structure_id');
	}

	
}
