<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Thematique.
 *
 * @author  The scaffold-interface created at 2019-12-27 12:49:34pm
 * @link  https://github.com/maxolex/scaffold-interface
 */
class Thematique extends Model
{
	const RULES = [

	];

	const RULES_UPDATE = [

	];
	
	
	
    protected $table = 'thematiques';

	
	public function pole()
	{
		return $this->belongsTo('App\Pole','pole_id');
	}

	
}
