<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MainCreature extends Model
{

	protected $table = 'maincreatures';

	protected $fillable = [		
		'maincreature_name',
		'maincreature_img',
		'maincreature_px',
		'maincreature_py',
		'maincreature_id'	
	];

	 
}
