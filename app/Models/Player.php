<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Player extends Model
{

	protected $table = 'players';

	// public $timestamps = false;

	protected $fillable = [		
		'player_name',
		'player_img'		
	];

	
}
