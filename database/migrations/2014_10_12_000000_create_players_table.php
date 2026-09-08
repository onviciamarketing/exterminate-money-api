<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\Models\Player;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
    	Schema::create('players', function (Blueprint $table) {
    		$table->id();
    		$table->string('player_name');
    		$table->string('player_img');
            $table->unsignedInteger('player_px')->nullable();
            $table->unsignedInteger('player_py')->nullable();
    		// $table->string('pensum_kwtwo');
    		// $table->string('pensum_kwthree');
    		// $table->string('pensum_url');
    		// $table->string('pensum_video');      
    		// $table->unsignedInteger('course_id');    	             
            $table->timestamps();
        });

    	$reply = new Player;
    	$reply->player_name = 'Ash';
    	$reply->player_img = 'images/ash.jpeg';
        $reply->player_px = 0;
        $reply->player_py = 0;                 	
        $reply->save();

        $reply = new Player;
        $reply->player_name = 'Misty';
        $reply->player_img = 'images/misty.jpeg';
        $reply->player_px = 0;
        $reply->player_py = 0;        	
        $reply->save();


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
    	Schema::dropIfExists('players');
    }
};
