<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\Models\UserPlayer;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    	Schema::create('users_players', function (Blueprint $table) {
    		$table->id();
    		$table->unsignedInteger('user_id');
    		$table->unsignedInteger('player_id');
            // $table->unsignedInteger('maincategory_id');
    		$table->timestamps();
    	});

        //11 x 2 = 22 propiedades digitales 
        //29 x 2 = 58 propiedades digitales 
        // total 80 post

        // Propiedades digitales
    	$userpost = new UserPlayer;
    	$userpost->user_id = 1;
    	$userpost->player_id = 1;            
    	$userpost->save();

    	$userpost = new UserPlayer;
    	$userpost->user_id = 2;
    	$userpost->player_id = 2;            
    	$userpost->save();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
    	Schema::dropIfExists('users_players');
    }
};
