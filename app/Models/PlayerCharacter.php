<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlayerCharacter extends Model
{

	protected $table = 'players_characters';

	// public $timestamps = false;

	protected $fillable = [				
		'player_id',
		'character_id'
		// 'character_img'		
	];

	
}
