<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserPlayer extends Model
{

	protected $table = 'users_players';

	// public $timestamps = false;

	protected $fillable = [
		'user_id',		
		'player_id'
		// 'character_img'		
	];

	
}
